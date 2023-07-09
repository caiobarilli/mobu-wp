// Import Swiper and modules
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {

    const swiper = new Swiper('.header-slider', {
        modules: [Navigation, Pagination],

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            // renderBullet: function (index, className) {
            // return '<span class="' + className + '">' + (index + 1) + "</span>";
            // },
        },

    });

});
