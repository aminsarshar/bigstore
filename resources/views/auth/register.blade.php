<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>ثبت نام </title>
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
    <div class="wrapper"><!--Registration Page Starts-->
<section id="regestration">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                <div class="card px-4 py-2 box-shadow-2">
                    <div class="card-header text-center">
                        {{-- <img src="admin/img/logos/logo-color-big.png" alt="company-logo" class="mb-3" width="80"> --}}
                        <h4 class="text-uppercase text-bold-400 grey darken-1">ثبت نام</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-block mx-auto">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12">

                                        <input type="text" class="form-control form-control-lg" @error('name') style="border: 1px solid red"@enderror name="name" id="name" placeholder="نام کاربری">
                                        @error('name')
                                        <div class="error_message text-danger mt-1">نام کاربری الزامی است</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" @error('mobile') style="border: 1px solid red"@enderror class="form-control form-control-lg" name="mobile" id="mobile" placeholder="موبایل">
                                        @error('mobile')
                                        <div class="error_message text-danger mt-1">شماره تماس الزامی است</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" @error('password') style="border: 1px solid red"@enderror class="form-control form-control-lg" name="password" id="password" placeholder="رمز عبور">
                                        @error('password')
                                        <div class="error_message text-danger mt-1">رمز عبور الزامی است</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" @error('password_confirmation') style="border: 1px solid red"@enderror class="form-control form-control-lg" name="password_confirmation" id="password_confirmation" placeholder="تکرار رمز عبور">
                                        @error('password_confirmation')
                                        <div class="error_message text-danger mt-1">تکرار رمز عبور الزامی است</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-offset-1">
                                    <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0" style="text-align: center">
                                        <input type="checkbox" class="custom-control-input" checked id="terms">
                                        <label class="custom-control-label pl-2" for="terms">موافقم <a> شرایط و ضوابط </a></label>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">شروع کنید</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer grey darken-1">
                        <div class="text-center">آیا حساب کاربری دارید؟ <a href="{{route('login')}}"><b>ورود به حساب</b></a></div>
                        <div class="text-center mb-1">رمز عبور را فراموش کرده اید؟ <a><b>بازیابی</b></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Registration Page Ends-->
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="admin/vendors/js/core/jquery-3.3.1.min.js"></script><script src="../app-assets/js/persian-datepicker.min.js"></script>
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
