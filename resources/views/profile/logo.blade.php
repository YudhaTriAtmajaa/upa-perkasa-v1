@extends('layouts.app')
@section('title', 'Logo UPA Perkasa')

@php
    // 'icon' = Bootstrap Icons class. 'svg' = inline custom icon for motifs Bootstrap Icons doesn't cover.
    $identitasInti = [
        ['icon'=>'bi-shield-check', 'title'=>'Perisai Hijau',  'desc'=>'Perlindungan dan kekuatan ilmu pengetahuan.'],
        ['svg'=>'boat',             'title'=>'Perahu & Ombak', 'desc'=>'Representasi kearifan lokal Sungai Mahakam.'],
        ['icon'=>'bi-gear',        'title'=>'Roda Gigi',       'desc'=>'Simbol kemajuan teknologi dan produktivitas industri.'],
        ['svg'=>'mandau',          'title'=>'Guci & Mandau',   'desc'=>'Keluhuran budaya dan daya saing yang tangguh.'],
    ];
    $desainTambahan = [
        ['svg'=>'leaf',        'title'=>'Lingkaran Daun Hijau',   'desc'=>'Melambangkan pertumbuhan yang segar dan berkelanjutan (sustainability). Bentuk melingkar menunjukkan ekosistem karier yang terpadu dan dukungan yang tiada putus bagi mahasiswa serta alumni.'],
        ['icon'=>'bi-type',    'title'=>'Tipografi "UPA Perkasa"','desc'=>'Menggunakan warna hijau yang solid dan modern, mencerminkan profesionalisme dalam pelayanan pengembangan karier dan semangat kewirausahaan yang dinamis.'],
        ['icon'=>'bi-palette', 'title'=>'Aksen Warna Kuning',     'desc'=>'Warna kuning mengambil inspirasi dari bendera UNMUL yang bermakna kemakmuran dan kejayaan, melambangkan masa depan cerah bagi lulusan.'],
    ];

    // Custom motif icons (Bootstrap Icons has no boat/traditional-weapon glyphs, so these are hand-drawn).
    $customSvgIcons = [
        'boat' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15h16l-1.6 3.2a2 2 0 0 1-1.8 1.1H7.4a2 2 0 0 1-1.8-1.1L4 15Z"/><path d="M12 15V6"/><path d="M12 7l5 4.3H12Z"/><path d="M2.5 20c1.2-1 2.4-1 3.6 0s2.4 1 3.6 0 2.4-1 3.6 0 2.4 1 3.6 0 2.4-1 3.6 0"/></svg>',
        'mandau' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M9.2 3h5.6"/><path d="M10 3v2.3c0 1-1 1.7-1 3.1V18a3 3 0 0 0 3 3v0a3 3 0 0 0 3-3V8.4c0-1.4-1-2.1-1-3.1V3"/><path d="M15.5 10.5 21 5"/><path d="M18.3 3.3l2.4 2.4"/></svg>',
        'leaf' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 3.3c-9.5-.6-16 5-16 11.8 0 2.9 2 4.9 4.9 4.9 8.2 0 11.1-7.7 11.1-14.6 0-.7 0-1.4 0-2.1Z"/><path d="M8.5 20c2-6 6-9.8 10.8-12.7"/></svg>',
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Profile','url'=>route('profile.sejarah')],
    ['label'=>'Logo UPA Perkasa'],
]])
@include('components.page-hero', [
    'variant'  => 'bubble',
    'title'    => 'Logo UPA PERKASA',
    'subtitle' => 'Visualisasi identitas dan semangat transformasi Unit Pelaksana Akademik Pengembangan Karier dan Kewirausahaan Universitas Mulawarman.',
])

<section class="upa-section pt-0">
    <div class="container px-3 px-lg-5">

        {{-- Logo display + filosofi intro --}}
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="upa-logo-display">
                    <img src="{{ asset('img/logo/logo-full.png') }}" alt="Logo UPA Perkasa">
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="100">
                <span class="section-eyebrow mb-3"><i class="bi bi-patch-check-fill me-1"></i> Identitas Resmi</span>
                <h3 class="mt-3 mb-3">Filosofi Logo UPA PERKASA</h3>
                <p class="text-muted" style="line-height:1.8;">
                    Logo UPA Perkasa bukan sekadar simbol visual, melainkan representasi dari sinergi antara
                    tradisi akademik Universitas Mulawarman dengan dinamika dunia profesional. Setiap elemen
                    dirancang dengan presisi untuk mencerminkan ketangguhan, pertumbuhan, dan inovasi dalam
                    membekali mahasiswa menuju masa depan yang gemilang.
                </p>
            </div>
        </div>

        {{-- Identitas Inti + Desain Tambahan --}}
        <div class="row g-5 mb-5">
            <div class="col-lg-6">
                <h5 class="mb-3 pb-2 border-bottom border-2 border-success" data-aos="fade-right">
                    Identitas Inti: <span class="text-upa-yellow-outline">Lambang UNMUL</span>
                </h5>
                <p class="text-muted mb-4" data-aos="fade-up">
                    Logo UPA Perkasa tetap menempatkan Lambang Universitas Mulawarman sebagai pusatnya.
                    Hal ini menegaskan bahwa seluruh langkah unit ini berakar pada nilai-nilai universitas:
                </p>
                <div class="row g-3">
                    @foreach ($identitasInti as $i => $item)
                        <div class="col-6" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                            <div class="upa-feature-card h-100">
                                <div class="upa-feature-card__icon">
                                    @if (isset($item['svg']))
                                        {!! $customSvgIcons[$item['svg']] !!}
                                    @else
                                        <i class="bi {{ $item['icon'] }}"></i>
                                    @endif
                                </div>
                                <h6 class="upa-feature-card__title">{{ $item['title'] }}</h6>
                                <p class="upa-feature-card__desc mb-0">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-6">
                <h5 class="mb-3 pb-2 border-bottom border-2 border-success" data-aos="fade-left">
                    Desain Tambahan: <span class="text-upa-yellow-outline">UPA PERKASA</span>
                </h5>
                <div class="d-flex flex-column gap-3 mt-2">
                    @foreach ($desainTambahan as $i => $item)
                        <div class="upa-feature-card d-flex gap-3" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="upa-feature-card__icon upa-feature-card__icon--yellow flex-shrink-0" style="margin-bottom:0;">
                                @if (isset($item['svg']))
                                    {!! $customSvgIcons[$item['svg']] !!}
                                @else
                                    <i class="bi {{ $item['icon'] }}"></i>
                                @endif
                            </div>
                            <div>
                                <h6 class="upa-feature-card__title">{{ $item['title'] }}</h6>
                                <p class="upa-feature-card__desc mb-0">{{ $item['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Quote block --}}
        <div class="upa-quote-block" data-aos="zoom-in">
            <div class="upa-quote-block__underline"></div>
            <p class="upa-quote-block__text">
                "Logo ini merupakan wujud integrasi antara jati diri akademik Universitas Mulawarman
                dengan visi pengembangan profesionalitas dunia kerja di masa depan."
            </p>
            <span class="upa-quote-block__cite">UPA PERKASA UNMUL</span>
        </div>
    </div>
</section>
@endsection