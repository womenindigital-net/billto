

<header class="header_sevtion sticky-top p-0 m-0">

    <nav class="navbar   navbar-expand-lg navbar-light p-0 m-0 " style="background-color: #F0F0F0; z-index: 9999999;">

        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/frontend/img/LOGO/billto-logo.png') }}" alt="LOGO">
            </a>
            <div class="navbar">
              @php
                use App\Models\User;
            @endphp

                <ul class="navbar-nav d-flex flex-row me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item d-flex align-items-center">
                            <div class="user-menu-wrap">
                            @php
                                $user_photo = User::where('id', Auth::user()->id) ->get(['picture__input'])->first();
                            @endphp
                                <div onclick="myFunction()">
                                    <button  class="dropbtn btn  profileName btncustom ">
                                        @if($user_photo->picture__input!=null)
                                        <img  class="me-1 dropbtn" src="{{ asset('uploads/userImage/' . $user_photo->picture__input) }}"
                                        height="32px" width="32px" style="border-radius: 50%">
                                        @else

                                        @endif
                                        {{ auth()->user()->name }} </button>
                                </div>
                                <div id="myDropdown" class="dropdown-content">
                                    <ul class="user-menu m-0 mt-2 p-0">
                                        <div class="profile-highlight">
                                        </div>
                                        <li class="user-menu__item">
                                            <a class="user-menu-link" href="{{ route('all.invoice') }}">
                                                <i class="bi bi-grid-fill"></i>
                                                <div class="fw-bold">{{__('messages.DashBoard')}}</div>
                                            </a>
                                        </li>
                                        <div class="footer">
                                            <li class="user-menu__item">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a class="user-menu-link fw-bold" href="#" style="color: #F44336;"
                                                        onclick="event.preventDefault(); this.closest('form').submit();"><i
                                                            class="bi bi-box-arrow-right pe-2 fw-bold"></i> {{__('messages.Signout')}}</a>
                                                </form>
                                            </li>
                                            <!--<li class="user-menu__item"><a class="user-menu-link fw-bold" href="{{ route('settigns') }}"><i class="bi bi-gear pe-2 fw-bold"></i> Settings</a></li>-->
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item d-flex align-items-center pe-2">
                            <svg height="50" width="3">
                                <line x1="0" y1="15" x2="0" y2="40"
                                    style="stroke:rgb(0,0,0);stroke-width:2" />
                                Sorry, your browser does not support inline SVG.
                            </svg>
                        </li>

                        <li class="nav-item d-flex align-items-center">
                            <div class=" dropdown">
                                <a href="#" class="dropdown-toggle nav-link  align-items-center d-flex" data-bs-toggle="dropdown"aria-expanded="false">
                                    {{-- <div class="border_custom1">
                                        <svg style="height: 25px; width: 25px">
                                            <circle cx="10" cy="11" r="7" stroke="green"
                                                stroke-width="5" fill="red" />
                                        </svg>
                                    </div> --}}
                                    <div class="border_custom2 me-2">
                                     <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                                    </div>
                                </a>
                                <div class="dropdown-menu border p-0 m-0">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endauth
                    @guest
                    <li class="nav-item d-flex align-items-center">
                        <div class=" dropdown">
                            <a href="#" class="dropdown-toggle nav-link  align-items-center d-flex" data-bs-toggle="dropdown"aria-expanded="false">
                                {{-- <div class="border_custom1">
                                    <svg style="height: 25px; width: 25px">
                                        <circle cx="10" cy="11" r="7" stroke="green"
                                            stroke-width="5" fill="red" />
                                    </svg>
                                </div> --}}
                                <div class="border_custom2 me-2">
                                 <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                                </div>
                            </a>
                            <div class="dropdown-menu border p-0 m-0">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link p-1" aria-current="page" href="{{ route('login') }}">{{__('messages.Signin')}}</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <svg height="50" width="3">
                                <line x1="0" y1="15" x2="0" y2="40"
                                    style="stroke:rgb(0,0,0);stroke-width:2" />
                                Sorry, your browser does not support inline SVG.
                            </svg>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link p-1" aria-current="page" href="{{ route('create') }}">{{__('messages.CreateBill')}}</a>
                        </li>
                    @endguest

                </ul>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <li> sadfsaf</li>
             </div> --}}

            </div>

        </div>
    </nav>
</header>

<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

