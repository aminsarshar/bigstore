@extends('front.layouts.home')

@section('title','وبلاگ')

@section('content')

```blade
<section class="bg-[#f8f5f2]">

    <div class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- متن --}}

            <div>

                <span
                    class="inline-flex items-center rounded-full bg-amber-100 px-5 py-2 text-sm font-bold text-amber-800">

                    ☕ وبلاگ کافه هیرمان

                </span>

                <h1
                    class="mt-8 text-5xl lg:text-6xl font-black leading-tight text-stone-900">

                    هر فنجان قهوه،
                    <br>

                    یک داستان تازه...

                </h1>

                <p
                    class="mt-8 text-lg leading-9 text-stone-600">

                    آموزش قهوه، معرفی نوشیدنی‌ها،
                    سبک زندگی،
                    اخبار کافه
                    و هر چیزی که یک قهوه‌دوست باید بداند.

                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a
                        href="#posts"

                        class="rounded-2xl bg-amber-700 px-8 py-4 text-white font-bold transition hover:bg-black">

                        شروع مطالعه

                    </a>

                    <a
                        href=""

                        class="rounded-2xl border border-stone-300 px-8 py-4 font-bold transition hover:bg-white">

                        تماس با ما

                    </a>

                </div>

            </div>

            {{-- تصویر --}}

            <div class="relative">

                <div
                    class="absolute -left-10 -top-10 h-32 w-32 rounded-full bg-amber-200 blur-3xl opacity-60">
                </div>

                <div
                    class="absolute -right-8 bottom-0 h-40 w-40 rounded-full bg-orange-300 blur-3xl opacity-50">
                </div>

                <div
                    class="relative overflow-hidden rounded-[35px] shadow-2xl">

                    <img
                        src="{{ asset('front/images/about.png') }}"
                        alt="Coffee"

                        class="h-[550px] w-full object-cover transition duration-700 hover:scale-105">

                </div>

            </div>

        </div>

    </div>

</section>

<section id="posts">

    <livewire:front.blog.posts />

</section>
```


@endsection
