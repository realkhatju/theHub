@extends('customer_master')

@section('title','Shop Order Pending Page')

@section('place')



@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow ">
            <div class="card-header">
                <h4 class="font-weight-bold mt-2">Pending Shop Order List</h4>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table" id="example23">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Table Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pending_lists as $order)
                                <tr>
                                    <td>{{$order->order_number}}</td>
                                    @if($order->table_id == 0)
                                    <td>Take Away</td>
                                    @else
                                    <td>{{$order->table->table_number}}</td>
                                    @endif
                                    <td>
                                        <a href="{{route('customer_shop_order_details', $order->id)}}" class="btn btn-info">Check Order Details</a>

                                        <a href="{{route('add_more_customer_item', $order->id)}}" class="btn btn-success">Add More Item</a>

                                        <a href="#" class="btn btn-info" onclick="new_change_price({{$order->id}})">Store Voucher</a>
                                        <a href="{{route('customerCancelOrder', $order->id)}}" class="btn btn-danger">Cancel</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
                <button type="button" class="btn btn-success mt-4" onclick="AddMoreItem()" btn-lg
                    btn-block">Store Voucher</button>
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
            <div class="row">
                <div class="col-3">
                    <div class="form-group mt-3" id="promotion">
                        <label class="control-label">Promotion</label>
                           <div class="switch">
                               <label>OFF
                               <input type="checkbox"  name="customer_console" id="console" onchange="promotion_on()"><span class="lever"></span>ON</label>
                            </div>
                   </div>
                </div>
                <div class="col-9">
                    <div class="form-group mt-3" id="promotion_name">
                        <label class="font-weight-bold">Choose Promotion</label>
                        <select class="form-control" name="purchaseitem" onchange="promotionchange(this.value)">
                            <option value="" hidden>Select Promotion</option>
                            @foreach ($promotion as $p)
                            <option value="{{$p->id}}">{{$p->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" id="ispromotion">

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
    $('#promotion').show();
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
function promotion_on(){
    if($('#console').prop("checked") == true){
         var console = 1;
         $('#promotion_name').show();
    }else{
       var console = 0;
       $('#promotion_name').hide();
    }
}
function new_change_price(order_id){
        // alert(order_id);
        localStorage.setItem("order_id",order_id);
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

            type:'POST',

            url:'/DiscountForm',

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
                console.log("data",data);
                // $('#voudiscount').modal('show');
                var orderId = $('#hid_order_id').val(order_id);
                console.log('Data is',orderId);
                $('#dis_type').val();
                $('#dis_val').val();
                $('#voucher_total_dis').val(data);
                $('#voucher_total').val(data);
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

                    var url = '{{ route("customer_shop_order_voucher", ":order_id") }}';
                    let id = localStorage.getItem("order_id");
                    url = url.replace(':order_id', id);

                    setTimeout(function(){

                        window.location.href= url;

                    }, 1000);
                }
            }

        });

    }


    function storeVoucher(order_id){
        //
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
        $('#promotion').hide();
        $('#promotion_name').hide();
        $('#dis_footer').hide();
        //
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

    function AddMoreItem(order){
        alert("test");
        if($('.custom-control-input').prop('checked')){
            // alert('success');
            var take_away = 1;
        }else{
            var take_away = 0;
        }

        var mycart = localStorage.getItem('mycart');

        var myremark = localStorage.getItem('myremark');

        if(!mycart){

            swal({
                title:"Please Check",
                text:"Menu Item Cannot be Empty to Check Out",
                icon:"info",
            });

        }else{
            $('#add_complain').attr('value',myremark);

            $("#option_lists").attr('value', mycart);

            $("#order_id").attr('value', order);

            $("#t_add_away").attr('value', take_away);

            $("#add_more_item").submit();

            localStorage.clear();

        }

    }

    function promotionchange(id){
        let order = $('#hid_order_id').val();
        $.ajax({

        type:'POST',

        url:'/PromotionCheck',

        data:{
        "_token":"{{csrf_token()}}",
        "promotion_id":id,
        "order_id": order,
        },

        success:function(data){
            let html = '';
           if(data.promotion.length == 0){
            $('#ispromotion').html('<span class="text-danger offset-3">This promotion is expired.</span>')
           }else{
             if(data.promotion.type == 1){
                var vtotal = $('#voucher_total_dis').val();
                if(data.promotion.voucher_amount <= vtotal){
                if(data.promotion.reward == 1){
                    html += `<span class="text-success text-center offset-1">Cash Back : ${data.promotion.amount}</span>`;
                    $('#ispromotion').html(html);
                }else if(data.promotion.reward == 2){
                    html += `<span class="text-success text-center offset-1">FOC Items : ${data.promotion.foc_items}</span>`;
                    $('#ispromotion').html(html);
                }
               else{
                    html += `<span class="text-success text-center offset-1">Discount Percentage : ${data.promotion.percent} %</span>`;
                    $('#ispromotion').html(html);
                }
            }
            else{
                $('#ispromotion').html('<span class="text-danger offset-3">This voucher amount is less than promotion amount.</span>');
            }
             }

           }
        }
        })

    }


</script>

@endsection
