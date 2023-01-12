<style>
    .page {
        width: 21cm;
        min-height: 29.7cm;
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
        color: #039dbf;
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
        background-color: #414141;
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
        background-color: #039dbf !important;
        color: #ffffff;
    }
</style>
<div class="page"
    style="

      background-image:  url('{{ asset('assets/vector-invoice/blueBg.png') }}');
      background-repeat: no-repeat;
      background-size: 400px 1140px;
    ">
    <section>
        <div class="row">
            <div class="col-6 companyName pt-4 sectionPadding pb-5">
                <div class="">
                    <h4 class="HeaderText text-break"> {{ $data->invoice_form }}</h4>
                    <p class="HeaderTextP">
                        {{-- {{ $data->invoice_form }} --}}
                    </p>
                </div>
                <div class="mt-5">
                    <h4 class="to">TO</h4>
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
                <div class="text-end me-5 mt-3">
                    @if ($userLogoAndTerms->invoice_logo != '')
                        <img style="object-fit:cover;"
                            src="{{ asset('storage/invoice/logo/' . $userLogoAndTerms->invoice_logo) }}" alt=""
                            height="122px" width="122px" />
                    @endif

                </div>
                <div class="text-end me-5 mt-2">
                    <h1 class="invoiceColor">INVOICE</h1>
                </div>
                <div class="d-flex justify-content-end me-5 ">
                    <div>
                        <style>
                            .table>:not(caption)>*>* {
                                padding: 0.2rem 0.9rem;
                                background-color: var(--bs-table-bg);
                                /* border-bottom-width: 1px; */
                                box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
                            }
                        </style>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col-2" class="">Incoice #</th>
                                    <td scope="col-2" class="text-end pe-0">{{ $data->invoice_id }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="">Invoice date</th>
                                    <td class="text-end pe-0">{{ $data->invoice_date }}</td>

                                </tr>
                                <tr>
                                    <th scope="row" class="">P.O.#</th>
                                    <td class="text-end pe-0">{{ $data->invoice_po_number }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="">Due date</th>
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
                    <table class="table table-bordered tableTextColor mb-0 pb-0 borderColor">
                        <thead>
                            <tr class="tablaHeaderColor ms-3">
                                <th scope="col">QTY</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">UNIT PRICE</th>
                                <th scope="col">AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody class="tableRowBgColor">
                            @foreach ($productsDatas as $product_detail)
                                <tr>
                                    <th scope="row">{{ $product_detail->product_quantity }}</th>
                                    <td> {{ $product_detail->product_name }}</td>
                                    <td>{{ number_format($product_detail->product_rate, 2) }}</td>
                                    <td>{{ number_format($product_detail->product_amount, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mt-0">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <table class="table table-borderless tableTextColor">
                                <tbody class="tableRowBgColor">

                                    <td>
                                        @php
                                            echo $subtotal = $data->total;
                                            $tax = $data->invoice_tax_percent;
                                            echo $total_value = ceil($subtotal - ($subtotal * $tax) / 100);
                                        @endphp
                                    </td>
                                    <tr>

                                        <td class="bgColorSubTable">Sub total</td>
                                        <td class="text-end">{{ number_format($total_value, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bgColorSubTable">Sales Tax{{ $tax = $data->invoice_tax_percent }}%
                                        </td>
                                        <td class="text-end">
                                            {{ number_format($tax_value = ($total_value * $tax) / 100, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="bgColorSubTable fw-bold">Total</td>
                                        <td class="text-end fw-bold">{{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                </tbody>
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
            <div class="col-6 ">
                <div class="">
                    <h1
                        style="color: #686868; font-size: 22px; line-height: 36px; font-weight: 400; padding-left: 68px; margin-top: 50px;">
                        Thank You for your business</h1>
                </div>
                <div class="mt-5">
                    <h3
                        style="padding-left: 65px; font-size: 16px; font-weight: 700; line-height: 17px; color: #039dbf;">
                        TERMS & CONDITIONS</h3>
                    <P class="mb-3 text-break"
                        style="padding-left: 65px; font-size: 14px; font-weight: 400; line-height: 14px; color: #686868;">
                        {{ $userLogoAndTerms->terms }}</P>
                    <P class="text-break"
                        style="padding-left: 65px; font-size: 14px; font-weight: 400; line-height: 14px; color: #686868;">
                        {{ $data->invoice_notes }}</P>
                </div>
            </div>

            <div class="col-5  d-flex justify-content-center align-items-center">
                @if ($data->invoice_signature)
                    <div class="mx-auto ">
                        <img src="{{ asset('uploads/signature/' . $userLogoAndTerms->signature) }}" alt=""
                            height="122px" width="122px" style="object-fit:cover;" />
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
