```blade
@extends('front.layouts.home')

@section('title', $post->seo_title ?? $post->title)

@section('content')

<section class="relative h-[550px] overflow-hidden">

    <img
        src="{{ asset('admin/images/posts/'.$post->image) }}"
        alt="{{ $post->title }}"
        class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative z-10 flex items-center h-full">

        <div class="max-w-5xl mx-auto px-6 w-full">

            <a href="{{ route('blog.index') }}"
               class="inline-flex items-center text-white/80 hover:text-white transition">

                ← بازگشت به وبلاگ

            </a>

            <div class="mt-6">

                <span
                    class="inline-flex rounded-full bg-amber-600 px-4 py-2 text-white text-sm">

                    {{ $post->category->title }}

                </span>

            </div>

            <h1
                class="mt-6 text-5xl md:text-6xl font-black leading-tight text-white">

                {{ $post->title }}

            </h1>

            <div
                class="flex flex-wrap items-center gap-6 mt-8 text-gray-300">

                <span>

                    📅 {{ verta($post->created_at)->format('d F Y') }}

                </span>

                <span>

                    👁 {{ number_format($post->views) }} بازدید

                </span>

            </div>

        </div>

    </div>

</section>

<section class="py-20">

    <div class="max-w-4xl mx-auto px-6">

        @if($post->excerpt)

            <div
                class="border-r-4 border-amber-600 bg-amber-50 rounded-xl p-6 mb-12">

                <p
                    class="text-lg leading-9 text-gray-700">

                    {{ $post->excerpt }}

                </p>

            </div>

        @endif

        <article
            class="prose prose-lg max-w-none prose-img:rounded-2xl prose-img:shadow-lg prose-headings:font-black prose-headings:text-gray-900 prose-p:leading-9">

            {!! $post->body !!}

        </article>

    </div>

</section>

@if($relatedPosts->count())

<section class="pb-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between mb-10">

            <h2
                class="text-3xl font-black">

                مقالات مرتبط

            </h2>

            <a
                href="{{ route('blog.index') }}"
                class="text-amber-700 font-bold">

                مشاهده همه

            </a>

        </div>

        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">

            @foreach($relatedPosts as $item)

                <article
                    class="group overflow-hidden rounded-3xl bg-white shadow hover:shadow-2xl transition duration-300 hover:-translate-y-2">

                    <a
                        href="{{ route('blog.show',$item->slug) }}">

                        <img
                            src="{{ asset('admin/images/posts/'.$item->image) }}"
                            class="w-full h-60 object-cover transition duration-500 group-hover:scale-110">

                    </a>

                    <div class="p-6">

                        <span
                            class="text-xs text-amber-700">

                            {{ $item->category->title }}

                        </span>

                        <h3
                            class="mt-3 text-xl font-bold leading-8">

                            <a
                                href="{{ route('blog.show',$item->slug) }}">

                                {{ $item->title }}

                            </a>

                        </h3>

                        <div
                            class="flex justify-between items-center mt-6 text-sm text-gray-500">

                            <span>

                                {{ verta($item->created_at)->format('d F Y') }}

                            </span>

                            <span>

                                👁 {{ number_format($item->views) }}

                            </span>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endif

@endsection
```
