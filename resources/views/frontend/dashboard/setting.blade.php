@extends('frontend.all-invoice')
@section('display-none')
    d-none
@endsection
@section('setting')
    left_manu
@endsection
@push('frontend_css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
<style>
    .side-bar_left {
        min-height: 68vh;
    }

    #picture__input {
        display: none;
    }

    .propic {
        width: 168px;
        height: 168px;
        aspect-ratio: 16/9;
        background: #ddd;
        align-items: center;
        display: flex;
        justify-content: center;
        margin: auto;
        color: #aaa;
        border: 2px dashed currentcolor;
        cursor: pointer;
        font-family: sans-serif;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;
        border-radius: 50%;
    }

    .picture:hover {
        color: #777;
        background: #ccc;
    }

    .picture:active {
        border-color: turquoise;
        color: turquoise;
        background: #eee;
    }

    .picture:focus {
        color: #777;
        background: #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .picture__img {
        max-width: 100%;
        width: 168px;
        height: 168px;
        border-radius: 50%;
    }
    /* .hide{
        display: none;
    } */
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
                                <div class="card-body" style="margin: 0 auto;">
                                    <label   for="picture__input" tabIndex="0">
                                        <img class="propic"  src="{{ asset('uploads/userImage/' . $item->picture__input) }}" alt="">
                                        <span class="picture__image text-success"></span>
                                    </label>
                                    <input type="file" name="picture__input" id="picture__input">
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
                                    <input type="text" name="email" value="{{ $item->email }}" class="form-control"
                                        readonly>
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
    <script src="{{ asset('js/profileCustom.js') }}"></script>
@endsection
