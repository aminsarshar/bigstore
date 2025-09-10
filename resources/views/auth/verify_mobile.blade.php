<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('front/styles/app.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('front/styles/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/styles/log.css') }}" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('front/styles/vendor/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <!-- Start main-content -->
        <main class="main-content dt-sl mt-4 mb-3">
            <div class="container main-container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                        <div class="logo-area text-center mb-3">
                            <a href="#"><img src="./assets/img/logo.png" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="auth-wrapper form-ui border pt-4">
                            <div class="section-title title-wide mb-1 no-after-title-wide">
                                <h2 class="font-weight-bold">تایید شماره</h2>
                            </div>
                            <div class="message-light">
                                برای شماره همراه 09999999999 کد تایید ارسال گردید
                                <a href="#" class="btn-link-border">
                                    ویرایش شماره
                                </a>
                            </div>
                            <form action="{{route('verify.code')}}" method="post">
                                @csrf
                                <div class="form-row-title">
                                    <h3>کد تایید را وارد کنید</h3>
                                </div>
                                <div class="form-row">
                                    <div class="numbers-verify">
                                        <div class="lines-number-input">
                                            <input name="code[]" type="text" class="line-number" maxlength="1" autofocus="">
                                            <input name="code[]" type="text" class="line-number" maxlength="1">
                                            <input name="code[]" type="text" class="line-number" maxlength="1">
                                            <input name="code[]" type="text" class="line-number" maxlength="1">
                                            <input name="code[]" type="text" class="line-number" maxlength="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="d-flex align-items-center">
                                        <span class="text-primary btn-link-border ml-1">دریافت مجدد کد تایید</span>
                                        <span>(</span>
                                        <p id="countdown-verify-end"></p>
                                        <span>)</span>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <button type="submit" class="btn-primary-cm btn-with-icon mx-auto w-100">
                                        <i class="fad fa-arrow-right"></i>
                                        تایید و ادامه
                                    </button>
                                </div>
                            </form>
                            <div class="form-footer mt-3">
                                <div>
                                    <span class="font-weight-bold">کاربر جدید هستید؟</span>
                                    <a href="#" class="mr-3 mt-2">ثبت نام در کدیادکالا</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End main-content -->
        <!-- Start mini-footer -->
        <footer class="mini-footer dt-sl">
            <div class="container main-container">
                <div class="row">
                    <div class="col-12">
                        <ul class="mini-footer-menu">
                            <li><a href="#">درباره کدیادکالا</a></li>
                            <li><a href="#">فرصت های شغلی</a></li>
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">همکاری با سازمان ها</a></li>
                        </ul>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="footer-light-text">

                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <div class="copy-right-mini-footer">
                            Copyright © 2019 codeyadkala
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End mini-footer -->

    </div>

    <style>

.numbers-verify {
    width: 100%;
}

.numbers-verify .lines-number-input {
    border-radius: 5px;
    background: #fff;
    border: 1px solid #eee;
    color: #717171;
    font-size: 14px;
    line-height: 1.571;
    padding: 11px 12px;
    width: 100%;
    text-align: center;
    direction: ltr;
}

.numbers-verify .lines-number-input .line-number {
    display: inline-block;
    width: 40px;
    height: 30px;
    border: 0;
    border-bottom: 4px solid #c8c8c8;
    margin: 0 7px;
    outline: none;
    text-align: center;
    font-weight: bold;
    font-size: 18px;
}

#countdown-verify-end {
    display: inline-block;
    margin-bottom: 0;
}

#countdown-verify-end span {
    float: left;
}

#countdown-verify-end span.day {
    display: none;
}

#countdown-verify-end span.hour {
    display: none;
}

#countdown-verify-end a.btn-link-border {
    float: right;
    margin-top: -1px;
    color: #f7858d;
    font-weight: bold;
}

#countdown-verify-end a.btn-link-border:after {
    border-color: #f7858d;
}


.auth-wrapper {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
}

.auth-wrapper .section-title {
    padding: 0 15px;
}

.auth-wrapper .form-footer {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    background: rgba(97, 224, 0, 0.08);
    padding: 25px 0;
}

    </style>



    <script>

  /* ************** verify-phone-number */
  if ($("#countdown-verify-end").length) {
    var $countdownOptionEnd = $("#countdown-verify-end");

    $countdownOptionEnd.countdown({
      date: new Date().getTime() + 120 * 1000, // 2 minute later
      text: '<span class="day">%s</span><span class="hour">%s</span><span>: %s</span><span>%s</span>',
      end: function () {
        $countdownOptionEnd.html(
          "<a href='' class='btn-link-border'>ارسال مجدد</a>"
        );
      },
    });

    $(".line-number").keyup(function () {
      $(this).next().focus();
    });
  }
    </script>

{{-- <script src="{{asset('front/scripts/app.js')}}"></script> --}}
<script src="{{asset('front/scripts/swiper-bundle.min.js')}}"></script>
<script src="{{asset('front/scripts/countdown.js')}}"></script>
<script src="{{asset('front/scripts/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('front/scripts/log.js')}}"></script>
<script src="{{asset('front/scripts/vendor/popper.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/bootstrap.min.js')}}"></script>
<!-- Plugins -->
<script src="{{asset('front/scripts/vendor/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/owl.carousel.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/owl.carousel2.thumbs.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/nouislider.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/jquery.horizontalmenu.js')}}"></script>
<script src="{{asset('front/scripts/vendor/jquery-stack-menu.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/countdown.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/wNumb.js')}}"></script>
<script src="{{asset('front/scripts/vendor/ResizeSensor.min.js')}}"></script>
<script src="{{asset('front/scripts/vendor/theia-sticky-sidebar.min.js')}}"></script>
</body>
</html>
