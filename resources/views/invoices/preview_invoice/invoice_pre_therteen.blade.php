<style>
    .page {
        width: 21cm;
        min-height: 28cm;
        overflow: hidden;
        margin: 0 auto;
        border: 0.1px solid #ece9e9;
    }

    /* .bgImg {
      background-image: url("/img/image_2022_12_10T04_44_18_427Z.png");
      background-repeat: no-repeat;
      background-size: 400px 1140px;
    } */
    .HeaderText {
        font-size: 20px;
        line-height: 28.8px;
        width: 700;
        color: #ffffff;
    }

    .HeaderTextP {
        font-size: 18px;
        font-weight: 400;
        line-height: 21px;
        color: #ffffff;
    }

    .to {
        font-size: 16px;
        color: #ffffff;
        width: 700;
        line-height: 19.2px;
    }

    .Neals {
        font-size: 14px;
        font-weight: 700;
        line-height: 16.8px;
        color: #ffffff;
    }

    .nealsP {
        font-size: 14px;
        font-weight: 400;
        line-height: 24px;
        color: #ffffff;
    }

    .invoiceColor {
        color: #197B30;
        font-size: 42px;
        line-height: 72px;
    }

    .invoiceText {
        font-size: 16px;
        font-weight: 700;
        line-height: 26px;
        color: #686868;
    }

    .invoiceTextTwo {
        font-size: 16px;
        font-weight: 400;
        line-height: 25px;
        color: #686868;
    }

    .tablaHeaderColor {
        background-color: #FF0000;
        color: #ffffff;
    }

    .tableRowBgColor {
        background-color: #f2f2f2;
    }

    .sectionPadding {
        padding-left: 72px;
        padding-right: 60px;
    }

    .paddingLeft {
        padding-left: 60px;
        padding-right: 45px;
    }

    .tableTextColor {
        color: #686868;
    }

    .borderColor {
        border-color: #ffffff !important;
    }

    .bgColorSubTable {
        background-color: #197B30 !important;
        color: #ffffff;
    }
    .table {
    /* margin-top: 10px; */
    margin-bottom: 0px !important;
}
</style>
<div class="page"
    style="

      background-image:  url('{{ asset('assets/vector-invoice/vector13.png') }}');
      background-repeat: no-repeat;
      background-size: 400px 1140px;
    ">
    <section>
        <div class="row">
            <div class="col-6 companyName pt-4 sectionPadding pb-5">
                <div class="">
                    <h4 class="HeaderText text-break"> {{ $data->invoice_form }}</h4>
                    <p class="HeaderTextP">

                    </p>
                </div>
                <div class="mt-5">
                    <h4 class="to">{{ __('messages.To_send') }}</h4>
                    <p class="Neals text-break">{{ $data->invoice_to }}</p>
                </div>
                {{-- <div class="mt-4">
            <h4 class="to">SHIF TO</h4>
            <p class="Neals">Neals BD</p>
            <p class="nealsP">
              123 Rockfeller Street, <br />
              New York, NY 12210
            </p>
          </div> --}}
            </div>
            <div class="col-6">
                <div class="text-end me-5 mt-3 pe-2">
                    @if ($userLogoAndTerms->invoice_logo != '')
                        <img style="object-fit:contain;"
                            src="{{ asset('storage/invoice/logo/' . $userLogoAndTerms->invoice_logo) }}" alt=""
                            height="122px" width="122px" />
                    @endif

                </div>
                <div class="text-end me-5 mt-2 pe-2">
                    <h1 class="invoiceColor">{{ __('messages.INVOICE') }}</h1>
                </div>
                <div class="d-flex justify-content-end me-5 ">
                    <div class="pe-2">
                        <style>
                            .table>:not(caption)>*>* {
                                padding: 0.2rem 0.9rem;
                                background-color: var(--bs-table-bg);
                                /* border-bottom-width: 1px; */
                                box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
                            }
                        </style>
                        <table class="table table-borderless ">
                            <thead>
                                <tr>
                                    <th scope="col-2" class="">{{ __('messages.Invoice_ID') }} #</th>
                                    <td scope="col-2" class="text-end pe-0">{{ $data->invoice_id }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="">{{ __('messages.Invoice_Date') }}</th>
                                    <td class="text-end pe-0">{{ $data->invoice_date }}</td>

                                </tr>
                                <tr>
                                    <th scope="row" class="">{{ __('messages.P_O_umber') }} #</th>
                                    <td class="text-end pe-0">{{ $data->invoice_po_number }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="">{{ __('messages.Due_Date') }}</th>
                                    <td colspan="2" class="text-end pe-0">{{ $data->invoice_dou_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section two table section -->
    <section>
        <div class="row paddingLeft">
            <div class="col-12">
                <div class="">
                    <table class="table table-bordered tableTextColor  borderColor">
                        <thead>
                            <tr class="tablaHeaderColor ms-3">
                                <th scope="col"> {{ __('messages.QTY') }}</th>
                                <th scope="col">{{ __('messages.DESCRIPTION') }}</th>
                                <th scope="col" class="text-end">{{ __('messages.UNIT_PRICE') }}</th>
                                <th scope="col" class="text-end">{{ __('messages.AMOUNT') }}</th>
                            </tr>
                        </thead>
                        <tbody class="tableRowBgColor">
                            @php
                            $count = 1;
                        @endphp
                            @foreach ($productsDatas as $product_detail)
                                <tr>
                                    <th scope="row">{{ $product_detail->product_quantity }}</th>
                                    <td> {{ $product_detail->product_name }}</td>
                                    <td>{{ number_format($product_detail->product_rate, 2) }}</td>
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
                    <div class="row mt-0">
                        <div class="col-5"></div>
                        <div class="col-7">
                            <table class="table table-borderless tableTextColor pt-0 mt-0">
                                <table class="table table-borderless tableSection  pt-0 mt-0">
                                    <tbody>
                                        <tr>
                                            <td style="background-color: #197B30;color:#ffffff; width:70%;" class="text-end">{{ __('messages.Sub_total') }}</td>
                                            <td style="background-color:#F2F2F2 " class="text-end width:30%;" style="">  {{ number_format($no_vat = $data->subtotal_no_vat, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #197B30;color:#ffffff"  class="text-end"> {{ __('messages.Sales_Tax') }}
                                                ({{ number_format($percent = $data->invoice_tax_percent) }} %)</td>
                                            <td  style="background-color:#F2F2F2 "  class="text-end">  {{ number_format(($no_vat * $percent) / 100, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #197B30;color:#ffffff"  class="text-end"> {{ __('messages.Discount_Amount') }}
                                                ({{ $data->discount_percent }}%)</td>
                                            <td  style="background-color:#F2F2F2 " class="text-end">
                                                 {{ number_format($data->discount_amounts,2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  style="background-color: #197B30;color:#ffffff"  class="text-end"> {{ __('messages.Receive_Advance_Amount') }}
                                                ({{ $data->currency }})</td>
                                            <td  style="background-color:#F2F2F2 " class="text-end">
                                              {{ number_format($data->receive_advance_amount,2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #197B30;color:#ffffff"  class="text-end"> {{ __('messages.Requesting_Advance_Amount') }}
                                                ({{ $data->requesting_advance_amount_percent }}%)</td>
                                            <td  style="background-color:#F2F2F2 " class="text-end"> {{ number_format(($data->final_total * $data->requesting_advance_amount_percent) / 100, 2) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #197B30;color:#ffffff"  class="text-end fw-bold">{{ __('messages.Total') }} {{ $data->currency }}</td>
                                            <td  style="background-color:#F2F2F2 " class="text-end fw-bold"> {{ number_format($data->final_total- $data->receive_advance_amount, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-7 ">
                <div class="">
                    <h1
                        style="color: #686868; font-size: 22px; line-height: 36px; font-weight: 400; padding-left: 68px; margin-top: 50px;">
                        {{ __('messages.Thank_You_for_your_business') }} </h1>
                </div>
                <div class="mt-5">
                    <h3
                        style="padding-left: 65px; font-size: 16px; font-weight: 700; line-height: 17px; color: #197B30;">
                        {{ __('messages.Terms_&_conditions') }}</h3>
                    <P class="mb-3 text-break"
                        style="padding-left: 65px; font-size: 14px; font-weight: 400; line-height: 14px; color: #686868;">
                        {{ $userLogoAndTerms->terms }}</P>
                    <P class="text-break"
                        style="padding-left: 65px; font-size: 14px; font-weight: 400; line-height: 14px; color: #686868;">
                        {{ $data->invoice_notes }}</P>
                </div>
            </div>

            <div class="col-4  d-flex justify-content-center align-items-center">
                @if ($userLogoAndTerms->signature != '')
                    <div class="mx-auto ">
                        <img src="{{ asset('uploads/signature/' . $userLogoAndTerms->signature) }}" alt=""
                            height="122px" width="122px" style="object-fit:contain;" />
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
