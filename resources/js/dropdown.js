/* ==========================================================================
    dropdown.js  —  UPA Perkasa
    Hover-intent for desktop Bootstrap dropdowns (Profil, Publikasi, PPID, Report)
    GSAP animates the panel open/close via AOS-compatible CSS.
   ========================================================================== */
"use strict";

document.addEventListener("DOMContentLoaded", function () {
  if (!window.bootstrap) return;

  // Only enable hover on true pointer devices (not touch)
  if (!window.matchMedia("(hover: hover) and (pointer: fine)").matches) return;

  document.querySelectorAll(".upa-dropdown").forEach((el) => {
    const toggle = el.querySelector('[data-bs-toggle="dropdown"]');
    if (!toggle) return;

    const instance = bootstrap.Dropdown.getOrCreateInstance(toggle);
    let timer = null;

    el.addEventListener("mouseenter", () => {
      clearTimeout(timer);
      instance.show();
    });
    el.addEventListener("mouseleave", () => {
      timer = setTimeout(() => {
        instance.hide();
        if (document.activeElement === toggle) toggle.blur();
      }, 160);
    });
  });
});