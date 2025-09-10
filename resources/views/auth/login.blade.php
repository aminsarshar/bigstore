{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>ورود به حساب کاربری</title>
    <link rel="apple-touch-icon" sizes="60x60" href="admin/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="admin/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="admin/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="admin/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="admin/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="admin/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="admin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="admin/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="admin/css/app.css">
  </head>
  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper"><!--Login Page Starts-->
<section id="login">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                <div class="card px-4 py-2 box-shadow-2 width-400">
                    <div class="card-header text-center">
                        {{-- <img src="admin/img/logos/logo-color-big.png" alt="company-logo" class="mb-3" width="80"> --}}
                        <h4 class="text-uppercase text-bold-400 grey darken-1">ورود</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" @error('mobile') style="border: 1px solid red"@enderror class="form-control form-control-lg" name="mobile" id="inputEmail" placeholder="شماره تماس">
                                        @error('mobile')
                                        <div class="error_message text-danger mt-1">شماره تماس الزامی است</div>
                                        @enderror
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" @error('password') style="border: 1px solid red"@enderror class="form-control form-control-lg" name="password" id="inputPass" placeholder="رمز عبور">
                                        @error('password')
                                        <div class="error_message text-danger mt-1">رمز عبور الزامی است</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group" style="margin: 26px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0 ml-5">
                                                <input type="checkbox" class="custom-control-input" checked id="rememberme" name="remember">
                                                <label class="custom-control-label float-left" for="rememberme">مرا به خاطر بسپار</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center col-md-12">
                                        <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">ارسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer grey darken-1">
                        <div class="text-center">آیا حساب کاربری ندارید؟ <a href="{{route('register')}}"><b>ثبت نام</b></a></div>
                        <div class="text-center mb-1">رمز عبور را فراموش کرده اید؟ <a><b>بازیابی</b></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login Page Ends-->
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="admin/vendors/js/core/jquery-3.3.1.min.js"></script><script src="admin/js/persian-datepicker.min.js"></script>
    <script src="admin/vendors/js/core/popper.min.js"></script>
    <script src="admin/vendors/js/core/bootstrap.min.js"></script>
    <script src="admin/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="admin/vendors/js/prism.min.js"></script>
    <script src="admin/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="admin/vendors/js/"></script>
    <script src="admin/vendors/js/pace/pace.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="admin/js/app-sidebar.js"></script>
    <script src="admin/js/notification-sidebar.js"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>

</html>
