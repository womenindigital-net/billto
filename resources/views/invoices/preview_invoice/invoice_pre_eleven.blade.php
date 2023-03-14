<body>
    <style>
        .page {
            width: 21cm;
            min-height: 29.7cm;
            overflow: hidden;
            margin: 0 auto;
            background-color: #fffffff3;
            border: 1px solid rgba(20, 20, 20, 0.123);
        }
        .text-color{
            color: #686868;
        }
    </style>
    <!-- background-size: 300px 1140px; -->

    <div class="page  " style=" background-image:  url('{{ asset('assets/vector-invoice/Invoice11.png') }}'); background-repeat: no-repeat;">
        <div class="custom_border_lr">
        <!-- first section -->
        <section class=" first_section">
            <div class="row">
                <div class="col-4 ">
                    <div class="mt-5 ps-5">

                        <p class="text-color p-0 m-0">{{ $data->invoice_form }}</p>
                    </div>
                </div>
                <div class="col-3  text-center"> </div>
                <div class="col-5">
                    <div class=" me-2 text-center">
                        <img src="{{ asset('storage/invoice/logo/' . $userLogoAndTerms->invoice_logo) }}" alt="" style="width:80px;  margin-top:10px;">
                        <h1 style="color: #f2f2f2; font-size:59.99px;">  {{ __('messages.INVOICE') }}</h1>
                    </div>
                </div>
                <div class="col-7 ">
                    <div class="w-75 ps-5 text-color">
                        <h5 class="p-0 m-0 fs-4">{{ __('messages.To_send') }}</h5>
                        <p class="p-0 m-0 text-color">
                            {{ $data->invoice_to }}
                        </p>
                    </div>
                </div>
                <div class="col-5 ps-5">
                    <table class="table p-0 m-0 text-white mt-3">
                        <tr>
                            <th class="border-0 p-1">{{ __('messages.Invoice_ID') }}#</th>
                            <th class="text-end border-0 p-1 pe-5"> {{ $data->invoice_id }}</th>
                        </tr>
                        <tr>
                            <th class="border-0 p-1">{{ __('messages.Invoice_Date') }}</th>
                            <th class="text-end border-0 p-1 pe-5">{{ $data->invoice_date }}</th>
                        </tr>
                        <tr>
                            <th class="border-0 p-1">{{ __('messages.P_O_umber') }}#</th>
                            <th class="text-end border-0 p-1 pe-5">{{ $data->invoice_po_number }}</th>
                        </tr>
                        <tr>
                            <th class="border-0 p-1">{{ __('messages.Due_Date') }}</th>
                            <th class="text-end border-0 p-1 pe-5">  {{ $data->invoice_dou_date }}</th>
                        </tr>
                    </table>

                </div>
            </div>
        </section>
        <!-- first section end-->
        <!-- four section -->
        <section class="four_section mt-4">
            <div class="row">
                <div class="col-12 ps-5 ">
                    <table class="table ps-5 p-0 m-0 text-color ">
                        <tr >
                            <th scope="col" class="text-end pe-5 text-white border"  style="width:15%; background-color: #414141; font-size:16px;">{{ __('messages.QTY') }}</th>
                            <th scope="col" class="text-start pe-5 text-white border" style="width:46.2%;background-color: #414141; font-size:16px;"> {{ __('messages.DESCRIPTION') }}</th>
                            <th scope="col" class="text-end pe-5 text-color "style="width:18%;background-color: #fff; font-size:14px;">{{ __('messages.UNIT_PRICE') }}</th>
                            <th scope="col" class="text-end pe-5 text-color  "style="width:24%; background-color: #fff; font-size:14px;">{{ __('messages.AMOUNT') }}</th>
                        </tr>
                        @php
                        $count = 1;
                    @endphp
                    @foreach ($productsDatas as $product_detail)
                        <tr>
                            <th style="background-color: #F2F2F2;" class="border" scope="row">{{ $product_detail->product_quantity }}</th>
                            <td style="background-color: #F2F2F2;" class="border" > {{ $product_detail->product_name }}</td>
                            <td class="text-end pe-5 border-0 text-white"> {{ number_format($product_detail->product_rate, 2) }}</td>
                            <td class="text-end pe-5 border-0 text-white">  {{ number_format($product_detail->product_amount, 2) }}</td>
                        </tr>

                        @php
                        $last_count = $count++;
                    @endphp
                @endforeach
                @for ($x = $last_count; $x <= 5; $x++)
                        <tr >
                            <th style="background-color: #F2F2F2;" class="border" scope="row"> &nbsp;</th>
                            <td style="background-color: #F2F2F2;" class="border" ></td>
                            <td class="text-end pe-5 border-0 text-white"></td>
                            <td class="text-end pe-5 border-0 text-white"> 0</td>
                        </tr>
                        @endfor
                    </table>
                    <style>
                        .bg_blue{
                        background-color: #A950A0 !important;
                        }
                        .bg_light{
                            background-color: #F2F2F2 !important;
                            }
                    </style>
                    <div class="row m-0 p-0 ">
                        <p class="p-0 m-0" style="border-top:1px solid #ffff"></p>
                        <div class="col-2"></div>
                        <div class="col-5  text-color " style="margin-left:22.5px;">
                            <p  class="text-end border-0 p-1 m-0 text-color">{{ __('messages.Sub_total') }}</p>
                            <p  class="text-end border-0 p-1 m-0 text-color">{{ __('messages.Sales_Tax') }}  ({{ number_format($percent = $data->invoice_tax_percent) }} %)</p>
                            <p  class="text-end border-0 p-1 m-0 text-color">{{ __('messages.Discount_Amount') }}  ({{ $data->discount_percent }}%)</p>
                            <p  class="text-end border-0 p-1 m-0 text-color">{{ __('messages.Receive_Advance_Amount') }}
                                ({{ $data->currency }})</p>
                            <p  class="text-end border-0 p-1 m-0 text-color">{{ __('messages.Requesting_Advance_Amount') }} ({{ $data->requesting_advance_amount_percent }}%) </p>
                            <p  class="text-end border-0 p-1 m-0 fs-5 text-color ">{{ __('messages.Total') }}  {{ $data->currency }}</p>
                        </div>

                        <div class="col-4  bg_blue  text-white">
                            <p  class="text-end pt-1 pb-1 m-0 text-white"> {{ number_format($no_vat = $data->subtotal_no_vat, 2) }} </p>
                            <p  class="text-end pt-1 pb-1 m-0 text-white"> {{ number_format(($no_vat * $percent) / 100, 2) }}</p>
                            <p  class="text-end pt-1 pb-1 m-0 text-white"> {{ number_format($data->discount_amounts, 2) }}</p>
                            <p  class="text-end pt-1 pb-1 m-0 text-white">   {{ number_format($data->receive_advance_amount, 2) }}</p>
                            <p  class="text-end pt-1 pb-1 m-0 text-white">  {{ number_format(($data->final_total * $data->requesting_advance_amount_percent) / 100, 2) }} </p>
                            <p class="p-0 m-0" style="border-top: 1px solid #ffff; width: 129%; margin-left: -13px !important;"></p>
                            <p class="text-end pt-1 pb-1 m-0 fs-5 text-white">    {{ number_format($data->final_total - $data->receive_advance_amount, 2) }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- four section end-->
        <!-- five section start-->
        <div class="row">
            <div class="col-12 ps-5" style="margin-top:60px;">
                <h3 style="color:#686868; ">{{ __('messages.Thank_You_for_your_business') }}</h3>
            </div>

            <div class="col-4 ps-5" style="margin-top:60px;">
            <p style="color: #A950A0; font-weight: 500; font-size:14px; text-transform:uppercase;">{{ __('messages.Terms_&_conditions') }}</p>
            <span style="color: #686868; font-size: 14px;">
                {{ $userLogoAndTerms->terms }}
            </span>
            </div>
            <div class="col-5"></div>
            <div class="col-3 ">
                @if ($userLogoAndTerms->signature != '')
                <img src="{{ asset('uploads/signature/' . $userLogoAndTerms->signature) }}" alt="" style="width:100px; margin-left:40px; margin-top:60px; object-fit:contain;">
                @endif
            </div>
        </div>
    </div>
    </div>
</body>
