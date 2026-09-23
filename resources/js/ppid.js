/* ============================================================
    ppid.js
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {
    var frameEl = document.getElementById('ppidDocFrame');
    if (!frameEl) return;
    var printBtn    = document.getElementById('ppidDocPrint');
    var fullscreenBtn = document.getElementById('ppidDocFullscreen');
    var fallbackUrl = frameEl.getAttribute('data-fallback-url') || frameEl.getAttribute('src');

    if (printBtn) {
        printBtn.addEventListener('click', function () {
            try {
                frameEl.contentWindow.focus();
                frameEl.contentWindow.print();
            } catch (e) {
                window.open(fallbackUrl, '_blank');
            }
        });
    }

    if (fullscreenBtn) {
        fullscreenBtn.addEventListener('click', function () {
            if (frameEl.requestFullscreen) {
                frameEl.requestFullscreen().catch(function () {
                    window.open(fallbackUrl, '_blank');
                });
            } else {
                window.open(fallbackUrl, '_blank');
            }
        });
    }
});
