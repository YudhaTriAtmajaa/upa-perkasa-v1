/* ============================================================
   report.js
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {
    var docCards = document.querySelectorAll('.upa-report-doc');
    var emptyState  = document.getElementById('reportPreviewEmpty');
    var loadedState = document.getElementById('reportPreviewLoaded');

    if (!docCards.length || !emptyState || !loadedState) return;

    var titleEl = document.getElementById('reportPreviewTitle');
    var dateEl  = document.getElementById('reportPreviewDate');
    var sizeEl  = document.getElementById('reportPreviewSize');
    var frameEl = document.getElementById('reportPreviewFrame');
    var previewPanel = document.querySelector('.upa-report-preview');

    var PDF_VIEWER_PARAMS = '#toolbar=0&navpanes=0';

    function resolveSrc(file) {
        var drive = file.match(/drive\.google\.com\/file\/d\/([^/?#]+)/);
        if (drive) {
            return 'https://drive.google.com/file/d/' + drive[1] + '/preview';
        }
        return file + PDF_VIEWER_PARAMS;
    }

    function selectDoc(card) {
        var file  = card.getAttribute('data-file');
        var title = card.getAttribute('data-title');
        var date  = card.getAttribute('data-date');
        var size  = card.getAttribute('data-size');

        docCards.forEach(function (c) { c.classList.toggle('active', c === card); });

        titleEl.textContent = title;
        dateEl.textContent  = date;
        sizeEl.textContent  = size;

        if (frameEl && file) frameEl.src = resolveSrc(file);

        emptyState.classList.add('d-none');
        loadedState.classList.remove('d-none');

        if (previewPanel) {
            if (window.lenis && typeof window.lenis.scrollTo === 'function') {
                window.lenis.scrollTo(previewPanel, { offset: -90, duration: 1 });
            } else {
                previewPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    }

    docCards.forEach(function (card) {
        card.addEventListener('click', function () { selectDoc(card); });
    });

    var searchInput = document.getElementById('reportSearchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            var q = searchInput.value.trim().toLowerCase();

            docCards.forEach(function (card) {
                var title = (card.getAttribute('data-title') || '').toLowerCase();
                var match = title.indexOf(q) !== -1;
                card.classList.toggle('d-none', !match);
            });

            document.querySelectorAll('.upa-report-doc-grid').forEach(function (grid) {
                var visible = grid.querySelectorAll('.upa-report-doc:not(.d-none)').length > 0;
                grid.classList.toggle('d-none', !visible);
                var label = grid.previousElementSibling;
                if (label && label.classList.contains('upa-report-list-label')) {
                    label.classList.toggle('d-none', !visible);
                }
            });
        });
    }
});