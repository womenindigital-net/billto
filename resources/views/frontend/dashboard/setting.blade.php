@extends('frontend.all-invoice')
@section('display-none')
    d-none
@endsection
@section('setting')
    left_manu
@endsection
<style>
</style>
@section('dashboard_content')
    <section class="container-fluid my-5 border m-0 p-0 rounded bg-white ">
        <div class="row ">
            <div class="col-4 ">
                <div class="d-flex justify-content-center">
                    <div class="card border-0   my-5" style="width: 18rem;">
                        <img src="{{ asset('uploads/template/1668414782.jpg') }}"
                            class="card-img-top  rounded-circle px-5 mt-2" height="190px" alt="...">
                        <div class="card-body">
                            <input type="file" class="form-control">

                            <div class="text-center mt-3"><a href="{{ url('') }}" type="button"
                                    class="btn btn-outline-success"> <i class="bi bi-arrow-up-circle"></i></a></div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-8 ">
                <div class="row mt-5">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-success">Update</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
