@extends('layouts.frontend.app')
@section('title', 'Billto.io')
@push('frontend_css')

@endpush
@section('frontend_content')


<section class="container">
    <div class="row my-5">
        <div class="col-6">
            @foreach ($subscribe_package as $subscribe )
            @php
            $day = $subscribe->packageDuration;
           @endphp
            <div class="card">
                <div class="card-body text-center bg-success">
                    <h5 class="card-title">{{ $subscribe->packageName }}</h5>
                 </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> Invoice Template: <strong>{{ $subscribe->templateQuantity }}</strong> </li>
                    <li class="list-group-item">Total invoice Genarate: <strong>{{ $subscribe->templateQuantity }}</strong></li>
                    <li class="list-group-item">Package Duration: <strong>  @php
                        if($day==30){ echo "One Month"; }elseif($day==90){ echo "Three Month";}elseif($day==180){  echo "Six Month"; }elseif($day==365){ echo "One Year";}
                        @endphp</strong></li>
                    <li class="list-group-item">Package Price: <strong>Tk. {{ $subscribe->price }}</strong></li>
                    <input type="hidden" id="package_price" value="{{ $subscribe->price }}">
                </ul>
            </div>

            @endforeach
        </div>
        <div class="col-6">
            <div class="card">
                <form action="" id="getway_setup" method="post">
                    @csrf
                <div class="card-body">
                    <label for="">Payment Amount</label>
                    <input type="hidden" id="package_id" name="package_id"value="{{ $subscribe->id }}">
                    <input type="hidden" id="auth_user_id" name="auth_user_id" value="{{ auth()->user()->id }}">


                    <input type="number"  style="width:300px;" name="new_package_price" id="new_package_price" class="form-control" >
                     <small id="message" class="text-danger"></small>
                    <div class="mt-2">
                        <button class="btn btn-success" id="submit_button" disabled >Submit</button>
                    </div>
                </div>
            </form>
            </div>

            @php
                // use Carbon\Carbon;
                // echo $packageDuration = $subscribe->packageDuration;
                // $create_date = $subscribe->created_at;
                // $date = new Carbon($create_date);
                // $val = $date->diffInDays(Carbon::now());
                // echo $val;
                // if($packageDuration  >= $val){
                //     echo "date ache";
                // }else{
                //     echo "date nai";
                // }
            @endphp

        </div>
    </div>
</section>

<script>

// $( "#new_package_price" ).bind( "keyup", function() {
//     var package_price = document.getElementById('package_price').value;
//     var new_package_price = document.getElementById('new_package_price').value;

//   if(package_price== new_package_price){

//     $('#new_package_price').addClass("is-valid");
//     $('#new_package_price').removeClass("is-invalid");
//     document.getElementById("submit_button").disabled = false;
//     document.getElementById("message").innerHTML = "";
//   }else{
//     $('#new_package_price').addClass("is-invalid");
//     document.getElementById("submit_button").disabled = true;
//     document.getElementById("message").innerHTML = "Please set Correct value";
//   }
// });

</script>




@endsection
@push('frontend_js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush
