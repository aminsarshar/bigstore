@extends ('front.layouts.home')

@section ('title')
    تماس ما
@endsection

@section ('content')
    <section class="relative overflow-hidden bg-[#1c120d]">
        <!-- bg -->
        <div class="absolute inset-0">
            <img
                src="{{ asset('front/images/about.png') }}"
                class="w-full h-full object-cover opacity-20"
            />
        </div>

        <!-- glow -->
        <div
            class="absolute top-0 right-0 w-[800px] h-[800px] bg-orange-500/20 rounded-full blur-[150px]"
        ></div>

        <div class="container mx-auto px-5 relative z-10 mt-16">
            <div
                class="min-h-[700px] flex flex-col-reverse lg:flex-row items-center justify-between"
            >
                <!-- Content -->

                <div class="lg:w-1/2 text-center lg:text-right">
                    <span
                        class="inline-flex items-center px-5 py-2 rounded-full border border-orange-400 text-orange-300"
                    >
                        ☕ مجله تخصصی گلدن کافی
                    </span>

                    <h1
                        class="text-5xl lg:text-7xl font-black text-white mt-8 leading-tight"
                    >
                        دنیای قهوه را

                        <span class="text-orange-400 block"> کشف کنید </span>
                    </h1>

                    <p class="mt-8 text-gray-300 leading-9 max-w-xl">آموزش باریستا، راهنمای خرید، تجهیزات، اخبار و هر چیزی که باید درباره قهوه بدانید.</p>

                    <div
                        class="flex flex-wrap gap-4 mt-10 justify-center lg:justify-start"
                    >
                        <a
                            href="#blogs"
                            class="px-8 py-4 rounded-2xl bg-orange-400 hover:bg-orange-500 text-white"
                        >
                            مشاهده مقالات
                        </a>

                        <a
                            href="#"
                            class="px-8 py-4 rounded-2xl border border-white/20 text-white"
                        >
                            فروشگاه
                        </a>
                    </div>
                </div>

                <!-- Image -->

                <div class="lg:w-1/2">
                    <img
                        src="{{ asset('front/images/about.png') }}"
                        class="w-full max-w-3xl mx-auto rounded-xl"
                    />
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-zinc-800 py-10">
        <div class="container mx-auto px-4">
            <div class="bg-white dark:bg-zinc-700 rounded-3xl shadow-lg p-5">
                <div class="flex flex-col lg:flex-row gap-4">
                    <input
                        type="text"
                        placeholder="جستجو در مقالات..."
                        class="flex-1 h-14 rounded-2xl border border-orange-200 px-5"
                    />

                    <select
                        class="h-14 rounded-2xl border border-orange-200 px-5"
                    >
                        <option>همه دسته بندی ها</option>
                    </select>

                    <button
                        class="h-14 px-8 rounded-2xl bg-orange-400 text-white"
                    >
                        جستجو
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div
                class="grid lg:grid-cols-2 gap-8 bg-white dark:bg-zinc-700 rounded-[35px] overflow-hidden shadow-lg"
            >
                <img
                    src="{{ asset('front/images/about.png') }}"
                    class="w-full h-full object-cover"
                />

                <div class="p-10">
                    <span
                        class="bg-orange-100 text-orange-500 px-4 py-2 rounded-full"
                    >
                        مقاله ویژه
                    </span>

                    <h2 class="text-3xl font-bold mt-5">
                        چگونه بهترین اسپرسو را در خانه تهیه کنیم؟
                    </h2>

                    <p class="mt-5 leading-8 text-gray-500">راهنمای کامل انتخاب آسیاب، دما، فشار و عصاره گیری.</p>

                    <a href="#" class="inline-flex mt-8 text-orange-500">
                        مطالعه مقاله
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-14"
    >
        <!-- کارت بلاگ -->
        <div
            class="group bg-white dark:bg-zinc-700 rounded-[28px] overflow-hidden shadow-md hover:shadow-xl transition"
        >
            <div class="overflow-hidden">
                <img
                    src="{{ asset('front/images/about.png') }}"
                    class="w-full h-56 object-cover group-hover:scale-110 transition duration-500"
                />
            </div>

            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <span
                        class="bg-orange-100 text-orange-500 text-xs px-3 py-1 rounded-full"
                    >
                        دسته بندی
                    </span>

                    <span class="text-xs text-gray-400"> 1403/05/20 </span>
                </div>

                <h3
                    class="text-lg font-DanaDemiBold text-zinc-700 dark:text-white line-clamp-2 min-h-[56px]"
                >
                    عنوان مقاله
                </h3>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 line-clamp-3 leading-7">توضیحات کوتاه مقاله...</p>

                <a
                    href=""
                    class="inline-flex items-center mt-5 text-orange-500 font-DanaMedium"
                >
                    ادامه مطلب
                </a>
            </div>
        </div>
        <div
            class="group bg-white dark:bg-zinc-700 rounded-[28px] overflow-hidden shadow-md hover:shadow-xl transition"
        >
            <div class="overflow-hidden">
                <img
                    src="{{ asset('front/images/about.png') }}"
                    class="w-full h-56 object-cover group-hover:scale-110 transition duration-500"
                />
            </div>

            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <span
                        class="bg-orange-100 text-orange-500 text-xs px-3 py-1 rounded-full"
                    >
                        دسته بندی
                    </span>

                    <span class="text-xs text-gray-400"> 1403/05/20 </span>
                </div>

                <h3
                    class="text-lg font-DanaDemiBold text-zinc-700 dark:text-white line-clamp-2 min-h-[56px]"
                >
                    عنوان مقاله
                </h3>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 line-clamp-3 leading-7">توضیحات کوتاه مقاله...</p>

                <a
                    href=""
                    class="inline-flex items-center mt-5 text-orange-500 font-DanaMedium"
                >
                    ادامه مطلب
                </a>
            </div>
        </div>
        <div
            class="group bg-white dark:bg-zinc-700 rounded-[28px] overflow-hidden shadow-md hover:shadow-xl transition"
        >
            <div class="overflow-hidden">
                <img
                    src="{{ asset('front/images/about.png') }}"
                    class="w-full h-56 object-cover group-hover:scale-110 transition duration-500"
                />
            </div>

            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <span
                        class="bg-orange-100 text-orange-500 text-xs px-3 py-1 rounded-full"
                    >
                        دسته بندی
                    </span>

                    <span class="text-xs text-gray-400"> 1403/05/20 </span>
                </div>

                <h3
                    class="text-lg font-DanaDemiBold text-zinc-700 dark:text-white line-clamp-2 min-h-[56px]"
                >
                    عنوان مقاله
                </h3>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 line-clamp-3 leading-7">توضیحات کوتاه مقاله...</p>

                <a
                    href=""
                    class="inline-flex items-center mt-5 text-orange-500 font-DanaMedium"
                >
                    ادامه مطلب
                </a>
            </div>
        </div>
        <div
            class="group bg-white dark:bg-zinc-700 rounded-[28px] overflow-hidden shadow-md hover:shadow-xl transition"
        >
            <div class="overflow-hidden">
                <img
                    src="{{ asset('front/images/about.png') }}"
                    class="w-full h-56 object-cover group-hover:scale-110 transition duration-500"
                />
            </div>

            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <span
                        class="bg-orange-100 text-orange-500 text-xs px-3 py-1 rounded-full"
                    >
                        دسته بندی
                    </span>

                    <span class="text-xs text-gray-400"> 1403/05/20 </span>
                </div>

                <h3
                    class="text-lg font-DanaDemiBold text-zinc-700 dark:text-white line-clamp-2 min-h-[56px]"
                >
                    عنوان مقاله
                </h3>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 line-clamp-3 leading-7">توضیحات کوتاه مقاله...</p>

                <a
                    href=""
                    class="inline-flex items-center mt-5 text-orange-500 font-DanaMedium"
                >
                    ادامه مطلب
                </a>
            </div>
        </div>
        <div
            class="group bg-white dark:bg-zinc-700 rounded-[28px] overflow-hidden shadow-md hover:shadow-xl transition"
        >
            <div class="overflow-hidden">
                <img
                    src="{{ asset('front/images/about.png') }}"
                    class="w-full h-56 object-cover group-hover:scale-110 transition duration-500"
                />
            </div>

            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <span
                        class="bg-orange-100 text-orange-500 text-xs px-3 py-1 rounded-full"
                    >
                        دسته بندی
                    </span>

                    <span class="text-xs text-gray-400"> 1403/05/20 </span>
                </div>

                <h3
                    class="text-lg font-DanaDemiBold text-zinc-700 dark:text-white line-clamp-2 min-h-[56px]"
                >
                    عنوان مقاله
                </h3>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 line-clamp-3 leading-7">توضیحات کوتاه مقاله...</p>

                <a
                    href=""
                    class="inline-flex items-center mt-5 text-orange-500 font-DanaMedium"
                >
                    ادامه مطلب
                </a>
            </div>
        </div>
        <div
            class="group bg-white dark:bg-zinc-700 rounded-[28px] overflow-hidden shadow-md hover:shadow-xl transition"
        >
            <div class="overflow-hidden">
                <img
                    src="{{ asset('front/images/about.png') }}"
                    class="w-full h-56 object-cover group-hover:scale-110 transition duration-500"
                />
            </div>

            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <span
                        class="bg-orange-100 text-orange-500 text-xs px-3 py-1 rounded-full"
                    >
                        دسته بندی
                    </span>

                    <span class="text-xs text-gray-400"> 1403/05/20 </span>
                </div>

                <h3
                    class="text-lg font-DanaDemiBold text-zinc-700 dark:text-white line-clamp-2 min-h-[56px]"
                >
                    عنوان مقاله
                </h3>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 line-clamp-3 leading-7">توضیحات کوتاه مقاله...</p>

                <a
                    href=""
                    class="inline-flex items-center mt-5 text-orange-500 font-DanaMedium"
                >
                    ادامه مطلب
                </a>
            </div>
        </div>
    </div>
    <section id="blogs" class="py-14">
        <div class="container mx-auto px-4">
            <div
                class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
            ></div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div
                class="bg-gradient-to-l from-orange-400 to-orange-300 rounded-[40px] p-10 text-center"
            >
                <h2 class="text-4xl font-bold text-white">عضویت در خبرنامه</h2>

                <p class="text-white/80 mt-4">جدیدترین مقالات و آموزش‌های قهوه</p>

                <div
                    class="max-w-xl mx-auto flex flex-col md:flex-row gap-3 mt-8"
                >
                    <input
                        type="email"
                        placeholder="ایمیل شما"
                        class="flex-1 h-14 rounded-2xl px-5"
                    />

                    <button
                        class="h-14 px-8 bg-zinc-900 text-white rounded-2xl"
                    >
                        عضویت
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
