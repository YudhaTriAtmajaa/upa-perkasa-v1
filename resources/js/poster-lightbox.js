/* ==========================================================================
    poster-lightbox.js  —  UPA Perkasa
   ========================================================================== */
"use strict";

document.addEventListener("DOMContentLoaded", function () {
  const lightbox = document.getElementById("upaPosterLightbox");
  if (!lightbox) return; 

  const img       = document.getElementById("upaPosterLightboxImg");
  const closeBtn  = document.getElementById("upaPosterLightboxClose");

  function openLightbox(src, alt) {
    img.src = src;
    img.alt = alt || "Pratinjau poster ukuran penuh";
    lightbox.classList.add("is-open");
    lightbox.setAttribute("aria-hidden", "false");
  }

  function closeLightbox() {
    lightbox.classList.remove("is-open");
    lightbox.setAttribute("aria-hidden", "true");
    img.src = "";
  }

  document.addEventListener("click", function (e) {
    const thumb = e.target.closest(".js-poster-thumb");
    if (thumb) {
      openLightbox(thumb.dataset.posterFull, thumb.querySelector("img")?.alt);
      return;
    }
    if (e.target === lightbox) closeLightbox();
  });

  closeBtn.addEventListener("click", closeLightbox);

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && lightbox.classList.contains("is-open")) closeLightbox();
  });
});