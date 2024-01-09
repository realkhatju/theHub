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
                                    <option value="2">Delivery</option>
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
                                {{-- <li class="nav-item">
                            <a href="#jflsdfjlsll" class="nav-link" data-toggle="tab" aria-expanded="false">Summary Net Price</a>
                        </li> --}}
                            </ul>

                        </div>
                    </div>
                    <br />
                    <div class="tab-content br-n pn">
                        <div id="navpills-djlsfj" class="tab-pane active">

                            {{-- <li class="font-weight-bold text-dark">Food Total:<span id="" class="text-danger" style="font-weight:bold"></span></li>
                        <li class="font-weight-bold text-dark">Drink Total:</li>
                        <li class="font-weight-bold text-dark">Foc Total:</li>
                        <li class="font-weight-bold text-dark">Discount Total:</li>
                        <li class="font-weight-bold text-dark">Tax Total:</li>
                        <li class="font-weight-bold text-dark">Net Total:</li> --}}


                            <div class="card mt-3" id="report">
                                <div class="card-body text-center">

                                    <div class=" py-5 text-dark" style="font-weight: 500;">
                                        <div class="row text-success sale_count_header">
                                            <div class="col-md-4 offset-md-2 text-center">Name</div>
                                            <div class="col-md-2">
                                                <p></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>Value</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Food Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="total_qty_all" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Drink Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="total_qty_drink" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Foc Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="focTotal" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Discount Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span class="text-danger" style="font-weight:bold"
                                                        id="disTotal"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Tax Total(5%)</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span class="text-danger" style="font-weight:bold"
                                                        id="taxTotal"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Service Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="serviceTotal" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Net Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="netTotal" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Bank Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="bankTotal" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Cash Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="cashTotal" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div id="navpills-djlsfjFoods" class="tab-pane">

                            <div class="card mt-3" id="report">
                                <div class="card-body ">

                                    <div class=" py-5 text-dark" style="font-weight: 500;">
                                        <div class="row text-success sale_count_header">
                                            <div class="col-md-3 offset-md-2 text-center">Item Name</div>
                                            <div class="col-md-2">
                                                <p>Option Name</p>
                                            </div>
                                            <div class="col-md-2">
                                                <p>Qty</p>
                                            </div>
                                            <div class="col-md-2">
                                                <p>Subtotal</p>
                                            </div>
                                        </div>
                                        <div class="row salecountlists">

                                        </div>
                                        <div class="row text-center sale_count_footer">
                                            <div class="col-md-2 offset-md-6">
                                                <p class="text-success">Total Qty: <span id="total_qty" class="text-dark"
                                                        style="font-weight:bold"></span></p>

                                            </div>
                                            <div class="col-md-3">
                                                <p class="text-success">Total : <span id="total_price" class="text-dark"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="navpills-djlsfjDrinks" class="tab-pane">
                            <div class="card mt-3" id="report">
                                <div class="card-body ">
                                    <div class=" py-5 text-dark" style="font-weight: 500;">
                                        <div class="row text-success sale_count_header">
                                            <div class="col-md-3 offset-md-2 text-center">Item Name</div>
                                            <div class="col-md-2">
                                                <p>Option Name</p>
                                            </div>
                                            <div class="col-md-2">
                                                <p>Qty</p>
                                            </div>
                                            <div class="col-md-2">
                                                <p>Subtotal</p>
                                            </div>
                                        </div>
                                        <div class="row salecountlistsD">

                                        </div>
                                        <div class="row text-center sale_count_footer">
                                            <div class="col-md-2 offset-md-6">
                                                <p class="text-success">Total Qty: <span id="total_qtyD"
                                                        class="text-dark" style="font-weight:bold"></span></p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="text-success">Total : <span id="total_priceD" class="text-dark"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="jdfslfjs" class="tab-pane">
                            <div class="card mt-3" id="report">
                                <div class="card-body ">
                                    <div class=" py-5 text-dark" style="font-weight: 500;">
                                        <div class="row text-success sale_count_header">
                                            <div class="col-md-4 offset-md-2 text-center">Name</div>
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-4">
                                                <p>Value</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Table Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="tableTotal" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Room Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="roomTotal" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 offset-md-2 text-center">Spa Total</div>
                                            <div class="col-md-2">
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><span id="spaTotal" class="text-danger"
                                                        style="font-weight:bold"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="col-md-12">
                    <div class="text-center">
                        <button id="print" class="btn btn-info" type="button">
                            <span><i class="fa fa-print"></i> Print</span>
                        </button>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function() {

            $('#report').hide();

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
                                    <div class="col-md-3 offset-md-2 text-center">${val.item_name}</div>
                                        <div class="col-md-2">
                                        <p>${v.name}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>${value.qty}</p>
                                    </div>
                                    <div class="col-md-2">
                                            <p>${subtotal}</p>
                                    </div>
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
                                    <div class="col-md-3 offset-md-2 text-center">${val.item_name}</div>
                                        <div class="col-md-2">
                                        <p>${v.name}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>${value.qty}</p>
                                    </div>
                                    <div class="col-md-2">
                                            <p>${subtotal}</p>
                                    </div>
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
                    // console.log('Foc Voucher Value => ',vou.total_price);
                }
                FinalTotal = total + totalD;
                // console.log('vou', vou);
                // console.log('vou total price', vou.total_price);
                // console.log('final total ', FinalTotal);
                foc_total += vou.foc_value;
                service_total += vou.total_price * (vou.service_value / 100)
                if (vou.discount_type == 2) {
                    discount_total2 += vou.total_price * (vou.discount_value / 100);
                } else if (vou.discount_type == 3) {
                    discount_total1 += vou.discount_value;
                }
                discountTotalValue = discount_total2 + discount_total1;
                taxTotal = (FinalTotal - discountTotalValue) * (5 / 100);
                // console.log('Tax Total', taxTotal);
                // console.log('discountTotalValue',discountTotalValue);
                // console.log('discount2',discount_total2);
                // console.log('discount3',discount_total1);

                // console.log('Discount Value', discountTotalValue);
                // service_total += FinalTotal * (vou.service_value / 100);
                tax_total = FinalTotal * (5 / 100);
                // net_total += vou.net_price;
                if(vou.pay_type == 1){
                    bank_total += vou.total_price
                } else if(vou.pay_type == 2){
                    cash_total += vou.total_price
                }
            })

            // Vouchers->id , Table Id
            $.each(data.voucher_lists,function(j,vou){
                    if(vou.table_id <= 50){
                        // console.log('vou listssssss',vou.table_id);
                        // if(vou.discount_type == 1){
                        //     discountFoc = 0;
                        // }
                        // if (vou.discount_type == 2) {
                        //     discountValuePercent = (vou.total_price * (vou.discount_value / 100));
                        // }
                        // if (vou.discount_type == 3) {
                        //     discountValueAmount = vou.discount_value;
                        // }
                        // discountValue = parseInt(discountValuePercent + discountValueAmount);
                        // tax = vou.total_price * (5/100);
                        // service_charges = vou.total_price *  (vou.service_value / 100);
                        // netTablePrice = vou.total_price - (0 + tax );
                        // console.log('table id',vou.table_id,'table total',netTablePrice);
                        // netTableTotal += netTablePrice;
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

            //shoper_order->voucher_id == Vouchers->id


            net_total = (total + totalD) - (foc_total + discountTotalValue + tax_total);

            // console.log('net_total' + net_total);
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
