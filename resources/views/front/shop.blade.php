@extends ('front.layouts.home')

@section ('title')
    تماس ما
@endsection

@section ('content')
    <style>
        .header {
            display: none;
        }
    </style>
    <section class="relative overflow-hidden rounded-[40px] bg-zinc-900 mb-16">
        <div class="absolute inset-0">
            <img
                src="{{ asset('front/images/about.png') }}"
                class="w-full h-full object-cover opacity-30"
            />
        </div>

        <div
            class="absolute inset-0 bg-gradient-to-l from-black/80 via-black/50 to-transparent"
        ></div>

        <div
            class="relative z-10 max-w-7xl mx-auto px-6 lg:px-12 py-20 lg:py-28 mt-40 mb-30"
        >
            <div class="max-w-2xl">
                <span
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-500/20 text-orange-300 mb-6"
                >
                    ☕ فروشگاه گلدن کافی
                </span>

                <h1
                    class="text-4xl lg:text-6xl font-DanaDemiBold text-white leading-[1.8]"
                >
                    فروشگاه تخصصی
                    <span class="text-orange-400"> قهوه و تجهیزات </span>
                </h1>

                <p class="mt-6 text-gray-300 leading-9 text-lg">بهترین دانه‌های قهوه، تجهیزات دم‌آوری، آسیاب، اسپرسوساز و لوازم جانبی را با تضمین کیفیت و ارسال سریع تهیه کنید.</p>
            </div>
        </div>
    </section>
    <section class="mb-14">
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button
                data-category="all"
                class="category-btn px-5 py-2.5 rounded-2xl transition bg-orange-300 text-white shadow-md"
            >
                همه محصولات
            </button>

            @foreach ($categories as $category)
                <button
                    data-category="{{ $category->id }}"
                    class="category-btn px-5 py-2.5 rounded-2xl transition bg-white dark:bg-zinc-700 text-zinc-700 dark:text-white hover:bg-orange-300 hover:text-white"
                >
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </section>
    <section
        class="bg-white dark:bg-zinc-800 rounded-[28px] p-5 mb-12 shadow-sm m-14"
    >
        <div
            class="flex flex-col lg:flex-row gap-4 items-center justify-between"
        >
            <input
                type="text"
                placeholder="جستجو در محصولات..."
                class="w-full lg:w-96 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-transparent"
            />

            <select
                class="rounded-xl border border-zinc-200 dark:border-zinc-700"
            >
                <option>جدیدترین</option>

                <option>ارزان ترین</option>

                <option>گران ترین</option>

                <option>پرفروش ترین</option>
            </select>
        </div>
    </section>
    <section>
        <div id="category-all" class="category-content">
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 px-4 lg:px-14"
            >
                @foreach ($products as $product)
                    <div
                        class="hidden md:block group relative overflow-hidden rounded-[28px] bg-white dark:bg-zinc-800 borّder border-zinc-100 dark:border-zinc-700 shadow-sm hover:shadow-2xl transition-all duration-500"
                    >
                        {{-- Image --}}
                        <div
                            class="relative aspect-square overflow-hidden bg-gradient-to-br from-[#faf7f2] to-[#f3ede4]"
                        >
                            <img
                                src="{{ asset('admin/images/products/' . $product->image) }}"
                                alt="{{ $product->title }}"
                                class="h-full w-full object-contain p-5 rounded-lg transition-all duration-700 group-hover:scale-110 group-hover:rotate-2"
                            />

                            {{-- Floating Badge --}}
                            <div
                                class="absolute top-3 right-3 rounded-full bg-white/90 dark:bg-zinc-900/90 backdrop-blur-md px-3 py-1 text-[11px] font-bold text-orange-500 shadow-md"
                            >
                                ☕ قهوه
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-4 md:p-5">
                            {{-- Price --}}
                            <div class="mt-4 flex items-end justify-between">
                                <h3
                                    class="text-sm md:text-base font-DanaDemiBold text-zinc-800 dark:text-white line-clamp-2 min-h-[52px]"
                                >
                                    {{ $product->title }}
                                </h3>
                                <div>
                                    <div
                                        class="text-xl md:text-2xl font-black text-orange-500"
                                    >
                                        {{ number_format($product->price) }}
                                    </div>

                                    <span class="text-xs text-zinc-400">
                                        تومان
                                    </span>
                                </div>
                            </div>
                            <div class="mt-5 flex items-center gap-3">
                                {{-- مشاهده محصول --}}
                                <a
                                    href="{{ route('single.product', $product->slug) }}"
                                    class="flex-1 h-11 rounded-xl border border-orange-400 text-orange-500 hover:bg-orange-50 transition flex items-center justify-center font-DanaMedium"
                                >
                                    مشاهده محصول
                                </a>

                                {{-- افزودن به سبد خرید --}}
                                @livewire ('front.add-to-cart-button', ['product' => $product], key('cart-'.$product->id))
                            </div>
                        </div>
                    </div>

                    <div class="block md:hidden">
                        <div
                            class="flex gap-3 p-3 rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-sm"
                        >
                            {{-- Content --}}
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="text-sm font-bold text-zinc-800 dark:text-white line-clamp-2"
                                >
                                    {{$product->title}}
                                </h3>

                                <p
                                    class="mt-1 text-xs text-zinc-500 dark:text-zinc-400"
                                >قهوه سینگل اورجین</p>

                                <div class="mt-4">
                                    <div
                                        class="text-lg font-black text-orange-500"
                                    >
                                        {{ number_format($product->price) }}
                                    </div>

                                    <span class="text-xs text-zinc-400">
                                        تومان
                                    </span>
                                </div>

                                <a
                                    href="{{ route('single.product', $product->slug) }}"
                                    class="mt-4 flex items-center justify-center gap-2 h-10 px-4 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-sm transition-all hover:bg-orange-500 hover:text-white"
                                >
                                    مشاهده محصول

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v16m8-8H4"
                                        />
                                    </svg>
                                </a>
                            </div>

                            {{-- Image --}}
                            <div
                                class="shrink-0 w-28 h-28 overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-800"
                            >
                                <img
                                    src="{{ asset('admin/images/products/' . $product->image) }}"
                                    alt="{{ $product->title }}"
                                    class="h-full w-full object-contain transition-all duration-700 group-hover:scale-110 group-hover:rotate-2"
                                />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($categories as $category)
            <div
                id="category-{{ $category->id }}"
                class="category-content hidden"
            >
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 px-4 lg:px-14"
                >
                    @foreach ($category->Categorychild as $child)
                        @foreach ($child->products as $product)
                            <div
                                class="group relative overflow-hidden rounded-[28px] hidden md:block m-5 bg-white dark:bg-zinc-800 border border-zinc-100 dark:border-zinc-700 shadow-sm hover:shadow-2xl transition-all duration-500"
                            >
                                {{-- Image --}}
                                <div
                                    class="relative aspect-square overflow-hidden bg-gradient-to-br from-[#faf7f2] to-[#f3ede4]"
                                >
                                    <img
                                        src="{{ asset('admin/images/products/' . $product->image) }}"
                                        alt="{{ $product->title }}"
                                        class="h-full w-full object-contain p-5 transition-all duration-700 group-hover:scale-110 group-hover:rotate-2"
                                    />

                                    {{-- Floating Badge --}}
                                    <div
                                        class="absolute top-3 right-3 rounded-full bg-white/90 dark:bg-zinc-900/90 backdrop-blur-md px-3 py-1 text-[11px] font-bold text-orange-500 shadow-md"
                                    >
                                        ☕ قهوه
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-4 md:p-5">
                                    {{-- Price --}}
                                    <div
                                        class="mt-4 flex items-end justify-between"
                                    >
                                        <h3
                                            class="text-sm md:text-base font-DanaDemiBold text-zinc-800 dark:text-white line-clamp-2 min-h-[52px]"
                                        >
                                            {{ $product->title }}
                                        </h3>
                                        <div>
                                            <div
                                                class="text-xl md:text-2xl font-black text-orange-500"
                                            >
                                                {{ number_format($product->price) }}
                                            </div>

                                            <span class="text-xs text-zinc-400">
                                                تومان
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-5 flex items-center gap-3">
                                        {{-- مشاهده محصول --}}
                                        <a
                                            href="{{ route('single.product', $product->slug) }}"
                                            class="flex-1 h-11 rounded-xl border border-orange-400 text-orange-500 hover:bg-orange-50 transition flex items-center justify-center font-DanaMedium"
                                        >
                                            مشاهده محصول
                                        </a>

                                        {{-- افزودن به سبد خرید --}}
                                        @livewire ('front.add-to-cart-button', ['product' => $product], key('cart-'.$product->id))
                                    </div>
                                </div>
                            </div>
                            <div class="block md:hidden">
                                <div
                                    class="flex gap-3 p-3 rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-sm"
                                >
                                    {{-- Content --}}
                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="text-sm font-bold text-zinc-800 dark:text-white line-clamp-2"
                                        >
                                            {{$product->title}}
                                        </h3>

                                        <p
                                            class="mt-1 text-xs text-zinc-500 dark:text-zinc-400"
                                        >قهوه سینگل اورجین</p>

                                        <div class="mt-4">
                                            <div
                                                class="text-lg font-black text-orange-500"
                                            >
                                                {{ number_format($product->price) }}
                                            </div>

                                            <span class="text-xs text-zinc-400">
                                                تومان
                                            </span>
                                        </div>

                                        <a
                                            href="{{ route('single.product', $product->slug) }}"
                                            class="mt-4 flex items-center justify-center gap-2 h-10 px-4 rounded-xl bg-zinc-100 dark:bg-zinc-800 text-sm transition-all hover:bg-orange-500 hover:text-white"
                                        >
                                            مشاهده محصول

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 4v16m8-8H4"
                                                />
                                            </svg>
                                        </a>
                                    </div>

                                    {{-- Image --}}
                                    <div
                                        class="shrink-0 w-28 h-28 overflow-hidden rounded-2xl bg-zinc-100 dark:bg-zinc-800"
                                    >
                                        <img
                                            src="{{ asset('admin/images/products/' . $product->image) }}"
                                            alt="{{ $product->title }}"
                                            class="h-full w-full object-cover"
                                        />
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endforeach
                </div>
            </div>

        @endforeach
    </section>
    <section
        class="my-20 rounded-[40px] overflow-hidden bg-gradient-to-r from-orange-400 to-orange-500"
    >
        <div class="grid lg:grid-cols-2 items-center">
            <div class="p-10 lg:p-16 text-white">
                <h2 class="text-4xl font-DanaDemiBold">تازه رُست شده ☕</h2>

                <p class="mt-5 leading-9">دانه‌های قهوه تازه برشته شده با عطر و طعم بی‌نظیر، مستقیم از روستر گلدن کافی.</p>
            </div>

            <div>
                <img
                    src="{{ asset('front/images/banner/coffee-beans.png') }}"
                    class="w-full h-[350px] object-cover"
                />
            </div>
        </div>
    </section>
@endsection

<style>
    .category-btn.active {
        background: linear-gradient(135deg, #fdba74, #fb923c);

        color: #fff;

        box-shadow: 0 10px 30px rgba(251, 146, 60, 0.35);

        transform: translateY(-3px);
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".category-btn");
        const sections = document.querySelectorAll(".category-content");

        buttons.forEach((btn) => {
            btn.addEventListener("click", () => {
                buttons.forEach((b) => {
                    b.classList.remove(
                        "bg-orange-300",
                        "text-white",
                        "shadow-md",
                    );

                    b.classList.add("bg-white", "dark:bg-zinc-700");
                });

                btn.classList.add("bg-orange-300", "text-white", "shadow-md");

                sections.forEach((section) => {
                    section.classList.add("hidden");
                });

                document
                    .getElementById("category-" + btn.dataset.category)
                    .classList.remove("hidden");
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".category-btn");
        const sliders = document.querySelectorAll(".category-slider");

        buttons.forEach((button) => {
            button.addEventListener("click", function () {
                const categoryId = this.dataset.category;

                // حذف اکتیو از همه دکمه‌ها
                buttons.forEach((btn) => {
                    btn.classList.remove("active");
                });

                // اکتیو کردن دکمه فعلی
                this.classList.add("active");

                // مخفی کردن همه دسته‌ها
                sliders.forEach((slider) => {
                    slider.classList.add("hidden");
                });

                // نمایش دسته انتخاب شده
                document
                    .getElementById("category-" + categoryId)
                    .classList.remove("hidden");
            });
        });
    });
</script>
