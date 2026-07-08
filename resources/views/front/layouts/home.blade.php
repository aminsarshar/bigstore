<body>

    @if (!request()->routeIs([
    'login',
    'register',
    'password.request',
    'password.reset',
    'verification.notice',
    'verify.mobile'
]))
    @include('front.sections.header')
@endif

    @yield('content')


    @if (!request()->routeIs([
    'login',
    'register',
    'password.request',
    'password.reset',
    'verification.notice',
    'verify.mobile'
]))
    @include('front.sections.footer')
@endif

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>
