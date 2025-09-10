@extends('front.layouts.home')

@section('title')
    سبد خرید
@endsection

@section('script')
    <!-- from node_modules -->
    <script src="https://unpkg.com/@material-tailwind/html@3.0.0-beta.7/dist/material-tailwind.umd.min.js" defer></script>
@endsection


@section('content')
    <style>
        .container {
            max-width: 1420px !important;
        }


    </style>

    @auth
    @if (!count($carts) == 0)
        <main>
            <div class="md:mx-20">
                <section class="category-banner mt-36 mb-36 md:my-36">
                    <div class="md:pb-10">
                        <ul class="flex gap-x-2.5 text-gray-500 dark:text-gray-100">
                            <li><a href="">خانه</a></li>
                            /
                            <li><a href="">سبد خرید</a></li>
                        </ul>
                    </div>

                    <livewire:front.carts.cart-detail :carts="$carts" />
                </section>
            </div>
        </main>
    @endauth
    @else
        <main>

            <div>
                <section>
                    <div class="container">
                        <div class="m-auto mt-40 mb-40">
                            <img src="{{ url('front/images/e.png') }}" alt="" width="40%" class="m-auto">
                            <h1 class="text-center text-lg">
                                سبد خرید شما خالی میباشد!
                            </h1>
                        </div>

                    </div>
                </section>
            </div>
        </main>
    @endif
@endsection
