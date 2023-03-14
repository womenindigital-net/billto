{{-- four invoice  --}}

<style>
    @page {
        padding: 0;
        margin: 0;
    }

    .second_section {
        /* padding-top: 20px;
            padding-bottom: 80px; */

    }


    .left_Side_bar {
        width: 30%;
        background-color: #0370BF;
        /* padding-top: 20px;
                    padding-bottom: 20px; */
        float: left;
    }


    .d {
        padding: 5px;
        color: #FFF;
        line-height: 24px;
        font-size: 16px;
        /* padding-bottom: 40px; */
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



    .first_section {
        width: 100%;
        display: flex;
        justify-content: space-between;
        box-sizing: border-box;
        padding-top: 10px;
    }


    .logo_area {
        width: 30%;
        float: left;
        text-align: start;
        color: #F2F2F2;
        font-size: 16px;
        font-weight: 600;
        overflow: hidden;
    }

    .heading_area {
        width: 63.2%;
        float: right;
    }

    .heading_area h1 {
        color: #FCB21C;
        font-weight: 700;
        font-size: 59.9879px;
        text-align: right;
    }

    .i_title {
        text-align: right;
        padding-right: 60px;
    }

    .heading_area .a {
        float: left;
        text-align: left;
    }
</style>

<title>Billto.io</title>

<body>

    <div class="invoice_body " style="background: url('assets/vector-invoice/vector3.png') no-repeat scroll;">
        <section class="first_section">
            <div class="logo_area" style="margin-left:50px;">
                <p>{{ $invoiceData->invoice_form }} </p>
                <h5 style="font-size: 18px; text-weight:bold; padding:0px; margin:0px;">{{__('messages.To_send')}}</h5>
                <p>{{ $invoiceData->invoice_to }}</p>
            </div>
            <div class="heading_area" style="color: #686868;">
                <div class="i_title">
                    @if ($invoiceData->invoice_logo != '')
                        <img class="logo_image" style="width:100px; height:100px; object-fit: contain;"
                            src="{{ public_path('storage/invoice/logo/' . $userInvoiceLogo->invoice_logo) }}"
                            alt="img">
                    @endif
                    <h1 style="padding: 0px; margin:0px; ">{{ __('messages.INVOICE') }}</h1>
                </div>

                <table style="width:100%;  margin-right:10px; ">
                    <tr>
                        <td style=""></td>
                        <td style="text-align:left; color:#686868; font-size:16px; ">{{ __('messages.INVOICE_no') }}#
                        </td>
                        <td style="text-align: right; font-size:16px; color:#686868; "> {{ $invoiceData->invoice_id }}
                        </td>
                    </tr>

                    <tr>
                        <th style="width: 35%"></th>
                        <td style="text-align:left; color:#686868; font-size:16px; width: 25%">
                            {{ __('messages.Invoice_Date') }}</td>
                        <td style="text-align: right; color:#686868; font-size:16px; width: 30%">
                            {{ $invoiceData->invoice_date }}
                        </td>
                        <th style="width: 10%"></th>
                    </tr>
                    <tr>
                        <td style="width: 35%"></td>
                        <td style=" text-align: left;  color:#686868; font-size:16px; width: 25%">
                            {{ __('messages.P.O.') }}#</td>
                        <td style="text-align: right; color:#686868; font-size:16px;  width: 30%">
                            {{ $invoiceData->invoice_po_number }}</td>
                        <td style="width: 10%"></td>
                    </tr>
                    <tr>
                        <td style="width: 35%"></td>
                        <td style="text-align: left;  color:#686868; font-size:16px; width: 25%">
                            {{ __('messages.Due_Date') }}</td>
                        <td style="text-align: right; color:#686868; font-size:16px; width: 30%">
                            {{ $invoiceData->invoice_dou_date }}
                        <td style="width: 10%"></td>
                </table>
            </div>
        </section>

        <style>
            .border {
                border-left: 1px solid #FFF;
                border-right: 1px solid #FFF;
                border-bottom: 1px solid rgb(255, 255, 255);
                border-top: 1px solid #FFF;
            }
        </style>
        <section class="second_section">
            <div class="table">
                <div style=" margin-left: 50px; margin-right:40px;  margin-top:30px;">
                    <div style="">
                        <table class="table1 " style="width:100%;">
                            <thead>
                                <tr style="padding-left:200px !important;">
                                    <th
                                        style=" border-collapse: collapse; background-color: #414141;  width:20%;  font-size: 17px; text-transform: uppercase; padding-left:5px; color: #fff; text-align:left; ">
                                        {{ __('messages.qty') }} </th>
                                    <th
                                        style="  border-collapse: collapse; border-top:none; background:#414141; border-right:none; padding-left:10px; text-align:left; width:40%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                        {{ __('messages.description') }} </th>
                                    <th
                                        style="  border-collapse: collapse; border-top:none; background:#414141;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                        {{ __('messages.unit_price') }}  </th>
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
                                            style="border-left:none;    border-collapse: collapse; background:#F2F2F2;  border-top:none; border-right:none; padding:6px 0px; padding-left:5px; text-align:left; width:20%;  font-weight: 400; font-size: 16px; color: #686868; ">
                                            {{ $product_detail->product_quantity }}</td>
                                        <td class="border"
                                            style="background:#F2F2F2;    border-collapse: collapse; border-top:none; border-right:none; padding-left:10px; text-align:left; width:40%;font-weight: 400; font-size: 16px; color: #686868; ">
                                            {{ $product_detail->product_name }}</td>
                                        <td class="border"
                                            style="background:#F2F2F2;   border-collapse: collapse; border-top:none; border-right:none; padding-right:20px;  width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                            {{ number_format($product_detail->product_rate, 2) }}</td>
                                        <td class="border"
                                            style="background:#F2F2F2;    border-collapse: collapse;  border-top:none; border-right:none; padding-right:20px; width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                            {{ number_format($product_detail->product_amount, 2) }}</td>
                                    </tr>
                                    @php
                                        $last_count = $count++;
                                    @endphp
                                @endforeach
                                @for ($x = $last_count; $x <= 5; $x++)
                                    <tr>
                                        <td class="border"
                                            style="border-left:none;    border-collapse: collapse; background:#F2F2F2;  border-top:none; border-right:none; padding:6px 0px; padding-left:5px; text-align:left; width:20%;  font-weight: 400; font-size: 16px; color: #686868; ">
                                            &nbsp; </td>
                                        <td class="border"
                                            style="background:#F2F2F2;    border-collapse: collapse; border-top:none; border-right:none; padding-left:10px; text-align:left; width:40%;font-weight: 400; font-size: 16px; color: #686868; ">
                                        </td>
                                        <td class="border"
                                            style="background:#F2F2F2;   border-collapse: collapse; border-top:none; border-right:none; padding-right:20px;  width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        </td>
                                        <td class="border"
                                            style="background:#F2F2F2;    border-collapse: collapse;  border-top:none; border-right:none; padding-right:20px; width:20%; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>

                        </table>
                    </div>
                    <div style=" width:100%; display:flex; margin-left: 250px;">

                        <style>
                            .col_60 {
                                width: 60%;
                                float: left;
                                background: #039DBF;
                                color: #FFF;
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
                                background: #F2F2F2;
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
                        </style>
                        <div class="col_60">
                            <p>{{ __('messages.Subtotal') }}</p>
                            <p> {{ __('messages.Sales_Tax') }} ({{ $tax = $invoiceData->invoice_tax_percent }}%)</p>
                            <p>{{ __('messages.Discount_Amount') }}  ({{ $tax = $invoiceData->discount_percent }}%)</p>
                            <p>{{ __('messages.Receive_Advance_Amount') }} ({{ $invoiceData->currency }})</p>
                            <p>{{ __('messages.Requesting_Advance_Amount') }}({{ $invoiceData->requesting_advance_amount_percent }}%)</p>
                            <h5 style="font-size:16px;  padding:5px 10px 0px 10px; margin:0px;">{{ __('messages.Total') }}</h5>

                        </div>
                        <div class="col_40">
                            <p>{{ number_format($subtotal = $invoiceData->subtotal_no_vat, 2) }}</p>
                            <p> {{ number_format($tax_value = ($subtotal * $tax) / 100, 2) }}</p>
                            <p>{{ number_format($invoiceData->discount_amounts, 2) }}</p>
                            <p>{{ number_format($invoiceData->receive_advance_amount, 2) }}</p>
                            <p>{{ number_format(($invoiceData->final_total * $invoiceData->requesting_advance_amount_percent) / 100, 2) }}
                            </p>
                            <h5 style="font-size:16px; color: #686868; padding:5px 20px 0px 10px; margin:0px;">
                                {{ $invoiceData->currency }}
                                {{ number_format($invoiceData->final_total - $invoiceData->receive_advance_amount, 2) }}
                            </h5>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <style>
            .third_section {
                width: 100%;
                display: flex;
            }

           .third_section_left_side{
            width: 60%;
            float: left;
            padding-left: 56px;
            height: 170px;

           }
           .third_section_right_side{
            width: 30%;
            float: right;
            text-align: center;
            height: 170px;
            }
        </style>
        <section class="third_section">
            <div style="padding-top:12%; padding-left:56px;">
                <h5 style=" color: #686868; font-weight: 400; font-size: 30px; width: 80%"> {{ __('messages.Thank_You_for_your_business') }}</h5>
            </div>
            <div class="third_section_left_side">
                <p style="font-size: 14px;color: #0370BF; text-transform: uppercase; padding:0px; margin:0px;">{{ __('messages.Terms_&_conditions') }}</p>
                <p  style=" color: #686868; padding:0px; margin:0px; line-height:20px;">{{  $userInvoiceLogo->terms }}</p>
                <p style=" color: #686868; padding:0px; margin:0px; ">{{  $invoiceData->invoice_notes }}</p>
            </div>

            <div class="third_section_right_side">
                @if ($userInvoiceLogo->signature != '')
                <img style="object-fit:contain;" style="width: 80px; height:80px;margin-top:20px; "
                    src="{{ public_path('uploads/signature/' . $userInvoiceLogo->signature) }}"
                    alt="img">
            @endif
            </div>

    </div>
    </section>
    </div>

    </div>
