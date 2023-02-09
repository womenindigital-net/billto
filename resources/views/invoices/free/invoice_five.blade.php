{{-- four invoice  --}}

<style>
    @page {
        padding: 0;
        margin: 0;
    }

    /* my csss  */
    .first_section {
        width: 100%;
        display: flex;
        box-sizing: border-box;

    }

    .logo_five_invoice {
        width: 30%;
        float: left;
        box-sizing: border-box;
    }

    .five_invoice_text {
        width: 56%;
        float: right;
        text-align: right;
        box-sizing: border-box;
    }

    .invoice_text_title {
        width: 280px;
        height: 90px;
        background: #A950A0;
        text-align: center;
        color: white;
        font-weight: 700;
        font-size: 28px;
        float: right;
        margin-right: 50px;
    }

    /* second_section  */
    .second_section {
        width: 100%;
        display: flex;
        box-sizing: border-box;

    }

    .empty_div {
        width: 25%;
        float: left;

    }

    .invoice_form_to {
        width: 30%;
        float: left;

    }

    .invoice_date_details {
        width: 43%;
        float: right;

    }

    .third_section_product_details {
        width: 100%;
        display: flex;
    }

    .empty_div_product_details {
        width: 16%;
        float: left;
    }

    .product_details {
        margin-right: 30px;
    }

    .product_derails_table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* subtotal section  */

    .col_60 {
        width: 60%;
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
        width: 39%;
        float: right;
        text-align: right;
    }

    .col_40 p {
        text-align: right;
        padding: 5px 20px 0px 10px;
        margin: 0px;
        font-size: 15px;
        font-weight: 500;
        color: #686868;
    }

    .total_amount_title_total_amount_amount {
        width: 100%;
        background: #A950A0;
        display: flex;
    }

    .total_amount_title {
        width: 70%;
        float: left;
        text-align: right;
        color: #fff;
        position: fixed;
    }

    .total_amount_amount {
        width: 29%;
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
        width: 20%;
        float: left;
        padding-left: 56px;
        height: 170px;
        color: #fff;

    }

    .third_section_right_side {
        width: 70%;
        float: right;
        text-align: right;
        height: 170px;

        margin-top: 20px;
    }
</style>

<title>Billto.io</title>

<body>

    <div class="invoice_body " style="background: url('assets/vector-invoice/vactor5.png') no-repeat scroll;">
        <section class="first_section">
            <div class="logo_five_invoice" style="padding-left:50px;padding-top:10px;">
                @if ($invoiceData->invoice_logo != '')
                    <img style="width:100px; height:100px; object-fit: contain;"
                        src="{{ public_path('storage/invoice/logo/' . $userInvoiceLogo->invoice_logo) }}" alt="img">
                @endif
            </div>
            <div class="five_invoice_text" style="padding-left:50px;">
                <div class="invoice_text_title">
                    <h1 style="padding: 0px; margin:0px; ">{{ __('messages.INVOICE') }}</h1>
                </div>
            </div>
        </section>
        <section class="second_section">
            <div class="empty_div">
                &nbsp;
            </div>

            <div class="invoice_form_to">
                <p style="color:#686868;text-weight:bold;">{{ $invoiceData->invoice_form }} </p>
                <h5 style="font-size: 18px; color:#686868; text-weight:bold; padding:0px; margin:0px; ">
                    {{ __('messages.To_send') }}

                </h5>
                <p style="border-bottom:2px solid #A950A0; padding:0px; margin:0px; width:70%;"></p>
                <p style="color:#686868;text-weight:bold;">{{ $invoiceData->invoice_to }}</p>
            </div>
            <div class="invoice_date_details">
                <table style="margin-top: 10px; margin-right:40px;">
                    <tr>
                        <td
                            style="text-align:left; color:#686868; font-size:16px; padding-top:10px; padding-bottom:10px; ">
                            {{ __('messages.INVOICE_no') }}#
                        </td>
                        <td
                            style="text-align: right; font-size:16px; color:#686868; padding-top:10px; padding-bottom:10px;">
                            {{ $invoiceData->invoice_id }}
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="text-align:left; color:#686868; font-size:16px; padding-top:10px; padding-bottom:10px;">
                            {{ __('messages.Invoice_Date') }}</td>
                        <td
                            style="text-align: right; color:#686868; font-size:16px; padding-top:10px; padding-bottom:10px;">
                            {{ $invoiceData->invoice_date }}
                        </td>

                    </tr>
                    <tr>

                        <td
                            style=" text-align: left;  color:#686868; font-size:16px; padding-top:10px; padding-bottom:10px;">
                            {{ __('messages.P.O.') }}#</td>
                        <td style="text-align: right; color:#686868; font-size:16px;  width: 30%">
                            {{ $invoiceData->invoice_po_number }}</td>

                    </tr>
                    <tr>
                        <td style="text-align: left;  color:#686868; font-size:16px; width: 25%">
                            {{ __('messages.Due_Date') }}</td>
                        <td style="text-align: right; color:#686868; font-size:16px; width: 30%">
                            {{ $invoiceData->invoice_dou_date }}

                </table>
            </div>
        </section>
        <section class="third_section_product_details">
            <div class="empty_div_product_details">
                &nbsp;
            </div>
            <div class="product_details" style="  margin-top:30px;">
                <table class="product_derails_table" style="width:100%; border:none;">
                    <thead>
                        <tr style="">
                            <th
                                style=" border-collapse: collapse; background-color: #414141;  width:20%;  font-size: 17px; text-transform: uppercase; padding-left:5px; color: #fff; text-align:left; ">
                                {{ __('messages.qty') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none; background:#414141; border-right:none; padding-left:10px; text-align:left; width:40%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                {{ __('messages.description') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none; background:#414141;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                {{ __('messages.unit_price') }} </th>
                            <th
                                style="  border-collapse: collapse; border-top:none;background:#414141;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
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
                                    style="border-left:none;    border-collapse: collapse;   border-top:none; border-right:none; padding:6px 0px; padding-left:5px; text-align:left; width:20%;  font-weight: 400; font-size: 16px; color: #686868; ">
                                    {{ $product_detail->product_quantity }}</td>
                                <td class="border"
                                    style="   border-collapse: collapse; border-top:none; border-right:none; padding-left:10px; text-align:left; width:40%;font-weight: 400; font-size: 16px; color: #686868; ">
                                    {{ $product_detail->product_name }}</td>
                                <td class="border"
                                    style="   border-collapse: collapse; border-top:none; border-right:none; padding-right:20px;  width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                    {{ number_format($product_detail->product_rate, 2) }}</td>
                                <td class="border"
                                    style="   border-collapse: collapse;  border-top:none; border-right:none; padding-right:20px; width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                    {{ number_format($product_detail->product_amount, 2) }}</td>
                            </tr>
                            @php
                                $last_count = $count++;
                            @endphp
                        @endforeach
                        @for ($x = $last_count; $x <= 5; $x++)
                            <tr>
                                <td class="border"
                                    style="border-left:none;    border-collapse: collapse;   border-top:none; border-right:none; padding:6px 0px; padding-left:5px; text-align:left; width:20%;  font-weight: 400; font-size: 16px; color: #686868; ">
                                    &nbsp; </td>
                                <td class="border"
                                    style="    border-collapse: collapse; border-top:none; border-right:none; padding-left:10px; text-align:left; width:40%;font-weight: 400; font-size: 16px; color: #686868; ">
                                </td>
                                <td class="border"
                                    style=" border-collapse: collapse; border-top:none; border-right:none; padding-right:20px;  width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                </td>
                                <td class="border"
                                    style="   border-collapse: collapse;  border-top:none; border-right:none; padding-right:20px; width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                </td>
                            </tr>
                        @endfor
                    </tbody>

                </table>

                <div class="subtotal_section ">
                    <p style="border-bottom:1px solid #A950A0; padding:0; margin:0px;"> &nbsp;</p>
                    <div style=" width:100%; display:flex; margin-left: 250px;">
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
                    <h5 style="font-size:16px;   padding:5px 20px 5px 0px; margin:0px; background:#A950A0; ">
                        {{ __('messages.Total') }}</h5>
                </div>
                <div class="total_amount_amount">
                    <h5 style="font-size:16px;  padding:5px 39px 5px 0px; margin:0px; background:#A950A0; ">
                        {{ $invoiceData->currency }}
                        {{ number_format($invoiceData->final_total - $invoiceData->receive_advance_amount, 2) }}
                    </h5>
                </div>
            </div>

        </section>
        <section class="forth_section_thankyou">
            <div>
                <h5 style=" color: #686868; font-weight: 400; font-size: 30px; width: 100%;text-align:center; ">
                    {{ __('messages.Thank_You_for_your_business') }}</h5>
            </div>
            <div class="third_section_left_side">
                <p style="font-size: 14px; text-transform: uppercase; padding:0px; margin:0px;">
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
