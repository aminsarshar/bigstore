<div
    class="absolute top-full left-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-[400px] p-5 bg-white dark:bg-zinc-700 border-t-[3px] border-t-orange-300 shadow-normal rounded-2xl transition-all delay-75 overflow-y-auto max-h-[650px]"
>
    <!-- Cart Header-->
    @auth
        @if ($carts->count() > 0)
            <div
                class="flex items-center justify-between tracking-tighter font-DanaMedium text-xs"
            >
                <span class="text-gray-300"
                    >{{ $carts->sum('count') }} مورد</span
                >
                <a
                    href="{{ route('cart') }}"
                    class="flex items-center text-orange-300"
                >
                    مشاهده سبد خرید
                    <svg class="w-4 h-4">
                        <use href="#arrow-left"></use>
                    </svg>
                </a>
            </div>
            <!-- Cart Body-->
            <div
                class="pb-1 child:py-5 border-b border-b-gray-300 dark:border-b-white/10 divide-y divide-gray-100 dark:divide-white/10"
            >
                @auth
                    @foreach ($carts as $cart)
                        @if ($cart->user_id == auth()->id())
                            <div class="flex gap-x-2.5">
                                @if ($cart->product)
                                    <img
                                        src="{{ asset('admin/images/products/'.$cart->product->image) }}"
                                    />
                                @endif
                                <div class="flex flex-col justify-between">
                                    <div class="flex justify-between">
                                        <h4
                                            class="font-DanaMedium text-zinc-700 dark:text-white text-base line-clamp-2"
                                        >
                                        @if ($cart->product)
                                            {{ $cart->product->title }}
                                @endif

                                        </h4>
                                        @if ($cart->product)
                                        <span
                                            wire:click="deleteCart({{ $cart->id }})"
                                            class="cursor-pointer"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                width="20px"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                                />
                                            </svg>
                                        </span>
                                        @endif
                                    </div>
                                    <div>
                                        @if ($cart->product)
                                        <span
                                            class="text-teal-600 dark:text-emerald-500 text-xs tracking-tighter font-DanaDemiBold"
                                            >{{ number_format($discount_price) }} تومان
                                            تخفیف</span
                                        >
                                        @endif

                                        <div
                                            class="text-zinc-700 dark:text-white font-DanaDemiBold"
                                        >
                                        @if ($cart->product)
                                            {{ $cart->product->price }}
                                            <span class="font-Dana text-sm"
                                                >تومان</span
                                            >
                                            @endif
                                        </div>
                                        <span
                                            class="text-orange-300 dark:text-emerald-500 text-xs tracking-tighter font-DanaDemiBold"
                                        >
                                        @if ($cart->product)
                                            {{ $cart->count }} عدد</span
                                        >
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endauth
            </div>

            <!-- Cart Footer-->
            <div>
                <div class="flex justify-between mt-3">
                    <div>
                        <span
                            class="font-DanaMedium text-gray-300 text-xs tracking-tighter"
                            >مبلغ قابل پرداخت</span
                        >
                        <div
                            class="text-zinc-700 dark:text-white font-DanaDemiBold"
                        >
                        @if ($cart->product)
                            {{ number_format($total_price) }}
                            <span class="font-Dana text-sm">تومان</span>
                            @endif
                        </div>
                    </div>
                    <a
                        href="{{route('shipping')}}"
                        class="flex items-center justify-center rounded-xl h-14 w-[144px] text-white bg-teal-600 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors hover:bg-teal-700 tracking-tightest"
                        >ثبت سفارش</a
                    >
                </div>
            </div>
        @else
            <div
                class="rounded-2xl border border-dashed border-zinc-300 dark:border-zinc-700 p-8 text-center"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mx-auto h-12 w-12 text-orange-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5"
                    />
                </svg>

                <h3
                    class="mt-4 text-lg font-DanaDemiBold text-zinc-800 dark:text-white"
                >
                    سبد خرید شما خالی است
                </h3>

                <p class="mt-2 text-sm text-zinc-500">برای ثبت سفارش، ابتدا یک محصول به سبد خرید اضافه کنید.</p>
            </div>
            <a
                href="{{route('home.shop')}}"
                class="mt-6 h-11 px-6 flex items-center justify-center rounded-xl bg-orange-500 hover:bg-orange-600 text-white transition"
            >
                مشاهده محصولات
            </a>
        @endif
    @endauth
</div>
