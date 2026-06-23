<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>پنل مدیریت - @yield('title')</title>
    <link rel="apple-touch-icon" sizes="60x60" href="/admin/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="/admin/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="/admin/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="/admin/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="/admin/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link
        href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/app.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/toastr.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/kamadatepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/dropify.min.css">
    @livewireStyles
</head>

<body data-col="2-columns" class=" 2-columns ">
    <div class="wrapper">


        @include('admin.sections.header')
        @include('admin.sections.sidebar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @include('admin.sections.footer')
    </div>

    @include('admin.sections.aside')

    <!-- BEGIN VENDOR JS-->
    @livewireScripts
    {{-- @include('sweetalert::alert') --}}
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <style>
        .upload-box {
            width: 100%;
            min-height: 250px;
            border: 2px dashed #0d6efd;
            border-radius: 15px;
            background: #f8f9fa;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: all .3s ease;
            overflow: hidden;
        }

        .upload-box:hover {
            background: #eef5ff;
            border-color: #0b5ed7;
        }

        .upload-content h5 {
            margin-top: 10px;
            font-weight: 600;
        }

        .upload-content p {
            margin: 5px 0;
            color: #6c757d;
        }

        .upload-content small {
            color: #999;
        }

        .upload-icon {
            font-size: 55px;
        }

        #imagePreview {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>
    <script src="/admin/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="/admin/js/persian-datepicker.min.js"></script>
    <script src="/admin/vendors/js/core/popper.min.js"></script>
    <script src="/admin/vendors/js/core/bootstrap.min.js"></script>
    <script src="/admin/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="/admin/vendors/js/prism.min.js"></script>
    <script src="/admin/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="/admin/vendors/js/"></script>
    <script src="/admin/vendors/js/pace/pace.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="/admin/vendors/js/chartist.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="/admin/js/app-sidebar.js"></script>
    <script src="/admin/js/notification-sidebar.js"></script>
    <script src="/admin/js/customizer.js"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="/admin/js/dashboard-ecommerce.js"></script>
    <!-- END PAGE LEVEL JS-->

    <script src="/admin/vendors/js/jqBootstrapValidation.js"></script>
    <script src="/admin/js/form-validation.js"></script>
    <script src="/admin/js/sweetalert2.all.min.js"></script>
    <script src="/admin/js/select2.min.js"></script>
    <script src="/admin/js/tooltip.js"></script>
    <script src="/admin/js/colorpicker.js"></script>
    <script src="/admin/js/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/js/kamadatepicker.holidays.min.js"></script>
    <script src="/admin/js/kamadatepicker.min.js"></script>
    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script src="/admin/ckeditor/ckeditorConf.js"></script>
    <script src="/admin/js/dropify.min.js"></script>


    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                'default': 'فایل را به اینجا بکشید یا کلیک کنید',
                'replace': 'برای جایگزینی فایل را به اینجا بکشید یا کلیک کنید',
                'remove': 'پاک کردن',
                'error': 'با پوزش فراوان، خطایی رخ داده'
            },
            error: {
                'fileSize': 'حجم فایل بیشتر از حد مجاز است (1M).'
            }
        });
    </script>


    <script>
        document.getElementById('inputGroupFile01').addEventListener('change', function() {

            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';

                    document.querySelector('.upload-content').style.display = 'none';
                }

                reader.readAsDataURL(file);
            }
        });
    </script>

    @if(session('success'))

<script>

Swal.fire({
    icon: 'success',
    title: 'موفق',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});

</script>

@endif


    @yield('script')



</body>

</html>
