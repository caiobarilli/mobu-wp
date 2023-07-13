// Import all of Bootstrap's JS
import * as bootstrap from "bootstrap";

// Import our custom CSS
import "../sass/app.scss";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// Import jQuery Smooth Scroll
import "jquery-smooth-scroll";

/**
 * Smooth scroll (a.scroll-down)
 */
$.when($.ready).then(function () {
  $("a").click(function (event) {
    if (!$(this).hasClass("smooth-scroll")) {
      event.preventDefault();
    } else {
      $(this).smoothScroll({
        offset: 0,
        direction: "top",
        scrollTarget: null,
        autoFocus: false,
        delegateSelector: null,
        easing: "swing",
        speed: 600,
        autoCoefficient: 2,
        preventDefault: true,
        beforeScroll: function () {},
        afterScroll: function () {},
      });
    }
  });
});
