@extends('front.profile.layouts.app')

@section('profile-content')
<div class="bg-white dark:bg-zinc-800 rounded-3xl shadow-sm p-6">

    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="font-DanaDemiBold text-2xl">
                سفارش‌های من
            </h2>
            <p class="text-gray-400 text-sm mt-1">
                {{ $orders->total() }} سفارش ثبت شده
            </p>
        </div>
    </div>

    @forelse($orders as $order)

        <div
            class="border border-gray-200 dark:border-zinc-700 rounded-3xl p-6 mb-5 hover:shadow-lg hover:border-orange-400 transition-all duration-300">

            {{-- Header --}}
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                <div>

                    <div class="flex items-center gap-2">

                        <span class="text-gray-400">
                            شماره سفارش
                        </span>

                        <span class="font-DanaDemiBold text-lg text-orange-500">
                            #{{ $order->order_code }}
                        </span>

                    </div>

                    <div class="mt-2 text-sm text-gray-400">

                        {{ verta($order->created_at)->format('Y/m/d - H:i') }}

                    </div>

                </div>

                @if($order->status)

                    <span
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-600">

                        <span class="w-2 h-2 rounded-full bg-green-500"></span>

                        پرداخت موفق

                    </span>

                @else

                    <span
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-600">

                        <span class="w-2 h-2 rounded-full bg-red-500"></span>

                        ناموفق

                    </span>

                @endif

            </div>

            {{-- Info --}}
            <div class="grid md:grid-cols-3 gap-6 mt-8">

                <div>

                    <p class="text-gray-400 text-sm">
                        مبلغ سفارش
                    </p>

                    <h4 class="font-DanaDemiBold text-xl text-orange-500 mt-2">

                        {{ number_format($order->total_price) }}

                        <span class="text-sm">
                            تومان
                        </span>

                    </h4>

                </div>

                <div>

                    <p class="text-gray-400 text-sm">
                        تعداد کالا
                    </p>

                    <h4 class="font-DanaDemiBold text-xl mt-2">

                        {{ $order->items()->count() }}

                    </h4>

                </div>

                <div>

                    <p class="text-gray-400 text-sm">
                        کد پیگیری
                    </p>

<h4 class="font-DanaDemiBold text-lg mt-2 break-all text-left">

    {{ $order->transaction_id ?: 'ثبت نشده' }}

</h4>

                </div>

            </div>

            {{-- Footer --}}
            <div class="mt-8 flex justify-end">

                <a href="{{ route('profile.order.show',$order) }}"
                    class="flex items-center gap-2 text-orange-500 hover:text-orange-600 font-DanaDemiBold transition">

                    مشاهده جزئیات

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"/>

                    </svg>

                </a>

            </div>

        </div>

    @empty

        <div
            class="rounded-3xl border-2 border-dashed border-gray-300 py-20 text-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-16 h-16 mx-auto text-gray-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4"/>

            </svg>

            <h3 class="font-DanaDemiBold text-xl mt-6">

                هنوز سفارشی ثبت نکرده‌اید

            </h3>

            <p class="text-gray-400 mt-3">

                اولین خرید خود را از فروشگاه انجام دهید.

            </p>

            <a href="{{ route('home.shop') }}"
                class="inline-flex mt-6 px-6 py-3 rounded-xl bg-orange-500 text-white hover:bg-orange-600 transition">

                مشاهده محصولات

            </a>

        </div>

    @endforelse

    <div class="mt-8">

        {{ $orders->links() }}

    </div>

</div>
@endsection
