@extends('front.layouts.home')
@section('content')
@if ($result === 'successful')

<div class="container mx-auto px-4 py-16 my-28">

    <div class="mx-auto max-w-2xl">

        <div class="rounded-[32px] border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 shadow-sm overflow-hidden">

            <div class="p-10 text-center">

                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-emerald-100 dark:bg-emerald-900/30">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-12 w-12 text-emerald-600"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <h1 class="mt-8 text-3xl font-black text-zinc-900 dark:text-white">
                    پرداخت با موفقیت انجام شد
                </h1>

                <p class="mt-4 text-zinc-500 dark:text-zinc-400 leading-8">
                    سفارش شما با موفقیت ثبت شد.
                    کارشناسان ما در سریع‌ترین زمان ممکن سفارش را بررسی و ارسال خواهند کرد.
                </p>

            </div>

            <div class="border-t border-zinc-100 dark:border-zinc-800">

                <div class="grid grid-cols-2 gap-6 p-8">

                    <div>
                        <p class="text-sm text-zinc-500">
                            شماره سفارش
                        </p>

                        <p class="mt-2 font-bold text-zinc-900 dark:text-white">
                            #{{ $order->order_code }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">
                            مبلغ پرداخت
                        </p>

                        <p class="mt-2 font-bold text-emerald-600">
                            {{ number_format($order->total_price) }}
                            تومان
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">
                            وضعیت
                        </p>

                        <span class="mt-2 inline-flex rounded-full bg-emerald-100 px-3 py-1 text-sm font-bold text-emerald-700">
                            پرداخت شده
                        </span>
                    </div>

                    <div>
                        <p class="text-sm text-zinc-500">
                            تاریخ
                        </p>

                        <p class="mt-2 font-bold text-zinc-900 dark:text-white">
                            {{ verta($order->created_at)->format('Y/m/d H:i') }}
                        </p>
                    </div>

                </div>

            </div>

            <div class="flex flex-wrap justify-center gap-4 p-8 border-t border-zinc-100 dark:border-zinc-800">

                <a href="{{route('profile.orders')}}"
                   class="rounded-2xl bg-emerald-600 px-8 py-3 text-white transition hover:bg-emerald-700">

                    مشاهده سفارش

                </a>

                <a href="{{route('home.shop')}}"
                   class="rounded-2xl border border-zinc-300 dark:border-zinc-700 px-8 py-3 text-zinc-700 dark:text-zinc-300 transition hover:bg-zinc-100 dark:hover:bg-zinc-800">

                    بازگشت به فروشگاه

                </a>

            </div>

        </div>

    </div>

</div>
@else
<div class="container mx-auto px-4 py-16 my-28">

    <div class="mx-auto max-w-2xl">

        <div class="overflow-hidden rounded-[32px] border border-red-100 bg-white shadow-sm dark:border-red-900/30 dark:bg-zinc-900">

            <div class="p-10 text-center">

                <div
                    class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-12 w-12 text-red-600"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </div>

                <h1 class="mt-8 text-3xl font-black text-zinc-900 dark:text-white">
                    پرداخت ناموفق بود
                </h1>

                <p class="mt-4 leading-8 text-zinc-500 dark:text-zinc-400">
                    متأسفانه پرداخت شما تکمیل نشد و مبلغی از حساب شما کسر نگردید.
                    در صورت کسر وجه، مبلغ طی ۲۴ تا ۷۲ ساعت کاری توسط بانک به حساب شما باز خواهد گشت.
                </p>

            </div>

            <div class="border-y border-zinc-100 dark:border-zinc-800">

                <div class="grid grid-cols-2 gap-6 p-8">

                    <div>

                        <p class="text-sm text-zinc-500">
                            کد پیگیری
                        </p>

                        <p class="mt-2 font-bold text-zinc-900 dark:text-white">
                            {{ $order->order_code ?? '---' }}
                        </p>

                    </div>

                    <div>

                        <p class="text-sm text-zinc-500">
                            وضعیت
                        </p>

                        <span
                            class="mt-2 inline-flex rounded-full bg-red-100 px-3 py-1 text-sm font-bold text-red-700">

                            ناموفق

                        </span>

                    </div>

                    <div class="col-span-2">

                        <p class="text-sm text-zinc-500">
                            علت خطا
                        </p>

                        <p class="mt-2 text-red-600">
                            {{ $message ?? 'تراکنش توسط بانک یا درگاه پرداخت تأیید نشد.' }}
                        </p>

                    </div>

                </div>

            </div>

            <div
                class="flex flex-wrap justify-center gap-4 border-t border-zinc-100 p-8 dark:border-zinc-800">

                <a href=""
                   class="rounded-2xl bg-red-600 px-8 py-3 text-white transition hover:bg-red-700">

                    تلاش مجدد

                </a>

                <a href=""
                   class="rounded-2xl border border-zinc-300 px-8 py-3 text-zinc-700 transition hover:bg-zinc-100 dark:border-zinc-700 dark:text-zinc-300 dark:hover:bg-zinc-800">

                    بازگشت به سبد خرید

                </a>

                <a href=""
                   class="rounded-2xl border border-zinc-300 px-8 py-3 text-zinc-700 transition hover:bg-zinc-100 dark:border-zinc-700 dark:text-zinc-300 dark:hover:bg-zinc-800">

                    صفحه اصلی

                </a>

            </div>

        </div>

    </div>

</div>
@endif
@endsection
