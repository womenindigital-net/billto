@extends('layouts.frontend.app')
@section('title', 'Billto.io')
@push('frontend_css')
@endpush
@section('frontend_content')
    <!-- Banner Start -->
    <section class="banner_section">
        <div style="background: url({{ asset('assets/frontend/img/banner/banner-back.jpg') }}); opacity: .8;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <a href="{{ route('create') }}" class="btn billto_btn">Create Bill</a>
                        <a href="{{ url('/clear-cache') }}" class="btn billto_btn">cache Clear</a>
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="{{ asset('assets/frontend/img/banner/banner.png') }}" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Create Start -->
    <section class="create_section">
        <div>
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="icon_style">
                            <img src="{{ asset('assets/frontend/img/icon/file.png') }}" alt="" srcset=""
                                width="60" style="width: 66px;">
                        </div>
                        <h2 class="mt-4 h2_title">Create Bill</h2>
                        <p>Choose from 20 templates</p>
                    </div>
                    <div class="col-md-4">
                        <div class="icon_style">
                            <img src="{{ asset('assets/frontend/img/icon/pdf.png') }}" alt="" srcset=""
                                width="60" style="width: 60px;position: relative;left: 3px;">
                        </div>
                        <h2 class="mt-4 h2_title">Send PDF</h2>
                        <p>Email or print your invoice</br>to send to your client</p>
                    </div>
                    <div class="col-md-4">
                        <div class="icon_style">
                            <img src="{{ asset('assets/frontend/img/icon/card.png') }}" alt="" srcset=""
                                width="60">
                        </div>
                        <h2 class="mt-4 h2_title">Get Paid</h2>
                        <p>Receive payment in</br>accounts by Card or Paypal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Create End -->

    <!-- Invoice Template Start -->
    <section class="invoice_template">
        {{-- @php
    $pad = "4545.45%";
    $precent = substr($pad,-1);
    $paid = substr($pad,0,-1);
    dd([$precent,$paid]);
  @endphp --}}
        <div>
            <div class="container my-3">
                <div class="text-center pb-5">
                    <h2 class="h2_title">Choose Your Invoice Template</h2>
                    <p class="fs-sm fw-bolder">Start creating your professional bill</p>
                </div>
                <div class="row text-center">
                    @foreach ($invoice_template as $invoice_temp)
                        <div class="col-md-4 mt-4"><a href="{{ url('home/invoice/page/' . $invoice_temp->id) }}"> <img
                                    src="{{ asset('uploads/template/' . $invoice_temp->templateImage) }}" alt=""
                                    height="360" srcset="" style="border: 1px solid #ccc;"></a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Invoice Template End -->
    <!-- Package subscription start -->
    {{-- <section>
       <div class="container mt-5">
        <div class="text-center pb-5">
            <h2 class="h2_title">Choose Your Package</h2>
            <p class="fs-sm fw-bolder">Start creating your professional bill</p>
          </div>
        <div class="row mb-5">
            @foreach ($subcription_package as $sub_package)
            @php
                $day = $sub_package->packageDuration;

            @endphp
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-center bg-success">
                        <h5 class="card-title">{{ $sub_package->packageName }}</h5>
                     </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Invoice Template: <strong>{{ $sub_package->templateQuantity }}</strong> </li>
                        <li class="list-group-item">Total invoice Genarate: <strong>{{ $sub_package->limitInvoiceGenerate }}</strong></li>
                        <li class="list-group-item">Package Duration: <strong> @php
                              if($day<30){ echo "1 Month"; }elseif($day<60){ echo "2 Month";}elseif($day<=365){  echo "1 Year"; }
                        @endphp</strong></li>
                        <li class="list-group-item">Package Price: <strong>Tk. {{ $sub_package->price }}</strong></li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{ url('payment-gateway',$sub_package->id)}}" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
       </div>
    </section> --}}

    <style>
        p a {
            background: transparent !important;
        }


        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }



        table {
            border-collapse: collapse;
            border-spacing: 0;
        }



        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            margin: 0;
            padding: 0;

        }


        .plan h1 {
            font-style: normal;
            font-weight: 400;
            font-size: 36px;
            color: #FFB317;
            padding-bottom: 5px;

        }

        .plan p {
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            color: #898989;

        }

        .plan {
            padding-top: 32px;
            padding-bottom: 50px;
            padding-left: 50px;
            padding-right: 50px;
        }

        .Single_item {
            text-align: center;
            /* margin: 10px; */
            border: 1px solid #CCCCCC;
            padding: 10px;
            border-radius: 6px;
        }

        .border_bottom {
            border: 2px;
            margin-right: 50px !important;
            margin-left: 50px;
            margin-bottom: 10px;


        }

        .border_bottom_color2 {
            border: 1px solid #FCB21C;

        }

        .border_bottom_color3 {
            border: 1px solid #039DBF;

        }

        .border_bottom_color4 {
            border: 1px solid #A950A0;
        }

        .Single_item h5 {
            font-weight: 700;
            font-size: 18px;
            color: #000000;
            padding-bottom: 8px;
        }

        .package_time p {

            border-radius: 50%;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left: 20px;
            color: #FFF;
            font-size: 14px;
        }

        .package_time_bg_color2 p {
            background: linear-gradient(to top, #FB8700, #FCB21C);
        }

        .package_time_bg_color3 p {
            background: linear-gradient(to top, #0370BF, #039DBF);
        }

        .package_time_bg_color4 p {
            background: linear-gradient(to top, #F49AC1, #A950A0);
        }

        .package_time p span {

            font-weight: 700;
            font-size: 40px;
            line-height: 40px;
        }

        .package_time {
            width: 120px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120px;
        }


        /*table*/

        .table {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }



        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: black;
        }

        /*table*/

        .Single_item a {
            color: #FFF;
            text-decoration: none;
            background: rebeccapurple;
            padding: 5px 20px;
            border: 1px solid;
            border-radius: 20px;
        }

        .dis_none {
            display: none;
            visibility: hidden;
        }
    </style>
    <div class="package_area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="plan text-center">
                        <h1>Our Pricing Plan</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $count1 = 1;
                    $count2 = 1;
                @endphp
                @foreach ($subcription_package as $sub_package)
                    @php
                        $day = $sub_package->packageDuration;
                    @endphp
                    <div class="col-4 {{ $sub_package->price == 0 ? 'dis_none' : '' }}">

                        <!-- single item -->
                        <div class="Single_item ">
                            <h5>{{ $sub_package->packageName }}</h5>
                            <div class="border_bottom border_bottom_color{{ $count1++ }}"></div>
                            <div class="package_time package_time_bg_color{{ $count2++ }}">
                                <p><sup>$</sup> <span> {{ $sub_package->price }}</span><br> month</p>
                            </div>
                            <div class="table border">
                                <table id="customers">
                                    <tr>
                                        <td style="width: 50%;">Invoice Template: </td>
                                        <td><strong>{{ $sub_package->templateQuantity }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td> Total invoice Genarate:</td>
                                        <td> <strong>{{ $sub_package->limitInvoiceGenerate }}</strong> </td>
                                    </tr>
                                    <tr>
                                        <td> Package Duration: </td>
                                        <td><strong> @php
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
                                            </strong> </td>
                                    </tr>
                                </table>
                            </div>
                            <a href="{{ url('payment-gateway', $sub_package->id) }}">buttom</a>
                        </div>
                        <!-- single item -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!--  Package subscription  End -->
@endsection
@push('frontend_js')
@endpush
