@extends ('front.layouts.home')

@section ('content')
    <div class="max-w-[1700px] mx-auto px-4 lg:px-8 py-8">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-zinc-400 mb-8">
            <a
                href="{{ route('home.index') }}"
                class="hover:text-orange-500 transition"
            >
                خانه
            </a>

            <svg class="w-4 h-4">
                <use href="#chevron-left"></use>
            </svg>

            <a href="#" class="hover:text-orange-500 transition">
                {{ $category->parent->title ?? 'دسته بندی' }}
            </a>

            <svg class="w-4 h-4">
                <use href="#chevron-left"></use>
            </svg>

            <span class="text-zinc-700 font-DanaMedium">
                {{ $category->title }}</span
            >
        </nav>

        {{-- Header --}}
<div class="bg-white rounded-[32px] shadow-sm border border-zinc-100 p-8 mb-8">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

        <div>

            <div class="flex items-center gap-2 text-sm text-zinc-400 mb-3">

                <a href="{{ route('home.index') }}" class="hover:text-orange-500">
                    خانه
                </a>

                <span>/</span>

                <span class="text-zinc-600">
                    {{ $category->name }}
                </span>

            </div>

            <h1 class="text-3xl font-DanaDemiBold text-zinc-800">

                {{ $category->name }}

            </h1>

            @if($category->description)

                <p class="mt-3 text-zinc-400 leading-8">

                    {{ $category->description }}

                </p>

            @else

                <p class="mt-3 text-zinc-400">

                    مشاهده و خرید انواع
                    <span class="font-DanaMedium">
                        {{ $category->name }}
                    </span>
                    با بهترین قیمت و ضمانت اصالت کالا.

                </p>

            @endif

        </div>

        <div class="flex flex-wrap items-center gap-3">

            <div class="rounded-2xl bg-orange-50 text-orange-600 px-5 py-3 font-DanaMedium">

                {{ $products->total() }}
                محصول

            </div>

            <div class="rounded-2xl bg-zinc-100 text-zinc-700 px-5 py-3">

                صفحه
                {{ $products->currentPage() }}
                از
                {{ $products->lastPage() }}

            </div>

            <div class="rounded-2xl bg-emerald-50 text-emerald-600 px-5 py-3">

                نمایش
                {{ $products->firstItem() ?? 0 }}
                -
                {{ $products->lastItem() ?? 0 }}

            </div>

        </div>

    </div>

</div>

        {{-- Toolbar --}}
        <div
            class="bg-white rounded-[28px] border border-zinc-100 shadow-sm p-5 mb-8"
        >
            <div
                class="flex flex-col lg:flex-row lg:items-center justify-between gap-5"
            >
                {{-- Mobile Filter --}}
                <button
                    class="lg:hidden h-12 px-5 rounded-2xl bg-orange-500 text-white flex items-center gap-2"
                >
                    <svg class="w-5 h-5">
                        <use href="#adjustments-horizontal"></use>
                    </svg>

                    فیلترها
                </button>

                {{-- Sort --}}
                <div class="flex items-center gap-4 flex-wrap">
                    <span class="text-zinc-500"> مرتب سازی : </span>

                    <button
                        class="px-4 h-10 rounded-xl bg-orange-500 text-white"
                    >
                        جدیدترین
                    </button>

                    <button
                        class="px-4 h-10 rounded-xl hover:bg-orange-50 hover:text-orange-500 transition"
                    >
                        پرفروش‌ترین
                    </button>

                    <button
                        class="px-4 h-10 rounded-xl hover:bg-orange-50 hover:text-orange-500 transition"
                    >
                        ارزان‌ترین
                    </button>

                    <button
                        class="px-4 h-10 rounded-xl hover:bg-orange-50 hover:text-orange-500 transition"
                    >
                        گران‌ترین
                    </button>

                    <button
                        class="px-4 h-10 rounded-xl hover:bg-orange-50 hover:text-orange-500 transition"
                    >
                        بیشترین تخفیف
                    </button>
                </div>

                {{-- View --}}
                <div class="hidden lg:flex items-center gap-3">
                    <button
                        class="w-11 h-11 rounded-xl bg-orange-500 text-white flex items-center justify-center"
                    >
                        <svg class="w-5 h-5">
                            <use href="#squares-2x2"></use>
                        </svg>
                    </button>

                    <button
                        class="w-11 h-11 rounded-xl bg-zinc-100 hover:bg-orange-50 transition"
                    >
                        <svg class="w-5 h-5">
                            <use href="#bars-3"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Content --}}

        <div class="grid grid-cols-12 gap-8">
            {{-- Sidebar --}}

            <aside class="hidden lg:block col-span-3">
                <div class="sticky top-5 space-y-6">
                    {{-- جستجو --}}
                    <div
                        class="bg-white rounded-[28px] shadow-sm border border-zinc-100 p-6"
                    >
                        <h3 class="font-DanaDemiBold text-lg mb-5">جستجو</h3>

                        <div class="relative">
                            <input
                                type="text"
                                placeholder="جستجو در محصولات..."
                                class="w-full h-12 rounded-2xl border border-zinc-200 bg-zinc-50 pr-12 pl-4 focus:ring-4 focus:ring-orange-100 focus:border-orange-500 transition"
                            />

                            <svg class="w-5 h-5 absolute right-4 top-1/2 -translate-y-1/2 text-zinc-400">
                                <use href="#magnifying-glass"></use>
                            </svg>
                        </div>
                    </div>

                    {{-- قیمت --}}
                    <div
                        class="bg-white rounded-[28px] shadow-sm border border-zinc-100 p-6"
                    >
                        <h3 class="font-DanaDemiBold text-lg mb-5">
                            محدوده قیمت
                        </h3>

                        <div class="space-y-4">
                            <input
                                type="number"
                                placeholder="از"
                                class="w-full h-12 rounded-2xl border border-zinc-200 bg-zinc-50 px-4"
                            />

                            <input
                                type="number"
                                placeholder="تا"
                                class="w-full h-12 rounded-2xl border border-zinc-200 bg-zinc-50 px-4"
                            />
                        </div>
                    </div>

                    {{-- برند --}}
                    <div
                        class="bg-white rounded-[28px] shadow-sm border border-zinc-100 p-6"
                    >
                        <h3 class="font-DanaDemiBold text-lg mb-5">برند</h3>

                        <div class="space-y-3 max-h-56 overflow-auto">
                            @foreach ($brands as $brand)
                                <label
                                    class="flex items-center justify-between cursor-pointer"
                                >
                                    <span>{{ $brand }}</span>

                                    <input
                                        type="checkbox"
                                        class="rounded text-orange-500"
                                    />
                                </label>

                            @endforeach
                        </div>
                    </div>

                    {{-- رنگ --}}
                    <div
                        class="bg-white rounded-[28px] shadow-sm border border-zinc-100 p-6"
                    >
                        <h3 class="font-DanaDemiBold text-lg mb-5">رنگ</h3>

                        <div class="flex flex-wrap gap-3">
                            <button
                                class="w-8 h-8 rounded-full bg-black border-2 border-white shadow"
                            ></button>

                            <button
                                class="w-8 h-8 rounded-full bg-white border shadow"
                            ></button>

                            <button
                                class="w-8 h-8 rounded-full bg-red-500"
                            ></button>

                            <button
                                class="w-8 h-8 rounded-full bg-blue-500"
                            ></button>

                            <button
                                class="w-8 h-8 rounded-full bg-green-500"
                            ></button>

                            <button
                                class="w-8 h-8 rounded-full bg-yellow-400"
                            ></button>

                            <button
                                class="w-8 h-8 rounded-full bg-purple-500"
                            ></button>

                            <button
                                class="w-8 h-8 rounded-full bg-pink-500"
                            ></button>
                        </div>
                    </div>

                    {{-- گارانتی --}}
                    <div
                        class="bg-white rounded-[28px] shadow-sm border border-zinc-100 p-6"
                    >
                        <h3 class="font-DanaDemiBold text-lg mb-5">گارانتی</h3>

                        <div class="space-y-3">
                            <label class="flex justify-between">
                                <span>گارانتی اصلی</span>

                                <input type="checkbox" />
                            </label>

                            <label class="flex justify-between">
                                <span>بدون گارانتی</span>

                                <input type="checkbox" />
                            </label>
                        </div>
                    </div>

                    {{-- وضعیت --}}
                    <div
                        class="bg-white rounded-[28px] shadow-sm border border-zinc-100 p-6"
                    >
                        <h3 class="font-DanaDemiBold text-lg mb-5">
                            وضعیت کالا
                        </h3>

                        <div class="space-y-4">
                            <label class="flex justify-between">
                                <span>فقط کالاهای موجود</span>

                                <input type="checkbox" />
                            </label>

                            <label class="flex justify-between">
                                <span>دارای تخفیف</span>

                                <input type="checkbox" />
                            </label>

                            <label class="flex justify-between">
                                <span>ارسال فوری</span>

                                <input type="checkbox" />
                            </label>
                        </div>
                    </div>

                    {{-- امتیاز --}}
                    <div
                        class="bg-white rounded-[28px] shadow-sm border border-zinc-100 p-6"
                    >
                        <h3 class="font-DanaDemiBold text-lg mb-5">
                            امتیاز کاربران
                        </h3>

                        <div class="space-y-3">
                            @for ($i=5;$i>=1;$i--)
                                <label
                                    class="flex items-center justify-between cursor-pointer"
                                >
                                    <div class="flex text-yellow-400">
                                        @for ($j=1;$j<=$i;$j++)
                                            ⭐
                                        @endfor
                                    </div>

                                    <input type="radio" name="rate" />
                                </label>

                            @endfor
                        </div>
                    </div>

                    {{-- دکمه ها --}}
                    <div class="space-y-3">
                        <button
                            class="w-full h-12 rounded-2xl bg-orange-500 hover:bg-orange-600 text-white font-DanaMedium transition"
                        >
                            اعمال فیلتر
                        </button>

                        <button
                            class="w-full h-12 rounded-2xl bg-zinc-100 hover:bg-red-50 hover:text-red-500 transition"
                        >
                            حذف فیلترها
                        </button>
                    </div>
                </div>
            </aside>

            {{-- Products --}}


                    <livewire:front.category.products-list
                        :category="$category"
                    />

        </div>
    </div>

@endsection
