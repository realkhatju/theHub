@extends('customer_master')

@section('title','Shop Order Page')

@section('place')

    <!--<div class="col-md-5 col-8 align-self-center">-->
    <!--    <h3 class="text-themecolor m-b-0 m-t-0">Shop Order Page</h3>-->
    <!--    <ol class="breadcrumb">-->
    <!--        <li class="breadcrumb-item"><a href="{{route('index')}}">Back to Dashborad</a></li>-->
    <!--        <li class="breadcrumb-item active">Shop Order Page</li>-->
    <!--    </ol>-->
    <!--</div>-->

@endsection

@section('content')

<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
<style>
  body {
    text-align: center;
    /* padding: 40px 0; */
    background: #EBF0F5;
  }
    h1 {
      color: #88B04B;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-weight: 900;
      font-size: 40px;
      margin-bottom: 10px;
    }
    p {
      color: #404F5E;
      font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
      font-size:20px;
      margin: 0;
    }
  i {
    color: #9ABC66;
    font-size: 100px;
    line-height: 200px;
    margin-left:-15px;
  }
  .card {
    background: white;
    padding: 60px;
    border-radius: 4px;
    box-shadow: 0 2px 3px #C8D0D8;
    display: inline-block;
    margin: 0 auto;
  }
</style>
<body>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                  <i class="checkmark">✓</i>
                </div>
                  <h1>Success</h1>
                  <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
                  <strong><span class="text-danger">{{ now()->diffInMinutes($pending_order_details->updated_at) }}
                    min ago</span></strong>
                </div>
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="font-weight-bold mt-2">Pending Order Details</h4>
                </div>
                <div class="card-body">
                    <div class="row container d-flex">
                        <ul>
                            <li>
                                <img src="https://www.pngkit.com/png/full/139-1398183_a-shiny-light-orange-button-orange-light-icon.png" height="20px" style="border-radius:50%;" title="Active">
                                <span>Cooking</span>
                            </li>
                            <li>
                                <img src="https://img.favpng.com/25/18/19/red-circle-button-png-favpng-jHcWHy40hi7EfTVtFQegdS1i6.jpg" height="20px" style="border-radius:50%;">
                                <span>Cooked</span>
                            </li>
                            <li>
                                <img src="https://toppng.com/uploads/preview/free-icons-png-green-button-icon-11562980484agrqdnwooe.png" height="20px" style="border-radius:50%;" title="Active">
                                <span>Served</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Menu Name</th>
                                            <th>Qty</th>
                                            <th>Status</th>
                                            {{-- <th>Status</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pending_order_details->option as $option)
                                        <tr>
                                            <td>{{$option->menu_item->item_name}}</td>
                                            <td>{{$option->pivot->quantity}}</td>
                                            <td>
                                                @if ($option->pivot->tocook == 0)
                                                <p>sent</p>
                                                @elseif($option->pivot->tocook == 1)
                                                <img src="https://www.pngkit.com/png/full/139-1398183_a-shiny-light-orange-button-orange-light-icon.png" height="20px" style="border-radius:50%;" title="Active">
                                                @elseif($option->pivot->tocook == 2)
                                                <img src="https://img.favpng.com/25/18/19/red-circle-button-png-favpng-jHcWHy40hi7EfTVtFQegdS1i6.jpg" height="20px" style="border-radius:50%;">
                                                @elseif($option->pivot->tocook == 3)
                                                <img src="https://toppng.com/uploads/preview/free-icons-png-green-button-icon-11562980484agrqdnwooe.png" height="20px" style="border-radius:50%;" title="Active">
                                                @endif
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
        </div>
    </div>
</body>


@endsection
