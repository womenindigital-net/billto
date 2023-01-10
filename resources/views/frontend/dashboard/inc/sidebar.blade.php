<section class="page-top">
    <div class="side-bar border_right">
        @php
            use App\Models\User;
            use App\Models\Invoice;
            use App\Models\SendMail_info;
            $user_id = Auth::user()->id;
            $user = User::where('id',$user_id)->get();
            $trash = Invoice::where('user_id',$user_id)->where('status_due_paid','draft')->count();
            $all_Invoice_Count = Invoice::where('user_id',$user_id)->count();
            $sendByMail_count = SendMail_info::where('user_id', $user_id)->count();

        @endphp
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
                    <a href="{{ route('create') }}" class="btn btn-warning btn-blog ">Create New
                        Invoice</a>
                </div>
                <nav class='dash_menu @yield('custom_dash_menu') '>

                    <ul>
                        <li class="sub-menu    @yield('all_invoice')">
                            <a class="mb-2" href='#invoice'><i class="bi bi-file-text myInvoiceIcon me-3"></i> My
                                Invoices
                                <div class='fa fa-caret-down mt-2'> <i class="bi bi-caret-down"></i></div>
                            </a>
                            <ul class="@yield('d-block')">
                                <li><a href="{{ url('my-all-invoice') }}" class="@yield('all-invoice')">All
                                        Invoices <span
                                            class="circle @yield('all_invoice_left') submenu_circle_bg">{{ $all_Invoice_Count }}</span></a>
                                </li>
                                <li><a href='#invoice' class="@yield('over-view') ">Over Due <span
                                            class="circle   submenu_circle_bg">0</span></a></li>
                                <li><a href='#invoice' class="@yield('Pertially') ">Pertially Paid <span
                                            class="circle submenu_circle_bg">0</span></a></li>
                                <li><a href='#invoice' class="@yield('Unpaid') ">Unpaid <span
                                            class="circle submenu_circle_bg">0</span></a></li>
                                <li><a href='{{ url('/all/invoices/send-by-Mail') }}'
                                        class="@yield('SendbyEmail') ">Send by Email <span
                                            class="circle @yield('SendbyEmail_bg') submenu_circle_bg">{{ $sendByMail_count }}</span></a>
                                </li>
                                <li><a href='{{ url('/my-trash-invoice') }}' class="@yield('Trush') ">
                                        Drafts <span
                                            class="circle submenu_circle_bg">{{ $trash }}</span>
                                    </a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="mb-2" href='#'><i class="bi bi-person-circle myInvoiceIcon me-3"></i> My Customers</a>
                        </li>
                        <li><a href='#'><i class="bi bi-bar-chart myInvoiceIcon me-3"></i> My Reports</a></li>
                        <li><a href='{{ url('/all/invoices/user-setting') }}'
                                class="@yield('setting')"> <i class="bi bi-gear-fill myInvoiceIcon me-3"></i> Settings</a>

                        </li>
                    </ul>
                </nav>
            </div>
        @endforeach
    </div>
</section>
