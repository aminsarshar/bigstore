<section class="category-banner mt-36 mb-36 md:my-36">
    <div class="md:pb-10">
        <ul class="flex gap-x-2.5 text-gray-500 dark:text-gray-100">
            <li><a href="">خانه</a></li>
            /
            <li><a href="">سبد خرید</a></li>
        </ul>
    </div>
    <div
        class="mb-8 rounded-[32px] bg-white dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 shadow-sm p-6"
    >
        <div class="flex items-center justify-between">
            <div>
                <h1
                    class="text-2xl font-DanaExtraBold text-zinc-800 dark:text-white"
                >
                    ارسال اطلاعات
                </h1>

                <p
                    class="mt-2 text-sm text-zinc-500"
                >محصولات انتخاب شده را بررسی و برای ادامه سفارش اطلاعات را تکمیل کنید.</p>
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
                <a
                    href="{{route('cart')}}"
                    class="relative z-10 flex flex-col items-center flex-1"
                >
                    <div
                        class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center shadow-lg shadow-green-500/30"
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
                                stroke-width="2.5"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>
                    </div>

                    <span class="mt-3 text-sm font-DanaDemiBold text-green-600">
                        سبد خرید
                    </span>
                </a>

                {{-- مرحله 2 --}}
                <a
                    href="{{ route('shipping') }}"
                    class="relative z-10 flex flex-col items-center flex-1"
                >
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
                                d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0L6.343 16.657A8 8 0 1117.657 16.657z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>
                    </div>

                    <span
                        class="mt-3 text-sm font-DanaDemiBold text-orange-500"
                    >
                        ارسال اطلاعات
                    </span>
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

                    <span class="mt-3 text-sm text-zinc-400">
                        تکمیل سفارش
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="relative tab-group">
        <div class="flex bg-slate-100 p-0.5 relative rounded-lg" role="tablist">
            <div
                class="absolute top-1 left-0.5 h-8 bg-white rounded-md shadow-sm transition-all duration-300 transform scale-x-0 translate-x-0 tab-indicator z-0"
            ></div>
        </div>
        <div class="mt-4 tab-content-container">
            <div id="tab1-group" class="tab-content text-slate-800 block">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <!-- ProductsSection -->

                    <!-- BuyButtonSection -->

                    <div
                        class="md:col-span-2 bg-white dark:bg-zinc-700 p-8 rounded-md shadow-md"
                    >
                        <section class="" id="products-section">
                            <div class="container">
                                <!-- Section Body -->
                                <div
                                    class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-3.5 md:gap-5 child:md:p-5 child:p-2 child:bg-white child:dark:bg-zinc-700 child:rounded-2xl child:shadow-normal child:dark:shadow-normal"
                                >
                                    @if (!$addresses->count = 0)
                                        <livewire:front.order.address />
                                    @endif
                                    @foreach ($addresses as $address)
                                        @if ($loop->first)
                                            <div class="space-y-5">
                                                <div
                                                    class="flex items-center justify-between"
                                                >
                                                    <div>
                                                        <h2
                                                            class="text-xl font-DanaDemiBold text-zinc-800 dark:text-white"
                                                        >
                                                            آدرس ارسال
                                                        </h2>

                                                        <p class="text-sm text-zinc-500 mt-1">آدرس موردنظر برای ارسال سفارش را انتخاب کنید.</p>
                                                    </div>

                                                    <a
                                                        href="#"
                                                        class="hidden md:flex items-center gap-2 px-4 h-11 rounded-2xl border border-orange-200 text-orange-500 hover:bg-orange-500 hover:text-white transition"
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
                                                                d="M12 4v16m8-8H4"
                                                            />
                                                        </svg>

                                                        افزودن آدرس
                                                    </a>
                                                </div>

                                                <div class="grid gap-5">
                                                    @foreach ($addresses as $address)
                                                        <label
                                                            class="group cursor-pointer rounded-3xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-6 transition-all hover:border-orange-400 hover:shadow-xl hover:-translate-y-1"
                                                        >
                                                            <input
                                                                type="radio"
                                                                name="address_id"
                                                                value="{{ $address->id }}"
                                                                class="hidden peer"
                                                                {{ $loop->first ? 'checked' : '' }}
                                                            />

                                                            <div
                                                                class="flex items-start justify-between"
                                                            >
                                                                <div
                                                                    class="flex gap-4"
                                                                >
                                                                    <div
                                                                        class="w-12 h-12 rounded-2xl bg-orange-100 dark:bg-orange-500/10 flex items-center justify-center text-orange-500"
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
                                                                                stroke-width="1.8"
                                                                                d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0L6.343 16.657A8 8 0 1117.657 16.657z"
                                                                            />

                                                                            <path
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                stroke-width="1.8"
                                                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                                            />
                                                                        </svg>
                                                                    </div>

                                                                    <div>
                                                                        <h3
                                                                            class="font-DanaDemiBold text-zinc-800 dark:text-white"
                                                                        >
                                                                            {{ $address->receiver_name }}
                                                                        </h3>

                                                                        <p class="mt-2 text-sm leading-7 text-zinc-500 dark:text-zinc-400">
                                                                            {{ $address->province }}

                                                                            -

                                                                            {{ $address->city }}

                                                                            -

                                                                            {{ $address->address }}
                                                                        </p>

                                                                        <div
                                                                            class="mt-4 flex flex-wrap gap-2"
                                                                        >
                                                                            <span
                                                                                class="px-3 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center text-xs"
                                                                            >
                                                                                📞 {{ $address->phone }}
                                                                            </span>

                                                                            <span
                                                                                class="px-3 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center text-xs"
                                                                            >
                                                                                کدپستی: {{ $address->postal_code }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="w-6 h-6 rounded-full border-2 border-zinc-300 peer-checked:border-orange-500 peer-checked:bg-orange-500 transition"
                                                                ></div>
                                                            </div>
                                                        </label>

                                                    @endforeach
                                                </div>
                                            </div>
                                            <livewire:front.order.address />

                                            <div class="w-full max-w-md">
                                                <!-- دکمه کوچک -->
                                                <button
                                                    id="toggleBtn"
                                                    aria-expanded="false"
                                                    aria-controls="collapseContent"
                                                    style="
                                                        background-color: rgb(
                                                            253 186 116 / 0.2
                                                        );
                                                        color: rgb(
                                                            253 186 116 /
                                                                var(
                                                                    --tw-text-opacity
                                                                )
                                                        );
                                                    "
                                                    class="flex items-center gap-2 px-3 py-1.5 text-white rounded-md text-sm hover:bg-orange-400"
                                                >
                                                    <!-- آیکون کوچک -->
                                                    <svg
                                                        id="toggleIcon"
                                                        class="w-4 h-4 chev2"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 9l-7 7-7-7"
                                                        />
                                                    </svg>

                                                    <span>تغییر آدرس</span>
                                                </button>

                                                <!-- محتوای اسلایدی -->
                                                <div
                                                    id="collapseContent"
                                                    class="collapse-content mt-2 rounded-lg shadow bg-white"
                                                >
                                                    @foreach ($addresses as $address)
                                                        <div class="space-y-5">
                                                            <div
                                                                class="flex items-center justify-between"
                                                            >
                                                                <div>
                                                                    <h2
                                                                        class="text-xl font-DanaDemiBold text-zinc-800 dark:text-white"
                                                                    >
                                                                        آدرس
                                                                        ارسال
                                                                    </h2>

                                                                    <p class="text-sm text-zinc-500 mt-1">آدرس موردنظر برای ارسال سفارش را انتخاب کنید.</p>
                                                                </div>

                                                                <a
                                                                    href="#"
                                                                    class="hidden md:flex items-center gap-2 px-4 h-11 rounded-2xl border border-orange-200 text-orange-500 hover:bg-orange-500 hover:text-white transition"
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
                                                                            d="M12 4v16m8-8H4"
                                                                        />
                                                                    </svg>

                                                                    افزودن آدرس
                                                                </a>
                                                            </div>

                                                            <div
                                                                class="grid gap-5"
                                                            >
                                                                @foreach ($addresses as $address)
                                                                    <label
                                                                        class="group cursor-pointer rounded-3xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-6 transition-all hover:border-orange-400 hover:shadow-xl hover:-translate-y-1"
                                                                    >
                                                                        <input
                                                                            type="radio"
                                                                            name="address_id"
                                                                            value="{{ $address->id }}"
                                                                            class="hidden peer"
                                                                            {{ $loop->first ? 'checked' : '' }}
                                                                        />

                                                                        <div
                                                                            class="flex items-start justify-between"
                                                                        >
                                                                            <div
                                                                                class="flex gap-4"
                                                                            >
                                                                                <div
                                                                                    class="w-12 h-12 rounded-2xl bg-orange-100 dark:bg-orange-500/10 flex items-center justify-center text-orange-500"
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
                                                                                            stroke-width="1.8"
                                                                                            d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0L6.343 16.657A8 8 0 1117.657 16.657z"
                                                                                        />

                                                                                        <path
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="1.8"
                                                                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                                                        />
                                                                                    </svg>
                                                                                </div>

                                                                                <div>
                                                                                    <h3
                                                                                        class="font-DanaDemiBold text-zinc-800 dark:text-white"
                                                                                    >
                                                                                        {{ $address->receiver_name }}
                                                                                    </h3>

                                                                                    <p class="mt-2 text-sm leading-7 text-zinc-500 dark:text-zinc-400">
                                                                                        {{ $address->province }}

                                                                                        -

                                                                                        {{ $address->city }}

                                                                                        -

                                                                                        {{ $address->address }}
                                                                                    </p>

                                                                                    <div
                                                                                        class="mt-4 flex flex-wrap gap-2"
                                                                                    >
                                                                                        <span
                                                                                            class="px-3 h-8 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center text-xs"
                                                                                        >
                                                                                            📞 {{ $address->phone }}
                                                                                        </span>

                                                                                        <span
                                                                                            class="px-3 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center text-xs"
                                                                                        >
                                                                                            کدپستی: {{ $address->postal_code }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="w-6 h-6 rounded-full border-2 border-zinc-300 peer-checked:border-orange-500 peer-checked:bg-orange-500 transition"
                                                                            ></div>
                                                                        </div>
                                                                    </label>

                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <style>
                                                /* انیمیشن نرم برای محتوا */
                                                .collapse-content,
                                                .collapse-content2 {
                                                    max-height: 0;
                                                    overflow: hidden;
                                                    transition: max-height 350ms
                                                        cubic-bezier(
                                                            0.4,
                                                            0,
                                                            0.2,
                                                            1
                                                        );
                                                }

                                                /* انیمیشن چرخش آیکون */
                                                .chev,
                                                .chev2 {
                                                    transition: transform 250ms
                                                        ease;
                                                    transform-origin: center;
                                                    display: inline-block;
                                                }

                                                .chev.open {
                                                    transform: rotate(180deg);
                                                }
                                            </style>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </section>

                        <hr class="mt-8" />

                        <section class="best-selling my-8 md:mb-20">
                            <div class="space-y-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2
                                            class="text-xl font-DanaDemiBold text-zinc-800 dark:text-white"
                                        >
                                            محصولات سفارش
                                        </h2>

                                        <p class="text-sm text-zinc-500 mt-1">
                                            {{ count($carts) }} محصول در سبد
                                            خرید شما
                                        </p>
                                    </div>
                                </div>

                                @foreach ($carts as $item)
                                    <div
                                        class="group rounded-3xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-4 transition-all duration-300 hover:shadow-xl hover:border-orange-300"
                                    >
                                        <div
                                            class="flex flex-col md:flex-row gap-5"
                                        >
                                            {{-- تصویر --}}
                                            <div
                                                class="w-full md:w-36 aspect-square rounded-2xl bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center overflow-hidden shrink-0"
                                            >
                                                <img
                                                    src="{{ asset('admin/images/products/'.$item->product->image) }}"
                                                    alt="{{ $item->product->title }}"
                                                    loading="lazy"
                                                    decoding="async"
                                                    class="max-w-full max-h-full object-contain transition duration-500 group-hover:scale-105"
                                                />
                                            </div>

                                            {{-- اطلاعات --}}
                                            <div
                                                class="flex-1 flex flex-col justify-between"
                                            >
                                                <div>
                                                    <h3
                                                        class="text-lg font-DanaDemiBold text-zinc-800 dark:text-white"
                                                    >
                                                        {{ $item->product->title }}
                                                    </h3>

                                                    <div
                                                        class="mt-4 flex flex-wrap gap-2"
                                                    >
                                                        @if ($item->grind)
                                                            <span
                                                                class="px-3 py-1 rounded-full bg-zinc-100 dark:bg-zinc-800 text-xs"
                                                            >
                                                                آسیاب: {{ $item->grind }}
                                                            </span>

                                                        @endif

                                                        <span
                                                            class="px-3 py-1 rounded-full bg-orange-100 text-orange-600 text-xs"
                                                        >
                                                            تعداد: {{ $item->qty }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div
                                                    class="mt-6 flex items-center justify-between"
                                                >
                                                    <div>
                                                        <div
                                                            class="text-2xl font-black text-orange-500"
                                                        >
                                                            {{ number_format($item->price) }}
                                                        </div>

                                                        <div
                                                            class="text-xs text-zinc-400"
                                                        >
                                                            تومان
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="{{ route('single.product',$item->product->slug) }}"
                                                        class="w-11 h-11 rounded-2xl bg-orange-500 text-white flex items-center justify-center transition hover:scale-110"
                                                    >
                                                        →
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="">
                            <div
                                class="lg:sticky lg:top-24 rounded-[32px] bg-white dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 shadow-sm overflow-hidden"
                            >
                                {{-- Header --}}
                                <div
                                    class="p-6 border-b border-zinc-100 dark:border-zinc-800"
                                >
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-12 h-12 rounded-2xl bg-orange-100 dark:bg-orange-500/10 flex items-center justify-center"
                                        >
                                            💳
                                        </div>

                                        <div>
                                            <h3
                                                class="font-DanaDemiBold text-zinc-800 dark:text-white"
                                            >
                                                خلاصه سفارش
                                            </h3>

                                            <p
                                                class="text-xs text-zinc-400"
                                            >بررسی نهایی قبل از پرداخت</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Prices --}}
                                <div class="p-6 space-y-5">
                                    <div class="flex justify-between">
                                        <span class="text-zinc-500">
                                            مبلغ کالاها
                                        </span>

                                        <span class="font-bold">
                                            {{ number_format($total_price) }}

                                            تومان
                                        </span>
                                    </div>

                                    <div class="flex justify-between">
                                        <span class="text-zinc-500">
                                            تخفیف
                                        </span>

                                        <span class="font-bold text-green-600">
                                            {{ number_format($discount_price) }}

                                            تومان
                                        </span>
                                    </div>

                                    <div class="flex justify-between">
                                        <span class="text-zinc-500">
                                            هزینه ارسال
                                        </span>

                                        <span class="font-bold"> رایگان </span>
                                    </div>

                                    <div
                                        class="border-t border-dashed border-zinc-200 dark:border-zinc-700 pt-5"
                                    >
                                        <div
                                            class="flex justify-between items-center"
                                        >
                                            <div>
                                                <p
                                                    class="text-sm text-zinc-500"
                                                >قابل پرداخت</p>

                                                <div
                                                    class="mt-1 text-3xl font-black text-orange-500"
                                                >
                                                    {{ number_format($total_price) }}
                                                </div>
                                            </div>

                                            <span
                                                class="px-4 py-2 rounded-full bg-orange-100 text-orange-600 text-sm"
                                            >
                                                نهایی
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Button --}}
                                <div class="p-6 pt-0">
                                    <button
                                        type="submit"
                                        class="w-full h-14 rounded-2xl bg-orange-500 text-white font-DanaDemiBold transition-all hover:bg-orange-600 hover:shadow-xl hover:shadow-orange-500/30"
                                    >
                                        ادامه فرآیند پرداخت
                                    </button>
                                </div>

                                {{-- Footer --}}
                                <div class="px-6 pb-6">
                                    <div
                                        class="rounded-2xl bg-zinc-50 dark:bg-zinc-800 p-4"
                                    >
                                        <div
                                            class="flex items-center gap-2 text-sm text-zinc-500"
                                        >
                                            🛡️ تضمین اصالت کالا
                                        </div>

                                        <div
                                            class="mt-2 flex items-center gap-2 text-sm text-zinc-500"
                                        >
                                            🚚 ارسال سریع و مطمئن
                                        </div>

                                        <div
                                            class="mt-2 flex items-center gap-2 text-sm text-zinc-500"
                                        >
                                            🔒 پرداخت امن
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
