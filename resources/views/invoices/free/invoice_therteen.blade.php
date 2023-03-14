{{-- three invoice --}}
<style>
    @page {
        padding: 0;
        margin: 0;
    }

    /* start frist sec  */
    .first_section {
        width: 100%;
        display: flex;
     }

    .leftSideArea {
        float: left;
        width: 40%
    }

    .rightSideArea {
        float: right;
        width: 57%

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
        color: #FFF;
        font-size: 16px;
        padding-top:5px;
    }


    .d {
        padding: 5px;
        color: #FFF;
        line-height: 24px;
        font-size: 16px;
    }


    .margin_left_terms {
        margin-left: 10%;
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


    .termsFelx{
        display: flex;
        width: 100%;
    }
    .termsAndConditionDiv{
        float: left;
        width: 65%;
    }
    .signature_div{
        float: right;
        width: 35%;
        text-align: center;
        padding-top: 80px;
          }
</style>
<title>Billto.io</title>


</head>

<body>


    <div class="invoice_body page"
        style="background: url('assets/vector-invoice/vector13.png');background-repeat:no-repeat">
        <section>
            <div class="first_section">
                <div class="leftSideArea">
                    <div class="" style="margin-left:50px;">
                        <div class="c" style="padding-top:5px;">
                            <p style="font-size: 15px; padding:0px; margin:0px; ">{{ $invoiceData->invoice_form }}</p>
                        </div>
                        <div class="c">
                            <h5 style=" font-size:16px;">{{ __('messages.To_send') }}</h5>
                            <p style="padding:0px; margin:0px; font-size: 15px; padding-right:20px;">{{ $invoiceData->invoice_to }}</p>
                        </div>
                    </div>
                </div>
                <div class="rightSideArea">
                        <div style="text-align:right; margin-right:89px; ">
                            @if ($userInvoiceLogo->invoice_logo != '')
                                <img style="object-fit: contain;" src="{{ public_path('storage/invoice/logo/' . $userInvoiceLogo->invoice_logo) }}"
                                    alt="img" style="width: 80px; height:80px;">
                            @endif
                            <h1 style="font-size:40px; color:#197B30; margin-left:2px; padding:3px; margin:0px; ">{{ __('messages.INVOICE') }} </h1>
                        </div>
                        <div class="" style="color: #686868;margin-left:6px;">
                            <table style="padding-left:90px; ">
                                <tr>
                                    <td style="text-align:left; font-size:16px;color: #686868;">{{ __('messages.INVOICE_no') }}#</td>
                                    <td style="text-align: right;font-size:16px; padding-left:95px; color: #686868;">
                                        {{ $invoiceData->invoice_id }}</td>
                                </tr>
                                <tr>
                                    <td style="text-align:left; font-size:16px; color: #686868;">{{ __('messages.Invoice_Date') }}</td>
                                    <td style="text-align: right; font-size:16px; color: #686868;">{{ $invoiceData->invoice_date }}</td>
                                </tr>
                                <tr>
                                    <td style=" text-align: left; font-size:16px; color: #686868;">   {{ __('messages.P.O.') }}#</td>
                                    <td style="text-align: right; font-size:16px; color: #686868;">{{ $invoiceData->invoice_po_number }}</td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size:16px;color: #686868;">{{ __('messages.Due_Date') }}</td>
                                    <td style="text-align: right; font-size:16px;color: #686868;">{{ $invoiceData->invoice_dou_date }}
                            </table>
                        </div>
                </div>
            </div>
        </section>

        <section class="second_section" style="margin-top:20px;">
            <div class="table">
                <div style=" margin-left: 50px; margin-right:60px;  padding-bottom:80px;">
                <div style="height:200px;">
                    <table class="table1 " style="width:100%;">
                        <thead>
                            <tr style="padding-left:200px !important;">
                                <th  style=" border-collapse: collapse; background-color: #FF0000;  width:20%;  font-size: 17px; text-transform: uppercase; padding-left:5px; color: #fff; text-align:left; ">
                                    {{ __('messages.qty') }} </th>
                                <th  style="  border-collapse: collapse; border-top:none; background:#FF0000; border-right:none; padding-left:10px; text-align:left; width:40%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                    {{ __('messages.description') }} </th>
                                <th  style="  border-collapse: collapse; border-top:none; background:#FF0000;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
                                    {{ __('messages.unit_price') }}  </th>
                                <th  style="  border-collapse: collapse; border-top:none;background:#FF0000;  border-right:none; padding-right:20px; text-align:right; width:20%; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #fff;">
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
                                    &nbsp;</td>
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
                            .col_60{
                                width: 60%;
                                float: left;
                                background: #197B30;
                                color: #FFF;
                                text-align: right;
                            }
                            .col_60 p{
                                text-align: right;
                                padding:5px 10px 0px 10px;
                                 margin:0px;
                                 font-size: 15px;
                                 font-weight: 500;
                            }

                            .col_40{
                                width: 39%;
                                float: right;
                                background: #F2F2F2;
                                text-align: right;
                            }

                            .col_40 p{
                                text-align: right;
                                padding:5px 20px 0px 10px;
                                 margin:0px;
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
                            <p>{{ number_format($invoiceData->discount_amounts,2) }}</p>
                            <p>{{ number_format($invoiceData->receive_advance_amount,2) }}</p>
                            <p>{{ number_format(($invoiceData->final_total * $invoiceData->requesting_advance_amount_percent) / 100, 2) }}</p>
                            <h5 style="font-size:16px; color: #686868; padding:5px 20px 0px 10px; margin:0px;">{{ $invoiceData->currency }}  {{ number_format($invoiceData->final_total- $invoiceData->receive_advance_amount, 2) }}</h5>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="third_section">

            <div class="right_Side_bar ">

                <div class="margin_left_terms">
                    <div class="thanks" style="padding-top: 50px;">
                        <h5
                            style="color: #686868; font-weight: 400; font-size: 25px; padding-bottom:20px;  width: 80%">
                            {{ __('messages.Thank_You_for_your_business') }}</h5>
                    </div>
                    <div class="termsFelx">
                        <div class="termsAndConditionDiv" style="color: #686868;">
                            <p style="padding-bottom:15px; font-weight: 700;font-size: 14px;color: #197B30; text-transform: uppercase;">{{ __('messages.Terms_&_conditions') }}</p>
                            <p  style="padding-bottom:15px">{{  $userInvoiceLogo->terms }}</p>
                            <p>{{  $invoiceData->invoice_notes }}</p>
                        </div>
                        <div class="signature_div" >
                            @if ($userInvoiceLogo->signature != '')
                            <img style="object-fit:contain;" style="width: 80px; height:80px;margin-top:20px; "
                                src="{{ public_path('uploads/signature/' . $userInvoiceLogo->signature) }}"
                                alt="img">
                        @endif
                        </div>
                    </div>

                </div>
            </div>

    </div>
    </section>
    </div>

    </div>
