<link rel="stylesheet" href="{{ asset('front/styles/app.css') }}" />
<link
    rel="stylesheet"
    href="{{ asset('front/styles/swiper-bundle.min.css') }}"
/>
@livewireStyles
<link rel="icon" href="./front/images/fav-icon.png" type="image/png" />
{{-- @vite('resources/css/app.css') --}}
<title>coffee-shop</title>
<script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
</script>
