@extends('master')

@section('title','Shop Order Details')

@section('place')

<!--<div class="col-md-5 col-8 align-self-center">-->
<!--<h3 class="text-themecolor m-b-0 m-t-0">Pending Order Details</h3>-->
<!--<ol class="breadcrumb">-->
<!--<li class="breadcrumb-item"><a href="{{route('index')}}">Back to Dashborad</a></li>-->
<!--<li class="breadcrumb-item active">Pending Order Details</li>-->
<!--</ol>-->
<!--</div>-->

@endsection


@section('content')

<?php $user = session()->get('user')->role_flag;?>

<div class="page-wrapper" >
<div class="container-fluid">
@if ($mealItem1)
<div class="row justify-content-center">
    <div class="col-md-5 printableArea1" style="width:45%;">
        <div class="card card-body">
            <div class="row" style="margin:10px">
                <div class="col-md-12">
                    <div style="text-align:center;">
                        <address>
                            <b style="font-size:17px;">Upper Deck&nbsp;&nbsp;(<span class="text-danger">Kitchen</span>)</b><br>
                            <b style="font-size:17px;">Bar & Restaurant</b><br>
                            <b style="font-size:17px;" class="text-dark">Main Dish</b>
                        </address>
                    </div>
                    <div class="pull-right text-left" style="margin-top:20px;">
                        <b style="font-size:16px;">Order Number&nbsp;&nbsp;{{$pending_order_details->order_number}}</b><br>
                        <b style="font-size:16px;">Table Name&nbsp;&nbsp;{{$pending_order_details->table->table_number??"Take Away"}}</b><br>
                    </font>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:12px;">
                    <div class="table-responsive" style="clear: both;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Item Name</td>
                                    <td>Counting Unit Name</td>
                                    <td>Order Quantity</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pending_order_details->option as $option)
                                        @if ($option->menu_item->meal_id == 1)
                                        {{-- @if ($option->pivot->tocook == 0) --}}
                                            <tr>
                                                <td><b style="font-size:17px;">{{$option->menu_item->item_name}}</b></td>
                                                <td><b style="font-size:17px;">{{$option->name}}</b></td>
                                                <td><b style="font-size:17px;">{{$option->pivot->quantity}}</b></td>
                                            </tr>
                                            @if ($option->pivot->note != null && $option->pivot->note != 'Note Default')
                                            <tr>
                                                <th class="text-danger font-weight-bold">Notes</th>
                                                <td class="text-danger" colspan="3">{{$option->pivot->note}}</td>
                                            </tr>
                                            @endif
                                        {{-- @endif --}}
                                        @endif
                                @endforeach
                            </tbody>
                                {{-- @foreach ($notes as $item)
                                    @foreach ($option_id as $opid)
                                        @if ($item->option_id == $opid->id)
                                            @if ($mealItem1)
                                                @if ($item->note != null && $item->note != 'Note Default')
                                                <tr>
                                                    <th class="text-danger font-weight-bold">Notes</th>
                                                    <td class="text-danger font-weight-bold">{{$opid->name}}</td>
                                                    <td class="text-danger" colspan="3">{{$item->note}}</td>
                                                </tr>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach --}}
                        </table>
                        <h6 class=" font-weight-bold" style="text-align:center;">***************</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="text-center">
        <button id="print1" class="btn btn-info" type="button">
            <span><i class="fa fa-print"></i> Main Dish Print</span>
        </button>
    </div>
</div>
@endif
<div class="row justify-content-center mt-5">
    <div class="col-md-5 printableArea2" style="width:45%;">
        <div class="card card-body">
            <div class="row" style="margin:10px">
                <div class="col-md-12">
                    <div style="text-align:center;">
                        <address>
                            <b style="font-size:17px;">Upper Deck&nbsp;&nbsp;(<span class="text-danger">Kitchen</span>)</b><br>
                            <b style="font-size:17px;">Bar & Restaurant</b><br>
                            <b style="font-size:17px;" class="text-dark">Main Dish</b>
                        </address>
                    </div>
                    <div class="pull-right text-left" style="margin-top:20px;">
                        <b style="font-size:16px;">Order Number&nbsp;&nbsp;{{$pending_order_details->order_number}}</b><br>
                        <b style="font-size:16px;">Table Name&nbsp;&nbsp;{{$pending_order_details->table->table_number??"Take Away"}}</b><br>
                    </font>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:12px;">
                    <div class="table-responsive" style="clear: both;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Item Name</td>
                                    <td>Counting Unit Name</td>
                                    <td>Order Quantity</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pending_order_details->option as $option)
                                        @if ($option->menu_item->meal_id == 2)
                                        {{-- @if ($option->pivot->tocook == 0) --}}
                                        <tr>
                                            <td><b style="font-size:17px;">{{$option->menu_item->item_name}}</b></td>
                                            <td><b style="font-size:17px;">{{$option->name}}</b></td>
                                            <td><b style="font-size:17px;">{{$option->pivot->quantity}}</b></td>
                                        </tr>
                                        @if ($option->pivot->note != null && $option->pivot->note != 'Note Default')
                                        <tr>
                                            <th class="text-danger font-weight-bold">Notes</th>
                                            <td class="text-danger" colspan="3">{{$option->pivot->note}}</td>
                                        </tr>
                                        @endif
                                        {{-- @endif --}}
                                        @endif
                                @endforeach
                            </tbody>
                        </table>
                        <h6 class=" font-weight-bold" style="text-align:center;">***************</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="text-center">
        <button id="print2" class="btn btn-info" type="button">
            <span><i class="fa fa-print"></i>Drink Print</span>
        </button>
    </div>
</div>
</div>
</div>



<div class="modal fade" id="voudiscount" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-white">Item Price</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    id="#close_modal">
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio_foc" onclick="foc_radio()">
                        <label class="form-check-label" for="radio_foc">
                          FOC
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio_percent" onclick="percent_radio()">
                        <label class="form-check-label" for="radio_percent">
                          Discount Percent
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio_amount" onclick="amount_radio()">
                        <label class="form-check-label" for="radio_amount">
                          Discount Amount
                        </label>
                    </div>
                </div>
                <div class="form-group mt-3" id="dis_foc">
                    <label class="font-weight-bold">FOC</label>
                    <input type="text" class="form-control"  value="0">
                </div>
                <div class="form-group mt-3" id="dis_percent">
                    <label class="font-weight-bold">Discount Percent</label>
                    <input type="text" class="form-control"  value="" placeholder="Enter percent (%)" onkeyup="percent_dis(this.value)">
                </div>
                <div class="form-group mt-3" id="dis_amount">
                    <label class="font-weight-bold">Discount Amount</label>
                    <input type="text" class="form-control amount_dis"  value="" placeholder="Enter Amount" onkeyup="amount_dis(this.value)">
                </div>
                <div class="form-group mt-3">
                    <label class="font-weight-bold">Current Voucher Total</label>
                    <input type="text" class="form-control" readonly id="curr_voucher_total" value="">
                </div>
                <div class="form-group mt-3">
                    <label class="font-weight-bold">Pay Amount</label>
                    <input type="text" class="form-control"  value="" id="pay_amount" placeholder="Enter Pay Amount" onkeyup="pay_amt(this.value)">
                </div>
                <div class="form-group mt-3">
                    <label class="font-weight-bold">Change</label>
                    <input type="text" class="form-control" readonly id="change_amount" value="">
                </div>
                <button type="button" class="btn btn-success mt-4" onclick="change_price()" btn-lg
                    btn-block">Store Voucher
                </button>

            </div>


        </div>
    </div>
</div>
<div class="modal fade" id="dis_radio_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <div class="col-md-4 form-check">
                    <input class="form-check-input" type="radio" name="flexRadio" id="radio_yes" onclick="yes_radio()">
                    <label class="form-check-label" for="radio_yes">
                      YES
                    </label>
                </div>
                <div class="col-md-4 form-check">
                    <input class="form-check-input" type="radio" name="flexRadio" id="radio_no" onclick="no_radio()">
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
                <input type="text" class="form-control"  value="" id="pay_amount_dis" placeholder="Enter Pay Amount" onkeyup="pay_dis(this.value)">
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


// print start
$(document).ready(function() {
    $("#print1").click(function() {
        // window.print();
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea1").printArea(options);
    });
    $("#print2").click(function() {
        // window.print();
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea2").printArea(options);
    });
});

// print end
function yes_radio(){
    // alert('yes');
    $('#dis_radio_form').modal('hide');
    $('#voudiscount').modal('show');
}
function no_radio(){
    // alert('no');
    $('#dis_voucher_total').show();
    $('#dis_pay_amount').show();
    $('#dis_change_amount').show();
    $('#dis_footer').show();
}
function foc_radio(){
    $('#dis_foc').show();
    $('#dis_percent').hide();
    $('#dis_amount').hide();
    var dis_value = $('#curr_voucher_total').val(0);
    $('#dis_type').val(1);
    $('#dis_val').val(0);
}
function percent_radio(){
    $('#dis_foc').hide();
    $('#dis_percent').show();
    $('#dis_amount').hide();
    $('#dis_type').val(2);
}
function amount_radio(){
    $('#dis_foc').hide();
    $('#dis_percent').hide();
    $('#dis_amount').show();
    $('#dis_type').val(3);
}
function percent_dis(val){
    // alert(val);
    var v_total = $('#voucher_total').val();
    // alert(v_total);
    var per_amt = v_total - (val/100)*v_total;
    $('#curr_voucher_total').val(per_amt);
    $('#dis_val').val(val);
}
function amount_dis(val){
    // alert(val);
    var v_total = $('#voucher_total').val();
    var per_amt = v_total-val;
    $('#curr_voucher_total').val(per_amt);
    $('#dis_val').val(val);
}
function pay_amt(val){
    // alert(val);
    var curr_amt = $('#curr_voucher_total').val();
    $('#change_amount').val(val - curr_amt);
}
function pay_dis(val){
    // alert(val);
    var curr_amt = $('#voucher_total_dis').val();
    $('#change_amount_dis').val(val - curr_amt);
}
function change_price(){
    // $('#voudiscount').modal('hide');
    var order_id = $('#hid_order_id').val();
    var discount_type = $('#dis_type').val();
    var discount_value = $('#dis_val').val();
    var pay_value = $('#pay_amount').val();
    var change_value = $('#change_amount').val();
    var pay_value_dis = $('#pay_amount_dis').val();
    var change_value_dis = $('#change_amount_dis').val()

     $.ajax({

        type:'POST',

        url:'/ShopVoucherStore',

        data:{
        "_token":"{{csrf_token()}}",
        "order_id":order_id,
        "discount_type" : discount_type ,
        "discount_value" : discount_value,
        "pay_amount" : pay_value,
        "change_amount" : change_value,
        "pay_amount_dis" : pay_value_dis,
        "change_amount_dis" : change_value_dis,
        },

        success:function(data){
            // alert(data);
            if(data.error){
                swal({
                title: "Failed!",
                text : "Something Wrong!",
                icon : "error",
            });
            }
            else{


            swal({
                title: "Success!",
                text : "Successfully Stored!",
                icon : "success",
            });

            var url = '{{ route("shop_order_voucher", ":order_id") }}';

            url = url.replace(':order_id', data.id);

            setTimeout(function(){

                window.location.href= url;

            }, 1000);
            }
        }

        });

}
function storeVoucher(order_id){

        $.ajax({

            type:'POST',

            url:'/DiscountForm',

            data:{
            "_token":"{{csrf_token()}}",
            "order_id":order_id,
            },

            success:function(data){
                // $('#voudiscount').modal('show');
                $('#hid_order_id').val(order_id);
                $('#dis_type').val();
                $('#dis_val').val();
                $('#voucher_total_dis').val(data);
                $('#voucher_total').val(data);
            }
        })
        $('#dis_radio_form').modal('show');
        $('#dis_voucher_total').hide();
        $('#dis_pay_amount').hide();
        $('#dis_change_amount').hide();
        $('#dis_footer').hide();
    }

    function done(table_id){
     $.ajax({

            type:'POST',

            url:'/waiterdone',

            data:{
            "_token":"{{csrf_token()}}",
            "table_id":table_id,
            },

            success:function(data){
            swal({
                title: "Success!",
                text : "Successfully Pay Amount!",
                icon : "success",
            });

            }
            })
    }
    </script>
@endsection
