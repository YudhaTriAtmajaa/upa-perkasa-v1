@extends('layouts.app')
@section('title', 'Informasi Tersedia Setiap Saat')
@section('meta_description', 'Akses cepat ke dokumen publik, layanan karir, dan informasi institusional UPA Perkasa Universitas Mulawarman.')

@php
    // Dummy data — replace with data from backend later.
    $infoCards = [
        [
            'icon' => 'bi-person-vcard',
            'title' => 'Contact Person',
            'desc' => 'Informasi kontak resmi untuk bantuan administratif dan layanan teknis.',
            'linkIcon' => 'bi-envelope',
            'linkLabel' => 'Email : upt.perkasa@unmul.ac.id',
            'linkUrl' => 'mailto:upt.perkasa@unmul.ac.id',
        ],
        [
            'icon' => 'bi-briefcase',
            'title' => 'Info Lowongan',
            'desc' => 'Update harian peluang karir dari mitra industri terpercaya.',
            'linkIcon' => 'bi-box-arrow-up-right',
            'linkLabel' => 'Halaman Info Lowongan',
            'linkUrl' => route('publikasi.lowongan'),
        ],
        [
            'icon' => 'bi-bar-chart-line',
            'title' => 'Layanan Tracer Study',
            'desc' => 'Portal pendataan alumni untuk pengembangan kurikulum dan kualitas lulusan.',
            'linkIcon' => 'bi-box-arrow-up-right',
            'linkLabel' => 'Halaman Layanan Tracer Study',
            'linkUrl' => 'https://perkasa.unmul.ac.id/perkasa2/tracer-study',
            'external' => true,
        ],
        [
            'icon' => 'bi-file-earmark-text',
            'title' => 'Draft PKS',
            'desc' => 'Template Perjanjian Kerja Sama untuk standarisasi administrasi kemitraan.',
            'linkIcon' => 'bi-download',
            'linkLabel' => 'Unduh Dokumen',
            'linkUrl' => '#',
        ],
        [
            'icon' => 'bi-file-earmark-check',
            'title' => 'Draft MOU',
            'desc' => 'Dokumen dasar Nota Kesepahaman antara Universitas dan stakeholder luar.',
            'linkIcon' => 'bi-download',
            'linkLabel' => 'Unduh Dokumen',
            'linkUrl' => '#',
        ],
        [
            'icon' => 'bi-clipboard-check',
            'title' => 'Layanan Peminjaman Aset',
            'desc' => 'Prosedur dan formulir peminjaman ruang atau peralatan pendukung kegiatan.',
            'linkIcon' => 'bi-box-arrow-up-right',
            'linkLabel' => 'Halaman Layanan SIJASA UNMUL',
            'linkUrl' => '#',
        ],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'PPID','url'=>route('ppid.tentang')],
    ['label'=>'Informasi Tersedia Setiap Saat'],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5">

        <div class="upa-ppid-hero" data-aos="fade-up">
            <h1 class="upa-ppid-hero__title heading-bubble">Informasi Tersedia Setiap Saat</h1>
            <p class="upa-ppid-hero__text">
                Akses cepat dan transparan ke seluruh dokumen publik, layanan karir, dan informasi
                institusional UPA Perkasa Universitas Mulawarman.
            </p>
        </div>

        <div class="upa-ppid-org mb-4" style="text-align:left" data-aos="fade-up">
            <h2 class="upa-ppid-org__title" style="text-align:left">Daftar Informasi Publik</h2>
            <p class="upa-ppid-org__subtitle" style="text-align:left;margin-bottom:0;">
                Berikut adalah dokumen dan tautan layanan yang dapat diakses oleh civitas akademika dan
                mitra industri kapan saja.
            </p>
        </div>

        <div class="upa-ppid-info-grid" data-aos="fade-up">
            @foreach ($infoCards as $i => $card)
                <div class="upa-ppid-info-card">
                    <span class="upa-ppid-info-card__num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <i class="bi {{ $card['icon'] }} upa-ppid-info-card__icon"></i>
                    <h3 class="upa-ppid-info-card__title">{{ $card['title'] }}</h3>
                    <p class="upa-ppid-info-card__desc">{{ $card['desc'] }}</p>
                    <a href="{{ $card['linkUrl'] }}" @if($card['external'] ?? false) target="_blank" rel="noopener" @endif class="upa-ppid-info-card__link">
                        <i class="bi {{ $card['linkIcon'] }}"></i> <span>{{ $card['linkLabel'] }}</span>
                    </a>
                </div>
            @endforeach

            <div class="upa-ppid-info-card upa-ppid-info-card--wide">
                <div class="upa-ppid-info-card__body">
                    <span class="upa-ppid-info-card__num">07</span>
                    <div>
                        <h3 class="upa-ppid-info-card__title mb-1">Info Event Unmul</h3>
                        <p class="upa-ppid-info-card__desc mb-0">
                            Temukan informasi kegiatan akademik, seminar, pelatihan, workshop, dan event Universitas Mulawarman terbaru.
                        </p>
                    </div>
                </div>
                <a href="{{ route('publikasi.agenda') }}" class="btn btn-upa-primary flex-shrink-0">
                    <i class="bi bi-calendar-event me-2"></i>Lihat Kalender
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
