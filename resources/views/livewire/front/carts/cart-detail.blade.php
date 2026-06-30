<div>
    <div
    class="mb-8 rounded-[32px] bg-white dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 shadow-sm p-6"
>
    <div class="flex items-center justify-between">
        <div>
            <h1
                class="text-2xl font-DanaExtraBold text-zinc-800 dark:text-white"
            >
                سبد خرید
            </h1>

            <p
                class="mt-2 text-sm text-zinc-500"
            >محصولات انتخاب شده را بررسی و برای ادامه سفارش آماده شوید.</p>
        </div>

        <div
            class="hidden md:flex w-14 h-14 rounded-2xl bg-orange-100 dark:bg-orange-500/10 items-center justify-center"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-7 h-7 text-orange-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M2.25 3h1.386a1.5 1.5 0 011.458 1.146L5.61 6H21l-1.5 7.5a1.5 1.5 0 01-1.47 1.2H8.25a1.5 1.5 0 01-1.47-1.2L5.16 4.5M8.25 21a1.125 1.125 0 100-2.25A1.125 1.125 0 008.25 21zm9 0a1.125 1.125 0 100-2.25A1.125 1.125 0 0017.25 21z"
                />
            </svg>
        </div>
    </div>

    <div class="mt-10">
        <div class="relative flex items-center justify-between">
            <div
                class="absolute top-6 left-0 right-0 h-1 bg-zinc-200 dark:bg-zinc-700 rounded-full"
            >
                <div class="w-0 h-full bg-orange-500 rounded-full"></div>
            </div>

            {{-- مرحله 1 --}}
            <div class="relative z-10 flex flex-col items-center flex-1">
                <div
                    class="w-12 h-12 rounded-full bg-orange-500 text-white flex items-center justify-center shadow-lg shadow-orange-500/30"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.293 1.293A1 1 0 006.414 16H19m0 0a2 2 0 100 4 2 2 0 000-4zm-10 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                    </svg>
                </div>

                <span class="mt-3 text-sm font-DanaDemiBold text-orange-500">
                    سبد خرید
                </span>
            </div>

            {{-- مرحله 2 --}}
            <a
                href="{{route('shipping')}}"
                class="relative z-10 flex flex-col items-center flex-1"
            >
                <div
                    class="w-12 h-12 rounded-full bg-zinc-200 dark:bg-zinc-700 text-zinc-500 flex items-center justify-center"
                >
                    2
                </div>

                <span class="mt-3 text-sm text-zinc-400"> اطلاعات ارسال </span>
            </a>

            {{-- مرحله 3 --}}
            <div class="relative z-10 flex flex-col items-center flex-1">
                <div
                    class="w-12 h-12 rounded-full bg-zinc-200 dark:bg-zinc-700 text-zinc-500 flex items-center justify-center"
                >
                    3
                </div>

                <span class="mt-3 text-sm text-zinc-400"> پرداخت </span>
            </div>

            {{-- مرحله 4 --}}
            <div class="relative z-10 flex flex-col items-center flex-1">
                <div
                    class="w-12 h-12 rounded-full bg-zinc-200 dark:bg-zinc-700 text-zinc-500 flex items-center justify-center"
                >
                    4
                </div>

                <span class="mt-3 text-sm text-zinc-400"> تکمیل سفارش </span>
            </div>
        </div>
    </div>
</div>
<div class="relative tab-group">
    <div class="flex bg-slate-100 p-0.5 relative rounded-lg" role="tablist">
        <div
            class="absolute top-1 left-0.5 h-8 bg-white rounded-md shadow-sm transition-all duration-300 transform scale-x-0 translate-x-0 tab-indicator z-0"
        ></div>

        <a
            href="#"
            class="tab-link text-sm active inline-block py-2 px-4 text-slate-800 transition-all duration-300 relative z-1 mr-1"
            data-tab-target="tab1-group"
        >
            سبد خرید
            <span
                class="inset-ring inset-ring-gray-500/10"
                >{{ count($carts) }}</span
            >
        </a>
        <a
            href="#"
            class="tab-link text-sm inline-block py-2 px-4 text-slate-800 transition-all duration-300 relative z-1 mr-1"
            data-tab-target="tab2-group"
        >
            لیست خرید بعدی
            <span>{{ count($reserved_carts) }}</span>
        </a>
    </div>
    <div class="mt-4 tab-content-container">
        <div id="tab1-group" class="tab-content text-slate-800 block">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <!-- ProductsSection -->

                <div
                    class="md:col-span-2 bg-white dark:bg-zinc-700 p-8 rounded-md shadow-md"
                >
                    <section class="" id="products-section">
                        <div class="container">
                            <!-- Section Head -->
                            <div
                                class="flex justify-between items-end mb-5 md:mb-12 bg-white dark:bg-zinc-700 shadow-md rounded-md p-4"
                            >
                                <div>
                                    <select
                                        name=""
                                        id=""
                                        aria-placeholder="مرتب سازی"
                                        class="bg-gray-100 dark:bg-zinc-700 dark:text-white px-[7px] py-[7px] outline-none rounded-md border border-gray-200 dark:border-zinc-800 cursor-pointer"
                                    >
                                        <option value="" disabled selected>
                                            مرتب سازی
                                        </option>
                                        <option value="">کمترین قیمت</option>
                                        <option value="">بیشترین قیمت</option>
                                        <option value="">قدیمی ترین</option>
                                        <option value="">جدید ترین</option>
                                    </select>
                                </div>
                                <a href="#" class="section-link">
                                    <span class="hidden md:inline-block"
                                        >مشاهده همه نتایج</span
                                    >
                                    <span class="inline-block md:hidden"
                                        >مشاهده همه</span
                                    >
                                </a>
                            </div>

                            <!-- Section Body -->
                            <div
                                class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-3.5 md:gap-5 child:md:p-5 child:p-2 child:bg-white child:dark:bg-zinc-700 child:rounded-xl child:dark:shadow-2xl"
                            >
                                @foreach ($carts as $cart)
                                    <div
                                        wire:key="cart-{{ $cart->id }}"
                                        class="bg-white dark:bg-zinc-700 rounded-[28px] p-4 md:p-6 shadow-sm hover:shadow-xl transition-all duration-300"
                                    >
                                        <div
                                            class="flex flex-col lg:flex-row gap-6"
                                        >
                                            {{-- تصویر --}}
                                            <div
                                                class="w-[100px] h-[100px] md:w-[130px] md:h-[130px] shrink-0 rounded-2xl overflow-hidden bg-zinc-50 dark:bg-zinc-800 border border-zinc-100 dark:border-zinc-600"
                                            >
                                                <img
                                                    src="{{ url('admin/images/products/' . $cart->product->image) }}"
                                                    alt="{{ $cart->product->title }}"
                                                    class="w-full h-full object-cover transition duration-500 hover:scale-105"
                                                />
                                            </div>

                                            {{-- اطلاعات --}}
                                            <div
                                                class="flex-1 flex flex-col justify-between"
                                            >
                                                <div>
                                                    <h3
                                                        class="text-lg md:text-2xl font-DanaDemiBold text-zinc-800 dark:text-white leading-9"
                                                    >
                                                        {{ $cart->product->title }}
                                                    </h3>

                                                    <div
                                                        class="flex flex-wrap gap-3 mt-4"
                                                    >
                                                        <span
                                                            class="px-4 py-2 rounded-xl bg-orange-50 text-orange-500 text-sm"
                                                        >
                                                            🎨 رنگ : {{ $cart->color->name }}
                                                        </span>

                                                        <span
                                                            class="px-4 py-2 rounded-xl bg-emerald-50 text-emerald-600 text-sm"
                                                        >
                                                            🛡️ {{ $cart->guaranty->name }}
                                                        </span>
                                                    </div>
                                                </div>

                                                {{-- پایین کارت --}}
                                                <div
                                                    class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5 mt-8"
                                                >
                                                    {{-- تعداد --}}
                                                    <div
                                                        class="flex items-center gap-2 bg-zinc-100 dark:bg-zinc-800 rounded-2xl p-2 w-fit"
                                                    >
                                                        <button
                                                            type="button"
                                                            wire:click="decreaseCart({{ $cart->product_id }},{{ $cart->color_id }},{{ $cart->guaranty_id }})"
                                                            wire:loading.attr="disabled"
                                                            class="w-10 h-10 rounded-xl bg-white dark:bg-zinc-700 shadow flex items-center justify-center hover:bg-zinc-100 transition"
                                                        >
                                                            -
                                                        </button>

                                                        <span
                                                            wire:loading.remove
                                                            class="w-10 text-center font-bold text-lg"
                                                        >
                                                            {{ $cart->count }}
                                                        </span>

                                                        <span
                                                            wire:loading
                                                            class="w-10 text-center text-sm"
                                                        >
                                                            ...
                                                        </span>

                                                        <button
                                                            type="button"
                                                            wire:click="increaseCart({{ $cart->product_id }},{{ $cart->color_id }},{{ $cart->guaranty_id }})"
                                                            wire:loading.attr="disabled"
                                                            class="w-10 h-10 rounded-xl bg-orange-400 text-white flex items-center justify-center hover:bg-orange-500 transition"
                                                        >
                                                            +
                                                        </button>
                                                    </div>

                                                    {{-- عملیات --}}
                                                    <div
                                                        class="flex flex-wrap items-center gap-3"
                                                    >
                                                        <button
                                                            type="button"
                                                            wire:click="moveToReserveCart({{ $cart->id }})"
                                                            wire:loading.attr="disabled"
                                                            class="h-11 px-5 rounded-xl bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 dark:hover:bg-zinc-600 transition"
                                                        >
                                                            ذخیره برای بعد
                                                        </button>

                                                        <button
                                                            type="button"
                                                            wire:click="deleteCart({{ $cart->id }})"
                                                            wire:loading.attr="disabled"
                                                            class="h-11 px-5 rounded-xl bg-red-50 text-red-500 hover:bg-red-100 transition"
                                                        >
                                                            حذف
                                                        </button>
                                                    </div>

                                                    {{-- قیمت --}}
                                                    <div class="text-left">
                                                        <div
                                                            class="text-xs text-zinc-400 mb-1"
                                                        >
                                                            مبلغ کالا
                                                        </div>

                                                        <div
                                                            class="text-2xl font-DanaDemiBold text-orange-500"
                                                        >
                                                            {{ number_format($cart->ProductPrice($cart->product_id,$cart->color_id,$cart->guaranty_id)) }}

                                                            <span
                                                                class="text-sm"
                                                            >
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

                <div class="lg:sticky lg:top-24">
                    <div
                        class="rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-lg p-5"
                    >
                        {{-- قیمت --}}
                        <div
                            class="pb-5 border-b border-zinc-200 dark:border-zinc-800"
                        >
                            <div
                                class="flex items-center justify-between text-sm text-zinc-500"
                            >
                                <span>جمع سفارش</span>

                                <span
                                    >{{ number_format($total_price) }} تومان</span
                                >
                            </div>

                            @if ($discount_price > 0)
                                <div
                                    class="flex items-center justify-between text-sm text-green-600 mt-2"
                                >
                                    <span>تخفیف</span>

                                    <span
                                        >{{ number_format($discount_price) }} تومان</span
                                    >
                                </div>
                            @endif

                            <div class="flex items-end justify-between mt-5">
                                <div>
                                    <div class="text-xs text-zinc-400">
                                        مبلغ قابل پرداخت
                                    </div>

                                    <div
                                        class="text-3xl font-black text-orange-500"
                                    >
                                        {{ number_format($total_price - $discount_price) }}
                                    </div>
                                </div>

                                <span class="text-zinc-500"> تومان </span>
                            </div>
                        </div>

                        {{-- انتخاب ها --}}
                        <div class="grid grid-cols-2 gap-3 py-5">
                            <div>
                                <label class="block mb-2 text-sm text-zinc-500">
                                    نوع آسیاب
                                </label>

                                <select
                                    class="w-full h-11 rounded-2xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-orange-300"
                                >
                                    <option>انتخاب کنید</option>
                                    <option>ریز</option>
                                    <option>متوسط</option>
                                    <option>درشت</option>
                                </select>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm text-zinc-500">
                                    تعداد
                                </label>

                                <div
                                    class="flex items-center justify-between h-11 rounded-2xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-3"
                                >
                                    <button
                                        type="button"
                                        class="w-7 h-7 rounded-full bg-zinc-100 dark:bg-zinc-700 hover:bg-orange-500 hover:text-white transition"
                                    >
                                        +
                                    </button>

                                    <input
                                        type="number"
                                        value="1"
                                        class="w-10 text-center bg-transparent outline-none border-none text-sm font-DanaDemiBold"
                                    />

                                    <button
                                        type="button"
                                        class="w-7 h-7 rounded-full bg-zinc-100 dark:bg-zinc-700 hover:bg-orange-500 hover:text-white transition"
                                    >
                                        −
                                    </button>
                                </div>
                            </div>
                        </div>


                        {{-- مزایا --}}
                        <div
                            class="rounded-2xl bg-zinc-50 dark:bg-zinc-800 p-4 space-y-2 mb-5"
                        >
                            <div class="flex items-center gap-2 text-sm">
                                ✅ تضمین اصالت کالا
                            </div>

                            <div class="flex items-center gap-2 text-sm">
                                🚚 ارسال سریع
                            </div>

                            <div class="flex items-center gap-2 text-sm">
                                🔒 پرداخت امن
                            </div>
                        </div>

                        {{-- دکمه --}}
                        <a
                            href="{{ route('shipping') }}"
                            class="h-14 rounded-2xl bg-orange-500 hover:bg-orange-600 text-white flex items-center justify-center font-DanaDemiBold transition"
                        >
                            ادامه ثبت سفارش
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab2-group" class="tab-content text-slate-800 hidden">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <!-- ProductsSection -->

                <div
                    class="md:col-span-2 bg-white dark:bg-zinc-700 p-8 rounded-md shadow-md"
                >
                    <section class="" id="products-section">
                        <div class="container">
                            <!-- Section Head -->
                            <div
                                class="flex justify-between items-end mb-5 md:mb-12 bg-white dark:bg-zinc-700 shadow-md rounded-md p-4"
                            >
                                <div>
                                    <select
                                        name=""
                                        id=""
                                        aria-placeholder="مرتب سازی"
                                        class="bg-gray-100 dark:bg-zinc-700 dark:text-white px-[7px] py-[7px] outline-none rounded-md border border-gray-200 dark:border-zinc-800 cursor-pointer"
                                    >
                                        <option value="" disabled selected>
                                            مرتب سازی
                                        </option>
                                        <option value="">کمترین قیمت</option>
                                        <option value="">بیشترین قیمت</option>
                                        <option value="">قدیمی ترین</option>
                                        <option value="">جدید ترین</option>
                                    </select>
                                </div>
                                <a
                                    wire:click="moveAllToMainCart"
                                    href="#"
                                    class="section-link"
                                >
                                    <span class="hidden md:inline-block"
                                        >افزودن به سبد خرید</span
                                    >
                                    <span class="inline-block md:hidden"
                                        >مشاهده همه</span
                                    >
                                </a>
                            </div>

                            <!-- Section Body -->

                            <div
                                class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-3.5 md:gap-5 child:md:p-5 child:p-2 child:bg-white child:dark:bg-zinc-700 child:rounded-xl child:dark:shadow-2xl"
                            >
                                @foreach ($reserved_carts as $cart)
                                    <div
                                        class="bg-white dark:bg-zinc-700 rounded-[28px] p-4 md:p-6 shadow-sm hover:shadow-xl transition-all duration-300"
                                    >
                                        <div
                                            class="flex flex-col lg:flex-row gap-6"
                                        >
                                            <!-- تصویر -->
                                            <div
                                                class="w-[100px] h-[100px] md:w-[130px] md:h-[130px] shrink-0 rounded-2xl overflow-hidden bg-zinc-50 dark:bg-zinc-800 border border-zinc-100 dark:border-zinc-600"
                                            >
                                                <img
                                                    src="{{ url('admin/images/products/' . $cart->product->image) }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                                />
                                            </div>

                                            <!-- اطلاعات -->
                                            <div
                                                class="flex-1 flex flex-col justify-between"
                                            >
                                                <div>
                                                    <h3
                                                        class="text-lg md:text-2xl font-DanaDemiBold text-zinc-800 dark:text-white leading-9"
                                                    >
                                                        {{ $cart->product->title }}
                                                    </h3>

                                                    <div
                                                        class="flex flex-wrap gap-3 mt-4"
                                                    >
                                                        <span
                                                            class="px-4 py-2 rounded-xl bg-orange-50 text-orange-500 text-sm"
                                                        >
                                                            🎨 رنگ: {{ $cart->color->name }}
                                                        </span>

                                                        <span
                                                            class="px-4 py-2 rounded-xl bg-emerald-50 text-emerald-600 text-sm"
                                                        >
                                                            🛡️ {{ $cart->guaranty->name }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- پایین کارت -->
                                                <div
                                                    class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5 mt-8"
                                                >
                                                    <!-- تعداد -->
                                                    <div
                                                        class="flex items-center gap-2 bg-zinc-100 dark:bg-zinc-800 rounded-2xl p-2 w-fit w-[24%]"
                                                    >
                                                        <button
                                                            wire:click="decreaseCart({{ $cart->product_id }},{{ $cart->color_id }},{{ $cart->guaranty_id }})"
                                                            class="w-10 h-10 rounded-xl bg-white dark:bg-zinc-700 shadow flex items-center justify-center"
                                                        >
                                                            -
                                                        </button>

                                                        <span
                                                            class="w-10 text-center font-bold text-lg"
                                                        >
                                                            {{ $cart->count }}
                                                        </span>

                                                        <button
                                                            wire:click="increaseCart({{ $cart->product_id }},{{ $cart->color_id }},{{ $cart->guaranty_id }})"
                                                            class="w-10 h-10 rounded-xl bg-orange-400 text-white flex items-center justify-center"
                                                        >
                                                            +
                                                        </button>
                                                    </div>

                                                    <!-- اکشن ها -->
                                                    <div
                                                        class="flex flex-wrap items-center gap-3"
                                                    >
                                                        <button
                                                            wire:click="moveToReserveCart({{ $cart->id }})"
                                                            class="h-11 px-5 rounded-xl bg-zinc-100 dark:bg-zinc-800 hover:bg-zinc-200 transition"
                                                        >
                                                            ذخیره برای بعد
                                                        </button>

                                                        <button
                                                            wire:click="deleteCart({{ $cart->id }})"
                                                            class="h-11 px-5 rounded-xl bg-red-50 text-red-500 hover:bg-red-100 transition"
                                                        >
                                                            حذف
                                                        </button>
                                                    </div>

                                                    <!-- قیمت -->
                                                    <div class="text-left">
                                                        <div
                                                            class="text-xs text-zinc-400 mb-1"
                                                        >
                                                            مبلغ کالا
                                                        </div>

                                                        <div
                                                            class="text-2xl font-DanaDemiBold text-orange-500"
                                                        >
                                                            {{ number_format($cart->ProductPrice($cart->product_id, $cart->color_id, $cart->guaranty_id)) }}

                                                            <span
                                                                class="text-sm"
                                                            >
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

                <div class="lg:sticky lg:top-24">
                    <div
                        class="rounded-3xl bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 shadow-lg p-5"
                    >
                        {{-- قیمت --}}
                        <div
                            class="pb-5 border-b border-zinc-200 dark:border-zinc-800"
                        >
                            <div
                                class="flex items-center justify-between text-sm text-zinc-500"
                            >
                                <span>جمع سفارش</span>

                                <span
                                    >{{ number_format($total_price) }} تومان</span
                                >
                            </div>

                            @if ($discount_price > 0)
                                <div
                                    class="flex items-center justify-between text-sm text-green-600 mt-2"
                                >
                                    <span>تخفیف</span>

                                    <span
                                        >{{ number_format($discount_price) }} تومان</span
                                    >
                                </div>
                            @endif

                            <div class="flex items-end justify-between mt-5">
                                <div>
                                    <div class="text-xs text-zinc-400">
                                        مبلغ قابل پرداخت
                                    </div>

                                    <div
                                        class="text-3xl font-black text-orange-500"
                                    >
                                        {{ number_format($total_price - $discount_price) }}
                                    </div>
                                </div>

                                <span class="text-zinc-500"> تومان </span>
                            </div>
                        </div>

                        {{-- انتخاب ها --}}
                        <div class="grid grid-cols-2 gap-3 py-5">
                            <div>
                                <label class="block mb-2 text-sm text-zinc-500">
                                    نوع آسیاب
                                </label>

                                <select
                                    class="w-full h-11 rounded-2xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-orange-300"
                                >
                                    <option>انتخاب کنید</option>
                                    <option>ریز</option>
                                    <option>متوسط</option>
                                    <option>درشت</option>
                                </select>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm text-zinc-500">
                                    تعداد
                                </label>

                                <div
                                    class="flex items-center justify-between h-11 rounded-2xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-3"
                                >
                                    <button
                                        type="button"
                                        class="w-7 h-7 rounded-full bg-zinc-100 dark:bg-zinc-700 hover:bg-orange-500 hover:text-white transition"
                                    >
                                        +
                                    </button>

                                    <input
                                        type="number"
                                        value="1"
                                        class="w-10 text-center bg-transparent outline-none border-none text-sm font-DanaDemiBold"
                                    />

                                    <button
                                        type="button"
                                        class="w-7 h-7 rounded-full bg-zinc-100 dark:bg-zinc-700 hover:bg-orange-500 hover:text-white transition"
                                    >
                                        −
                                    </button>
                                </div>
                            </div>
                        </div>


                        {{-- مزایا --}}
                        <div
                            class="rounded-2xl bg-zinc-50 dark:bg-zinc-800 p-4 space-y-2 mb-5"
                        >
                            <div class="flex items-center gap-2 text-sm">
                                ✅ تضمین اصالت کالا
                            </div>

                            <div class="flex items-center gap-2 text-sm">
                                🚚 ارسال سریع
                            </div>

                            <div class="flex items-center gap-2 text-sm">
                                🔒 پرداخت امن
                            </div>
                        </div>

                        {{-- دکمه --}}
                        <a
                            href="{{ route('shipping') }}"
                            class="h-14 rounded-2xl bg-orange-500 hover:bg-orange-600 text-white flex items-center justify-center font-DanaDemiBold transition"
                        >
                            ادامه ثبت سفارش
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
