@extends('layouts.admin.admin')
@section('title', 'Home Page')

@push('admin_style_css')
@endpush
@section('page_content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Create-package </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!--************************************
                ********** Main content Start ***********
                ************************************-->

                <div class="row">
                    @if (session('massage'))
                        <div class="alert alert-success">{{ session('massage') }}</div>
                    @endif
                    <div class="col-md-12">
                        <div class="card">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                            <div class="card-header">
                                <h3>Products
                                    <a href="{{ url('other/products/create') }}"
                                        class="btn btn-primary btn-sm text-white  float-end ">Add
                                        Product
                                    </a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <table class="table table-borderd table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($Products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>
                                                        @if ($product->category)
                                                            {{ $product->category->name }}
                                                        @else
                                                            No Category Found
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->selling_price }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                                    <td>
                                                        {{-- <a href="{{ url('other/products/' . $product->id . '/edit') }}"
                                                            class="btn btn-sm btn-success">Edit</a>
                                                        <a href="{{ url('other/products/' . $product->id . '/delete') }}"
                                                            onclick="return confirm('Are you sure, you want to delete ')"
                                                            class="btn btn-sm btn-danger">delete</a> --}}
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7">No product Available</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{-- <div>
                                    {{ $categories->links() }}
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--************************************
                     ********** Main content END ***********
                     ************************************-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <!-- end main content-->

    @endsection
    @push('admin_style_js')
    @endpush
