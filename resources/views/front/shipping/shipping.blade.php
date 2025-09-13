@extends('front.layouts.home')
@section('content')
    <main>
        <div class="md:mx-20">
            <section class="category-banner mt-36 mb-36 md:my-36">
                <div class="md:pb-10">
                    <ul class="flex gap-x-2.5 text-gray-500 dark:text-gray-100">
                        <li><a href="">خانه</a></li>
                        /
                        <li><a href="">سبد خرید</a></li>
                    </ul>
                </div>

                <div class="relative tab-group">
                    <div class="flex bg-slate-100 p-0.5 relative rounded-lg" role="tablist">
                        <div
                            class="absolute top-1 left-0.5 h-8 bg-white rounded-md shadow-sm transition-all duration-300 transform scale-x-0 translate-x-0 tab-indicator z-0">
                        </div>
                    </div>
                    <div class="mt-4 tab-content-container">
                        <div id="tab1-group" class="tab-content text-slate-800 block">
                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                                <!-- ProductsSection -->



                                <!-- BuyButtonSection -->


                                <div class="md:col-span-2 bg-white dark:bg-zinc-700 p-8 rounded-md shadow-md">
                                    <section class="" id="products-section">
                                        <div class="container">
                                            <!-- Section Body -->
                                            <div
                                                class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 gap-3.5 md:gap-5 child:md:p-5 child:p-2  child:bg-white child:dark:bg-zinc-700 child:rounded-2xl child:shadow-normal child:dark:shadow-normal">
                                                <div class="border border-gray-100">
                                                    <div class="xl:flex xl:justify-between md:block mb-2 md:mb-5">
                                                        <div>
                                                        <span class="lg:text-xl xl:text-base">گیرنده : </span>
                                                        <span class="lg:text-xl xl:text-base">امین سرشار</span>
                                                        </div>
                                                        <span class="text-red-500 border-b border-b-red-500"><a class="" href="">اصلاح این آدرس</a></span>
                                                    </div>
                                                    <div class="xl:flex md:block mb-2 md:mb-5">
                                                        <div>
                                                        <span class="lg:text-lg xl:text-base">شماره تماس : </span>
                                                        <span class="lg:text-lg xl:text-base xl:ml-[10px]">09336116359</span>
                                                        </div>
                                                        |
                                                        <div>
                                                        <span class="lg:text-lg xl:text-base xl:mr-[10px]">شماره تماس : </span>
                                                        <span class="lg:text-lg xl:text-base">09336116359</span>
                                                        </div>
                                                    </div>
                                                        <div class="xl:flex md:block mb-2 md:mb-5">
                                                        <div>
                                                        <span class="lg:text-xl xl:text-base">استان : </span>
                                                        <span class="lg:text-xl xl:text-base">البرز</span>
                                                        </div>
                                                        ,
                                                        <div>
                                                        <span class="lg:text-xl xl:text-base mr-4">استان : </span>
                                                        <span class="lg:text-xl xl:text-base">البرز</span>
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
                                                            <svg
                                                                class="w-4 h-4 md:w-6 md:h-6 text-gray-300 dark:text-gray-400">
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


                                                </div>

                                                <div class="text-end">
                                                    <a href="#" class="section-link">
                                                    <span class="hidden md:inline-block">مشاهده همه نتایج</span>
                                                   <span class="inline-block md:hidden">مشاهده همه</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                                                <div class="flex flex-col">
                                    <div class="">
                                        <div
                                            class="border border-orange-200 dark:border-zinc-800 rounded-lg p-[10px] bg-white dark:bg-zinc-800/10 shadow-md md:w-[70%]">
                                            <ul
                                                class="text-gray-600 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600">
                                                <div class="flex text-sm mb-[10px]">
                                                    <li class="flex">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
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
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
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
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 6h.008v.008H6V6Z" />
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
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                                </svg>
                                                گارانتی اصالت و سلامت فیزیکی کالا
                                            </div>

                                            <ul>
                                                <li>
                                                    <div
                                                        class="flex justify-between font-DanaDemiBold items-center text-gray-500 py-2">
                                                        <div class="flex items-center gap-x-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            مبلغ کل
                                                        </div>

                                                        <div>
                                                            <span>12123</span>
                                                            <span>تومان</span>
                                                        </div>


                                                    </div>

                                                </li>

                                                <li>
                                                    <div
                                                        class="flex justify-between font-DanaDemiBold items-center text-orange-300 py-1">
                                                        <div class="flex items-center gap-x-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            سود شما از خرید
                                                        </div>

                                                        <div>
                                                            <span>32232</span>
                                                            <span>تومان</span>
                                                        </div>


                                                    </div>

                                                    <div
                                                        class="flex justify-between font-DanaDemiBold items-center text-gray-500 py-1">
                                                        <div class="flex items-center gap-x-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
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





                                            <div
                                                class="flex justify-center flex-wrap md:justify-between text-gray-700 py-3">
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
                                                    تایید و ادامه ثبت سفارش
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
