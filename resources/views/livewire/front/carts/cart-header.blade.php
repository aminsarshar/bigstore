<div
    class="absolute top-full left-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible w-[400px] p-5 bg-white dark:bg-zinc-700 border-t-[3px] border-t-orange-300 shadow-normal rounded-2xl transition-all delay-75 overflow-y-auto max-h-[650px]">
    <!-- Cart Header-->
    @auth
    <div class="flex items-center justify-between tracking-tighter font-DanaMedium text-xs">
        <span class="text-gray-300">1 مورد</span>
        <a href="{{ route('cart') }}" class="flex items-center text-orange-300">
            مشاهده سبد خرید
            <svg class="w-4 h-4">
                <use href="#arrow-left"></use>
            </svg>
        </a>
    </div>
    <!-- Cart Body-->
    <div
        class="pb-1 child:py-5 border-b border-b-gray-300 dark:border-b-white/10 divide-y divide-gray-100 dark:divide-white/10">
        @foreach ($carts as $cart)
        @if(auth()->user()->id == $cart->user_id)
            <div class="flex gap-x-2.5">
                <img class="w-30 h-30" src="{{ url('admin/images/products/' . $cart->product->image) }}"
                    alt="" />
                <div class="flex flex-col justify-between">
                    <div class="flex justify-between">
                        <h4 class="font-DanaMedium text-zinc-700 dark:text-white text-base line-clamp-2">
                            {{ $cart->product->title }}
                        </h4>
                        <span wire:click="deleteCart({{ $cart->id }})" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" width="20px">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </span>
                    </div>
                    <div>
                        <span
                            class="text-teal-600 dark:text-emerald-500 text-xs tracking-tighter font-DanaDemiBold">{{ number_format($discount_price) }}
                            تومان تخفیف</span>
                        <div class="text-zinc-700 dark:text-white font-DanaDemiBold">
                            {{ $cart->product->price }}
                            <span class="font-Dana text-sm">تومان</span>
                        </div>
                        <span class="text-orange-300 dark:text-emerald-500 text-xs tracking-tighter font-DanaDemiBold">
                            {{ $cart->count }} عدد</span>
                    </div>
                </div>
            </div>

        @endif
        @endforeach


    </div>

    <!-- Cart Footer-->
    <div>
        <div class="flex justify-between mt-3">
            <div>
                <span class="font-DanaMedium text-gray-300 text-xs tracking-tighter">مبلغ قابل
                    پرداخت</span>
                <div class="text-zinc-700 dark:text-white font-DanaDemiBold">
                    {{ number_format($total_price) }}
                    <span class="font-Dana text-sm">تومان</span>
                </div>
            </div>
            <a href="#"
                class="flex items-center justify-center rounded-xl h-14 w-[144px] text-white bg-teal-600 dark:bg-emerald-500 dark:hover:bg-emerald-600 transition-colors hover:bg-teal-700 tracking-tightest">ثبت
                سفارش</a>
        </div>
    </div>
    @endauth

</div>
