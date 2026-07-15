<div class="bg-[#f7f5f2] min-h-screen">

    <div class="max-w-7xl mx-auto px-5 lg:px-8 py-16">

        <div class="grid lg:grid-cols-4 gap-10">

            {{-- Sidebar --}}

            <aside class="lg:sticky lg:top-28 h-fit space-y-8">

                <div class="bg-white rounded-3xl shadow-sm p-6">

                    <h3 class="text-2xl font-black mb-6">

                        جستجوی مقاله

                    </h3>

                    <div class="relative">

                        <input

                            wire:model.live.debounce.500ms="search"

                            type="text"

                            placeholder="عنوان مقاله..."

                            class="w-full rounded-2xl border border-gray-200 py-4 pr-12 pl-4 focus:border-amber-700 focus:ring-0">

                        <svg xmlns="http://www.w3.org/2000/svg"

                             class="absolute right-4 top-4 w-5 h-5 text-gray-400"

                             fill="none"

                             viewBox="0 0 24 24"

                             stroke="currentColor">

                            <path stroke-linecap="round"

                                  stroke-linejoin="round"

                                  stroke-width="2"

                                  d="M21 21l-4.3-4.3m1.8-5.2a7 7 0 11-14 0 7 7 0 0114 0z"/>

                        </svg>

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-sm p-6">

                    <h3 class="text-2xl font-black mb-6">

                        دسته بندی ها

                    </h3>

                    <div class="space-y-3">

                        <button

                            wire:click="$set('category','')"

                            class="w-full rounded-xl py-3 transition

                            {{ $category=='' ? 'bg-amber-700 text-white' : 'bg-stone-100 hover:bg-amber-100' }}">

                            همه مقالات

                        </button>

                        @foreach($categories as $item)

                            <button

                                wire:click="$set('category',{{ $item->id }})"

                                class="w-full rounded-xl py-3 transition

                                {{ $category==$item->id ? 'bg-amber-700 text-white' : 'bg-stone-100 hover:bg-amber-100' }}">

                                {{ $item->title }}

                            </button>

                        @endforeach

                    </div>

                </div>

                <div class="bg-white rounded-3xl shadow-sm p-6">

                    <h3 class="text-2xl font-black mb-5">

                        مرتب سازی

                    </h3>

                    <select

                        wire:model.live="sort"

                        class="w-full rounded-xl border-gray-200">

                        <option value="latest">

                            جدیدترین

                        </option>

                        <option value="popular">

                            پربازدیدترین

                        </option>

                    </select>

                </div>

            </aside>

            {{-- Content --}}

            <div class="lg:col-span-3">

               <div class="lg:col-span-3">

    {{-- Header --}}
    <div class="mb-12">
        ...
    </div>

    {{-- Loading --}}
    <div wire:loading.flex class="justify-center py-24">
        <div class="h-12 w-12 animate-spin rounded-full border-4 border-amber-700 border-t-transparent"></div>
    </div>

    {{-- Posts --}}
    <div wire:loading.remove>

        @if($posts->count())

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

                @foreach($posts as $post)

                    <article
                        class="group overflow-hidden rounded-[28px] bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:shadow-2xl">

                        <a
                            href="{{ route('blog.show',$post->slug) }}"
                            class="relative block overflow-hidden">

                            <img
                                src="{{ asset('admin/images/posts/'.$post->image) }}"
                                class="h-72 w-full object-cover transition duration-700 group-hover:scale-110">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent"></div>

                            <span
                                class="absolute right-5 top-5 rounded-full bg-white/90 px-4 py-2 text-xs font-bold">

                                {{ $post->category->title }}

                            </span>

                        </a>

                        <div class="p-6">

                            <div class="flex justify-between text-sm text-gray-500">

                                <span>{{ verta($post->created_at)->format('d F Y') }}</span>

                                <span>👁 {{ number_format($post->views) }}</span>

                            </div>

                            <h2
                                class="mt-5 text-2xl font-black leading-9">

                                <a href="{{ route('blog.show',$post->slug) }}">

                                    {{ $post->title }}

                                </a>

                            </h2>

                            <p
                                class="mt-4 text-gray-500 leading-8 h-24 overflow-hidden">

                                {{ $post->excerpt }}

                            </p>

                            <a
                                href="{{ route('blog.show',$post->slug) }}"
                                class="mt-6 inline-flex items-center gap-2 font-bold text-amber-700">

                                ادامه مطالعه

                                <span>←</span>

                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

            <div class="mt-16">

                {{ $posts->links() }}

            </div>

        @else

            <div class="rounded-3xl bg-white p-20 text-center shadow">

                <div class="text-7xl">☕</div>

                <h3 class="mt-6 text-3xl font-black">

                    مقاله‌ای پیدا نشد

                </h3>

                <p class="mt-4 text-gray-500">

                    نتیجه‌ای برای جستجوی شما وجود ندارد.

                </p>

            </div>

        @endif

    </div>

</div>

                <div wire:loading.flex
                     class="justify-center py-20">

                    <div
                        class="h-12 w-12 rounded-full border-4 border-amber-700 border-t-transparent animate-spin">
                    </div>

                </div>

                <div wire:loading.remove>
                </div>

            </div>

        </div>

    </div>

</div>
