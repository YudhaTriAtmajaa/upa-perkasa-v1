"use strict";

/* ============================================================
   main.js - UPA Perkasa Unmul
   Initialises: Lenis | GSAP + ScrollTrigger | AOS | Swiper
   ============================================================ */

/* Lenis Smooth Scroll */
let lenis;

if (typeof Lenis !== "undefined") {
  lenis = new Lenis({
    duration: 1.0,
    lerp: 0.1,
    orientation: "vertical",
    gestureOrientation: "vertical",
    smoothWheel: true,
    wheelMultiplier: 1,
    touchMultiplier: 2,
    autoRaf: false
  });

  window.lenis = lenis;

  if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
    lenis.on("scroll", ScrollTrigger.update);
    gsap.ticker.add((time) => {
      lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);
  } else {
    function upaRaf(time) {
      lenis.raf(time);
      requestAnimationFrame(upaRaf);
    }
    requestAnimationFrame(upaRaf);
  }
}

/* Modal Integration with Lenis */
if (lenis) {
  document.addEventListener("show.bs.modal", () => lenis.stop());
  document.addEventListener("hidden.bs.modal", () => lenis.start());
}

/* AOS Animations */
if (typeof AOS !== "undefined") {
  AOS.init({
    duration: 700,
    easing: "ease-out-cubic",
    once: true,
    offset: 60,
    delay: 0
  });
}

/* GSAP Animations */
if (typeof gsap !== "undefined") {
  gsap.registerPlugin(ScrollTrigger);

  const entranceTl = gsap.timeline({ defaults: { ease: "power3.out" } });

  entranceTl
    .from(".upa-navbar", {
      y: -90,
      opacity: 0,
      duration: 0.9,
      clearProps: "transform"
    })
    .from(".upa-hero-swiper", { opacity: 0, duration: 0.9 }, "-=0.5")
    .from(".page-hero", { opacity: 0, y: 30, duration: 0.9 }, "-=0.9");

  const announceTitle = document.querySelector(".upa-announce-section__title");
  if (announceTitle) {
    gsap.from(announceTitle, {
      scrollTrigger: {
        trigger: announceTitle,
        start: "top 80%",
        toggleActions: "play none none none"
      },
      y: 50,
      opacity: 0,
      duration: 0.8,
      ease: "power2.out"
    });
  }

  const heroTitles = document.querySelectorAll(
    ".page-hero--bubble .page-hero__title, .page-hero--panel .page-hero__title, .page-hero--split .page-hero__title-top, .page-hero--split .page-hero__title-accent"
  );

  if (heroTitles.length) {
    gsap.from(heroTitles, {
      y: 60,
      opacity: 0,
      scale: 0.85,
      duration: 1,
      ease: "back.out(1.7)",
      delay: 0.5,
      stagger: 0.15
    });
  }

  const footerCols = document.querySelectorAll(
    ".upa-footer .col-12, .upa-footer .col-6, .upa-footer .col-lg-2, .upa-footer .col-lg-3"
  );

  if (footerCols.length) {
    gsap.from(footerCols, {
      scrollTrigger: {
        trigger: ".upa-footer",
        start: "top 90%",
        toggleActions: "play none none none"
      },
      y: 40,
      opacity: 0,
      duration: 0.6,
      stagger: 0.1,
      ease: "power2.out"
    });
  }
}

/* Swiper Instances */
if (typeof Swiper !== "undefined") {
  const heroSwiper = document.querySelector(".upa-hero-swiper");
  if (heroSwiper) {
    new Swiper(".upa-hero-swiper", {
      loop: true,
      effect: "fade",
      fadeEffect: { crossFade: true },
      speed: 1000,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      },
      pagination: { el: ".upa-hero-swiper__pagination", clickable: true },
      keyboard: { enabled: true },
      a11y: {
        prevSlideMessage: "Slide sebelumnya",
        nextSlideMessage: "Slide berikutnya"
      }
    });
  }

  const beritaSwiper = document.querySelector(".upa-berita-swiper");
  if (beritaSwiper) {
    new Swiper(".upa-berita-swiper", {
      rewind: true,
      slidesPerView: 1.15,
      spaceBetween: 16,
      grabCursor: true,
      pagination: { el: ".upa-berita-swiper__pagination", clickable: true },
      breakpoints: {
        576: { slidesPerView: 1.5, spaceBetween: 20 },
        768: { slidesPerView: 2.2, spaceBetween: 24 }
      }
    });
  }

  const announceSwiper = document.querySelector(".upa-announce-swiper");
  if (announceSwiper) {
    new Swiper(".upa-announce-swiper", {
      loop: true,
      slidesPerView: 1.1,
      spaceBetween: 16,
      grabCursor: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      },
      pagination: { el: ".upa-announce-swiper__pagination", clickable: true },
      breakpoints: {
        576: { slidesPerView: 1.6 },
        768: { slidesPerView: 2.2 },
        992: { slidesPerView: 2.4, spaceBetween: 20 },
        1200: { slidesPerView: 3, spaceBetween: 24 }
      }
    });
  }

  const lowonganSwiper = document.querySelector(".upa-lowongan-swiper");
  if (lowonganSwiper) {
    new Swiper(".upa-lowongan-swiper", {
      rewind: true,
      slidesPerView: 1.15,
      spaceBetween: 16,
      grabCursor: true,
      pagination: { el: ".upa-lowongan-swiper__pagination", clickable: true },
      breakpoints: {
        576: { slidesPerView: 1.5, spaceBetween: 20 },
        768: { slidesPerView: 2.2, spaceBetween: 24 }
      }
    });
  }

const agendaSwiper = document.querySelector(".upa-agenda-swiper");
  if (agendaSwiper) {
    new Swiper(".upa-agenda-swiper", {
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      },
      slidesPerView: 1.05,
      spaceBetween: 30,
      grabCursor: true,
      pagination: { el: ".upa-agenda-swiper__pagination", clickable: true },
      breakpoints: {
        576: { slidesPerView: 1.3, spaceBetween: 32 },
        768: { slidesPerView: 1.8, spaceBetween: 34 }
      }
    });
  }
}

/* Bootstrap Tooltips */
if (typeof bootstrap !== "undefined") {
  document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((el) => {
    new bootstrap.Tooltip(el);
  });
}

/* Scroll To Top */
document.querySelectorAll("[data-upa-scrolltop]").forEach((btn) => {
  btn.addEventListener("click", () => {
    if (window.lenis) {
      window.lenis.scrollTo(0, { duration: 1.2 });
    } else {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  });
});