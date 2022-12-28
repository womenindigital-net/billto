@extends('layouts.frontend.app')
@section('title', 'Login Page')
@push('frontend_css')
    <style>
        @import url("//fonts.googleapis.com/css?family=Roboto");

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }


        .block-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            height: 100%;
        }

        .block-wrap>div {
            width: 100%;
            text-align: center;
        }

        .btn-google,
        .btn-fb {
            display: inline-block;
            border-radius: 1px;
            text-decoration: none;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
            transition: background-color .218s, border-color .218s, box-shadow .218s;
        }

        .btn-google .google-content,
        .btn-google .fb-content,
        .btn-fb .google-content,
        .btn-fb .fb-content {
            display: flex;
            align-items: center;
            width: 448px;
            height: 44px;
            background-color: #FFB317;
            border-radius: 10px;
        }

        .btn-google .google-content .logo,
        .btn-google .fb-content .logo,
        .btn-fb .google-content .logo,
        .btn-fb .fb-content .logo {
            padding: 15px;
            height: inherit;
        }

        .btn-google .google-content svg,
        .btn-google .fb-content svg,
        .btn-fb .google-content svg,
        .btn-fb .fb-content svg {
            width: 18px;
            height: 18px;
        }

        .btn-google .google-content p,
        .btn-google .fb-content p,
        .btn-fb .google-content p,
        .btn-fb .fb-content p {
            width: 100%;
            line-height: 1;
            letter-spacing: .21px;
            text-align: center;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
        }

        .btn-google {
            background: #FFF;
            border-radius: 10px;
        }

        .btn-google:hover {
            box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
        }

        .btn-google:active {
            background-color: #eee;
        }

        .btn-google .google-content p {
            color: #FFFFFF;
        }

        .btn-fb {
            padding-top: 1.5px;
            background: #4267b2;
            background-color: #FFB317;
            border-radius: 10px;
        }

        .btn-fb:hover {
            box-shadow: 0 0 3px 3px rgba(59, 89, 152, 0.3);
        }

        .btn-fb .fb-content p {
            color: rgba(255, 255, 255, 0.87);
        }

        .btn-gh {
            padding-top: 1.5px;
            background: #333333 !important;
            background-color: #333333 !important;
        }

        .btn-gh:hover {
            box-shadow: 0 0 3px 3px rgba(59, 89, 152, 0.3);
        }

        .btn-gh p {
            color: rgba(255, 255, 255, 0.87);
        }

        .btn-gh i {
            color: #fff !important;
        }

        .color {
            color: #898989 !important;
            text-decoration: underline !important;
        }

        .color:hover {
            color: #FFB317 !important;
        }

        .eye {
            margin-left: -38px !important;
            z-index: 3;
            border-left: 0;
            border-radius: 0 10px 10px 0px !important;
        }

        .eyeColor {
            color: #CCCCCC !important;
        }

        .inputPadding {
            padding-top: 11px;
            padding-bottom: 11px;
        }
    </style>
@endpush
@section('frontend_content')
    <!-- Sub Nav Start -->
    {{-- <section class="sub_nav py-4 border-bottom">
        <div class="">
            <div class="container">
                <div class="nav">
                    <p class="m-0">You are here : <span><a href="#">Home</a> &#8921;</span> <span
                            style="color: #FFB317 !important;">Sign in</span></p>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Sub Nav Start -->

    <!-- Sign in form Start -->
    <section class="form_sign_in">
        <div>
            <div class="container ">
                <div class="text-center">
                    <h2 class="h2_title  mt-4 mb-3 fw-light">Welcome back to Billto</h2>
                    <h2 class="mb-4  fw-bolder" style="color: #000000">Sign in</h2>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 my-0 mx-auto">
                        <div class="border rounded" style="background: #F0F0F0;">
                            <form method="POST" action="{{ route('login') }}" autocomplete="on">
                                @csrf
                                <div class="pt-4 pb-4 ps-5 pe-5">
                                    @if ($errors->any())
                                        <div>
                                            <div class="fs-5 text-danger">
                                                Whoops! Something went wrong.
                                            </div>

                                            <ul class="mt-3 text-danger">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- Email Address -->
                                    <div class="form-group pb-4">
                                        <label for="email" class="pb-2 " style="font-size: 14px ;">Email / Phone
                                            number</label>
                                        <input style="background-color: #FFFFFF; border-radius:10px" type="email"
                                            name="email"
                                            class=" inputPadding border-0 form-control @error('email') is-invalid @enderror"
                                            required autofocus id="email" aria-describedby="emailHelp">
                                    </div>
                                    <!-- Password -->
                                    {{-- <div class="form-group pb-3">
                                        <label for="password" class="pb-2 fw-bolder">Password</label>
                                        <input type="password" name="password" required
                                            class="py-2 form-control @error('email') is-invalid @enderror" id="password"
                                            placeholder="Password" autocomplete="current-password">
                                    </div> --}}
                                    <!-- show password -->
                                    <div class="login_oueter">
                                        <div class="form-row">
                                            <label for="email" class="pb-2 " style="font-size: 14px ;">Password</label>
                                            <div class="input-group mb-3">
                                                <input style="border-radius: 10px;" type="password" name="password" required
                                                    class="form-control inputPadding border-0 @error('email') is-invalid @enderror"
                                                    id="password" autocomplete="current-password">
                                                <div class=" eye">
                                                    <div class=" inputPadding border-0  eyeColor d-flex align-items-center pe-4"  onclick="password_show_hide();">
                                                        <i class="bi bi-eye" id="show_eye"></i>
                                                        <i class="bi bi-eye-slash d-none" id="hide_eye"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Remember Me -->
                                    {{-- <div class="mt-1 form-check">
                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                        <label for="remember_me" class="form-check-label text-sm"> Remember me </label>
                                    </div> --}}

                                    <button type="submit"
                                        class="form_btn mt-3 inputPadding btn btn-dark border-0 w-100 text-bold "
                                        style="background: #FFB317; font-size:14px; border-radius:10px; ">Continue</button>

                                    <!--reset password-->
                                    <p class="text-center mt-2  ">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="reset color">Forgot your
                                                password?</a>
                                        @endif
                                    </p>
                                    <div class="mt-3 mb-4"
                                        style="width: 100%; height: 20px; border-bottom: 0.5px solid #CCCCCC; text-align: center">
                                        <span style="font-size: 14px; background-color: #F0F0F0; color:#CCCCCC;">
                                            or
                                        </span>
                                    </div>

                                    <!-- google	 -->
                                    <a style="background: #FFB317; font-size:14px; border-radius:10px; " type="button"
                                    class="form_btn my-3 inputPadding btn btn-dark border-0 w-100 text-bold"
                                    href="/auth/google/redirect">
                                        <p class="text-white"><i class="bi bi-google me-1"></i> Sign in with Google</p>
                                   </a>

                                    <!-- facebook	 -->
                                    <a style="background: #FFB317; font-size:14px; border-radius:10px; " type="button"
                                    class="form_btn mt-3  inputPadding btn btn-dark border-0 w-100 text-bold"
                                    href="/auth/facebook/redirect">
                                    <p class="text-white"><i class="bi bi-facebook me-1"></i> Sign in with Facebook</p>
                                    </a>
                                    <!--text singup -->
                                    <div class="mt-3 already_billto">
                                        <p class="text-center" style="color: #898989">Don't have an account yet?<a
                                                class="color" href="{{ route('register') }}">No worries, joining is easy.
                                                here</a></p>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in form End -->


@endsection
@push('frontend_js')
    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
@endpush
