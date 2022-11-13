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
                    <li class="list-group-item">Package Duration: <strong> @php
                        if($day==30){ echo "1 Month"; }elseif($day=="60"){ echo "2 Month";}elseif($day<=365){  echo "1 Year"; }
                  @endphp</strong></li>
                    <li class="list-group-item">Package Price: <strong>Tk. {{ $subscribe->price }}</strong></li>
                    <input type="hidden" id="package_price" value=" {{ $subscribe->price }}">
                </ul>
            </div>

            @endforeach
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <label for="">Payment Amount</label>
                    <input type="text"  style="width:300px;" id="new_package_price" class="form-control" >
                    <div class="mt-2">
                        <button class="btn btn-success" id="foo" disabled>Submit</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
// $( "#new_package_price" ).bind( "keyup", function() {
//   $( this ).toggleClass( "entered" );
//   var element = document.getElementById('package_price').value;
//       var element2 = document.getElementById('new_package_price').value;

//   if(element==element2){
//     alert("element")
//   }else{
//     alert(element)
//   }
// });

</script>




@endsection
@push('frontend_js')

@endpush
