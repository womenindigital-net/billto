@extends('layouts.frontend.app')
@section('title', 'Home page')
@push('frontend_css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,500&display=swap"
        rel="stylesheet">
    <!--bootstrap css-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!--dashboard custom css-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/datatable_css_custom.css') }}">
@endpush
<style>
    .circle {
        width: 20px;
        height: 20px;
        line-height: 21px;
        border-radius: 50%;
        font-size: 12px;
        color: #fff;
        text-align: center;
        float: right;
    }
</style>
@section('frontend_content')
    <!-- Sign in form Start -->
    <section class="container-fluid bg-color ">
        <div class="row">
            <div class="col-md-2 m-0 p-0">
                <section class="page-top">
                    <div class="side-bar border_right">
                        @foreach ($user as $item)
                            <div class="logo design_logo text-center hide_mobile_view">
                                @if ($item->picture__input)
                                    <a href="{{ route('all.invoice') }}"><img
                                            src="{{ asset('uploads/userImage/' . $item->picture__input) }}"
                                            alt="Logo"></a>
                                @else
                                    <a href="{{ route('all.invoice') }}"><img
                                            src="{{ asset('uploads/defaultUserImage/avater.jpg') }}" alt="Logo"></a>
                                @endif
                                <h5 style="">Women In Digital</h5>
                                <p>{{ $item->email }}</p>
                                <span href="#" class="nav-icon"><i class="bi bi-list"></i></span>
                            </div>
                        @endforeach

                        @foreach ($user as $item)
                            <div class="mobile_menu canvas-menu">
                                <div class="text-center d-md-none mobile_sidebar">
                                    @if ($item->picture__input)
                                        <a href="{{ route('all.invoice') }}"><img
                                                src="{{ asset('uploads/userImage/' . $item->picture__input) }}"
                                                alt="Logo"></a>
                                    @else
                                        <a href="{{ route('all.invoice') }}"><img
                                                src="{{ asset('uploads/defaultUserImage/avater.jpg') }}"
                                                alt="Logo"></a>
                                    @endif

                                    <h5 style="">Women In Digital</h5>
                                    <p>{{ $item->email }}</p>
                                </div>
                                <div class="create_new_btn_sidebar">
                                    <a href="{{ route('create') }}" class="btn btn-warning btn-blog ">Create New Invoice</a>
                                </div>
                                <nav class='dash_menu @yield('custom_dash_menu') '>

                                    <ul>
                                        <li class="sub-menu    @yield('all_invoice')">
                                            <a href='#invoice'><img src="{{ asset('assets/frontend/img/icon/page.png') }}"
                                                    alt="">My Invoices
                                                <div class='fa fa-caret-down mt-2'> <i class="bi bi-caret-down"></i></div>
                                            </a>
                                            <ul class="@yield('d-block')">
                                                <li><a href="{{ url('my-all-invoice') }}" class="@yield('all-invoice')">All
                                                        Invoices <span class="circle @yield('all_invoice_left') submenu_circle_bg">{{ $all_Invoice_Count }}</span></a></li>
                                                <li><a href='#invoice' class="@yield('over-view') ">Over Due <span class="circle   submenu_circle_bg">0</span></a></li>
                                                <li><a href='#invoice' class="@yield('Pertially') ">Pertially Paid <span class="circle submenu_circle_bg">0</span></a></li>
                                                <li><a href='#invoice' class="@yield('Unpaid') ">Unpaid <span class="circle submenu_circle_bg">0</span></a></li>
                                                <li><a href='{{ url('/all/invoices/send-by-Mail') }}' class="@yield('SendbyEmail') ">Send by Email <span class="circle @yield('SendbyEmail_bg') submenu_circle_bg">{{ $sendByMail_count }}</span></a></li>
                                                <li><a href='{{ url("/my-trash-invoice") }}' class="@yield('Trush') "> Drafts <span class="circle submenu_circle_bg">{{ $trash }}</span> </a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href='#'><img
                                                    src="{{ asset('assets/frontend/img/icon/contact.png') }}"
                                                    alt="">My Customers</a>
                                        </li>
                                        <li><a href='#'><img src="{{ asset('assets/frontend/img/icon/group.png') }}"
                                                    alt="">My Reports</a></li>
                                        <li><a href='{{ url('/all/invoices/user-setting') }}'
                                                class="@yield('setting')"><img
                                                    src="{{ asset('assets/frontend/img/icon/settings.png') }}"
                                                    alt="">Settings</a>

                                                </li>
                                    </ul>
                                </nav>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>

            <div class="col-md-10 m-0 p-0">

                @yield('dashboard_content')
                <div class="container-fluid  m-0 p-0 @yield('display-none')">
                    <div class="row mt-2 m-0 p-0">
                         <div class="col-md-4">
                            <div class="card">
                                <div class="card-header"  style="background-image: url('{{asset('assets/frontend/img/user_dashbord/dashboard_img.png')}}');  background-repeat: no-repeat; background-size: cover;  height:96px;">
                                    <div class="heading_tag_desh">
                                        <h1 class="welcome_back"> Welcome Back</h1>
                                        <p>WID Dashboard</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                             <div class="left_content_deshboard d-flex align-items-center justify-content-center">
                                                <div class="image_deshboar">
                                                <img src="{{asset('assets/frontend/img/user_dashbord/logo.png')}}"   alt="">
                                                </div>
                                            </div>
                                            <div class="address_user">
                                                <p class="p-0 m-0">Address line 1 </p>
                                                <p class="p-0 m-0">Address line 2 </p>
                                            </div>
                                            <div class="address_user_phone">
                                               <p class="p-0 m-0">Phone Number:</p>
                                                <span class="p-0 m-0">+880 162 xxx xxxx</span>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="address_user_phone">
                                                <p class="p-0 m-0">Email Address:</p>
                                                 <span class="p-0 m-0">  info@womenindigital.net</span>
                                             </div>
                                             <div class="user_signeture">
                                                <p class="p-0 m-0">Signature</p>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="Signature_img">
                                                        <img src="" alt="">
                                                    </div>
                                                    <div class="edit_signatuer_btn">
                                                        <a href="" class="fs-4 text-black"> <i class="bi bi-pencil-square"></i></a>
                                                    </div>

                                                </div>

                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-8">
                         <div class="row">
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Invoice</p>
                                                <h4 class="mb-0">{{ $all_Invoice_Count }}</h4>
                                            </div>
                                            <div
                                                class="d-flex justify-content-end align-item-center  cir-pink-bg text-white px-4 rounded-circle">
                                                <div class="m-auto"><i class="bi bi-receipt fs-6"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card bg-c-pink">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1 text-white">
                                                <p class="text-white fw-medium ">Drafts Invoice</p>
                                                <h4 class="mb-0 ">{{ $trash }}</h4>
                                            </div>
                                            <div
                                                class="d-flex justify-content-end align-item-center text-white cir-pink-bg  px-4 rounded-circle">
                                                <div class="m-auto"><i class="bi bi-bell-slash fs-6"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-6 col-md-4 col-lg-3">
                                <div class="card bg-c-yellow ">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1 text-white">
                                                <p class="text-white fw-medium ">Send Invoice</p>
                                                <h4 class="mb-0 ">
                                                    {{ $sendByMail_count }}
                                                </h4>
                                            </div>
                                            <div
                                                class="d-flex justify-content-end align-item-center text-white cir-pink-bg   px-4 rounded-circle">
                                                <div class="m-auto"><i class="bi bi-send fs-6"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6  col-md-4 col-lg-3">
                                <div class="card bg-c-green ">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1 text-white">
                                                <p class="text-white fw-medium ">Total Amount</p>
                                                <h4 class="mb-0 ">{{ number_format($Total_Amount_conut,2) }}</h4>
                                            </div>
                                            <div
                                                class="d-flex justify-content-end align-item-center text-white  cir-pink-bg px-4 rounded-circle">
                                                <div class="m-auto"><i class="bi bi-bell-slash fs-6"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Sign in form End -->
@endsection
@push('frontend_js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
            });
        });
    </script>
@endpush
