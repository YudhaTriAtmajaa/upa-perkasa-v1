{{-- Report tabs navigation: Laporan Tahunan / Tracer Study & Triwulan / Capaian IKU1 --}}
<div class="upa-report-tabs" data-aos="fade-up">
    <a href="{{ route('report.laporan-tahunan') }}" class="upa-report-tabs__item {{ $active === 'tahunan' ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text"></i> Laporan Tahunan
    </a>
    <a href="{{ route('report.tracer-study') }}" class="upa-report-tabs__item {{ $active === 'tracer' ? 'active' : '' }}">
        <i class="bi bi-graph-up"></i> Tracer Study & Triwulan
    </a>
    <a href="{{ route('report.capaian-iku1') }}" class="upa-report-tabs__item {{ $active === 'iku1' ? 'active' : '' }}">
        <i class="bi bi-bar-chart"></i> Capaian IKU1
    </a>
</div>
