{{-- template one  --}}
<style>
    * {
        padding: 0;
        margin: 0;
    }

    .first_section {
        width: 100%;
        display: flex;
        margin-bottom: 75px;
    }


    .logo_area img {
        width: 100px;
        padding-bottom: 5px;
    }

    .logo_area {
        width: 30%;
        float: left;
        background: #0370BF;
        padding-top: 50px;
        padding-bottom: 100px;
        text-align: center;
    }

    .logo_area p {
        color: #FFF;
    }

    .heading_area {
        text-align: right;
        /* text-align: right; */
        /* padding-top: 50px;
        padding-bottom: 100px;
        padding-right: 60px; */
        width: 60%;
        float: right;
    }

    .heading_area h1 {
        color: #0370BF;
        font-weight: 700;
        font-size: 59.9879px;
        line-height: 73px;
    }

    .heading_area .a {
        width: 50%;
        float: left;
        text-align: left;
        margin-left: 30%;
    }

    .heading_area .b {
        width: 50%;
        float: right;
    }

    .heading_area .i_title {
        margin-top: 20px;
        padding-right: 55px
    }

    .i_sub_title {
        display: flex;
        justify-content: space-between;
        padding-top: 5px;
    }

    .a {
        text-align: left;
    }

    .a p {
        font-weight: 700;
        font-size: 17px;
    }

    .b p {
        font-weight: 400;
        font-size: 15px;
        padding-top: 2px;
    }

    .table1 tbody tr {
        border-top: 1px solid #C4C4C4;
    }

    .second_section {
        background: #F2F2F2;
        padding-top: 20px;
        padding-bottom: 100px;
    }

    .third_section {
        width: 100%;
        display: flex;

    }

    .left_Side_bar {
        width: 30%;
        background-color: #0370BF;
        padding-top: 20px;
        padding-bottom: 20px;
        min-height: 300px;
        float: left;
    }

    .right_Side_bar {
        width: 70%;
        float: right;
        padding-top: 20px;
    }

    .c {
        padding: 5px;
        /* margin: 0px 50px; */
        /* border-bottom: 1px solid #FFFFFF; */
        color: #FFF;
        text-align: center;
        line-height: 24px;
        font-size: 18px;
        padding-bottom: 36px;
    }

    .c h5 {
        font-size: 18px;
        text-align: center;
        /* border-bottom: 2px solid white; */
        padding: 8px 0;

    }

    .d {
        padding: 5px;
        /* margin: 0px 50px; */
        /* border-bottom: 1px solid #FFFFFF; */
        color: #FFF;
        text-align: center;
        line-height: 24px;
        font-size: 18px;
        padding-bottom: 36px;
    }

    .d h5 {
        font-size: 18px;
        text-align: center;
        /* border-bottom: 2px solid white; */
        padding: 8px 0;
    }

    .e {
        margin-left: 10%;
    }

    .e h1 {
        font-size: 30px;
        padding: 40px 0px;
    }

    .empty_div {
        width: 25%;
        float: left;
    }

    .table_div {
        width: 75%;
        float: right;
        text-align: right;
        /* border-top: 2px solid #FCB21C; */
        padding-right: 57px;
    }

    .page {
        background: var(--white);
        display: block;
        margin: 0 auto;
        position: relative;
        box-shadow: var(--pageShadow);
    }

    .page[size="A4"] {
        width: 21cm;
        min-height: 29.7cm;
        overflow: hidden;
    }

    .flex {
        display: flex;
        justify-content: center;
        width: 100%
    }

    .terms_condition_div {
        width: 70%;
        float: left;

    }

    .signature_div {
        width: 30%;
        float: right;
        justify-content: center;
        margin-top: -30px
    }
</style>
<title>Billto.io</title>

<body>

    <div class="invoice_body page" size="A4">
        <section class="first_section">
            <div class="logo_area">
                @if ($userInvoiceLogo->invoice_logo != '')
                    <img style="object-fit: cover"
                        src="{{ public_path('storage/invoice/logo/' . $userInvoiceLogo->invoice_logo) }}" alt="img">
                @endif
                <p>{{ $invoiceData->invoice_form }}</p>
            </div>

            <div class="heading_area" style="color: #686868;">
                <div class="i_title">
                    <h1>INVOICE</h1>
                </div>
                <div style="margin-top:20px;" class="">
                    <table style="padding-left:158px">
                        <tr>
                            <th style="text-align:left; font-size:18px;">Incoice #</th>
                            <th style="text-align: right;font-size:18px; padding-left:95px;">
                                {{ $invoiceData->invoice_id }}</th>
                        </tr>
                        <tr>
                            <th style="text-align:left; font-size:18px;">invoice date</th>
                            <td style="text-align: right; font-size:18px;">{{ $invoiceData->invoice_date }}</td>
                        </tr>
                        <tr>
                            <th style=" text-align: left; font-size:18px;">p.o.#</th>
                            <td style="text-align: right; font-size:18px;">{{ $invoiceData->invoice_po_number }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left; font-size:18px;">due date</th>
                            <td style="text-align: right; font-size:18px;">{{ $invoiceData->invoice_dou_date }}
                    </table>
                </div>

            </div>
        </section>


        <section class="second_section" style="margin-top: 270px;">
            <div class="table">
                <div style="margin-left: 70px; margin-right:60px; ">
                    <table class="table1" style="width:100%;  border-collapse: collapse;" class="">
                        <thead>
                            <tr>
                                <th
                                    style=" text-align:left; width:15%; font-weight: 700; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;  padding-right: 0px;">
                                    qty</th>
                                <th
                                    style=" text-align:left; width:45%;font-weight: 700; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;  padding-right: 0px;">
                                    description</th>
                                <th
                                    style=" text-align:right; width:20%; font-weight: 700; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;  padding-right: 0px;">
                                    unit price</th>
                                <th
                                    style=" text-align:right; width:20%;font-weight: 700; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;  padding-right: 0px;">
                                    amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productsDatas as $product_detail)
                                <tr>
                                    <td
                                        style=" padding:9px 0px; text-align:left; width:15%; border-bottom: 1px solid #C4C4C4; font-weight: 400; font-size: 16px; color: #686868; ">
                                        {{ $product_detail->product_quantity }}</td>
                                    <td
                                        style=" text-align:left; width:45%;border-bottom: 1px solid #C4C4C4;font-weight: 400; font-size: 16px; color: #686868; ">
                                        {{ $product_detail->product_name }}</td>
                                    <td
                                        style="  width:20%;border-bottom: 1px solid #C4C4C4; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        {{ number_format($product_detail->product_rate, 2) }}</td>
                                    <td
                                        style="  width:20%; border-bottom: 1px solid #C4C4C4;font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        {{ number_format($product_detail->product_amount, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <style>
            .border {
                border-bottom: 2px solid #FFF;
                margin: 0px 30px;
                margin-bottom: 10px;

            }
        </style>
        <section class="third_section">
            <div class="left_Side_bar" style="padding-top: 30px;">
                <div class="c">
                    <h5>To</h5>
                    <div class="border"></div>
                    <p><b>{{ $invoiceData->invoice_to }}</b></p>
                </div>
            </div>
            <div class="right_Side_bar">
                <div style=" margin-right:50px">
                    <table style="width: 100%;">
                        <tr style="text-align: right; ">
                            <td ></td>
                            <td style="color: #686868; ">Subtotal</td>
                            <td style="color: #686868;padding-right:5">{{ number_format($subtotal = $invoiceData->subtotal_no_vat, 2) }}
                            </td>
                        </tr>
                        <tr style="text-align: right">
                            <td ></td>
                            <td style="color: #686868; ">Sales Tax  ({{ $tax = $invoiceData->invoice_tax_percent }}%)</td>
                            <td style="color: #686868;padding-right:5"> {{ number_format($tax_value = ($subtotal * $tax) / 100, 2) }}</td>
                        </tr>
                        <tr style="text-align: right">
                            <td ></td>
                            <td style="color: #686868; ">Discount Amount  ({{ $tax = $invoiceData->discount_percent }}%)</td>
                            <td style="color: #686868;padding-right:5">  {{ number_format($invoiceData->discount_amounts,2) }}</td>
                        </tr>
                        <tr style="text-align: right">
                            <td ></td>
                            <td style="color: #686868; ">Receive Advance Amount({{ $invoiceData->currency }})</td>
                            <td style="color: #686868;padding-right:5"> {{ number_format($invoiceData->receive_advance_amount,2) }}</td>
                        </tr>
                        <tr style="text-align: right">
                            <td ></td>
                            <td style="color: #686868; ">Requesting Advance Amount({{ $invoiceData->requesting_advance_amount_percent }}%)</td>
                            <td style="color: #686868;padding-right:5"> {{ number_format(($invoiceData->final_total * $invoiceData->requesting_advance_amount_percent) / 100, 2) }}</td>
                        </tr>
                        <tr style="text-align: right">
                            <td ></td>
                            <td style="font-size: 18px; color: #686868; padding-left:80px;">Total</td>
                            <td style="font-size: 18px; color: #686868; padding-right:5">
                                {{ $invoiceData->currency }}  {{ number_format($invoiceData->final_total- $invoiceData->receive_advance_amount, 2) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="flex" style="margin-left:10px">
                    <div style="margin-top:50px">
                        <h5
                            style=" color: #686868; font-weight: 400; font-size: 24px; padding-top:10px; padding-bottom:20px; border-top:2px solid #0370BF; width:90%">
                            Thank You for your business</h5>
                    </div>
                    <div class="terms_condition_div">
                        <div style="color: #686868;">
                            <p style="font-weight: 700;font-size: 14px;color: #0370BF; text-transform: uppercase;">terms
                                & conditions</p>
                            <p style="padding-bottom: 5px;padding-top:5px">{{ $userInvoiceLogo->terms }}</p>
                            <p style="padding-bottom: 5px">{{ $invoiceData->invoice_notes }}</p>
                        </div>
                    </div>
                    <div class="signature_div">
                        @if ($userInvoiceLogo->signature != '')
                            <img style="width: 100px; height:100px "
                                src="{{ public_path('uploads/signature/' . $userInvoiceLogo->signature) }}"
                                alt="img">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>

    </div>
