@extends('front.layouts.home')

@section('title')
    صفحه محصول
@endsection

@section('content')
    <main>
        <section class="category-banner mt-10 md:mt-[210px] mb-10">
            <div class="container">

                <livewire:front.products.single-product :products="$products"/>

                <div class="shadow-xl rounded-xl bg-white dark:bg-zinc-700 mt-10">
                    <div class="w-full">
                        <div class="relative left-0">
                            <ul class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60"
                                style="direction: ltr" data-tabs="tabs" role="list">
                                <li class="z-30 flex-auto text-center">
                                    <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 dark:text-gray-500 bg-inherit"
                                        data-tab-target="" active="" role="tab" aria-selected="true"
                                        aria-controls="app">
                                        <span class="ml-1">توضیحات تکمیلی</span>
                                    </a>
                                </li>
                                <li class="z-30 flex-auto text-center">
                                    <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 dark:text-gray-500 bg-inherit"
                                        data-tab-target="" role="tab" aria-selected="false" aria-controls="message">
                                        <span class="ml-1">توضیحات</span>
                                    </a>
                                </li>
                                <li class="z-30 flex-auto text-center">
                                    <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 dark:text-gray-500 bg-inherit"
                                        data-tab-target="" role="tab" aria-selected="false"
                                        aria-controls="settings">
                                        <span class="ml-1">معرفی محصول</span>
                                    </a>
                                </li>

                                <li class="z-30 flex-auto text-center">
                                    <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 dark:text-gray-500 bg-inherit"
                                        data-tab-target="" role="tab" aria-selected="false" aria-controls="desc">
                                        <span class="ml-1">نظرات</span>
                                    </a>
                                </li>
                            </ul>
                            <div data-tab-content="" class="p-5 mt-10 border-t border-gray-300">
                                <div class="block opacity-100" id="app" role="tabpanel">
                                    <div class="container">
                                        <div
                                            class="block-base antialiased font-light leading-relaxed text-inherit text-blue-gray-500">
                                            <div>
                                                <div class="">
                                                    <h2 class="flex items-center gap-x-2 text-gray-700 dark:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                                        </svg>
                                                        مشخصات کلی
                                                    </h2>
                                                </div>
                                                <ul class="mt-9 child:text-black child:dark:text-white">
                                                    <div
                                                        class="grid grid-cols-1 md:grid-cols-4 gap-x-2 child:rounded-l-md child:mt-4">
                                                        @foreach ($products->propertyGroups as $propertyGroup)
                                                            <li
                                                                class="desc-q bg-zinc-100 dark:bg-zinc-600 h-[47px] w-full p-[10px]">
                                                                {{ $propertyGroup->title }}
                                                            </li>
                                                            <li
                                                                class="desc-s bg-zinc-100 dark:bg-zinc-600 h-[47px] w-[80%] p-[10px]">
                                                                {{ $propertyGroup->properties->pluck('title')->implode(' , ') }}
                                                            </li>
                                                        @endforeach

                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden opacity-0" id="message" role="tabpanel">
                                    <h2 class="text-2xl">توضیحات محصول : قهوه بن مانو</h2>
                                    <p
                                        class="block text-base antialiased font-light leading-relaxed text-inherit text-blue-gray-500 mt-6">
                                        معرفی محصول دانه قهوه ویتالی از ترکیب 30% قهوه عربیکا و
                                        70% ربوستا با درجه برشته‌کاری مدیوم دارک تهیه شده است.
                                        میزان کافئین ویتالی بالا و طعم‌یاد شکلاتی دارد. به‌طور
                                        معمول، افراد به قصد خرید قهوه اسپرسو، دانه قهوه ویتالی را
                                        تهیه می‌کنند. اما دانه قهوه ویتالی را می‌توان به سایز پودر
                                        قهوه ترک و فرانسه آسیاب کرد و با دم‌افزارهایی مانند جذوه،
                                        فرنچ پرس و موکاپات قهوه تهیه کرد.
                                    </p>
                                </div>
                                <div class="hidden opacity-0" id="settings" role="tabpanel">
                                    <p
                                        class="block font-sans text-base antialiased font-light leading-relaxed text-inherit text-blue-gray-500">
                                        Comparing yourself to others is the thief of joy.
                                    </p>
                                </div>
                                <div class="hidden opacity-0" id="desc" role="tabpanel">
                                    <div>
                                        <h2 class="text-xl text-black dark:text-white">نظرت در مورد این محصول چیه؟</h2>
                                        <p class="text-gray-600 dark:text-gray-200 mt-3">
                                            برای ثبت نظر، از طریق دکمه افزودن دیدگاه جدید نمایید.
                                            اگر این محصول را قبلا خریده باشید، نظر شما به عنوان
                                            خریدار ثبت خواهد شد.
                                        </p>
                                    </div>

                                    <div class="container">
                                        <div class="lg:pr-[20%] mt-10">
                                            <h5 class="my-4 text-gray-600 dark:text-gray-200">امتیاز شما</h5>
                                            <div class="flex text-yellow-400 mb-4">
                                                <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-300 dark:text-gray-400">
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
                                            <textarea name="" id=""
                                                class="text-c bg-white dark:bg-zinc-600 w-[100%] h-[150px] border border-gray-200 dark:border-gray-600 lg:w-[75%] rounded-md focus:outline-orange-200"
                                                style="padding: 12px 20px" placeholder="نظر شما ! "></textarea>
                                            <div class="grid grid-cols-1 lg:grid-cols-2 lg:w-[75%]">
                                                <div class="block">
                                                    <label for=""
                                                        class="block my-2.5 text-teal-800 dark:text-teal-400">نقاط
                                                        قوت</label>
                                                    <input type="text"
                                                        class="bg-white dark:bg-zinc-600 border border-gray-200 dark:border-gray-600 rounded-md w-[97%] p-[5px] focus:outline-orange-200" />
                                                </div>
                                                <div>
                                                    <label for=""
                                                        class="block my-2.5 text-red-600 lg:mr-[10px]">نقاط ضعف</label>
                                                    <input type="text"
                                                        class="bg-white dark:bg-zinc-600 border border-gray-200 dark:border-gray-600 rounded-md w-[97%] p-[5px] lg:mr-[10px] focus:outline-orange-200" />
                                                </div>
                                            </div>
                                            <div class="lg:w-[75%]">
                                                <a href="#"
                                                    class="comment-btn flex-center w-full bg-emerald-500 hover:bg-emerald-600 text-white my-8 rounded-md p-1.5 transition-colors">
                                                    ثبت نظر
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach ($products->Subcomments as $comment)
                                    <div
                                        class="bg-gray-100 dark:bg-zinc-700 border dark:border-zinc-800 my-5 pb-5 rounded-md shadow-lg">
                                        <div class="block md:flex items-center justify-between p-5">
                                            <div class="flex items-center gap-x-2.5">
                                                <div class="bg-white flex items-center p-2 rounded-full"><img
                                                        src="./images/user.png" alt="" class=""
                                                        style="width: 50px;"></div>
                                                <span class="text-black dark:text-white">{{$comment->user->name}}</span>
                                                <span class="text-black dark:text-white">{{ verta($comment->created_at)->format('%d  %B   %Y') }}</span>
                                            </div>
                                            <div>
                                                <div class="flex justify-end text-yellow-400">
                                                    <svg class="w-4 h-4 md:w-6 md:h-6 text-gray-300 dark:text-gray-400">
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
                                        <div class="pr-10">
                                            <p class="text-black dark:text-white">{{$comment->body}}</p>
                                        </div>
                                        <div class="pr-6 md:pr-10 pt-10">
                                            <div
                                                class="flex gap-x-3 bg-emerald-200 w-[99%] md:w-[50%] py-2.5 px-2.5 rounded-xl mb-4 shadow-lg">
                                                <span class="font-DanaDemiBold">نقاط قوت</span>
                                                <span class="text-base ">سرعت در ارسال</span>
                                                <span class="text-base ">سرعت در ارسال</span>
                                            </div>
                                            <div
                                                class="flex gap-x-3 bg-red-200 w-[99%] md:w-[50%] py-2.5 px-2.5 rounded-xl shadow-lg">
                                                <span class="font-DanaDemiBold">نقاط قوت</span>
                                                <span class="text-base ">سرعت در ارسال</span>
                                                <span class="text-base ">سرعت در ارسال</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





    </main>


    <style>
        .container {
            max-width: 1420px !important;
        }


        .product-timeout .countdown-timer {
            direction: ltr;
            text-align: center;
            font-weight: bold;
            font-size: 25px;
        }

        .product-timeout .countdown-timer span {
            display: inline-block;
            width: 50px;
            height: 35px;
            position: relative;
        }

        .product-timeout .countdown-timer span[data-days]::before,
        .product-timeout .countdown-timer span[data-hours]::before,
        .product-timeout .countdown-timer span[data-minutes]::before,
        .product-timeout .countdown-timer span[data-seconds]::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -14px;
            font-size: 11px;
            color: #aba1a1;
        }

        .product-timeout .countdown-timer span[data-days]::before {
            content: "روز";
        }

        .product-timeout .countdown-timer span[data-hours]::before {
            content: "ساعت";
        }

        .product-timeout .countdown-timer span[data-minutes]::before {
            content: "دقیقه";
        }

        .product-timeout .countdown-timer span[data-seconds]::before {
            content: "ثانیه";
        }

        #countdown-verify-end {
            display: inline-block;
            margin-bottom: 0;
        }

        #countdown-verify-end span {
            float: left;
        }

        #countdown-verify-end span.day {
            display: none;
        }

        #countdown-verify-end span.hour {
            display: none;
        }

        #countdown-verify-end a.btn-link-border {
            float: right;
            margin-top: -1px;
            color: #f7858d;
            font-weight: bold;
        }

        #countdown-verify-end a.btn-link-border:after {
            border-color: #f7858d;
        }




        .product-variant {
            margin: 20px 0 10px;
            color: #6f6f6f;
            vertical-align: top;
            font-size: 13px;
            font-size: .929rem;
            line-height: 1.692;
        }

        .product-variant>span {
            font-size: inherit;
            color: inherit;
            padding-left: 15px;
            margin-top: 3px;
            float: right;
        }

        .product-variants {
            margin-right: -8px;
            list-style: none;
            padding: 0;
            display: inline-block;
            margin-bottom: 0;
        }

        .ui-variant {
            display: inline-block;
            position: relative;
        }

        .product-variants li {
            margin: 0 8px 8px 0;
            display: inline-block;
        }

        .ui-variant {
            display: inline-block;
            position: relative;
        }

        .ui-variant--color .ui-variant-shape {
            width: 18px;
            height: 18px;
            position: absolute;
            right: 8px;
            top: 8px;
            border-radius: 50%;
            background: #ccc;
            border: 1px solid #000;
            content: "";
            cursor: pointer;
        }

        .ui-variant input[type=radio] {
            visibility: hidden;
            position: absolute;
        }

        .ui-variant--check {
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 10px;
            color: #6f6f6f;
            padding: 3px 10px;
            font-size: 13px;
            font-size: .929rem;
            line-height: 1.692;
            display: block;
            -webkit-box-shadow: 0 2px 6px 0 rgba(51, 73, 94, 0.1);
            box-shadow: 0 2px 6px 0 rgba(51, 73, 94, 0.1);
        }

        .ui-variant--color .ui-variant--check {
            padding-right: 37px;
        }

        input[type=radio]:checked+.ui-variant--check {
            border-color: #f7858d;
        }

        .checkout-variant {
            font-size: 13px;
            line-height: 1.692;
            margin: 7px 0;
        }

        .checkout-variant-value {
            position: relative;
            margin-right: 8px;
        }

        .checkout-variant--color .checkout-variant-value {
            padding-left: 25px;
        }

        .checkout-variant--color .checkout-variant-shape {
            width: 17px;
            height: 17px;
            border-radius: 5px;
            border: 1px solid #bdbdbd;
            position: absolute;
            left: 0;
            top: 3px;
        }
    </style>


    <style>
        .swiper-button-next:after,
        .swiper-button-prev:after {
            color: orange !important;
            font-size: 25px !important;
            background: rgb(245, 245, 245) !important;
            padding: 8px !important;
            border-radius: 8px !important;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            #52525b
        }

        html.dark .swiper-button-next:after,
        html.dark .swiper-button-prev:after {

            background: #52525b !important;
        }

        .swiper-slide>* {
            padding: 10px !important;
            border-radius: 0px !important;
        }

        .swiper-free-mode>.swiper-wrapper {
            padding-top: 10px !important;
        }
    </style>

    <!-- from node_modules -->
    <script src="node_modules/@material-tailwind/html/scripts/tabs.js"></script>

    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
    <script src="{{ asset('front/scripts/swiper-bundle.min.js') }}"></script>


    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
@endsection
