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

                                            <div class="w-[full]" style="height: 430px !important;">

                                                <a href="{{ route('single.product', $product->slug) }}">

                                                    {{-- <div class="relative mb-2 md:mb-5"> --}}
                                                    <img src="{{ asset('admin/images/products/' . $product->image) }}"
                                                        class="w-full h-[260px]  object-contain mx-auto transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300 rounded-2xl">
                                                    {{-- </div> --}}

                                                    <h5
                                                        class="font-DanaMedium text-sm md:text-xl text-zinc-700 dark:text-white line-clamp-2 md:min-h-[56px] min-h-[40px] mt-3">
                                                        {{ $product->title }}
                                                    </h5>

                                                    <div class="mt-2 text-teal-600 dark:text-emerald-500">
                                                        {{ number_format($product->price) }}
                                                        تومان
                                                    </div>

                                                </a>

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
