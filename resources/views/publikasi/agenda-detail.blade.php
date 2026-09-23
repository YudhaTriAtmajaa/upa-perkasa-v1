@extends('layouts.app')
@section('title', $agenda['title'] ?? 'Detail Agenda Kegiatan')

@php
    // Dummy data — replace with the resolved $agenda model from the route model binding later.
    $agenda = $agenda ?? [
        'image'       => asset('img/photos/leader-02.jpg'),
        // Foto galeri agenda — isi dengan beberapa foto (2 s/d 8 foto disarankan).
        // Kalau field 'images' tidak diisi, carousel otomatis jatuh ke 'image' tunggal di atas.
        // NOTE: 4 foto placeholder di bawah ini cuma buat TES TAMPILAN carousel, sama
        // seperti punya Detail Berita. Ganti dengan foto asli agenda sebelum publish.
        'images'      => [
            asset('img/photos/demo-berita-1.jpg'),
            asset('img/photos/demo-berita-2.jpg'),
            asset('img/photos/demo-berita-3.jpg'),
            asset('img/photos/demo-berita-4.jpg'),
        ],
        'month'       => 'OKT',
        'day'         => '24',
        'status'      => 'Pendaftaran Dibuka',
        'category'    => 'Campus Hiring',
        'title'       => 'Workshop Persiapan Karir & Campus Hiring 2024',
        'location'    => 'Auditorium Universitas Mulawarman, Samarinda',
        'time'        => '08:00 - 15:30 WITA',
        'capacity'    => '200 Peserta',
        'description' => "Workshop Persiapan Karir 2024 merupakan agenda tahunan UPA Perkasa Universitas Mulawarman yang dirancang khusus untuk membekali calon wisudawan dan alumni dengan keterampilan praktis dalam menghadapi dunia kerja. Kegiatan ini akan menghadirkan pakar HR dari berbagai perusahaan nasional terkemuka untuk memberikan wawasan langsung mengenai standar rekrutmen terkini.",
        'materi'      => [
            'Penyusunan CV & Portofolio ATS-Friendly',
            'Teknik Wawancara Kerja Professional',
            'Strategi Personal Branding di LinkedIn',
            'Psikotes & Focus Group Discussion (FGD)',
        ],
        'fasilitas'   => [
            'E-Sertifikat Tingkat Universitas',
            'Konsumsi & Merchandise Kit',
            'Direct Interaction dengan HR Rekruter',
            'Prioritas Pendaftaran Campus Hiring',
        ],
        'deadline'    => '20 Oktober 2024, Pukul 23:59 WITA',
        'registerUrl' => '#',
    ];

    $statusClass = match ($agenda['status']) {
        'Pendaftaran Dibuka' => 'upa-badge-open',
        'Selesai'            => 'upa-badge-danger',
        default              => 'upa-badge-yellow',
    };
    $statusIcon = match ($agenda['status']) {
        'Pendaftaran Dibuka' => 'bi-check-circle-fill',
        'Selesai'            => 'bi-x-circle-fill',
        default              => 'bi-clock-history',
    };
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Publikasi','url'=>route('publikasi.agenda')],
    ['label'=>'Agenda Kegiatan','url'=>route('publikasi.agenda')],
    ['label'=> $agenda['title']],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5" style="max-width:980px;">
        <div class="upa-agenda-detail" data-aos="fade-up">

            <div class="upa-agenda-detail__top">
                <div class="upa-agenda-detail__date-box">
                    <span class="upa-agenda-detail__date-month">{{ $agenda['month'] }}</span>
                    <span class="upa-agenda-detail__date-day">{{ $agenda['day'] }}</span>
                </div>

                <h1 class="upa-agenda-detail__title">{{ $agenda['title'] }}</h1>

                <div class="upa-agenda-detail__badges">
                    <span class="upa-badge {{ $statusClass }}"><i class="bi {{ $statusIcon }}"></i>{{ $agenda['status'] }}</span>
                </div>

                <div class="upa-agenda-detail__meta">
                    <span><i class="bi bi-geo-alt-fill"></i>{{ $agenda['location'] }}</span>
                    <span><i class="bi bi-clock-fill"></i>{{ $agenda['time'] }}</span>
                    <span><i class="bi bi-people-fill"></i>Kapasitas: {{ $agenda['capacity'] }}</span>
                </div>
            </div>

            @php $galleryImages = $agenda['images'] ?? [$agenda['image']]; @endphp

            @if (count($galleryImages) > 1)
                <div class="upa-agenda-detail__gallery-wrap" data-aos="fade-up">
                    <div class="swiper upa-agenda-detail__gallery">
                        <div class="swiper-wrapper">
                            @foreach ($galleryImages as $img)
                                <div class="swiper-slide">
                                    <img src="{{ $img }}" alt="{{ $agenda['title'] }} - foto {{ $loop->iteration }}" class="upa-agenda-detail__cover">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="upa-agenda-detail__gallery-nav">
                        <button type="button" class="upa-agenda-detail__gallery-btn upa-agenda-detail__gallery-btn--prev" aria-label="Foto sebelumnya">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <div class="swiper-pagination upa-agenda-detail__gallery-pagination"></div>
                        <button type="button" class="upa-agenda-detail__gallery-btn upa-agenda-detail__gallery-btn--next" aria-label="Foto berikutnya">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
            @else
                <img src="{{ $agenda['image'] }}" alt="{{ $agenda['title'] }}" class="upa-agenda-detail__cover" data-aos="fade-up">
            @endif

            <h2 class="upa-agenda-detail__section-title">Deskripsi Kegiatan</h2>
            <p class="upa-agenda-detail__desc">{{ $agenda['description'] }}</p>

            @if (!empty($agenda['materi']) || !empty($agenda['fasilitas']))
                <div class="upa-agenda-detail__info-grid">
                    @isset($agenda['materi'])
                        <div class="upa-agenda-detail__info-box">
                            <p class="upa-agenda-detail__info-box__title"><i class="bi bi-list-check"></i>Materi Workshop</p>
                            <ul class="upa-agenda-detail__info-list">
                                @foreach ($agenda['materi'] as $point)
                                    <li><i class="bi bi-check-circle-fill"></i>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endisset
                    @isset($agenda['fasilitas'])
                        <div class="upa-agenda-detail__info-box">
                            <p class="upa-agenda-detail__info-box__title"><i class="bi bi-briefcase-fill"></i>Fasilitas Peserta</p>
                            <ul class="upa-agenda-detail__info-list">
                                @foreach ($agenda['fasilitas'] as $point)
                                    <li><i class="bi bi-check-circle-fill"></i>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endisset
                </div>
            @endif

            <div class="upa-agenda-detail__footer">
                <div>
                    <p class="upa-agenda-detail__deadline-label mb-0">Batas Pendaftaran:</p>
                    <p class="upa-agenda-detail__deadline-date mb-0">{{ $agenda['deadline'] }}</p>
                </div>
                <div class="upa-agenda-detail__actions">
                    <a href="{{ route('publikasi.agenda') }}" class="btn btn-upa-outline d-inline-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ $agenda['registerUrl'] ?? '#' }}" class="btn btn-upa-primary d-inline-flex align-items-center gap-2">
                        Daftar Sekarang <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection