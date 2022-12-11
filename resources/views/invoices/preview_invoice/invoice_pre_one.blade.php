<style>
    .page {
      width: 21cm;
      min-height: 29.7cm;
      overflow: hidden;
      margin: 0 auto;
    }
    .bgColorYellow {
      background-color: #0370BF;
      min-height: 335px;
    }
    .imgMarginPadding {
      margin-top: 40px;
      margin-bottom: 49px;
    }
    .headerTextOne {
      color: #FFFFFF;
      text-align: center;
      font-size: 18px;
      line-height: 27px;
      font-weight: 700;
    }
    .headerTextTwo {
      color: #FFFFFF;
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
      color: #0370BF;
      font-weight: 700;
      font-size: 60px;
      line-height: 73px;
      margin: 70px 0px 22px 75px;
      text-transform: uppercase;
    }
    .invoiceTextOne {
      font-size: 18px;
      line-height: 26px;
    }
    .invoiceTextOne p{
        color: #686868;
        font-weight: 700;
    }
    .invoiceTextTwo {
      color: #686868;
      font-size: 16px;
      font-weight: 400;
      line-height: 26px;
      text-align: right;
    }
    .invoiceMarginPadding {
      margin: 22px 0px 22px 80px;
    }
    .tableSection {
      color: #686868 !important;
    }
    .tableSectionBgColor {
      background-color: #f2f2f2;
    }
    .tableSection_border .table > :not(:last-child) > :last-child > * {
      border-bottom-color: #d9d5cda1 !important;
    }
    .bordertop{
        border: 1px solid #0370BF;
        margin-top: 80px;
    }
    .footerHader{
        margin: 34px 70px 6px 70px;
        text-align: center;
        font-size: 18px;
        color:#FFFFFF;
        border-bottom: 2px solid #FFFFFF;
    }
    .footertext{
        font-weight: 400;
        font-size: 16;
        line-height: 21.1px;
        text-align: center;
        color: #FFFFFF;
    }
    .footerThank{
        font-size: 30px;
        color: #686868;
        margin-top: 55px;
        margin-bottom:48px ;
    }
    .tramsAndCondition{
        font-size: 14px;
        font-weight: 700;
        line-height: 22.8px;
        color:#0370BF ;
    }
    .payment{
        font-size: 12px;
        font-weight: 400;
        line-height: 19.8px;
        color:#686868;
    }
  </style>
  <div class="page">
    <section>
      <div class="row">
        <div class="col-4 bgColorYellow">
          <div class="d-flex justify-content-center imgMarginPadding">
            @if($data->invoice_logo!="")
            <img class="rounded-circle" src="{{ asset('storage/invoice/logo/'.$data->invoice_logo) }}" alt="" height="122px"   width="122px"/>
            @endif
          </div>
          <div class="hadingMarginPadding">
            <h1 class="headerTextOne">Company Name</h1>
            <h6 class="headerTextTwo">
                {{ $data->invoice_form }}
            </h6>
          </div>
        </div>
        <div class="col-2"></div>
        <div class="col-6">
          <h1 class="invoiceText">Invoice</h1>
          <div class="d-flex invoiceMarginPadding">
            <div class="invoiceTextOne me-1">
              <p>Incoice #</p>
              <p>Invoice date</p>
              <p>P.O.#</p>
              <p>Due date</p>
            </div>
            <div class="invoiceTextTwo ms-5">
                <p>{{ $data->invoice_id }}</p>
                <p>{{  $data->invoice_date }}</p>
                <p>{{ $data->invoice_po_number }}</p>
                <p>{{  $data->invoice_dou_date }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="">
      <!-- this is table section  -->
      <div class="row tableSection_border tableSectionBgColor">
        <div class="col-1"></div>
        <div class="col-10">
          <!-- second section -->
          <table class="table tableSection">
            <thead>
              <tr>
                <th scope="col">QTY</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col" class="text-end">UNIT PRICE</th>
                <th scope="col" class="text-end">AMOUNT</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($productsDatas as $product_detail)
              <tr>
                <th>{{ $product_detail->product_quantity }}</th>
                <td>{{ $product_detail->product_name }}</td>
                <td class="text-end">{{ number_format($product_detail->product_rate,2) }}</td>
                <td class="text-end">{{number_format( $product_detail->product_amount,2)}}</td>
              </tr>
          @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-4"></div>
            <div class="col-8">
                  <div class="bordertop"></div>
                  <table class="table table-borderless tableSection ">
                    <tbody>
                      <tr>
                        <td class="text-end">Sub total</td>
                        <td class="text-end">{{ number_format($subtotal = $data->total,2) }}</td>
                      </tr>
                      <tr>
                        <td class="text-end">Sales Tax {{$tax = $data->invoice_tax_percent }}%</td>
                        <td class="text-end">{{number_format( $tax_value =  $subtotal*$tax /100,2) }}</td>
                      </tr>
                      <tr>
                        <td class="text-end fw-bold">Total</td>
                        <td class="text-end fw-bold">{{  number_format($subtotal + $tax_value,2)  }}</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="col-1"></div>
      </div>
    </section>

    <section>
        <div class="row">
          <div class="col-4 bgColorYellow">
            <h4 class="footerHader">To</h4>
            <p  class="footertext">{{   $data->invoice_to }}</p>
            {{-- <h4 class="footerHader mt-5">SHIF To</h4>
            <p  class="footertext">Neals BD. 123 Rockfeller Street,New York, NY 12210</p> --}}
          </div>
          <div class="col-8">
            <h1 class="footerThank ">Thank You for your business </h1>
            <div class="">
                <h5 class="tramsAndCondition">Terms & conditions </h5>
                <p class="payment">{{  $data->invoice_terms }} <br> {{  $data->invoice_notes}}</p>
            </div>
            {{-- <div class="mt-4">
                <h5 class="tramsAndCondition">terms & conditions </h5>
                <p class="payment">Payment is due within 15 days <br>
                    Please make checks payable to: Company Name</p>
            </div> --}}
          </div>
        </div>
      </section>
  </div>
