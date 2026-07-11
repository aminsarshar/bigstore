<section class="col-span-12 lg:col-span-9">
    <div class="flex items-center gap-3 mb-8" style="align-items: baseline;justify-content: space-between;">
        <div>
                <button
                wire:click="$set('sort','latest')"
                class="{{ $sort=='latest' ? 'bg-orange-500 text-white' : 'bg-white' }} px-5 h-11 rounded-xl border">

                جدیدترین

            </button>

            <button
                wire:click="$set('sort','cheap')"
                class="{{ $sort=='cheap' ? 'bg-orange-500 text-white' : 'bg-white' }} px-5 h-11 rounded-xl border">

                ارزان‌ترین

            </button>

            <button
                wire:click="$set('sort','expensive')"
                class="{{ $sort=='expensive' ? 'bg-orange-500 text-white' : 'bg-white' }} px-5 h-11 rounded-xl border">

                گران‌ترین

            </button>
        </div>
        {{ $products->links('pagination::tailwind') }}


</div>
<div class="relative w-[100%] mb-10">

    <input
        wire:model.live.debounce.500ms="search"
        type="text"
        placeholder="جستجوی محصول..."
        class="w-full h-12 rounded-2xl border border-zinc-200 pr-12 pl-4 focus:border-orange-500 focus:ring-4 focus:ring-orange-100">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5 absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"/>

    </svg>

</div>
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <div
                class="group relative bg-white rounded-[28px] border border-zinc-100 shadow-sm overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300"
            >
                {{-- Badges --}}
                <div class="absolute top-4 right-4 z-20 flex flex-col gap-2">
                    @if ($product->discount_percent)
                        <span
                            class="bg-red-500 text-white text-xs px-3 py-1 rounded-full"
                        >
                            {{ $product->discount_percent }}٪
                        </span>

                    @endif

                    @if ($product->special)
                        <span
                            class="bg-orange-500 text-white text-xs px-3 py-1 rounded-full"
                        >
                            ویژه
                        </span>

                    @endif
                </div>

                {{-- Actions --}}
                <div
                    class="absolute left-4 top-4 flex flex-col gap-3 opacity-0 group-hover:opacity-100 transition"
                >
                    <button
                        class="w-10 h-10 rounded-full bg-white shadow hover:bg-orange-500 hover:text-white transition"
                    >
                        ❤
                    </button>

                    <button
                        class="w-10 h-10 rounded-full bg-white shadow hover:bg-orange-500 hover:text-white transition"
                    >
                        👁
                    </button>
                </div>

                {{-- Image --}}
                <a href="#">
                    <div class="p-6">
                        <img
                            src="{{ url('admin/images/products/'.$product->image) }}"
                            class="w-full h-56 object-contain group-hover:scale-110 transition duration-500"
                        />
                    </div>
                </a>

                {{-- Body --}}
                <div class="px-6 pb-6">
                    {{-- Title --}}
                    <h3
                        class="font-DanaMedium leading-8 h-16 overflow-hidden hover:text-orange-500 transition"
                    >
                        {{ $product->title }}
                    </h3>

  


                    {{-- Price --}}
                    <div class="mt-6">


                        <div class="flex items-center justify-between mt-2">
                            <div>
                                <span
                                    class="font-DanaDemiBold text-xl text-orange-500"
                                >
                                    {{ number_format($product->price) }}
                                </span>

                                <span class="text-sm"> تومان </span>
                            </div>
                        </div>
                    </div>

                    @livewire ('front.add-to-cart-button', ['product' => $product], key('cart-'.$product->id))
                </div>
            </div>

        @endforeach
    </div>

</section>
