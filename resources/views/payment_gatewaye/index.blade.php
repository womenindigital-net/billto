@extends('layouts.frontend.app')
@section('title', 'Billto.io')
@push('frontend_css')

@endpush
@section('frontend_content')

<section class="container">
    <style>
        .package_title {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .table {
            font-size: 16px;
            border: none;
        }

        .table th,
        td {
            border: none;
        }


        .pricing_card  {
            border: none;
            box-shadow: 2px 9px 18px 2px #cfcfcf;
            position: fixed;
            top: 80px;
        }
        @media only screen and (max-width: 600px) {
            .pricing_card  {
            position: none;

        }
            }

        .pricing_card .card-header {
            background: rgb(255, 255, 255) !important;
        }
    </style>
                <style>
                    .priceColor {
                        color: #FFB317;
                        font-size: 64px;
                        font-weight: bold;
                    }

                    .heding {
                        margin-top: 1.875rem;
                        margin-bottom: 1.875rem;
                        font-weight: bold;
                    }

                    .btnCss {
                        background-color: #FFB317;
                        color: #FFFFFF;
                        border: none;
                        border-radius: 5px;
                        font-size: 24px;
                        padding: 7px 55px 8px 46px;
                    }
                </style>

    <div class="row my-2  ">
        <div class="col-sm-7">
            <div class="row">
              @foreach ($package_tamplate as  $package_tamp)
                <div class="col-sm-6 mb-4">
                    <div class="tamplate_show_home">
                        <img src="{{ asset('uploads/template/' . $package_tamp->templateImage) }}" class="w-100" alt=""
                        style="border: 1px solid #ccc;">
                    </div>
                  </div>

              @endforeach
            </div>
        </div>
        <div class="col-sm-5">
            @foreach ($subscribe_package as $subscribe )
            @php
            $day = $subscribe->packageDuration;
           @endphp

<div class="card text-center ">
    <div class="card-body">
        <h3 class="heding">{{ $subscribe->packageName }}</h3>
        <h1 class="priceColor">${{ $subscribe->price }}</h1>
        <p class="text-muted">
            galley of type and scrambled it to make a type specimen book.
        </p>
        <hr />
        <div class="text-start">
            <p class="text-muted mb-3">
                <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                Invoice
                Template: <strong> {{ $subscribe->templateQuantity }}</strong>
            </p>
            <p class="text-muted mb-3">
                <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" /> Total
                invoice Genarate: <strong>{{ $subscribe->limitInvoiceGenerate }}</strong>
            </p>
            <p class="text-muted mb-3">
                <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                Package
                Duration: <strong> @php
                    if ($day == 30) {
                        echo 'One Month';
                    } elseif ($day == 90) {
                        echo 'Three Month';
                    } elseif ($day == 180) {
                        echo 'Six Month';
                    } elseif ($day == 365) {
                        echo 'One Year';
                    }
                @endphp
                </strong>
            </p>
            <p class="text-muted mb-3">
                <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" /> make a
                type
                specimen book.
            </p>
            <p class="text-muted mb-3">
                <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" /> galley
                of
                type and
                scrambled
                it to
            </p>
            <p class="text-muted mb-2">
                <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" /> make a
                type
                specimen book.
            </p>
            <p class="text-muted mb-3">
                <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" /> make
                a
                type
                specimen book.
            </p>
        </div>

   
        <form action="{{ route('payment.store') }}"  method="post">
            @csrf
        <div class="card-body">
            <input type="hidden" name="package_id"  value="{{ $subscribe->id }}">
            <input type="hidden"  name="auth_user_id" value="{{ auth()->user()->id }}">
            <input type="hidden"  name="package_price" value="{{ $subscribe->price }}" >
            <div class="mt-2">
                <button class="btnCss" >Submit</button>
            </div>
        </div>
    </form>
        {{-- <a href=""><button class="btnCss">Buy now</button></a> --}}
    </div>
</div>



            {{-- <div class="card pricing_card ">
                <div class="card-header">
                    <div class="package_title text-center">
                        <span>
                            Package Details
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th class="">Package name </th>
                            <td class=""> {{ $subscribe->packageName }} </td>
                        </tr>
                        <tr>
                            <th>Package price</th>
                            <td  class="me-0"> $ {{ $subscribe->price }}</td>
                        </tr>
                        <tr>
                            <th>Package duration</th>
                            <td>
                                 @php
                                   if($day==30){ echo "One Month"; }elseif($day==90){ echo "Three Month";}elseif($day==180){  echo "Six Month"; }elseif($day==365){ echo "One Year";}
                                @endphp
                           </td>
                        </tr>
                        <tr>
                            <th>Total invoice</th>
                            <td> {{ $subscribe->templateQuantity }}</td>
                        </tr>
                        <tr>
                            <th> Maximum invoice generate</th>
                            <td> {{ $subscribe->templateQuantity }}</td>
                        </tr>
                    </table>
                </div>
                <div class="palce_order_btn d-flex justify-content-center pb-3">
                    <button class=" btn  btn-success"> Place Order</button>
                </div>
            </div> --}}
            @endforeach
        </div>
    </div>
    {{------------------- javascript kora ache--------  --}}
    {{-- <div class="row my-2">
        <div class="col-sm-7 ">
            @foreach ($subscribe_package as $subscribe )
            @php
            $day = $subscribe->packageDuration;
           @endphp
            <div class="card">
                <div class="card-body text-center bg-success">
                    <h5 class="card-title"></h5>
                 </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> Invoice Template: <strong>{{ $subscribe->templateQuantity }}</strong> </li>
                    <li class="list-group-item">Total invoice Genarate: <strong>{{ $subscribe->templateQuantity }}</strong></li>
                    <li class="list-group-item">Package Duration: <strong>  @php
                        if($day==30){ echo "One Month"; }elseif($day==90){ echo "Three Month";}elseif($day==180){  echo "Six Month"; }elseif($day==365){ echo "One Year";}
                        @endphp</strong></li>
                    <li class="list-group-item">Package Price: <strong>Tk. {{ $subscribe->price }}</strong></li>
                    <input type="hidden" id="package_price" value="{{ $subscribe->price }}">
                </ul>
            </div>

            @endforeach
        </div>
        <div class="col-sm-5">
            <div class="card">
                <form action="" id="getway_setup" method="post">
                    @csrf
                <div class="card-body">
                    <label for="">Payment Amount</label>
                    <input type="hidden" id="package_id" name="package_id"value="{{ $subscribe->id }}">
                    <input type="hidden" id="auth_user_id" name="auth_user_id" value="{{ auth()->user()->id }}">
                    <input type="number"  style="width:300px;" name="new_package_price" id="new_package_price" class="form-control" >
                     <small id="message" class="text-danger"></small>
                    <div class="mt-2">
                        <button class="btn btn-success" id="submit_button" disabled >Submit</button>
                    </div>
                </div>
            </form>
            </div>


        </div>
    </div> --}}


</section>

<script>

// $( "#new_package_price" ).bind( "keyup", function() {
//     var package_price = document.getElementById('package_price').value;
//     var new_package_price = document.getElementById('new_package_price').value;

//   if(package_price== new_package_price){

//     $('#new_package_price').addClass("is-valid");
//     $('#new_package_price').removeClass("is-invalid");
//     document.getElementById("submit_button").disabled = false;
//     document.getElementById("message").innerHTML = "";
//   }else{
//     $('#new_package_price').addClass("is-invalid");
//     document.getElementById("submit_button").disabled = true;
//     document.getElementById("message").innerHTML = "Please set Correct value";
//   }
// });

</script>




@endsection
@push('frontend_js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
