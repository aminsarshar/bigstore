@extends('front.layouts.home')

@section('title')
    درباره ما
@endsection

@section('content')
<section class="py-16 bg-gray-50 dark:bg-zinc-800 my-25">
    <div class="container mx-auto px-4">

        <!-- عنوان -->
        <div class="text-center mb-14">
            <span
                class="inline-block px-4 py-2 rounded-full bg-orange-100 text-orange-500 font-DanaMedium mb-4">
                درباره ما
            </span>

            <h2 class="font-DanaDemiBold text-3xl md:text-5xl text-zinc-700 dark:text-white mb-5">
                گلدن کافی، تجربه‌ای متفاوت از دنیای قهوه
            </h2>

            <p class="max-w-3xl mx-auto text-zinc-500 dark:text-zinc-300 leading-8">
                ما در گلدن کافی با هدف ارائه بهترین دانه‌های قهوه و محصولات تخصصی
                این حوزه فعالیت می‌کنیم. کیفیت، تازگی و رضایت مشتری سه اصل مهمی
                هستند که از روز اول در تمامی خدمات ما رعایت شده‌اند.
            </p>
        </div>

        <!-- محتوا -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- تصویر -->
            <div class="relative">
                <div
                    class="absolute inset-0 bg-orange-300 rounded-3xl rotate-3">
                </div>

                <img
                    src="{{ asset('front/images/about.png') }}"
                    alt="about"
                    class="relative rounded-3xl shadow-xl w-full h-[300px] md:h-[500px] object-cover">
            </div>

            <!-- متن -->
            <div>

                <h3
                    class="font-DanaDemiBold text-2xl md:text-4xl text-zinc-700 dark:text-white mb-6">
                    عشق ما، قهوه با کیفیت است
                </h3>

                <p
                    class="text-zinc-600 dark:text-zinc-300 leading-8 mb-6">
                    در گلدن کافی تلاش می‌کنیم تا بهترین دانه‌های قهوه از مزارع
                    معتبر جهان انتخاب و پس از فرآوری و بسته‌بندی استاندارد در
                    اختیار شما قرار گیرد. از قهوه‌های تخصصی گرفته تا تجهیزات دم‌آوری،
                    همه چیز با دقت و وسواس انتخاب شده است.
                </p>

                <div class="space-y-4">

                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">
                            ✓
                        </div>

                        <span class="text-zinc-700 dark:text-white">
                            تضمین کیفیت و تازگی محصولات
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">
                            ✓
                        </div>

                        <span class="text-zinc-700 dark:text-white">
                            ارسال سریع به سراسر کشور
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center">
                            ✓
                        </div>

                        <span class="text-zinc-700 dark:text-white">
                            پشتیبانی و مشاوره تخصصی خرید
                        </span>
                    </div>

                </div>

            </div>

        </div>

        <!-- آمار -->
        <div
            class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-20">

            <div
                class="bg-white dark:bg-zinc-700 rounded-2xl p-6 text-center shadow">
                <h4 class="text-3xl font-DanaDemiBold text-orange-400">
                    +5000
                </h4>
                <p class="mt-2 text-zinc-500 dark:text-zinc-300">
                    مشتری راضی
                </p>
            </div>

            <div
                class="bg-white dark:bg-zinc-700 rounded-2xl p-6 text-center shadow">
                <h4 class="text-3xl font-DanaDemiBold text-orange-400">
                    +120
                </h4>
                <p class="mt-2 text-zinc-500 dark:text-zinc-300">
                    محصول متنوع
                </p>
            </div>

            <div
                class="bg-white dark:bg-zinc-700 rounded-2xl p-6 text-center shadow">
                <h4 class="text-3xl font-DanaDemiBold text-orange-400">
                    +8
                </h4>
                <p class="mt-2 text-zinc-500 dark:text-zinc-300">
                    سال تجربه
                </p>
            </div>

            <div
                class="bg-white dark:bg-zinc-700 rounded-2xl p-6 text-center shadow">
                <h4 class="text-3xl font-DanaDemiBold text-orange-400">
                    24/7
                </h4>
                <p class="mt-2 text-zinc-500 dark:text-zinc-300">
                    پشتیبانی
                </p>
            </div>

        </div>

    </div>
</section>
@endsection
