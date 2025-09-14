@extends('front.layouts.home') @section('script')

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const btn = document.getElementById("toggleBtn");
        const content = document.getElementById("collapseContent");
        const icon = document.getElementById("toggleIcon");

        btn.addEventListener("click", () => {
            const expanded = btn.getAttribute("aria-expanded") === "true";

            if (!expanded) {
                // باز کردن: مقدار max-height را به ارتفاع واقعی محتوا می‌گذاریم
                content.style.maxHeight = content.scrollHeight + "px";
                btn.setAttribute("aria-expanded", "true");
                icon.classList.add("open");

                // بعد از پایان transition، max-height را none می‌کنیم تا محتوای داینامیک مشکلی نداشته باشد
                const onEnd = () => {
                    if (btn.getAttribute("aria-expanded") === "true") {
                        content.style.maxHeight = "none";
                    }
                    content.removeEventListener("transitionend", onEnd);
                };
                content.addEventListener("transitionend", onEnd);
            } else {
                // بستن: اگر الان max-height برابر none است، اول آن را به scrollHeight برمی‌گردانیم تا transition کار کند
                if (
                    content.style.maxHeight === "none" ||
                    getComputedStyle(content).maxHeight === "none"
                ) {
                    content.style.maxHeight = content.scrollHeight + "px";
                    // force reflow
                    content.offsetHeight;
                }
                // سپس آن را صفر می‌کنیم تا انیمیشن بسته شدن انجام شود
                content.style.maxHeight = "0px";
                btn.setAttribute("aria-expanded", "false");
                icon.classList.remove("open");
            }
        });

        // اگر صفحه ری‌سایز شد و پنل باز بود، ارتفاع را به‌روز کن
        window.addEventListener("resize", () => {
            if (btn.getAttribute("aria-expanded") === "true") {
                // اگر maxHeight none است، دوباره مقدار واقعی قرار می‌گیرد
                if (content.style.maxHeight === "none") {
                    content.style.maxHeight = content.scrollHeight + "px";
                    // بعد از مدتی مجدداً none کن (یا می‌شه این را حذف کرد)
                    setTimeout(() => {
                        content.style.maxHeight = "none";
                    }, 350);
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            }
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        const btn = document.getElementById("toggleBtn2");
        const content = document.getElementById("collapseContent2");
        const icon = document.getElementById("toggleIcon");

        btn.addEventListener("click", () => {
            const expanded = btn.getAttribute("aria-expanded") === "true";

            if (!expanded) {
                // باز کردن: مقدار max-height را به ارتفاع واقعی محتوا می‌گذاریم
                content.style.maxHeight = content.scrollHeight + "px";
                btn.setAttribute("aria-expanded", "true");
                icon.classList.add("open");

                // بعد از پایان transition، max-height را none می‌کنیم تا محتوای داینامیک مشکلی نداشته باشد
                const onEnd = () => {
                    if (btn.getAttribute("aria-expanded") === "true") {
                        content.style.maxHeight = "none";
                    }
                    content.removeEventListener("transitionend", onEnd);
                };
                content.addEventListener("transitionend", onEnd);
            } else {
                // بستن: اگر الان max-height برابر none است، اول آن را به scrollHeight برمی‌گردانیم تا transition کار کند
                if (
                    content.style.maxHeight === "none" ||
                    getComputedStyle(content).maxHeight === "none"
                ) {
                    content.style.maxHeight = content.scrollHeight + "px";
                    // force reflow
                    content.offsetHeight;
                }
                // سپس آن را صفر می‌کنیم تا انیمیشن بسته شدن انجام شود
                content.style.maxHeight = "0px";
                btn.setAttribute("aria-expanded", "false");
                icon.classList.remove("open");
            }
        });

        // اگر صفحه ری‌سایز شد و پنل باز بود، ارتفاع را به‌روز کن
        window.addEventListener("resize", () => {
            if (btn.getAttribute("aria-expanded") === "true") {
                // اگر maxHeight none است، دوباره مقدار واقعی قرار می‌گیرد
                if (content.style.maxHeight === "none") {
                    content.style.maxHeight = content.scrollHeight + "px";
                    // بعد از مدتی مجدداً none کن (یا می‌شه این را حذف کرد)
                    setTimeout(() => {
                        content.style.maxHeight = "none";
                    }, 350);
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            }
        });
    });
</script>
@endsection @section('content')
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
                <div
                    class="flex bg-slate-100 p-0.5 relative rounded-lg"
                    role="tablist"
                >
                    <div
                        class="absolute top-1 left-0.5 h-8 bg-white rounded-md shadow-sm transition-all duration-300 transform scale-x-0 translate-x-0 tab-indicator z-0"
                    ></div>
                </div>
                <div class="mt-4 tab-content-container">
                    <div
                        id="tab1-group"
                        class="tab-content text-slate-800 block"
                    >
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
                                            <div class="border border-gray-100">
                                                <div
                                                    class="xl:flex xl:justify-between md:block mb-2 md:mb-5"
                                                >
                                                    <div>
                                                        <span
                                                            class="lg:text-xl xl:text-base"
                                                            >گیرنده :
                                                        </span>
                                                        <span
                                                            class="lg:text-xl xl:text-base"
                                                            >امین سرشار</span
                                                        >
                                                    </div>
                                                </div>
                                                <div
                                                    class="xl:flex md:block mb-2 md:mb-5"
                                                >
                                                    <div>
                                                        <span
                                                            class="lg:text-lg xl:text-base"
                                                            >شماره تماس :
                                                        </span>
                                                        <span
                                                            class="lg:text-lg xl:text-base xl:ml-[10px]"
                                                            >09336116359</span
                                                        >
                                                    </div>
                                                    |
                                                    <div>
                                                        <span
                                                            class="lg:text-lg xl:text-base xl:mr-[10px]"
                                                            >شماره تماس :
                                                        </span>
                                                        <span
                                                            class="lg:text-lg xl:text-base"
                                                            >09336116359</span
                                                        >
                                                    </div>
                                                </div>
                                                <div
                                                    class="xl:flex md:block mb-2 md:mb-5"
                                                >
                                                    <div>
                                                        <span
                                                            class="lg:text-xl xl:text-base"
                                                            >استان :
                                                        </span>
                                                        <span
                                                            class="lg:text-xl xl:text-base"
                                                            >البرز</span
                                                        >
                                                    </div>
                                                    ,
                                                    <div>
                                                        <span
                                                            class="lg:text-xl xl:text-base mr-4"
                                                            >استان :
                                                        </span>
                                                        <span
                                                            class="lg:text-xl xl:text-base"
                                                            >البرز</span
                                                        >
                                                    </div>
                                                </div>

                                                <div
                                                    class="w-full max-w-md mx-auto"
                                                >
                                                    <!-- دکمه کوچک -->
                                                    <button
                                                        id="toggleBtn"
                                                        aria-expanded="false"
                                                        aria-controls="collapseContent"
                                                        style="background-color: rgb(253 186 116 / 0.2);color: rgb(253 186 116 / var(--tw-text-opacity));"
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
                                                        <form
                                                            class="p-4 space-y-4"
                                                        >
                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700"
                                                                    >آدرس</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    placeholder="خیابان، کوچه، پلاک..."
                                                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                />
                                                            </div>

                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700"
                                                                    >شهر</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    placeholder="نام شهر"
                                                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                />
                                                            </div>

                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700"
                                                                    >کد
                                                                    پستی</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    placeholder="کد پستی"
                                                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                />
                                                            </div>

                                                            <button
                                                                type="submit"
                                                                class="w-full bg-orange-300 text-white py-2 rounded-lg hover:bg-orange-400 transition"
                                                            >
                                                                ثبت تغییرات
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <style>
                                                    /* انیمیشن نرم برای محتوا */
                                                    .collapse-content,.collapse-content2 {
                                                        max-height: 0;
                                                        overflow: hidden;
                                                        transition: max-height
                                                            350ms
                                                            cubic-bezier(
                                                                0.4,
                                                                0,
                                                                0.2,
                                                                1
                                                            );
                                                    }

                                                    /* انیمیشن چرخش آیکون */
                                                    .chev,.chev2 {
                                                        transition: transform
                                                            250ms ease;
                                                        transform-origin: center;
                                                        display: inline-block;
                                                    }
                                                    .chev.open{
                                                        transform: rotate(
                                                            180deg
                                                        );
                                                    }
                                                </style>
                                            </div>

                                            <div>
                                                <div
                                                    class="w-full max-w-md mx-auto"
                                                >
                                                    <!-- دکمه کوچک -->
                                                    <button
                                                        id="toggleBtn2"
                                                        aria-expanded="false"
                                                        aria-controls="collapseContent2"
                                                        style="background-color: rgb(253 186 116 / 0.2);color: rgb(253 186 116 / var(--tw-text-opacity));"
                                                        class="flex items-center gap-2 px-3 py-1.5 text-white rounded-md text-sm hover:bg-orange-400"
                                                    >
                                                        <!-- آیکون کوچک -->
                                                        <svg
                                                            id="toggleIcon2"
                                                            class="w-4 h-4 chev"
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

                                                        <span>ثبت آدرس جدید</span>
                                                    </button>

                                                    <!-- محتوای اسلایدی -->
                                                    <div
                                                        id="collapseContent2"
                                                        class="collapse-content mt-2 rounded-lg shadow bg-white"
                                                    >
                                                        <form
                                                            class="p-4 space-y-4"
                                                        >
                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700"
                                                                    >آدرس</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    placeholder="خیابان، کوچه، پلاک..."
                                                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                />
                                                            </div>

                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700"
                                                                    >شهر</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    placeholder="نام شهر"
                                                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                />
                                                            </div>

                                                            <div>
                                                                <label
                                                                    class="block text-sm font-medium text-gray-700"
                                                                    >کد
                                                                    پستی</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    placeholder="کد پستی"
                                                                    class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                />
                                                            </div>

                                                            <button
                                                                type="submit"
                                                                class="w-full bg-orange-300 text-white py-2 rounded-lg hover:bg-orange-400 transition"
                                                            >
                                                                ثبت تغییرات
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="flex flex-col">
                                <div class="">
                                    <div
                                        class="border border-orange-200 dark:border-zinc-800 rounded-lg p-[10px] bg-white dark:bg-zinc-800/10 shadow-md md:w-[70%]"
                                    >
                                        <ul
                                            class="text-gray-600 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600"
                                        >
                                            <div class="flex text-sm mb-[10px]">
                                                <li class="flex">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="size-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"
                                                        />
                                                    </svg>
                                                    دسته بندی
                                                </li>
                                                :
                                                <li>قهوه عربیکا</li>
                                            </div>
                                            <div class="flex text-sm mb-[10px]">
                                                <li class="flex">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="size-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                        />
                                                    </svg>
                                                    گارانتی
                                                </li>
                                                :
                                                <li>دارد</li>
                                            </div>
                                            <div class="flex text-sm mb-[10px]">
                                                <li class="flex">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="size-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z"
                                                        />
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M6 6h.008v.008H6V6Z"
                                                        />
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
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="size-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"
                                                        />
                                                    </svg>
                                                    دسته بندی
                                                </li>
                                                :
                                                <li>قهوه عربیکا</li>
                                            </div>
                                        </ul>
                                        <div
                                            class="flex items-center text-gray-600 dark:text-white py-4 border-b border-gray-200 dark:border-white/10"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="size-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"
                                                />
                                            </svg>
                                            گارانتی اصالت و سلامت فیزیکی کالا
                                        </div>

                                        <ul>
                                            <li>
                                                <div
                                                    class="flex justify-between font-DanaDemiBold items-center text-gray-500 py-2"
                                                >
                                                    <div
                                                        class="flex items-center gap-x-1"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="size-6"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                            />
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
                                                    class="flex justify-between font-DanaDemiBold items-center text-orange-300 py-1"
                                                >
                                                    <div
                                                        class="flex items-center gap-x-1"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="size-6"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                            />
                                                        </svg>
                                                        سود شما از خرید
                                                    </div>

                                                    <div>
                                                        <span>32232</span>
                                                        <span>تومان</span>
                                                    </div>
                                                </div>

                                                <div
                                                    class="flex justify-between font-DanaDemiBold items-center text-gray-500 py-1"
                                                >
                                                    <div
                                                        class="flex items-center gap-x-1"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="size-6"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M14.121 7.629A3 3 0 0 0 9.017 9.43c-.023.212-.002.425.028.636l.506 3.541a4.5 4.5 0 0 1-.43 2.65L9 16.5l1.539-.513a2.25 2.25 0 0 1 1.422 0l.655.218a2.25 2.25 0 0 0 1.718-.122L15 15.75M8.25 12H12m9 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                            />
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
                                            class="flex justify-center flex-wrap md:justify-between text-gray-700 py-3"
                                        >
                                            <div>
                                                <span class="block text-sm"
                                                    >نوع آسیاب</span
                                                >
                                                <select
                                                    class="rounded-md w-40 border border-orange-200 dark:border-gray-600 focus:outline-none bg-white dark:bg-zinc-600 dark:text-white"
                                                    name=""
                                                    id=""
                                                >
                                                    <option>انتخاب کنید</option>
                                                    <option value="">
                                                        ریز
                                                    </option>
                                                    <option value="">
                                                        درشت
                                                    </option>
                                                </select>
                                            </div>
                                            <div>
                                                <span class="block text-sm"
                                                    >تعداد</span
                                                >
                                                <input
                                                    type="number"
                                                    class="rounded-md w-40 border border-orange-200 dark:border-gray-600 focus:outline-none bg-white dark:bg-zinc-600 dark:text-white"
                                                    name=""
                                                    id=""
                                                    value="1"
                                                />
                                                <!-- </input> -->
                                            </div>
                                        </div>

                                        <div class="">
                                            <a
                                                href=""
                                                class="cart-btn bg-orange-300 hover:bg-orange-400 transition-all inline-flex items-center justify-center w-full p-[10px] rounded-lg mb-[15px]"
                                            >
                                                <svg class="w-5 h-5 ml-2">
                                                    <use
                                                        href="#shopping-cart"
                                                    ></use>
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
