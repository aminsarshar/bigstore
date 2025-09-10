<body>

    @include('front.sections.header')

    @yield('content')

    @include('front.sections.footer')


    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>
