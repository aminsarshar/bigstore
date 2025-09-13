<div class="relative tab-group">
  <div class="flex bg-slate-100 p-0.5 relative rounded-lg" role="tablist">
    <div class="absolute top-1 left-0.5 h-8 bg-white rounded-md shadow-sm transition-all duration-300 transform scale-x-0 translate-x-0 tab-indicator z-0"></div>
<style>
    .active{
        border-bottom: 1px solid rgb(253 186 116)
    }
</style>
    <a href="#" class="tab-link text-sm active inline-block py-2 px-4 text-slate-800 transition-all duration-300 relative z-1 mr-1" data-tab-target="tab1-group">
        سبد خرید
        <span class="inset-ring inset-ring-gray-500/10">{{count($carts)}}</span>
    </a>
    <a href="#" class="tab-link text-sm inline-block py-2 px-4 text-slate-800 transition-all duration-300 relative z-1 mr-1" data-tab-target="tab2-group">
        لیست خرید بعدی
        <span>{{count($reserved_carts)}}</span>
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
                        <a href="#" class="border-b border-gray-300">
                            <div class="flex">
                                <div class="relative mb-2 md:mb-5">
                                    <img src="{{ url('admin/images/products/' . $cart->product->image) }}"
                                        alt="product-1" class="w-[170px]" />
                                </div>
                                <div>
                                    <h5
                                        class="font-DanaMedium text-sm md:text-xl text-zinc-700 dark:text-white line-clamp-2 md:min-h-[46px] min-h-[30px]">
                                        {{ $cart->product->title }}
                                    </h5>
                                    <ul class="text-gray-600 dark:text-gray-100">
                                        <div class="flex items-center gap-x-1 text-sm mb-[10px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <li class="text-base">رنگ</li>
                                            :
                                            <li class="text-base">{{ $cart->color->name }}</li>

                                        </div>
                                        <div class="flex items-center gap-x-1 text-sm mb-[10px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 6h.008v.008H6V6Z" />
                                            </svg>
                                            <li class="text-base">گارانتی</li>
                                            :
                                            <li class="text-base">{{ $cart->guaranty->name }}</li>

                                        </div>
                                        <div class="flex items-center gap-x-1 text-sm mb-[10px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <li class="text-base">گارانتی</li>
                                            :
                                            <li class="text-base">گارانتی</li>

                                        </div>

                                    </ul>
                                </div>


                            </div>


                            <div class="flex justify-between mr-[170px]">
                                <div class="flex gap-x-3">
                                    {{-- <input type="number"
                                    class="rounded-md w-25 text-center border border-gray-200 dark:border-gray-600 focus:outline-none bg-white dark:bg-zinc-600 dark:text-white"
                                    name="" id="" value="{{$cart->count}}" /> --}}

                                    <div class="number-input">
                                        <button
                                            wire:click="decreaseCart({{ $cart->product_id }} , {{ $cart->color_id }} , {{ $cart->guaranty_id }})"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus mt-[10px] pl-6" style="margin-top: 10px;padding-left: 24px;"></button>
                                        <input class="quantity" min="0" name="quantity"
                                            value="{{ $cart->count }}" type="number">
                                        <button
                                            wire:click="increaseCart({{ $cart->product_id }} , {{ $cart->color_id }} , {{ $cart->guaranty_id }})"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus mt-[10px] pl-6" style="margin-top: 10px;padding-left: 24px;"></button>
                                    </div>


                                    <button wire:click="deleteCart({{$cart->id}})">
                                        <div class="flex gap-x-1 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                        حذف
                                    </div>
                                    </button>
                                    <button wire:click="moveToReserveCart({{$cart->id}})">
                                        <div class="flex gap-x-1 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                        انتقال به لیست خرید بعدی
                                    </div>
                                    </button>
                                </div>

                                <h1 class="text-xl font-bold">
                                    {{ number_format($cart->ProductPrice($cart->product_id, $cart->color_id, $cart->guaranty_id)) }}
                                    تومان
                                </h1 class="text-xl font-bold">

                            </div>
                        </a>
                    @endforeach



                </div>
            </div>
        </section>
    </div>

    <!-- BuyButtonSection -->

    <div class="flex flex-col">
        <div class="">
            <div
                class="border border-orange-200 dark:border-zinc-800 rounded-lg p-[10px] bg-white dark:bg-zinc-800/10 shadow-md md:w-[70%]">
                <ul class="text-gray-600 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600">
                    <div class="flex text-sm mb-[10px]">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                            </svg>
                            دسته بندی
                        </li>
                        :
                        <li>قهوه عربیکا</li>
                    </div>
                    <div class="flex text-sm mb-[10px]">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            گارانتی
                        </li>
                        :
                        <li>دارد</li>
                    </div>
                    <div class="flex text-sm mb-[10px]">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                            برچسب
                        </li>
                        :
                        <li>قهوه عربیکا</li>
                        ,
                        <li>قهوه عربیکا</li>
                    </div>
                    <div class="flex text-sm mb-[10px]">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                            </svg>
                            دسته بندی
                        </li>
                        :
                        <li>قهوه عربیکا</li>
                    </div>
                </ul>
                <div
                    class="flex items-center text-gray-600 dark:text-white py-4 border-b border-gray-200 dark:border-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                    گارانتی اصالت و سلامت فیزیکی کالا
                </div>

                <ul>
                    <li>
                        <div class="flex justify-between font-DanaDemiBold items-center text-gray-500 py-2">
                            <div class="flex items-center gap-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                مبلغ کل
                            </div>

                            <div>
                                <span>{{number_format($total_price)}}</span>
                                <span>تومان</span>
                            </div>


                        </div>

                    </li>

                    <li>
                        <div class="flex justify-between font-DanaDemiBold items-center text-orange-300 py-1">
                            <div class="flex items-center gap-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                سود شما از خرید
                            </div>

                            <div>
                                <span>{{number_format($discount_price)}}</span>
                                <span>تومان</span>
                            </div>


                        </div>

                        <div class="flex justify-between font-DanaDemiBold items-center text-gray-500 py-1">
                            <div class="flex items-center gap-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                هزینه ارسال
                            </div>

                            <div>
                                <span>2,850,000 </span>
                                <span>تومان</span>
                            </div>


                        </div>
                    </li>
                </ul>





                <div class="flex justify-center flex-wrap md:justify-between text-gray-700 py-3">
                    <div>
                        <span class="block text-sm">نوع آسیاب</span>
                        <select
                            class="rounded-md w-40 border border-orange-200 dark:border-gray-600 focus:outline-none bg-white dark:bg-zinc-600 dark:text-white"
                            name="" id="">
                            <option>انتخاب کنید</option>
                            <option value="">ریز</option>
                            <option value="">درشت</option>
                        </select>
                    </div>
                    <div>
                        <span class="block text-sm">تعداد</span>
                        <input type="number"
                            class="rounded-md w-40 border border-orange-200 dark:border-gray-600 focus:outline-none bg-white dark:bg-zinc-600 dark:text-white"
                            name="" id="" value="1" />
                        <!-- </input> -->
                    </div>
                </div>

                <div class="">
                    <a href="{{route('shipping')}}"
                        class="cart-btn bg-orange-300 hover:bg-orange-400 transition-all inline-flex items-center justify-center w-full p-[10px] rounded-lg mb-[15px]">
                        <svg class="w-5 h-5 ml-2">
                            <use href="#shopping-cart"></use>
                        </svg>
                        ادامه ثبت سفارش
                    </a>
                </div>
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
                        <a href="#" class="border-b border-gray-300">
                            <div class="flex">
                                <div class="relative mb-2 md:mb-5">
                                    <img src="{{ url('admin/images/products/' . $cart->product->image) }}"
                                        alt="product-1" class="w-[170px]" />
                                </div>
                                <div>
                                    <h5
                                        class="font-DanaMedium text-sm md:text-xl text-zinc-700 dark:text-white line-clamp-2 md:min-h-[46px] min-h-[30px]">
                                        {{ $cart->product->title }}
                                    </h5>
                                    <ul class="text-gray-600 dark:text-gray-100">
                                        <div class="flex items-center gap-x-1 text-sm mb-[10px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <li class="text-base">رنگ</li>
                                            :
                                            <li class="text-base">{{ $cart->color->name }}</li>

                                        </div>
                                        <div class="flex items-center gap-x-1 text-sm mb-[10px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 6h.008v.008H6V6Z" />
                                            </svg>
                                            <li class="text-base">گارانتی</li>
                                            :
                                            <li class="text-base">{{ $cart->guaranty->name }}</li>

                                        </div>
                                        <div class="flex items-center gap-x-1 text-sm mb-[10px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <li class="text-base">گارانتی</li>
                                            :
                                            <li class="text-base">گارانتی</li>

                                        </div>

                                    </ul>
                                </div>


                            </div>


                            <div class="flex justify-between mr-[170px]">
                                <div class="flex gap-x-3">
                                    {{-- <input type="number"
                                    class="rounded-md w-25 text-center border border-gray-200 dark:border-gray-600 focus:outline-none bg-white dark:bg-zinc-600 dark:text-white"
                                    name="" id="" value="{{$cart->count}}" /> --}}

                                    <div class="number-input">
                                        <button
                                            wire:click="decreaseCart({{ $cart->product_id }} , {{ $cart->color_id }} , {{ $cart->guaranty_id }})"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                            class="minus"></button>
                                        <input class="quantity" min="0" name="quantity"
                                            value="{{ $cart->count }}" type="number">
                                        <button
                                            wire:click="increaseCart({{ $cart->product_id }} , {{ $cart->color_id }} , {{ $cart->guaranty_id }})"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                            class="plus"></button>
                                    </div>


                                    <button wire:click="deleteCart({{$cart->id}})">
                                        <div class="flex gap-x-1 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                        حذف
                                    </div>
                                    </button>
                                    <button wire:click="moveToMainCart({{$cart->id}})">
                                        <div class="flex gap-x-1 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>

                                        انتقال به لیست خرید اصلی
                                    </div>
                                    </button>
                                </div>

                                <h1 class="text-xl font-bold">
                                    {{ number_format($cart->ProductPrice($cart->product_id, $cart->color_id, $cart->guaranty_id)) }}
                                    تومان
                                </h1 class="text-xl font-bold">

                            </div>
                        </a>
                    @endforeach



                </div>
            </div>
        </section>
    </div>

    <!-- BuyButtonSection -->

    <div class="flex flex-col">
        <div class="">
            <div
                class="border border-orange-200 dark:border-zinc-800 rounded-lg p-[10px] bg-white dark:bg-zinc-800/10 shadow-md md:w-[70%]">
                {{-- <ul class="text-gray-600 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600">
                    <div class="flex text-sm mb-[10px]">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                            </svg>
                            دسته بندی
                        </li>
                        :
                        <li>قهوه عربیکا</li>
                    </div>
                    <div class="flex text-sm mb-[10px]">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            گارانتی
                        </li>
                        :
                        <li>دارد</li>
                    </div>
                    <div class="flex text-sm mb-[10px]">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                            برچسب
                        </li>
                        :
                        <li>قهوه عربیکا</li>
                        ,
                        <li>قهوه عربیکا</li>
                    </div>
                    <div class="flex text-sm mb-[10px]">
                        <li class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                            </svg>
                            دسته بندی
                        </li>
                        :
                        <li>قهوه عربیکا</li>
                    </div>
                </ul> --}}
                <div
                    class="flex items-center text-gray-600 dark:text-white py-4 border-b border-gray-200 dark:border-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                    گارانتی اصالت و سلامت فیزیکی کالا
                </div>

                <ul>
                    <li>
                        <div class="flex justify-between font-DanaDemiBold items-center text-gray-500 py-2">
                            <div class="flex items-center gap-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                مبلغ کل
                            </div>

                            <div>
                                <span>{{number_format($total_price)}}</span>
                                <span>تومان</span>
                            </div>


                        </div>

                    </li>

                    <li>
                        <div class="flex justify-between font-DanaDemiBold items-center text-orange-300 py-1">
                            <div class="flex items-center gap-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                سود شما از خرید
                            </div>

                            <div>
                                <span>{{number_format($discount_price)}}</span>
                                <span>تومان</span>
                            </div>


                        </div>

                        <div class="flex justify-between font-DanaDemiBold items-center text-gray-500 py-1">
                            <div class="flex items-center gap-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                هزینه ارسال
                            </div>

                            <div>
                                <span>2,850,000 </span>
                                <span>تومان</span>
                            </div>


                        </div>
                    </li>
                </ul>





                <div class="flex justify-center flex-wrap md:justify-between text-gray-700 py-3">
                    <div>
                        <span class="block text-sm">نوع آسیاب</span>
                        <select
                            class="rounded-md w-40 border border-orange-200 dark:border-gray-600 focus:outline-none bg-white dark:bg-zinc-600 dark:text-white"
                            name="" id="">
                            <option>انتخاب کنید</option>
                            <option value="">ریز</option>
                            <option value="">درشت</option>
                        </select>
                    </div>
                    <div>
                        <span class="block text-sm">تعداد</span>
                        <input type="number"
                            class="rounded-md w-40 border border-orange-200 dark:border-gray-600 focus:outline-none bg-white dark:bg-zinc-600 dark:text-white"
                            name="" id="" value="1" />
                        <!-- </input> -->
                    </div>
                </div>

                <div class="">
                    <a href=""
                        class="cart-btn bg-orange-300 hover:bg-orange-400 transition-all inline-flex items-center justify-center w-full p-[10px] rounded-lg mb-[15px]">
                        <svg class="w-5 h-5 ml-2">
                            <use href="#shopping-cart"></use>
                        </svg>
                        افزون به سبد خرید
                    </a>
                </div>
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

