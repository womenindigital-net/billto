{{-- three invoice --}}
<style>
    @page {
        padding: 0;
        margin: 0;
    }

    /* main body */
    .invoice_body {
        width: 100%;
        display: flex;
    }

    .invoiceNumberLaft {
        float: left;
        width: 13%;
    }

    .fullInvoice {
        float: right;
        width: 85%;

    }

    /* start frist sec  */
    .first_section {
        width: 100%;
        display: flex;
    }

    .leftSideArea {
        float: left;
        width: 48%;
        /* border:1px solid red; */
    }

    .rightSideArea {
        float: right;
        width: 35%;
        /* border:1px solid red; */
    }

    .third_section {
        width: 100%;
        display: flex;

    }

    .left_Side_bar {
        width: 30%;
        background-color: #0370BF;
        float: left;
    }



    .c {
        /* color: #FFF; */
        font-size: 16px;
        padding-top: 5px;
    }


    .d {
        padding: 5px;
        color: #FFF;
        line-height: 24px;
        font-size: 16px;
    }


    .margin_left_terms {
        /* margin-left: 10%; */
    }

    .empty_div {
        width: 25%;
        float: left;
    }

    .table_div {
        width: 75%;
        float: right;
        text-align: right;
        padding-right: 20px;
    }

    .page {
        background: var(--white);
        display: block;
        margin: 0 auto;
        position: relative;
        box-shadow: var(--pageShadow);
    }


    .termsFelx {
        display: flex;
        width: 100%;
    }

    .termsAndConditionDiv {
        float: left;
        width: 65%;
    }

    .signature_div {
        float: right;
        width: 35%;
        text-align: center;
        padding-top: 10px;
    }
    .hello {
        color: #CC3D3B !important;
    }
</style>
<title>Billto.io</title>


</head>

<body>


    <div class="invoice_body page">
        <div class="invoiceNumberLaft" >
            <table>
                <tr text-rotate="90">
                    <td style="padding-left:55px; color:#CC3D3B; padding-top:50%; font-size:21px"><h1>Invoice: {{ $invoiceData->invoice_id }}</h1></td>
                </tr>
            </table>
        </div>
        <div class="fullInvoice">
            <section style="padding-top:50px;">
                <div class="first_section" style="border-bottom: 1px solid #CC3D3B; width:89%">
                    <div class="leftSideArea">
                        <div style="">
                            <h4 style="font-size:21px;color:#CC3D3B; margin:0px;">Women in digital</h4>
                            <p style="font-size:11px; margin:4px;">House 50-51(1st Floor) , Janata Co-operative Housing
                                Society, Ring Road, Mohammadpur, Dhaka,
                                Bangladesh 01635 497868 | info@womenindigital.net | womenindigital.net</p>
                        </div>
                        <div style=" margin-top:22px ">
                            <h4 style="font-size:13px;color:#CC3D3B; margin:0px;">Billing Address:</h4>
                            <p style="font-size:13px; margin:4px;">Women in Digital </p>
                            <p style="font-size:13px; margin:4px;">{{ $invoiceData->invoice_form }} </p>
                            <p style="font-size:13px; margin-top:8px; margin-left:4px; ">or <br>
                                ACHIA KHALEDA NILA<br>
                                Standard Chattered Bank <br>
                                Account Number: 18 9317619 01 <br>
                                SWIFT Code SCBLBDDx <br>
                                Banani Branch, Dhaka <br>
                                or <br>
                                Zoom money transfer <br>
                                <span style="color:#CC3D3B"> wid.nila@gmail.com</span> <br>
                            </p>
                        </div>
                    </div>
                    <div class="rightSideArea" style="margin-bottom: 15px">
                        <div style="text-align:right;    ">
                            @if ($userInvoiceLogo->invoice_logo != '')
                                <img style="object-fit: fill; "
                                    src="{{ public_path('storage/invoice/logo/' . $userInvoiceLogo->invoice_logo) }}"
                                    alt="img"
                                    style="width: 60%; height:20%; padding-top:5px;padding-bottom: 30%; ">
                            @endif
                        </div>
                        <div class="" style="color: #686868;margin-left:6px; padding-top:100%;">
                            <table style="padding-left:20%;  ">
                                <tr>
                                    <td style="text-align:left; font-size:13px; color: #CC3D3B;font-weight: bold">
                                        {{ __('messages.Invoice_Date') }}</td>
                                    <td style="text-align: right; font-size:13px ; padding-left:6% ">
                                        {{ $invoiceData->invoice_date }}</td>
                                </tr>
                                <tr>
                                    <td style=" text-align: left; font-size:13px; color: #CC3D3B;font-weight: bold">
                                        {{ __('messages.P.O.') }}#</td>
                                    <td style="text-align: right; font-size:13px; ">
                                        {{ $invoiceData->invoice_po_number }}</td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size:13px;color: #CC3D3B; font-weight: bold">
                                        {{ __('messages.Due_Date') }}</td>
                                    <td style="text-align: right; font-size:13px;">
                                        {{ $invoiceData->invoice_dou_date }}
                            </table>
                        </div>
                    </div>
                </div>
                <div style=" margin-top:8px ">
                    <h4 style="font-size:13px;color:#CC3D3B; margin:0px;">Bill To</h4>
                    <p style="font-size:13px; margin:4px;">Women in Digital </p>
                    <p style="font-size:13px; margin:4px;">{{ $invoiceData->invoice_to }} </p>
                </div>
            </section>

            <section class="second_section" style="margin-top:10px;">
                <div class="table">
                    <div style=" margin-right:10%;  padding-bottom:15px;">
                        <div style="height:200px;">
                            <table class="table1 " style="width:100%;">
                                <thead>
                                    <tr style="padding-left:200px !important;">
                                        <th
                                            style="  border-collapse: collapse; border-top:none; background:#CC3D3B; border-right:none; padding-left:10px; text-align:left; width:40%; font-size: 13px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                            {{ __('messages.description') }} </th>
                                        <th
                                            style="  border-collapse: collapse; border-top:none;background:#CC3D3B;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 13px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                            {{ __('messages.amount') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($productsDatas as $product_detail)
                                        <tr>
                                            <td class="border"
                                                style="background:#F2F2F2;    border-collapse: collapse; border-top:none; border-right:none; padding-left:10px; padding-top:8px; padding-bottom:8px; text-align:left; width:40%;font-weight: 400; font-size: 13px; color: #686868; ">
                                                {{ $product_detail->product_name }}</td>
                                            <td class="border"
                                                style="background:#F2F2F2;    border-collapse: collapse;  border-top:none; border-right:none; padding-right:20px; width:20%; font-weight: 400; font-size: 13px; color: #686868; text-align:right; ">
                                                {{ number_format($product_detail->product_amount, 2) }}</td>
                                        </tr>
                                        @php
                                            $last_count = $count++;
                                        @endphp
                                    @endforeach
                                    @for ($x = $last_count; $x <= 5; $x++)
                                        <tr>
                                            <td class="border"
                                                style="border-left:none;    border-collapse: collapse; background:#F2F2F2;  border-top:none; border-right:none; padding:6px 0px; padding-left:5px; text-align:left; width:20%;  font-weight: 400; font-size: 13px; color: #686868; ">
                                                &nbsp;</td>
                                            <td class="border"
                                                style="background:#F2F2F2;    border-collapse: collapse; border-top:none; border-right:none; padding-left:10px; text-align:left; width:40%;font-weight: 400; font-size: 13px; color: #686868; ">
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>

                            </table>
                        </div>
                        <div style="  width:100%; display:flex; margin-left:30%;">

                            <style>
                                .col_60 {
                                    width: 64.95%;
                                    float: left;
                                    text-align: right;

                                }

                                .col_60 p {
                                    text-align: right;
                                    padding: 5px 10px 0px 10px;
                                    margin: 0px;
                                    font-size: 13px;
                                    font-weight: 500;
                                }

                                .col_40 {
                                    width: 35%;
                                    float: right;
                                    /* background: #F2F2F2; */
                                    text-align: right;
                                }

                                .col_40 p {
                                    text-align: right;
                                    padding: 5px 20px 0px 10px;
                                    margin: 0px;
                                    font-size: 13px;
                                    font-weight: 500;
                                    /* color: #686868; */
                                }
                            </style>
                            <div class="col_60">
                                <p>{{ __('messages.Subtotal') }}</p>
                                <p> {{ __('messages.Sales_Tax') }} ({{ $tax = $invoiceData->invoice_tax_percent }}%)
                                </p>
                                <p>{{ __('messages.Discount_Amount') }} ({{ $tax = $invoiceData->discount_percent }}%)
                                </p>
                                <p>{{ __('messages.Receive_Advance_Amount') }} ({{ $invoiceData->currency }})</p>
                                <p>{{ __('messages.Requesting_Advance_Amount') }}({{ $invoiceData->requesting_advance_amount_percent }}%)
                                </p>
                                <h5
                                    style="font-size:16px;  padding:5px 10px 0px 10px; margin:0px; border-top:1px solid red;">
                                    {{ __('messages.Total') }}</h5>

                            </div>
                            <div class="col_40">
                                <p>{{ number_format($subtotal = $invoiceData->subtotal_no_vat, 2) }}</p>
                                <p> {{ number_format($tax_value = ($subtotal * $tax) / 100, 2) }}</p>
                                <p>{{ number_format($invoiceData->discount_amounts, 2) }}</p>
                                <p>{{ number_format($invoiceData->receive_advance_amount, 2) }}</p>
                                <p>{{ number_format(($invoiceData->final_total * $invoiceData->requesting_advance_amount_percent) / 100, 2) }}
                                </p>
                                <h5
                                    style="font-size:16px;  padding:5px 20px 0px 10px; margin:0px; border-top:1px solid red;">
                                    {{ $invoiceData->currency }}
                                    {{ number_format($invoiceData->final_total - $invoiceData->receive_advance_amount, 2) }}
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="third_section">

                <div class="right_Side_bar " style="width:89%">

                    <div class="margin_left_terms">
                        <div class="thanks" style="">
                            <h5 style=" margin:0; padding-bottom:10px;font-weight: 400; font-size: 16px;  width: 80%">
                                {{ __('messages.Thank_You_for_your_business') }}</h5>
                        </div>
                        <div class="termsFelx">
                            <div class="termsAndConditionDiv" style="color: #686868;">
                                <p
                                    style=" border-bottom:1px solid #C4C4C4;padding-bottom:12px; font-weight: bold;font-size: 11px;color: #CC3D3B; text-transform: uppercase;">
                                    {{ __('messages.Terms_&_conditions') }}</p>
                                <p style="">{{ $userInvoiceLogo->terms }}</p>
                                <p>{{ $invoiceData->invoice_notes }}</p>
                            </div>
                            <div class="signature_div">
                                @if ($userInvoiceLogo->signature != '')
                                    <img style="object-fit:contain;" style="width: 80px; height:80px;"
                                        src="{{ public_path('uploads/signature/' . $userInvoiceLogo->signature) }}"
                                        alt="img">
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </div>

    </div>

    </div>
