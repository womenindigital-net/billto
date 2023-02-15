<style>
    .page {
        width: 21cm;
        min-height: 29cm;
        overflow: hidden;
        margin: 0 auto;
        background-color: #fffffff3;
        border: 1px solid #e9e9e9;
    }

    .text-color {
        color: #686868;
    }
    .product_derails_table tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
</style>
<!-- background-size: 300px 1140px; -->

<div class="page  "
    style=" background-image:  url('{{ asset('assets/vector-invoice/vactor5.png') }}'); background-repeat: no-repeat;">
    <div class="custom_border_lr">


        <!-- first section -->
        <section class=" first_section">
            <div class="row">
                <div class="col-3  text-center">
                    @if ($userLogoAndTerms->invoice_logo != '')
                        <img src="{{ asset('storage/invoice/logo/' . $userLogoAndTerms->invoice_logo) }}" alt=""
                            style="width:80px;object-fit:contain;  margin-top:10px;">
                    @endif
                </div>
                <div class="col-9 ">
                    <div class="d-flex justify-content-end me-5">
                        <h1 style="background-color: #A950A0; color: #ffffff; padding:10px; font-size:50.99px;">
                            {{ __('messages.INVOICE') }}</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- first section end-->
        <!-- second section -->
        <section class="second_section">
            <div class="row ">
                <div class="col-3 "> </div>
                <div class="col-4 ">
                    <div class="mt-4">
                        {{-- <strong class="text-color">{{ $data->invoice_form }}</strong> --}}
                        <p class="text-color p-0 m-0 fs-6">{{ $data->invoice_form }}</p>
                    </div>
                </div>
                <div class="col-5 mt-4">
                    <table class="table p-0 m-0 text-color w-100">
                        <tr>
                            <td class="border-0 p-1 fs-6" style=" width:45%;">
                                {{ __('messages.Invoice_ID') }}#</td>
                            <td class="text-end border-0 p-1 pe-5" style=" width:55%;">
                                {{ $data->invoice_id }}</td>
                        </tr>
                        <tr>
                            <td class="border-0 p-1" style="">{{ __('messages.Invoice_Date') }}</td>
                            <td class="text-end border-0 p-1 pe-5" style="">{{ $data->invoice_date }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border-0 p-1" style="">{{ __('messages.P_O_umber') }}#</td>
                            <td class="text-end border-0 p-1 pe-5" style="">
                                {{ $data->invoice_po_number }}</td>
                        </tr>
                        <tr>
                            <td class="border-0 p-1" style="">{{ __('messages.Due_Date') }}</td>
                            <td class="text-end border-0 p-1 pe-5" style="">
                                {{ $data->invoice_dou_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
        <!-- second section end-->
        <!-- third section -->
        <section class="second_section">
            <div class="row">
                <div class="col-3 "> </div>
                <div class="col-4 mb-4">
                    <h5 class="p-0 m-0" style="border-bottom:1px solid #A950A0; color: #A950A0;">
                        {{ __('messages.To_send') }}</h5>
                    <p class="p-0 m-0 text-color">
                        {{ $data->invoice_to }}
                    </p>
                </div>
                <div class="col-5 "> </div>
            </div>
        </section>
        <!-- third section end-->

        <!-- four section -->
        <section class="four_section">
            <div class="row">
                <div class="col-2 "> </div>
                <div class="col-10 ">
                    <table class="table  p-0 m-0 text-color product_derails_table">
                        <tr >
                            <th scope="col" class="text-end pe-5" style="width:10%; font-size:14px;"> {{ __('messages.QTY') }}</th>
                            <th scope="col" class="text-start pe-5" style="width:40%;  font-size:14px;">
                                {{ __('messages.DESCRIPTION') }}</th>
                            <th scope="col" class="text-end pe-5"style="width:25%;  font-size:14px;">{{ __('messages.UNIT_PRICE') }}
                            </th>
                            <th scope="col" class="text-end pe-5"style="width:25%;  font-size:14px;"> {{ __('messages.AMOUNT') }}
                            </th>
                        </tr>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($productsDatas as $product_detail)
                            <tr>
                                <th scope="row">{{ $product_detail->product_quantity }}</th>
                                <td>{{ $product_detail->product_name }}</td>
                                <td class="text-end pe-5">  {{ number_format($product_detail->product_rate, 2) }}</td>
                                <td class="text-end pe-5">  {{ number_format($product_detail->product_amount, 2) }}</td>
                            </tr>

                            @php
                                $last_count = $count++;
                            @endphp
                        @endforeach
                        @for ($x = $last_count; $x <= 5; $x++)
                            <tr>
                                <th scope="row">&nbsp;</th>
                                <td> </td>
                                <td class="text-end pe-5"></td>
                                <td class="text-end pe-5"></td>
                            </tr>
                        @endfor

                    </table>
                    <div class="p-0" style=" margin-top:50px; color: #A950A0; background-color:#A950A0;">
                        <p class="p-0 m-0" style="border:1px solid #A950A0;"></p>
                    </div>
                    <div class="row m-0 p-0 ">
                        <div class="col-12 m-0 p-0">
                            <table class="table text-color w-100">
                                <tbody>
                                    <tr>
                                        <td class="text-end border-0 pt-0">{{ __('messages.Sub_total') }}</td>
                                        <td class="text-end  border-0 pt-0 pe-5"> {{ number_format($no_vat = $data->subtotal_no_vat, 2) }} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end border-0 pt-0">{{ __('messages.Sales_Tax') }}  ({{ number_format($percent = $data->invoice_tax_percent) }} %)</td>
                                        <td class="text-end border-0 pe-5 pt-0"> {{ number_format(($no_vat * $percent) / 100, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-end border-0 pt-0">{{ __('messages.Discount_Amount') }}
                                            ({{ $data->discount_percent }}%)</td>
                                        <td class="text-end border-0 pe-5 pt-0">
                                            {{ number_format($data->discount_amounts, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end border-0 pt-0"> {{ __('messages.Receive_Advance_Amount') }}
                                            ({{ $data->currency }})</td>
                                        <td class="text-end border-0 pe-5 pt-0">
                                            {{ number_format($data->receive_advance_amount, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end border-0 border-none pt-0"> {{ __('messages.Requesting_Advance_Amount') }} ({{ $data->requesting_advance_amount_percent }}%) </td>
                                        <td class="text-end border-0 pe-5 pt-0">
                                            {{ number_format(($data->final_total * $data->requesting_advance_amount_percent) / 100, 2) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-end fw-bold border-0 "
                                            style="background-color: #A950A0; color:#F2F2F2">{{ __('messages.Total') }} </td>
                                        <td class="text-end fw-bold border-0 pe-5 "
                                            style="background-color: #A950A0;color:#F2F2F2">   {{ number_format($data->final_total - $data->receive_advance_amount, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- four section end-->
        <!-- five section start-->
        <div class="row">
            <div class="col-12 text-center" style="margin-top:50px;">
                <h3 style="color:#686868; margin-left:100px;">{{ __('messages.Thank_You_for_your_business') }}</h3>
            </div>

            <div class="col-4 ps-5">
                <p style="color: #ffffff; font-weight: 500; font-size:14px; text-transform:uppercase; ">  {{ __('messages.Terms_&_conditions') }}  </p>
                <span style="color: #ffffff; font-size: 14px;">{{ $userLogoAndTerms->terms }}</span>
            </div>
            <div class="col-5"></div>
            <div class="col-3 ">
                @if ($userLogoAndTerms->signature != '')
                <img src="{{ asset('uploads/signature/' . $userLogoAndTerms->signature) }}" alt="" style="width:100px; margin-left:40px; margin-top:15px;">
                @endif
            </div>
        </div>
    </div>
</div>
