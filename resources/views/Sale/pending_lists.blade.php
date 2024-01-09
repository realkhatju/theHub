@extends('master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@section('title','Shop Order Pending Page')

@section('place')

<!--<div class="col-md-5 col-8 align-self-center">-->
<!--    <h3 class="text-themecolor m-b-0 m-t-0">Pending Shop Order Page</h3>-->
<!--    <ol class="breadcrumb">-->
<!--        <li class="breadcrumb-item"><a href="{{route('index')}}">Back to Dashborad</a></li>-->
<!--        <li class="breadcrumb-item active">Pending Shop Order Page</li>-->
<!--    </ol>-->
<!--</div>-->

@endsection

@section('content')
<?php $user = session()->get('user')->role_flag;?>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="font-weight-bold mt-2">Pending Shop Order List</h4>
                <button class="btn btn-primary" onclick="requestPermission()"><i class="fa-solid fa-bell"></i></button>
            </div>
            <div class="card-body">
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
                                            <a href="{{route('pending_order_details', $order->id)}}" class="btn btn-info">Check Order Details</a>

                                            @if ($user != 3)
                                            <a href="{{route('kitchen_details', $order->id)}}" class="btn btn-warning">Kitchen Print</a>
                                            @endif


                                            {{-- <a href="{{route('add_more_item', $order->id)}}" class="btn btn-success">Add More Item</a> --}}
                                            @if($user == 3)
                                                {{-- <button class="btn" style="background-color:lightgreen;color:white;" onclick="done({{$order->table_id}})">Done</button> --}}
                                                {{-- <button class="btn btn-danger" style="color:white;" onclick="cancel({{$order->id}})">Cancel</button> --}}
                                                @if($user != 3)
                                                <a href="{{route('cancelorder', $order->id)}}" class="btn btn-danger">Cancel</a>
                                                @endif
                                            @else
                                                <button class="btn btn-primary" onclick="storeVoucher({{$order->id}})">Store Voucher</button>
                                                <a href="{{route('cancelorder', $order->id)}}" class="btn btn-danger">Cancel</a>
                                            @endif
                                            @if ($order->brake_flag == 1)
                                            <button class="btn text-white" type="button" style="background-color:rgb(143, 143, 5);" disabled>
                                                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                                <span role="status">Pending...</span>
                                            </button>
                                            @else
                                            <button class="btn text-white" type="button" style="background-color:rgb(0, 158, 0);" disabled>
                                                <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                                                <span role="status">Ordered</span>
                                            </button>
                                            @endif
                                        </td>
                                        <td>
                                            <span>
                                                @if(now()->diffInHours($order->updated_at) >= 24)
                                                {{ now()->diffInDays($order->updated_at) }} days ago
                                                @elseif (now()->diffInMinutes($order->updated_at) >= 60)
                                                {{ now()->diffInHours($order->updated_at) }} hr ago
                                                @else
                                                {{ now()->diffInMinutes($order->updated_at) }} min ago
                                                @endif
                                            </span>
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
                <div class="form-group mt-3 row" id="bankTypeYes">
                    <label class="col" for="">Pay Type</label>
                    <label class="col" for="">Pay Remark</label>
                    <div class="form-group ">
                        <select class="form-control custom-select bankOrCash col-3" id="pay_type_yes">
                            <option value="1">Bank</option>
                            <option value="2">Cash</option>
                        </select>
                        <input type="text" class="form-control col-8" onkeyup="pay_remark(this.value)" name="pay_remarks">
                        <input type="hidden" id="pay_remark">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group" id="promotionYes">
                            <label class="control-label">Service%</label>
                               <div class="switch">
                                   <label>OFF
                                   <input type="checkbox"  name="customer_console" id="consoleYes" onchange="promotion_on()"><span class="lever"></span>ON</label>
                                </div>
                       </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group" id="">
                            <label class="control-label">Tax</label>
                               <div class="switch">
                                   <label>OFF
                                   <input type="checkbox"  name="" id="" onchange=""><span class="lever"></span>ON</label>
                                   {{-- <input type="text" id="taxYes"> --}}
                                </div>
                       </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group" id="promotion_nameYes">
                            <label class="font-weight-bold">Service Charges</label>
                            <input class="form-control" type="number"  onkeyup="percent_service(this.value)">
                            <input type="hidden" id="service_val" name="service_charges">
                        </div>
                    </div>
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
                    <input class="form-check-input" type="radio" name="flexRadio" id="radio_yes" onclick="yes_radio()" value="true">
                    <label class="form-check-label" for="radio_yes">
                      YES
                    </label>
                </div>
                <div class="col-md-4 form-check">
                    <input class="form-check-input" type="radio" name="flexRadio" id="radio_no" onclick="no_radio()" value="false">
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
            <div class="form-group mt-3 row" id="bankType">
                <label class="col" for="">Pay Type</label>
                <label class="col" for="">Pay Remark</label>
                <div class="form-group">
                    <select class="form-control col-3 custom-select bankOrCash" id="pay_type">
                        <option value="1">Bank</option>
                        <option value="2">Cash</option>
                    </select>
                    <input type="text" class="form-control col-8" onkeyup="pay_remark(this.value)" name="pay_remarks">
                    <input type="hidden" id="pay_remark">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group" id="promotion">
                        <label class="control-label">Service%</label>
                           <div class="switch">
                               <label>OFF
                               <input type="checkbox"  name="customer_console" id="console" onchange="promotion_on()"><span class="lever"></span>ON</label>
                            </div>
                   </div>
                </div>
                <div class="col-3">
                    <div class="form-group" id="">
                        <label class="control-label">Tax</label>
                           <div class="switch">
                               <label>OFF
                               <input type="checkbox"  name="" id="" onchange=""><span class="lever"></span>ON</label>
                            </div>
                   </div>
                </div>
                <div class="col-6">
                    <div class="form-group" id="promotion_name">
                        <label class="font-weight-bold">Service %</label>
                        <input class="form-control" type="number"  onkeyup="percent_service(this.value)">
                        <input type="hidden" id="service_val" name="service_charges">
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
    navigator.serviceWorker.register("sw.js");
    function requestPermission(){
        Notification.requestPermission().then((permission) => {
            if(permission === 'granted'){

                // get service worker
                navigator.serviceWorker.ready.then((sw) => {

                    // subscribe
                    sw.pushManager.subscribe({
                        userVisibleOnly: true,
                        applicationServerKey: "BHK-fZXWC80sFT9QJA-wr8Kd70XwmG_eBKCyaqRMd8F0Crkn3HetpzZU0fm3zDPQqd2dAWL1azODD6UP28bVUrA"
                    }).then((subscription) => {

                        // subscription successfull
                        fetch("/api/push-subscribe",{
                            method: "post",
                            body:JSON.stringify(subscription)
                        }).then( alert("ok"));
                    });
                });
            }
        });
    }
</script>

<script>

 $(document).ready(function() {
    $('#dis_foc').hide();
    $('#dis_percent').hide();
    $('#dis_amount').hide();
    $('#bankType').hide();
    $('#bankTypeYes').hide();

})
function yes_radio(){
    // alert('yes');
    $('#dis_radio_form').modal('hide');
    $('#voudiscount').modal('show');
    $('#bankTypeYes').show();
    $('#promotionYes').show();
    $('#bankTypeYes').show();
}

function no_radio(){
    $('#dis_voucher_total').show();
    $('#dis_pay_amount').show();
    $('#dis_change_amount').show();
    $('#promotion').show();
    $('#dis_footer').show();
    $('#bankType').show();
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
//start modify percent dis
function percent_service(val){
    // alert(val);
    var v_total = $('#voucher_total').val();
    // alert(v_total);
    var per_amt = v_total + (val/100)*v_total;
    $('#curr_voucher_total_service').val(per_amt);
    $('#service_val').val(val);
}
//Pay Remark
function pay_remark(val){
    $('#pay_remark').val(val);
}



//end modify percent dis
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
    if($('#consoleYes').prop("checked") == true){
         var console = 1;
        $('#promotion_nameYes').show();
    }else{
       var console = 0;
       $('#promotion_nameYes').hide();
    }
}
function tax_on(){
    if($('#console').prop("checked") == true){
         var console = 1;
         $('#taxYes').val(1);
    }else{
       var console = 0;
       $('#taxYes').val('console');
    }
}

function change_price(){
    // $('#voudiscount').modal('hide');
    var order_id = $('#hid_order_id').val();
    // console.log(order_id);
    var discount_type = $('#dis_type').val();
    var discount_value = $('#dis_val').val();

    var pay_value = $('#pay_amount').val();
    var service_value = $('#service_val').val();
    // console.log(service_value);
    var change_value = $('#change_amount').val();
    var pay_value_dis = $('#pay_amount_dis').val();
    var change_value_dis = $('#change_amount_dis').val();
    var ispromotion = $('#ispromotion').text();
    var pay_type = 0;
    var radio_yes = $('#radio_yes').val();
    // var radio_no = $('#radio_no').val();
    // console.log(radio_no);
    if(radio_yes == true){
        pay_type = $('#pay_type_yes').val();
    }else{
        pay_type = $('#pay_type').val();
    }
    var pay_remark = $('#pay_remark').val();

    // var bank_type = $("#bankOrCashId").val();
    if($('#console').prop("checked") == true){
         var console = 1;
        if(ispromotion == 'This promotion is expired.' || ispromotion == 'This voucher amount is less than promotion amount.'){
          var promotion = 0;
          var promotion_value = 0;
        }else{
          var p = ispromotion.split(":");
          var promotion = p[0];
          var promotion_value = p[1];
        }
    }else{
       var console = 0;
       var promotion = 0;
       var promotion_value = 0;
    }

    // console.log(service_value);
    if(change_value_dis>=0 && change_value>=0){
        $.ajax({

        type:'POST',

        url:'/ShopVoucherStore',

        data:{
        "_token":"{{csrf_token()}}",
        "order_id":order_id,
        "discount_type" : discount_type ,
        "discount_value" : discount_value,
        "service_value" : service_value,
        "pay_type": pay_type,
        "pay_amount" : pay_value,
        "change_amount" : change_value,
        "pay_amount_dis" : pay_value_dis,
        "change_amount_dis" : change_value_dis,
        "customer_console" : console,
        "promotion" : promotion,
        "promotionvalue" : promotion_value,
        "pay_remark" : pay_remark,
        },

        // alert(data);
        success:function(data){
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
  else{
    swal({
                title: "Failed!",
                text : "Your Pay Amount is less than Voucher Total!",
                icon : "error",
            });
  }

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
                $('#service_val').val();
                $('#pay_remark').val()
                // $('#bankOrCashId').val();

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
        $('#promotion_nameYes').hide();
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
