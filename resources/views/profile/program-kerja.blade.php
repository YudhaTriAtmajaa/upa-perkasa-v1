@extends('layouts.app')
@section('title', 'Program Kerja')
@section('meta_description', 'Program Kerja Strategis UPA Perkasa Universitas Mulawarman.')
@php
    // Dummy data — backend team replace this array with Eloquent query.
    $programKerja = [
        ['image'=>asset('img/photos/leader-02.jpg'),'jenis'=>'Strategis','title'=>'Unmul Career Fair 2024',      'description'=>'Penyelenggaraan bursa kerja tahunan skala nasional yang menghubungkan ribuan lulusan dengan 50+ mitra industri terkemuka.','divisi'=>'Divisi Utama & Pengembangan Internal','icon'=>'bi-briefcase'],
        ['image'=>asset('img/photos/leader-02.jpg'),'jenis'=>'Event',    'title'=>'Workshop CV Excellence',       'description'=>'Sesi bimbingan intensif penyusunan kurikulum vitae dan simulasi interview berbasis standar industri global.','divisi'=>'Divisi Pengembangan Karir & Alumni','icon'=>'bi-graph-up-arrow'],
        ['image'=>asset('img/photos/leader-02.jpg'),'jenis'=>'Rutin',    'title'=>'Konseling Karir Individu',     'description'=>'Layanan konsultasi tatap muka mingguan untuk pemetaan minat, bakat, dan rencana karir jangka panjang mahasiswa.','divisi'=>'Divisi Bursa Kerja (Job Fair)','icon'=>'bi-lightbulb'],
        ['image'=>asset('img/photos/leader-02.jpg'),'jenis'=>'Event',    'title'=>'Company Visit: Tech Giant',    'description'=>'Kunjungan lapangan ke perusahaan teknologi multinasional untuk memahami budaya kerja dan ekosistem industri digital.','divisi'=>'Divisi Tracer Study','icon'=>'bi-bar-chart-line'],
        ['image'=>asset('img/photos/leader-02.jpg'),'jenis'=>'Rutin',    'title'=>'Klinik Kewirausahaan Mahasiswa','description'=>'Pendampingan rutin bagi mahasiswa yang merintis usaha, mulai dari model bisnis hingga strategi pemasaran digital.','divisi'=>'Divisi Kewirausahaan','icon'=>'bi-shop'],
        ['image'=>asset('img/photos/leader-02.jpg'),'jenis'=>'Event',    'title'=>'Demo Day Inkubator Bisnis',    'description'=>'Ajang presentasi startup binaan kampus di hadapan investor dan mitra industri untuk membuka peluang pendanaan.','divisi'=>'Divisi Inkubator Bisnis','icon'=>'bi-rocket-takeoff'],
    ];

    // Build unique filter options from data
    $jenisOptions  = collect($programKerja)->pluck('jenis')->unique()->values();
    $divisiOptions = collect($programKerja)->pluck('divisi')->unique()->values();
@endphp

@section('content')

@include('components.breadcrumb', [
    'crumbs' => [
        ['label' => 'Beranda', 'url' => route('home')],
        ['label' => 'Profile',  'url' => route('profile.sejarah')],
        ['label' => 'Program Kerja'],
    ],
])

@include('components.page-hero', [
    'variant'  => 'bubble',
    'title'    => 'Program Kerja Strategis',
    'subtitle' => 'Transformasi karir dan kewirausahaan mahasiswa Universitas Mulawarman melalui program-program terukur, inovatif, dan berdampak global.',
])

<section class="upa-section pt-0">
    <div class="container px-3 px-lg-5">

        <!-- ── Filter bar (DOM-based, powered by filter.js) ───────────── -->
        <div class="upa-pk-filterbar" data-aos="fade-up">
            <div class="upa-pk-filter-grid">
                <div class="upa-pk-filter-search">
                    <div class="position-relative">
                        <i class="bi bi-search position-absolute top-50 translate-middle-y ms-3 text-muted" style="z-index:1;"></i>
                        <input type="text" id="pkSearch"
                            class="form-control upa-pk-search-input"
                            placeholder="Cari program kerja...">
                    </div>
                </div>
                <div class="upa-pk-filter-col">
                    <select id="pkDivisi" class="form-select">
                        <option value="">Pilih Divisi</option>
                        @foreach ($divisiOptions as $d)
                            <option value="{{ $d }}">{{ $d }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="upa-pk-filter-col">
                    <select id="pkJenis" class="form-select">
                        <option value="">Pilih Jenis</option>
                        @foreach ($jenisOptions as $j)
                            <option value="{{ $j }}">{{ $j }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- ── Cards grid (all rendered by Blade, JS shows/hides) ──── --}}
        <div class="row g-4">
            @foreach ($programKerja as $i => $item)
                @php
                    $badgeClass = match($item['jenis']) {
                        'Strategis' => 'upa-pk-badge--strategis',
                        'Event'     => 'upa-pk-badge--event',
                        default     => 'upa-pk-badge--rutin',
                    };
                @endphp

                {{-- data-* attributes are read by filter.js for filtering --}}
                <div class="col-md-6 upa-pk-item"
                    data-title="{{ $item['title'] }}"
                    data-jenis="{{ $item['jenis'] }}"
                    data-divisi="{{ $item['divisi'] }}"
                    data-aos="fade-up"
                     data-aos-delay="{{ ($i % 2) * 100 }}">

                    <div class="upa-pk-card upa-hover-lift h-100">
                        <div class="upa-pk-card__media">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" loading="lazy">
                            <span class="upa-pk-badge {{ $badgeClass }}">{{ $item['jenis'] }}</span>
                        </div>
                        <div class="upa-pk-card__body">
                            <h5 class="upa-pk-card__title">{{ $item['title'] }}</h5>
                            <p class="upa-pk-card__desc">{{ $item['description'] }}</p>
                            <div class="upa-pk-card__divisi">
                                <i class="bi {{ $item['icon'] }} me-1"></i>
                                {{ strtoupper($item['divisi']) }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ── Empty state (hidden by default, shown by filter.js) ─── --}}
        <div id="pkEmpty" class="upa-pk-empty" style="display:none;">
            <i class="bi bi-inbox fs-1 d-block mb-3 text-muted"></i>
            <p class="mb-3 text-muted">Tidak ada program kerja yang cocok dengan filter Anda.</p>
            <button id="pkReset" type="button" class="btn btn-upa-outline btn-sm">
                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
            </button>
        </div>

    </div>
</section>
@endsection