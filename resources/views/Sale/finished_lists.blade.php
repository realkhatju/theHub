@extends('master')

@section('title','Finished Shop Order Page')

@section('place')

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Shop Order Page</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Back to Dashborad</a></li>
        <li class="breadcrumb-item active">Shop Order Page</li>
    </ol>
</div>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="font-weight-bold mt-2">Finished Shop Order List</h4>
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <div class=" offset-md-2 col-md-2">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" id="start_date">
                    </div>
                    <div class="col-md-2">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" id="end_date">
                    </div>
                    <div class="col-md-2">
                        <label for="">Discount Type</label>
                        <div class="form-group">
                            <select class="form-control custom-select shopOrdelivery" id="discount_type">
                                <option value="0">All</option>
                                <option value="1">Foc</option>
                                <option value="2">Discount</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="">Pay Type</label>
                        <div class="form-group">
                            <select class="form-control custom-select shopOrdelivery" id="pay_type">
                                <option value="1">Bank</option>
                                <option value="2">Cash</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2" style="margin-top:35px;">
                        <button class="btn btn-m btn-primary" onclick="datefilter()">Search</button>
                    </div>
                </div>
                <div class="table-responsive">
                    {{-- <table class="table" id="example23">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Table Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_lists as $order)
                                <tr>
                                	<td>{{$order->order_number}}</td>
                                    @if($order->table_id == 0)
                                    <td>Take Away</td>
                                    @else
                                    <td>{{$order->table->table_number}}</td>
                                    @endif
                                    <td>

                                    	<a href="{{route('shop_order_voucher', $order->id)}}" class="btn btn-info">Check Voucher</a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    <table class="table" id="example23">
                        <thead>
                            <tr class="text-center">
                                <th>
                                   Voucher Number
                                </th>
                                <th>
                                    Total Amount
                                </th>
                                <th>
                                    Total Quantity
                                </th>
                                <th>
                                    Table No.
                                </th>
                                <th>
                                    Foc Value
                                </th>
                                <th>
                                    Discount Value
                                </th>
                                <th>
                                    Pay Type
                                </th>
                                <th>
                                    Pay Remark
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody id="sale_table">
                            @foreach($voucher as $vouc)
                            <tr class="text-center">
                                <td>{{$vouc->voucher_code}}</td>
                                <td>{{$vouc->total_price}}</td>
                                <td>{{$vouc->total_quantity}}</td>
                                @if ($vouc->type == 1)
                                <td>{{$vouc->shopOrder->table->table_number}}</td>
                                @else
                                <td>Delivery Order</td>
                                @endif
                                @if ($vouc->discount_type == 1)
                                <td>{{$vouc->total_price}} Ks</td>
                                @elseif($vouc->discount_type == null || $vouc->discount_type != 2 || $vouc->discount_type != 3)
                                <td>0 Ks</td>
                                @endif
                                @if ($vouc->discount_type == 1)
                                <td>0 Ks</td>
                                @elseif ($vouc->discount_type == 2)
                                <td>{{$vouc->discount_value}} %</td>
                                @elseif($vouc->discount_type == 3)
                                <td>{{$vouc->discount_value}} Ks</td>
                                @elseif($vouc->discount_type == null)
                                <td>0 Ks</td>
                                @endif
                                @if ($vouc->pay_type == 1)
                                <td>Bank</td>
                                @elseif($vouc->pay_type == 2)
                                <td>Cash</td>
                                @elseif ($vouc->pay_type == 0)
                                <td>No type</td>
                                @endif
                                <td>Kpay or Wave</td>
                                <td>{{$vouc->date}}</td>
                                <td>
                                    {{-- @if ($vouc->type == 2)
                                    <a href="{{route('delivery_order_voucher',$vouc->order->id)}}" class="btn btn-info">Check Voucher</a>
                                        @if ($vouc->status == 0)
                                        <a class="btn btn-danger text-white" onclick="cancelvoucher({{$vouc->id}})" id="hide_{{$vouc->id}}">Cancel</a>
                                        <span id="cancel_{{$vouc->id}}" hidden>(CANCEL)</span>
                                        @else
                                        <span>(CANCEL)</span>
                                        @endif
                                    @else --}}
                                    <a href="{{route('shop_order_voucher',$vouc->shopOrder->id)}}" class="btn btn-info">Check Voucher</a>
                                        {{-- @if ($vouc->status == 0)
                                        <a class="btn btn-danger text-white" onclick="cancelvoucher({{$vouc->id}})" id="hide_{{$vouc->id}}">Cancel</a>
                                        <span id="cancel_{{$vouc->id}}" hidden>(CANCEL)</span>
                                        @else
                                        <span>(CANCEL)</span>
                                        @endif
                                    @endif --}}
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
@endsection

@section('js')
 <script>

    function datefilter(){
        let start_date = $('#start_date').val();
        let end_date = $('#end_date').val();
        let pay_type = $('#pay_type').val();
        let discount_type = $('#discount_type').val();

        $.ajax({
        type:'POST',
        url:'/Finished-Order-DateFilter',
        data:{
        "_token":"{{csrf_token()}}",
        "start_date":start_date,
        "end_date":end_date,
        "pay_type":pay_type,
        "discount_type":discount_type
        },
        success:function(data){
            let html = '';
            $.each(data, function(i,v){
                console.log(data)
                let url1 = "{{url('/Shop-Order-Voucher/')}}/"+v.shop_order.id;
                let url2 = "{{url('/delivery_order_voucher/')}}/"+v.shop_order.id;
                html +=`
                <tr class="text-center">
                    <td>${v.voucher_code}</td>
                    <td>${v.total_price}</td>
                    <td>${v.total_quantity}</td>`;
                    if (v.type == 1){
                        html += `
                        <td>${v.shop_order.table.table_number}</td>
                        `;
                    }
                    else{
                        html += `
                        <td>Delivery Order</td>
                        `;
                    }
                    if (v.discount_type == 1){
                        html += `<td>${v.total_price}Ks</td>`
                    }
                    else if(v.discount_type == null || v.discount_type != 2 || v.discount_type != 3){
                        html += `<td>0 Ks</td>`
                    }
                    if (v.discount_type == 1){
                        html += `<td>0 Ks</td>`
                    }
                    else if (v.discount_type == 2){
                        html += `<td>${v.discount_value} %</td>`
                    }
                    else if(v.discount_type == 3){
                        html += `<td>${v.discount_value} Ks</td>`
                    }
                    else if(v.discount_type == null){
                        html += `<td>0 Ks</td>`
                    }
                    if (v.pay_type == 1){
                        html += `<td>Bank</td>`
                    }
                    else if(v.pay_type == 2){
                        html += `<td>Cash</td>`
                    }
                    else if (v.pay_type == 0){
                        html += `<td>No Type</td>`
                    }
                    html += `<td>Kpay or Wave</td>`
                    html += `
                    <td>${v.date}</td>
                    <td>
                    `;

                        if (v.type == 2){
                            html += `
                            <a href="${url2}" class="btn btn-info">Check Voucher</a>
                        </td>

                        </tr>
                            `;
                        }
                        else{
                            html +=`
                            <a href="${url1}" class="btn btn-info">Check Voucher</a>
                        </td>

                        </tr>
                            `;
                        }


            })
            $('#sale_table').html(html);
        }
        })
    }

    function cancelvoucher(id){
        // alert(id);
        $('#cancel_'+id).removeAttr('hidden');
        $('#hide_'+id).hide();

        $.ajax({
        type:'POST',
        url:'/Voucher-Cancel',
        data:{
        "_token":"{{csrf_token()}}",
        "voucher_id":id,
        },
        success:function(data){
            console.log(data);
        }
    })

    }
 </script>
@endsection
