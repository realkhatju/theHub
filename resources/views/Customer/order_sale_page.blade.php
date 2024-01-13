@extends('customer_master')

@section('title','Shop Order Sale Page')

@section('place')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!--<div class="col-md-5 col-8 align-self-center">-->



<!--    <h3 class="text-themecolor m-b-0 m-t-0">Order Sale Page</h3>-->


<!--    <ol class="breadcrumb">-->
<!--        <li class="breadcrumb-item"><a href="{{route('index')}}">Back to Dashborad</a></li>-->
<!--        <li class="breadcrumb-item active">Order Sale Page</li>-->
<!--        <div class="custom-control custom-switch" style="margin-left: 90px;">-->
<!--            <input type="checkbox" class="custom-control-input" id="customSwitch2">-->
<!--            <label class="custom-control-label text-info" for="customSwitch2">Take Away</label>-->
<!--        </div>-->

<!--    </ol>-->

<!--</div>-->

@endsection

@section('content')
 <div class="row flex-column-reverse flex-md-row " style="margin:50px 0 0 0;">
        <div class="card col-md-12">



            {{-- <div class="nav_mobile">
                <ul class="nav nav-tabs customtab" role="tablist">
                    @foreach($meal_types as $item)
                    <li class="nav-item flex-shrink-0" style="font-size:14px;">
                        <a class="nav-link" data-toggle="tab" href="#{{$item->id}}" role="tab">
                            <span class="hidden-sm-up">
                                <i class="fa-solid fa-plate-wheat text-warning mr-1"></i>
                                <span>{{$item->name}}</span>
                            </span>
                            <span class="hidden-xs-down">
                                <i class="fa-solid fa-plate-wheat text-warning mr-1"></i>
                                {{$item->name}}
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div> --}}

            <form action="{{route('customerStore_shop_order')}}" method="post" id="vourcher_page">
                @csrf
                <input type="hidden" id="cus_complain" name="code_lists">

                <input type="hidden" id="item" name="option_lists">

                <input type="hidden" name="table_id" value="{{$table_number}}">

                <input type="hidden" name="take_away" id="t_away">

            </form>

            <form action="{{route('add_more_item_customer')}}" method="post" id="add_more_item">
                @csrf
                <input type="hidden" id="add_complain" name="code_lists">

                <input type="hidden" id="option_lists" name="option_lists">

                <input type="hidden" id="order_id" name="order_id">

                <input type="hidden" name="take_away" id="t_add_away">

            </form>

            <form action="{{route('deli_add_item')}}" method="post" id="deli_add_more_item">
                @csrf
                <input type="hidden" id="add_deli_complain" name="code_lists">

                <input type="hidden" id="deli_option_lists" name="deli_option_lists">

                <input type="hidden" id="deli_order_id" name="deli_order_id">
            </form>
            <div class="row">
                <div class="col-md-2 offset-md-5">
                    <div class="form-group">
                        <select class="form-control custom-select engMyanTran text-center btn btn-info text-white"  id="eng_myan" onclick="engMyanTranslate(this)">
                            <option value="1">En</option>
                            <option value="2">မြန်</option>
                        </select>
                    </div>
                </div>
            </div>


            <ul class="nav nav-tabs customtab row text-center"  role="tablist">

                    <li class="nav-item col">
                        <a class="nav-link" data-toggle="tab" href="#home" role="tab">Main Dish</a>
                      </li>
                      <li class="nav-item col">
                          <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Drinks</a>
                      </li>


            </ul>
            <div class="tab-content" >
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="container">
                        <div class="nav_mobile">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                @foreach($cuisine_types as $cuisine)
                                @if ($cuisine->meal_id == 1)
                                <li class="nav-item flex-shrink-0" style="font-size:14px;">
                                    <a class="nav-link" data-toggle="tab" href="#{{$cuisine->id}}" role="tab">
                                        <span class="hidden-sm-up">
                                            <i class="fa-solid fa-plate-wheat text-warning mr-1"></i>
                                            <span>{{$cuisine->name}}</span>
                                        </span>
                                        <span class="hidden-xs-down">
                                            <i class="fa-solid fa-plate-wheat text-warning mr-1"></i>
                                            {{$cuisine->name}}
                                        </span>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="1" role="tabpanel">
                                <div class="row mt-3 myanTran">
                                    <div class="row mt-3">
                                        @foreach($items as $item)
                                        @if($item->cuisine_type_id == 1 && $item->meal_id == 1  && $item->brake_flag == 1)

                                        <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                            <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                            <div style="height:40px;">
                                                <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                            </div>


                                            {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="2" role="tabpanel">
                                <div class="row mt-3 myanTran2">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 2 && $item->meal_id == 1  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane" id="3" role="tabpanel">
                                <div class="row mt-3 myanTran3">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 3 && $item->meal_id == 1  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane" id="4" role="tabpanel">
                                <div class="row mt-3 myanTran4">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 4 && $item->meal_id == 1  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>
                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}
                                    </div>
                                    @endif
                                    @endforeach
                                    </div>
                            </div>

                            <div class="tab-pane" id="5" role="tabpanel">
                                <div class="row mt-3 myanTran5">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 5 && $item->meal_id == 1  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="tab-pane" id="2" role="tabpanel">

                                        <div class="row mt-3">
                                            @foreach($items as $item)
                                            @if($item->cuisine_type_id == 2 && $item->meal_id == 1  && $item->brake_flag == 1)

                                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                                <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                                <div style="height:40px;">
                                                    <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                                </div>


                                                {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>        </div>

                            </div>

                            <div class="tab-pane" id="6" role="tabpanel">
                                <div class="row mt-3 myanTran6">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 6 && $item->meal_id == 1   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="7" role="tabpanel">
                                <div class="row mt-3 myanTran7">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 7 && $item->meal_id == 1   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="8" role="tabpanel">
                                <div class="row mt-3 myanTran8">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 8  && $item->meal_id == 1 && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="9" role="tabpanel">
                                <div class="row mt-3 myanTran9">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 9 && $item->meal_id == 1  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="10" role="tabpanel">
                                <div class="row mt-3 myanTran10">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 10 && $item->meal_id == 1  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="11" role="tabpanel">
                                <div class="row mt-3 myanTran11">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 11 && $item->meal_id == 1  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <div class="container">
                        <div class="nav_mobile">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                @foreach($cuisine_types as $cuisine)
                                @if ($cuisine->meal_id == 2)
                                <li class="nav-item flex-shrink-0" style="font-size:14px;">
                                    <a class="nav-link" data-toggle="tab" href="#drink{{$cuisine->id}}" role="tab">
                                        <span class="hidden-sm-up">
                                            <i class="fa-solid fa-plate-wheat text-warning mr-1"></i>
                                            <span>{{$cuisine->name}}</span>
                                        </span>
                                        <span class="hidden-xs-down">
                                            <i class="fa-solid fa-plate-wheat text-warning mr-1"></i>
                                            {{$cuisine->name}}
                                        </span>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane " id="drink1" role="tabpanel">
                                <div class="row mt-3 myanTranD">
                                @foreach($items as $item)
                                @if($item->cuisine_type_id == 1 && $item->meal_id == 2   && $item->brake_flag == 1)
                                {{-- modify css  --}}
                                <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                    <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                    </div>
                                    {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}
                                </div>
                                @endif
                                @endforeach
                                </div>
                            </div>

                            <div class="tab-pane active" id="drink2" role="tabpanel">

                                <div class="row mt-3 myanTranD2">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 2  && $item->meal_id == 2   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane" id="drink3" role="tabpanel">
                                <div class="row mt-3 myanTranD3">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 3  && $item->meal_id == 2  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane" id="drink4" role="tabpanel">
                                <div class="row mt-3 myanTranD4">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 4 && $item->meal_id == 2   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>
                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}
                                    </div>
                                    @endif
                                    @endforeach
                                    </div>
                            </div>

                            <div class="tab-pane" id="drink5" role="tabpanel">
                                <div class="row mt-3 myanTranD5">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 5  && $item->meal_id == 2  && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="tab-pane" id="drink2" role="tabpanel">

                                        <div class="row mt-3">
                                            @foreach($items as $item)
                                            @if($item->cuisine_type_id == 2  && $item->meal_id == 2  && $item->brake_flag == 1)

                                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                                <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                                <div style="height:40px;">
                                                    <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                                </div>


                                                {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>        </div>

                            </div>

                            <div class="tab-pane" id="drink6" role="tabpanel">
                                <div class="row mt-3 myanTranD6">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 6  && $item->meal_id == 2   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="drink7" role="tabpanel">
                                <div class="row mt-3 myanTranD7">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 7 && $item->meal_id == 2    && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane active" id="drink8" role="tabpanel">
                                <div class="row mt-3 myanTranD8">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 8 && $item->meal_id == 2   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="drink9" role="tabpanel">
                                <div class="row mt-3 myanTranD9">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 9 && $item->meal_id == 2   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="drink10" role="tabpanel">
                                <div class="row mt-3 myanTranD10">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 10 && $item->meal_id == 2   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                            <div class="tab-pane" id="drink11" role="tabpanel">
                                <div class="row mt-3 myanTranD11">
                                    @foreach($items as $item)
                                    @if($item->cuisine_type_id == 11 && $item->meal_id == 2   && $item->brake_flag == 1)

                                    <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit({{$item->id}})">
                                        <img src="{{asset('photo/'.$item->photo_path)}}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;">{{$item->item_name}}</h6>
                                        </div>


                                        {{-- <i class="btn btn-sm btn-success" onclick="getCountingUnit({{$item->id}})"><i class="fas fa-plus"></i>Sale</i> --}}

                                    </div>
                                    @endif
                                    @endforeach
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="remark_table_modal" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-m" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Choose Remark Infomation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="#close_modal" data-bs-toggle="modal">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="remark_modal_body">
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" id="note_id">
                            <div class="form-group">
                                <label for="">Choose Codes</label>

                                <select name="cus_remark"  class="form-control" style="width: 100%" data-placeholder="Select Codes"  id="select2" multiple="multiple"  onchange="fill_remark()">

                                    @foreach ($codes as $code)
                                        <option value="{{$code->id}}">{{$code->code}}-({{$code->name}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Remark</label>
                                <textarea name="complain" id="complain" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" aria-label="Close" id="#close_modal" data-bs-toggle="modal" class="btn btn-secondary">Cancel</button>
                        <button class="btn btn-info" onclick="save_note()" data-bs-toggle="modal" data-bs-target="#exampleModal">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="unit_table_modal" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Choose Option Infomation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="#close_modal" data-bs-toggle="modal">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body col-12" id="checkout_modal_body">
                        <table class="table">
                            <thead>
                                <tr >
                                    <th>Item Name</th>
                                    <th>Unit Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="count_unit" >

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <a type="button" class="btn"  aria-label="Close" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <div class="modal-body" style="padding: 0px">
                            <div class="card">
                                @if($table == 0)
                                <h3 style="color:#49A8EF"><b>For Delivery<b></h3>
                                @endif
                                    <div class="card-title">
                                        <a href="" class="float-right" onclick="deleteItems()">Refresh Here &nbsp<i class="fas fa-sync"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            {{-- Modify Style BST --}}
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="font-weight-bold text-info">Menu Item</th>
                                                        <th class="font-weight-bold text-info">Option</th>
                                                        <th class="font-weight-bold text-info">Quantity</th>
                                                        <th class="font-weight-bold text-info">Price</th>
                                                        <th class="font-weight-bold text-info">Note</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="sale">
                                                   <tr>

                                                   </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <td class="font-weight-bold text-info" colspan="3">Total Quantity</td>
                                                        <td class="font-weight-bold text-info" id="total_quantity">0</td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td class="font-weight-bold text-info" colspan="3">Sub Total Price</td>
                                                        <td class="font-weight-bold text-info" id="sub_total">0</td>
                                                        {{-- <td class="font-weight-bold text-info" id="1sub_total">0</td> --}}
                                                        {{-- <td class="font-weight-bold text-info" id="2sub_total">0</td> --}}
                                                        {{-- <td class="font-weight-bold text-info" id="1sub_total">0</td>
                                                        <td class="font-weight-bold text-info" id="2sub_total">0</td> --}}
                                                    </tr>
                                                    {{-- <td class="font-weight-bold text-info" id="1sub_total">0</td> --}}
                                                </tfoot>
                                                {{-- <td class="font-weight-bold text-info" id="1sub_total">0</td> --}}
                                            </table>
                                        </div>
                                        <div class="row ml-2 justify-content-center">

                                    </div>
                                </div>
                            </div>
                </div>
              </div>
            </div>
          </div>

    </div>

    <div class="container" style="bottom:20px;position:fixed;justify-content: center;display :flex;left: 50%; transform: translate(-50%) ">
        <!-- Start Button trigger modal -->
        <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-cart-shopping text-danger"></i>
        </a>
        <!-- End Button trigger modal -->
        @if(isset($order) && $table==2)
        <div class="col-md-2">
            <i class="btn btn-success mr-2" onclick="DeliAddMoreItem({{$order->id}})"><i class="fas fa-plus"></i> Add More Item </i>
        </div>
        @elseif(isset($order))
                <a class="btn btn-success mr-2 hidden-sm-up d-flex" style="width: 250px;"  onclick="AddMoreItem({{$order->id}})">
                    <table>
                        <span id="2total_quantity" class="text-secondary font-weight-bold">0</span>
                    </table>
                    <span class="ml-4">
                        <i class="fa-regular fa-circle-check"></i>Check Out&nbsp;!
                    </span>
                    <table>
                            <span id="2sub_total" class="text-warning font-weight-bold ml-4">0</span>
                    </table>
                </a>
        @else
            @if($table_number != 0)
                <a class="btn btn-primary hidden-sm-up d-flex" style="width: 250px;" onclick="showCheckOut()">
                    <table>
                        <span id="2total_quantity" class="text-secondary font-weight-bold">0</span>
                    </table>
                    <span class="ml-4">
                        <i class="fa-regular fa-circle-check"></i> <span> Check Out&nbsp;!</span>
                    </span>
                    <table>
                            <span id="2sub_total" class="text-warning font-weight-bold ml-4">0</span>
                    </table>
                </a>
            </div>
            @endif
            @if($table_number == 0)
            <div class="col-md-2">
                <i class="btn btn-success mr-2"  data-toggle="modal" data-target="#myModal" onclick="storeoption()"><i class="fas fa-calendar-check"></i>Check Out</i>
            </div>
            @endif
        @endif
    </div>


@endsection


@section('js')

<script type="text/javascript">

    $(document).ready(function() {
        $('#select2').select2();
        showmodal();
        $('#table_1').DataTable( {
            "paging":   false,
            "ordering": false,
            "info":     false,
        });

        $('#table_2').DataTable( {

            "paging":   false,
            "ordering": false,
            "info":     false,

        });

        $('#table_3').DataTable( {

            "paging":   false,
            "ordering": false,
            "info":     false,

        });
    });

    function deleteItems() {

      localStorage.clear();
    }

    function engMyanTranslate(){
        var engMyanTran = $(".engMyanTran option:selected").val();
        var html = "";
        var html2 = "";
        var html3 = "";
        var html4 = "";
        var html5 = "";
        var html6 = "";
        var html7 = "";
        var html8 = "";
        var html9 = "";
        var html10 = "";
        var html11 = "";

        var htmlD = "";
        var htmlD2 = "";
        var htmlD3 = "";
        var htmlD4 = "";
        var htmlD5 = "";
        var htmlD6 = "";
        var htmlD7 = "";
        var htmlD8 = "";
        var htmlD9 = "";
        var htmlD10 = "";
        var htmlD11 = "";
        var itemName = [];
        $.ajax({
            type: 'GET',
            url: '/customer/menuItemsList',
            contentType: 'application/json',
            success: function(data) {
                if(engMyanTran == 1){
                    $.each(data.menu_items, function(i, v) {
                        var itemName = [v.item_name,v.item_name_burmese];
                        var photo_path =  '{{asset('/photo')}}'+ "/" + v.photo_path;
                        var cuisine_type_id = v.cuisine_type_id;
                        var meal_id =  v.meal_id;
                        var brake_flag =  v.brake_flag;
                        if(cuisine_type_id == 1 && meal_id == 1 && brake_flag ==1){
                            html+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 2 && meal_id == 1 && brake_flag ==1){
                            html2+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 3 && meal_id == 1 && brake_flag ==1){
                            html3+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 4 && meal_id == 1 && brake_flag ==1){
                            html4+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 5 && meal_id == 1 && brake_flag ==1){
                            html5+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 6 && meal_id == 1 && brake_flag ==1){
                            html6+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 7 && meal_id == 1 && brake_flag ==1){
                            html7+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 8 && meal_id == 1 && brake_flag ==1){
                            html8+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 9 && meal_id == 1 && brake_flag ==1){
                            html9+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 10 && meal_id == 1 && brake_flag ==1){
                            html10+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 11 && meal_id == 1 && brake_flag ==1){
                            html11+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 1 && meal_id == 2 && brake_flag ==1){
                            htmlD+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 2 && meal_id == 2 && brake_flag ==1){
                            htmlD2+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 3 && meal_id == 2 && brake_flag ==1){
                            htmlD3+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 4 && meal_id == 2 && brake_flag ==1){
                            htmlD4+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 5 && meal_id == 2 && brake_flag ==1){
                            htmlD5+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 6 && meal_id == 2 && brake_flag ==1){
                            htmlD6+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 7 && meal_id == 2 && brake_flag ==1){
                            htmlD7+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 8 && meal_id == 2 && brake_flag ==1){
                            htmlD8+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 9 && meal_id == 2 && brake_flag ==1){
                            htmlD9+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 10 && meal_id == 2 && brake_flag ==1){
                            htmlD10+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 11 && meal_id == 2 && brake_flag ==1){
                            htmlD11+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[0]}</h6>
                                    </div>
                                </div>`;
                        }

                        $('.myanTran').html(html);
                        $('.myanTran2').html(html2);
                        $('.myanTran3').html(html3);
                        $('.myanTran4').html(html4);
                        $('.myanTran5').html(html5);
                        $('.myanTran6').html(html6);
                        $('.myanTran7').html(html7);
                        $('.myanTran8').html(html8);
                        $('.myanTran9').html(html9);
                        $('.myanTran10').html(html10);
                        $('.myanTran11').html(html11);
                        $('.myanTranD').html(htmlD);
                        $('.myanTranD2').html(htmlD2);
                        $('.myanTranD3').html(htmlD3);
                        $('.myanTranD4').html(htmlD4);
                        $('.myanTranD5').html(htmlD5);
                        $('.myanTranD6').html(htmlD6);
                        $('.myanTranD7').html(htmlD7);
                        $('.myanTranD8').html(htmlD8);
                        $('.myanTranD9').html(htmlD9);
                        $('.myanTranD10').html(htmlD10);
                        $('.myanTranD11').html(htmlD11);
                    });
                }else{
                    $.each(data.menu_items, function(i, v) {
                        var itemName = [v.item_name,v.item_name_burmese];
                        var photo_path =  '{{asset('/photo')}}'+ "/" + v.photo_path;
                        var cuisine_type_id = v.cuisine_type_id;
                        var meal_id =  v.meal_id;
                        var brake_flag =  v.brake_flag;
                        if(cuisine_type_id == 1 && meal_id == 1 && brake_flag ==1){
                            html+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 2 && meal_id == 1 && brake_flag ==1){
                                html2+=`
                                <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                        <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                        <div style="height:40px;">
                                            <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                        </div>
                                    </div>`;
                        }
                        if(cuisine_type_id == 3 && meal_id == 1 && brake_flag ==1){
                            html3+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 4 && meal_id == 1 && brake_flag ==1){
                            html4+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 5 && meal_id == 1 && brake_flag ==1){
                            html5+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 6 && meal_id == 1 && brake_flag ==1){
                            html6+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 7 && meal_id == 1 && brake_flag ==1){
                            html7+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 8 && meal_id == 1 && brake_flag ==1){
                            html8+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 9 && meal_id == 1 && brake_flag ==1){
                            html9+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 10 && meal_id == 1 && brake_flag ==1){
                            html10+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 11 && meal_id == 1 && brake_flag ==1){
                            html11+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 1 && meal_id == 2 && brake_flag ==1){
                            htmlD+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 2 && meal_id == 2 && brake_flag ==1){
                            htmlD2+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 3 && meal_id == 2 && brake_flag ==1){
                            htmlD3+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 4 && meal_id == 2 && brake_flag ==1){
                            htmlD4+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 5 && meal_id == 2 && brake_flag ==1){
                            htmlD5+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 6 && meal_id == 2 && brake_flag ==1){
                            htmlD6+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 7 && meal_id == 2 && brake_flag ==1){
                            htmlD7+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 8 && meal_id == 2 && brake_flag ==1){
                            htmlD8+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 9 && meal_id == 2 && brake_flag ==1){
                            htmlD9+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 10 && meal_id == 2 && brake_flag ==1){
                            htmlD10+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        if(cuisine_type_id == 11 && meal_id == 2 && brake_flag ==1){
                            htmlD11+=`
                            <div class="card col-sm-3 col-md-3 col-4" onclick="getCountingUnit(${v.id})">
                                    <img src="${photo_path}" class="card-img-top mb-3 mt-2" height="125rem" alt="..." style='object-fit: cover;'>
                                    <div style="height:40px;">
                                        <h6 class="card-title text-center font-weight bold" style="font-size:12px;" >${itemName[1]}</h6>
                                    </div>
                                </div>`;
                        }
                        $('.myanTran').html(html);
                        $('.myanTran2').html(html2);
                        $('.myanTran3').html(html3);
                        $('.myanTran4').html(html4);
                        $('.myanTran5').html(html5);
                        $('.myanTran6').html(html6);
                        $('.myanTran7').html(html7);
                        $('.myanTran8').html(html8);
                        $('.myanTran9').html(html9);
                        $('.myanTran10').html(html10);
                        $('.myanTran11').html(html11);
                        $('.myanTranD').html(htmlD);
                        $('.myanTranD2').html(htmlD2);
                        $('.myanTranD3').html(htmlD3);
                        $('.myanTranD4').html(htmlD4);
                        $('.myanTranD5').html(htmlD5);
                        $('.myanTranD6').html(htmlD6);
                        $('.myanTranD7').html(htmlD7);
                        $('.myanTranD8').html(htmlD8);
                        $('.myanTranD9').html(htmlD9);
                        $('.myanTranD10').html(htmlD10);
                        $('.myanTranD11').html(htmlD11);
                    });
                }
            }
        });


    }

    function storeoption(){
        var mycart = localStorage.getItem('mycart');
        var grandTotal = localStorage.getItem('grandTotal');
        var myremark = localStorage.getItem('myremark');
        var grandTotal_obj = JSON.parse(grandTotal);
        $('#cus_remark').attr('value',myremark);
        $("#itemdeli").attr('value', mycart);
        $("#totalqty").attr('value',grandTotal_obj.total_qty);
        localStorage.clear();
    }

    function searchByCuisineOne(value){

         $('#table_1').empty();

         $.ajax({

           type:'POST',

           url:'/searchByCuisine',

           data:{
            "_token":"{{csrf_token()}}",
            "cuisine_id":value,
           },

            success:function(data){

                var html = "";

                $.each(data,function(i, v){

                    var id = v.id;

                    var item = v.item_name;

                    var photo_path =  '{{asset('/photo/Item/')}}'+ "/" + v.photo_path;

                    html+=`<tr>
                                <td>${item}</td>
                                <td>
                                    <img src="${photo_path}" class="img-rounded" width="100" height="70" />
                                </td>
                                <td class="text-center">
                                    <i class="btn btn-success" onclick="getCountingUnit(${id})"><i class="fas fa-plus"></i>Sale</i>
                                </td>
                            </tr>`
                });

                $("#table_1").html(html);
            }

        });

    }

    function deli_pay(val){
        // alert(val);
        $.ajax({

            type:'POST',

            url:'/searchDelicharges',

            data:{
            "_token":"{{csrf_token()}}",
            "town_id":val,
            },

            success:function(data){
                // alert(data.status);
               if(data.status == 0){
                swal({
                title:"Don't Allow Delivery",
                text:"This town is not allowed delivery!",
                icon:"info",
                 });
               }
               else{
                $('#deli_charges').val(data.delivery_charges);
               }
            }
        })
    }

    function searchByCuisineTwo(value){

        $('#table_2').empty();

         $.ajax({

           type:'POST',

           url:'/searchByCuisine',

           data:{
            "_token":"{{csrf_token()}}",
            "cuisine_id":value,
           },

            success:function(data){

                var html = "";

                $.each(data,function(i, v){

                    var id = v.id;

                    var item = v.item_name;

                    var photo_path =  '{{asset('/photo/Item/')}}'+ "/" + v.photo_path;

                    html+=`<tr>
                                <td>${item}</td>
                                <td>
                                    <img src="${photo_path}" class="img-rounded" width="100" height="70" />
                                </td>
                                <td class="text-center">
                                    <i class="btn btn-success" onclick="getCountingUnit(${id})"><i class="fas fa-plus"></i>Sale</i>
                                </td>
                            </tr>`
                });

                $("#table_2").html(html);
            }

        });

    }

    function searchByCuisineThree(value){

         $('#table_3').empty();

         $.ajax({

           type:'POST',

           url:'/searchByCuisine',

           data:{
            "_token":"{{csrf_token()}}",
            "cuisine_id":value,
           },

            success:function(data){

                var html = "";

                $.each(data,function(i, v){

                    var id = v.id;

                    var item = v.item_name;

                    var photo_path =  '{{asset('/photo/Item/')}}'+ "/" + v.photo_path;

                    html+=`<tr>
                                <td>${item}</td>
                                <td>
                                    <img src="${photo_path}" class="img-rounded" width="100" height="70" />
                                </td>
                                <td class="text-center">
                                    <i class="btn btn-success" onclick="getCountingUnit(${id})"><i class="fas fa-plus"></i>Sale</i>
                                </td>
                            </tr>`
                });

                $("#table_3").html(html);
            }

        });
    }

    function getCountingUnit(item_id){
        var html = "";
        // console.log(item_id);
        $.ajax({

           type:'POST',

           url:'/getCustomerCountingUnitsByItemId',

           data:{
            "_token":"{{csrf_token()}}",
            "item_id":item_id,
           },

            success:function(data){
                $.each(data, function(i, unit) {
                    if(unit.brake_flag == 2){
                            html+=`<tr>
                                <input type="hidden" id="item_name" value="${unit.menu_item.item_name}">
                                <input type="hidden" id="price_${unit.id}" value="${unit.sale_price}">
                                <td>${unit.menu_item.item_name}</td>
                                <td id="name_${unit.id}">${unit.name}</td>
                                <td>${unit.sale_price}</td>
                                <td><i class="btn btn-danger">Brake</i></td>
                                </tr>
                            `;
                        }
                        else{
                            html+=`<tr>
                                <input type="hidden" id="item_name" value="${unit.menu_item.item_name}">
                                <input type="hidden" id="price_${unit.id}" value="${unit.sale_price}">
                                <td ><p style="width: 45px;white-space: nowrap;overflow: hidden;text-overflow: clip;">${unit.menu_item.item_name}</p></td>
                                <td  id="name_${unit.id}"><p style="width: 45px;white-space: nowrap;overflow: hidden;text-overflow: clip;">${unit.name}</p></td>
                                <td>${unit.sale_price}</td>
                                <td><i class="btn btn-primary" onclick="tgPanel(${unit.id})"><i class="fas fa-plus"></i>Add</i></td>
                                </tr>
                            `;
                        }
                    });
                    // console.log([unit[i]].brake_flag);

                    // console.log('all array is',array1);
                    // const found = data.find(element);
                    // console.log('total brake flag is',found);


                $("#count_unit").html(html);

                $("#unit_table_modal").modal('show');
            }

        });
    }

    function AddMoreItem(order){
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

    function tgPanel(id){

        // alert(id);

var item_name = $('#item_name').val();
console.log(item_name);

var item_price_check = $('#price_' + id).val();

var name = $('#name_' + id).text();

var qty_check = $('#qty_' + id).val();

var qty = parseInt(qty_check);

var price = parseInt(item_price_check);

if( item_price_check == ""){

Swal.fire({
    title:"Please Check",
    text:"Please Select Price To Sell",
    icon:"info",
});
}
else{

// swal("Please Enter Quantity:", {
//     content: "input",
// })

// .then((value) => {
//     if(value.toString().match(/^\d+$/)){
//     if (value > qty ) {

//         swal({
//             title:"Can't Add",
//             text:"Your Input is higher than Current Quantity!",
//             icon:"info",
//         });

//     }else{

        // alert('hello!');

        $('.note_class').hide();


        var total_price = price * 1 ;

        var item={id:id,item_name:item_name,unit_name:name,current_qty:qty,order_qty:1,selling_price:price};
        console.log(item);
        var total_amount = {sub_total:total_price,total_qty:1};

        var mycart = localStorage.getItem('mycart');

        var grand_total = localStorage.getItem('grandTotal');
        // var new_grand_total = localStorage.getItem('grandTotal');
        console.log(grand_total);
        //console.log(item);

        if(mycart == null ){

            mycart = '[]';

            var mycartobj = JSON.parse(mycart);

            mycartobj.push(item);

            localStorage.setItem('mycart',JSON.stringify(mycartobj));

        }else{

            var mycartobj = JSON.parse(mycart);

            var hasid = false;

            $.each(mycartobj,function(i,v){

                if(v.id == id ){

                    hasid = true;

                    v.order_qty = parseInt(1) + parseInt(v.order_qty);
                }
            })

            if(!hasid){

                mycartobj.push(item);
            }

            localStorage.setItem('mycart',JSON.stringify(mycartobj));
        }

        if(grand_total == null ){

            localStorage.setItem('grandTotal',JSON.stringify(total_amount));

        }else{

            var grand_total_obj = JSON.parse(grand_total);

            grand_total_obj.sub_total = total_price + grand_total_obj.sub_total;

            grand_total_obj.total_qty = parseInt(1) + parseInt(grand_total_obj.total_qty);

            localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));
        }

        $("#unit_table_modal").modal('hide');

        showmodal();

    }
//     }else{
//         swal({
//             title:"Input Invalid",
//             text:"Please only input english digit",
//             icon:"info",
//         });
//     }
// })

// }
}

    function showmodal(){

        var mycart = localStorage.getItem('mycart');
        console.log(mycart);
        var grandTotal = localStorage.getItem('grandTotal');

        var grandTotal_obj = JSON.parse(grandTotal);
        console.log(grandTotal_obj);

        if(mycart){

            var mycartobj = JSON.parse(mycart);

            var html='';

            if(mycartobj.length>0){

                $.each(mycartobj,function(i,v){

                    var id=v.id;

                    var item=v.item_name;

                    var qty=v.order_qty;

                    var count_name = v.unit_name

                    html+=`<tr>

                            <td class="text-success font-weight-bold"><p style="width: 50px;white-space: nowrap;overflow: hidden;text-overflow: clip;">${item}</p></td>

                            <td class="text-success font-weight-bold"><p style="width: 50px;white-space: nowrap;overflow: hidden;text-overflow: clip;">${count_name}</p></td>

                            <td>
                                <i class="fa fa-plus-circle btnplus" onclick="plus(${id})" id="${id}"></i>
                                ${qty}
                                <i class="fa fa-minus-circle btnminus"  onclick="minus(${id})" id="${id}"></i>
                            </td>

                            <td class="text-success font-weight-bold">${v.selling_price}</td>
                            <td class="text-success font-weight-bold"><button class="btn btn-sm btn-info" id="note_${id}" onclick="note(${id})" data-bs-dismiss="modal">Note</button></td>
                            </tr>
                            <tr>
                                <th class="text-danger font-weight-bold">Notes:</th>
                                <td class="text-danger font-weight-bold" colspan="4" id="note_remark_${id}"></td>
                            </tr>
                            `;


                });
            }

            $("#total_quantity").text(grandTotal_obj.total_qty);
            $("#2total_quantity").text(grandTotal_obj.total_qty);
            $("#sub_total").text(grandTotal_obj.sub_total);
            $("#1sub_total").text(grandTotal_obj.sub_total);
            $("#2sub_total").text(grandTotal_obj.sub_total+' Ks');
            $("#sale").html(html);
        }
    }

    function plus(id){





            count_change(id,'plus',1);


    }

    function minus(id){



            count_change(id,'minus',1);


    }

    function count_change(id,action,qty){

        var grand_total = localStorage.getItem('grandTotal');

        var mycart=localStorage.getItem('mycart');

        var mycartobj=JSON.parse(mycart);

        var grand_total_obj = JSON.parse(grand_total);

        var item = mycartobj.filter(item =>item.id == id);

        if( action == 'plus'){

            if (item[0].order_qty == item[0].current_qty) {

                swal({
                    title:"Can't Add",
                    text:"Can't Added Anymore!",
                    icon:"info",
                });

                $('#btn_plus_' + item[0].id).attr('disabled', 'disabled');
            }
            item[0].order_qty++;

          grand_total_obj.sub_total += parseInt(item[0].selling_price);

          grand_total_obj.total_qty ++;

          localStorage.setItem('mycart',JSON.stringify(mycartobj));

          localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));



            showmodal();
        }
        else if (action == 'minus') {
            console.log(item[0].order_qty);
            if(item[0].order_qty == 1){

              var ans=confirm('Are you sure');

              if(ans){

                let item_cart = mycartobj.filter(item =>item.id !== id );

                grand_total_obj.sub_total -= parseInt(item[0].selling_price);

                grand_total_obj.total_qty -- ;

                localStorage.setItem('mycart',JSON.stringify(item_cart));

                localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));

                  showmodal();

              }else{

                item[0].order_qty;

                localStorage.setItem('mycart',JSON.stringify(mycartobj));

                localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));

                  showmodal();
              }

          }else{

            item[0].order_qty--;

            grand_total_obj.sub_total -= parseInt(item[0].selling_price);

            grand_total_obj.total_qty -- ;

            localStorage.setItem('mycart',JSON.stringify(mycartobj));

            localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));

            // count_item();

            showmodal();
          }
      }
  }

    function showCheckOut(){
        // alert('showingCheckout');
        if($('.custom-control-input').prop('checked')){
            // alert('success');
            var take_away = 1;
        }else{
            var take_away = 0;
        }
        var mycart = localStorage.getItem('mycart');

        var myremark = localStorage.getItem('myremark');
        // console.log(mycart);
        // console.log(myremark);
        if(!mycart){

            swal({
                title:"Please Check",
                text:"Menu Item Cannot be Empty to Check Out",
                icon:"info",
            });

        }else{
            $("#t_away").attr('value', take_away);

            $("#item").attr('value', mycart);

            $('#cus_complain').attr('value',myremark);


            $("#vourcher_page").submit();

            localStorage.clear();

        }
    }

    function AddMoreItem(order){
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
    function DeliAddMoreItem(order){

var mycart = localStorage.getItem('mycart');

var myremark = localStorage.getItem('myremark');

if(!mycart){

    swal({
        title:"Please Check",
        text:"Menu Item Cannot be Empty to Check Out",
        icon:"info",
    });

}else{

    $("#deli_option_lists").attr('value', mycart);

    $('#add_deli_complain').attr('value',myremark);

    $("#deli_order_id").attr('value', order);

    $("#deli_add_more_item").submit();

    localStorage.clear();

}

}

    $( document ).ready(function() {
    $('#name').val('');
    $('#phone').val('');
    $('#address').val('');
    $('#order_date').val('');
    $('#note').val('');
});

function fill_remark(){
    var text = ($("#select2 option:selected").text());
    $('#complain').val(text);
}

function note(id){
        $('#remark_table_modal').modal('show');
        $('#note_id').val(id);

        $('.note_class').show();
        // $('#select2').text('Select_code');

    }
function  save_note(){
    // alert('hello');
    var note_id = $('#note_id').val();
    var complain = $('#complain').val();
    // alert(complain);
    $('#remark_table_modal').modal('hide');

    $('#note_remark_'+note_id).text(complain);
    var note = {id:note_id,remark:complain};
    var myremark = localStorage.getItem('myremark');
    console.log(note);
    if(myremark == null ){

        myremark = '[]';

        var myremarkobj = JSON.parse(myremark);

        myremarkobj.push(note);

        localStorage.setItem('myremark',JSON.stringify(myremarkobj));

        }else{
            var myremarkobj = JSON.parse(myremark);

            myremarkobj.push(note);

            localStorage.setItem('myremark',JSON.stringify(myremarkobj));
        }
    // $('#select2').empty();
    // $('#select2').clear();
    // $('#select2').text('Select Code');
    $('#select2').val(null).trigger('change');

}


</script>

@endsection
