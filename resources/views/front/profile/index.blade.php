
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

@endsection


