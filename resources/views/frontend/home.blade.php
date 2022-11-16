@extends('layouts.frontend.app')
@section('title', 'Billto.io')
@push('frontend_css')

@endpush
@section('frontend_content')
<!-- Banner Start -->
  <section class="banner_section">
    <div style="background: url({{ asset('assets/frontend/img/banner/banner-back.jpg') }}); opacity: .8;">
      <div class="container py-5">
        <div class="row align-items-center">
          <div class="col-md-6">
            <a href="{{ route('create') }}" class="btn billto_btn">Create Bill</a>
            <a href="{{ url('/clear-cache') }}" class="btn billto_btn">cache Clear</a>
          </div>
          <div class="col-md-6 text-end">
            <img src="{{ asset('assets/frontend/img/banner/banner.png') }}" alt="" srcset="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner End -->

<!-- Create Start -->
<section class="create_section">
  <div>
    <div class="container py-5">
      <div class="row">
        <div class="col-md-4">
          <div class="icon_style">
            <img src="{{ asset('assets/frontend/img/icon/file.png') }}" alt="" srcset="" width="60"
              style="width: 66px;">
          </div>
          <h2 class="mt-4 h2_title">Create Bill</h2>
          <p>Choose from 20 templates</p>
        </div>
        <div class="col-md-4">
          <div class="icon_style">
            <img src="{{ asset('assets/frontend/img/icon/pdf.png') }}" alt="" srcset="" width="60"
              style="width: 60px;position: relative;left: 3px;">
          </div>
          <h2 class="mt-4 h2_title">Send PDF</h2>
          <p>Email or print your invoice</br>to send to your client</p>
        </div>
        <div class="col-md-4">
          <div class="icon_style">
            <img src="{{ asset('assets/frontend/img/icon/card.png') }}" alt="" srcset="" width="60">
          </div>
          <h2 class="mt-4 h2_title">Get Paid</h2>
          <p>Receive payment in</br>accounts by Card or Paypal</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Create End -->

  <!-- Invoice Template Start -->
  <section class="invoice_template">
  {{-- @php
    $pad = "4545.45%";
    $precent = substr($pad,-1);
    $paid = substr($pad,0,-1);
    dd([$precent,$paid]);
  @endphp --}}
    <div>
      <div class="container my-3">
        <div class="text-center pb-5">
          <h2 class="h2_title">Choose Your Invoice Template</h2>
          <p class="fs-sm fw-bolder">Start creating your professional bill</p>
        </div>
        <div class="row text-center">
            @foreach ($invoice_template as $invoice_temp )
            <div class="col-md-4 mt-4"><a href="{{ url('home/invoice/page/'.$invoice_temp->id) }}"> <img src="{{ asset('uploads/template/'.$invoice_temp->templateImage) }}" alt="" height="360" srcset="" style="border: 1px solid #ccc;"></a></div>
            @endforeach
         </div>
      </div>
    </div>
  </section>
  <!-- Invoice Template End -->
  <!-- Package subscription start -->
    <section>
       <div class="container mt-5">
        <div class="text-center pb-5">
            <h2 class="h2_title">Choose Your Package</h2>
            <p class="fs-sm fw-bolder">Start creating your professional bill</p>
          </div>
        <div class="row mb-5">
            @foreach ($subcription_package as $sub_package)
            @php
                $day = $sub_package->packageDuration;

            @endphp
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body text-center bg-success">
                        <h5 class="card-title">{{ $sub_package->packageName }}</h5>
                     </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Invoice Template: <strong>{{ $sub_package->templateQuantity }}</strong> </li>
                        <li class="list-group-item">Total invoice Genarate: <strong>{{ $sub_package->templateQuantity }}</strong></li>
                        <li class="list-group-item">Package Duration: <strong> @php
                              if($day==30){ echo "1 Month"; }elseif($day=="60"){ echo "2 Month";}elseif($day<=365){  echo "1 Year"; }
                        @endphp</strong></li>
                        <li class="list-group-item">Package Price: <strong>Tk. {{ $sub_package->price }}</strong></li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{ url('payment-gateway',$sub_package->id)}}" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
       </div>
    </section>
  <!--  Package subscription  End -->
@endsection
@push('frontend_js')

@endpush
