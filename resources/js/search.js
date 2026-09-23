/* ==========================================================================
   search.js  —  UPA Perkasa
   Vanilla JS live-search for the navbar.  No framework.
   Backend team: swap SEARCH_INDEX with a fetch() to a real JSON endpoint.
   ========================================================================== */
"use strict";

const SEARCH_INDEX = [
  { label: "Lowongan Kerja Terbaru", category: "Lowongan", url: "#" },
  { label: "Software Engineer — PT. Teknologi Borneo Maju", category: "Lowongan", url: "#" },
  { label: "Management Trainee — Bank Kaltimtara", category: "Lowongan", url: "#" },
  { label: "Field Supervisor — PT. Agro Lestari Utama", category: "Lowongan", url: "#" },
  { label: "Sejarah UPA Perkasa", category: "Profil", url: "/profil/sejarah" },
  { label: "Visi dan Misi", category: "Profil", url: "/profil/visi-misi" },
  { label: "Tujuan dan Sasaran", category: "Profil", url: "/profil/tujuan-sasaran" },
  { label: "Struktur Organisasi", category: "Profil", url: "/profil/struktur" },
  { label: "Profil Pimpinan Universitas Mulawarman", category: "Profil", url: "/profil/pimpinan" },
  { label: "Program Kerja Strategis", category: "Profil", url: "/profil/program-kerja" },
  { label: "Logo UPA PERKASA", category: "Profil", url: "/profil/logo" },
  { label: "Panduan Tracer Study", category: "Panduan", url: "/profil/panduan-tracer-study" },
  { label: "Bursa Kerja Unmul (Job Fair 2024)", category: "Agenda", url: "#" },
  { label: "Beasiswa Unggulan Mulawarman", category: "Pengumuman", url: "#" },
  { label: "Workshop CV Excellence", category: "Program", url: "#" },
];

function renderResults(results, query, container) {
  if (!container) return;
  if (!query) { container.style.display = "none"; return; }

  if (results.length === 0) {
    container.innerHTML = `<li class="upa-search__empty">
      <i class="bi bi-inbox me-2"></i>Tidak ada hasil untuk "<strong>${query}</strong>"
    </li>`;
  } else {
    container.innerHTML = results.map((item) => `
      <li>
        <a href="${item.url}">
          <i class="bi bi-search me-2 text-muted"></i>${item.label}
          <span class="upa-search__category">${item.category}</span>
        </a>
      </li>
    `).join("");
  }
  container.style.display = "block";
}

function initSearch(inputId, resultsId) {
  const input = document.getElementById(inputId);
  const results = document.getElementById(resultsId);
  if (!input || !results) return;

  input.addEventListener("input", () => {
    const q = input.value.trim().toLowerCase();
    const filtered = q
      ? SEARCH_INDEX.filter((i) => i.label.toLowerCase().includes(q)).slice(0, 7)
      : [];
    renderResults(filtered, q, results);

    // Subtle GSAP entrance for results
    if (typeof gsap !== "undefined" && results.style.display === "block") {
      gsap.fromTo(results, { opacity: 0, y: -8 }, { opacity: 1, y: 0, duration: 0.25, ease: "power2.out" });
    }
  });

  input.addEventListener("focus", () => {
    if (input.value.trim()) input.dispatchEvent(new Event("input"));
  });

  input.addEventListener("blur", () => {
    setTimeout(() => { results.style.display = "none"; }, 180);
  });

  // Close when clicking outside
  document.addEventListener("click", (e) => {
    if (!input.contains(e.target) && !results.contains(e.target)) {
      results.style.display = "none";
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  initSearch("upaSearchInput", "upaSearchResults");
  initSearch("upaSearchInputMobile", "upaSearchResultsMobile");
  initSearch("upaSearchInputInline", "upaSearchResultsInline"); // search di navbar mobile
});