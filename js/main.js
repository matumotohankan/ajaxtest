window.addEventListener("DOMContentLoaded", () => {
    const infiniteSlider = new Swiper(".infinite-slider", {
      loop: true,
      loopedSlides: 5,
      slidesPerView: "auto",
      speed: 2000,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
    });
  });