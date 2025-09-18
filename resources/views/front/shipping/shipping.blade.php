@extends('front.layouts.home')
@section('script')

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const btn = document.getElementById("toggleBtn");
        const content = document.getElementById("collapseContent");
        const icon = document.getElementById("toggleIcon");

        btn.addEventListener("click", () => {
            const expanded = btn.getAttribute("aria-expanded") === "true";

            if (!expanded) {
                // باز کردن: مقدار max-height را به ارتفاع واقعی محتوا می‌گذاریم
                content.style.maxHeight = content.scrollHeight + "px";
                btn.setAttribute("aria-expanded", "true");
                icon.classList.add("open");

                // بعد از پایان transition، max-height را none می‌کنیم تا محتوای داینامیک مشکلی نداشته باشد
                const onEnd = () => {
                    if (btn.getAttribute("aria-expanded") === "true") {
                        content.style.maxHeight = "none";
                    }
                    content.removeEventListener("transitionend", onEnd);
                };
                content.addEventListener("transitionend", onEnd);
            } else {
                // بستن: اگر الان max-height برابر none است، اول آن را به scrollHeight برمی‌گردانیم تا transition کار کند
                if (
                    content.style.maxHeight === "none" ||
                    getComputedStyle(content).maxHeight === "none"
                ) {
                    content.style.maxHeight = content.scrollHeight + "px";
                    // force reflow
                    content.offsetHeight;
                }
                // سپس آن را صفر می‌کنیم تا انیمیشن بسته شدن انجام شود
                content.style.maxHeight = "0px";
                btn.setAttribute("aria-expanded", "false");
                icon.classList.remove("open");
            }
        });

        // اگر صفحه ری‌سایز شد و پنل باز بود، ارتفاع را به‌روز کن
        window.addEventListener("resize", () => {
            if (btn.getAttribute("aria-expanded") === "true") {
                // اگر maxHeight none است، دوباره مقدار واقعی قرار می‌گیرد
                if (content.style.maxHeight === "none") {
                    content.style.maxHeight = content.scrollHeight + "px";
                    // بعد از مدتی مجدداً none کن (یا می‌شه این را حذف کرد)
                    setTimeout(() => {
                        content.style.maxHeight = "none";
                    }, 350);
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            }
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        const btn = document.getElementById("toggleBtn2");
        const content = document.getElementById("collapseContent2");
        const icon = document.getElementById("toggleIcon");

        btn.addEventListener("click", () => {
            const expanded = btn.getAttribute("aria-expanded") === "true";

            if (!expanded) {
                // باز کردن: مقدار max-height را به ارتفاع واقعی محتوا می‌گذاریم
                content.style.maxHeight = content.scrollHeight + "px";
                btn.setAttribute("aria-expanded", "true");
                icon.classList.add("open");

                // بعد از پایان transition، max-height را none می‌کنیم تا محتوای داینامیک مشکلی نداشته باشد
                const onEnd = () => {
                    if (btn.getAttribute("aria-expanded") === "true") {
                        content.style.maxHeight = "none";
                    }
                    content.removeEventListener("transitionend", onEnd);
                };
                content.addEventListener("transitionend", onEnd);
            } else {
                // بستن: اگر الان max-height برابر none است، اول آن را به scrollHeight برمی‌گردانیم تا transition کار کند
                if (
                    content.style.maxHeight === "none" ||
                    getComputedStyle(content).maxHeight === "none"
                ) {
                    content.style.maxHeight = content.scrollHeight + "px";
                    // force reflow
                    content.offsetHeight;
                }
                // سپس آن را صفر می‌کنیم تا انیمیشن بسته شدن انجام شود
                content.style.maxHeight = "0px";
                btn.setAttribute("aria-expanded", "false");
                icon.classList.remove("open");
            }
        });

        // اگر صفحه ری‌سایز شد و پنل باز بود، ارتفاع را به‌روز کن
        window.addEventListener("resize", () => {
            if (btn.getAttribute("aria-expanded") === "true") {
                // اگر maxHeight none است، دوباره مقدار واقعی قرار می‌گیرد
                if (content.style.maxHeight === "none") {
                    content.style.maxHeight = content.scrollHeight + "px";
                    // بعد از مدتی مجدداً none کن (یا می‌شه این را حذف کرد)
                    setTimeout(() => {
                        content.style.maxHeight = "none";
                    }, 350);
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            }
        });
    });
</script>
@endsection
@section('content')
<main>
    <div class="md:mx-20">
       <livewire:front.order.shipping :carts="$carts" />
    </div>
</main>
@endsection
