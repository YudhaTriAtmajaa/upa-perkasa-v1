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
    .from(".upa-banner-swiper", { opacity: 0, duration: 0.9 }, "-=0.5")
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
  /* Mode loop + centeredSlides butuh minimal 5-6 slide. Jika slide asli lebih sedikit,
     slide digandakan di DOM supaya sisi kiri/kanan selalu terisi saat digeser. */
  const upaEnsureSlides = (selector, min) => {
    const wrapper = document.querySelector(selector + " .swiper-wrapper");
    if (!wrapper) return;
    const originals = Array.from(wrapper.children);
    let guard = 0;
    while (originals.length && wrapper.children.length < min && guard++ < 6) {
      originals.forEach((el) => wrapper.appendChild(el.cloneNode(true)));
    }
  };

  const heroSwiper = document.querySelector(".upa-banner-swiper");
  if (heroSwiper) {
    upaEnsureSlides(".upa-banner-swiper", 6);
    new Swiper(".upa-banner-swiper", {
      loop: true,
      centeredSlides: true,
      slidesPerView: 1.1,
      spaceBetween: 12,
      speed: 700,
      grabCursor: true,
      slideToClickedSlide: true,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      },
      navigation: {
        prevEl: ".upa-banner__nav--prev",
        nextEl: ".upa-banner__nav--next"
      },
      keyboard: { enabled: true },
      breakpoints: {
        576: { slidesPerView: 1.2, spaceBetween: 20 },
        992: { slidesPerView: 1.25, spaceBetween: 30 }
      },
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
    upaEnsureSlides(".upa-announce-swiper", 6);
    new Swiper(".upa-announce-swiper", {
      loop: true,
      centeredSlides: true,
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
        992: { slidesPerView: 2.6, spaceBetween: 20 },
        1200: { slidesPerView: 3, spaceBetween: 28 }
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

/* ============================================================
   Visitor Counter (Jumlah Pengunjung, papan skor flip)
   Alur: bangun kotak angka -> POST ke data-endpoint (backend menambah
   hitungan sekali per sesi) -> saat terlihat di layar, hitung 0 -> N.
   Kalau endpoint kosong/gagal dipakai angka contoh data-fallback (1000).
   ============================================================ */
(function () {
  const root = document.querySelector("[data-visitor-counter]");
  if (!root) return;

  const MIN_DIGITS = parseInt(root.dataset.digits, 10) || 5; // jumlah kotak minimal
  const FALLBACK = parseInt(root.dataset.fallback, 10) || 62948;
  const COUNT_DURATION = 1000; // ms, lamanya hitung 0 -> N
  const STEP = 50;
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  root.style.setProperty("--flip-step", STEP + "ms");

  /* ---------- Satu kotak angka ---------- */
  function createDigit() {
    const el = document.createElement("div");
    el.className = "upa-flip__digit";
    el.innerHTML =
      '<div class="upa-flip__half upa-flip__top"><span>0</span></div>' +
      '<div class="upa-flip__half upa-flip__bottom"><span>0</span></div>' +
      '<div class="upa-flip__leaf upa-flip__leaf--top"><span>0</span></div>' +
      '<div class="upa-flip__leaf upa-flip__leaf--bottom"><span>0</span></div>';

    const top = el.querySelector(".upa-flip__top span");
    const bottom = el.querySelector(".upa-flip__bottom span");
    const leafTop = el.querySelector(".upa-flip__leaf--top span");
    const leafBottom = el.querySelector(".upa-flip__leaf--bottom span");
    const leafBottomEl = el.querySelector(".upa-flip__leaf--bottom");

    const state = { current: 0, target: 0, busy: false };

    function setAll(v) {
      top.textContent = bottom.textContent = leafTop.textContent = leafBottom.textContent = v;
    }

    // Flip satu langkah: current -> current + 1 (0-9 berputar)
    function step() {
      if (state.current === state.target) {
        state.busy = false;
        return;
      }
      state.busy = true;
      const from = state.current;
      const to = (from + 1) % 10;

      top.textContent = to; // setengah atas statis = angka baru
      leafTop.textContent = from; // daun atas = angka lama (jatuh ke bawah)
      leafBottom.textContent = to; // daun bawah = angka baru (naik menutup)
      bottom.textContent = from; // setengah bawah statis = angka lama

      el.classList.remove("is-flipping");
      void el.offsetWidth; // restart animasi
      el.classList.add("is-flipping");

      const done = () => {
        leafBottomEl.removeEventListener("animationend", done);
        state.current = to;
        setAll(to);
        el.classList.remove("is-flipping");
        step();
      };
      leafBottomEl.addEventListener("animationend", done);
    }

    return {
      el,
      set(v) {
        state.target = v;
        if (!state.busy) step();
      },
      jump(v) {
        state.current = state.target = v;
        setAll(v);
      },
    };
  }

  const digits = [];

  // Tambah kotak di sisi kiri kalau angkanya lebih panjang dari jumlah kotak
  function ensureDigits(n) {
    while (digits.length < n) {
      const d = createDigit();
      digits.unshift(d);
      root.insertBefore(d.el, root.firstChild);
    }
  }

  ensureDigits(MIN_DIGITS);

  function render(value, instant) {
    const str = String(Math.max(0, Math.floor(value))).padStart(digits.length, "0");
    for (let i = 0; i < digits.length; i++) {
      const n = parseInt(str[i], 10);
      instant ? digits[i].jump(n) : digits[i].set(n);
    }
    root.setAttribute("aria-label", "Jumlah pengunjung: " + Number(value).toLocaleString("id-ID"));
  }

  function animateTo(total) {
    ensureDigits(String(Math.floor(total)).length);
    if (reduceMotion || total <= 0) {
      render(total, true);
      return;
    }
    const start = performance.now();
    const ease = (t) => 1 - Math.pow(1 - t, 3); // easeOutCubic

    function frame(now) {
      const t = Math.min((now - start) / COUNT_DURATION, 1);
      render(total * ease(t), false);
      if (t < 1) requestAnimationFrame(frame);
    }
    requestAnimationFrame(frame);
  }

  /* ---------- Ambil / tambah hitungan dari backend ---------- */
  function fetchCount() {
    const endpoint = root.dataset.endpoint;
    if (!endpoint) return Promise.resolve(FALLBACK);

    return fetch(endpoint, {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": root.dataset.csrf || "",
        Accept: "application/json",
      },
      credentials: "same-origin",
    })
      .then((res) => (res.ok ? res.json() : Promise.reject(res.status)))
      .then((data) => (Number.isFinite(Number(data.count)) ? Number(data.count) : FALLBACK))
      .catch(() => FALLBACK);
  }

  const countPromise = fetchCount();

  /* ---------- Mulai animasi saat terlihat di layar ---------- */
  const visible = new Promise((resolve) => {
    if (!("IntersectionObserver" in window)) return resolve();
    const io = new IntersectionObserver(
      (entries) => {
        if (entries.some((e) => e.isIntersecting)) {
          io.disconnect();
          resolve();
        }
      },
      { threshold: 0.4 }
    );
    io.observe(root);
  });

  Promise.all([countPromise, visible]).then(([count]) => animateTo(count));
})();