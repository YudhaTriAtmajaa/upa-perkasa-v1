/* ============================================================
    agenda-detail-gallery.js
   ============================================================ */

if (typeof Swiper !== "undefined") {
  const galleryEl = document.querySelector(".upa-agenda-detail__gallery");

  if (galleryEl) {
    const prevBtn = document.querySelector(".upa-agenda-detail__gallery-btn--prev");
    const nextBtn = document.querySelector(".upa-agenda-detail__gallery-btn--next");

    const gallerySwiper = new Swiper(".upa-agenda-detail__gallery", {
      effect: "cards",
      grabCursor: true,
      rewind: true,
      cardsEffect: {
        perSlideOffset: 6,
        perSlideRotate: 2,
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
        el: ".upa-agenda-detail__gallery-pagination",
        clickable: true,
      },
    });

    if (prevBtn) prevBtn.addEventListener("click", () => gallerySwiper.slidePrev());
    if (nextBtn) nextBtn.addEventListener("click", () => gallerySwiper.slideNext());
  }
}
