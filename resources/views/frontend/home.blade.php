@extends('layouts.frontend.app')
@section('title', 'Billto.io')
@push('frontend_css')
@endpush
@section('frontend_content')
    <!-- Banner Start -->
    <section class="banner_section">
        <div
            style="background: url({{ asset('assets/frontend/img/banner/banner-back.jpg') }}); opacity: .8; padding-bottom: 28px;">
            <div class="container pt-5">
                <div class="row align-items-center">
                    <div class="col-sm-6 text ">
                        <a href="{{ route('create') }}" class="btn billto_btn "><span>Create Bill</span></a>
                    </div>
                    <div class="col-sm-6 text-end image_width">
                        <img src="{{ asset('assets/frontend/img/banner/banner.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner End -->


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
    @php
        $count1 = 1;
        $count2 = 1;
    @endphp
    <div class="package_area ">
        <div class="container package_area_border">
            <div class="row" style="margin-bottom: 58px;">
                <div class="col-12">
                    <div class="plan text-center ctrate-text">
                        <span>There’s a BillTO for every business</span>
                        <p>It takes just a few seconds to create and send a professional-looking invoice. Automated
                            reminders and customized templates make paying even easier.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($subcription_package_free as $sub_package_free)
                    @php
                        $day = $sub_package_free->packageDuration;
                    @endphp

                    <div class="col-md-6 col-sm-12 col-lg-4 mb-4 borderNoneCard">
                        <div class="card text-center ">
                            <div class="card-body shadowcard p-0">
                                <h3 class="heding"> {{ $sub_package_free->packageName }}</h3>
                                <h1 class="priceColor">${{ $sub_package_free->price }}<span class="month">/month</span>
                                </h1>
                                {{-- <p class="text_muted">
                                    galley of type and scrambled it to make a type specimen book.
                                </p> --}}
                                <div class="emty_margin"></div>
                                <div class="text-start text_start ">
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" />
                                        Invoice
                                        Template: <strong> {{ $sub_package_free->price }}</strong>
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" /> Total
                                        invoice Genarate: <strong> {{ $sub_package_free->limitInvoiceGenerate }}</strong>
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" />
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

                                    @php
                                        $join_pricing_subcription_tbl = DB::table('subscription_packages')
                                            ->join('pricings', 'subscription_packages.id', '=', 'pricings.subscription_package_id')
                                            ->where('pricings.subscription_package_id', $sub_package_free->id)
                                            ->get();
                                    @endphp
                                    @foreach ($join_pricing_subcription_tbl as $join_pricing_subcription_value)
                                        <div class="text-muted margingPlanP">
                                            @if ($join_pricing_subcription_value->logo == 'Success')
                                                <img class="none_image"
                                                    src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                                    alt="" />{{ $join_pricing_subcription_value->description }}
                                            @else
                                                <img class="none_image"
                                                    src="{{ asset('assets/frontend/img/icon/none.png') }}"
                                                    alt="" />{{ $join_pricing_subcription_value->description }}
                                            @endif
                                        </div>
                                    @endforeach

                                </div>
                                <div class="pricing_btn_design">
                                    <a href="{{ url('payment-gateway', $sub_package_free->id) }}"><button
                                            class="btnCss">Free</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- standard pakage  --}}
                @foreach ($subcription_package_stand as $sub_package_stnd)
                    @php
                        $day = $sub_package_stnd->packageDuration;
                    @endphp

                    <div class="col-md-6 col-sm-12 col-lg-4 mb-4 borderNoneCard">
                        <div class="card text-center">
                            <div class="card-body shadowcard p-0">
                                <h3 class="heding"> {{ $sub_package_stnd->packageName }}</h3>
                                <h1 class="priceColor">${{ $sub_package_stnd->price }}<span class="month">/month</span>
                                </h1>
                                {{-- <p class="text_muted">
                                galley of type and scrambled it to make a type specimen book.
                            </p> --}}
                                <div class="emty_margin"></div>
                                <div class="text-start text_start ">
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" />
                                        Invoice
                                        Template: <strong> {{ $sub_package_stnd->price }}</strong>
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" /> Total
                                        invoice Genarate: <strong> {{ $sub_package_stnd->limitInvoiceGenerate }}</strong>
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" />
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

                                    @php
                                        $join_pricing_subcription_tbl = DB::table('subscription_packages')
                                            ->join('pricings', 'subscription_packages.id', '=', 'pricings.subscription_package_id')
                                            ->where('pricings.subscription_package_id', $sub_package_stnd->id)
                                            ->get();
                                    @endphp
                                    @foreach ($join_pricing_subcription_tbl as $join_pricing_subcription_value)
                                        <div class="text-muted margingPlanP">
                                            @if ($join_pricing_subcription_value->logo == 'Success')
                                                <img class="none_image"
                                                    src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                                    alt="" />{{ $join_pricing_subcription_value->description }}
                                            @else
                                                <img class="none_image"
                                                    src="{{ asset('assets/frontend/img/icon/none.png') }}"
                                                    alt="" />{{ $join_pricing_subcription_value->description }}
                                            @endif
                                        </div>
                                    @endforeach

                                </div>
                                <div class="pricing_btn_design">
                                    <a href="{{ url('payment-gateway', $sub_package_stnd->id) }}"><button
                                            class="btnCss">Coming Soon</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- standard pakage END  --}}

                {{-- Primium pakage  --}}
                @foreach ($subcription_package_premium as $sub_package_primium)
                    @php
                        $day = $sub_package_primium->packageDuration;
                    @endphp

                    <div class="col-md-6 col-sm-12 col-lg-4 mb-4 borderNoneCard">
                        <div class="card text-center">
                            <div class="card-body shadowcard p-0">
                                <h3 class="heding"> {{ $sub_package_primium->packageName }}</h3>
                                <h1 class="priceColor">${{ $sub_package_primium->price }}<span
                                        class="month">/month</span>
                                </h1>
                                {{-- <p class="text_muted">
                                             galley of type and scrambled it to make a type specimen book.
                                         </p> --}}
                                <div class="emty_margin"></div>
                                <div class="text-start text_start ">
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" />
                                        Invoice
                                        Template: <strong> {{ $sub_package_primium->price }}</strong>
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" /> Total
                                        invoice Genarate: <strong> Unlimited</strong>
                                    </div>
                                    <div class="text-muted margingPlanP">
                                        <img class="none_image" src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                            alt="" />
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

                                    @php
                                        $join_pricing_subcription_tbl = DB::table('subscription_packages')
                                            ->join('pricings', 'subscription_packages.id', '=', 'pricings.subscription_package_id')
                                            ->where('pricings.subscription_package_id', $sub_package_primium->id)
                                            ->get();
                                    @endphp
                                    @foreach ($join_pricing_subcription_tbl as $join_pricing_subcription_value)
                                        <div class="text-muted margingPlanP">
                                            @if ($join_pricing_subcription_value->logo == 'Success')
                                                <img class="none_image"
                                                    src="{{ asset('assets/frontend/img/icon/tik.png') }}"
                                                    alt="" />{{ $join_pricing_subcription_value->description }}
                                            @else
                                                <img class="none_image"
                                                    src="{{ asset('assets/frontend/img/icon/none.png') }}"
                                                    alt="" />{{ $join_pricing_subcription_value->description }}
                                            @endif
                                        </div>
                                    @endforeach

                                </div>
                                <div class="pricing_btn_design">
                                    <a href="{{ url('payment-gateway', $sub_package_primium->id) }}"><button
                                            class="btnCss">Coming Soon</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- Primium pakage END  --}}

            </div>
        </div>
    </div>


    <!--  Package subscription  End -->
@endsection
@push('frontend_js')
@endpush
