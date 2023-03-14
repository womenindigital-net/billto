
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
        color: #0072BC;
    }
    .text-gray{
        color: #414141;
    }
</style>
<!-- background-size: 300px 1140px; -->

<div class="page">
    <div class="custom_border_lr">
    <!-- first section -->
    <section class=" first_section">
        <div class="row" >
            <div class="col-5 ">
                <div class="mt-4 ps-5">
                    <h1 style="color: #0072BC; font-size:59.99px;">{{ __('messages.INVOICE') }}</h1>
                    <p class="text-color p-0 m-0 text-gray">{{ $data->invoice_form }}</p>
                </div>
            </div>
            <div class="col-2 text-center"> </div>
            <div class="col-5">
                <div class=" me-2 text-center mt-5">
                    <img src="/image/favicon.ico" alt="" >
                    @if ($userLogoAndTerms->invoice_logo != '')
                    <img style="width:80px;  margin-top:10px; object-fit: contain;"
                        src="{{ asset('storage/invoice/logo/' . $userLogoAndTerms->invoice_logo) }}"
                        alt="img">
                @endif
                </div>
            </div>
            <div class="col-7 ">
                <div class="w-75 ps-5 ">
                    <h5 class="p-0 m-0 fs-4  mt-3" style="color:#0072BC;">  {{ __('messages.To_send') }}</h5>
                    <p class="p-0 m-0 text-gray">
                        {{ $data->invoice_to }}
                    </p>
                </div>
            </div>
            <div class="col-5 ps-5">
                <table class="table p-0 m-0  mt-3">
                    <tr>
                        <th class="border-0 p-1 text-color">  {{ __('messages.INVOICE_no') }}#</th>
                        <th class="text-end border-0 p-1 pe-5 text-gray">  {{ $data->invoice_id }}</th>
                    </tr>
                    <tr>
                        <th class="border-0 p-1 text-color">{{ __('messages.Invoice_Date') }}</th>
                        <th class="text-end border-0 p-1 pe-5 text-gray">{{ $data->invoice_date }}</th>
                    </tr>
                    <tr>
                        <th class="border-0 p-1 text-color">{{ __('messages.P.O.') }}#</th>
                        <th class="text-end border-0 p-1 pe-5 text-gray">{{ $data->invoice_po_number }}</th>
                    </tr>
                    <tr>
                        <th class="border-0 p-1 text-color"> {{ __('messages.Due_Date') }}</th>
                        <th class="text-end border-0 p-1 pe-5 text-gray">{{ $data->invoice_dou_date }}</th>
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
                <table class="table ps-5 p-0 m-0">
                    <tr style="border-top:1px solid #0072BC; border-bottom:1px solid #0072BC;">
                        <th scope="col" class="text-end pe-5 text-color "  style="width:10%; ">{{ __('messages.qty') }}</th>
                        <th scope="col" class="text-start pe-5 text-color " style="width:46%;"> {{ __('messages.description') }}</th>
                        <th scope="col" class="text-end pe-5 text-color "style="width:22%;">  {{ __('messages.unit_price') }}</th>
                        <th scope="col" class="text-end pe-5 text-color  "style="width:23%;"> {{ __('messages.amount') }}</th>
                    </tr>

                    @php
                    $count = 1;
                @endphp
                @foreach ($productsDatas as $product_detail)
                    <tr>
                        <th  class="border-0 text-gray" scope="row">   {{ $product_detail->product_quantity }}</th>
                        <td class="border-0 text-gray" >   {{ $product_detail->product_name }}</td>
                        <td class="text-end pe-5 border-0 text-gray"> {{ number_format($product_detail->product_rate, 2) }}</td>
                        <td class="text-end pe-5 border-0 text-gray">{{ number_format($product_detail->product_amount, 2) }}</td>
                    </tr>
                    @php
                    $last_count = $count++;
                @endphp
            @endforeach
            @for ($x = $last_count; $x <= 5; $x++)
                    <tr>
                        <th  class="border-0 text-gray" scope="row">&nbsp;</th>
                        <td class="border-0 text-gray" > </td>
                        <td class="text-end pe-5 border-0 text-gray"></td>
                        <td class="text-end pe-5 border-0 text-gray"> </td>
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
                    <p class="p-0 m-0 me-5" style="border-top:2px solid #000000"></p>
                    <div class="col-2"></div>
                    <div class="col-7  text-gray " >
                        <p  class="text-end border-0 p-1 m-0">{{ __('messages.Subtotal') }}</p>
                        <p  class="text-end border-0 p-1 m-0"> {{ __('messages.Sales_Tax') }}
                            ({{ number_format($percent = $data->invoice_tax_percent) }} %)</p>
                        <p  class="text-end border-0 p-1 m-0">{{ __('messages.Discount_Amount') }}
                            ({{ $data->discount_percent }}%)</p>
                        <p  class="text-end border-0 p-1 m-0">{{ __('messages.Receive_Advance_Amount') }}
                            ({{ $data->currency }})</p>
                        <p  class="text-end border-0 p-1 m-0">{{ __('messages.Requesting_Advance_Amount') }}
                            ({{ $data->requesting_advance_amount_percent }}%) </p>
                        <p  class="text-end border-0 p-1 m-0 fs-5" style="color:202D58">   {{ __('messages.Total') }} {{ $data->currency }} </p>
                    </div>

                    <div class="col-3  pe-5  text-gray">
                        <p  class="text-end pt-1 pb-1 m-0"> {{ number_format($no_vat = $data->subtotal_no_vat, 2) }}</p>
                        <p  class="text-end pt-1 pb-1 m-0">{{ number_format($data->discount_amounts, 2) }}</p>
                        <p  class="text-end pt-1 pb-1 m-0"> {{ number_format($data->receive_advance_amount, 2) }}</p>
                        <p  class="text-end pt-1 pb-1 m-0">  {{ number_format(($data->final_total * $data->requesting_advance_amount_percent) / 100, 2) }}</p>
                        <p  class="text-end pt-1 pb-1 m-0"> {{ number_format($data->final_total - $data->receive_advance_amount, 2) }} </p>
                        <p class="p-0 m-0" style="border-top: 1px solid #ffff; width: 129%; margin-left: -13px !important;"></p>
                        <p class="text-end pt-1 pb-1 m-0 fs-5" style="color:202D58"> {{ number_format($data->final_total - $data->receive_advance_amount, 2) }} </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- four section end-->
    <!-- five section start-->
    <div class="row">
        <div class="col-12 pe-5 text-end" style="margin-top: 60px; padding-right: 87px !important;">
            @if ($userLogoAndTerms->signature != '')
            <img src="{{ asset('uploads/signature/' . $userLogoAndTerms->signature) }}" alt="" style="width:80px;padding-top:60px; margin-left:40px;object-fit:contain;">
            @endif
        </div>

        <div class="col-6 ps-5 mt-5">
            <h3 style="color:#0072BC; font-size:18.99px;">{{ __('messages.Thank_You_for_your_business') }}</h3>
        </div>
        <div class="col-6 pe-5" style="margin-top:20px; border-left:2px solid #0072BC;">
            <p style="color: #0072BC; font-weight: 500; font-size:14px; text-transform:uppercase;"> {{ __('messages.Terms_&_conditions') }} </p>
            <span style="color: #686868; font-size: 14px;">{{ $userLogoAndTerms->terms }}</span>
            <p style="color: #686868; font-size: 14px;">{{ $userLogoAndTerms->invoice_notes }}</p>
         </div>
    </div>
</div>
</div>

