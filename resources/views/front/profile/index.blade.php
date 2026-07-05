@extends('front.layouts.home')

@section('content')

<section class="py-12">

    <div class="container mx-auto px-4">

        <div class="grid grid-cols-12 gap-8">

            {{-- Sidebar --}}
            <div class="col-span-12 lg:col-span-3">

                <div class="bg-white dark:bg-zinc-900 rounded-[32px] shadow-sm border border-zinc-100 dark:border-zinc-800 overflow-hidden">

                    <div class="p-8 text-center border-b border-zinc-100 dark:border-zinc-800">

                        <div class="w-24 h-24 rounded-full bg-orange-100 flex items-center justify-center mx-auto">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-10 h-10 text-orange-500"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                            </svg>

                        </div>

                        <h3 class="font-DanaDemiBold text-xl mt-5">

                            {{ auth()->user()->name }}

                        </h3>

                        <p class="text-gray-400 mt-2">

                            {{ auth()->user()->mobile }}

                        </p>

                    </div>

                    <div class="p-4 space-y-2">

                        <a href="{{ route('profile') }}"
                           class="flex items-center gap-3 h-12 rounded-2xl px-4 bg-orange-500 text-white">

                            📊

                            داشبورد

                        </a>

                        <a href="{{ route('profile.orders') }}"
                           class="flex items-center gap-3 h-12 rounded-2xl px-4 hover:bg-orange-50">

                            📦

                            سفارش های من

                        </a>

                        <a href="{{ route('profile.addresses') }}"
                           class="flex items-center gap-3 h-12 rounded-2xl px-4 hover:bg-orange-50">

                            📍

                            آدرس ها

                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center gap-3 h-12 rounded-2xl px-4 hover:bg-orange-50">

                            ⚙️

                            اطلاعات حساب

                        </a>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button class="w-full flex items-center gap-3 h-12 rounded-2xl px-4 hover:bg-red-50 text-red-500">

                                🚪

                                خروج

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            {{-- Content --}}
            <div class="col-span-12 lg:col-span-9">

                <div class="grid md:grid-cols-4 gap-5">

                    <div class="rounded-[28px] bg-white p-6 shadow-sm border">

                        <p class="text-gray-400">

                            سفارش ها

                        </p>

                        <h3 class="text-4xl font-DanaDemiBold mt-4 text-orange-500">

                            {{ auth()->user()->orders()->count() }}

                        </h3>

                    </div>

                    <div class="rounded-[28px] bg-white p-6 shadow-sm border">

                        <p class="text-gray-400">

                            آدرس ها

                        </p>

                        <h3 class="text-4xl font-DanaDemiBold mt-4 text-blue-500">

                            {{ auth()->user()->addresses()->count() }}

                        </h3>

                    </div>

                    <div class="rounded-[28px] bg-white p-6 shadow-sm border">

                        <p class="text-gray-400">

                            مبلغ خرید

                        </p>

                        <h3 class="text-xl font-DanaDemiBold mt-4 text-emerald-500">

                            {{ number_format(auth()->user()->orders()->sum('total_price')) }}

                        </h3>

                    </div>

                    <div class="rounded-[28px] bg-white p-6 shadow-sm border">

                        <p class="text-gray-400">

                            عضویت

                        </p>

                        <h3 class="text-lg font-DanaDemiBold mt-4">

                            {{ verta(auth()->user()->created_at)->format('Y/m/d') }}

                        </h3>

                    </div>

                </div>

                <div class="bg-white rounded-[30px] shadow-sm border mt-8">

                    <div class="p-6 border-b">

                        <h3 class="font-DanaDemiBold text-xl">

                            آخرین سفارش ها

                        </h3>

                    </div>

                    <table class="w-full">

                        <thead>

                        <tr class="border-b">

                            <th class="p-4 text-right">کد</th>

                            <th class="p-4 text-right">مبلغ</th>

                            <th class="p-4 text-right">وضعیت</th>

                            <th class="p-4 text-right">تاریخ</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach(auth()->user()->orders()->latest()->take(5)->get() as $order)

                            <tr class="border-b">

                                <td class="p-4">

                                    #{{ $order->order_code }}

                                </td>

                                <td>

                                    {{ number_format($order->total_price) }}

                                </td>

                                <td>

                                    @if($order->status)

                                        <span class="bg-green-100 text-green-600 rounded-full px-3 py-1">

                                            پرداخت شده

                                        </span>

                                    @else

                                        <span class="bg-red-100 text-red-600 rounded-full px-3 py-1">

                                            ناموفق

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    {{ verta($order->created_at)->format('Y/m/d') }}

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
