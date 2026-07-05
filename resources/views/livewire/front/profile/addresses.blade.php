<div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('success'))
        <div
            class="mb-6 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-600 px-5 py-4"
        >
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-DanaDemiBold">آدرس های من</h2>

            <p class="text-gray-400 mt-2">
                {{ $addresses->count() }} آدرس ثبت شده
            </p>
        </div>

        <button
            wire:click="showCreateForm"
            class="h-12 px-6 rounded-xl bg-orange-500 hover:bg-orange-600 text-white transition"
        >
            افزودن آدرس
        </button>
    </div>

    {{-- فرم افزودن --}}
    @if ($showForm)
        <div
            class="bg-white rounded-3xl shadow-sm border border-gray-200 p-8 mb-8"
        >
            <h3 class="text-xl font-DanaDemiBold mb-8">افزودن آدرس جدید</h3>

            <form wire:submit.prevent="save">
                <div class="grid lg:grid-cols-2 gap-6">
                    {{-- نام گیرنده --}}
                    <div>
                        <label class="block mb-2 text-sm"> نام گیرنده </label>

                        <input
                            wire:model.defer="name"
                            type="text"
                            class="w-full rounded-xl border border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                        />

                        @error ('name')
                            <span
                                class="text-red-500 text-xs"
                                >{{ $message }}</span
                            >
                        @enderror
                    </div>

                    {{-- موبایل --}}
                    <div>
                        <label class="block mb-2 text-sm"> شماره موبایل </label>

                        <input
                            wire:model.defer="mobile"
                            type="text"
                            class="w-full rounded-xl border border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                        />

                        @error ('mobile')
                            <span
                                class="text-red-500 text-xs"
                                >{{ $message }}</span
                            >
                        @enderror
                    </div>

                    {{-- استان --}}
                    <div>
                        <label class="block mb-2 text-sm"> استان </label>

                        <select
                            wire:model="province_id"
                            class="w-full rounded-xl border border-gray-300"
                        >
                            <option value="">انتخاب استان</option>

                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">
                                    {{ $province->name }}
                                </option>

                            @endforeach
                        </select>

                        @error ('province_id')
                            <span
                                class="text-red-500 text-xs"
                                >{{ $message }}</span
                            >
                        @enderror
                    </div>

                    {{-- شهر --}}
                    <div>
                        <label class="block mb-2 text-sm"> شهر </label>

                        <select
                            wire:model="city_id"
                            class="w-full rounded-xl border border-gray-300"
                        >
                            <option value="">انتخاب شهر</option>

                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">
                                    {{ $city->name }}
                                </option>

                            @endforeach
                        </select>

                        @error ('city_id')
                            <span
                                class="text-red-500 text-xs"
                                >{{ $message }}</span
                            >
                        @enderror
                    </div>

                    {{-- کد پستی --}}
                    <div>
                        <label class="block mb-2 text-sm"> کد پستی </label>

                        <input
                            wire:model.defer="postal_code"
                            class="w-full rounded-xl border border-gray-300"
                        />

                        @error ('postal_code')
                            <span
                                class="text-red-500 text-xs"
                                >{{ $message }}</span
                            >
                        @enderror
                    </div>
                </div>

                {{-- آدرس --}}
                <div class="mt-6">
                    <label class="block mb-2 text-sm"> آدرس کامل </label>

                    <textarea
                        wire:model.defer="address"
                        rows="5"
                        class="w-full rounded-xl border border-gray-300"
                    ></textarea>

                    @error ('address')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex gap-3 mt-8">
                    <button
                        class="h-12 px-8 rounded-xl bg-orange-500 hover:bg-orange-600 text-white"
                    >
                        ذخیره آدرس
                    </button>

                    <button
                        type="button"
                        wire:click="$set('showForm',false)"
                        class="h-12 px-8 rounded-xl border"
                    >
                        انصراف
                    </button>
                </div>
            </form>
        </div>

    @endif

    {{-- لیست آدرس ها --}}

    @forelse ($addresses as $address)
        <div
            class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 mb-5"
        >
            <div class="flex justify-between">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <h3 class="font-DanaDemiBold text-lg">
                            {{ $address->name }}
                        </h3>
                        @if ($address->is_default)
                            <span
                                class="px-3 py-1 rounded-full bg-green-100 text-green-600 text-xs"
                            >
                                ✔ پیش فرض
                            </span>

                        @else
                            <button
                                wire:click="makeDefault({{ $address->id }})"
                                wire:loading.attr="disabled"
                                class="text-sm text-orange-500 hover:text-orange-600"
                            >
                                انتخاب بعنوان پیش فرض
                            </button>

                        @endif
                    </div>

                    <div class="text-gray-500">{{ $address->mobile }}</div>

                    <div>
                        {{ optional($address->province)->name }}

                        -

                        {{ optional($address->city)->name }}
                    </div>

                    <div class="leading-8 text-gray-700">
                        {{ $address->address }}
                    </div>

                    <div class="text-sm text-gray-400">
                        کد پستی :

                        {{ $address->postal_code }}
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <button
                        wire:click="edit({{ $address->id }})"
                        wire:loading.attr="disabled"
                        class="rounded-xl px-5 h-11 bg-orange-50 text-orange-500 hover:bg-orange-100 transition"
                    >
                        ویرایش
                    </button>

                    <button
                        type="button"
                        onclick="deleteAddress({{ $address->id }})"
                        class="text-red-500"
                    >
                        حذف
                    </button>
                </div>
            </div>
        </div>

    @empty
        <div
            class="rounded-3xl border-2 border-dashed border-gray-300 py-20 text-center"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-16 h-16 mx-auto text-gray-300"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M17.657 16.657L13.414 12.414a8 8 0 10-1.414 1.414l4.243 4.243a1 1 0 001.414-1.414z"
                />
            </svg>

            <h3 class="text-xl mt-5 font-DanaDemiBold">
                هنوز آدرسی ثبت نکرده‌اید
            </h3>

            <p class="text-gray-400 mt-3">برای ثبت سفارش ابتدا یک آدرس اضافه کنید.</p>
        </div>

    @endforelse
</div>

<script>
    function deleteAddress(id) {
        Swal.fire({
            title: "حذف آدرس",
            text: "آیا از حذف این آدرس مطمئن هستید؟",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "بله حذف شود",
            cancelButtonText: "انصراف",
            confirmButtonColor: "#f97316",
        }).then((result) => {
            if (result.isConfirmed) {
                @this.call("delete", id);
            }
        });
    }

    window.addEventListener("address-deleted", function () {
        Swal.fire({
            icon: "success",
            title: "موفق",
            text: "آدرس حذف شد",
            timer: 1500,
            showConfirmButton: false,
        });
    });
</script>
