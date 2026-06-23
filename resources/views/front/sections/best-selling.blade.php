<section class="best-selling  mt-8 md:mt-20">
    <div class="container">

        <!-- Header -->
        <div class="flex justify-between items-end mb-5 md:mb-12">
            <div>
                <h3 class="section-title">محصولات پر فروش</h3>
                <span class="section-subtitle">پیشنهاد قهوه خور ها ...</span>
            </div>

            <div class="flex gap-x-3 md:gap-x-[18px]">
                <div class="swiper-button-prev-custom">
                    <svg class="w-5 h-5 md:w-[26px] md:h-[26px]">
                        <use href="#chevron-right-mini"></use>
                    </svg>
                </div>

                <div class="swiper-button-next-custom">
                    <svg class="w-5 h-5 md:w-[26px] md:h-[26px]">
                        <use href="#chevron-left-mini"></use>
                    </svg>
                </div>
            </div>
        </div>

        <!-- دکمه دسته ها -->
        <div class="flex flex-wrap gap-2 mb-8">
            @foreach ($categories as $category)
                <button data-category="{{ $category->id }}"
                    class="category-btn px-4 py-2 rounded-lg transition
                {{ $loop->first
                    ? 'bg-orange-300 text-white shadow-md'
                    : 'bg-zinc-100 dark:bg-zinc-700 text-zinc-700 dark:text-white' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <!-- اسلایدر هر دسته -->
        @foreach ($categories as $category)
            <div id="category-{{ $category->id }}" class="category-slider {{ !$loop->first ? 'hidden' : '' }}">

                <div class="swiper categorySwiper">

                    <div class="swiper-wrapper">

                        @foreach ($category->Categorychild as $child)
                            @foreach ($child->products as $product)
                                <div class="swiper-slide rounded-2xl">
                                    <div
                                        class="group bg-white dark:bg-zinc-700 rounded-[30px] overflow-hidden shadow-sm hover:shadow-xl transition">

                                        <div class="overflow-hidden h-64">

                                            <img src="{{ asset('admin/images/products/' . $product->image) }}"
                                            loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">

                                        </div>

                                        <div class="p-5">

                                            <h3 class="font-DanaDemiBold line-clamp-2 min-h-[56px]">

                                                {{ $product->title }}

                                            </h3>

                                            <div class="mt-4 flex justify-between items-center">

                                                <span class="text-orange-500 font-DanaDemiBold">

                                                    {{ number_format($product->price) }}
                                                </span>

                                                <span class="text-sm text-gray-400">

                                                    تومان
                                                </span>

                                            </div>

                                            <a href="{{ route('single.product', $product->slug) }}"
                                                class="mt-5 flex justify-center items-center h-11 rounded-xl bg-orange-400 text-white hover:bg-orange-500">

                                                مشاهده محصول

                                            </a>

                                        </div>

                                    </div>

                                </div>
                            @endforeach
                        @endforeach

                    </div>

                </div>

            </div>
        @endforeach

    </div>
</section>
