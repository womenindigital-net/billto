
  <style>
    .page {
      width: 21cm;
      min-height: 29.7cm;
      overflow: hidden;
      margin: 0 auto;
    }
    /* .bgImg {
      background-image: url("/img/image_2022_12_10T04_44_18_427Z.png");
      background-repeat: no-repeat;
      background-size: 400px 1140px;
    } */
    .HeaderText {
      font-size: 24px;
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
    .invoice {
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
  <div
    class="page" style="

      background-image:  url('{{ asset('storage/invoice/invoice_defualt/side.png')}}');
      background-repeat: no-repeat;
      background-size: 400px 1140px;
    "
  >
    <section>

      <div class="row">
        <div class="col-6 companyName pt-4 sectionPadding pb-5">
          <div class="">
            <h4 class="HeaderText">Company Name</h4>
            <p class="HeaderTextP">
                {{ $data->invoice_form }}
            </p>
          </div>
          <div class="mt-5">
            <h4 class="to">TO</h4>
            <p class="Neals">{{   $data->invoice_to }}</p>
            {{-- <p class="nealsP">
              123 Rockfeller Street, <br />
              New York, NY 12210
            </p> --}}
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
            @if($data->invoice_logo!="")
            <img
              src="{{ asset('storage/invoice/logo/'.$data->invoice_logo) }}"
              alt=""
              height="122px"
              width="122px"
              style="border-radius: 50%"
            />
            @endif

          </div>
          <div class="text-end me-5 mt-2">
            <h1 class="invoice">INVOICE</h1>
          </div>
          <div class="d-flex justify-content-end me-5 mt-5">
            <div class="invoiceText me-1">
              <p>Incoice #</p>
              <p>invoice date</p>
              <p>P.O.#</p>
              <p>due date</p>
            </div>
            <div class="invoiceTextTwo ms-5 text-end">
              <p>10201</p>
              <p>11/02/2022</p>
              <p>12/11/2022</p>
              <p>27/01/2022</p>
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
            <table
              class="table table-bordered tableTextColor mb-0 pb-0 borderColor"
            >
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
                  <td>{{ number_format($product_detail->product_rate,2) }}</td>
                  <td>{{number_format( $product_detail->product_amount,2)}}</td>
                </tr>
            @endforeach
              </tbody>
            </table>
            <div class="row mt-0">
              <div class="col-6"></div>
              <div class="col-6">
                <table class="table table-borderless tableTextColor">
                  <tbody class="tableRowBgColor">
                    <tr>
                      <td class="bgColorSubTable">Sub total</td>
                      <td class="text-end">{{ number_format($subtotal = $data->total,2) }}</td>
                    </tr>
                    <tr>
                      <td class="bgColorSubTable">Sales Tax{{$tax = $data->invoice_tax_percent }}%</td>
                      <td class="text-end">{{number_format( $tax_value =  $subtotal*$tax /100,2) }}</td>
                    </tr>
                    <tr>
                      <td class="bgColorSubTable fw-bold">Total</td>
                      <td class="text-end fw-bold">{{  number_format($subtotal + $tax_value,2)  }}</td>
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
            <div class="col-8">
                <div class=""><h1 style="color: #686868; font-size: 18px; line-height: 36px; font-weight: 400; padding-left: 65px; margin-top: 50px;">Thank You for your business</h1></div>
                <div class="mt-5">
                    <h3 style="padding-left: 65px; font-size: 14px; font-weight: 700; line-height: 17px; color: #039dbf;">TERMS & CONDITIONS</h3>
                    <P style="padding-left: 65px; font-size: 12px; font-weight: 400; line-height: 14px; color: #686868;">{{  $data->invoice_terms }} <br> {{  $data->invoice_notes}}</P>
                </div>
            </div>

            {{-- <div class="col-4">
                <div class="mt-5">
                    <img src="/img/images.png" alt="" width="173px" height="111px">
                </div>
            </div> --}}
        </div>
    </section>
  </div>

