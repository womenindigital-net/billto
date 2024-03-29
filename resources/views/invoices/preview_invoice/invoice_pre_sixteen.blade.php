<style>
    .page {
        width: 21cm;
        min-height: 29.7cm;
        overflow: hidden;
        margin: 0 auto;
    }

    .bgColorYellow {
        background-color:
            #A950A0;
        min-height: 335px;
    }

    .bgColorYellow2 {
        background-color:
            #A950A0;
        min-height: 420px;
    }

    .imgMarginPadding {
        margin-top: 40px;
        margin-bottom: 49px;
    }

    .headerTextOne {
        color: #686868;
        text-align: center;
        font-size: 15px;
        line-height: 27px;
        font-weight: 700;
    }

    .headerTextTwo {
        color: #686868;
        text-align: center;
        font-size: 16px;
        line-height: 27px;
        font-weight: 300;
    }

    .hadingMarginPadding {
        margin-right: 20px;
        margin-left: 26px;
        margin-bottom: 44px;
    }


    .invoiceText {
        color:
            #A950A0;
        font-weight: 700;
        font-size: 60px;
        line-height: 73px;
        margin: 50px 0px 0px 78px;
        text-transform: uppercase;
    }

    .invoiceTextOne {
        color: #686868;
        font-size: 18px;
        font-weight: 700;
        line-height: 26px;
    }

    .invoiceTextTwo {
        color: #686868;
        font-size: 16px;
        font-weight: 400;
        line-height: 26px;
        text-align: right;
    }

    .invoiceMarginPadding {
        margin: 15px 0px 22px 72px;
    }

    .tableSection {
        color: #686868 !important;
    }

    .tableSectionBgColor {
        background-color: #f2f2f2;
    }

    .tableSection_border .table> :not(:last-child)> :last-child>* {
        border-bottom-color: #d9d5cda1 !important;
    }

    .solide_border_top {
        border: 1px solid #A950A0;
        margin-top: 80px;
    }

    .bordertop {}

    .bordertop_left {
        margin-top: 50px;
    }

    .footerHader {
        margin: 34px 70px 6px 70px;
        text-align: center;
        font-size: 18px;
        color: #686868;
        border-bottom: 2px solid #FFFFFF;
    }

    .footertext {
        font-weight: 400;
        font-size: 16;
        line-height: 21.1px;
        text-align: center;
        color: #686868;
    }

    .footerThank {
        font-size: 30px;
        color: #686868;
        margin-bottom: 48px;
    }

    .tramsAndCondition {
        font-size: 16px;
        font-weight: 700;
        line-height: 22.8px;
        color:
            #A950A0;
    }

    .payment {
        font-size: 12px;
        font-weight: 400;
        line-height: 19.8px;
        color: #686868;
    }
</style>
<div class="page">
    <section>
        <div class="row">
            <div class="col-4 bgColorYellow">
                <div class="d-flex justify-content-center imgMarginPadding">
                    @if ($userLogoAndTerms->invoice_logo != '')
                        <img src="{{ asset('storage/invoice/logo/' . $userLogoAndTerms->invoice_logo) }}" alt=""
                            style="height:80px; width: 80px; object-fit:contain;" />
                    @endif
                </div>
                <div class="hadingMarginPadding">
                    <h1 class="headerTextOne text-break text-white"> {{ $data->invoice_form }} </h1>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                <h1 class="invoiceText">{{ __('messages.INVOICE') }}</h1>
                <style>
                    .table>:not(caption)>*>* {
                        padding: 0.3rem 0.3rem;
                    }
                </style>
                <div class="invoiceMarginPadding">
                    <table class="table table-borderless mb-5">
                        <thead>
                            <tr>
                                <th scope="col-2">{{ __('messages.Invoice_ID') }} #</th>
                                <td scope="col-2">{{ $data->invoice_id }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ __('messages.Invoice_Date') }}</th>
                                <td>{{ $data->invoice_date }}</td>

                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.P_O_umber') }} #</th>
                                <td>{{ $data->invoice_po_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">{{ __('messages.Due_Date') }}</th>
                                <td colspan="2">{{ $data->invoice_dou_date }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <!-- this is table section  -->
        <div class="row  tableSection_border tableSectionBgColor">
            <div class="col-1"></div>
            <div class="col-10 p-0 m-0">
                <!-- second section -->
                <table class="table tableSection mb-5">
                    <thead>
                        <tr>
                            <th scope="col"> {{ __('messages.QTY') }}</th>
                            <th scope="col">{{ __('messages.DESCRIPTION') }}</th>
                            <th scope="col" class="text-end">{{ __('messages.UNIT_PRICE') }}</th>
                            <th scope="col" class="text-end">{{ __('messages.AMOUNT') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($productsDatas as $product_detail)
                            <tr>
                                <th>{{ $product_detail->product_quantity }}</th>
                                <td> {{ $product_detail->product_name }}</td>
                                <td class="text-end">{{ number_format($product_detail->product_rate, 2) }}</td>
                                <td class="text-end">{{ number_format($product_detail->product_amount, 2) }}</td>
                            </tr>

                            @php
                                $last_count = $count++;
                            @endphp
                        @endforeach
                        @for ($x = $last_count; $x <= 5; $x++)
                            <tr>
                                <th>&nbsp;</th>
                                <td> </td>
                                <td class="text-end"></td>
                                <td class="text-end"></td>
                            </tr>
                        @endfor

                    </tbody>
                </table>
                <div class="col-1"></div>
            </div>
    </section>

    <section>
        <div class="row">
            <div class="col-4 bgColorYellow2">
                <div class="">
                    <h4 class="footerHader text-white">{{ __('messages.To_send') }}</h4>
                    <p class="footertext  text-white text-break ps-1">{{ $data->invoice_to }}</p>
                </div>
            </div>
            <div class="col-8 " style="border-top: 2px solid  width:60%">
                <div class="me-5">
                    <table class="table table-borderless tableSection ">
                        <tbody>
                            <tr>
                                <td class="text-end">{{ __('messages.Sub_total') }} </td>
                                <td class="text-end" style="">
                                    {{ number_format($no_vat = $data->subtotal_no_vat, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="text-end"> {{ __('messages.Sales_Tax') }}
                                    ({{ number_format($percent = $data->invoice_tax_percent) }} %)</td>
                                <td class="text-end"> {{ number_format(($no_vat * $percent) / 100, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="text-end"> {{ __('messages.Discount_Amount') }}
                                    ({{ $data->discount_percent }}%)</td>
                                <td class="text-end">
                                    {{ number_format($data->discount_amounts, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">{{ __('messages.Receive_Advance_Amount') }}
                                    ({{ $data->currency }})</td>
                                <td class="text-end">
                                    {{ number_format($data->receive_advance_amount, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">{{ __('messages.Requesting_Advance_Amount') }}
                                    ({{ $data->requesting_advance_amount_percent }}%)</td>
                                <td class="text-end">
                                    {{ number_format(($data->final_total * $data->requesting_advance_amount_percent) / 100, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end fw-bold">{{ __('messages.Total') }}</td>
                                <td class="text-end fw-bold">{{ $data->currency }}
                                    {{ number_format($data->final_total - $data->receive_advance_amount, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="border-top:2px solid #A950A0; margin-top:50px">
                    <h1 class="footerThank">{{ __('messages.Thank_You_for_your_business') }} </h1>
                    <div class="d-flex">
                        <div>
                            <h5 class="tramsAndCondition ">{{ __('messages.Terms_&_conditions') }}</h5>
                            <p class="payment text-break">{{ $userLogoAndTerms->terms }} <br>
                                {{ $data->invoice_notes }}
                            </p>
                        </div>
                        @if ($userLogoAndTerms->signature != '')
                            <div class="mx-auto ">
                                @if ($data->invoice_signature == 'signature_add')
                                    <img src="{{ asset('uploads/signature/' . $userLogoAndTerms->signature) }}"
                                        alt="" height="122px" width="122px" style="object-fit: contain;" />
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
