@section ('script')
@endsection
<div class="w-full max-w-4xl mx-auto">
    <button
        id="toggleBtn2"
        aria-expanded="false"
        aria-controls="collapseContent2"
        class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl bg-orange-100 text-orange-500 hover:bg-orange-500 hover:text-white transition-all duration-300"
    >
        <svg
            id="toggleIcon2"
            class="w-5 h-5 transition-transform duration-300 chev"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
            />
        </svg>

        <span class="font-DanaMedium"> افزودن آدرس جدید </span>
    </button>

    <div
        id="collapseContent2"
        class="collapse-content mt-5 rounded-[28px] border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 shadow-sm"
        wire:ignore.self
    >
        <form wire:submit.prevent="submit" class="p-6 space-y-6">
            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label
                        class="block mb-2 text-sm text-zinc-600 dark:text-zinc-300"
                    >
                        نام و نام خانوادگی
                    </label>

                    <input
                        wire:model.defer="name"
                        type="text"
                        class="w-full h-12 rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-4 outline-none focus:ring-2 focus:ring-orange-400"
                    />

                    @error ('name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label
                        class="block mb-2 text-sm text-zinc-600 dark:text-zinc-300"
                    >
                        شماره موبایل
                    </label>

                    <input
                        wire:model.defer="mobile"
                        type="text"
                        class="w-full h-12 rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-4 outline-none focus:ring-2 focus:ring-orange-400"
                    />

                    @error ('mobile')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label
                        class="block mb-2 text-sm text-zinc-600 dark:text-zinc-300"
                    >
                        استان
                    </label>

                    <select
                        wire:model.defer="province"
                        wire:change="ChangeProvince($event.target.value)"
                        class="w-full h-12 rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-4 outline-none focus:ring-2 focus:ring-orange-400"
                    >
                        <option value="">انتخاب استان</option>

                        @foreach ($provinces as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>

                        @endforeach
                    </select>
                </div>

                <div>
                    <label
                        class="block mb-2 text-sm text-zinc-600 dark:text-zinc-300"
                    >
                        شهر
                    </label>

                    <select
                        wire:model.defer="city"
                        class="w-full h-12 rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-4 outline-none focus:ring-2 focus:ring-orange-400"
                    >
                        <option value="">انتخاب شهر</option>

                        @foreach ($cities as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label
                    class="block mb-2 text-sm text-zinc-600 dark:text-zinc-300"
                >
                    کد پستی
                </label>

                <input
                    wire:model.defer="postal_code"
                    type="text"
                    class="w-full h-12 rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 px-4 outline-none focus:ring-2 focus:ring-orange-400"
                />
            </div>

            <div>
                <label
                    class="block mb-2 text-sm text-zinc-600 dark:text-zinc-300"
                >
                    آدرس کامل
                </label>

                <textarea
                    wire:model.defer="address"
                    rows="4"
                    class="w-full rounded-2xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 p-4 outline-none resize-none focus:ring-2 focus:ring-orange-400"
                ></textarea>
            </div>

            <button
                type="submit"
                class="w-full h-14 rounded-2xl bg-orange-500 text-white font-DanaDemiBold hover:bg-orange-600 transition-all"
            >
                ثبت آدرس
            </button>
        </form>
    </div>
</div>
