{{--
    Kartu satu dokumen laporan (PDF). Klik → resources/js/report.js
    menangkap data-file/data-title/data-meta di sini dan menampilkannya
    di panel preview (components.report-preview-panel) pada halaman
    yang sama.

    Usage:
        @include('components.report-doc-card', [
            'year'  => '2025',
            'date'  => '15 Jan 2025',
            'title' => 'Laporan Tahunan 2025',
            'size'  => '3.1 MB',
            'pages' => 18,
            'file'  => asset('files/laporan/laporan-tahunan-2025.pdf'),
        ])
--}}
<button type="button"
        class="upa-report-doc"
        data-file="{{ $file }}"
        data-title="{{ $title }}"
        data-date="{{ $date }}"
        data-size="{{ $size }}"
        data-pages="{{ $pages }}"
        data-meta="{{ $size }} • {{ $pages }} Halaman">
    <div class="upa-report-doc__top">
        <span class="upa-report-doc__year">{{ $year }}</span>
        <span class="upa-report-doc__date">{{ $date }}</span>
    </div>
    <div class="upa-report-doc__body">
        <span class="upa-report-doc__icon"><i class="bi bi-filetype-pdf"></i></span>
        <div class="upa-report-doc__text">
            <span class="upa-report-doc__title">{{ $title }}</span>
            <span class="upa-report-doc__meta">{{ $size }} • {{ $pages }} Halaman</span>
        </div>
    </div>
</button>