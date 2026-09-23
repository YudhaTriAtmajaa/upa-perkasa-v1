/* ==========================================================================
    navbar.js  —  UPA Perkasa
   ========================================================================== */
"use strict";

document.addEventListener("DOMContentLoaded", function () {

  /* --- Navbar scroll shadow --- */
  const navbar = document.querySelector(".upa-navbar");
  if (navbar) {
    const SCROLL_BUFFER = 120;
    const pillStart = () => Math.round(navbar.offsetHeight) + SCROLL_BUFFER;

    const toggleScrolled = () => {
      navbar.classList.toggle("upa-navbar--scrolled", window.scrollY > pillStart());
    };

    toggleScrolled();
    window.addEventListener("scroll", toggleScrolled, { passive: true });
    window.addEventListener("pageshow", toggleScrolled);

    if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
      ScrollTrigger.addEventListener("refresh", toggleScrolled);
    }
  }

  const menu       = document.getElementById("upaMobileMenu");
  const openBtn    = document.getElementById("upaMenuToggle");
  const closeBtn   = document.getElementById("upaMenuClose");

  if (menu && openBtn) {
    menu.querySelectorAll(
      ".upa-mobile-nav__header, .upa-mobile-nav__list > *, .upa-mobile-nav__login"
    ).forEach((el, i) => el.style.setProperty("--i", i));

    menu.querySelectorAll(".upa-mobile-accordion__panel").forEach((panel) => {
      panel.querySelectorAll(".upa-mobile-sublink").forEach((a, j) => a.style.setProperty("--j", j));
    });

    const root = document.documentElement;
    const openMenu = () => {
      menu.classList.add("is-open");
      menu.setAttribute("aria-hidden", "false");
      openBtn.setAttribute("aria-expanded", "true");
      document.body.classList.add("upa-mobilenav-open");
      root.classList.add("upa-mobilenav-lock");
      window.lenis?.stop();
    };
    const closeMenu = () => {
      if (menu.contains(document.activeElement)) openBtn.focus({ preventScroll: true });
      menu.classList.remove("is-open");
      menu.setAttribute("aria-hidden", "true");
      openBtn.setAttribute("aria-expanded", "false");
      document.body.classList.remove("upa-mobilenav-open");
      root.classList.remove("upa-mobilenav-lock");
      window.lenis?.start();
    };

    openBtn.addEventListener("click", openMenu);
    closeBtn?.addEventListener("click", closeMenu);

    // Close on Escape
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && menu.classList.contains("is-open")) closeMenu();
    });

    const desktopMQ = window.matchMedia("(min-width: 992px)");
    const onViewportChange = () => {
      if (!menu.classList.contains("is-open")) return;
      if (desktopMQ.matches) closeMenu();
    };
    window.addEventListener("resize", onViewportChange, { passive: true });

    menu.querySelectorAll("a.upa-mobile-link, a.upa-mobile-sublink").forEach((link) => {
      link.addEventListener("click", closeMenu);
    });

    menu.querySelectorAll("[data-accordion-toggle]").forEach((btn) => {
      btn.addEventListener("click", () => {
        const panel = document.getElementById(btn.getAttribute("aria-controls"));
        if (!panel) return;
        const isOpen = btn.classList.contains("is-open");

        menu.querySelectorAll(".upa-mobile-accordion__btn.is-open").forEach((other) => {
          if (other !== btn) {
            other.classList.remove("is-open");
            other.setAttribute("aria-expanded", "false");
            document.getElementById(other.getAttribute("aria-controls"))?.classList.remove("is-open");
          }
        });

        btn.classList.toggle("is-open", !isOpen);
        btn.setAttribute("aria-expanded", String(!isOpen));
        panel.classList.toggle("is-open", !isOpen);
      });
    });
  }
});