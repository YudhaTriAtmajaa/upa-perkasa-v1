/* ============================================================
    berita-detail-gallery.js
   ============================================================ */

if (typeof Swiper !== "undefined") {
  const galleryEl = document.querySelector(".upa-berita-detail__gallery");

  if (galleryEl) {
    const prevBtn = document.querySelector(".upa-berita-detail__gallery-btn--prev");
    const nextBtn = document.querySelector(".upa-berita-detail__gallery-btn--next");

    const gallerySwiper = new Swiper(".upa-berita-detail__gallery", {
      effect: "cards",
      grabCursor: true,
      rewind: true,
      cardsEffect: {
        perSlideOffset: 9,
        perSlideRotate: 3,
        slideShadows: true,
      },
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      keyboard: { enabled: true },
      a11y: { prevSlideMessage: "Foto sebelumnya", nextSlideMessage: "Foto berikutnya" },
      pagination: {
        el: ".upa-berita-detail__gallery-pagination",
        clickable: true,
      },
    });

    if (prevBtn) prevBtn.addEventListener("click", () => gallerySwiper.slidePrev());
    if (nextBtn) nextBtn.addEventListener("click", () => gallerySwiper.slideNext());
  }
}
