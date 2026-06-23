@extends('front.layouts.home')

@section('title')
    صفحه اصلی
@endsection

@section('content')
    <main id="products-section2">

        @include('front.sections.hero')

        @include('front.sections.best-selling')

        {{-- @include('front.sections.products') --}}

        {{-- <section class="best-selling my-8 md:my-20 bg-orange-200 p-14 rounded-lg h-[630px]">
            <div class="md:mx-30">
                <!-- Section Head -->
                <div class="flex justify-between items-end mb-5 md:mb-12">
                    <div>
                        <span class="section-subtitle">پیشنهاد قهوه خور ها ...</span>
                    </div>
                    <div class="flex gap-x-3 md:gap-x-[18px]">
                        <div class="swiper-button-prev-custom">
                            <svg class="w-5 h-5 md:w-[26px] md:h-[26px]">
                                <use href="#chevron-right-mini"></use>
                            </svg>
                        </div>
                        <div class="swiper-button-next-custom">
                            <svg class="w-5 h-5 md:w-[26px] md:h-[26px]">
                                <use href="#chevron-left-mini"></use>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="" style="height: 460px !important;background: #fed7aa !important">
                            <img class="w-[250px] h-[400px]" src="{{ asset('admin/images/amazingv2.png') }}"
                                alt="" style="background: #fed7aa !important">
                        </div>


                        @foreach ($special_products as $special_product)
                            <div class="swiper-slide rounded-2xl" style="height:460px !important">
                                <div class="w-100 h-full text-right">
                                    <a href="{{ route('single.product', $special_product->product->slug) }}">
                                        <div class="relative mb-2 md:mb-5">
                                            <img src="{{ asset('admin/images/products/' . $special_product->product->image) }}"
                                                alt="product-1"
                                                class="w-full h-[260px] md:w-auto mx-auto transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300">
                                            @if ($special_product->product->discount != 0)
                                                <span
                                                    class="absolute top-1.5 right-1.5 font-DanaDemiBold text-xs md:text-base text-white dark:text-zinc-700 px-2.5 md:px-3.5 rounded-full h-5 md:h-[30px] block bg-orange-300 leading-[25px] md:leading-[34px]">
                                                    {{ $special_product->product->discount }} %
                                                </span>
                                            @endif
                                        </div>
                                        <h5
                                            class="font-DanaMedium text-sm md:text-xl text-zinc-700 dark:text-white line-clamp-2 md:min-h-[56px] min-h-[40px]">
                                            {{ $special_product->product->title }}</h5>
                                        <div class="flex gap-x-2 md:gap-x-2.5 mt-1.5 md:mt-2.5">
                                            <div class="text-teal-600 dark:text-emerald-500">
                                                <span
                                                    class="text-base md:text-xl font-DanaDemiBold">{{ number_format($special_product->price) }}</span>
                                                <span class="text-xs md:text-sm tracking-tightest">تومان</span>
                                            </div>
                                            <div class="offer">
                                                <span
                                                    class="text-xs md:text-xl">{{ number_format($special_product->main_price) }}</span>
                                                <span
                                                    class="hidden lg:inline-block text-xs md:text-sm tracking-tightest">تومان</span>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between mt-2.5">
                                            <div class="flex gap-x-2 md:gap-x-3">
                                                <span
                                                    class="flex-center bg-gray-100 text-gray-400 hover:text-white dark:bg-zinc-800 hover:bg-teal-600 hover:dark:bg-emerald-500 w-[26px] h-[26px] md:w-9 md:h-9 rounded-full cursor-pointer">
                                                    <svg class="w-4 h-4 md:w-[22px] md:h-[22px]">
                                                        <use href="#shopping-cart"></use>
                                                    </svg>
                                                </span>


                                                <span
                                                    class="flex-center text-gray-400 hover:text-teal-600 dark:hover:text-emerald-500 w-[26px] h-[26px] md:w-9 md:h-9 rounded-full cursor-pointer">
                                                    <svg class="w-4 h-4 md:w-6 md:h-6">
                                                        <use href="#arrows-right-left"></use>
                                                    </svg>
                                                </span>

                                            </div>
                                            <div class="flex text-yellow-400">
                                                <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-300 dark:text-gray-400">
                                                    <use href="#star"></use>
                                                </svg>
                                                <svg class="w-4 h-4 md:w-6 md:h-6">
                                                    <use href="#star"></use>
                                                </svg>
                                                <svg class="w-4 h-4 md:w-6 md:h-6">
                                                    <use href="#star"></use>
                                                </svg>
                                                <svg class="w-4 h-4 md:w-6 md:h-6">
                                                    <use href="#star"></use>
                                                </svg>
                                                <svg class="w-4 h-4 md:w-6 md:h-6">
                                                    <use href="#star"></use>
                                                </svg>
                                            </div>
                                        </div>



                                    </a>
                                </div>
                            </div>
                        @endforeach



                    </div>

                </div>
            </div>
        </section> --}}

        @include('front.sections.category-banner')

        @include('front.sections.coffee-club')

        @include('front.sections.blogs')

        @include('front.sections.contact-us')

        @include('front.sections.services')














    </main>


    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: -150px
        }

        /* موبایل */
        @media (max-width: 768px) {
            .swiper-slide {
                margin-top: -70px;
            }
        }

        .swiper-slide img {
            display: block;

            object-fit: cover;
        }

        .swiper {
            margin-left: auto;
            margin-right: auto;

        }
    </style>

    <script src="{{ asset('front/scripts/swiper-bundle.min.js') }}"></script>

    <!-- Initialize Swiper -->

    <script>
        const swipers = document.querySelectorAll('.categorySwiper');

        swipers.forEach(swiper => {
            new Swiper(swiper, {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,

                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },

                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 14,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                }
            });
        });

        var swiper2 = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        document.addEventListener("DOMContentLoaded", () => {

            const buttons = document.querySelectorAll(".category-btn");
            const sliders = document.querySelectorAll(".category-slider");

            buttons.forEach(button => {

                button.addEventListener("click", function() {

                    const categoryId = this.dataset.category;

                    // حذف اکتیو از همه دکمه‌ها
                    buttons.forEach(btn => {
                        btn.classList.remove(
                            "bg-orange-300",
                            "text-white",
                            "shadow-md"
                        );

                        btn.classList.add(
                            "bg-zinc-100",
                            "dark:bg-zinc-700"
                        );
                    });

                    // اکتیو کردن دکمه فعلی
                    this.classList.remove(
                        "bg-zinc-100",
                        "dark:bg-zinc-700"
                    );

                    this.classList.add(
                        "bg-orange-300",
                        "text-white",
                        "shadow-md"
                    );

                    // مخفی کردن همه اسلایدرها
                    sliders.forEach(slider => {
                        slider.classList.add("hidden");
                    });

                    // نمایش اسلایدر مربوطه
                    document
                        .getElementById(`category-${categoryId}`)
                        .classList.remove("hidden");

                });

            });

        });
    </script>
@endsection
