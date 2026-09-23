/* ==========================================================================
   filter.js  —  UPA Perkasa
   Vanilla JS filter for Program Kerja page.
   All cards are rendered server-side by Blade with data-* attributes.
   JS only toggles visibility — no framework, no API calls.
   ========================================================================== */
"use strict";

document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("pkSearch");
  const divisiSelect = document.getElementById("pkDivisi");
  const jenisSelect  = document.getElementById("pkJenis");
  const resetBtn     = document.getElementById("pkReset");
  const emptyState   = document.getElementById("pkEmpty");
  const items        = document.querySelectorAll(".upa-pk-item");

  if (!searchInput || !items.length) return;

  function filterItems() {
    const q      = searchInput.value.trim().toLowerCase();
    const divisi = divisiSelect ? divisiSelect.value : "";
    const jenis  = jenisSelect  ? jenisSelect.value  : "";
    let visible  = 0;

    items.forEach((item) => {
      const matchQ      = !q      || item.dataset.title.toLowerCase().includes(q);
      const matchDivisi = !divisi || item.dataset.divisi === divisi;
      const matchJenis  = !jenis  || item.dataset.jenis  === jenis;
      const show = matchQ && matchDivisi && matchJenis;

      if (show) {
        item.classList.remove("d-none");
        visible++;
      } else {
        item.classList.add("d-none");
      }
    });

    if (emptyState) emptyState.style.display = visible === 0 ? "block" : "none";

    // Re-trigger AOS on newly visible cards
    if (typeof AOS !== "undefined") AOS.refreshHard();
  }

  searchInput.addEventListener("input", filterItems);
  if (divisiSelect) divisiSelect.addEventListener("change", filterItems);
  if (jenisSelect)  jenisSelect.addEventListener("change",  filterItems);

  if (resetBtn) {
    resetBtn.addEventListener("click", () => {
      searchInput.value = "";
      if (divisiSelect) divisiSelect.value = "";
      if (jenisSelect)  jenisSelect.value  = "";
      filterItems();
    });
  }
});
