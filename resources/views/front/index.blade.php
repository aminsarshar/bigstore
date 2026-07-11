@extends ('front.layouts.home')

@section ('title')
    صفحه اصلی
@endsection

@section ('content')
    <main id="products-section2">
        @include ('front.sections.hero')

        @include ('front.sections.best-selling')

        {{-- @include('front.sections.products') --}}

        @include ('front.sections.category-banner')

        @include ('front.sections.coffee-club')

        @include ('front.sections.blogs')

        @include ('front.sections.contact-us')

        @include ('front.sections.services')
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
            margin-top: -150px;
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
        const swipers = document.querySelectorAll(".categorySwiper");

        swipers.forEach((swiper) => {
            new Swiper(swiper, {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,

                navigation: {
                    nextEl: ".swiper-button-next-custom",
                    prevEl: ".swiper-button-prev-custom",
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
                },
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

            buttons.forEach((button) => {
                button.addEventListener("click", function () {
                    const categoryId = this.dataset.category;

                    // حذف اکتیو از همه دکمه‌ها
                    buttons.forEach((btn) => {
                        btn.classList.remove(
                            "bg-orange-300",
                            "text-white",
                            "shadow-md",
                        );

                        btn.classList.add("bg-zinc-100", "dark:bg-zinc-700");
                    });

                    // اکتیو کردن دکمه فعلی
                    this.classList.remove("bg-zinc-100", "dark:bg-zinc-700");

                    this.classList.add(
                        "bg-orange-300",
                        "text-white",
                        "shadow-md",
                    );

                    // مخفی کردن همه اسلایدرها
                    sliders.forEach((slider) => {
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
