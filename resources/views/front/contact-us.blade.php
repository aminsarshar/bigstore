@extends('front.layouts.home')

@section('title')
    تماس ما
@endsection

@section('content')
    <section class="py-16 bg-zinc-100 dark:bg-zinc-900 my-25">
        <div class="container mx-auto px-4">

            <!-- عنوان -->
            <div class="text-center mb-14">
                <h1 class="font-DanaDemiBold text-4xl text-zinc-800 dark:text-white mb-4">
                    تماس با ما
                </h1>
                <p class="text-zinc-500 dark:text-zinc-300 max-w-2xl mx-auto">
                    برای ثبت سفارش، دریافت مشاوره خرید، همکاری و یا هرگونه سوال با تیم
                    گلدن کافی در ارتباط باشید.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- اطلاعات تماس -->
                <div class="lg:col-span-1 space-y-5">

                    <div class="bg-white dark:bg-zinc-800 rounded-2xl p-6 shadow-lg border border-orange-100">

                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M2.25 6.75c0-1.243 1.007-2.25 2.25-2.25h15c1.243 0 2.25 1.007 2.25 2.25v10.5c0 1.243-1.007 2.25-2.25 2.25h-15c-1.243 0-2.25-1.007-2.25-2.25V6.75z" />
                                </svg>

                            </div>

                            <div>
                                <h4 class="font-DanaDemiBold text-zinc-800 dark:text-white">
                                    ایمیل
                                </h4>
                                <span class="text-zinc-500">
                                    info@goldencoffee.ir
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-zinc-800 rounded-2xl p-6 shadow-lg border border-orange-100">

                        <div class="flex items-center gap-4">
                            <div
                                class="w-14 h-14 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M2.25 4.5l5.25 1.5 1.5 6-3 3a16.5 16.5 0 008.25 8.25l3-3 6 1.5 1.5 5.25A2.25 2.25 0 0119.5 24C9.283 24 0 14.717 0 4.5A2.25 2.25 0 012.25 2.25L7.5 3.75" />
                                </svg>

                            </div>

                            <div>
                                <h4 class="font-DanaDemiBold text-zinc-800 dark:text-white">
                                    تلفن تماس
                                </h4>
                                <span class="text-zinc-500">
                                    021-12345678
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-zinc-800 rounded-2xl p-6 shadow-lg border border-orange-100">

                        <div class="flex items-center gap-4">
                            <div
                                class="w-14 h-14 rounded-xl bg-orange-100 text-orange-500 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 2.25c-4.97 0-9 4.03-9 9 0 6.75 9 10.5 9 10.5s9-3.75 9-10.5c0-4.97-4.03-9-9-9z" />
                                </svg>

                            </div>

                            <div>
                                <h4 class="font-DanaDemiBold text-zinc-800 dark:text-white">
                                    آدرس
                                </h4>
                                <span class="text-zinc-500">
                                    تهران، خیابان ولیعصر، پلاک ۱۲۳
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- فرم -->
                <div class="lg:col-span-2">

                    <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-lg p-8 border border-orange-100">

                        <h3 class="font-DanaDemiBold text-2xl text-zinc-800 dark:text-white mb-8">
                            ارسال پیام
                        </h3>

                        <form class="space-y-5">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <input type="text" placeholder="نام و نام خانوادگی"
                                    class="w-full h-12 rounded-xl border border-zinc-200 dark:border-zinc-600 bg-white dark:bg-zinc-700 px-4 focus:border-orange-400 outline-none">

                                <input type="text" placeholder="شماره موبایل"
                                    class="w-full h-12 rounded-xl border border-zinc-200 dark:border-zinc-600 bg-white dark:bg-zinc-700 px-4 focus:border-orange-400 outline-none">

                            </div>

                            <input type="email" placeholder="ایمیل"
                                class="w-full h-12 rounded-xl border border-zinc-200 dark:border-zinc-600 bg-white dark:bg-zinc-700 px-4 focus:border-orange-400 outline-none">

                            <input type="text" placeholder="موضوع"
                                class="w-full h-12 rounded-xl border border-zinc-200 dark:border-zinc-600 bg-white dark:bg-zinc-700 px-4 focus:border-orange-400 outline-none">

                            <textarea rows="6" placeholder="متن پیام شما..."
                                class="w-full rounded-xl border border-zinc-200 dark:border-zinc-600 bg-white dark:bg-zinc-700 p-4 focus:border-orange-400 outline-none"></textarea>

                            <button
                                class="bg-orange-400 hover:bg-orange-500 text-white px-8 py-3 rounded-xl transition-all">
                                ارسال پیام
                            </button>

                        </form>

                    </div>

                </div>

            </div>

            <!-- نقشه -->
            <div class="mt-12 bg-white dark:bg-zinc-800 rounded-2xl overflow-hidden shadow-lg border border-orange-100">

                <div class="h-[350px] bg-zinc-200 dark:bg-zinc-700 flex items-center justify-center">
                    <span class="text-zinc-500">
                        نقشه گوگل یا نشان اینجا قرار می‌گیرد
                    </span>
                </div>

            </div>

        </div>
    </section>
@endsection
