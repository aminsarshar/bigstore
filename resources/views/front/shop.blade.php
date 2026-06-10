@extends('front.layouts.home')

@section('title')
    تماس ما
@endsection

@section('content')
    <section class="relative overflow-hidden rounded-[40px] bg-zinc-900 mb-16">

        <div class="absolute inset-0">
            <img src="{{ asset('front/images/about.png') }}" class="w-full h-full object-cover opacity-30">
        </div>

        <div class="absolute inset-0 bg-gradient-to-l from-black/80 via-black/50 to-transparent">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-12 py-20 lg:py-28 mt-40 mb-30">

            <div class="max-w-2xl">

                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-500/20 text-orange-300 mb-6">

                    ☕ فروشگاه گلدن کافی

                </span>

                <h1 class="text-4xl lg:text-6xl font-DanaDemiBold text-white leading-[1.8]">

                    فروشگاه تخصصی
                    <span class="text-orange-400">
                        قهوه و تجهیزات
                    </span>

                </h1>

                <p class="mt-6 text-gray-300 leading-9 text-lg">

                    بهترین دانه‌های قهوه، تجهیزات دم‌آوری، آسیاب، اسپرسوساز و
                    لوازم جانبی را با تضمین کیفیت و ارسال سریع تهیه کنید.

                </p>

            </div>

        </div>

    </section>
    <section class="mb-14">

        <div class="flex flex-wrap justify-center gap-3 mb-12">

            <button data-category="all"
                class="category-btn px-5 py-2.5 rounded-2xl transition
        bg-orange-300 text-white shadow-md">
                همه محصولات
            </button>

            @foreach ($categories as $category)
                <button data-category="{{ $category->id }}"
                    class="category-btn px-5 py-2.5 rounded-2xl transition
            bg-white dark:bg-zinc-700 text-zinc-700 dark:text-white
            hover:bg-orange-300 hover:text-white">

                    {{ $category->name }}

                </button>
            @endforeach

        </div>

    </section>
    <section class="bg-white dark:bg-zinc-800 rounded-[28px] p-5 mb-12 shadow-sm m-14">

        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">

            <input type="text" placeholder="جستجو در محصولات..."
                class="w-full lg:w-96 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-transparent">

            <select class="rounded-xl border border-zinc-200 dark:border-zinc-700">

                <option>
                    جدیدترین
                </option>

                <option>
                    ارزان ترین
                </option>

                <option>
                    گران ترین
                </option>

                <option>
                    پرفروش ترین
                </option>

            </select>

        </div>

    </section>
    <section>
        <div id="category-all" class="category-content">

            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6 lg:m-14">

                @foreach ($products as $product)
                    <div
                        class="group bg-white dark:bg-zinc-700 rounded-[30px] overflow-hidden shadow-sm hover:shadow-xl transition">

                        <div class="overflow-hidden h-64 bg-[#f8f5f0] flex items-center justify-center">

                            <img src="{{ asset('admin/images/products/' . $product->image) }}"
                                class="max-w-full max-h-full object-contain p-2 group-hover:scale-110 transition duration-500">

                        </div>

                        <div class="p-5">

                            <h3 class="font-DanaDemiBold line-clamp-2 min-h-[56px]">

                                {{ $product->title }}

                            </h3>

                            <div class="mt-4 flex justify-between items-center">

                                <span class="text-orange-500 font-DanaDemiBold">

                                    {{ number_format($product->price) }}
                                </span>

                                <span class="text-sm text-gray-400">

                                    تومان
                                </span>

                            </div>

                            <a href=""
                                class="mt-5 flex justify-center items-center h-11 rounded-xl bg-orange-400 text-white hover:bg-orange-500">

                                مشاهده محصول

                            </a>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

        @foreach ($categories as $category)
            <div id="category-{{ $category->id }}" class="category-content hidden">

                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6 lg:m-14">

                    @foreach ($category->Categorychild as $child)
                        @foreach ($child->products as $product)
                            <div
                                class="group bg-white dark:bg-zinc-700 rounded-[28px] overflow-hidden shadow-md hover:shadow-xl transition">

                                <div class="overflow-hidden h-64 bg-[#f8f5f0] flex items-center justify-center">

                                    <img src="{{ asset('admin/images/products/' . $product->image) }}"
                                        class="max-w-full max-h-full object-contain p-2 group-hover:scale-110 transition duration-500">

                                </div>

                                <div class="p-5">

                                    <span class="bg-orange-100 text-orange-500 text-xs px-3 py-1 rounded-full">

                                        {{ $category->name }}

                                    </span>

                                    <h3
                                        class="mt-4 text-sm md:text-base font-DanaDemiBold text-zinc-700 dark:text-white line-clamp-2 min-h-[50px]">

                                        {{ $product->title }}

                                    </h3>

                                    <div class="mt-5 flex justify-between items-center">

                                        <div class="text-orange-500 font-DanaDemiBold">

                                            {{ number_format($product->price) }}

                                            <span class="text-xs">
                                                تومان
                                            </span>

                                        </div>

                                    </div>

                                    <a href="{{ route('single.product', $product->slug) }}"
                                        class="mt-5 flex items-center justify-center h-11 rounded-xl bg-orange-400 hover:bg-orange-500 text-white transition">

                                        مشاهده محصول

                                    </a>

                                </div>

                            </div>
                        @endforeach
                    @endforeach

                </div>

            </div>
        @endforeach

    </section>
    <section class="my-20 rounded-[40px] overflow-hidden bg-gradient-to-r from-orange-400 to-orange-500">

        <div class="grid lg:grid-cols-2 items-center">

            <div class="p-10 lg:p-16 text-white">

                <h2 class="text-4xl font-DanaDemiBold">

                    تازه رُست شده ☕

                </h2>

                <p class="mt-5 leading-9">

                    دانه‌های قهوه تازه برشته شده با عطر و طعم بی‌نظیر،
                    مستقیم از روستر گلدن کافی.

                </p>

            </div>

            <div>

                <img src="{{ asset('front/images/banner/coffee-beans.png') }}" class="w-full h-[350px] object-cover">

            </div>

        </div>

    </section>
@endsection

<style>
    .category-btn.active {
        background: linear-gradient(135deg,
                #fdba74,
                #fb923c);

        color: #fff;

        box-shadow:
            0 10px 30px rgba(251, 146, 60, .35);

        transform: translateY(-3px);
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const buttons = document.querySelectorAll('.category-btn');
        const sections = document.querySelectorAll('.category-content');

        buttons.forEach(btn => {

            btn.addEventListener('click', () => {

                buttons.forEach(b => {
                    b.classList.remove(
                        'bg-orange-300',
                        'text-white',
                        'shadow-md'
                    );

                    b.classList.add(
                        'bg-white',
                        'dark:bg-zinc-700'
                    );
                });

                btn.classList.add(
                    'bg-orange-300',
                    'text-white',
                    'shadow-md'
                );

                sections.forEach(section => {
                    section.classList.add('hidden');
                });

                document
                    .getElementById(
                        'category-' + btn.dataset.category
                    )
                    .classList.remove('hidden');

            });

        });

    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const buttons = document.querySelectorAll('.category-btn');
        const sliders = document.querySelectorAll('.category-slider');

        buttons.forEach(button => {

            button.addEventListener('click', function() {

                const categoryId = this.dataset.category;

                // حذف اکتیو از همه دکمه‌ها
                buttons.forEach(btn => {
                    btn.classList.remove('active');
                });

                // اکتیو کردن دکمه فعلی
                this.classList.add('active');

                // مخفی کردن همه دسته‌ها
                sliders.forEach(slider => {
                    slider.classList.add('hidden');
                });

                // نمایش دسته انتخاب شده
                document
                    .getElementById('category-' + categoryId)
                    .classList.remove('hidden');

            });

        });

    });
</script>
