<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">

    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/plugins/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">

    <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/dist/css/dropify.min.css')}}">

    <link rel="stylesheet" href="{{asset('js/dist/css/qrcode-reader.min.css')}}">

    <link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

</head>
<style>
    @media screen and (max-width: 600px) {
    .floating_btn {
        position:    fixed;
        bottom:      -300px;
        left:        50%;
        transform: translate(-50%);
        line-height: 1.8em;
        background-color: #c2fbd7;
        border-radius: 100px;
        box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset,rgba(44, 187, 99, .15) 0 1px 2px,rgba(44, 180, 187, 0.15) 0 2px 4px,rgba(44, 187, 99, .15) 0 4px 8px,rgba(44, 187, 99, .15) 0 8px 16px,rgba(36, 173, 236, 0.15) 0 16px 32px;
        color: rgb(0, 115, 128);
        font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
        /* padding: 0px 0px; */
        text-align: center;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 365px;
        font-weight: bold;
        display: flex;
        justify-content: center
        }
    .floating_btn:hover {
        box-shadow: rgba(44,187,99,.35) 0 -25px 18px -14px inset,rgba(44,187,99,.25) 0 1px 2px,rgba(44,187,99,.25) 0 2px 4px,rgba(44,187,99,.25) 0 4px 8px,rgba(44,187,99,.25) 0 8px 16px,rgba(44,187,99,.25) 0 16px 32px;
        /* transform: scale(1.05) rotate(-1deg); */
        }
    .floating_btn table tr td{
        /* background-color: rgb(1, 1, 15); */
        padding-left: 135px;
    }

    .floating_btn:active {
        background-color: initial;
        background-position: 0 0;
        color: #42f2ff;
    }

    .floating_btn:active {
        opacity: .5;
    }

    .nav_mobile {
        overflow-x: scroll;
        width: 100%;
    }

    .nav_mobile .nav {
        flex-wrap: nowrap;
    }

    .nav_mobile ul {
        display: flex;
    }
    }

</style>

<body class="fix-header fix-sidebar card-no-border logo-center" style="height: 100vh">


    @include('sweet::alert')

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" style="height: 100%">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <img src="{{asset('image/UpperDeck.png')}}" alt="" width="55px" height="55px" class="mt-3">
                    <h2 class="text-white font-weight-bold font-italic ml-2 mt-3">Upper Deck Bar & Restraurant</h2>

                    {{-- Language Drop Down Start --}}
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                            @endif
                        @endforeach
                        </div>
                    </li> --}}
                    {{-- Language Drop Down End --}}
                </ul>
            </div>
        </nav>
    </header>

    <div class="page-wrapper" style="height: 100%">
        <div class="container-fluid">
            <div class="noti" style="position: fixed">
           </div>
            <div class="row page-titles">
                @yield('place')
            </div>
            @yield('content')
        </div>
        <div id="mobileprint" class="d-none">
        </div>
    </div>
    </div>


</div>


<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>

<!--c3 JavaScript -->
<script src="{{asset('assets/plugins/d3/d3.min.js')}}"></script>

<script src="{{asset('assets/plugins/c3-master/c3.min.js')}}"></script>

<script src="{{asset('assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>

<script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>

<script src="{{asset('assets/plugins/multiselect/js/jquery.multi-select.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>

<script src="{{asset('js/validation.js')}}"></script>

<script src="{{ asset('js/dist/js/qrcode-reader.min.js')}}"></script>

<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('assets/js/Chart.bundle.min.js')}}"></script>

<script src="https://js.pusher.com/4.3.1/pusher.min.js"></script>



<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('1628162809d1d8d59c80', {
        cluster: "ap1",
        encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('burmateahouse');

    //         channel.bind('pusher:subscription_succeeded', function(members) {
    //      alert('successfully subscribed!');
    //  });
    // Bind a function to a Event (the full Laravel class)
    //   channel.bind('App\\Events\\OrderNoti', function(data) {
    //     alert(JSON.stringify(data));
    //   });

    channel.bind("order-noti", (data) => {
        alert(data);
        var voucherId = data.voucherId;
        // 0-storeshoporder  1-addmoreitem   2-storevoucher
        var url1 = "{{route('kitchen.voucher','voucherNo')}}";
        var url11 =url1.replace('voucherNo', voucherId);

        var url2 = "{{route('kitchen.addvoucher','voucherNo')}}";
        var url22 =url2.replace('voucherNo', voucherId);

        var url3 = "{{route('shop_order_voucher','voucherNo')}}";
        var url33 =url3.replace('voucherNo', voucherId);
        if(data.status==0){
            var html = `
                <div class="row mb-2">
                        <a class="kitchennoti pt-1 ml-auto" href="${url11}">
                            <p class="pr-1 pt-2">Kitchen New</p>
                        </a>
                </div>
                `;

        }
        else if(data.status==1){
            var html = `
                <div class="row mb-2">
                        <a class="kitchennoti ml-auto pt-1" href="${url22}">
                            <p class="pr-1 pt-2">Kitchen Add</p>
                        </a>
                </div>
                `;

        }
        else{
            var html = `
                    <div class="row mb-2">
                        <a class="ordernoti ml-auto pt-1" href="${url33}">
                            <p class="pr-3 pt-2">Voucher</p>
                        </a>
                    </div>

                `;
        }

        $('.noti').append(html);

    });

    // <div class="row mb-2">
    //                 <a class="kitchennoti ml-auto" href="{{route('shop_order_voucher',186)}}">
    //                     <p class="pr-4">Kitchen</p>
    //                 </a>
    // </div>
</script>
@yield('js')
<script src="{{asset('js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>

<script>

    setInterval(() => {
        var rolename= $('#unique_role').val();

        // alert(rolename);
        var mobileprint = localStorage.getItem('mobileprint');
        if(rolename==1){
            //    alert(rolename);

            $.ajax({

                type:'POST',

                url:'/mobile-print',

                data:{
                    "_token":"{{csrf_token()}}",
                },

                success:function(data){
                    // alert(mobileprint);
                    if(mobileprint==null){
                        mobileprint = 0;
                    }

                    if(data){

                        if(data.order_table.id>mobileprint){
                            var items= ``;
                            var jj=0;
                            // alert(data.tableno.table.table_number);
                            $.each(data.name, function(i,v){

                                if(v.menu_item.cuisine_type_id == 1){
                                    items+=`
                        <tr style="width:100%; font-size:12px">
                            <td>(Salad)</td>
                            <td>${v.menu_item.item_name}</td>
                            <td>${v.name}</td>
                            <td>${data.optqty[jj].quantity - data.optqty[jj].old_quantity}</td>
                        </tr>
                        <tr>
                        <th class="text-danger font-weight-bold">Notes</th>
                        <td class="text-danger" colspan="3">${data.optqty[jj].note}</td>
                        </tr>
                        `;
                                }
                                else if(v.menu_item.cuisine_type_id == 2){
                                    items+=`
                        <tr style="width:100%; font-size:12px">
                            <td>(Breakfast)</td>
                            <td>${v.menu_item.item_name}</td>
                            <td>${v.name}</td>
                            <td>${data.optqty[jj].quantity - data.optqty[jj].old_quantity}</td>
                        </tr>
                        <tr>
                        <th class="text-danger font-weight-bold">Notes</th>
                        <td class="text-danger" colspan="3">${data.optqty[jj].note}</td>
                        </tr>
                        `;
                                }
                                else if(v.menu_item.cuisine_type_id == 3){
                                    items+=`
                        <tr style="width:100%; font-size:12px">
                            <td>(Healthy Food)</td>
                            <td>${v.menu_item.item_name}</td>
                            <td>${v.name}</td>
                            <td>${data.optqty[jj].quantity - data.optqty[jj].old_quantity}</td>
                        </tr>
                        <tr>
                        <th class="text-danger font-weight-bold">Notes</th>
                        <td class="text-danger" colspan="3">${data.optqty[jj].note}</td>
                        </tr>
                        `;
                                }
                                else if(v.menu_item.cuisine_type_id == 4){
                                    items+=`
                        <tr style="width:100%; font-size:12px">
                            <td>(Main)</td>
                            <td>${v.menu_item.item_name}</td>
                            <td>${v.name}</td>
                            <td>${data.optqty[jj].quantity - data.optqty[jj].old_quantity}</td>
                        </tr>
                        <tr>
                        <th class="text-danger font-weight-bold">Notes</th>
                        <td class="text-danger" colspan="3">${data.optqty[jj].note}</td>
                        </tr>
                        `;
                                }
                                else if(v.menu_item.cuisine_type_id == 5){
                                    items+=`
                        <tr style="width:100%; font-size:12px">
                            <td>(Snacks)</td>
                            <td>${v.menu_item.item_name}</td>
                            <td>${v.name}</td>
                            <td>${data.optqty[jj].quantity - data.optqty[jj].old_quantity}</td>
                        </tr>
                        <tr>
                        <th class="text-danger font-weight-bold">Notes</th>
                        <td class="text-danger" colspan="3">${data.optqty[jj].note}</td>
                        </tr>
                        `;
                                }
                                jj = jj + 1;
                            });
                            // alert('success hello');
                            var html = `
                        <div class="row justify-content-center">
                <div class="col-md-5 printableArea" style="width:100%;" id="printableArea">
                    <div class="card card-body">
                        <div class="row" style="margin:10px">
                            <div class="col-md-12">
                            <div style="text-align:center;">
                                <address>
                                    <b style="font-size:17px;">Law Ka Nat&nbsp;&nbsp;(<span class="text-danger">Kitchen</span>)</b><br>
                                        <b style="font-size:17px;">Restaurant</b>

                                </address>
                            </div>
                            <div class="pull-right text-left" style="margin-top:20px;">
                                    <b style="font-size:16px;">Waiter Name : ${data.waiter}</b><br>
                                    <b style="font-size:16px;">Date : <i class="fa fa-calendar"></i> ${data.date}</b><br>
                                    <b style="font-size:16px;">Table-Number : ${data.tableno.table.table_number}</b><br>
                                </font>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:12px;">
                            <div class="table-responsive" style="clear: both;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Kitchen</td>
                                            <td>Menu Name</td>
                                            <td>Option & Size</td>
                                            <td >Qty</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         ${items}
                                    </tbody>
                                </table>
                                <h6 class=" font-weight-bold" style="text-align:center;">***************</h6>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                        </div>
                        `;
                            $('#mobileprint').html(html);
                            localStorage.setItem('mobileprint',JSON.stringify(data.order_table.id));

                            var printContent = $('#mobileprint')[0];
                            var WinPrint = window.open('', '', 'width=900,height=650');
                            WinPrint.document.write('<html><head><title>Print Voucher</title>');
                            WinPrint.document.write('<link rel="stylesheet" type="text/css" href="css/style.css">');
                            WinPrint.document.write('<link rel="stylesheet" type="text/css" media="print" href="css/print.css">');
                            WinPrint.document.write('</head><body >');
                            WinPrint.document.write(printContent.innerHTML);
                            WinPrint.document.write('</body></html>');

                            // WinPrint.document.write(html);
                            WinPrint.focus();
                            WinPrint.print();
                            WinPrint.document.close();
                            WinPrint.close();
                        }

                    }
                }
            });
        }
    }, 3000);

    // $( document ).ready(function() {
    //     $.ajax({

    //         type:'POST',

    //         url:'/getnotification',

    //         data:{
    //             "_token":"{{csrf_token()}}",
    //         },

    //         success:function(data){
    //             var html = '';
    //             if(data.shop.length != 0 ){
    //                 // alert('hey');
    //                 html += `
    //     <a href="{{route('pending_lists')}}">
    //         <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
    //         <div class="mail-contnet">
    //             <h5>Pending Shop Order List<span class="badge badge-danger float-right" id="stockNoti"></span></h5>
    //             <small>Check Orders</small>
    //         </div>
    //     </a>
    //     `;
    //                 $('#noti').html(html);
    //             }
    //             if(data.deli.length != 0){
    //                 // alert(count(data.deli));
    //                 // alert(data.deli.length);
    //                 html += `
    //     <a href="{{route('delivery_pending_lists')}}">
    //         <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
    //         <div class="mail-contnet">
    //             <h5>Pending Delivery Order List<span class="badge badge-danger float-right" id="stockNoti"></span></h5>
    //             <small>Check Orders</small>
    //         </div>
    //     </a>
    //     `;
    //                 $('#noti').html(html);
    //             }
    //         }
    //     })
    // });


</script>


</body>

</html>

