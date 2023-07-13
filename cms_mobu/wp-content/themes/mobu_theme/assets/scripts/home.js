import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";

/**
 * Home page scripts
 */
$.when($.ready).then(function () {
  /**
   * Header slider
   */
  if ($(".header-slider").length) {
    const swiperHeader = new Swiper(".header-slider", {
      modules: [Navigation, Pagination],

      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  /**
   * Video (play/pause actions)
   */
  if ($(".wrap-video-cta").length) {
    const videoElement = document.querySelector(".video-cta");

    videoElement.addEventListener("click", () => {
      if (videoElement.paused) {
        videoElement.play();
      } else {
        videoElement.pause();
      }
    });
  }

  /**
   * Testimonials slider
   */
  if ($(".testimonials-slider").length) {
    const swiperTestimonials = new Swiper(".testimonials-slider", {
      modules: [Navigation, Pagination],

      pagination: {
        el: ".swiper-pagination-testimonials",
        clickable: true,
      },
    });
  }

  /**
   * Team content
   */
  if ($(".team").length) {
    const wrapDevs = document.querySelectorAll(".wrap-dev");

    wrapDevs.forEach((wrapDev) => {
      const frontTeam = wrapDev.querySelector(".front-team");
      const backTeam = wrapDev.querySelector(".back-team");
      const icon = wrapDev.querySelector(".ico-team");

      wrapDev.addEventListener("mouseover", () => {
        icon.style.opacity = "0";
        frontTeam.style.opacity = "0";
        frontTeam.style.display = "none";
        backTeam.style.opacity = "1";
        backTeam.style.display = "block";
      });

      wrapDev.addEventListener("mouseout", () => {
        icon.style.opacity = "1";
        backTeam.style.opacity = "0";
        backTeam.style.display = "none";
        frontTeam.style.opacity = "1";
        frontTeam.style.display = "block";
      });
    });
  }
});
