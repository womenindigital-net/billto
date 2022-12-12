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

        .plan span {
            font-style: normal;
            font-weight: 400;
            font-size: 20px;
            color: #FFB317;
            padding-bottom: 10px;
        }

        .plan p {
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            color: #898989;
            text-align: justify;
            margin-bottom: 6px;
            margin-top: 5px;
        }

        .plan {
            /* padding-top: 32px;
            padding-bottom: 50px; */
            /* padding-left: 50px;
            padding-right: 50px; */
        }

        .text .billto_btn {
            width: 124px;
            height: 40px;
            font-weight: 500;
            /* text-align: center; */
            line-height: 27px;
        }

        .text {
            text-align: center;
        }

        .ctrate-text .icon_style {
            border: 1px solid #cccccc;
            background-color: #ebebeb;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .ctrate-text .h2_title {
            color: #FFB317;
            text-align: center;
            font-weight: 700;
            margin-top: 15px;
            line-height: 17px;
            font-size: 18px;
        }

        .invoice_template .ctrate-text .h2_title2 {
            color: #FFB317;
            text-align: center;
            font-weight: 700;
            line-height: 24px;
            font-size: 18px;
        }

        .text-center {
            text-align: center !important;
            margin-top: 5px;
        }

        .text_muted {
            color: #898989;
            margin-top: 14px;
            font-size: 12px;
            line-height: 15px;
            text-align: center;
            padding: 0px 44px;
        }

        .card-body .priceColor {
            color: #FFB317;
            font-size: 30px;
            font-weight: 700;
            line-height: 35.76px;
            margin-top: 13px;
            text-align: center;
        }

        .card-body .heding {
            font-weight: 700;
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
        }

        .card-body .text_start .margingPlanP {
            margin-bottom: 0.5rem;
            font-size: 12px
        }

        .pricing_btn_design .btnCss {
            background-color: #FFB317;
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 400;
            line-height: 22px;
            text-align: center;
            padding: 7px 38px;
        }

        .card-body .text_muted {
            color: #898989;
            margin-top: 12px;
            font-size: 12px;
            line-height: 15px;
            text-align: center;
            padding: 0px 44px;
        }
    }

    @media only screen and (max-width: 575px) {
        .mb_sm_3 {
            margin-bottom: 25px;
        }
    }

    @media only screen and (max-width: 991px) and (min-width: 768px) {
        .card-body .text_start .margingPlanP {
            margin-bottom: 0.7rem;
            font-size: 13px;
        }

        .text span {
            font-size: 15px;
        }

        .ctrate-text h2 {
            font-size: 20px;
        }

        .ctrate-text h1 {
            font-size: 20px;
        }

        .plan span {
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
            /* padding-left: 50px;
            padding-right: 50px; */
        }
    }

    @media only screen and (min-width: 992px) {
        .card-body .text_start .margingPlanP {
            margin-bottom: 1rem;
            font-size: 13px;
        }

        .plan span {
            font-style: normal;
            font-weight: 700;
            font-size: 24px;
            color: #FFB317;
            line-height: 48px;
            text-align: center;
        }

        .plan p {
            line-height: 16px;
            font-weight: 400;
            font-size: 12px;
            color: #898989;
            text-align: center;
        }

        .plan {
            padding: 3px 10px 40px 10px;
        }
    }

    .pakages_name {
        background: rgb(9 25 30 / 100%);
        padding: 1px 5px;
        border-radius: 2px;
        font-size: 13px;
        position: absolute;
        top: 0%;
        color: #FFB317;
        font-weight: 700;
        z-index: 1;
        text-decoration: none;
        right: 0%;
        text-align: center;
    }

    @media only screen and (max-width: 340px) {
        .image_width img {
            width: 100%;
        }
    }
</style>

@section('frontend_content')
    <!-- Banner Start -->
    <section class="banner_section">
        <div
            style="background: url({{ asset('assets/frontend/img/banner/banner-back.jpg') }}); opacity: .8; padding-bottom: 28px;">
            <div class="container pt-5">
                <div class="row align-items-center">
                    <div class="col-sm-6 text ">
                        <a href="{{ route('create') }}" class="btn billto_btn "><span>Create Bill</span></a>
                        <a href="{{ url('/clear-cache') }}" class="btn billto_btn"><span>cache Clear</span></a>
                    </div>
                    <div class="col-sm-6 text-end image_width">
                        <img src="{{ asset('assets/frontend/img/banner/banner.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->
    <style>
        .create_section {
            margin-top: 55px;
        }

        /* .create_section .ctrate-text .icon_style {
                                width: 39px;
                                height: 42px;
                                top: 3px;
                                left: 4.5px;
                            } */
    </style>

    <!-- Create Start -->
    <section class="create_section">
        <div class="container">
            <div class="row ctrate-text">
                <div class="col-sm-4 mb_sm_3">
                    <div class="icon_style imgHeightwidth">
                        <img src="{{ asset('assets/frontend/img/icon/file.png') }}" alt=""
                            style="width: 39px; height: 42px; top:3px; left:4.5px;">
                    </div>
                    <h2 class="h2_title heading">Create Bill</h2>
                    <p class="create_section_p">Choose from 20 templates</p>
                </div>
                <div class="col-sm-4 mb_sm_3">
                    <div class="icon_style imgHeightwidth">
                        <img src="{{ asset('assets/frontend/img/icon/pdf.png') }}" alt=""
                            style="width: 39px; height: 42px; top:3px; left:4.5px;">
                    </div>
                    <h2 class=" h2_title">Send PDF</h2>
                    <p class="create_section_p">Email or print your invoice<br>to send to your client</p>
                </div>
                <div class="col-sm-4 ">
                    <div class="icon_style imgHeightwidth">
                        <img src="{{ asset('assets/frontend/img/icon/card.png') }}" alt=""
                            style="width: 38px; height: 34px; top:3px; left:4.5px;">
                    </div>
                    <h2 class="h2_title">Get Paid</h2>
                    <p class="create_section_p">Receive payment in<br>accounts by Card or Paypal</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Create End -->

    <style>
        .tamplate_show_home {
            /* padding: 0 40px; */
        }

        .tamplate_show_home img {
            width: 100%;

        }

        .tamplate_show_A {
            margin-bottom: 19px;
        }

        .tamplate_show_A a {
            text-decoration: none;
        }

        .invoice_template {
            margin-top: 75px;
        }

        .invoice_template .h2_title2 {
            color: #FFB317;
            text-align: center;
            font-weight: 700;
            line-height: 24px;
            font-size: 24px;
        }

        .invoice_template .invoice_p {
            text-align: center;
            font-weight: 400;
            line-height: 24px;
            font-size: 12px;
        }

        .invoice_template .invoice_template_margin {
            margin-top: 40px;
        }
    </style>
    <!-- Invoice Template Start -->
    <section class="invoice_template ">
        <div class="container ">
            <div class="text-center ctrate-text">
                <p class="h2_title2">Choose Your Invoice Template</p>
                <p class="invoice_p">Start creating your professional bill</p>
            </div>
            <div class="row invoice_template_margin">
                @foreach ($invoice_template as $invoice_temp)
                    @php
                        $join_table_valu = DB::table('subscription_package_templates')
                            ->join('subscription_packages', 'subscription_package_templates.subscriptionPackageId', '=', 'subscription_packages.id')
                            ->where('subscription_package_templates.template', $invoice_temp->id)
                            ->get();
                        $join_table_value = $join_table_valu->unique('subscription_packages.id');
                    @endphp
                    @foreach ($join_table_value as $join_table_values)
                        <div class="col-sm-4 col-lg-3  tamplate_show_A">
                            <div class="card shadow">
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
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <!-- Invoice Template End -->

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

        .package_area {
            margin-top: 19px;
        }

        .package_area_border {
            border-radius: 10px;
            border: 1px solid #cccccc;
            margin-bottom: 48px;
        }
    </style>
    @php
        $count1 = 1;
        $count2 = 1;
    @endphp
    <div class="package_area ">
        <div class="container package_area_border">
            <div class="row">
                <div class="col-12">
                    <div class="plan text-center ctrate-text">
                        <span>There’s a BillTO for every business</span>
                        <p>It takes just a few seconds to create and send a professional-looking invoice. Automated
                            reminders and customized templates make paying even easier.</p>
                    </div>
                </div>
            </div>

            <style>
                .priceColor {
                    color: #FFB317;
                    font-size: 40px;
                    font-weight: 700;
                    line-height: 48.76px;
                    margin-top: 11px;
                    text-align: center;
                }

                .heding {
                    font-weight: 700;
                    margin-top: 31px;
                    font-size: 16px;
                    text-align: center;
                }

                .btnCss {
                    /* background-color: #FFB317;
                                color: #FFFFFF;
                                border: none;
                                border-radius: 5px;
                                font-size: 18px;
                                font-weight: 700;
                                line-height: 40px;
                                text-align: center;
                                padding: 8px 57px; */

                    width: 240px;
                    height: 50px;
                    background-color: #FFB317;
                    color: #FFFFFF;
                    border: none;
                    border-radius: 5px;
                    font-size: 18px;
                    font-weight: 700;
                    line-height: 32px;
                    text-align: center;
                    padding: 8px 57px;
                }

                .text_muted {
                    color: #898989;
                    margin-top: 33px;
                    font-size: 12px;
                    line-height: 15px;
                    text-align: center;
                    padding: 0px 44px;
                }

                .emty_margin {
                    margin: 11px 25px;
                    border: 1px solid #D9D9D9;
                }

                .text_start {
                    margin: 0px 33px 20px;
                }

                .pricing_btn_design {
                    margin-bottom: 29px;

                }

                .month {
                    color: #FFB317 !important;
                    font-size: 13px !important;
                }
            </style>
            <div class="row">
                @foreach ($subcription_package as $sub_package)
                    @php
                        $day = $sub_package->packageDuration;
                    @endphp
                    <div class="col-md-6 col-sm-12 col-lg-4 mb-4 {{ $sub_package->price == 0 ? 'dis_none' : '' }} ">
                        <div class="card text-center">
                            <div class="card-body p-0">
                                <h3 class="heding">{{ $sub_package->packageName }}</h3>
                                <h1 class="priceColor">${{ $sub_package->price }}<span class="month">/month</span></h1>
                                {{-- <p class="text_muted">
                                    galley of type and scrambled it to make a type specimen book.
                                </p> --}}
                                <div class="emty_margin"></div>
                                <div class="text-start text_start ">
                                    <div class="text-muted margingPlanP">
                                        <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                                        Invoice
                                        Template: <strong>{{ $sub_package->templateQuantity }}</strong>
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" /> Total
                                        invoice Genarate: <strong>{{ $sub_package->limitInvoiceGenerate }}</strong>
                                    </div>
                                    <div class="text-muted margingPlanP">
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
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />Send
                                        custom invoices & quotes.
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                                        Multi-currency
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                                        Include your company logo.
                                    </div>
                                    {{-- <p class="text-muted margingPlanP">
                                        @if ($sub_package->packageName == 'FREE')
                                         <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                         100+ Symbols for logo.
                                         @elseif ($sub_package->packageName == 'Standard')
                                         <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                                         100+ Symbols for logo.
                                         @elseif ($sub_package->packageName == 'Premium')
                                         <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                                         100+ Symbols for logo.
                                        @endif
                                    </p> --}}

                                    <div class="text-muted margingPlanP" style="margin-top: -10px; margin-bottom: -3px">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Quick Customer Support.
                                    </div>
                                    <div class="text-muted margingPlanP" style="margin-top: -5px; margin-bottom: -3px">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Manage employees.
                                    </div>
                                    <div class="text-muted margingPlanP" style="margin-top: -5px; margin-bottom: -3px">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Recurring transactions.
                                    </div>
                                    <div class="text-muted margingPlanP" style="margin-top: -5px; margin-bottom: -3px">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Track inventory.
                                    </div>
                                    <div class="text-muted margingPlanP" style="margin-top: -5px; margin-bottom: -3px">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Manage budgets.
                                    </div>
                                    <div class="text-muted margingPlanP" style="margin-top: -5px; margin-bottom: -3px">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Unlimited Invoices.
                                    </div>
                                    <div class="text-muted margingPlanP" style="margin-top: -5px; margin-bottom: -3px">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Track projects & locations.
                                    </div>

                                    {{-- <p class="text-muted margingPlanP">
                                        @if ($sub_package->packageName == 'FREE')
                                            <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        @else
                                            <img src="{{ asset('assets/frontend/img/icon/tik.png') }}" alt="" />
                                        @endif
                                        Insights & reports.
                                    </p> --}}
                                    {{-- <p class="text-muted margingPlanP">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Manage employees.
                                    </p>

                                    <p class="text-muted margingPlanP">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Recurring transactions.
                                    </p>

                                    <p class="text-muted margingPlanP">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Track inventory.
                                    </p>
                                    <p class="text-muted">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Manage budgets.
                                    </p>
                                    <p class="text-muted">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Unlimited Invoices.
                                    </p>
                                    <p class="text-muted ">
                                        <img src="{{ asset('assets/frontend/img/icon/none.png') }}" alt="" />
                                        Track projects & locations.
                                    </p> --}}


                                </div>
                                <div class="pricing_btn_design">
                                    @if ($sub_package->packageName == 'FREE')
                                        <a href="{{ url('payment-gateway', $sub_package->id) }}"><button
                                                class="btnCss">Free</button></a>
                                    @else
                                        <a href="{{ url('payment-gateway', $sub_package->id) }}"><button class="btnCss"
                                                disabled>Coming Soon</button></a>
                                    @endif
                                </div>
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
