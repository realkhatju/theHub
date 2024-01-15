@extends('master')

@section('title', 'Sale Records')



@section('place')

    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Sale Records</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Back to dashboard</a></li>
            <li class="breadcrumb-item active">Sale Records</li>
        </ol>
    </div>

@endsection

@section('content')

    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-success">Sale Records</h4>
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="nav nav-pills m-t-30 m-b-30">
                                <li class=" nav-item">
                                    <a href="#navpills-1" class="nav-link active" data-toggle="tab"
                                        aria-expanded="false">daily</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#navpills-2" class="nav-link" data-toggle="tab"
                                        aria-expanded="false">weekly</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#navpills-3" class="nav-link" data-toggle="tab"
                                        aria-expanded="false">monthly</a>
                                </li>
                            </ul>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control custom-select shopOrdelivery">
                                    <option value="1">Shop</option>
                                    {{-- <option value="2">Delivery</option> --}}
                                </select>
                            </div>
                        </div>
                    </div>



                    <br />
                    <div class="tab-content br-n pn">
                        <div id="navpills-1" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label text-success font-weight-bold">daily</label>
                                        <input type="date" class="form-control" id="daily">
                                    </div>
                                </div>

                                <div class="col-md-3 pull-right">
                                    <button class="btn btn-success btn-submit" type="submit" onclick="showDailySale()">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="navpills-2" class="tab-pane">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label text-success font-weight-bold">weekly</label>
                                        <select class="form-control custom-select" id="weekly">
                                            <option value="">select week</option>
                                            <option value="1">one week</option>
                                            <option value="2">two week</option>
                                            <option value="3">three week</option>
                                            <option value="4">four week</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 pull-right">
                                    <button class="btn btn-success btn-submit" type="submit" onclick="showWeeklySale()">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="navpills-3" class="tab-pane">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label text-success font-weight-bold">monthly</label>
                                        <select class="form-control custom-select" id="monthly">
                                            <option value="">select month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 pull-right">
                                    <button class="btn btn-success btn-submit" type="submit" onclick="showMonthlySale()">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="nav nav-pills m-t-30 m-b-30">
                                <li class="nav-item">
                                    <a href="#navpills-djlsfj" class="nav-link active" data-toggle="tab"
                                        aria-expanded="false">All Summary</a>
                                </li>

                                <li class=" nav-item">
                                    <a href="#navpills-djlsfjFoods" class="nav-link" data-toggle="tab"
                                        aria-expanded="false">Food</a>
                                </li>

                                <li class=" nav-item">
                                    <a href="#navpills-djlsfjDrinks" class="nav-link" data-toggle="tab"
                                        aria-expanded="false">Drinks</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#jdfslfjs" class="nav-link" data-toggle="tab" aria-expanded="false">Table &
                                        Room</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <br />

                    <div class="tab-content br-n pn">
                        <div id="navpills-djlsfj" class="tab-pane active">
                            <div class="card mt-3" id="report">
                                <div class="card-body text-center">
                                    <div class="col-md-5 printableArea1" style="width:45%;">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Name</strong></th>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Value</strong></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Food Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="total_qty_all" class="text-danger">
                                                                                    </span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Drink Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="total_qty_drink" class="text-danger"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Foc Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="focTotal" class="text-danger"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Discount Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span class="text-danger"
                                                                                    id="disTotal"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Tax Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span class="text-danger"
                                                                                    id="taxTotal"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Service Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="serviceTotal" class="text-danger"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Net Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="netTotal" class="text-danger"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Bank Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="bankTotal" class="text-danger"
                                                                                    style="font-weight:bold"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Cash Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="cashTotal" class="text-danger"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button id="print1" class="btn btn-info" type="button">
                                            <span><i class="fa fa-print"></i> Print</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="navpills-djlsfjFoods" class="tab-pane">
                            <div class="card mt-3" id="report">
                                <div class="card-body text-center">
                                    <div class="col-md-5 printableArea2" style="width:45%;">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Item Name</strong></th>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Option Name</strong></th>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Qty</strong></th>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Subtotal</strong></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="salecountlists">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="row text-center sale_count_footer">
                                                            <div class="col-md-6">
                                                                <p class="text-success">Total Qty: <span id="total_qty" class="text-dark"
                                                                        style="font-weight:bold">
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="text-success">Total : <span id="total_price" class="text-dark"
                                                                        style="font-weight:bold">
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button id="print2" class="btn btn-info" type="button">
                                            <span><i class="fa fa-print"></i> Print</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="navpills-djlsfjDrinks" class="tab-pane">
                            <div class="card mt-3" id="report">
                                <div class="card-body text-center">
                                    <div class="col-md-5 printableArea3" style="width:45%;">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Item Name</strong></th>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Option Name</strong></th>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Qty</strong></th>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Subtotal</strong></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="salecountlistsD">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="row text-center sale_count_footer">
                                                            <div class="col-md-6">
                                                                <p class="text-success">Total Qty: <span id="total_qtyD" class="text-dark"
                                                                        style="font-weight:bold">
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="text-success">Total : <span id="total_priceD" class="text-dark"
                                                                        style="font-weight:bold">
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button id="print3" class="btn btn-info" type="button">
                                            <span><i class="fa fa-print"></i> Print</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="jdfslfjs" class="tab-pane">
                            <div class="card mt-3" id="report">
                                <div class="card-body text-center">
                                    <div class="col-md-5 printableArea4" style="width:45%;">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Name</strong></th>
                                                                        <th class="text-info"><strong style="font-size:16px;font-weight:bold;">Value</strong></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Table Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="tableTotal" class="text-danger"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Room Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="roomTotal" class="text-danger"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">Spa Total
                                                                                </strong>
                                                                            </td>
                                                                            <td>
                                                                                <strong style="font-size:16px;font-weight:bold;">
                                                                                    <span id="spaTotal" class="text-danger"></span>
                                                                                </strong>
                                                                            </td>
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button id="print4" class="btn btn-info" type="button">
                                            <span><i class="fa fa-print"></i> Print</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function() {

            $('#report').hide();

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
            $("#print3").click(function() {
                // window.print();
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea3").printArea(options);
            });
            $("#print4").click(function() {
                // window.print();
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea4").printArea(options);
            });

        });

        function saleRecord(data) {
            console.log(data);
            var html = "";
            var total = 0;
            var total_qty = 0;
            var total_price = 0;

            var htmlD = "";
            var totalD = 0;
            var total_qtyD = 0;
            var total_priceD = 0;

            var foc_total = 0;
            var tax_total = 0;
            var service_total = 0;
            var discount_total = 0;
            var net_total = 0;

            var table_total = 0;
            var room_total = 0;
            var spa_total = 0;
            var ownerB_total = 0;

            var discountTotalValue = 0;
            var netTableTotal = 0;
            var netRoomTotal = 0;

            var foc = 0;
            var discount2 = 0;
            var discount1 = 0;
            var discountValueAmount = 0;
            var discountValuePercent = 0;
            var tax = 0;
            var discountFoc = 0;
            var service_charges = 0;
            var netTax = 0;
            var bank_total = 0;
            var cash_total = 0;
            console.log(data);
            // console.log(data.total_qty.length);
            $.each(data.options, function(i, v) {
                $.each(data.menu_items, function(j, val) {
                    $.each(data.total_qty, function(k, value) {
                        if (v.id == value.option_id && v.menu_item_id == val.id) {

                            var subtotal = value.qty * v.sale_price;
                            html += `
                            <tr class="text-center">
                                    <td>${val.item_name}</td>
                                    <td><p>${v.name}</p></td>
                                    <td><p>${value.qty}</p></td>
                                    <td><p>${subtotal}</p></td>
                            </tr>
                                    `;
                            total += subtotal;
                            total_qty += value.qty;
                        }
                    })
                })
            })

            $.each(data.options, function(i, v) {
                $.each(data.menu_items, function(j, val) {
                    $.each(data.total_qty_drink, function(k, value) {
                        if (v.id == value.option_id && v.menu_item_id == val.id) {

                            var subtotal = value.qty * v.sale_price;
                            htmlD += `
                            <tr class="text-center">
                                <td>${val.item_name}</td>
                                <td><p>${v.name}</p></td>
                                <td><p>${value.qty}</p></td>
                                <td><p>${subtotal}</p></td>
                            </tr>
                                    `;
                            totalD += subtotal;
                            total_qtyD += value.qty;
                        }
                    })
                })
            })


            discount_total2 = 0;
            discount_total1 = 0;

            $.each(data.voucher_lists, function(i, vou) {
                if(vou.discount_type == 1){
                    foc_total += vou.total_price;
                }
                FinalTotal = total + totalD;
                foc_total += vou.foc_value;
                service_total += vou.total_price * (vou.service_value / 100)
                discountTotalValue += vou.discount_value;
                // taxTotal = (FinalTotal - discountTotalValue) * (5 / 100);
                tax_total += vou.tax_value;
                if(vou.pay_type == 1){
                    bank_total += vou.total_price
                } else if(vou.pay_type == 2){
                    cash_total += vou.total_price
                }
            })

            // Vouchers->id , Table Id
            $.each(data.voucher_lists,function(j,vou){
                    if(vou.table_id <= 50){
                        table_total += vou.net_price;
                    }
                    if(vou.table_id > 50 && vou.table_id <= 92){
                        room_total += vou.net_price;
                    }
                    if(vou.table_id > 92 && vou.table_id <= 98){
                        spa_total += vou.net_price;
                    }
                    if(vou.table_id > 98){
                        ownerB_total += vou.net_price;
                    }
            })
            console.log('Table Total',table_total);
            console.log('Room Total',room_total);
            console.log('Spa Total',spa_total);
            console.log('Owner and Bank Total',ownerB_total);
            net_total = (total + totalD) - (foc_total + discountTotalValue + tax_total);
            $('.salecountlists').html(html);
            $('#total_qty').html(total_qty);
            $('#total_qty_all').html(total);
            $('#total_qty_drink').html(totalD);
            $('#total_price').html(total);

            $('.salecountlistsD').html(htmlD);
            $('#total_qtyD').html(total_qtyD);
            $('#total_priceD').html(totalD);
            $('#focTotal').html(foc_total);
            $('#disTotal').html(discountTotalValue);
            $('#taxTotal').html(tax_total);
            $('#netTotal').html(net_total);
            $('#serviceTotal').html(service_total);

            $('#tableTotal').html(table_total);
            $('#roomTotal').html(room_total);
            $('#spaTotal').html(spa_total);
            $('#bankTotal').html(bank_total);
            $('#cashTotal').html(cash_total);

            var html2 = "";
            if (data.total_qty.length == 0) {
                html2 = `
                        <div class="col-md-12 text-center">
                            <p class=" text-danger">No Sale Records Found !</p>
                        </div>
                        `;
                $('.salecountlists').html(html2);

                $('.sale_count_header').hide();
                $('.sale_count_footer').hide();
            }
            $('#report').show();
        }

        function showDailySale() {

            var daily = $('#daily').val();

            var shopOrdelivery = $(".shopOrdelivery option:selected").val();

            var type = 1;

            $.ajax({
                type: 'POST',
                url: '/get-sale-record',
                data: {
                    "value": daily,
                    "type": type,
                    "shopOrdelivery": shopOrdelivery,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {

                    saleRecord(data);

                }
            });
        }

        function showWeeklySale() {

            var daily = $('#weekly').val();

            var shopOrdelivery = $(".shopOrdelivery option:selected").val();

            var type = 2;

            $.ajax({
                type: 'POST',
                url: '/get-sale-record',
                data: {
                    "value": daily,
                    "type": type,
                    "shopOrdelivery": shopOrdelivery,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {

                    saleRecord(data);

                }
            });
        }

        function showMonthlySale() {
            var daily = $('#monthly').val();

            var type = 3;

            var shopOrdelivery = $(".shopOrdelivery option:selected").val();

            $.ajax({
                type: 'POST',
                url: '/get-sale-record',
                data: {
                    "value": daily,
                    "type": type,
                    "shopOrdelivery": shopOrdelivery,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {

                    saleRecord(data);
                }
            });

        }

        $(document).ready(function() {
            $("#print").click(function() {
                // var mode = 'iframe'; //popup
                // var close = mode == "popup";
                // var options = {
                //     mode: mode,
                //     popClose: close
                // };
                // $("div.printableArea").printArea(options);


                let html = document.getElementById('printableArea').innerHTML;
                $('#mobileprint').html(html);

                var printContent = $('#mobileprint')[0];
                var WinPrint = window.open('', '', 'width=900,height=650');
                WinPrint.document.write('<html><head><title>Print Voucher</title>');
                WinPrint.document.write('<link rel="stylesheet" type="text/css" href="css/style.css">');
                WinPrint.document.write(
                    '<link rel="stylesheet" type="text/css" media="print" href="css/print.css">');
                WinPrint.document.write('</head><body >');
                WinPrint.document.write(printContent.innerHTML);
                WinPrint.document.write('</body></html>');

                WinPrint.focus();
                WinPrint.print();
                WinPrint.document.close();
                WinPrint.close();
            });
        });
    </script>



@endsection
