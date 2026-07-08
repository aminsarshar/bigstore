<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ثبت نام</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />

    <style>
        body {
            font-family: Vazirmatn, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #3e2723, #5d4037, #8d6e63);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-6">
    <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>

    <div
        class="relative w-full max-w-5xl rounded-3xl overflow-hidden shadow-2xl bg-white"
    >
        <div class="grid md:grid-cols-2">
            <!-- سمت تصویر -->

            <div class="hidden md:flex relative">
                <img
                    src="{{asset('front/images/register1.png')}}"
                    class="object-cover w-full h-full"
                />

                <div class="absolute inset-0 bg-black/50"></div>

                <div class="absolute bottom-10 right-10 text-white">
                    <h2 class="text-4xl font-bold mb-4">
                        به دنیای قهوه خوش آمدید ☕
                    </h2>

                    <p class="text-lg leading-9 text-gray-200">ثبت‌نام کنید و از تخفیف‌های ویژه، سفارش سریع و پیشنهادهای اختصاصی بهره‌مند شوید.</p>
                </div>
            </div>

            <!-- فرم -->

            <div class="p-10 lg:p-14">
                <div class="text-center mb-10">
                    <div class="text-5xl mb-4">☕</div>

                    <h1 class="text-3xl font-bold text-stone-800">
                        ورود به حساب کاربری
                    </h1>

                    <p class="text-gray-500 mt-2">خوشحالیم که دوباره اینجایی.</p>
                </div>

                <form
                    action="{{ route('login') }}"
                    method="POST"
                    class="space-y-5"
                >
                    @csrf

                    <div>
                        <label class="block mb-2 text-sm text-gray-700">
                            شماره موبایل
                        </label>

                        <input
                            type="text"
                            name="mobile"
                            value="{{ old('mobile') }}"
                            placeholder="09xxxxxxxxx"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-amber-700 focus:outline-none @error('mobile') border-red-500 @enderror"
                        />

                        @error ('mobile')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-gray-700">
                            رمز عبور
                        </label>

                        <div class="relative">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="********"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 pl-12 focus:ring-2 focus:ring-amber-700 focus:outline-none @error('password') border-red-500 @enderror"
                            />

                            <button
                                type="button"
                                id="togglePassword"
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-amber-700 transition"
                            >
                                <!-- چشم باز -->
                                <svg
                                    id="eyeOpen"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0s-3-7-9-7-9 7-9 7 3 7 9 7 9-7 9-7z"
                                    />
                                </svg>

                                <!-- چشم بسته -->
                                <svg
                                    id="eyeClose"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 hidden"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-5 0-9-7-9-7a17.3 17.3 0 014.18-4.92M9.88 9.88A3 3 0 0114.12 14.12M6.1 6.1L3 3m18 18-3.1-3.1M9.88 9.88L6.1 6.1m8.02 8.02L17.9 17.9"
                                    />
                                </svg>
                            </button>
                        </div>

                        @error ('password')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-amber-700 focus:ring-amber-700"
                            />

                            <span>مرا به خاطر بسپار</span>
                        </label>

                        <a
                            href="{{ route('password.request') }}"
                            class="text-amber-700 hover:text-amber-900"
                        >
                            فراموشی رمز؟
                        </a>
                    </div>

                    <button
                        class="w-full py-4 rounded-xl bg-amber-800 hover:bg-amber-900 transition-all duration-300 text-white font-bold shadow-lg hover:shadow-2xl"
                    >
                        ورود به حساب
                    </button>
                </form>

                <div class="mt-8 text-center text-gray-600">
                    حساب کاربری ندارید؟

                    <a
                        href="{{ route('register') }}"
                        class="text-amber-800 font-bold hover:underline"
                    >
                        ثبت نام
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        const password = document.getElementById("password");
        const toggle = document.getElementById("togglePassword");

        const eyeOpen = document.getElementById("eyeOpen");
        const eyeClose = document.getElementById("eyeClose");

        toggle.addEventListener("click", () => {
            if (password.type === "password") {
                password.type = "text";
                eyeOpen.classList.add("hidden");
                eyeClose.classList.remove("hidden");
            } else {
                password.type = "password";
                eyeOpen.classList.remove("hidden");
                eyeClose.classList.add("hidden");
            }
        });
    </script>
</body>
</html>
