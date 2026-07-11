@if ($paginator->hasPages())

<div class="flex flex-col lg:flex-row items-center justify-between gap-6 mt-16">



    <div class="flex items-center gap-2">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())

            <span class="w-12 h-12 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-300">

                ❮

            </span>

        @else

            <button
                wire:click="previousPage"
                wire:loading.attr="disabled"
                class="w-12 h-12 rounded-2xl border border-zinc-200 hover:bg-orange-500 hover:text-white transition">

                ❮

            </button>

        @endif


        {{-- Numbers --}}
        @foreach ($elements as $element)

            @if (is_string($element))

                <span class="px-2">

                    ...

                </span>

            @endif

            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <span
                            class="w-12 h-12 rounded-2xl bg-orange-500 text-white flex items-center justify-center font-DanaDemiBold">

                            {{ $page }}

                        </span>

                    @else

                        <button
                            wire:click="gotoPage({{ $page }})"
                            class="w-12 h-12 rounded-2xl border border-zinc-200 hover:bg-orange-50 transition">

                            {{ $page }}

                        </button>

                    @endif

                @endforeach

            @endif

        @endforeach


        {{-- Next --}}
        @if ($paginator->hasMorePages())

            <button
                wire:click="nextPage"
                wire:loading.attr="disabled"
                class="w-12 h-12 rounded-2xl border border-zinc-200 hover:bg-orange-500 hover:text-white transition">

                ❯

            </button>

        @else

            <span class="w-12 h-12 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-300">

                ❯

            </span>

        @endif

    </div>

</div>

@endif
