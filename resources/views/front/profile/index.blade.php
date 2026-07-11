
@extends('front.profile.layouts.app')

@section('profile-content')

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

    @forelse(auth()->user()->orders()->latest()->take(5)->get() as $order)

        <tr class="border-b last:border-b-0">

            <td class="p-4">
                #{{ $order->order_code }}
            </td>

            <td class="p-4">
                {{ number_format($order->total_price) }}
            </td>

            <td class="p-4">

                @if($order->status)

                    <span class="bg-green-100 text-green-600 rounded-full px-3 py-1 text-sm">
                        پرداخت شده
                    </span>

                @else

                    <span class="bg-red-100 text-red-600 rounded-full px-3 py-1 text-sm">
                        ناموفق
                    </span>

                @endif

            </td>

            <td class="p-4">
                {{ verta($order->created_at)->format('Y/m/d') }}
            </td>

        </tr>

    @empty

        <tr>

            <td colspan="4" class="py-16">

                <div class="flex flex-col items-center justify-center text-center">

                    <div class="w-20 h-20 rounded-full bg-orange-100 flex items-center justify-center mb-5">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-10 h-10 text-orange-500"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M3 7h18M6 7V5a2 2 0 012-2h8a2 2 0 012 2v2m-1 0v12a2 2 0 01-2 2H8a2 2 0 01-2-2V7"/>

                        </svg>

                    </div>

                    <h4 class="font-DanaDemiBold text-xl text-zinc-700">
                        هنوز سفارشی ثبت نکرده‌اید
                    </h4>

                    <p class="text-gray-400 mt-2">
                        پس از ثبت اولین سفارش، اطلاعات آن در این قسمت نمایش داده می‌شود.
                    </p>

                    <a href="{{ route('home.shop') }}"
                       class="mt-6 inline-flex items-center justify-center h-11 px-6 rounded-xl bg-orange-500 text-white hover:bg-orange-600 transition">

                        شروع خرید

                    </a>

                </div>

            </td>

        </tr>

    @endforelse

</tbody>

                    </table>

                </div>

            </div>

@endsection


