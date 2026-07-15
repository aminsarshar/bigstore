import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function confirmLogout() {

    Swal.fire({
        title: 'از حساب کاربری خارج می‌شوید؟',
        text: 'برای ورود مجدد باید دوباره وارد شوید.',
        icon: 'warning',

        showCancelButton: true,

        confirmButtonText: 'بله، خارج شو',
        cancelButtonText: 'انصراف',

        confirmButtonColor: '#f97316',
        cancelButtonColor: '#6b7280',

        reverseButtons: true,

    }).then((result) => {

        if (result.isConfirmed) {

            document.getElementById('logout-form-header').submit();

        }

    });

}
