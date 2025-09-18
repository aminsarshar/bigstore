<div>
    <div class="w-full max-w-md mx-auto">
        <!-- دکمه کوچک -->
        <button id="toggleBtn2" aria-expanded="false" aria-controls="collapseContent2"
            style="background-color: rgb(253 186 116 / 0.2);color: rgb(253 186 116 / var(--tw-text-opacity));"
            class="flex items-center gap-2 px-3 py-1.5 text-white rounded-md text-sm hover:bg-orange-400">
            <!-- آیکون کوچک -->
            <svg id="toggleIcon2" class="w-4 h-4 chev" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>

            <span>ثبت آدرس جدید</span>
        </button>

        <!-- محتوای اسلایدی -->
        <div id="collapseContent2" class="collapse-content mt-2 rounded-lg shadow bg-white">
            <form class="p-4 space-y-4" wire:submit.prevent="submit">
                <div>
                    <label class="block text-sm font-medium text-gray-700">نام نام خانوادگی</label>
                    <input type="text" placeholder="امین سرشار" wire:model.defer="name"
                        class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-200" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">شماره موبایل</label>
                    <input type="text" placeholder="09336116359" wire:model.defer="mobile"
                        class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-200" />
                </div>

                <div class="flex">
                    <div class="w-full ml-2">
                        <label class="block text-sm font-medium text-gray-700">استان</label>
                    <select wire:model.defer="province" class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-200">
                        <option value="" selected>استان</option>
                        <option value="teh" selected>teh</option>
                    </select>
                    </div>
                     <div class="w-full">
                        <label class="block text-sm font-medium text-gray-700">شهر</label>
                    <select wire:model.defer="city" class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-200">
                        <option value="" selected>شهر</option>
                        <option value="teh" selected>teh</option>

                    </select>
                     </div>
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700">کد
                        پستی</label>
                    <input type="text" placeholder="کد پستی" wire:model.defer="postal_code"
                        class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-200" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">آدرس</label>
                    <textarea wire:model.defer="address" class="mt-1 w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-200" cols="30" rows="5"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-orange-300 text-white py-2 rounded-lg hover:bg-orange-400 transition">
                    ثبت تغییرات
                </button>
            </form>
        </div>
    </div>
</div>
