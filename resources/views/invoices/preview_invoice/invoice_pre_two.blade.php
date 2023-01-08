
<style>
  .page {
    width: 21cm;
    min-height: 29.7cm;
    overflow: hidden;
    margin: 0 auto;
  }
  .bgColorYellow {
    background-color: #fcb21c;
    min-height: 335px;
  }
  .bgColorYellow2{
    background-color: #fcb21c;
    min-height: 420px;
  }
  .imgMarginPadding {
    margin-top: 40px;
    margin-bottom: 49px;
  }
  .headerTextOne {
    color: #686868;
    text-align: center;
    font-size: 18px;
    line-height: 27px;
    font-weight: 700;
  }
  .headerTextTwo {
    color: #686868;
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
    color: #fcb21c;
    font-weight: 700;
    font-size: 60px;
    line-height: 73px;
    margin: 70px 0px 22px 75px;
    text-transform: uppercase;
  }
  .invoiceTextOne {
    color: #686868;
    font-size: 18px;
    font-weight: 700;
    line-height: 26px;
  }
  .invoiceTextTwo {
    color: #686868;
    font-size: 16px;
    font-weight: 400;
    line-height: 26px;
    text-align: right;
  }
  .invoiceMarginPadding {
    margin: 22px 0px 22px 100px;
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
   .solide_border_top{
    border: 1px solid #fcb21c;
    margin-top: 80px;
   }
  .bordertop{

  }
  .bordertop_left{
    margin-top: 50px;
}

  .footerHader{
      margin: 34px 70px 6px 70px;
      text-align: center;
      font-size: 18px;
      color:#686868;
      border-bottom: 2px solid #FFFFFF;
  }
  .footertext{
      font-weight: 400;
      font-size: 16;
      line-height: 21.1px;
      text-align: center;
      color: #686868;
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
      color:#fcb21c ;
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
        <div class="d-flex justify-content-center imgMarginPadding" >
         @if($userLogoAndTerms->invoice_logo!="")
          <img src="{{ asset('storage/invoice/logo/'. $userLogoAndTerms->invoice_logo) }}"  alt="" style="height:80px; width: 80px; object-fit:cover;" />
          @endif
        </div>
        <div class="hadingMarginPadding">
          <h1 class="headerTextOne">  {{ $data->invoice_form }} </h1>
          <h6 class="headerTextTwo">

          </h6>
        </div>
      </div>
      <div class="col-2"></div>
      <div class="col-6">
        <h1 class="invoiceText">Invoice</h1>
        <div class="d-flex invoiceMarginPadding">
            <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
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
              <td> {{ $product_detail->product_name }}</td>
              <td class="text-end">{{ number_format($product_detail->product_rate,2) }}</td>
              <td class="text-end">{{number_format( $product_detail->product_amount,2)}}</td>
            </tr>
            @endforeach
            {{-- <tr>
              <th>1</th>
              <td>Front and rear brake cable</td>
              <td class="text-end">1000</td>
              <td class="text-end">100</td>
            </tr>
            <tr>
              <th>1</th>
              <td>Front and rear brake cable</td>
              <td class="text-end">1000</td>
              <td class="text-end">100</td>
            </tr> --}}
          </tbody>
        </table>
        <div class="row">
              <div class="col-4"></div>
              <div class="col-8">
                <div class="solide_border_top"> </div>
              </div>
          <div class="col-4">

          </div>
          <div class="col-7">
                <div class="bordertop"></div>
                <table class="table table-borderless tableSection ">
                  <tbody>
                    <tr>
                      <td class="text-end">Sub total </td>
                      <td class="text-end">{{ number_format($no_vat = $data->subtotal_no_vat,2) }}</td>
                    </tr>
                    <tr>
                      <td class="text-end"> Sales Tax {{ number_format($percent = $data->invoice_tax_percent) }} %</td>
                      <td class="text-end">{{ number_format($no_vat*$percent/100,2) }}</td>
                    </tr>
                    <tr>
                        <td class="text-end">  Requesting Advance Amount ({{ $data->requesting_advance_amount_percent }}%)</td>
                        <td class="text-end">{{ number_format($data->total*$data->requesting_advance_amount_percent/100,2) }}</td>
                      </tr>
                    <tr>
                      <td class="text-end fw-bold">Total</td>
                      <td class="text-end fw-bold">{{ number_format($data->total,2) }}</td>
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
        <div class="col-4 bgColorYellow2">
          <div class="">
            <h4 class="footerHader text-white">To</h4>
            <p  class="footertext  text-white">{{   $data->invoice_to }}</p>
          </div>
        </div>
        <div class="col-8">
          <h1 class="footerThank">Thank You for your business </h1>
          <div class="">
              <h5 class="tramsAndCondition">Terms & conditions </h5>
              <p class="payment">{{  $userLogoAndTerms->terms }} <br> {{  $data->invoice_notes}}</p>
          </div>
          <div class="mt-4">
              <p class="payment"></p>
          </div>
        </div>
      </div>
    </section>
</div>
