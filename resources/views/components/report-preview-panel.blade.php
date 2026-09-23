{{--
    Panel preview dokumen — kosong secara default ("Pilih laporan di atas
    untuk mulai membaca"). Begitu salah satu .upa-report-doc di halaman
    yang sama diklik, resources/js/report.js mengisi judul/meta/src
    iframe di sini dan menukar state kosong → terisi.

    Toolbar preview (halaman, zoom, print, download, fullscreen) sudah
    dihapus. Sumber file bisa berupa PDF lokal (asset('files/...')) atau
    link Google Drive — report.js otomatis mengubah link Drive
    /view → /preview, dan menambah #toolbar=0&navpanes=0 untuk PDF lokal.

    Iframe dibungkus .upa-report-preview__viewport. Bar bawaan Google
    Drive (ikon buka-di-tab-baru di pojok kanan atas) sekarang
    ditampilkan — atur lewat --upa-drive-bar di resources/css/report.css
    (0px = tampil, 56px = dipotong/disembunyikan).

    Usage: @include('components.report-preview-panel')
--}}
<div class="upa-report-preview" data-aos="fade-up">

    <div class="upa-report-preview__empty" id="reportPreviewEmpty">
        <div class="upa-report-preview__empty-icon"><i class="bi bi-file-earmark-text"></i></div>
        <p class="upa-report-preview__empty-title">Pilih laporan di atas untuk mulai membaca</p>
        <p class="upa-report-preview__empty-sub">Klik salah satu dokumen pada daftar di atas untuk menampilkan pratinjau file laporan.</p>
    </div>

    <div class="upa-report-preview__loaded d-none" id="reportPreviewLoaded">
        <div class="upa-report-preview__header">
            <div class="upa-report-preview__header-left">
                <span class="upa-report-preview__header-icon"><i class="bi bi-filetype-pdf"></i></span>
                <div class="upa-report-preview__header-info">
                    <p class="upa-report-preview__header-title mb-0" id="reportPreviewTitle">—</p>
                    <p class="upa-report-preview__header-meta mb-0">
                        Update: <span id="reportPreviewDate">—</span> • PDF • <span id="reportPreviewSize">—</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="upa-report-preview__viewport">
            <iframe id="reportPreviewFrame" class="upa-report-preview__frame" title="Pratinjau dokumen" loading="lazy"></iframe>
        </div>
    </div>

</div>