{{-- four invoice  --}}

<style>
    @page {
        padding: 0;
        margin: 0;
        margin-bottom: 0;
    }

    /* my csss  */
    .first_section {
        width: 100%;
        display: flex;
    }

    .first_section_right {
        width: 40%;
        float: right;
        text-align: right;
        color: #fff;
        font: 40px;
        padding: 10px 100px 0px 0px;

    }

    .first_section_left {
        width: 40%;
        float: left;

    }

    .invoice_form_to {
        padding: 20px 0px 0px 50px;

    }

    /* second_section  */
    .second_section {
        width: 100%;
        display: flex;
        box-sizing: border-box;

    }

    .empty_div {
        width: 30%;
        float: left;
        padding: 0px 0px 0px 50px;
    }

    .invoice_date_details {
        width: 31.5%;
        float: right;

        padding-right: 35px;

    }

    .third_section_product_details {
        width: 100%;
        display: flex;
        margin-top: 30px;
    }

    .empty_div_product_details {
        width: 6%;
        float: left;
    }

    .product_details {
        margin-right: 30px;
    }



    /* subtotal section  */

    .col_60 {
        width: 64%;
        float: left;
        color: #686868;
        text-align: right;
    }

    .col_60 p {
        text-align: right;
        padding: 5px 10px 0px 10px;
        margin: 0px;
        font-size: 15px;
        font-weight: 500;

    }

    .col_40 {
        width: 35%;
        float: right;
        text-align: right;
    }

    .col_40 p {
        text-align: right;
        padding: 5px 20px 0px 10px;
        margin: 0px;
        font-size: 15px;
        font-weight: 500;
        color: #FFFFFF;
    }

    .total_amount_title_total_amount_amount {
        width: 100%;
        display: flex;
    }

    .total_amount_title {
        width: 63%;
        float: left;
        text-align: right;
        color: #686868;
        position: fixed;

    }

    .total_amount_amount {
        width: 36%;
        text-align: right;
        float: left;
        color: #fff;
        position: fixed;

    }

    .forth_section_thankyou {
        width: 100%;
        display: flex;
    }

    .third_section_left_side {
        width: 29%;
        float: left;
        padding-left: 56px;
        height: 170px;
        color: #686868;
        padding-top:70px;


    }

    .third_section_right_side {
        width: 48%;
        float: right;
        text-align: right;
        height: 170px;

        margin-top: 20px;
        padding-right: 50px;
    }
</style>

<title>Billto.io</title>

<body>

    <div class="invoice_body " style="background: url('assets/vector-invoice/vactor7.png') no-repeat scroll;">
        <section class="first_section" style="">
            <div class="first_section_left">
                <div class="invoice_form_to">
                    <p style="color:#686868;text-weight:bold;">{{ $invoiceData->invoice_form }} </p>

                </div>
            </div>
            <div class="first_section_right">
                <div class="logo_five_invoice" style="padding-top:10px;">
                    @if ($invoiceData->invoice_logo != '')
                        <img style="width:80px; height:80px; object-fit: contain;"
                            src="{{ public_path('storage/invoice/logo/' . $userInvoiceLogo->invoice_logo) }}"
                            alt="img">
                    @endif
                </div>
                <div class="five_invoice_text">
                    <div class="invoice_text_title">
                        <h1 style="padding:1px -40px; margin:0px; font-weight: bold; font-size:45px;">
                            {{ __('messages.INVOICE') }}</h1>
                    </div>
                </div>
            </div>

        </section>
        <section class="second_section">
            <div class="empty_div">
                <h5 style="font-size: 18px; color:#686868; text-weight:bold; padding:0px; margin:0px; ">
                    {{ __('messages.To_send') }}

                </h5>
                <p style="border-bottom:2px solid #A950A0; padding:0px; margin:0px; width:70%;"></p>
                <p style="color:#686868;text-weight:bold;">{{ $invoiceData->invoice_to }}</p>
            </div>
            <div class="invoice_date_details">
                <table style="width:100%; margin-right:10px;">
                    <tr>
                        <td
                            style="text-align:left; color:#FFFFFF; font-size:16px; padding-top:7px; padding-bottom:7px; width:50%; ">
                            {{ __('messages.INVOICE_no') }}#
                        </td>
                        <td
                            style="text-align: right; font-size:16px; color:#FFFFFF; padding-top:7px; padding-bottom:7px; width:50%;">
                            {{ $invoiceData->invoice_id }}
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="text-align:left; color:#FFFFFF; font-size:16px; padding-top:7px; padding-bottom:7px;">
                            {{ __('messages.Invoice_Date') }}</td>
                        <td
                            style="text-align: right; color:#FFFFFF; font-size:16px; padding-top:7px; padding-bottom:7px;">
                            {{ $invoiceData->invoice_date }}
                        </td>

                    </tr>
                    <tr>

                        <td
                            style=" text-align: left;  color:#FFFFFF; font-size:16px; padding-top:7px; padding-bottom:7px;">
                            {{ __('messages.P.O.') }}#</td>
                        <td style="text-align: right; color:#FFFFFF; font-size:16px;  width: 30%">
                            {{ $invoiceData->invoice_po_number }}</td>

                    </tr>
                    <tr>
                        <td style="text-align: left;  color:#FFFFFF; font-size:16px; width: 25%">
                            {{ __('messages.Due_Date') }}</td>
                        <td style="text-align: right; color:#FFFFFF; font-size:16px; width: 30%">
                            {{ $invoiceData->invoice_dou_date }}

                </table>
            </div>
        </section>
        <section class="third_section_product_details">
            <div class="empty_div_product_details">
                &nbsp;
            </div>
            <div class="product_details" style="">
                <table class="product_derails_table" style="width:100%; border:none;">
                    <thead>
                        <tr style="">
                            <th
                                style=" border-collapse: collapse; background-color: #414141;  width:20%;  font-size: 17px; text-transform: uppercase; padding-left:5px; color: #fff; text-align:left; ">
                                {{ __('messages.qty') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none; background:#414141; border-right:none; padding-left:10px; text-align:left; width:48.9%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                {{ __('messages.description') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none; background:#fff;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;">
                                {{ __('messages.unit_price') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none;background:#fff;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;">
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
                                    style=" background:#F2F2F2; border-collapse: collapse;  padding:6px 0px; padding-left:5px; text-align:left; width:20%;  font-weight: 400; font-size: 16px; color: #686868; ">
                                    {{ $product_detail->product_quantity }}</td>
                                <td class="border"
                                    style="  background:#F2F2F2; border-collapse: collapse; border-top:none; border-right:none; padding-left:10px; text-align:left; width:40%;font-weight: 400; font-size: 16px; color: #686868; ">
                                    {{ $product_detail->product_name }}</td>
                                <td class="border"
                                    style="   border-collapse: collapse; border-top:none; border-right:none; padding-right:20px;  width:20%; font-weight: 400; font-size: 16px; color: #fff; text-align:right; ">
                                    {{ number_format($product_detail->product_rate, 2) }}</td>
                                <td class="border"
                                    style="   border-collapse: collapse;  border-top:none; border-right:none; padding-right:20px; width:20%; font-weight: 400; font-size: 16px; color: #fff; text-align:right; ">
                                    {{ number_format($product_detail->product_amount, 2) }}</td>
                            </tr>
                            @php
                                $last_count = $count++;
                            @endphp
                        @endforeach
                        @for ($x = $last_count; $x <= 5; $x++)
                            <tr>
                                <td class="border"
                                    style="border-left:none;background:#F2F2F2;    border-collapse: collapse;   border-top:none; border-right:none; padding:6px 0px; padding-left:5px; text-align:left; width:20%;  font-weight: 400; font-size: 16px; color: #fff; ">
                                    &nbsp; </td>
                                <td class="border"
                                    style="    border-collapse: collapse; background:#F2F2F2; border-top:none; border-right:none; padding-left:10px; text-align:left; width:40%;font-weight: 400; font-size: 16px; color: #fff; ">
                                </td>
                                <td class="border"
                                    style=" border-collapse: collapse; border-top:none; border-right:none; padding-right:20px;  width:20%; font-weight: 400; font-size: 16px; color: #fff; text-align:right; ">
                                </td>
                                <td class="border"
                                    style="   border-collapse: collapse;  border-top:none; border-right:none; padding-right:20px; width:20%; font-weight: 400; font-size: 16px; color: #fff; text-align:right; ">
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
                <div class="subtotal_section ">
                    <div style=" width:100%; display:flex;   border-top: 1px solid white;">
                        <div class="col_60">
                            <p>{{ __('messages.Subtotal') }}</p>
                            <p> {{ __('messages.Sales_Tax') }} ({{ $tax = $invoiceData->invoice_tax_percent }}%)</p>
                            <p>{{ __('messages.Discount_Amount') }} ({{ $tax = $invoiceData->discount_percent }}%)</p>
                            <p>{{ __('messages.Receive_Advance_Amount') }} ({{ $invoiceData->currency }})</p>
                            <p>{{ __('messages.Requesting_Advance_Amount') }}({{ $invoiceData->requesting_advance_amount_percent }}%)
                            </p>
                        </div>
                        <div class="col_40">
                            <p>{{ number_format($subtotal = $invoiceData->subtotal_no_vat, 2) }}</p>
                            <p> {{ number_format($tax_value = ($subtotal * $tax) / 100, 2) }}</p>
                            <p>{{ number_format($invoiceData->discount_amounts, 2) }}</p>
                            <p>{{ number_format($invoiceData->receive_advance_amount, 2) }}</p>
                            <p>{{ number_format(($invoiceData->final_total * $invoiceData->requesting_advance_amount_percent) / 100, 2) }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="total_amount_title_total_amount_amount">
                <div class="total_amount_title">
                    <h5 style="font-size:16px;   padding:5px 20px 5px 0px; margin:0px; ">
                        {{ __('messages.Total') }}</h5>
                </div>
                <div class="total_amount_amount">
                    <h5 style="font-size:16px;  padding:5px 19px 5px 0px; margin:0px; margin-right:20px; border-top: 1px solid white;">
                        {{ $invoiceData->currency }}
                        {{ number_format($invoiceData->final_total - $invoiceData->receive_advance_amount, 2) }}
                    </h5>
                </div>
            </div>
        </section>
        <section class="forth_section_thankyou">
            <div>
                <h5 style=" color: #686868; font-weight: 400; font-size: 30px; width: 100%; margin-top:70px; margin-left:50px;">
                    {{ __('messages.Thank_You_for_your_business') }} </h5>
            </div>
            <div class="third_section_left_side">
                <p style="font-size: 14px; text-transform: uppercase; padding:0px; margin:0px; color:#A950A0;">
                    {{ __('messages.Terms_&_conditions') }}</p>
                <p style="  padding:0px; margin:0px; line-height:20px;">{{ $userInvoiceLogo->terms }}
                </p>
                <p style="  padding:0px; margin:0px; ">{{ $invoiceData->invoice_notes }} </p>
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
