<button
    wire:click="addToCart"
    wire:loading.attr="disabled"
    class="flex items-center justify-center w-11 h-11 rounded-2xl bg-orange-500 hover:bg-orange-600 text-white transition duration-300"
>
    {{-- آیکون سبد خرید --}}
    <svg
        wire:loading.remove
        xmlns="http://www.w3.org/2000/svg"
        class="w-5 h-5"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2"
        />
    </svg>

    {{-- لودینگ --}}
    <svg
        wire:loading
        class="w-5 h-5 animate-spin"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
    >
        <circle
            cx="12"
            cy="12"
            r="10"
            stroke="currentColor"
            stroke-width="4"
            class="opacity-25"
        />

        <path
            fill="currentColor"
            class="opacity-75"
            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
        />
    </svg>
</button>
