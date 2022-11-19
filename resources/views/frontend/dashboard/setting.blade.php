@extends('frontend.all-invoice')
@section('display-none')
    d-none
@endsection
@section('setting')
    left_manu
@endsection
<style>
    .side-bar_left {
        min-height: 68vh;
    }
</style>
@section('dashboard_content')
    @foreach ($user as $item)
        <section class="container-fluid   bg-white side-bar_left ">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <form action="{{ url('/all/invoices/user-setting' . $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4 ">
                        <div class="d-flex justify-content-center">
                            <div class="card border-0   my-5" style="width: 18rem;">
                                @if ($item->profileImage)
                                <img src="{{ asset('uploads/userImage/' . $item->profileImage) }}"
                                class="card-img-top  rounded-circle px-5 mt-2" height="190px" alt="...">
                                @else
                                    <img src="{{ asset('uploads/defaultUserImage/defaultUserImage.png') }}"
                                        class="card-img-top  rounded-circle px-5 mt-2" height="190px" alt="...">
                                @endif

                                <div class="card-body">
                                    <input type="file" name="profileImage" class="form-control">
                                    {{-- <div class="text-center mt-3"><a href="{{ url('') }}" type="button"
                                            class="btn btn-outline-success"> <i class="bi bi-arrow-up-circle"></i></a></div> --}}
                                            <div class="text-center my-3">
                                                <button type="submit" class="btn btn-outline-success"><i class="bi bi-arrow-up-circle"></i></button>
                                            </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-8 ">
                        <div class="row mt-5">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ $item->address }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" value="{{ $item->phone }}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input  type="text" name="email" value="{{ $item->email }}" class="form-control" readonly>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    @endforeach
@endsection
