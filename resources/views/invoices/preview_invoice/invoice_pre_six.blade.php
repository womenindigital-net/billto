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

        .text-color {
            color: #ffffff;
        }

        .first_section {
            width: 100%;
            display: flex;
        }

        .first_section_form_section {
            width: 60%;
            float: left;
        }

        .textHeading {
            width: 250px;
            margin-left: 50px;
            padding-top: 10px;
            color: #FFFFFF;
        }

        .first_section_logo_aria {
            width: 39%;
            float: right;
        }

        .logo_image {
            text-align: right;
            padding-top: 10px;
            padding-right: 50px;
        }

        .invoice_heading_area {
            width: 100%;
        }

        .invoice_heading_area h1 {
            left: 65px;
            font-weight: bold;
            font-size: 45px;
            color: #FCB21C;
            padding: 10px 50px;
            margin: 0px;
        }


        /* second_section_invoice */

        .second_section_invoice_to_date {
            width: 100%;
            display: flex;
        }

        .section_invoice_to {
            width: 54%;
            float: left;

        }

        .invoice_two_details {
            width: 400px;
            padding: 10px 50px;
        }

        .section_invoice_to_date {
            width: 45%;
            float: right;

        }
    </style>
    <!-- background-size: 300px 1140px; -->

    <div class="page  " style="background-image:  url('/image/vector6.png'); background-repeat: no-repeat;">
        <div class="custom_border_lr">
            <!-- first section -->
            <div class="row">
                <section class="first_section" style="height: 120px; width:100%; background-color: #414141;">
                    <div class="first_section_form_section">
                        <div class="textHeading ">
                            <p><b class="text-color">{{ $data->invoice_form }} </b></p>
                        </div>
                    </div>
                    <div class="first_section_logo_aria" style="color: #686868;">
                        <div class="logo_image">
                            @if ($userLogoAndTerms->invoice_logo != '')
                                <img style="width:100px; height:100px; object-fit: contain;"
                                    src="{{ asset('storage/invoice/logo/' . $userLogoAndTerms->invoice_logo) }}"
                                    alt="img">
                            @endif
                        </div>
                    </div>
                </section>
            </div>
            <div class="row">
                <div class="invoice_heading_area">
                    <h1 class=" mb-0 pb-0">{{ __('messages.INVOICE') }}</h1>
                </div>
            </div>

            <!-- first section end-->
            <div class="row">
                <div class="second_section_invoice_to_date">
                    <div class="section_invoice_to" >
                        <div class="invoice_two_details">
                            <h5 style="font-size: 18px; color:#686868; text-weight:bold; padding:0px; margin:0px; ">
                                {{ __('messages.To_send') }}
                            </h5>
                            <p style="border-bottom:2px solid #FCB21C; padding:2px 0px; margin:0px; width:90%;"></p>
                            <p style="color:#686868;text-weight:bold; padding:2px 0; margin:0px; ">
                                {{ $data->invoice_to }}</p>
                        </div>
                    </div>
                    <div class="section_invoice_to_date">
                        <table class=" w-100 ">
                            <tr>
                                <td class=""
                                    style="text-align:left; width:55%; color:#686868; font-weight:bold; font-size:16px; padding-top:5px; padding-bottom:5px; ">
                                    {{ __('messages.INVOICE_no') }} #
                                </td>
                                <td class="pe-5 "
                                    style="text-align: right;width:45%; font-size:16px; color:#686868; padding-top:5px; padding-bottom:5px;">
                                    {{ $data->invoice_id }}
                                </td>
                            </tr>
                            <tr>
                                <td class=""
                                    style="text-align:left; color:#686868; font-weight:bold; font-size:16px; padding-top:5px; padding-bottom:5px;">
                                    {{ __('messages.Invoice_Date') }}</td>
                                <td class="pe-5"
                                    style="text-align: right; color:#686868; font-size:16px; padding-top:5px; padding-bottom:5px;">
                                    {{ $data->invoice_date }}
                                </td>

                            </tr>
                            <tr>

                                <td class=""
                                    style=" text-align: left;  color:#686868;font-weight:bold; font-size:16px; padding-top:10px; padding-bottom:10px;">
                                    {{ __('messages.P.O.') }}#</td>
                                <td class="pe-5"
                                    style="text-align: right; color:#686868; font-size:16px;  width: 30%">
                                    {{ $data->invoice_po_number }}</td>

                            </tr>
                            <tr>
                                <th class="pe-5" style="text-align: left;  color:#686868; font-size:16px; width: 25%">
                                    {{ __('messages.Due_Date') }}</th>
                                <td class="pe-5" style="text-align: right; color:#686868; font-size:16px; width: 30%">
                                    {{ $data->invoice_dou_date }}

                        </table>
                    </div>
                </div>
            </div>



            <style>
                .third_section_product_details {
                    padding-right: 80px !important;
                }

                .subtotal_section {
                    width: 100%;
                    display: flex;
                }

                .col_60 {

                    background: #C4C4C4;
                    margin-left: 51.3px;
                    font-size: 16px;
                    padding-bottom: 8px;
                    padding-right: 20px;
                    text-align: right;
                    border-right: 1px solid #FFFFFF;
                }
                .col_60 p , .col_40 p{
                    color: #686868 !important;
                }
                .col_40 {

                    background: #FCB21C;
                    margin-right: 32px;
                    text-align: right;
                    padding-right: 20px;
                    color: #686868;
                    font-size: 16px;
                    padding-bottom: 8px;
                }

                .forth_section_thankyou {
                    width: 100%;
                    display: flex;
                }

                .third_section_left_side {
                    width: 25%;
                    float: left;
                    padding-left: 56px;
                    height: 170px;
                    color: #686868;

                }

                .third_section_right_side {
                    width: 65%;
                    float: right;
                    text-align: right;
                    height: 170px;
                    margin-top: 20px;
                }
            </style>
            <section class=" ">
                <div class="row m-0 p-0 third_section_product_details">
                    <div class="col-12" style="margin-left: 50px; margin-right:30px; padding-top:20px;">
                        <table class="table table-bordered  border border-white mb-0">

                            <tr>
                                <th
                                    style=" background: rgba(196, 196, 196, 0.3); width:16%;     font-size: 17px; text-transform: uppercase; padding-left:5px; color: #686868; text-align:left; ">
                                    {{ __('messages.qty') }} </th>
                                <th
                                    style="   background: rgba(196, 196, 196, 0.5); width:40%;   padding-left:10px; text-align:left;   font-size: 17px; text-transform: uppercase; color: #686868;">
                                    {{ __('messages.description') }} </th>
                                <th
                                    style="    background: rgba(196, 196, 196, 0.75);width:20%;     padding-right:20px; text-align:right;  font-size: 17px; text-transform: uppercase; color: #686868;">
                                    {{ __('messages.unit_price') }} </th>
                                <th
                                    style="  background: #FCB21C;   padding-right:20px; text-align:right; width:22.3%;   font-size: 17px;text-transform: uppercase; color: #686868;">
                                    {{ __('messages.amount') }} </th>
                            </tr>


                            @php
                                $count = 1;
                            @endphp
                            @foreach ($productsDatas as $product_detail)
                                <tr>
                                    <td
                                        style="border-collapse: collapse;  padding:6px 0px; padding-left:5px; text-align:left;    font-weight: 400; font-size: 16px; color: #686868; background: rgba(196, 196, 196, 0.3);  ">
                                        {{ $product_detail->product_quantity }}</td>
                                    <td
                                        style="border-collapse: collapse; padding-left:10px; text-align:left;  font-weight: 400; font-size: 16px; color: #686868;  background: rgba(196, 196, 196, 0.5);">
                                        {{ $product_detail->product_name }}</td>
                                    <td
                                        style="border-collapse: collapse;padding-right:20px;    font-weight: 400; font-size: 16px; color: #686868; text-align:right;  background: rgba(196, 196, 196, 0.75); ">
                                        {{ number_format($product_detail->product_rate, 2) }}</td>
                                    <td
                                        style="border-collapse: collapse;   padding-right:20px;   font-weight: 400; font-size: 16px; color: #686868; text-align:right; background: #FCB21C;">
                                        {{ number_format($product_detail->product_amount, 2) }}</td>
                                </tr>
                                @php
                                    $last_count = $count++;
                                @endphp
                            @endforeach
                            @for ($x = $last_count; $x <= 5; $x++)
                                <tr>
                                    <td
                                        style=" border-collapse: collapse;   padding:6px 0px; padding-left:5px; text-align:left;     font-size: 16px; color: #686868;background: rgba(196, 196, 196, 0.3);  ">
                                        &nbsp; </td>
                                    <td
                                        style="border-collapse: collapse;  padding-left:10px; text-align:left;   font-size: 16px; color: #686868;  background: rgba(196, 196, 196, 0.5);">
                                    </td>
                                    <td
                                        style="border-collapse: collapse;  padding-right:20px;     font-size: 16px; color: #686868; text-align:right;  background: rgba(196, 196, 196, 0.75); ">
                                    </td>
                                    <td
                                        style="border-collapse: collapse;  padding-right:20px;    font-size: 16px; color: #686868; text-align:right; background: #FCB21C;">
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
                <div class="row m-0 p-0">
                    <div class="col-9 me-0 pe-0">
                        <div class="col_60">
                            <p style="padding: 4px 0; margin:0px;">{{ __('messages.Subtotal') }}</p>
                            <p style="padding: 4px 0; margin:0px;"> {{ __('messages.Sales_Tax') }}
                                ({{ number_format($percent = $data->invoice_tax_percent) }} %)</p>
                            <p style="padding: 4px 0; margin:0px;">{{ __('messages.Discount_Amount') }}
                                ({{ $data->discount_percent }}%)</p>
                            <p style="padding: 4px 0; margin:0px;">{{ __('messages.Receive_Advance_Amount') }}
                                ({{ $data->currency }})</p>
                            <p style="padding: 4px 0; margin:0px;">{{ __('messages.Requesting_Advance_Amount') }}
                                ({{ $data->requesting_advance_amount_percent }}%)
                            </p>
                            <h5 style="font-size:16px;  margin:0px; color:#FFFFFF">
                                {{ __('messages.Total') }} {{ $data->currency }}</h5>
                        </div>
                    </div>
                    <div class="  col-3 ms-0 ps-0">
                        <div class="col_40">
                            <p style="padding: 4px 0; margin:0px;">
                                {{ number_format($no_vat = $data->subtotal_no_vat, 2) }}</p>
                            <p style="padding: 4px 0; margin:0px;">
                                {{ number_format(($no_vat * $percent) / 100, 2) }}</p>
                            <p style="padding:4px 0; margin:0px;"> {{ number_format($data->discount_amounts, 2) }}
                            </p>
                            <p style="padding:4px 0; margin:0px;">
                                {{ number_format($data->receive_advance_amount, 2) }}</p>
                            <p style="padding: 4px 0; margin:0px;">
                                {{ number_format(($data->final_total * $data->requesting_advance_amount_percent) / 100, 2) }}
                            </p>
                            <h5 style="font-size:16px;   margin:0px; color:#FFFFFF ">
                                {{ number_format($data->final_total - $data->receive_advance_amount, 2) }}
                            </h5>
                        </div>
                    </div>
                </div>

            </section>


            <!-- five section start-->
            <div class="row">
                <div class="col-12 text-center" style="margin-top:60px;">
                    <h3 style="color:#686868; ">{{ __('messages.Thank_You_for_your_business') }}</h3>
                </div>

                <div class="col-4 ps-5" style="margin-top:60px;">
                    <p style="color: #686868; font-weight: 500; font-size:14px; text-transform:uppercase;"> {{ __('messages.Terms_&_conditions') }} </p>
                    <span style="color: #686868; font-size: 14px;">{{ $userLogoAndTerms->terms }}</span>
                </div>
                <div class="col-5"></div>
                <div class="col-3 ">
                    @if ($userLogoAndTerms->signature != '')
                    <img src="{{ asset('uploads/signature/' . $userLogoAndTerms->signature) }}" alt="" style="width:100px; margin-left:40px; padding-top:100px; object-fit:contain;">
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
