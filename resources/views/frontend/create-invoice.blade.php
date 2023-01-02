@extends('layouts.frontend.app')
@section('title', 'Create Bill page')
@push('frontend_css')
    <style>
        .avatar-upload .avatar-preview>div {
            border-radius: 0px !important;
            background-size: contain !important0;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #fff !important;
        }
    </style>
@endpush
@section('frontend_content')
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
    <!-- banner section Start -->
    <section class="bill_banner_section d-none @php echo Session::get('hidden_session'); @endphp">
        <div style="background-color: #FFB317;">
            <div class="container py-5">
                <div class="row ">
                    <div class="col-md-8">
                        <h2 class="h2_title h3_title">Free Invoice Template</h2>
                        <p class="pt-2">Make beautiful invoices with one click!</p>
                        <p class="pt-2">Welcome to the original Invoice Generator, trusted by millions of people.
                            Invoice Generator
                            lets you quickly make invoices with our attractive invoice template straight from your web
                            browser, no sign up necessary. The invoices you make can be sent and paid online or
                            downloaded as a PDF.</p>
                        <p class="pt-2">Did we also mention that Invoice Generator lets you generate an unlimited number
                            of invoices?
                        </p>
                        <div class="pt-2 banner_footer">
                            <span class="px-4 py-2"><a href="{{ url('notice/div/hidden') }}" class="text-dark">OK, got
                                    it</a></span>
                            <a href="#" class="ps-4">Read the docs</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/img/banner/banner.png" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section End -->

    <!-- Invoice Section Start -->
    <section class="invoice_section">
        <div class="">
            {{-- @if (Auth::check())
                <form method="post" id="invoiceForm" enctype="multipart/form-data">
                @else
                    <form method="post" action="{{ url('/invoices/store') }}" enctype="multipart/form-data">
            @endif --}}
            <form method="post" action="{{ url('/invoices/store') }}" enctype="multipart/form-data">
            @csrf
            <div class="container p-4 mt-5 " style="background-color: #F0F0F0; border-radius: 10px;">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <style>
                                .logo_text {
                                    position: absolute;
                                    z-index: 1;
                                    top: 15px;
                                    margin-left: 17px;
                                }

                                .inputBorderRedius {
                                    border-radius: 10px !important;
                                }

                                .invoice {
                                    color: #898989;
                                    font-size: 400;
                                }

                                .invoiceID {
                                    margin-left: -35px !important;
                                    z-index: 99;
                                    border-left: 0;
                                    border-radius: 0 10px 10px 0px !important;
                                }

                                .dateForm {
                                    margin-left: -40px !important;
                                    z-index: 3;
                                    border-left: 0;
                                    border-radius: 0 10px 10px 0px !important;
                                    background-color: #FFFFFF !important;
                                }

                                .invoiceIdOne {
                                    z-index: 99;
                                    margin-right: -32px;
                                    background-color: #CCCCCC;
                                    border-right: none;
                                    border-radius: 10px 0px 0px 10px;
                                }


                                .textColor {
                                    color: #898989;
                                }
                            </style>
                            <div class="col-md-4 text-center mt-3">
                                <label for="imageUpload">
                                    <div class="input-group ">
                                        <div class="avatar-upload">
                                            <div class="logo_text">
                                                <label for="imageUpload"><i class="bi bi-plus"></i></label>
                                                @if($user_logo_terms->invoice_logo=="")
                                                <span class="textColor">Add your logo</span>
                                                 @endif
                                            </div>
                                            <div class="avatar-edit">
                                                <input class="" type='file' name="invoice_logo" id="imageUpload" />
                                                @if(isset($user_logo_terms->invoice_logo))
                                                 <img class="hide_image"src="{{ asset('storage/invoice/logo/'.$user_logo_terms->invoice_logo) }}"  style="width:100%; border-radius:10px;" alt="">
                                                @endif
                                            </div>

                                            <div class="avatar-preview">
                                                <div id="imagePreview"
                                                    @if (isset($invoiceData->invoice_logo)) style=" border-radius:10px; background-image: url({{ url('storage/invoice/logo/' . $invoiceData->invoice_logo) }});"
                                                      @else
                                                          style="background-image: url();" @endif  >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                            </div>

                            <div class="col-md-8 ">
                                <div class="d-flex my-3">
                                    <label class="form-label pe-2 pt-1 textColor">Currency: </label>
                                    <select class="tk w-50 fw-bolder form-select form-select-sm inputBorderRedius"
                                        name="currency" id="currencyList" onchange="currency1()">
                                        @if (isset($invoiceData->currency))
                                            <option value="{{ $invoiceData->currency }}" selected="selected"
                                                label="{{ $invoiceData->currency }}">{{ $invoiceData->currency }}
                                            </option>
                                        @else
                                            <option value="USD" selected="selected" label="USD">USD</option>
                                        @endif
                                        <option value="EUR" label="Euro">EUR</option>
                                        <option value="JPY" label="Japanese yen">JPY</option>
                                        <option value="GBP" label="Pound sterling">GBP</option>
                                        <option disabled>──────────</option>
                                        <option value="AED" label="United Arab Emirates dirham">AED</option>
                                        <option value="AFN" label="Afghan afghani">AFN</option>
                                        <option value="ALL" label="Albanian lek">ALL</option>
                                        <option value="AMD" label="Armenian dram">AMD</option>
                                        <option value="ANG" label="Netherlands Antillean guilder">ANG</option>
                                        <option value="AOA" label="Angolan kwanza">AOA</option>
                                        <option value="ARS" label="Argentine peso">ARS</option>
                                        <option value="AUD" label="Australian dollar">AUD</option>
                                        <option value="AWG" label="Aruban florin">AWG</option>
                                        <option value="AZN" label="Azerbaijani manat">AZN</option>
                                        <option value="BAM" label="Bosnia and Herzegovina convertible mark">BAM
                                        </option>
                                        <option value="BBD" label="Barbadian dollar">BBD</option>
                                        <option value="BDT" label="Bangladeshi taka">BDT</option>
                                        <option value="BGN" label="Bulgarian lev">BGN</option>
                                        <option value="BHD" label="Bahraini dinar">BHD</option>
                                        <option value="BIF" label="Burundian franc">BIF</option>
                                        <option value="BMD" label="Bermudian dollar">BMD</option>
                                        <option value="BND" label="Brunei dollar">BND</option>
                                        <option value="BOB" label="Bolivian boliviano">BOB</option>
                                        <option value="BRL" label="Brazilian real">BRL</option>
                                        <option value="BSD" label="Bahamian dollar">BSD</option>
                                        <option value="BTN" label="Bhutanese ngultrum">BTN</option>
                                        <option value="BWP" label="Botswana pula">BWP</option>
                                        <option value="BYN" label="Belarusian ruble">BYN</option>
                                        <option value="BZD" label="Belize dollar">BZD</option>
                                        <option value="CAD" label="Canadian dollar">CAD</option>
                                        <option value="CDF" label="Congolese franc">CDF</option>
                                        <option value="CHF" label="Swiss franc">CHF</option>
                                        <option value="CLP" label="Chilean peso">CLP</option>
                                        <option value="CNY" label="Chinese yuan">CNY</option>
                                        <option value="COP" label="Colombian peso">COP</option>
                                        <option value="CRC" label="Costa Rican colón">CRC</option>
                                        <option value="CUC" label="Cuban convertible peso">CUC</option>
                                        <option value="CUP" label="Cuban peso">CUP</option>
                                        <option value="CVE" label="Cape Verdean escudo">CVE</option>
                                        <option value="CZK" label="Czech koruna">CZK</option>
                                        <option value="DJF" label="Djiboutian franc">DJF</option>
                                        <option value="DKK" label="Danish krone">DKK</option>
                                        <option value="DOP" label="Dominican peso">DOP</option>
                                        <option value="DZD" label="Algerian dinar">DZD</option>
                                        <option value="EGP" label="Egyptian pound">EGP</option>
                                        <option value="ERN" label="Eritrean nakfa">ERN</option>
                                        <option value="ETB" label="Ethiopian birr">ETB</option>
                                        <option value="EUR" label="EURO">EUR</option>
                                        <option value="FJD" label="Fijian dollar">FJD</option>
                                        <option value="FKP" label="Falkland Islands pound">FKP</option>
                                        <option value="GBP" label="British pound">GBP</option>
                                        <option value="GEL" label="Georgian lari">GEL</option>
                                        <option value="GGP" label="Guernsey pound">GGP</option>
                                        <option value="GHS" label="Ghanaian cedi">GHS</option>
                                        <option value="GIP" label="Gibraltar pound">GIP</option>
                                        <option value="GMD" label="Gambian dalasi">GMD</option>
                                        <option value="GNF" label="Guinean franc">GNF</option>
                                        <option value="GTQ" label="Guatemalan quetzal">GTQ</option>
                                        <option value="GYD" label="Guyanese dollar">GYD</option>
                                        <option value="HKD" label="Hong Kong dollar">HKD</option>
                                        <option value="HNL" label="Honduran lempira">HNL</option>
                                        <option value="HKD" label="Hong Kong dollar">HKD</option>
                                        <option value="HRK" label="Croatian kuna">HRK</option>
                                        <option value="HTG" label="Haitian gourde">HTG</option>
                                        <option value="HUF" label="Hungarian forint">HUF</option>
                                        <option value="IDR" label="Indonesian rupiah">IDR</option>
                                        <option value="ILS" label="Israeli new shekel">ILS</option>
                                        <option value="IMP" label="Manx pound">IMP</option>
                                        <option value="INR" label="Indian rupee">INR</option>
                                        <option value="IQD" label="Iraqi dinar">IQD</option>
                                        <option value="IRR" label="Iranian rial">IRR</option>
                                        <option value="ISK" label="Icelandic króna">ISK</option>
                                        <option value="JEP" label="Jersey pound">JEP</option>
                                        <option value="JMD" label="Jamaican dollar">JMD</option>
                                        <option value="JOD" label="Jordanian dinar">JOD</option>
                                        <option value="JPY" label="Japanese yen">JPY</option>
                                        <option value="KES" label="Kenyan shilling">KES</option>
                                        <option value="KGS" label="Kyrgyzstani som">KGS</option>
                                        <option value="KHR" label="Cambodian riel">KHR</option>
                                        <option value="KID" label="Kiribati dollar">KID</option>
                                        <option value="KMF" label="Comorian franc">KMF</option>
                                        <option value="KPW" label="North Korean won">KPW</option>
                                        <option value="KRW" label="South Korean won">KRW</option>
                                        <option value="KWD" label="Kuwaiti dinar">KWD</option>
                                        <option value="KYD" label="Cayman Islands dollar">KYD</option>
                                        <option value="KZT" label="Kazakhstani tenge">KZT</option>
                                        <option value="LAK" label="Lao kip">LAK</option>
                                        <option value="LBP" label="Lebanese pound">LBP</option>
                                        <option value="LKR" label="Sri Lankan rupee">LKR</option>
                                        <option value="LRD" label="Liberian dollar">LRD</option>
                                        <option value="LSL" label="Lesotho loti">LSL</option>
                                        <option value="LYD" label="Libyan dinar">LYD</option>
                                        <option value="MAD" label="Moroccan dirham">MAD</option>
                                        <option value="MDL" label="Moldovan leu">MDL</option>
                                        <option value="MGA" label="Malagasy ariary">MGA</option>
                                        <option value="MKD" label="Macedonian denar">MKD</option>
                                        <option value="MMK" label="Burmese kyat">MMK</option>
                                        <option value="MNT" label="Mongolian tögrög">MNT</option>
                                        <option value="MOP" label="Macanese pataca">MOP</option>
                                        <option value="MRU" label="Mauritanian ouguiya">MRU</option>
                                        <option value="MUR" label="Mauritian rupee">MUR</option>
                                        <option value="MVR" label="Maldivian rufiyaa">MVR</option>
                                        <option value="MWK" label="Malawian kwacha">MWK</option>
                                        <option value="MXN" label="Mexican peso">MXN</option>
                                        <option value="MYR" label="Malaysian ringgit">MYR</option>
                                        <option value="MZN" label="Mozambican metical">MZN</option>
                                        <option value="NAD" label="Namibian dollar">NAD</option>
                                        <option value="NGN" label="Nigerian naira">NGN</option>
                                        <option value="NIO" label="Nicaraguan córdoba">NIO</option>
                                        <option value="NOK" label="Norwegian krone">NOK</option>
                                        <option value="NPR" label="Nepalese rupee">NPR</option>
                                        <option value="NZD" label="New Zealand dollar">NZD</option>
                                        <option value="OMR" label="Omani rial">OMR</option>
                                        <option value="PAB" label="Panamanian balboa">PAB</option>
                                        <option value="PEN" label="Peruvian sol">PEN</option>
                                        <option value="PGK" label="Papua New Guinean kina">PGK</option>
                                        <option value="PHP" label="Philippine peso">PHP</option>
                                        <option value="PKR" label="Pakistani rupee">PKR</option>
                                        <option value="PLN" label="Polish złoty">PLN</option>
                                        <option value="PRB" label="Transnistrian ruble">PRB</option>
                                        <option value="PYG" label="Paraguayan guaraní">PYG</option>
                                        <option value="QAR" label="Qatari riyal">QAR</option>
                                        <option value="RON" label="Romanian leu">RON</option>
                                        <option value="RON" label="Romanian leu">RON</option>
                                        <option value="RSD" label="Serbian dinar">RSD</option>
                                        <option value="RUB" label="Russian ruble">RUB</option>
                                        <option value="RWF" label="Rwandan franc">RWF</option>
                                        <option value="SAR" label="Saudi riyal">SAR</option>
                                        <option value="SEK" label="Swedish krona">SEK</option>
                                        <option value="SGD" label="Singapore dollar">SGD</option>
                                        <option value="SHP" label="Saint Helena pound">SHP</option>
                                        <option value="SLL" label="Sierra Leonean leone">SLL</option>
                                        <option value="SLS" label="Somaliland shilling">SLS</option>
                                        <option value="SOS" label="Somali shilling">SOS</option>
                                        <option value="SRD" label="Surinamese dollar">SRD</option>
                                        <option value="SSP" label="South Sudanese pound">SSP</option>
                                        <option value="STN" label="São Tomé and Príncipe dobra">STN</option>
                                        <option value="SYP" label="Syrian pound">SYP</option>
                                        <option value="SZL" label="Swazi lilangeni">SZL</option>
                                        <option value="THB" label="Thai baht">THB</option>
                                        <option value="TJS" label="Tajikistani somoni">TJS</option>
                                        <option value="TMT" label="Turkmenistan manat">TMT</option>
                                        <option value="TND" label="Tunisian dinar">TND</option>
                                        <option value="TOP" label="Tongan paʻanga">TOP</option>
                                        <option value="TRY" label="Turkish lira">TRY</option>
                                        <option value="TTD" label="Trinidad and Tobago dollar">TTD</option>
                                        <option value="TVD" label="Tuvaluan dollar">TVD</option>
                                        <option value="TWD" label="New Taiwan dollar">TWD</option>
                                        <option value="TZS" label="Tanzanian shilling">TZS</option>
                                        <option value="UAH" label="Ukrainian hryvnia">UAH</option>
                                        <option value="UGX" label="Ugandan shilling">UGX</option>
                                        <option value="USD" label="United States dollar">USD</option>
                                        <option value="UYU" label="Uruguayan peso">UYU</option>
                                        <option value="UZS" label="Uzbekistani soʻm">UZS</option>
                                        <option value="VES" label="Venezuelan bolívar soberano">VES</option>
                                        <option value="VND" label="Vietnamese đồng">VND</option>
                                        <option value="VUV" label="Vanuatu vatu">VUV</option>
                                        <option value="WST" label="Samoan tālā">WST</option>
                                        <option value="XAF" label="Central African CFA franc">XAF</option>
                                        <option value="XCD" label="Eastern Caribbean dollar">XCD</option>
                                        <option value="XOF" label="West African CFA franc">XOF</option>
                                        <option value="XPF" label="CFP franc">XPF</option>
                                        <option value="ZAR" label="South African rand">ZAR</option>
                                        <option value="ZMW" label="Zambian kwacha">ZMW</option>
                                        <option value="ZWB" label="Zimbabwean bonds">ZWB</option>
                                    </select>
                                </div>
                                <div>
                                    {{-- <label class="form-label">Using Default Template</label> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                {{-- <label for="invoice_form" class="form-label textColor"></label> --}}
                                <textarea name="invoice_form" id="invoice_form" rows="2" type="text"
                                    class="form-control inputBorderRedius textColor" placeholder="Who is this invoice from?">
@if (isset($invoiceData->invoice_form))
{{ $invoiceData->invoice_form }}
@elseif (isset($lastInvoice->invoice_form))
{{ $lastInvoice->invoice_form }}
@else
@endif
</textarea>
                                <div id="invoice_form_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row pt-4 pb-3">
                            <div class="col-md-8">

                                <label for="invoice_to" class="form-label textColor">Bill to *</label>
                                <textarea name="invoice_to" id="invoice_to" rows="2" type="text"
                                    class="form-control inputBorderRedius textColor" placeholder="Who is this invoice to?">
@if (isset($invoiceData->invoice_to))
{{ $invoiceData->invoice_to }}
@elseif(isset($lastInvoice->invoice_to))
{{ $lastInvoice->invoice_to }}
@else
@endif
</textarea>
                                <div id="invoice_to_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" style="display: grid">
                        <div class="row">
                            <div class="col-sm-4 d-flex">
                            </div>
                            <div class="col-sm-8 mb-2">
                                <h1 class="text-center invoice">INVOICE</h1>
                                <div class="input-group">
                                    <div class="input-group-text invoiceIdOne">&#9839;</div>
                                    <input readonly type="text" name="invoice_id"
                                        class="form-control inputBorderRedius"
                                        value="    @if (isset($invoiceData->invoice_id)) {{ $invoiceData->invoice_id }} @else {{ 'INVID' . $invoiceCountNew }} @endif"
                                        id="invoice_id" placeholder="INVOICE ID">
                                    <input type="hidden" id="id" name="id"
                                        value="@if (isset($invoiceData->id)) {{ $invoiceData->id }} @endif">
                                    <div class="input-group-text bg-white invoiceID">
                                        @if (isset($invoiceCount))
                                            {{ $invoiceCount }}
                                        @elseif (isset($invoiceCountNew))
                                            {{ $invoiceCountNew }}
                                        @else
                                            1
                                        @endif
                                    </div>
                                    <div id="invoice_id_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label textColor">Date *</label>
                            <div class="col-sm-8">
                                <div class="input-group ">
                                    <input type="text" name="invoice_date"
                                        class="form-control textColor inputBorderRedius"
                                        value=" @if (isset($invoiceData->invoice_date)) {{ $invoiceData->invoice_date }}@else{{ date('Y-m-d') }} @endif"
                                        id="invoice_date" readonly>
                                    <label class="input-group-text dateForm" for="invoice_date">
                                        <i class="bi bi-calendar3"></i>
                                    </label>
                                </div>
                                <div id="invoice_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="invoice_payment_term" class="col-sm-4 col-form-label textColor">Payment
                                Terms</label>
                            <div class="col-sm-8">
                                <input type="text" name="invoice_payment_term" class="form-control inputBorderRedius"
                                    id="invoice_payment_term" placeholder="Online/Bank/Cash Transaction"
                                    value="@if (isset($invoiceData->invoice_payment_term)) {{ $invoiceData->invoice_payment_term }} @endif">
                                <div id="invoice_payment_term_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label textColor">Due Date *</label>
                            @php
                                $date = new DateTime(now());
                                $date->modify('1 day');
                            @endphp
                            <div class="col-sm-8 ">
                                <div class="input-group">
                                    <input type="text" name="invoice_dou_date"
                                        class="form-control textColor inputBorderRedius"
                                        value="@if (isset($invoiceData->invoice_dou_date)) {{ $invoiceData->invoice_dou_date }}@else {{ $date->format('Y-m-d') }} @endif"
                                        id="invoice_dou_date" readonly>
                                    <label class="input-group-text dateForm" for="invoice_dou_date">
                                        <i class="bi bi-calendar3"></i>
                                    </label>
                                    <div id="invoice_dou_date_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="invoice_po_number" class="col-sm-4 col-form-label textColor">PO Number</label>
                            <div class="col-sm-8">
                                <input type="text" name="invoice_po_number"
                                    class="form-control inputBorderRedius textColor" id="invoice_po_number"
                                    value="@if (isset($invoiceData->invoice_po_number)) {{ $invoiceData->invoice_po_number }} @endif">
                                <div id="invoice_po_number_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .table .custab1 {
                        background-color: #FFB317;
                        color: #FFFFFF;
                        -webkit-border-radius: 10px 0px 0px 10px;
                        border-radius: 10px 0px 0px 10px;
                        border-collapse: separate;
                    }

                    .table .custab2 {
                        background-color: #FFB317;
                        color: #FFFFFF;

                        border-collapse: separate;
                    }

                    .table .custab3 {
                        background-color: #FFB317;
                        color: #FFFFFF;
                        -webkit-border-radius: 10px 0px 0px 10px;
                        border-radius: 0px 10px 10px 0px;
                        border-collapse: separate;
                    }

                    .bgInput {
                        background-color: #f7f2f247 !important;
                    }

                    .InputCustomize {
                        z-index: 99;
                        background-color: #f7f2f247;
                    }

                    .InputCustomizeTex {
                        margin-left: -19px !important;
                        z-index: 99;
                        border-left: 0;
                        margin-top: 2px;
                        margin-bottom: 2px;
                        border-radius: 0 10px 10px 0px !important;
                        background: #FFFFFF;
                    }

                    .border_round{
                        border: 1px solid #cfcdcd;
                        border-radius: 10px !important;
                        min-width: 50%;
                        justify-content: flex-end;

                    }
                    .dateForm_recived{
                        z-index: 3;
                        border-left: 0;
                        border-radius: 0 10px 10px 0px !important;
                        background-color: #FFFFFF !important;
                        margin-left: -47px !important;
                    }

                    input[type="checkbox"] {
                    accent-color: #FFB317;

                    }
                </style>
                <div class="table-responsive customBG">
                    <table class="table ">
                        <thead class="">
                            <tr class="tr_f ">
                                {{-- <th scope="col" style="width: 3%" class="custab1">#</th> --}}
                                <th scope="col" style="width: 58%" class="custab1">Item</th>
                                <th scope="col" style="width: 10%" class="custab2">Quantity</th>
                                <th scope="col" style="width: 10%" class="custab2">Rate</th>
                                <th scope="col" style="width: 10%" class="custab2">Amount</th>
                                <th scope="col" style="width: 10%" class="custab3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">

                        </tbody>

                    </table>
                </div>
                <div class="product row m-0">
                    <div class="p-0 pe-2 pb-2 me-2 col-md-7">
                        <textarea type="text" name="product_name" id="product_name" class="form-control inputBorderRedius"
                            placeholder="Description of service or product" rows="1" onchange="addData();"></textarea>
                        <div id="name_error" class="invalid-feedback"></div>
                    </div>
                    <div class="text-start me-3 p-0 pb-2 col-md-1">
                        <div class="input-group">
                            <input type="number" name="product_quantity" id="product_quantity"
                                class="form-control inputBorderRedius" placeholder="Quantity"
                                onchange="ptotal();addData();">
                            {{-- <div class="input-group-text fw-bold border-0">X</div> --}}
                            <div id="quantity_error" class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="text-start p-0 me-3 pe-1 pb-2 col-md-1 ">
                        <div class="input-group ">
                            <input type="number" name="product_rate" id="product_rate"
                                class="form-control inputBorderRedius" placeholder="Rate" onchange="ptotal();addData();">
                            {{-- <div class="input-group-text inputBorderRedius" id="currency">USD</div> --}}
                            <div id="product_rate_error" class="invalid-feedback"></div>
                        </div>

                    </div>
                    <div class=" col-md-1 p-0  pb-2">
                        <div
                            class="ps-2 input-group inputBorderRedius text-center  border rounded justify-content-between align-items-center d-flex ">
                            <div class="input-group-text inputBorderRedius border-0 bgInput textColor" id="currency">$
                            </div>
                            <span id="product_amount" class="fw-bolder px-2"></span>
                        </div>
                    </div>
                    <style>
                        .svg_size_plus {
                            width: 33px;
                            cursor: pointer;
                            margin-left: 3px;
                            margin-top: 1px;
                        }
                    </style>
                    <div class=" col-md-1  text-center">
                        <div class="" style="padding-left: 30px">
                            <div class="svg_size_plus">
                                <img src="{{ asset('uploads/defaultUserImage/icon-add.png') }}" alt=""
                                    style="width: 33px;height:33px; margin-top:2px;">

                            </div>
                        </div>
                    </div>
                </div>
                <style>

                </style>
                <div class="mt-2 ">
                    <span id="product_clear" class="btn btn-danger inputBorderRedius " onclick="pclear()">
                        Clear Input
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-x-octagon" viewBox="0 0 16 16">
                            <path
                                d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </div>
                {{-- </form> --}}
                <div class="row pt-4">
                    <div class="col-md-6">
                        <div>
                            <label for="invoice_notes" class="form-label textColor">Notes</label>
                            <textarea name="invoice_notes" id="invoice_notes" rows="3" class="form-control inputBorderRedius"
                                placeholder="Notes - any related information not already covered">
@if (isset($invoiceData->invoice_notes))
{{ $invoiceData->invoice_notes }}
@endif
</textarea>
                            <div id="invoice_notes_error" class="invalid-feedback"></div>
                        </div>
                        <div class="">
                            <label for="invoice_terms"
                                class="form-label pt-2 d-flex align-items-center textColor">Terms</label>
                            <textarea name="invoice_terms" id="invoice_terms" rows="3" class="form-control inputBorderRedius"
                                placeholder="Terms and conditions, late fees, payment methods, delivery schedule">
@if (isset($user_logo_terms->terms))
{{ $user_logo_terms->terms }}
@endif
</textarea>
                            <div id="invoice_terms_error" class="invalid-feedback"></div>
                        </div>
                        <div class="pt-3 d-flex align-items-center">
                            <input type="checkbox" style="width: 20px; height:20px" name="invoice_signature" value="signature_add" checked>
                            <label class="textColor ms-2">Add Signature</label><br>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-end pt-2 pe-4">
                        <div class="row">
                            <div class="col-7 d-flex align-items-center justify-content-end pe-5 fw-bolder  textColor text-right">Sub total</div>
                            <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                                <div class="input-group-text  InputCustomize border-0  textColor" id="currency">$</div>
                                <span class="pt-2 pe-2 fw-bolder textColor" id="subtotal">0.00</span>
                                <input type="hidden" id="subtotal_no_vat" name="subtotal_no_vat">
                            </div>
                        </div>
                        <div class="row pt-2 ">
                            <div class="col-7 d-flex align-items-center justify-content-end textColor pe-5">Tax</div>
                            <div class="col input-group p-0">
                                {{-- <div class="input-group-text  border-0 bgInput textColor ">&#8453;</div> --}}

                                <input type="text" name="invoice_tax" max="100"
                                    class="form-control text-end pe-3 inputBorderRedius"
                                    value="@if(isset($invoiceData->invoice_tax_percent)) {{ $invoiceData->invoice_tax_percent }} @endif"
                                    id="invoice_tax" onchange="total()">
                                    <div class="input-group-text  InputCustomizeTex border-0 p-0 textColor" > &#8453; </div>

                                    <div class="d-flex border_round align-items-center  p-0 ms-2">
                                        <div class="input-group-text bgInput border-0 textColor p-0 pe-2 ps-2" id="currency">$ </div>
                                        <span class="fw-bolder  textColor pe-2 p-0" id="text_pecent_amount"> </span>
                                    </div>

                                <div id="invoice_tax_error" class="invalid-feedback"></div>
                                <input type="hidden" id="invoice_tax_amounts"  name="invoice_tax_amounts">
                            </div>

                        </div>
                        <div class="d-flex flex-column justify-content-end pt-2">


                            <div class="row ">
                                <div class="col-7 d-flex align-items-center pe-5 justify-content-end textColor">
                                    <label for="#discount_persent">Discount</label>
                                </div>
                                <div class="col input-group p-0">
                                    <input type="text" name="discount_percent" id="discount_persent" min="0" max="100"
                                     value="@if (isset($invoiceData->discount_percent)) {{ $invoiceData->discount_percent }} @endif"
                                        class="form-control text-end pe-3 inputBorderRedius" onchange="total()">
                                    <div class="input-group-text  InputCustomizeTex border-0  textColor p-0">
                                        &#8453;
                                    </div>

                                    <div class="d-flex border_round align-items-center  p-0 ms-2">
                                        <div class="input-group-text bgInput border-0 textColor p-0 pe-2 ps-2" id="currency">$ </div>
                                        <span class="fw-bolder  textColor pe-2 p-0" id="discount_amount" onchange="totalInwords();"> </span>
                                    </div>

                                    <div class="text-danger w-100 ps-2 d-none" id="discount_persent_realtime" style="font-size: 12px;"> Below 100% </div>
                                    <input type="hidden" id="discount_amounts" name="discount_amounts" >
                                </div>
                            </div>
                           {{--  <div class="row pt-2">
                                <div class="col-7 d-flex align-items-center  textColor">Discount Amount</div>
                                <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                                    <div class="input-group-text bgInput border-0 textColor" id="currency">$</div>
                                    <span class="p-2 fw-bolder  textColor" id="discount_amount">
                                    </span>

                                </div>
                            </div>--}}

                            <div class="row pt-2">
                                <div class="col-7 d-flex align-items-center fw-bolder justify-content-end  pe-5 textColor">Total</div>
                                <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                                    <div class="input-group-text  InputCustomize border-0  textColor" id="currency">$
                                    </div>
                                    <span class="pt-2 pe-2 fw-bolder textColor" id="total" onchange="totalInwords();">
                                        @if (isset($invoiceData->total))
                                            {{ $invoiceData->total }}
                                        @endif
                                    </span>
                                    {{-- <div class="input-group-text" id="currency">USD</div> --}}
                                </div>
                                <p id="totalInwords" class="text-end text-dark"
                                    style="font-size: 10px;text-transform: capitalize;"></p>
                                    <input type="hidden" id="final_total" name="final_total">
                            </div>
                            {{-- <div class="row pt-2 ">
                <div class="col-7 d-flex align-items-center">Advance Amount</div>
                <div class="col input-group p-0">
                  <input type="number" name="advance_amount" class="form-control" value="" id="advance_amount" onchange="total()">
                  <div class="input-group-text">&#8453;</div>
                  <div id="advance_amount_error" class="invalid-feedback"></div>
                </div>
              </div> --}}
              <style>
                .border_real{
                    border-top:1px solid rgb(250, 39, 39);
                    border-bottom:1px solid rgb(255, 22, 22);
                    border-right:1px solid rgb(250, 39, 39);
                }
            </style>
                        <div class="row pt-2 ">
                            <div class="col-7 d-flex align-items-center justify-content-end  pe-5 textColor">Receive Advance Amount</div>
                            <div class="col input-group p-0">
                                <input type="text" name="receive_advance_amount"
                                    class="form-control inputBorderRedius text-end  pe-5" role="button" aria-disabled="true"
                                    value="@if (isset($invoiceData->receive_advance_amount)) {{ $invoiceData->receive_advance_amount }} @endif"
                                     id="receive_advance_amount"  onchange="total()">
                                  <div class="input-group-text textColor dateForm_recived pe-4 " id="currency">$</div>
                                <div id="receive_advance_amount_error" class="invalid-feedback"></div>
                                <div class="text-danger w-100 ps-2 d-none" id="receive_amount_realtime" style="font-size: 12px;">  Below total balance </div>

                            </div>
                        </div>


                            <div class="row pt-2 ">
                                <div class="col-7 d-flex align-items-center pe-5 justify-content-end textColor">
                                    <label for="#requesting_advance_amount">Requesting Advance Amount</label>
                                </div>
                                <div class="col input-group p-0">
                                    <input type="text" name="requesting_advance_amount"
                                        class="form-control text-end  inputBorderRedius"
                                        value="@if (isset($invoiceData->requesting_advance_amount_percent)) {{ $invoiceData->requesting_advance_amount_percent }} @endif"
                                        id="requesting_advance_amount" onchange="requestingAdvanceAmount()">
                                    {{-- <div class="input-group-text">&#8453;</div> --}}

                                    <div class="d-flex border_round align-items-center  p-0 ms-1">
                                        <div class="input-group-text bgInput border-0 textColor p-0 pe-2 ps-2" id="currency">$ </div>
                                        <span class="fw-bolder  textColor pe-2 p-0" id="requesting_advance_amount_number">
                                            @if (isset($requesting_advance_amount))
                                                {{ $requesting_advance_amount }}
                                            @endif
                                        </span>
                                    </div>

                                    <div id="requesting_advance_amount_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            {{-- <div class="row pt-2">
                                <div class="col-7 d-flex align-items-center fw-bolder textColor">Requesting Advance Amount </div>
                                <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                                    <span class="p-2 fw-bolder text-dark" id="requesting_advance_amount_number">
                                        @if (isset($requesting_advance_amount))
                                            {{ $requesting_advance_amount }}
                                        @endif
                                    </span>
                                    <div class="input-group-text bgInput border-0 textColor" id="currency">$</div>

                                </div>
                            </div> --}}


                            {{-- <div class="row pt-2">
                <div class="col-7 d-flex align-items-center">Amount Paid</div>
                <div class="col input-group p-0">
                  <input type="number" class="form-control" name="invoice_amu_paid" value="" id="invoice_amu_paid" onchange="total()">
                  <div class="input-group-text" id="currency">USD</div>
                  <div id="invoice_amu_paid_error" class="invalid-feedback"></div>
                </div>
              </div> --}}
                            <div class="row pt-2">
                                <div class="col-7 d-flex align-items-center justify-content-end pe-5 fw-bolder textColor textColor">Balance Due
                                </div>
                                <div class="col d-flex justify-content-end input-group border-bottom rounded p-0">
                                    <div class="input-group-text bgInput border-0 textColor" id="currency">$</div>
                                    <span class="p-2 fw-bolder textColor" id="balanceDue">0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7">
                    </div>

                </div>
            </div>
            <style>
                @media screen and (max-width: 767px) {

                    .create_page .bnt_responsive {
                        font-size: 13px;
                        padding: 5px 11px !important;
                        margin: 5px 3px 0px 0px !important;
                    }
                }
            </style>
            @php
                if (isset($lastInvoice)) {
                    $last_invoice_id = $lastInvoice->id;
                } else {
                    $last_invoice_id = 0;
                }
            @endphp
            <style>
                .modal-header .priviewModel {
                    border-bottom: none !important
                }
            </style>
            <div class="container p-0 create_page mt-4 mb-0">
                {{-- id="completeInvoice" --}}
                <button style="background-color: #686868" type="submit" id="completeInvoice"
                    class="btn bnt_responsive send-invoice preview_image  px-4   inputBorderRedius"
                    @if (isset($invoiceData)) @else disabled @endif>
                    <i class="bi bi-clipboard-plus me-2"></i>
                    {{-- @if (isset($invoiceData)) @else  @endif> --}}
                    @if (isset($invoiceData))
                        {{ 'Save' }} @else{{ 'Save' }}
                    @endif
                </button>

                <a id="previw_id"
                    class="btn inputBorderRedius send-invoice preview_image bnt_responsive d-none bordered    py-2 px-4 my-2"
                    data-bs-toggle="modal" data-bs-target="#staticBackdrop_previw"><i class="bi bi-eye"></i> Preview</a>

                <button style="background-color: #686868" type="button" id="send_email_id"
                    class="btn send-invoice bnt_responsive  px-4  disabled inputBorderRedius " data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <i class="bi bi-envelope-fill me-2"></i>
                    Send Invoice
                </button>
                <a style="background-color: #686868" href="" id="downlodeInvoice" target="_blank"
                    class="btn bnt_responsive send-invoice  px-4 disabled inputBorderRedius"> <i
                        class="bi bi-cloud-arrow-down me-2"></i> Download
                    Invoice</a>
            </div>

        </div>
    </section>
    <!-- Invoice Section End -->

    <style>
        .custom-radio input {
            display: none;
        }

        .radio-btn {
            width: 100%;
            display: inline-block;
            border-radius: 2px;
            position: relative;
            text-align: center;
            cursor: pointer;
            height: 342px;
        }

        .radio-btn>i {
            color: #ffffff;
            background-color: #FFB317;
            font-size: 20px;
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%) scale(4);
            border-radius: 50%;
            padding: 0px 5px;
            transition: 0.2s;
            pointer-events: none;
            opacity: 0;
            z-index: 1;
        }

        .radio-btn .hobbies-icon {
            width: 100%;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .radio-btn .hobbies-icon i {
            color: #FFB317;
            line-height: 80px;
            font-size: 60px;
        }

        .radio-btn .hobbies-icon h3 {
            color: #FFB317;
            font-size: 16px;
            font-weight: 400;

        }

        .custom-radio input:checked+.radio-btn {
            border: 3px solid #FFB317;
        }

        .custom-radio input:checked+.radio-btn>i {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }

        .radio-btn img {
            width: 100%;
        }

        .pakages_name {

            background: #FFB317;
            padding: 1px 11px;
            border-radius: 2px;
            font-size: 13px;
            position: absolute;
            top: 0.4%;
            ;
            color: #000000;
            font-weight: 700;
            z-index: 1;
            text-decoration: none;
            right: 0%;
            text-align: center;
        }

        @media only screen and (max-width: 991px) {
            .tempResponsive {
                /* border: 1px solid red; */
            }

            .tempResponsive img {
                height: 295px
            }

            .radio-btn {
                width: 100%;
                display: inline-block;
                border-radius: 2px;
                position: relative;
                text-align: center;
                cursor: pointer;
                height: 300px;
            }
        }

        @media only screen and (min-width: 992px) {

            .tempResponsive img {
                height: 335px;
            }
        }

        @media only screen and (max-width: 575px) {
            .tempResponsive {
                /* border: 1px solid red; */
            }

            .tempResponsive img {
                height: 480px
            }

            .radio-btn {
                width: 100%;
                display: inline-block;
                border-radius: 2px;
                position: relative;
                text-align: center;
                cursor: pointer;
                height: 485px;
            }
        }
    </style>
    <style>
        /* .spinner {
                width: 80px;
                height: 80px;

                border: 2px solid #f3f3f3;
                border-top: 3px solid #f25a41;
                border-radius: 100%;

                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;

                animation: spin 1s infinite linear;
                }

                @keyframes spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
                } */
    </style>

    <section class="invoice_template">
        <div>
            <div class="container">
                <div class="text-center  my-5">
                    <h2 class="h2_title">Choose Your Invoice Template</h2>
                    <p class="fs-sm fw-bolder">Start creating your professional bill</p>
                </div>
                @if (!$template_id == '')
                    <div class="row text-center ">
                        @foreach ($invoice_template as $invoice_temp)
                            @php
                                $join_table_valu = DB::table('subscription_package_templates')
                                    ->join('subscription_packages', 'subscription_package_templates.subscriptionPackageId', '=', 'subscription_packages.id')
                                    ->where('subscription_package_templates.template', $invoice_temp->id)
                                    ->get();
                                $join_table_value = $join_table_valu->unique('subscription_packages.id');
                            @endphp
                            @foreach ($join_table_value as $join_table_values)
                                <label class="custom-radio col-sm-6 col-md-4 col-lg-3  ">
                                    <div class="card shadow border-0">
                                        <span class="pakages_name">
                                            {{ $join_table_values->packageName }}
                                        </span>
                                        <input type="radio" name="template_name" value="{{ $invoice_temp->id }}"
                                            @if ($template_id == $invoice_temp->id) checked @else @endif />
                                        <span class="radio-btn"> <i class="bi bi-check-lg"></i>
                                            <div class="hobbies-icon tempResponsive">
                                                <img src=" {{ asset('uploads/template/' . $invoice_temp->templateImage) }}"
                                                    alt="">
                                            </div>
                                        </span>
                                    </div>
                                </label>
                            @endforeach
                        @endforeach
                    </div>
                @else
                    <div class="row text-center mb-5 ">
                        @foreach ($invoice_template as $invoice_temp)
                            @php
                                $join_table_valu = DB::table('subscription_package_templates')
                                    ->join('subscription_packages', 'subscription_package_templates.subscriptionPackageId', '=', 'subscription_packages.id')
                                    ->where('subscription_package_templates.template', $invoice_temp->id)
                                    ->get();
                                $join_table_value = $join_table_valu->unique('subscription_packages.id');
                            @endphp
                            @foreach ($join_table_value as $join_table_values)
                                <label class="custom-radio  col-sm-6 col-md-4 col-lg-3 mb-3 ">
                                    <div class=" card shadow border-0">
                                        <span class="pakages_name">
                                            {{ $join_table_values->packageName }}
                                        </span>
                                        <input type="radio" name="template_name" value="{{ $invoice_temp->id }}"
                                            @if ($template_id_check->id == $invoice_temp->id) checked @else @endif />
                                        <span class="radio-btn"> <i class="bi bi-check-lg"></i>
                                            <div class="hobbies-icon tempResponsive">
                                                <img src=" {{ asset('uploads/template/' . $invoice_temp->templateImage) }}"
                                                    alt="">
                                            </div>
                                        </span>
                                    </div>
                                </label>
                            @endforeach
                        @endforeach
                    </div>
            </div>
        </div>
    </section>
    </form>
    <!-- Invoice Template End -->

    @if (isset($invoiceData->id))
    @endif
    <!-- Send invoice Modal start -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    {{--  --}}
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">


                        <div class="mb-3">
                            <input type="hidden" name="template_id" id="id">
                            <br>
                            <label for="emai_to" class="form-label">To</label>
                            <input type="email" class="form-control" id="emai_to" name="emai_to"
                                placeholder="example@gmail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="email_subject" name="email_subject"
                                id="Input2" value="A Invoice by Billto.io" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_body" class="form-label">Body</label>
                            <textarea class="form-control" id="email_body" name="email_body" rows="2">A invoice has been sent to you by BillTo.io. You can find it in the attachment below.</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger btn-sm " data-bs-dismiss="modal"> <i
                                    class="bi bi-x-circle"></i> Close</button>
                            <button id="send_mail_data" class="btn send-invoice btn-sm btn-outline-warning"><i
                                    class="bi bi-send"></i>
                                Send Mail</button>
                            {{-- <button class="btn send-invoice btn-sm btn-outline-warning"><i class="bi bi-send"></i>
                                        Send Mail</button> --}}
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .priviewModel {
            padding: 0.2rem 0.5rem !important;
            border-bottom: 1px solid #ededed !important;
        }

        .modal-header .stop_btn {
            padding: 0.5rem 0.5rem !important;
            margin: -0.5rem -0.5rem -0.5rem auto;
            font-size: 12px !important;
            border: 1px solid !important;
            margin-right: 0px !important;
        }

        .modal_footer {
            padding: 0px;
            margin-top: 9px;
        }
    </style>

    {{-- preview image alert  --}}
    {{-- <div class="modal fade" id="staticBackdrop_previw" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header priviewModel">
                    <h5 class="modal-title" id="staticBackdropLabel">Preview Invoice</h5>
                    <button type="button" id="stop_btn" class="btn-close stop_btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 0.5rem 1rem 0rem 1rem;">
                    <div class="row">
                        <div class="preview_invoice_show">
                            <div id="overlay">
                                <div class="spinner"></div>
                            </div>

                        </div>
                        <div class="modal-footer modal_footer">
                            <button type="button" class="btn btn-outline-danger btn-sm " data-bs-dismiss="modal"> <i
                                    class="bi bi-x-circle"></i> Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}




    <!-- Invoice Template End -->

    @if (isset($invoiceData->id))
    @endif
@endsection
@push('frontend_js')
    <script>
        $(document).on("click", "#send_email_id", function(e) {
            e.preventDefault();
            $('#staticBackdrop').addClass("show");
            $('.modal-backdrop').css("display", "block");
            $('#body_alert').addClass("modal-open");
            $('#body_alert').css("overflow", "hidden");
            $('#staticBackdrop').removeClass("d-none");
            $('.modal-backdrop').removeClass("d-none");

        });
    </script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // A $( document ).ready() block.
        $(document).ready(function() {
            allData();
        });
    </script>
@endpush
