@extends ('front.layouts.home')

@section ('title')
    سبد خرید
@endsection

@section ('script')
    <!-- from node_modules -->
    <script
        src="https://unpkg.com/@material-tailwind/html@3.0.0-beta.7/dist/material-tailwind.umd.min.js"
        defer
    ></script>
@endsection

@section ('content')
    <style>
        .container {
            max-width: 1420px !important;
        }
    </style>

    @if ($carts->count() > 0)
        @auth
            <main>
                <div class="md:mx-20">
                    <section class="category-banner mt-36 mb-36 md:my-36">
                        <div class="md:pb-10">
                            <ul
                                class="flex gap-x-2.5 text-gray-500 dark:text-gray-100"
                            >
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
        <main class="min-h-[70vh] flex items-center justify-center pt-32 mb-30">
            <div class="container">
                <div
                    class="max-w-xl mx-auto bg-white dark:bg-zinc-900 rounded-[32px] shadow-lg border border-zinc-100 dark:border-zinc-800 p-10 text-center"
                >
                    <div
                        class="mx-auto flex items-center justify-center w-28 h-28 rounded-full bg-orange-100 dark:bg-orange-500/10"
                    >
                        <img
                            src="{{ asset('front/images/e.png') }}"
                            alt="Empty Cart"
                            class="w-16 h-16 object-contain"
                        />
                    </div>

                    <h1
                        class="mt-8 text-3xl font-DanaDemiBold text-zinc-800 dark:text-white"
                    >
                        سبد خرید شما خالی است
                    </h1>

                    <p
                        class="mt-4 text-zinc-500 dark:text-zinc-400 leading-8"
                    >هنوز محصولی به سبد خرید خود اضافه نکرده‌اید. از فروشگاه دیدن کنید و محصولات مورد علاقه‌تان را انتخاب کنید.</p>

                    <div class="mt-10">
                        <a
                            href="{{ route('home.shop') }}"
                            class="inline-flex items-center gap-3 px-8 h-14 rounded-2xl bg-orange-500 text-white hover:bg-orange-600 transition"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12h18M3 12l6-6m-6 6l6 6"
                                />
                            </svg>

                            ادامه خرید
                        </a>
                    </div>
                </div>
            </div>
        </main>
    @endif
@endsection
