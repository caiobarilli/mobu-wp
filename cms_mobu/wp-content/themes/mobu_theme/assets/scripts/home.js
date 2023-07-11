import "jquery-smooth-scroll";
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";

/**
 * Smooth scroll
 */
$.when($.ready).then(function () {
  let scrollDown = $("a.scroll-down");
  if (scrollDown) {
    scrollDown.smoothScroll({
      // offset
      offset: -120,

      // one of 'top' or 'left'
      direction: "top",

      // only use if you want to override default behavior or if using $.smoothScroll
      scrollTarget: null,

      // automatically focus the target element after scrolling to it
      // (see https://github.com/kswedberg/jquery-smooth-scroll#focus-element-after-scrolling-to-it for details)
      autoFocus: false,

      // string to use as selector for event delegation
      delegateSelector: null,

      // fn(opts) function to be called before scrolling occurs.
      // `this` is the element(s) being scrolled
      beforeScroll: function () {},

      // fn(opts) function to be called after scrolling occurs.
      // `this` is the triggering element
      afterScroll: function () {},

      // easing name. jQuery comes with "swing" and "linear." For others, you'll need an easing plugin
      // from jQuery UI or elsewhere
      easing: "swing",

      // speed can be a number or 'auto'
      // if 'auto', the speed will be calculated based on the formula:
      // (current scroll position - target scroll position) / autoCoefficient
      speed: 400,

      // autoCoefficent: Only used when speed set to "auto".
      // The higher this number, the faster the scroll speed
      autoCoefficient: 2,

      // $.fn.smoothScroll only: whether to prevent the default click action
      preventDefault: true,
    });
  }
});

/**
 * Home page scripts
 */
$.when($.ready).then(function () {
  /**
   * Header slider
   */
  const swiper = new Swiper(".header-slider", {
    modules: [Navigation, Pagination],

    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
});
