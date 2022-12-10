
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .first_section {
            width: 100%;
            display: flex;
            /* margin-bottom: 75px; */
            justify-content: space-between;
            /* position: relative; */
            /* z-index: 2; */

        }


        .logo_area img {
            width: 100px;
            padding-bottom:5px;
        }

        .logo_area {
            width: 30%;
            float: left;
            background: #0370BF;
            padding-top: 28px;
            padding-bottom:44px;
            text-align: center;
            line-height: 26px;
        }
        .logo_area  p{
            color: #FFF;
        }

        .heading_area {
            text-align: right;
            padding-top: 84px;
            padding-right: 75px;

        }

        .heading_area h1 {
            color:#0370BF;
            font-weight: 700;
            font-size: 59.9879px;
            line-height: 73px;
            margin-bottom: 22px;
        }

        .heading_area .a {
            width: 50%;
            float: left;
            text-align: left;
            size: 18px;
            width: 700;
            line-height: 26px;
            /* margin-left: 30%; */
        }

        .heading_area .b {
            width: 50%;
            float: right;
        }

        .heading_area .i_title {
            /* margin-top: 20px; */
        }

        .i_sub_title {
            display: flex;
            justify-content: space-between;
        }

        .a {
            text-align: left;
        }

        .a p {
            font-weight: 700;
            font-size: 17px;
        }

        .b p {
            font-weight: 400;
            font-size: 16px;
            line-height: 25.99px;
            width: 400;
            padding-top: 2px;
        }

        .table1 tbody tr {
            border-top: 1px solid #C4C4C4;
        }

        .second_section {
            background: #F2F2F2;
            padding-top: 20px;
            /* padding-bottom: 100px; */
        }

        .third_section {
                    width: 100%;
                    display: flex;

                }

                .left_Side_bar {
                    width: 30%;
                    background-color: #0370BF;
                    padding-top: 10px;
                    padding-bottom: 14px;
                    float: left;
                    margin-top: -16px;
                    color: white !important;
                }

                .right_Side_bar {
                    width: 68%;
                    float: right;
                }

                .c {
                    /* padding: 5px; */
                    /* margin: 0px 50px; */
                    /* border-bottom: 1px solid #FFFFFF; */
                    color: #FFF;
                    text-align: center;
                    line-height: 24px;
                    font-size: 18px;
                    padding-bottom: 36px;
                }

                .c h5 {
                    font-size: 18px;
                    text-align: center;
                    /* border-bottom: 2px solid white; */
                    padding-top: 34px;
                    font-weight: 700;
                    line-height: 30px;

                }

                .d {
                    padding: 5px;
                    /* margin: 0px 50px; */
                    /* border-bottom: 1px solid #FFFFFF; */
                    color: #FFF;
                    text-align: center;
                    line-height: 24px;
                    font-size: 18px;
                    padding-bottom: 36px;
                }

                .d h5 {
                    font-size: 18px;
                    text-align: center;
                    /* border-bottom: 2px solid white; */
                    /* padding: 8px 0; */
                }

                .e {
                    margin-left: 10%;
                }

                .f {
                    margin-left: 10%;
                    padding: 76px 0px;
                }

                .e h1 {
                    font-size: 30px;
                    padding: 40px 0px;
                }
                .empty_div {
                    width: 25%;
                    float: left;
                }

                .table_div {
                    width: 75%;
                    float: right;
                    text-align: right;
                    /* border-top: 2px solid #FCB21C; */
                    padding-right: 57px;
                }
                            .page{
                    background: var(--white);
                    display: block;
                    margin: 0 auto;
                    position: relative;
                    box-shadow: var(--pageShadow);
                }
                .page[size="A4"] {
                    width: 21cm;
                    /* min-height: 29.7cm;
                    overflow: hidden; */
                }

    </style>
        <div class="invoice_body page" size="A4">
            <section class="first_section">
                <div class="logo_area">
                    @if($data->invoice_logo!="")
                    <img src="{{ asset('storage/invoice/logo/'.$data->invoice_logo) }}" alt="img"width="122px" height="110px" style="border-radius: 50%;">
                   @endif
                    <div class="" style="margin-top:29px; ">
                        <p><b>Company Name </b></p>
                        <p>{{ $data->invoice_form }}</p>
                        {{-- <p>New York, NY 12210</p> --}}
                    </div>

                </div>

                <div class="heading_area" style="color: #686868;">
                    <div class="i_title">
                        <h1>INVOICE</h1>
                    </div>
                    <div class="i_sub_title">
                        <div class="a">
                            <p>Incoice #</p>
                            <p>invoice date</p>
                            <p>p.o.#</p>
                            <p>due date</p>
                        </div>
                        <div class="b">
                            <p>{{ $data->invoice_id }}</p>
                            <p>{{  $data->invoice_date }}</p>
                            <p>{{ $data->invoice_po_number }}</p>
                            <p>{{  $data->invoice_dou_date }}</p>
                        </div>
                    </div>
                </div>
            </section>


            <section class="second_section">
                <div class="table">
                    <div style="margin-left: 70px; margin-right:75px;  padding-bottom:80px;">
                        <table class="table1" style="width:100%;  border-collapse: collapse;" class="">
                            <thead>
                                <tr>
                                    <th
                                        style=" text-align:left; width:15%; font-weight: 700; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;  padding-right: 0px;">
                                        qty</th>
                                    <th
                                        style=" text-align:left; width:45%;font-weight: 700; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;  padding-right: 0px;">
                                        description</th>
                                    <th
                                        style=" text-align:right; width:20%; font-weight: 700; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;  padding-right: 0px;">
                                        unit price</th>
                                    <th
                                        style=" text-align:right; width:20%;font-weight: 700; font-size: 17px; line-height: 29px;text-transform: uppercase; color: #686868;  padding-right: 0px;">
                                        amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productsDatas as $product_detail)
                                <tr>
                                    <td
                                        style=" padding:10px 0px; text-align:left; width:15%; border-bottom: 1px solid #C4C4C4; font-weight: 400; font-size: 16px; color: #686868; ">
                                        {{ $product_detail->product_quantity }}</td>
                                    <td
                                        style=" text-align:left; width:45%;border-bottom: 1px solid #C4C4C4;font-weight: 400; font-size: 16px; color: #686868; ">
                                        {{ $product_detail->product_name }}</td>
                                    <td
                                        style="  width:20%;border-bottom: 1px solid #C4C4C4; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        {{ number_format($product_detail->product_rate,2) }}</td>
                                    <td
                                        style="  width:20%; border-bottom: 1px solid #C4C4C4;font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        {{number_format( $product_detail->product_amount,2)}}</td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <td
                                        style=" padding:10px 0px; text-align:left; width:15%; border-bottom: 1px solid #C4C4C4; font-weight: 400; font-size: 16px; color: #686868; ">
                                        01</td>
                                    <td
                                        style=" text-align:left; width:45%;border-bottom: 1px solid #C4C4C4;font-weight: 400; font-size: 16px; color: #686868; ">
                                        Front and rear brake cable</td>
                                    <td
                                        style="  width:20%;border-bottom: 1px solid #C4C4C4; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        1,00.00</td>
                                    <td
                                        style="  width:20%; border-bottom: 1px solid #C4C4C4;font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        1,00.00</td>
                                </tr>
                                <tr>
                                    <td
                                        style=" padding:10px 0px; text-align:left; width:15%; border-bottom: 1px solid #C4C4C4; font-weight: 400; font-size: 16px; color: #686868; ">
                                        01</td>
                                    <td
                                        style=" text-align:left; width:45%;border-bottom: 1px solid #C4C4C4;font-weight: 400; font-size: 16px; color: #686868; ">
                                        Front and rear brake cable</td>
                                    <td
                                        style="  width:20%;border-bottom: 1px solid #C4C4C4; font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        1,00.00</td>
                                    <td
                                        style="  width:20%; border-bottom: 1px solid #C4C4C4;font-weight: 400; font-size: 16px; color: #686868; text-align:right; ">
                                        1,00.00</td>
                                </tr> --}}
                            </tbody>
                        </table>


                    </div>
                </div>
            </section>
            <style>
                .border{
                    border-bottom: 2px solid #FFF;
                    margin: 0px 30px;
                    margin-bottom:10px;

                }
            </style>
            <section class="third_section">
                <div class="left_Side_bar" >
                    <div class="c">
                        <h5>To</h5>
                        <div class="border"></div>
                        <p><b class="text-light">{{   $data->invoice_to }}</b></p>
                    </div>
                    {{-- <div class="d">
                        <h5>Ship To</h5>
                        <div class="border"></div>
                        <p><b class="text-light">Neals BD.</b></p>
                        <p>123 Rockfeller Street,</p>
                        <p>New York, NY 12210</p>
                    </div> --}}
                </div>
                <div class="right_Side_bar ">
                    <div class="i_footerright_area">
                        <div style="margin-top: 0; width:100%; display:flex;">
                            <div class="empty_div"> </div>
                            <div class="table_div">
                                <table style="width: 100%;">
                                    <tr style="text-align: right;">
                                        <td style="color: #686868;">Subtotal</td>
                                        <td style="color: #686868;">{{ number_format($subtotal = $data->total,2) }}</td>
                                    </tr>
                                    <tr style="text-align: right">
                                        <td style="color: #686868;">Sales Tax{{$tax = $data->invoice_tax_percent }}%</td>
                                        <td style="color: #686868;">{{number_format( $tax_value =  $subtotal*$tax /100,2) }}</td>
                                    </tr>
                                    <tr style="text-align: right">
                                        <td style="font-size: 18px; color: #686868;">Total</td>
                                        <td style="font-size: 18px; color: #686868;">{{  number_format($subtotal + $tax_value,2)  }}</td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                        <div class="f">
                            <div class="thanks" style="padding-top: 8%;">
                                <h5 style="color: #686868; font-weight: 400; font-size: 30px; padding-bottom:20px; border-top:2px solid #0370BF; width: 90%">Thank You for your business</h5>
                            </div>
                            <div class="g" style="color: #686868;">
                                <p style="font-weight: 700;font-size: 14px;color: #0370BF; text-transform: uppercase;">terms & conditions</p>
                                <p>{{  $data->invoice_terms }}</p>
                                <p>{{  $data->invoice_notes}}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        </div>

        </div>

</body>
</html>
