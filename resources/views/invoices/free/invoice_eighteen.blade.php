<!DOCTYPE html>
<html class="no-js" lang="bn">
<meta charset="UTF-8">

<head>
    <title>Billto.io</title>
</head>

<body>
<style>
    @page {
        margin: 0%;
    }


    .text-color {
        color: #0072BC;
    }

    .text-gray {
        color: #414141;
    }


</style>
<!-- background-size: 300px 1140px; -->

<div class="page">
    <div class="custom_border_lr">
        <!-- first section -->
        <section class=" first_section" style="margin-left:30px; margin-right:30px; height:250px;">
            <div class="row " style="display:flex; width:100%;">
                <div class="col-5 border" style="width:40%; float: left;">
                    <div class="mt-4 ps-5 border" style="padding-left:30px;  padding-top:20px;">
                        <h1 style="color: #0072BC; font-size:50px; padding:0; margin:0;">{{ __('messages.INVOICE') }}
                        </h1>
                    </div>
                </div>
                <div class="col-2 border" style="width:20%; float: left;"> &nbsp;</div>
                <div class="col-5 border " style="width:39%; float: right;">
                    <div class=" me-2 text-center mt-5"
                        style="text-align: right; padding-top:10px; padding-right:40px;">
                        @if ($userInvoiceLogo->invoice_logo != '')
                            <img class="logo_image" style="width:80px;  margin-top:10px; object-fit: contain;"
                                src="{{ public_path('storage/invoice/logo/' . $userInvoiceLogo->invoice_logo) }}"
                                alt="img">
                        @endif
                    </div>
                </div>
                <div class="col-7 " style="width: 60%; float:left;  ">
                    <div class="w-75 ps-5 "style="width: 70%; padding-left:25px;">
                        <p class="text-color p-0 m-0 text-gray" style="font-size:16px; ">
                            {{ $invoiceData->invoice_form }}</p>
                        <h5 class="p-0 m-0 fs-4  mt-3" style="font-size:20px; color:#0072BC; padding:0; margin:0px;">
                            {{ __('messages.To_send') }}</h5>
                        <p class="p-0 m-0 text-gray" style="font-size:16px;  padding:0; margin:0px;">
                            {{ $invoiceData->invoice_to }}
                        </p>
                    </div>
                </div>
                <div class="col-5 ps-5" style="width: 39%; float:right;">
                    <table class="table p-0 m-0  mt-3" style="width:100%; ">
                        <tr>
                            <th class=" text-color" style="width:45%; text-align:left; padding-top:10px; ">
                                {{ __('messages.INVOICE_no') }}#</th>
                            <th class=" text-gray"
                                style="width:55%; text-align:right; padding-top:10px; padding-right:30px;">
                                {{ $invoiceData->invoice_id }}</th>
                        </tr>
                        <tr>
                            <th class="border-0 p-1 text-color" style="text-align:left; padding-top:10px;">
                                {{ __('messages.Invoice_Date') }}</th>
                            <th class="text-end border-0 p-1 pe-5 text-gray "
                                style="text-align:right; padding-top:10px;padding-right:30px;">
                                {{ $invoiceData->invoice_date }}</th>
                        </tr>
                        <tr>
                            <th class="border-0 p-1 text-color" style="text-align:left; padding-top:10px;">
                                {{ __('messages.P.O.') }}#</th>
                            <th class="text-end border-0 p-1 pe-5 text-gray"
                                style="text-align:right; padding-top:10px;padding-right:30px;">
                                {{ $invoiceData->invoice_po_number }}</th>
                        </tr>
                        <tr>
                            <th class="border-0 p-1 text-color" style="text-align:left; padding-top:10px;">
                                {{ __('messages.Due_Date') }}</th>
                            <th class="text-end border-0 p-1 pe-5 text-gray"
                                style="text-align:right; padding-top:10px;padding-right:30px;">
                                {{ $invoiceData->invoice_dou_date }}</th>
                        </tr>
                    </table>

                </div>
            </div>
        </section>

        <!-- first section end-->
        <!-- four section -->
        <section class="four_section mt-4" style="margin-top:40px;">
            <div class="row" style="width: 100%; display:flex;">
                <div class="col-12 ps-5 " style="margin-left:30px;margin-right:30px; ">
                    <table class="table ps-5 p-0 m-0"
                        style="width: 100%; border-top:1px solid #0072BC; border-bottom:1px solid #0072BC;">
                        <tr style="border-collapse: collapse; ">
                            <th class="text-color " style="padding:8px; text-transform:uppercase; width:10%; text-align:left; padding-left:20px; ">{{ __('messages.qty') }}</th>
                            <th class="text-start pe-5 text-color " style=" text-transform:uppercase; width:46%;   text-align:left">
                                {{ __('messages.description') }}</th>
                            <th class="text-color "style=" collapse; width:22%; text-transform:uppercase; text-align:right;  ">
                                {{ __('messages.unit_price') }}</th>
                            <th class=" pe-5 text-color  "style=" width:23%; text-transform:uppercase;   text-align:right; padding-right:30px;">
                                {{ __('messages.amount') }}</th>
                        </tr>
                    </table>
                    <table class="table ps-5 p-0 m-0" style="width: 100%; padding:0; margin:0;">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($productsDatas as $product_detail)
                            <tr>
                                <th class="border-0 text-gray" style="width:10%; font-size:16px; text-align:left;padding-top:6px;padding-bottom:6px; padding-left:20px;" scope="row">
                                    {{ $product_detail->product_quantity }}</th>
                                <td class="border-0 text-gray" style=" width:46%; font-size:16px;">
                                    {{ $product_detail->product_name }}</td>
                                <td class="text-end pe-5 border-0 text-gray" style="width:22%;text-align:right; font-size:16px;">
                                    {{ number_format($product_detail->product_rate, 2) }}</td>
                                <td class="text-end pe-5 border-0 text-gray" style="width:23%; font-size:16px; text-align:right; padding-right:30px;">
                                    {{ number_format($product_detail->product_amount, 2) }}</td>
                            </tr>
                            @php
                                $last_count = $count++;
                            @endphp
                        @endforeach
                        @for ($x = $last_count; $x <= 5; $x++)
                            <tr>
                                <th class="border-0 text-gray" scope="row">&nbsp;</th>
                                <td class="border-0 text-gray"> </td>
                                <td class="text-end pe-5 border-0 text-gray"></td>
                                <td class="text-end pe-5 border-0 text-gray"> </td>
                            </tr>
                        @endfor
                    </table>

                    <div class="row m-0 p-0 " style="display: flex; width:100%; padding:0; margin:0;">
                        <p style="padding:0;margin:0;border-bottom:2px solid #000000"> &nbsp;</p>

                        <div class="col-7  text-gray " style="width: 70%; float: left; text-align:right; padding:0px; margin:0px;">
                            <p class="" style="padding: 0; margin:0px;">{{ __('messages.Subtotal') }}</p>
                            <p class="text-end border-0 p-1 m-0"> {{ __('messages.Sales_Tax') }}
                                ({{ $tax = $invoiceData->invoice_tax_percent }}%)</p>
                            <p class="text-end border-0 p-1 m-0">{{ __('messages.Discount_Amount') }}
                                ({{ $tax = $invoiceData->discount_percent }}%)</p>

                            <p class="text-end border-0 p-1 m-0">{{ __('messages.Receive_Advance_Amount') }}
                                ({{ $invoiceData->currency }})</p>
                            <p class="text-end border-0 p-1 m-0">{{ __('messages.Requesting_Advance_Amount') }}
                                ({{ $invoiceData->requesting_advance_amount_percent }}%) </p>
                            <p class="" style="color:#0072BC;font-size:20px; padding:0; margin:0px; ">
                                {{ __('messages.Total') }}
                            </p>
                        </div>

                        <div class="col-3  pe-5  text-gray" style="width: 24.2%; float: right; text-align:right; padding-right:30px;">
                            <p style="padding: 0; margin:0px;">
                                {{ number_format($subtotal = $invoiceData->subtotal_no_vat, 2) }}</p>
                            <p class="text-end pt-1 pb-1 m-0">
                                {{ number_format($tax_value = ($subtotal * $tax) / 100, 2) }}</p>
                            <p class="text-end pt-1 pb-1 m-0"> {{ number_format($invoiceData->discount_amounts, 2) }}
                            </p>

                            <p class="text-end pt-1 pb-1 m-0">
                                {{ number_format($invoiceData->receive_advance_amount, 2) }}</p>
                            <p class="text-end pt-1 pb-1 m-0">
                                {{ number_format(($invoiceData->final_total * $invoiceData->requesting_advance_amount_percent) / 100, 2) }}
                            </p>
                            <p style="color:#0072BC; font-size:20px; padding:0; margin:0px; ">
                                {{ $invoiceData->currency }}   {{ number_format($invoiceData->final_total - $invoiceData->receive_advance_amount, 2) }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- four section end-->
        <!-- five section start-->
        <div class="row" style="display:flex; width:90%;">
            <div  style="margin-top: 60px; padding-right: 30px;display:flex; width:100%; text-align:right">

                @if ($userInvoiceLogo->signature != '')
                    <img style="margin-top: 60px; padding-right: 30px; width:100px;"
                        src="{{ public_path('uploads/signature/' . $userInvoiceLogo->signature) }}" alt="img">
                @endif

            </div>

            <div style="width:40%; float:left; margin-top:0%;">
                <h3 style="color:#0072BC; font-size:18.99px;   padding-left:30px;  padding-top:70px;">{{ __('messages.Thank_You_for_your_business') }}</h3>
            </div>
            <div style=" width:48%; float:right; padding-left:10px;  margin-top:70px; padding-right:35px; border-left:2px solid #0072BC;">
                <p style="color: #0072BC; font-size:18px; text-transform:uppercase; padding:0; margin:0px;">
                    {{ __('messages.Terms_&_conditions') }} </p>
                <span style="color: #686868; font-size: 14px;  padding:0; margin:0px;">{{ $userInvoiceLogo->terms }}</span>
                <p style="color: #686868; font-size: 14px;  padding:0; margin:0px;"> {{ $invoiceData->invoice_notes }}</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
