
 <style>
    *{
        padding: 0;
        margin: 0;
    }
    .first_section{
        width: 100%;
        display: flex;
        margin-bottom: 100px;
    }
    .logo_area{
        width: 30%;
        float: left;
        background: yellow;
        margin-top:10px;
        padding: 20px;
        text-align: center;
    }
.heading_area{
    text-align: right;
    padding: 10px;
    display: flex;
}
.heading_area .a{
  width: 50%;
  float: left;
  text-align: left;
  margin-left: 40%;
}
.heading_area .b{
    width: 50%;
  float: right;
}
</style>



</head>

<body>

  <div class="invoice_body">
    <section class="first_section">
     <div class="logo_area">
         <img src="u-logo.png" alt="img" >
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
        <div  style="margin-left: 70px; margin-right:60px; padding-top:30px;">
          <table class="table1" style="width:100%;" class="">
            <thead>
              <tr>
                <th>qty</th>
                <th>description</th>
                <th>unit price</th>
                <th>amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>01</td>
                <td>Front and rear brake cable</td>
                <td>1,00.00</td>
                <td>1,00.00</td>
              </tr>
              <tr>
                <td>01</td>
                <td>Front and rear brake cable</td>
                <td>1,00.00</td>
                <td>1,00.00</td>
              </tr>
              <tr>
                <td>01</td>
                <td>Front and rear brake cable</td>
                <td>1,00.00</td>
                <td>1,00.00</td>
              </tr>
            </tbody>
          </table>
          <table class="table2 tr" style="" class="">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td>Subtotal</td>
                <td>300.00  </td>
              </tr>
              <tr>
                <td>Sales Tax 6.25%</td>
                <td>20.00</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>320.00</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </section>
    <section class="third_section">
     <div class="i_footerleft_area tc">
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
     <div class="heading_area ">
        <div class="i_footerright_area">
          <div class="e">
            <h1>Thank You for your business</h1>
            <p style="font-weight: 700;font-size: 14px;color: #FCB21C;">terms & conditions</p>
            <p>Payment is due within 15 days</p>
            <p>Please make checks payable to: Company Name</p>
          </div>
          <div class="f d_flex">
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
