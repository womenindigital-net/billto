<style>
    * {
        padding: 0;
        margin: 0;
    }

    .first_section {
        width: 100%;
        display: flex;
        margin-bottom: 75px;
        justify-content: space-between;
    }

    .logo_area img {
        width: 100px;
    }

    .logo_area {
        width: 30%;
        float: left;
        background: #FCB21C;
        padding: 20px;
        text-align: center;
    }

    .heading_area {
        text-align: right;
        padding: 10px;
        display: flex;

    }

    .heading_area h1 {
        color: #FCB21C;
        font-weight: 700;
        font-size: 59.9879px;
        line-height: 73px;
    }

    .heading_area .a {
        width: 50%;
        float: left;
        text-align: left;
        margin-left: 30%;
    }

    .heading_area .b {
        width: 50%;
        float: right;
    }

    .heading_area .i_title {
        margin-top: 20px;
    }

    .i_sub_title {
        display: flex;
        justify-content: space-between;
        padding-top: 5px;
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
        font-size: 15px;
        padding-top: 2px;
    }

    .table1 tbody tr {
        border-top: 1px solid #C4C4C4;
    }

    .second_section {
        background: #F2F2F2;
        padding-top: 20px;
        padding-bottom: 100px;
    }

    .third_section {
                width: 100%;
                display: flex;
            }

            .left_Side_bar {
                width: 30%;
                background-color: #FCB21C;
                padding-top: 20px;
                float: left;
            }

            .right_Side_bar {
                width: 70%;
                float: right;
                padding-top: 20px;
            }

            .c {
                padding: 5px;
                margin: 0px 50px;
                /* border-bottom: 1px solid #FFFFFF; */
                color: #686868;
                text-align: center;
                line-height: 24px;
                font-size: 18px;
                padding-bottom: 36px;
            }

            .c h5 {
                font-size: 22px;
                text-align: center;
                border-bottom: 2px solid white;
                padding: 8px 0;

            }

            .d {
                padding: 5px;
                margin: 0px 50px;
                /* border-bottom: 1px solid #FFFFFF; */
                color: #686868;
                text-align: center;
                line-height: 24px;
                font-size: 18px;
                padding-bottom: 36px;
            }

            .d h5 {
                font-size: 22px;
                text-align: center;
                border-bottom: 2px solid white;
                padding: 8px 0;
            }

            .e {
                margin-left: 20%;
            }

            .f {
                margin-left: 20%;
                padding: 76px 0px;
            }

            .e h1 {
                font-size: 30px;
                padding: 40px 0px;
            }
</style>



</head>

<body>

    <div class="invoice_body">
        <section class="first_section">
            <div class="logo_area">
                <img src="{{ public_path('storage/invoice/logo/u-logo.png') }}" alt="img">
                <p><b>Company Name </b></p>
                <p>123 Rockfeller Street,</p>
                <p>New York, NY 12210</p>

            </div>

            <div class="heading_area">
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
                        <p>10201</p>
                        <p>11/02/2022</p>
                        <p>12/11/2022</p>
                        <p>27/01/2022</p>
                    </div>
                </div>
            </div>
        </section>


        <section class="second_section">
            <div class="table">
                <div style="margin-left: 70px; margin-right:60px; padding-top:30px;">
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
                            </tr>
                        </tbody>
                    </table>
                    <style>
                        .empty_div {
                            width: 25%;
                            float: left;
                        }

                        .table_div {
                            width: 75%;
                            float: right;
                            text-align: right;
                            border-top: 2px solid #FCB21C;
                        }
                    </style>
                    <div style="margin-top: 100px; width:100%; display:flex;">
                        <div class="empty_div"> </div>
                        <div class="table_div">
                            <table style="width: 100%;">
                                <tr style="text-align: right">
                                    <td>Subtotal</td>
                                    <td>300.00 </td>
                                </tr>
                                <tr style="text-align: right">
                                    <td>Sales Tax 6.25%</td>
                                    <td>20.00</td>
                                </tr>
                                <tr style="text-align: right">
                                    <td style="font-size: 18px;">Total</td>
                                    <td style="font-size: 18px;">320.00</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="third_section">
            <div class="left_Side_bar">
                <div class="c">
                    <h5>To</h5>
                    <p><b>New York, NY 12210</b></p>
                    <p>123 Rockfeller Street,</p>
                    <p>New York, NY 12210</p>
                </div>
                <div class="d">
                    <h5>Ship To</h5>
                    <p>Neals BD.</p>
                    <p>123 Rockfeller Street,</p>
                    <p>New York, NY 12210</p>
                </div>
            </div>
            <div class="right_Side_bar ">
                <div class="i_footerright_area">
                    <div class="e">
                        <h1>Thank You for your business</h1>
                        <p style="font-weight: 700;font-size: 14px;color: #FCB21C;">terms & conditions</p>
                        <p>Payment is due within 15 days</p>
                        <p>Please make checks payable to: Company Name</p>
                    </div>
                    <div class="f">
                        <div class="g">
                            <p style="font-weight: 700;font-size: 14px;color: #FCB21C;">terms & conditions</p>
                            <p>Payment is due within 15 days</p>
                            <p>Please make checks payable to: Company Name</p>
                        </div>
                        <div class="h">
                            <!-- <img src="sig.png" alt="img"> -->
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </section>
    </div>

    </div>
