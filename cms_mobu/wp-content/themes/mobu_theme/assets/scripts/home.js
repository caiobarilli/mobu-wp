import "jquery-smooth-scroll";
import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";

/**
 * Main nav (animations)
 */
$.when($.ready).then(function () {
  const mainNav = document.getElementById("main-nav");

  if ($(mainNav).length) {
    let previousScrollTop = 0,
      isReady = true;

    if (window.scrollY >= 160 && isReady) {
      mainNav.classList.add("menu-fixed");
    }

    window.addEventListener("scroll", mainNavScroll);

    function mainNavScroll() {
      const scrollTop = window.scrollY;

      if (scrollTop >= 160) {
        mainNav.classList.add("menu-fixed");
      } else {
        mainNav.classList.remove("menu-fixed");
      }

      if (scrollTop < previousScrollTop) {
        if (scrollTop <= 260) {
          mainNav.classList.add("scroll-up-navigation");
        }
        if (scrollTop <= 180) {
          mainNav.classList.remove("scroll-up-navigation");
        }
      }

      previousScrollTop = scrollTop;
    }
  }
});

/**
 * Smooth scroll (a.scroll-down)
 */
$.when($.ready).then(function () {
  function removeHashFromURL() {
    if (window.location.hash) {
      history.replaceState(
        {},
        document.title,
        window.location.href.split("#")[0]
      );
    }
  }

  window.addEventListener("hashchange", removeHashFromURL);

  $("a").click(function (event) {
    if (!$(this).hasClass("smooth-scroll")) {
      event.preventDefault();
    } else {
      $(this).smoothScroll({
        offset: 210,
        direction: "top",
        scrollTarget: null,
        autoFocus: false,
        delegateSelector: null,
        easing: "swing",
        speed: 600,
        autoCoefficient: 2,
        preventDefault: true,
      });
    }
  });
});

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
   * Course slider
   */
  if ($(".course-slider").length) {
    const swiperHeader = new Swiper(".course-slider", {
      modules: [Navigation, Pagination],

      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    const wrapCourses = document.querySelectorAll(".wrap-courses");

    wrapCourses.forEach((course) => {
      const frontCourse = course.querySelector(".front-course"),
        backCourse = course.querySelector(".back-course"),
        iconCourse = course.querySelector(".ico-course");

      course.addEventListener("mouseover", () => {
        if (iconCourse.classList.contains("hide-anim")) {
          iconCourse.classList.remove("hide-anim");
        }

        iconCourse.classList.add("show-anim");

        frontCourse.classList.add("hide-anim");
        backCourse.classList.add("show-anim");
      });

      course.addEventListener("mouseout", () => {
        iconCourse.classList.add("hide-anim");

        backCourse.classList.remove("show-anim");

        frontCourse.classList.remove("hide-anim");
        frontCourse.classList.add("show-anim");
      });
    });
  }
});

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
    const frontTeam = wrapDev.querySelector(".front-team"),
      backTeam = wrapDev.querySelector(".back-team"),
      icon = wrapDev.querySelector(".ico-team");

    wrapDev.addEventListener("mouseover", () => {
      icon.classList.add("hide-anim");
      frontTeam.classList.add("hide-anim");
      backTeam.classList.add("show-anim");
    });

    wrapDev.addEventListener("mouseout", () => {
      icon.classList.remove("hide-anim");
      icon.classList.add("show-anim");

      backTeam.classList.remove("show-anim");

      frontTeam.classList.remove("hide-anim");
      frontTeam.classList.add("show-anim");
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
            setTimeout(() => {
              $.smoothScroll({
                scrollTarget: "#news",
                speed: 600,
              });
              singlePostNews.style.display = "block";
            }, 400);
          }
        },
      });
    });
  });
}

/**
 * Single post News
 */
if ($(".wrap-single-post").length) {
  const wrapSinglePost = document.querySelector(".wrap-single-post");

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
        close.forEach((x) => {
          x.addEventListener("click", () => {
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
                  setTimeout(() => {
                    $.smoothScroll({
                      scrollTarget: "#news",
                      speed: 600,
                    });
                    singlePostNews.style.display = "block";
                  }, 400);
                }
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
                  singlePostNews.style.display = "block";
                  setTimeout(() => {
                    $.smoothScroll({
                      scrollTarget: "#news",
                      speed: 600,
                    });
                    singlePost.innerHTML = response;
                  }, 400);
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
}

/**
 * Share post News
 */
if ($("#share-post").length) {
  const postId = document.querySelector(
      '#share-post input[name="post_id"]'
    ).value,
    singlePostNews = document.querySelector(".single-post-news"),
    singlePost = document.querySelector(".wrap-single-post");

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
        setTimeout(() => {
          $.smoothScroll({
            scrollTarget: "#news",
            speed: 600,
          });
          singlePostNews.style.display = "block";
        }, 400);
      }
    },
  });
}
