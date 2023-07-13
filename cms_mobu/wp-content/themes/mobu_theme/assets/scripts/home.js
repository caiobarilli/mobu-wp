import { set } from "immutable";
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

  /**
   * News
   */
  if ($(".news").length) {
    const singleNews = document.querySelectorAll(".single-news"),
      singlePostNews = document.querySelector(".single-post-news"),
      backdrop = document.querySelector(".backdrop-post-news"),
      singlePost = document.querySelector(".wrap-single-post");

    backdrop.addEventListener("click", () => {
      singlePostNews.style.display = "none";
    });

    singleNews.forEach((single) => {
      const content = single.querySelector(".news-content"),
        postId = single.querySelector('input[name="post_id"]').value;

      content.addEventListener("click", () => {
        $.ajax({
          url: wp.ajax_url,
          type: "POST",
          data: {
            action: "show_post",
            postId: postId,
          },
          success: function (response) {
            if (response) {
              singlePost.innerHTML = response;
              singlePostNews.style.display = "block";
            }
          },
        });
      });
    });
  }

  /**
   * Single post News
   */

  const wrapSinglePost = document.querySelector(".wrap-single-post");

  // Criar um observador de mutação
  const observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
      // Verificar se a div "wrap-single-post" foi modificada
      if (mutation.target === wrapSinglePost) {
        const singlePostNews = document.querySelector(".single-post-news"),
          singlePost = document.querySelector(".wrap-single-post");

        const prevNews = document.querySelector(".previous-post"),
          nextNews = document.querySelector(".next-post");

        const prevId = document.querySelector(
          '.previous-post > form > input[name="post_id"]'
        ).value;

        const nextId = document.querySelector(
          '.next-post > form > input[name="post_id"]'
        ).value;

        const close = document.querySelectorAll(".close-post");

        // Close
        close.forEach((c) => {
          c.addEventListener("click", () => {
            singlePostNews.style.display = "none";
          });
        });

        // Prev
        prevNews.addEventListener("click", () => {
          setTimeout(() => {
            singlePostNews.style.display = "none";
          }, 200);

          if (prevId) {
            $.ajax({
              url: wp.ajax_url,
              type: "POST",
              data: {
                action: "show_post",
                postId: prevId,
              },
              success: function (response) {
                if (response) {
                  singlePost.innerHTML = response;
                  singlePostNews.style.display = "block";
                }

                setTimeout(() => {
                  singlePostNews.style.display = "block";
                }, 400);
              },
            });
          }
        });

        // Next
        nextNews.addEventListener("click", () => {
          if (nextId) {
            $.ajax({
              url: wp.ajax_url,
              type: "POST",
              data: {
                action: "show_post",
                postId: nextId,
              },
              success: function (response) {
                if (response) {
                  singlePost.innerHTML = response;
                  singlePostNews.style.display = "block";
                }
              },
            });
          }
        });
      }
    });
  });

  const options = {
    childList: true,
    subtree: false,
  };

  observer.observe(wrapSinglePost, options);
});
