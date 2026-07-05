@extends('front.layouts.home')

@section('content')

<main class="mt-40 mb-20">

    <div class="container">

        <div class="grid lg:grid-cols-4 gap-8">

            {{-- Sidebar --}}
            <div>

                @include('front.profile.partials.sidebar')

            </div>

            {{-- Content --}}
            <div class="lg:col-span-3">

                @yield('profile-content')

            </div>

        </div>

    </div>

</main>

@endsection
