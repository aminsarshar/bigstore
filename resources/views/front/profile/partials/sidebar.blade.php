            {{-- Sidebar --}}
            <div class="col-span-12 lg:col-span-3">

                <div class="bg-white dark:bg-zinc-900 rounded-[32px] shadow-sm border border-zinc-100 dark:border-zinc-800 overflow-hidden">

                    <div class="p-8 text-center border-b border-zinc-100 dark:border-zinc-800">

                        <div class="w-24 h-24 rounded-full bg-orange-100 flex items-center justify-center mx-auto">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-10 h-10 text-orange-500"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                            </svg>

                        </div>

                        <h3 class="font-DanaDemiBold text-xl mt-5">

                            {{ auth()->user()->name }}

                        </h3>

                        <p class="text-gray-400 mt-2">

                            {{ auth()->user()->mobile }}

                        </p>

                    </div>

                    <div class="p-4 space-y-2">

    <a href="{{ route('profile') }}"
       class="flex items-center gap-3 h-12 rounded-2xl px-4 transition
       {{ request()->routeIs('profile') ? 'bg-orange-500 text-white' : 'hover:bg-orange-50 text-zinc-700 dark:text-white' }}">

        📊
        داشبورد

    </a>

    <a href="{{ route('profile.orders') }}"
       class="flex items-center gap-3 h-12 rounded-2xl px-4 transition
       {{ request()->routeIs('profile.orders*') ? 'bg-orange-500 text-white' : 'hover:bg-orange-50 text-zinc-700 dark:text-white' }}">

        📦
        سفارش های من

    </a>

    <a href="{{ route('profile.addresses') }}"
       class="flex items-center gap-3 h-12 rounded-2xl px-4 transition
       {{ request()->routeIs('profile.addresses*') ? 'bg-orange-500 text-white' : 'hover:bg-orange-50 text-zinc-700 dark:text-white' }}">

        📍
        آدرس ها

    </a>

    <a href="{{ route('profile.edit') }}"
       class="flex items-center gap-3 h-12 rounded-2xl px-4 transition
       {{ request()->routeIs('profile.edit*') ? 'bg-orange-500 text-white' : 'hover:bg-orange-50 text-zinc-700 dark:text-white' }}">

        ⚙️
        اطلاعات حساب

    </a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            class="w-full flex items-center gap-3 h-12 rounded-2xl px-4 transition hover:bg-red-50 text-red-500">

            🚪
            خروج

        </button>
    </form>

</div>

                </div>

            </div>
