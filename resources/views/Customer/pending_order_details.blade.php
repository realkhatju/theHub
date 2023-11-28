@extends('customer_master')

@section('title', 'Shop Order Details')

@section('place')

    <!--<div class="col-md-5 col-8 align-self-center">-->
    <!--<h3 class="text-themecolor m-b-0 m-t-0">Pending Order Details</h3>-->
    <!--<ol class="breadcrumb">-->
    <!--<li class="breadcrumb-item"><a href="{{ route('index') }}">Back to Dashborad</a></li>-->
    <!--<li class="breadcrumb-item active">Pending Order Details</li>-->
    <!--</ol>-->
    <!--</div>-->

@endsection


@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="font-weight-bold mt-2">Pending Order Details</h4>
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="row">
                                <div class="font-weight-bold text-primary col-md-6 offset-md-1">Order Number</div>
                                <h5 class="font-weight-bold col-md-4 mt-1">{{ $pending_order_details->order_number }}</h5>
                            </div>

                            <div class="row mt-1">
                                <div class="font-weight-bold text-primary col-md-6 offset-md-1">Order Total Quantity</div>
                                <h5 class="font-weight-bold col-md-4 mt-1">{{ $total_qty }}</h5>
                            </div>

                            <div class="row mt-1">
                                <div class="font-weight-bold text-primary col-md-6 offset-md-1">Order Total Price</div>
                                <h5 class="font-weight-bold col-md-4 mt-1">{{ $total_price }}</h5>
                            </div>

                            <div class="row mt-1">
                                <div class="font-weight-bold text-primary col-md-6 offset-md-1">Table Name</div>
                                <h5 class="font-weight-bold col-md-4 mt-1">
                                    {{ $pending_order_details->table->table_number ?? 'Take Away' }}</h5>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <h4 class="font-weight-bold mt-2 text-primary text-center">Pending Order Option's List</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            {{-- <th>Counting Unit Name</th> --}}
                                            <th>Order Quantity</th>
                                            {{-- <th>Price</th> --}}
                                            <th>Sub Total Price</th>
                                            {{-- <th>Status</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pending_order_details->option as $option)
                                            <tr>

                                                <td>
                                                    <p
                                                        style="width: 90px;white-space: nowrap;overflow: hidden;text-overflow: clip;">
                                                        {{ $option->menu_item->item_name }}</p>
                                                </td>
                                                {{-- <td>{{$option->name}}</td> --}}
                                                <td>{{ $option->pivot->quantity }}</td>
                                                {{-- <td>{{$option->sale_price}}</td> --}}
                                                <td><?= $option->pivot->quantity * $option->sale_price ?></td>

                                                {{-- @if ($option->pivot->status == 0)
                                            <td>
                                                <span class="badge-pill badge-warning">Pending</span>
                                            </td>
                                            @elseif($option->pivot->status == 1)
                                            <td>
                                                <span class="badge-pill badge-danger">Cooking</span>
                                            </td>
                                            @else
                                            <td>
                                                <span class="badge-pill badge-success">Finished</span>
                                            </td>
                                            @endif --}}
                                                <td><a
                                                        href="{{ route('customercanceldetail', ['order_id' => $pending_order_details->id, 'option_id' => $option->id]) }}"><span
                                                            class="badge-pill badge-danger">-</span></a></td>
                                            </tr>

                                            {{-- start modify note --}}
                                            {{-- @if ($fromadd == 0) --}}

                                            {{-- @endif --}}
                                            {{-- end modify note --}}
                                        @endforeach
                                        @if ($fromadd == 0)
                                                @foreach ($name as $opname)
                                                    @foreach ($option_name as $optqty)
                                                        @if ($optqty->tocook == 0)
                                                            @if ($opname->id == $optqty->option_id)
                                                                @if ($opname->menu_item->cuisine_type_id == 1)
                                                                    <tr>
                                                                        <td class="font-weight-bold">(Salad)</td>
                                                                        <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                        <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                        <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                        {{-- <td>{{$optqty->note}}</td> --}}
                                                                    </tr>
                                                                    @foreach ($notte as $notes)
                                                                        @if ($notes->option_id == $opname->id)
                                                                            <tr>
                                                                                <th class="text-danger font-weight-bold">Notes</th>
                                                                                <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @elseif ($opname->menu_item->cuisine_type_id == 2)
                                                                    <tr>
                                                                        <td class="font-weight-bold">(Breakfast)</td>
                                                                        <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                        <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                        <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                        {{-- <td>{{$optqty->note}}</td> --}}
                                                                    </tr>
                                                                    @foreach ($notte as $notes)
                                                                        @if ($notes->option_id == $opname->id)
                                                                            <tr>
                                                                                <th class="text-danger font-weight-bold">Notes</th>
                                                                                <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @elseif ($opname->menu_item->cuisine_type_id == 3)
                                                                    <tr>
                                                                        <td class="font-weight-bold">(Healthy Food)</td>
                                                                        <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                        <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                        <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                        {{-- <td>{{$optqty->note}}</td> --}}
                                                                    </tr>
                                                                    @foreach ($notte as $notes)
                                                                        @if ($notes->option_id == $opname->id)
                                                                            <tr>
                                                                                <th class="text-danger font-weight-bold">Notes</th>
                                                                                <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @elseif ($opname->menu_item->cuisine_type_id == 4)
                                                                    <tr>
                                                                        <td class="font-weight-bold">(Main)</td>
                                                                        <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                        <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                        <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                        {{-- <td>{{$optqty->note}}</td> --}}
                                                                    </tr>
                                                                    @foreach ($notte as $notes)
                                                                        @if ($notes->option_id == $opname->id)
                                                                            <tr>
                                                                                <th class="text-danger font-weight-bold">Notes</th>
                                                                                <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @elseif ($opname->menu_item->cuisine_type_id == 5)
                                                                    <tr>
                                                                        <td class="font-weight-bold">(Snacks)</td>
                                                                        <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                        <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                        <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                        {{-- <td>{{$optqty->note}}</td> --}}
                                                                    </tr>
                                                                    @foreach ($notte as $notes)
                                                                        @if ($notes->option_id == $opname->id)
                                                                            <tr>
                                                                                <th class="text-danger font-weight-bold">Notes</th>
                                                                                <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif



                                        @if ($fromadd == 1)
                                            @foreach ($name as $opname)
                                                @foreach ($option_name as $optqty)
                                                    @if ($optqty->tocook == 1)
                                                        @if ($opname->id == $optqty->option_id)
                                                            @if ($opname->menu_item->cuisine_type_id == 1)
                                                                {{-- <tr>
                                                                    <td class="font-weight-bold">(Salad)</td>
                                                                    <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                    <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                    <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                    <td>{{$optqty->note}}</td>
                                                                </tr> --}}
                                                                @foreach ($notte as $notes)
                                                                    @if ($notes->option_id == $opname->id)
                                                                        <tr>
                                                                            <th class="text-danger font-weight-bold">Notes</th>
                                                                            <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @elseif ($opname->menu_item->cuisine_type_id == 2)
                                                                {{-- <tr>
                                                                    <td class="font-weight-bold">(Breakfast)</td>
                                                                    <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                    <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                    <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                    <td>{{$optqty->note}}</td>
                                                                </tr> --}}
                                                                @foreach ($notte as $notes)
                                                                    @if ($notes->option_id == $opname->id)
                                                                        <tr>
                                                                            <th class="text-danger font-weight-bold">Notes</th>
                                                                            <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @elseif ($opname->menu_item->cuisine_type_id == 3)
                                                                {{-- <tr>
                                                                    <td class="font-weight-bold">(Healthy Food)</td>
                                                                    <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                    <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                    <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                    <td>{{$optqty->note}}</td>
                                                                </tr> --}}
                                                                @foreach ($notte as $notes)
                                                                    @if ($notes->option_id == $opname->id)
                                                                        <tr>
                                                                            <th class="text-danger font-weight-bold">Notes</th>
                                                                            <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @elseif ($opname->menu_item->cuisine_type_id == 4)
                                                                {{-- <tr>
                                                                    <td class="font-weight-bold">(Main)</td>
                                                                    <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                    <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                    <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                    <td>{{$optqty->note}}</td>
                                                                </tr> --}}
                                                                @foreach ($notte as $notes)
                                                                    @if ($notes->option_id == $opname->id)
                                                                        <tr>
                                                                            <th class="text-danger font-weight-bold">Notes</th>
                                                                            <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @elseif ($opname->menu_item->cuisine_type_id == 5)
                                                                {{-- <tr>
                                                                    <td class="font-weight-bold">(Snacks)</td>
                                                                    <td class="font-weight-bold">{{ $opname->name }}</td>
                                                                    <td class="font-weight-bold">{{ $opname->menu_item->item_name }}</td>
                                                                    <td class="font-weight-bold">{{ $optqty->quantity - $optqty->old_quantity }}</td>
                                                                    <td>{{$optqty->note}}</td>
                                                                </tr> --}}
                                                                @foreach ($notte as $notes)
                                                                    @if ($notes->option_id == $opname->id)
                                                                        <tr>
                                                                            <th class="text-danger font-weight-bold">Notes</th>
                                                                            <td class="text-danger" colspan="3">{{ $notes->note }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach

                                                            @endif
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <a href="{{ route('add_more_customer_item', $pending_order_details->id) }}" class="btn btn-info text-center"> Add
            More Item</a>

        <a href="#" class="btn btn-info ml-2" style="color:white;"
            onclick="change_price({{ $pending_order_details->id }})">Store Voucher</a>

        {{-- <a href="#" class="btn btn-info ml-2" style="color:white;" onclick="storeVoucher('{{$pending_order_details->id}}')">Store Voucher</a> --}}

    </div>
    {{-- <div class="modal-footer" id="dis_footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="change_price()">Store Voucher</button>
    </div> --}}
    </div>
    <div class="modal fade" id="voudiscount" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Item Price</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="#close_modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="checkout_modal_body">
                    <input type="hidden" id="vou_discount" name="vou_discount">
                    <input type="hidden" id="hid_order_id">
                    <input type="hidden" id="dis_type">
                    <input type="hidden" id="dis_val">
                    <div class="form-group">
                        <label class="font-weight-bold">Voucher Total</label>
                        <input type="text" class="form-control" readonly id="voucher_total" value="">
                    </div>
                    <div class="row text-center">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio_foc"
                                onclick="foc_radio()">
                            <label class="form-check-label" for="radio_foc">
                                FOC
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio_percent"
                                onclick="percent_radio()">
                            <label class="form-check-label" for="radio_percent">
                                Discount Percent
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio_amount"
                                onclick="amount_radio()">
                            <label class="form-check-label" for="radio_amount">
                                Discount Amount
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-3" id="dis_foc">
                        <label class="font-weight-bold">FOC</label>
                        <input type="text" class="form-control" value="0">
                    </div>
                    <div class="form-group mt-3" id="dis_percent">
                        <label class="font-weight-bold">Discount Percent</label>
                        <input type="text" class="form-control" value="" placeholder="Enter percent (%)"
                            onkeyup="percent_dis(this.value)">
                    </div>
                    <div class="form-group mt-3" id="dis_amount">
                        <label class="font-weight-bold">Discount Amount</label>
                        <input type="text" class="form-control amount_dis" value="" placeholder="Enter Amount"
                            onkeyup="amount_dis(this.value)">
                    </div>
                    <div class="form-group mt-3">
                        <label class="font-weight-bold">Current Voucher Total</label>
                        <input type="text" class="form-control" readonly id="curr_voucher_total" value="">
                    </div>
                    <div class="form-group mt-3">
                        <label class="font-weight-bold">Pay Amount</label>
                        <input type="text" class="form-control" value="" id="pay_amount"
                            placeholder="Enter Pay Amount" onkeyup="pay_amt(this.value)">
                    </div>
                    <div class="form-group mt-3">
                        <label class="font-weight-bold">Change</label>
                        <input type="text" class="form-control" readonly id="change_amount" value="">
                    </div>
                    <button type="button" class="btn btn-success mt-4" onclick="change_price()" btn-lg btn-block">Store
                        Voucher</button>
                </div>


            </div>
        </div>
    </div>
    <div class="modal fade" id="dis_radio_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Store Voucher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-2">
                            <h4 class="font-weight-bold">Discount:</h4>
                        </div>
                        {{-- <div class="col-md-4 form-check">
                            <input class="form-check-input" type="radio" name="flexRadio" id="radio_yes" onclick="yes_radio()">
                            <label class="form-check-label" for="radio_yes">
                                YES
                            </label>
                        </div> --}}
                        <div class="col-md-4 form-check">
                            <input class="form-check-input" type="radio" name="flexRadio" id="radio_no"
                                onclick="no_radio()">
                            <label class="form-check-label" for="radio_no">
                                NO
                            </label>
                        </div>
                    </div>
                    <div class="form-group" id="dis_voucher_total">
                        <label class="font-weight-bold">Voucher Total</label>
                        <input type="text" class="form-control" readonly id="voucher_total_dis" value="">
                    </div>
                    <div class="form-group mt-3" id="dis_pay_amount">
                        <label class="font-weight-bold">Pay Amount</label>
                        <input type="text" class="form-control" value="" id="pay_amount_dis"
                            placeholder="Enter Pay Amount" onkeyup="pay_dis(this.value)">
                    </div>
                    <div class="form-group mt-3" id="dis_change_amount">
                        <label class="font-weight-bold">Change</label>
                        <input type="text" class="form-control" readonly id="change_amount_dis" value="">
                    </div>
                </div>
                <div class="modal-footer" id="dis_footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="change_price()">Store Voucher</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#dis_foc').hide();
            $('#dis_percent').hide();
            $('#dis_amount').hide();
        })

        function yes_radio() {
            // alert('yes');
            $('#dis_radio_form').modal('hide');
            $('#voudiscount').modal('show');
        }

        function no_radio() {
            // alert('no');
            $('#dis_voucher_total').show();
            $('#dis_pay_amount').show();
            $('#dis_change_amount').show();
            $('#dis_footer').show();
        }

        function foc_radio() {
            $('#dis_foc').show();
            $('#dis_percent').hide();
            $('#dis_amount').hide();
            var dis_value = $('#curr_voucher_total').val(0);
            $('#dis_type').val(1);
            $('#dis_val').val(0);
        }

        function percent_radio() {
            $('#dis_foc').hide();
            $('#dis_percent').show();
            $('#dis_amount').hide();
            $('#dis_type').val(2);
        }

        function amount_radio() {
            $('#dis_foc').hide();
            $('#dis_percent').hide();
            $('#dis_amount').show();
            $('#dis_type').val(3);
        }

        function percent_dis(val) {
            // alert(val);
            var v_total = $('#voucher_total').val();
            // alert(v_total);
            var per_amt = v_total - (val / 100) * v_total;
            $('#curr_voucher_total').val(per_amt);
            $('#dis_val').val(val);
        }

        function amount_dis(val) {
            // alert(val);
            var v_total = $('#voucher_total').val();
            var per_amt = v_total - val;
            $('#curr_voucher_total').val(per_amt);
            $('#dis_val').val(val);
        }

        function pay_amt(val) {
            // alert(val);
            var curr_amt = $('#curr_voucher_total').val();
            $('#change_amount').val(val - curr_amt);
        }

        function pay_dis(val) {
            // alert(val);
            var curr_amt = $('#voucher_total_dis').val();
            $('#change_amount_dis').val(val - curr_amt);
        }

        function change_price(order_id) {
            // alert(order_id);
            localStorage.setItem("order_id", order_id);
            // $('#voudiscount').modal('hide');
            var order_id = $('#hid_order_id').val();
            console.log(order_id);
            var discount_type = $('#dis_type').val();
            var discount_value = $('#dis_val').val();
            var pay_value = $('#pay_amount').val();
            var change_value = $('#change_amount').val();
            var pay_value_dis = $('#pay_amount_dis').val();
            var change_value_dis = $('#change_amount_dis').val()

            // localStorage.setItem('order_id', order_id);

            $.ajax({

                type: 'POST',

                url: '/DiscountForm',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "order_id": order_id,
                    "discount_type": discount_type,
                    "discount_value": discount_value,
                    "pay_amount": pay_value,
                    "change_amount": change_value,
                    "pay_amount_dis": pay_value_dis,
                    "change_amount_dis": change_value_dis,
                },

                success: function(data) {
                    console.log("data", data);
                    // $('#voudiscount').modal('show');
                    var orderId = $('#hid_order_id').val(order_id);
                    console.log('Data is', orderId);
                    $('#dis_type').val();
                    $('#dis_val').val();
                    $('#voucher_total_dis').val(data);
                    $('#voucher_total').val(data);
                    if (data.error) {
                        swal({
                            title: "Failed!",
                            text: "Something Wrong!",
                            icon: "error",
                        });
                    } else {


                        swal({
                            title: "Success!",
                            text: "This Voucher Successfully Sent to Admin!",
                            icon: "success",
                        });

                        var url = '{{ route('customer_shop_order_voucher', ':order_id') }}';
                        let id = localStorage.getItem("order_id");
                        url = url.replace(':order_id', id);

                        setTimeout(function() {

                            window.location.href = url;

                        }, 1000);
                    }
                }

            });

        }


        //start modify
        function AddMoreItem(order) {
            if ($('.custom-control-input').prop('checked')) {
                // alert('success');
                var take_away = 1;
            } else {
                var take_away = 0;
            }

            var mycart = localStorage.getItem('mycart');

            var myremark = localStorage.getItem('myremark');

            if (!mycart) {

                swal({
                    title: "Please Check",
                    text: "Menu Item Cannot be Empty to Check Out",
                    icon: "info",
                });

            } else {
                $('#add_complain').attr('value', myremark);

                $("#option_lists").attr('value', mycart);

                $("#order_id").attr('value', order);

                $("#t_add_away").attr('value', take_away);

                $("#add_more_item").submit();

                localStorage.clear();

            }

        }
        // function storeVoucher(order_id){
        // console.log(order_id);
        //     $.ajax({

        //         type:'POST',

        //         url:'/DiscountForm',

        //         data:{
        //         "_token":"{{ csrf_token() }}",
        //         "order_id":order_id,
        //         },

        //         success:function(data){
        //             console.log(data);
        //             // $('#voudiscount').modal('show');
        //             var orderId = $('#hid_order_id').val(order_id);
        //             console.log('Data is',orderId);
        //             $('#dis_type').val();
        //             $('#dis_val').val();
        //             $('#voucher_total_dis').val(data);
        //             $('#voucher_total').val(data);
        //         }
        //         // console.log(data);

        //     })
        //     $('#dis_radio_form').modal('show');
        //     $('#dis_voucher_total').hide();
        //     $('#dis_pay_amount').hide();
        //     $('#dis_change_amount').hide();
        //     $('#dis_footer').hide();
        // }

        //end modify



        function done(table_id) {
            $.ajax({

                type: 'POST',

                url: '/waiterdone',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "table_id": table_id,
                },

                success: function(data) {
                    swal({
                        title: "Success!",
                        text: "Successfully Pay Amount!",
                        icon: "success",
                    });

                }
            })
        }
    </script>
@endsection
