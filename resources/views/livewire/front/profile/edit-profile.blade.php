<div>
    @if (session()->has('success'))
        <div class="mb-5 rounded-2xl bg-green-100 text-green-700 p-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
        <div class="p-8 border-b">
            <h2 class="text-2xl font-DanaDemiBold">اطلاعات حساب</h2>
        </div>

        <form wire:submit.prevent="save">
            <div class="grid grid-cols-12 gap-8">
                <div class="relative w-24 h-24 mx-auto">
                    @if ($image)
                        <img
                            src="{{ $image->temporaryUrl() }}"
                            class="w-24 h-24 rounded-full object-cover border-4 border-orange-200 shadow"
                        />

                    @elseif (auth()->user()->image)
                        <img
                            src="{{ asset('storage/profiles/' . auth()->user()->image) }}"
                            class="w-24 h-24 rounded-full object-cover border-4 border-orange-200 shadow"
                        />

                    @else
                        <div
                            class="w-24 h-24 rounded-full bg-orange-100 flex items-center justify-center border-4 border-orange-200"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-orange-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>
                        </div>

                    @endif

                    {{-- دکمه تغییر عکس --}}
                    <label
                        class="absolute bottom-0 left-0 w-8 h-8 rounded-full bg-orange-500 hover:bg-orange-600 text-white flex items-center justify-center shadow-lg cursor-pointer transition"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 7h4l2-2h6l2 2h4v12H3V7zm9 10a4 4 0 100-8 4 4 0 000 8z"
                            />
                        </svg>

                        <input
                            type="file"
                            wire:model="image"
                            class="hidden"
                            accept="image/*"
                        />
                    </label>

                    {{-- لودینگ --}}
                    <div
                        wire:loading
                        wire:target="image"
                        class="absolute inset-0 rounded-full bg-black/40 flex items-center justify-center text-white text-xs"
                    >
                        درحال آپلود...
                    </div>
                </div>

                @error ('image')
                    <div class="mt-3 text-sm text-red-500 text-center">
                        {{ $message }}
                    </div>
                @enderror
                {{-- فرم --}}
                <div class="col-span-12">
                    {{-- اطلاعات شخصی --}}
                    <div
                        class="bg-white rounded-3xl shadow-sm border border-zinc-200 p-8 mb-8"
                    >
                        <div class="flex items-center gap-3 mb-8">
                            <div
                                class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center"
                            >
                                👤
                            </div>

                            <div>
                                <h3 class="font-DanaDemiBold text-xl">
                                    اطلاعات شخصی
                                </h3>

                                <p class="text-gray-400 text-sm mt-1">اطلاعات اصلی حساب کاربری خود را تکمیل کنید.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block mb-2 text-sm font-DanaMedium"
                                >
                                    نام و نام خانوادگی
                                </label>

                                <input
                                    wire:model.defer="name"
                                    type="text"
                                    placeholder="مثلاً امین سرشار"
                                    class="w-full h-14 rounded-2xl border border-zinc-200 bg-zinc-50 px-5 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                />

                                @error ('name')
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-DanaMedium"
                                >
                                    نام کاربری
                                </label>

                                <input
                                    wire:model.defer="user_name"
                                    type="text"
                                    placeholder="username"
                                    class="w-full h-14 rounded-2xl border border-zinc-200 bg-zinc-50 px-5 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                />

                                @error ('user_name')
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-DanaMedium"
                                >
                                    ایمیل
                                </label>

                                <input
                                    wire:model.defer="email"
                                    type="email"
                                    placeholder="example@gmail.com"
                                    class="w-full h-14 rounded-2xl border border-zinc-200 bg-zinc-50 px-5 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                />

                                @error ('email')
                                    <div class="text-red-500 text-sm mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-DanaMedium"
                                >
                                    تلفن ثابت
                                </label>

                                <input
                                    wire:model.defer="phone"
                                    type="text"
                                    placeholder="021..."
                                    class="w-full h-14 rounded-2xl border border-zinc-200 bg-zinc-50 px-5 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                />
                            </div>
                        </div>
                    </div>

                    {{-- ارتباط --}}
                    <div
                        class="bg-white rounded-3xl shadow-sm border border-zinc-200 p-8 mb-8"
                    >
                        <div class="flex items-center gap-3 mb-8">
                            <div
                                class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center"
                            >
                                📱
                            </div>

                            <div>
                                <h3 class="font-DanaDemiBold text-xl">
                                    راه‌های ارتباطی
                                </h3>

                                <p class="text-gray-400 text-sm mt-1">شبکه‌های ارتباطی خود را ثبت کنید.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block mb-2 text-sm font-DanaMedium"
                                >
                                    واتساپ
                                </label>

                                <input
                                    wire:model.defer="whatsapp"
                                    type="text"
                                    placeholder="09..."
                                    class="w-full h-14 rounded-2xl border border-zinc-200 bg-zinc-50 px-5 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                />
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-DanaMedium"
                                >
                                    تلگرام
                                </label>

                                <input
                                    wire:model.defer="telegram"
                                    type="text"
                                    placeholder="@username"
                                    class="w-full h-14 rounded-2xl border border-zinc-200 bg-zinc-50 px-5 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                />
                            </div>
                        </div>
                    </div>

                    {{-- شبکه اجتماعی --}}
                    <div
                        class="bg-white rounded-3xl shadow-sm border border-zinc-200 p-8 mb-8"
                    >
                        <div class="flex items-center gap-3 mb-8">
                            <div
                                class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center"
                            >
                                🌐
                            </div>

                            <div>
                                <h3 class="font-DanaDemiBold text-xl">
                                    شبکه‌های اجتماعی
                                </h3>

                                <p class="text-gray-400 text-sm mt-1">در صورت تمایل اطلاعات شبکه‌های اجتماعی خود را وارد کنید.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label
                                    class="block mb-2 text-sm font-DanaMedium"
                                >
                                    اینستاگرام
                                </label>

                                <input
                                    wire:model.defer="instagram"
                                    type="text"
                                    placeholder="@instagram"
                                    class="w-full h-14 rounded-2xl border border-zinc-200 bg-zinc-50 px-5 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                />
                            </div>

                            <div>
                                <label
                                    class="block mb-2 text-sm font-DanaMedium"
                                >
                                    ایتا
                                </label>

                                <input
                                    wire:model.defer="eita"
                                    type="text"
                                    placeholder="@eitaa"
                                    class="w-full h-14 rounded-2xl border border-zinc-200 bg-zinc-50 px-5 focus:border-orange-500 focus:ring-4 focus:ring-orange-100"
                                />
                            </div>
                        </div>
                    </div>

                    {{-- ذخیره --}}
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="inline-flex items-center gap-3 h-14 px-10 rounded-2xl bg-orange-500 hover:bg-orange-600 text-white font-DanaMedium transition-all duration-300 shadow-lg shadow-orange-200"
                        >
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
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>

                            <span wire:loading.remove> ذخیره تغییرات </span>

                            <span wire:loading> در حال ذخیره... </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
