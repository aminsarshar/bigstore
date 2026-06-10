<div class="relative tab-group">
    <div class="flex bg-slate-100 p-0.5 relative rounded-lg" role="tablist">
        <div
            class="absolute top-1 left-0.5 h-8 bg-white rounded-md shadow-sm transition-all duration-300 transform scale-x-0 translate-x-0 tab-indicator z-0">
        </div>
        <style>
            .active {
                border-bottom: 1px solid rgb(253 186 116)
            }
        </style>
        <a href="#"
            class="tab-link text-sm active inline-block py-2 px-4 text-slate-800 transition-all duration-300 relative z-1 mr-1"
            data-tab-target="tab1-group">
            سبد خرید
            <span class="inset-ring inset-ring-gray-500/10">{{ count($carts) }}</span>
        </a>
        <a href="#"
            class="tab-link text-sm inline-block py-2 px-4 text-slate-800 transition-all duration-300 relative z-1 mr-1"
            data-tab-target="tab2-group">
            لیست خرید بعدی
            <span>{{ count($reserved_carts) }}</span>
        </a>
    </div>
    <div class="mt-4 tab-content-container">
        <div id="tab1-group" class="tab-content text-slate-800 block">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                <!-- ProductsSection -->

                <div class="md:col-span-2 bg-white dark:bg-zinc-700 p-8 rounded-md shadow-md">
                    <section class="" id="products-section">
                        <div class="container">
                            <!-- Section Head -->
                            <div
                                class="flex justify-between items-end mb-5 md:mb-12 bg-white dark:bg-zinc-700 shadow-md rounded-md p-4">
                                <div>
                                    <select name="" id="" aria-placeholder="مرتب سازی"
                                        class="bg-gray-100 dark:bg-zinc-700 dark:text-white px-[7px] py-[7px] outline-none rounded-md border border-gray-200 dark:border-zinc-800 cursor-pointer">
                                        <option value="" disabled selected>مرتب سازی</option>
                                        <option value="">کمترین قیمت</option>
                                        <option value="">بیشترین قیمت</option>
                                        <option value="">قدیمی ترین</option>
                                        <option value="">جدید ترین</option>
                                    </select>
                                </div>
                                <a href="#" class="section-link">
                                    <span class="hidden md:inline-block">مشاهده همه نتایج</span>
                                    <span class="inline-block md:hidden">مشاهده همه</span>
                                </a>
                            </div>

                            <!-- Section Body -->
                            <div
                                class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-3.5 md:gap-5 child:md:p-5 child:p-2 child:bg-white child:dark:bg-zinc-700 child:rounded-xl child:dark:shadow-2xl">

                                @foreach ($carts as $cart)
                                    <div
                                        class="bg-white dark:bg-zinc-700 rounded-[28px] p-4 md:p-6 shadow-sm hover:shadow-xl transition-all duration-300">

                                        <div class="flex flex-col lg:flex-row gap-6">

                                            <!-- تصویر -->
                                            <div
                                                class="w-[100px] h-[100px] md:w-[130px] md:h-[130px]
                                                shrink-0 rounded-2xl overflow-hidden
                                                bg-zinc-50 dark:bg-zinc-800 border border-zinc-100 dark:border-zinc-600">

                                                <img src="{{ url('admin/images/products/' . $cart->product->image) }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                                            </div>

                                            <!-- اطلاعات -->
                                            <div class="flex-1 flex flex-col justify-between">

                                                <div>

                                                    <h3
                                                        class="text-lg md:text-2xl font-DanaDemiBold text-zinc-800 dark:text-white leading-9">

                                                        {{ $cart->product->title }}

                                                    </h3>

                                                    <div class="flex flex-wrap gap-3 mt-4">

                                                        <span
                                                            class="px-4 py-2 rounded-xl bg-orange-50 text-orange-500 text-sm">

                                                            🎨 رنگ:
                                                            {{ $cart->color->name }}

                                                        </span>

                                                        <span
                                                            class="px-4 py-2 rounded-xl bg-emerald-50 text-emerald-600 text-sm">

                                                            🛡️
                                                            {{ $cart->guaranty->name }}

                                                        </span>

                                                    </div>

                                                </div>

                                                <!-- پایین کارت -->
                                                <div
                                                    class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5 mt-8">

                                                    <!-- تعداد -->
                                                    <div
                                                        class="flex items-center gap-2 bg-zinc-100 dark:bg-zinc-800 rounded-2xl p-2 w-fit w-[24%]">

                                                        <button
                                                            wire:click="decreaseCart({{ $cart->product_id }},{{ $cart->color_id }},{{ $cart->guaranty_id }})"
                                                            class="w-10 h-10 rounded-xl bg-white dark:bg-zinc-700 shadow flex items-center justify-center">

                                                            -

                                                        </button>

                                                        <span class="w-10 text-center font-bold text-lg">

                                                            {{ $cart->count }}

                                                        </span>

                                                        <button
                                                            wire:click="increaseCart({{ $cart->product_id }},{{ $cart->color_id }},{{ $cart->guaranty_id }})"
                                                            class="w-10 h-10 rounded-xl bg-orange-400 text-white flex items-center justify-center">

                                                            +

                                                        </button>

                                                    </div>

                                                    <!-- اکشن ها -->
                                                    <div class="flex flex-wrap items-center gap-3">

                                                        <button wire:click="moveToReserveCart({{ $cart->id }})"
                                                            class="h-11 px-5 rounded-xl bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 transition">

                                                            ذخیره برای بعد

                                                        </button>

                                                        <button wire:click="deleteCart({{ $cart->id }})"
                                                            class="h-11 px-5 rounded-xl bg-red-50 text-red-500 hover:bg-red-100 transition">

                                                            حذف

                                                        </button>

                                                    </div>

                                                    <!-- قیمت -->
                                                    <div class="text-left">

                                                        <div class="text-xs text-zinc-400 mb-1">

                                                            مبلغ کالا

                                                        </div>

                                                        <div class="text-2xl font-DanaDemiBold text-orange-500">

                                                            {{ number_format($cart->ProductPrice($cart->product_id, $cart->color_id, $cart->guaranty_id)) }}

                                                            <span class="text-sm">

                                                                تومان

                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </section>
                </div>

                <!-- BuyButtonSection -->

                <div class="flex flex-col">
                    <div class="md:w-[70%]">
                        <div
                            class="rounded-xl border border-orange-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/20 shadow-md p-4">

                            <!-- Meta Info -->
                            <ul
                                class="space-y-3 text-sm text-gray-600 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700 pb-4">

                                <li class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <!-- icon -->
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875..." />
                                        </svg>
                                        <span>دسته‌بندی</span>
                                    </div>
                                    <span class="text-gray-500">قهوه عربیکا</span>
                                </li>

                                <li class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75..." />
                                        </svg>
                                        <span>گارانتی</span>
                                    </div>
                                    <span class="text-gray-500">دارد</span>
                                </li>

                                <li class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318..." />
                                        </svg>
                                        <span>برچسب</span>
                                    </div>
                                    <div class="flex flex-wrap gap-1 text-gray-500">
                                        <span>قهوه</span>
                                        <span>عربیکا</span>
                                    </div>
                                </li>

                            </ul>

                            <!-- Guarantee Banner -->
                            <div
                                class="flex items-center gap-2 py-4 border-b border-gray-200 dark:border-gray-700 text-gray-600 dark:text-white text-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75..." />
                                </svg>
                                <span>گارانتی اصالت و سلامت فیزیکی کالا</span>
                            </div>

                            <!-- Price Section -->
                            <ul class="space-y-2 py-4 border-b border-gray-200 dark:border-gray-700">

                                <li class="flex justify-between text-gray-600 dark:text-gray-200 font-medium">
                                    <span>مبلغ کل</span>
                                    <span>
                                        {{ number_format($total_price) }} تومان
                                    </span>
                                </li>

                                <li class="flex justify-between text-orange-400 font-semibold">
                                    <span>سود شما از خرید</span>
                                    <span>
                                        {{ number_format($discount_price) }} تومان
                                    </span>
                                </li>

                                <li class="flex justify-between text-gray-500">
                                    <span>هزینه ارسال</span>
                                    <span>2,850,000 تومان</span>
                                </li>

                            </ul>

                            <!-- Options -->
                            <div class="flex flex-col md:flex-row gap-4 py-4 text-sm">

                                <div class="flex-1">
                                    <label class="block mb-1 text-gray-600 dark:text-gray-300">نوع آسیاب</label>
                                    <select
                                        class="w-full rounded-lg border border-orange-200 dark:border-gray-700 bg-white dark:bg-zinc-800 p-2 focus:outline-none">
                                        <option>انتخاب کنید</option>
                                        <option>ریز</option>
                                        <option>درشت</option>
                                    </select>
                                </div>

                                <div class="flex-1">
                                    <label class="block mb-1 text-gray-600 dark:text-gray-300">تعداد</label>
                                    <input type="number" value="1"
                                        class="w-full rounded-lg border border-orange-200 dark:border-gray-700 bg-white dark:bg-zinc-800 p-2 focus:outline-none" />
                                </div>

                            </div>

                            <!-- CTA -->
                            <a href="{{ route('shipping') }}"
                                class="flex items-center justify-center gap-2 w-full bg-orange-400 hover:bg-orange-500 text-white py-3 rounded-xl transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M..." />
                                </svg>
                                ادامه ثبت سفارش
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab2-group" class="tab-content text-slate-800 hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                <!-- ProductsSection -->

                <div class="md:col-span-2 bg-white dark:bg-zinc-700 p-8 rounded-md shadow-md">
                    <section class="" id="products-section">
                        <div class="container">
                            <!-- Section Head -->
                            <div
                                class="flex justify-between items-end mb-5 md:mb-12 bg-white dark:bg-zinc-700 shadow-md rounded-md p-4">
                                <div>
                                    <select name="" id="" aria-placeholder="مرتب سازی"
                                        class="bg-gray-100 dark:bg-zinc-700 dark:text-white px-[7px] py-[7px] outline-none rounded-md border border-gray-200 dark:border-zinc-800 cursor-pointer">
                                        <option value="" disabled selected>مرتب سازی</option>
                                        <option value="">کمترین قیمت</option>
                                        <option value="">بیشترین قیمت</option>
                                        <option value="">قدیمی ترین</option>
                                        <option value="">جدید ترین</option>
                                    </select>
                                </div>
                                <a wire:click="moveAllToMainCart" href="#" class="section-link">
                                    <span class="hidden md:inline-block">افزودن به سبد خرید</span>
                                    <span class="inline-block md:hidden">مشاهده همه</span>
                                </a>
                            </div>

                            <!-- Section Body -->

                            <div
                                class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-3.5 md:gap-5 child:md:p-5 child:p-2 child:bg-white child:dark:bg-zinc-700 child:rounded-xl child:dark:shadow-2xl">

                                @foreach ($reserved_carts as $cart)
                                    <div
                                        class="bg-white dark:bg-zinc-700 rounded-[28px] p-4 md:p-6 shadow-sm hover:shadow-xl transition-all duration-300">

                                        <div class="flex flex-col lg:flex-row gap-6">

                                            <!-- تصویر -->
                                            <div
                                                class="w-[100px] h-[100px] md:w-[130px] md:h-[130px]
                                                shrink-0 rounded-2xl overflow-hidden
                                                bg-zinc-50 dark:bg-zinc-800 border border-zinc-100 dark:border-zinc-600">

                                                <img src="{{ url('admin/images/products/' . $cart->product->image) }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                                            </div>

                                            <!-- اطلاعات -->
                                            <div class="flex-1 flex flex-col justify-between">

                                                <div>

                                                    <h3
                                                        class="text-lg md:text-2xl font-DanaDemiBold text-zinc-800 dark:text-white leading-9">

                                                        {{ $cart->product->title }}

                                                    </h3>

                                                    <div class="flex flex-wrap gap-3 mt-4">

                                                        <span
                                                            class="px-4 py-2 rounded-xl bg-orange-50 text-orange-500 text-sm">

                                                            🎨 رنگ:
                                                            {{ $cart->color->name }}

                                                        </span>

                                                        <span
                                                            class="px-4 py-2 rounded-xl bg-emerald-50 text-emerald-600 text-sm">

                                                            🛡️
                                                            {{ $cart->guaranty->name }}

                                                        </span>

                                                    </div>

                                                </div>

                                                <!-- پایین کارت -->
                                                <div
                                                    class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5 mt-8">

                                                    <!-- تعداد -->
                                                    <div
                                                        class="flex items-center gap-2 bg-zinc-100 dark:bg-zinc-800 rounded-2xl p-2 w-fit w-[24%]">

                                                        <button
                                                            wire:click="decreaseCart({{ $cart->product_id }},{{ $cart->color_id }},{{ $cart->guaranty_id }})"
                                                            class="w-10 h-10 rounded-xl bg-white dark:bg-zinc-700 shadow flex items-center justify-center">

                                                            -

                                                        </button>

                                                        <span class="w-10 text-center font-bold text-lg">

                                                            {{ $cart->count }}

                                                        </span>

                                                        <button
                                                            wire:click="increaseCart({{ $cart->product_id }},{{ $cart->color_id }},{{ $cart->guaranty_id }})"
                                                            class="w-10 h-10 rounded-xl bg-orange-400 text-white flex items-center justify-center">

                                                            +

                                                        </button>

                                                    </div>

                                                    <!-- اکشن ها -->
                                                    <div class="flex flex-wrap items-center gap-3">

                                                        <button wire:click="moveToReserveCart({{ $cart->id }})"
                                                            class="h-11 px-5 rounded-xl bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 transition">

                                                            ذخیره برای بعد

                                                        </button>

                                                        <button wire:click="deleteCart({{ $cart->id }})"
                                                            class="h-11 px-5 rounded-xl bg-red-50 text-red-500 hover:bg-red-100 transition">

                                                            حذف

                                                        </button>

                                                    </div>

                                                    <!-- قیمت -->
                                                    <div class="text-left">

                                                        <div class="text-xs text-zinc-400 mb-1">

                                                            مبلغ کالا

                                                        </div>

                                                        <div class="text-2xl font-DanaDemiBold text-orange-500">

                                                            {{ number_format($cart->ProductPrice($cart->product_id, $cart->color_id, $cart->guaranty_id)) }}

                                                            <span class="text-sm">

                                                                تومان

                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach



                            </div>

                        </div>
                    </section>
                </div>

                <!-- BuyButtonSection -->

                <div class="flex flex-col">
                    <div class="md:w-[70%]">
                        <div
                            class="rounded-xl border border-orange-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/20 shadow-md p-4">

                            <!-- Meta Info -->
                            <ul
                                class="space-y-3 text-sm text-gray-600 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700 pb-4">

                                <li class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <!-- icon -->
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875..." />
                                        </svg>
                                        <span>دسته‌بندی</span>
                                    </div>
                                    <span class="text-gray-500">قهوه عربیکا</span>
                                </li>

                                <li class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12.75 11.25 15 15 9.75..." />
                                        </svg>
                                        <span>گارانتی</span>
                                    </div>
                                    <span class="text-gray-500">دارد</span>
                                </li>

                                <li class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318..." />
                                        </svg>
                                        <span>برچسب</span>
                                    </div>
                                    <div class="flex flex-wrap gap-1 text-gray-500">
                                        <span>قهوه</span>
                                        <span>عربیکا</span>
                                    </div>
                                </li>

                            </ul>

                            <!-- Guarantee Banner -->
                            <div
                                class="flex items-center gap-2 py-4 border-b border-gray-200 dark:border-gray-700 text-gray-600 dark:text-white text-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75..." />
                                </svg>
                                <span>گارانتی اصالت و سلامت فیزیکی کالا</span>
                            </div>

                            <!-- Price Section -->
                            <ul class="space-y-2 py-4 border-b border-gray-200 dark:border-gray-700">

                                <li class="flex justify-between text-gray-600 dark:text-gray-200 font-medium">
                                    <span>مبلغ کل</span>
                                    <span>
                                        {{ number_format($total_price) }} تومان
                                    </span>
                                </li>

                                <li class="flex justify-between text-orange-400 font-semibold">
                                    <span>سود شما از خرید</span>
                                    <span>
                                        {{ number_format($discount_price) }} تومان
                                    </span>
                                </li>

                                <li class="flex justify-between text-gray-500">
                                    <span>هزینه ارسال</span>
                                    <span>2,850,000 تومان</span>
                                </li>

                            </ul>

                            <!-- Options -->
                            <div class="flex flex-col md:flex-row gap-4 py-4 text-sm">

                                <div class="flex-1">
                                    <label class="block mb-1 text-gray-600 dark:text-gray-300">نوع آسیاب</label>
                                    <select
                                        class="w-full rounded-lg border border-orange-200 dark:border-gray-700 bg-white dark:bg-zinc-800 p-2 focus:outline-none">
                                        <option>انتخاب کنید</option>
                                        <option>ریز</option>
                                        <option>درشت</option>
                                    </select>
                                </div>

                                <div class="flex-1">
                                    <label class="block mb-1 text-gray-600 dark:text-gray-300">تعداد</label>
                                    <input type="number" value="1"
                                        class="w-full rounded-lg border border-orange-200 dark:border-gray-700 bg-white dark:bg-zinc-800 p-2 focus:outline-none" />
                                </div>

                            </div>

                            <!-- CTA -->
                            <a href="{{ route('shipping') }}"
                                class="flex items-center justify-center gap-2 w-full bg-orange-400 hover:bg-orange-500 text-white py-3 rounded-xl transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M..." />
                                </svg>
                                ادامه ثبت سفارش
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>



<style>
    input[type="number"] {
        -webkit-appearance: textfield;
        -moz-appearance: textfield;
        appearance: textfield;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
    }

    .number-input {
        border: 2px solid #ddd;
        display: inline-flex;
    }

    .number-input,
    .number-input * {
        box-sizing: border-box;
    }

    .number-input button {
        outline: none;
        -webkit-appearance: none;
        background-color: transparent;
        border: none;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        cursor: pointer;
        margin: 0;
        position: relative;
    }

    .number-input button:after {
        display: inline-block;
        position: absolute;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: '\f077';
        transform: translate(-50%, -50%) rotate(180deg);
    }

    .number-input button.plus:after {
        transform: translate(-50%, -50%) rotate(0deg);
    }

    .number-input input[type=number] {
        font-family: sans-serif;
        max-width: 3rem;
        padding: .5rem;
        border: solid #ddd;
        border-width: 0 2px;
        font-size: 2rem;
        height: 3rem;
        font-weight: bold;
        text-align: center;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
