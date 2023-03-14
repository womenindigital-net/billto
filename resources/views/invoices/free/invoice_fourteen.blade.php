<style>
    @page {
        padding: 0;
        margin: 0;
    }

    .first_section {
        width: 100%;
        display: flex;
    }

    .first_section_form_section {
        width: 60%;
        float: left;
    }

    .textHeading {
        width: 250px;
        margin-left: 50px;
        padding-top: 10px;
        color: #FFFFFF;
    }

    .first_section_logo_aria {
        width: 39%;
        float: right;
    }

    .logo_image {
        text-align: right;
        padding-top: 10px;
        padding-right: 50px;
    }

    .invoice_heading_area {
        width: 100%;
    }

    .invoice_heading_area h1 {
        left: 65px;
        font-weight: bold;
        font-size: 45px;
        color: #FF0000;
        padding: 10px 50px;
        margin: 0px;
    }


    /* second_section_invoice */

    .second_section_invoice_to_date {
        width: 100%;
        display: flex;
    }

    .section_invoice_to {
        width: 54%;
        float: left;

    }

    .invoice_two_details {
        width: 250px;
        padding: 10px 50px;
    }

    .section_invoice_to_date {
        width: 45%;
        float: right;

    }
</style>
<title>Billto.io</title>
</head>

<body>
    <div class="invoice_body" style="">
        <section class="first_section" style="height: 120px; width:100%; background-color: #197B30;">
            <div class="first_section_form_section">
                <div class="textHeading">
                    <p><b>{{ $invoiceData->invoice_form }} </b></p>
                </div>
            </div>
            <div class="first_section_logo_aria" style="color: #686868;">
                <div class="logo_image">
                    @if ($invoiceData->invoice_logo != '')
                        <img style="width:100px; height:100px; object-fit: contain;"
                            src="{{ public_path('storage/invoice/logo/' . $userInvoiceLogo->invoice_logo) }}"
                            alt="img">
                    @endif
                </div>
            </div>
        </section>
        <div class="invoice_heading_area" style="height: 10px">
            <h1> {{ __('messages.INVOICE') }}</h1>
        </div>

        <div class="second_section_invoice_to_date">
            <div class="section_invoice_to">
                <div class="invoice_two_details">
                    <h5 style="font-size: 18px; color:#686868; text-weight:bold; padding:0px; margin:0px; ">
                        {{ __('messages.To_send') }}
                    </h5>
                    <p style="border-bottom:2px solid #FF0000; padding:2px 0px; margin:0px; width:70%;"></p>
                    <p style="color:#686868;text-weight:bold; padding:2px 0; margin:0px; ">
                        {{ $invoiceData->invoice_to }}</p>
                </div>
            </div>
            <div class="section_invoice_to_date">
                <table style="padding-right:50px;padding-left:20px;">
                    <tr>
                        <td
                            style="text-align:left; color:#686868; font-weight:bold; font-size:16px; padding-top:5px; padding-bottom:5px; ">
                            {{ __('messages.INVOICE_no') }}#
                        </td>
                        <td
                            style="text-align: right; font-size:16px; color:#686868; padding-top:5px; padding-bottom:5px;">
                            {{ $invoiceData->invoice_id }}
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="text-align:left; color:#686868; font-weight:bold; font-size:16px; padding-top:5px; padding-bottom:5px;">
                            {{ __('messages.Invoice_Date') }}</td>
                        <td
                            style="text-align: right; color:#686868; font-size:16px; padding-top:5px; padding-bottom:5px;">
                            {{ $invoiceData->invoice_date }}
                        </td>

                    </tr>
                    <tr>

                        <td
                            style=" text-align: left;  color:#686868;font-weight:bold; font-size:16px; padding-top:10px; padding-bottom:10px;">
                            {{ __('messages.P.O.') }}#</td>
                        <td style="text-align: right; color:#686868; font-size:16px;  width: 30%">
                            {{ $invoiceData->invoice_po_number }}</td>

                    </tr>
                    <tr>
                        <th style="text-align: left;  color:#686868; font-size:16px; width: 25%">
                            {{ __('messages.Due_Date') }}</th>
                        <td style="text-align: right; color:#686868; font-size:16px; width: 30%">
                            {{ $invoiceData->invoice_dou_date }}

                </table>
            </div>
        </div>
        <style>
            .third_section_product_details {
                width: 100%;
                display: flex;
            }

            .subtotal_section {
                width: 100%;
                display: flex;
            }
        </style>
        <section class="third_section_product_details">
            <div style="margin-left: 50px; margin-right:30px; padding-top:20px;">
                <table class="product_derails_table" style="width:100%; border:none;">
                    <thead>
                        <tr style="">
                            <th
                                style=" border-collapse: collapse; background: rgba(196, 196, 196, 0.3);  width:20%;  font-size: 17px; text-transform: uppercase; padding-left:5px; color: #686868; text-align:left; ">
                                {{ __('messages.qty') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none; background: rgba(196, 196, 196, 0.5); border-right:none; padding-left:10px; text-align:left; width:40%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;">
                                {{ __('messages.description') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none; background: rgba(196, 196, 196, 0.75);  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;">
                                {{ __('messages.unit_price') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none;background: #FF0000;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                {{ __('messages.amount') }} </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($productsDatas as $product_detail)
                            <tr>
                                <td
                                    style="border-collapse: collapse;  padding:6px 0px; padding-left:5px; text-align:left; width:20%;  font-weight: 400; font-size: 16px; color: #686868; background: rgba(196, 196, 196, 0.3);  ">
                                    {{ $product_detail->product_quantity }}</td>
                                <td
                                    style="border-collapse: collapse; padding-left:10px; text-align:left; width:40%;font-weight: 400; font-size: 16px; color: #686868;  background: rgba(196, 196, 196, 0.5);">
                                    {{ $product_detail->product_name }}</td>
                                <td
                                    style="border-collapse: collapse;padding-right:20px;  width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right;  background: rgba(196, 196, 196, 0.75); ">
                                    {{ number_format($product_detail->product_rate, 2) }}</td>
                                <td
                                    style="border-collapse: collapse;   padding-right:20px; width:20%; font-weight: 400; font-size: 16px; color: #fff; text-align:right; background: #FF0000;">
                                    {{ number_format($product_detail->product_amount, 2) }}</td>
                            </tr>
                            @php
                                $last_count = $count++;
                            @endphp
                        @endforeach
                        @for ($x = $last_count; $x <= 5; $x++)
                            <tr>
                                <td
                                    style=" border-collapse: collapse;   padding:6px 0px; padding-left:5px; text-align:left; width:20%;   font-size: 16px; color: #686868;background: rgba(196, 196, 196, 0.3);  ">
                                    &nbsp; </td>
                                <td
                                    style="border-collapse: collapse;  padding-left:10px; text-align:left; width:40%; font-size: 16px; color: #686868;  background: rgba(196, 196, 196, 0.5);">
                                </td>
                                <td
                                    style="border-collapse: collapse;  padding-right:20px;  width:20%;  font-size: 16px; color: #686868; text-align:right;  background: rgba(196, 196, 196, 0.75); ">
                                </td>
                                <td
                                    style="border-collapse: collapse;  padding-right:20px; width:20%;  font-size: 16px; color: #fff; text-align:right; background: #FF0000;">
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <style>
                .col_60 {
                    width: 31.2%;
                    float: left;
                    background: #C4C4C4;
                    margin-left: 51.3px;
                    padding-left: 312px;
                    font-size: 16px;
                    color: #686868;
                    padding-bottom: 8px;
                    padding-right: 8px;
                    text-align: right;
                }

                .col_40 {
                    width: 15.2%;
                    float: right;
                    background: #FF0000;
                    margin-right: 32px;
                    text-align: right;
                    padding-right: 20px;
                    color: #686868;
                    font-size: 16px;
                    padding-bottom: 8px;
                }

                .forth_section_thankyou {
                    width: 100%;
                    display: flex;
                }

                .third_section_left_side {
                    width: 25%;
                    float: left;
                    padding-left: 56px;
                    height: 170px;
                    color: #686868;

                }

                .third_section_right_side {
                    width: 65%;
                    float: right;
                    text-align: right;
                    height: 170px;
                    margin-top: 20px;
                }
            </style>
            <div class="subtotal_section ">
                <div style=" width:100%; display:flex;">
                    <div class="col_60">
                        <p style="padding: 4px 0; margin:0px;">{{ __('messages.Subtotal') }}</p>
                        <p style="padding: 4px 0; margin:0px;"> {{ __('messages.Sales_Tax') }}
                            ({{ $tax = $invoiceData->invoice_tax_percent }}%)</p>
                        <p style="padding: 4px 0; margin:0px;">{{ __('messages.Discount_Amount') }}
                            ({{ $tax = $invoiceData->discount_percent }}%)</p>
                        <p style="padding: 4px 0; margin:0px;">{{ __('messages.Receive_Advance_Amount') }}
                            ({{ $invoiceData->currency }})</p>
                        <p style="padding: 4px 0; margin:0px; ">
                            {{ __('messages.Requesting_Advance_Amount') }}({{ $invoiceData->requesting_advance_amount_percent }}%)
                        </p>
                        <h5 style="font-size:16px;  margin:0px; color:#FFFFFF">
                            {{ __('messages.Total') }} ({{ $invoiceData->currency }})</h5>
                    </div>
                    <div class="col_40">
                        <p style="padding: 4px 0; margin:0px; color:#fff;">
                            {{ number_format($subtotal = $invoiceData->subtotal_no_vat, 2) }}</p>
                        <p style="padding: 4px 0; margin:0px; color:#fff;">
                            {{ number_format($tax_value = ($subtotal * $tax) / 100, 2) }}</p>
                        <p style="padding:4px 0; margin:0px; color:#fff;">{{ number_format($invoiceData->discount_amounts, 2) }}
                        </p>
                        <p style="padding:4px 0; margin:0px; color:#fff;">
                            {{ number_format($invoiceData->receive_advance_amount, 2) }}</p>
                        <p style="padding: 4px 0; margin:0px; color:#fff;">
                            {{ number_format(($invoiceData->final_total * $invoiceData->requesting_advance_amount_percent) / 100, 2) }}
                        </p>
                        <h5 style="font-size:16px;   margin:0px; color:#FFFFFF ">
                            {{ number_format($invoiceData->final_total - $invoiceData->receive_advance_amount, 2) }}
                        </h5>
                    </div>
                </div>
            </div>
        </section>


        <section class="forth_section_thankyou">
            <div style="display:flex; width:100%;">
                <h5 style=" color: #686868; font-size: 30px;  margin-top:20px; margin-left:50px;">
                    {{ __('messages.Thank_You_for_your_business') }}</h5>
            </div>
            <div class="third_section_left_side">
                <p
                    style="font-size: 16px; font-weight:blod; text-transform: uppercase; padding:0px; margin:0px; color:#FF0000; margin-top:50px;">
                    {{ __('messages.Terms_&_conditions') }}</p>
                <p style="  padding:0px; margin:0px; line-height:20px;">{{ $userInvoiceLogo->terms }}
                </p>
                <p style="  padding:0px; margin:0px; ">{{ $invoiceData->invoice_notes }}</p>
            </div>

            <div class="third_section_right_side">
                @if ($userInvoiceLogo->signature != '')
                    <img style="object-fit:contain;"
                        style="width: 80px; height:80px;margin-top:50px; margin-right:30px; "
                        src="{{ public_path('uploads/signature/' . $userInvoiceLogo->signature) }}" alt="img">
                @endif
            </div>


        </section>
    </div>
</body>
