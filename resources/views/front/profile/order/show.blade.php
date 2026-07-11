@extends ('front.layouts.home')

@section ('content')
    <main class="my-60">
        <div class="container">
            <div class="grid lg:grid-cols-3 gap-6">
                {{-- اطلاعات سفارش --}}
                <div class="lg:col-span-2 space-y-6">
                    <div
                        class="bg-white dark:bg-zinc-800 rounded-3xl shadow-sm p-6"
                    >
                        <div
                            class="flex justify-between items-center border-b pb-5"
                        >
                            <div>
                                <h2 class="font-DanaDemiBold text-xl">
                                    سفارش #{{ $order->order_code }}
                                </h2>

                                <p class="text-gray-400 mt-2">
                                    {{ verta($order->created_at)->format('Y/m/d H:i') }}
                                </p>
                            </div>

                            @if ($order->status)
                                <span
                                    class="px-4 py-2 rounded-full bg-green-100 text-green-600"
                                >
                                    پرداخت شده
                                </span>

                            @else
                                <span
                                    class="px-4 py-2 rounded-full bg-red-100 text-red-600"
                                >
                                    پرداخت ناموفق
                                </span>

                            @endif
                        </div>

                        <div class="mt-8 space-y-6">
                            @foreach ($order->items as $item)
                                <div class="flex gap-5 border-b pb-5">
                                    <img
                                        src="{{ url('admin/images/products/'.$item->product->image) }}"
                                        class="w-24 h-24 rounded-xl object-cover"
                                    />

                                    <div class="flex-1">
                                        <h4 class="font-DanaDemiBold text-lg">
                                            {{ $item->product->title }}
                                        </h4>

                                        <div
                                            class="mt-3 flex flex-wrap gap-4 text-sm text-gray-500"
                                        >
                                            @if ($item->color)
                                                <span>
                                                    🎨 رنگ : {{ $item->color->title }}
                                                </span>

                                            @endif

                                            @if ($item->guaranty)
                                                <span>
                                                    🛡️ {{ $item->guaranty->title }}
                                                </span>

                                            @endif

                                            <span>
                                                تعداد : {{ $item->quantity  }}
                                            </span>
                                        </div>
                                    </div>

                                    <div
                                        class="font-DanaDemiBold text-orange-500"
                                    >
                                        {{ number_format($item->price) }}

                                        تومان
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- سایدبار --}}
                <div>
                    <div
                        class="bg-white dark:bg-zinc-800 rounded-3xl shadow-sm p-6 sticky top-24"
                    >
                        <h3 class="font-DanaDemiBold text-lg mb-6">
                            خلاصه سفارش
                        </h3>

                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500"> مبلغ کالاها </span>

                                <span>
                                    {{ number_format($order->total_price) }}
                                </span>
                            </div>

                            <div class="flex justify-between">
                                <span class="text-gray-500"> تخفیف </span>

                                <span class="text-green-600">
                                    {{ number_format($order->discount_price) }}
                                </span>
                            </div>

                            <div
                                class="border-t pt-5 flex justify-between font-DanaDemiBold text-lg"
                            >
                                <span> مبلغ پرداختی </span>

                                <span class="text-orange-500">
                                    {{ number_format($order->total_price) }}

                                    تومان
                                </span>
                            </div>
                        </div>

                        <a
                            href="{{ route('profile.orders') }}"
                            class="mt-8 flex justify-center items-center h-12 rounded-xl bg-orange-500 text-white hover:bg-orange-600 transition"
                        >
                            بازگشت به سفارش‌ها
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
