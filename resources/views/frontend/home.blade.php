@extends('layouts.frontend.app')
@section('title', 'Billto.io')
@push('frontend_css')
@endpush
<style>
    @media only screen and (max-width: 767px) {
        .text span {
            font-size: 15px;
        }

        .ctrate-text h2 {
            font-size: 20px;
        }

        .plan h1 {
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            color: #FFB317;
            padding-bottom: 10px;
        }

        .plan p {
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            color: #898989;
            text-align: justify;

        }

        .plan {
            padding-top: 32px;
            padding-bottom: 50px;
            padding-left: 50px;
            padding-right: 50px;
        }

    }

    @media only screen and (max-width: 991px) and (min-width: 768px) {
        .text span {
            font-size: 15px;
        }

        .ctrate-text h2 {
            font-size: 20px;
        }

        .ctrate-text h1 {
            font-size: 20px;
        }

        .plan h1 {
            font-style: normal;
            font-weight: 400;
            font-size: 24px;
            color: #FFB317;
            padding-bottom: 10px;
        }

        .plan p {
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            color: #898989;
            text-align: justify;

        }

        .plan {
            padding-top: 32px;
            padding-bottom: 50px;
            padding-left: 50px;
            padding-right: 50px;
        }
    }

    @media only screen and (min-width: 992px) {
        .plan h1 {
            font-style: normal;
            font-weight: 400;
            font-size: 30px;
            color: #FFB317;
            padding-bottom: 10px;
        }

        .plan p {
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            color: #898989;
            text-align: center;

        }

        .plan {
            padding-top: 32px;
            padding-bottom: 50px;
            padding-left: 50px;
            padding-right: 50px;
        }
    }

    .pakages_name {
        background: rgb(9 25 30 / 78%);
        padding: 1px 11px;
        border-radius: 5px;
        line-height: normal;
        font-size: 16px;
        position: relative;
        top: 8%;
        color: white;
        display: flex;
        font-weight: 700;
        z-index: 9999;
        text-decoration: none;
        float: right;
        margin-right: 13%;

    }
</style>

@section('frontend_content')
    <!-- Banner Start -->
    <section class="banner_section">
        <div style="background: url({{ asset('assets/frontend/img/banner/banner-back.jpg') }}); opacity: .8;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-md-6 text">
                        <a href="{{ route('create') }}" class="btn billto_btn "><span>Create Bill</span></a>
                        <a href="{{ url('/clear-cache') }}" class="btn billto_btn"><span>cache Clear</span></a>
                    </div>
                    <div class="col-md-6 text-end">
                        <img src="{{ asset('assets/frontend/img/banner/banner.png') }}" width="100%" alt=""
                            srcset="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Create Start -->
    <section class="create_section">
        <div>
            <div class="container mt-4">
                <div class="row ctrate-text">
                    <div class="col-md-4  p-2 mb-3 ">
                        <div class="icon_style">
                            <img src="{{ asset('assets/frontend/img/icon/file.png') }}" alt="" srcset=""
                                width="60" style="width: 66px;">
                        </div>
                        <h2 class="mt-2 h2_title heading">Create Bill</h2>
                        <p>Choose from 20 templates</p>
                    </div>
                    <div class="col-md-4  p-2 mb-3">
                        <div class="icon_style ">
                            <img src="{{ asset('assets/frontend/img/icon/pdf.png') }}" alt="" srcset=""
                                width="60" style="width: 60px;position: relative;left: 3px;">
                        </div>
                        <h2 class="mt-2 h2_title">Send PDF</h2>
                        <p>Email or print your invoice</br>to send to your client</p>
                    </div>
                    <div class="col-md-4  p-2 mb-3">
                        <div class="icon_style ">
                            <img src="{{ asset('assets/frontend/img/icon/card.png') }}" alt="" srcset=""
                                width="60">
                        </div>
                        <h2 class="mt-2 h2_title">Get Paid</h2>
                        <p>Receive payment in</br>accounts by Card or Paypal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Create End -->

    <style>
        .tamplate_show_home {
            padding: 0 40px;
        }

        .tamplate_show_home img {
            width: 100%;

        }

        .tamplate_show_A a {
            text-decoration: none;
        }
    </style>
    <!-- Invoice Template Start -->
    <section class="invoice_template">
        <div class="container my-3">
            <div class="text-center pb-5 ctrate-text">
                <h2 class="h2_title">Choose Your Invoice Template</h2>
                <p class="fs-sm fw-bolder">Start creating your professional bill</p>
            </div>
            <div class="row">
                @foreach ($invoice_template as $invoice_temp)
                    @php
                        $join_table_valu = DB::table('subscription_package_templates')
                            ->join('subscription_packages', 'subscription_package_templates.subscriptionPackageId', '=', 'subscription_packages.id')
                            ->where('subscription_package_templates.template', $invoice_temp->id)
                            ->get();
                        $join_table_value = $join_table_valu->unique('subscription_packages.id');
                    @endphp
                    @foreach ($join_table_value as $join_table_values)
                        <div class="col-lg-4  tamplate_show_A">
                            <span class="pakages_name">
                                {{ $join_table_values->packageName }}
                            </span>
                            <a href="{{ url('home/invoice/page/' . $invoice_temp->id) }}">
                                <div class="tamplate_show_home">
                                    <img src="{{ asset('uploads/template/' . $invoice_temp->templateImage) }}"
                                        alt="" style="border: 1px solid #ccc;">
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
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

        .Single_item {
            text-align: center;
            / margin: 10px;/ border: 1px solid #CCCCCC;
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
    @php
        $count1 = 1;
        $count2 = 1;
    @endphp
    <div class="package_area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="plan text-center ctrate-text">
                        <h1>Our Pricing Plan</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                @foreach ($subcription_package as $sub_package)
                    @php
                        $day = $sub_package->packageDuration;
                    @endphp
                    <div class="col-md-12 col-lg-4 mb-4 {{ $sub_package->price == 0 ? 'dis_none' : '' }}">
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
            </div> --}}
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
            <div class="row">
                @foreach ($subcription_package as $sub_package)
                    @php
                        $day = $sub_package->packageDuration;
                    @endphp
                    <div class="col-md-4 col-sm-12 col-lg-4 {{ $sub_package->price == 0 ? 'dis_none' : '' }} ">
                        <div class="card text-center" style="width: 18.75rem">
                            <div class="card-body">
                                <h3 class="heding">{{ $sub_package->packageName }}</h3>
                                <h1 class="priceColor">${{ $sub_package->price }}</h1>
                                <p class="text-muted">
                                    galley of type and scrambled it to make a type specimen book.
                                </p>
                                <hr />
                                <div class="text-start">
                                    <p class="text-muted mb-3">
                                        <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                                        Invoice
                                        Template: <strong>{{ $sub_package->templateQuantity }}</strong>
                                    </p>
                                    <p class="text-muted mb-3">
                                        <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" /> Total
                                        invoice Genarate: <strong>{{ $sub_package->limitInvoiceGenerate }}</strong>
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
                                <a href="{{ url('payment-gateway', $sub_package->id) }}"><button class="btnCss">Buy
                                        now</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!--  Package subscription  End -->
@endsection
@push('frontend_js')
@endpush
