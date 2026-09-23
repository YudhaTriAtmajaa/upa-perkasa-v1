@extends('layouts.app')
@section('title', 'Beranda')
@section('meta_description', 'UPA Perkasa Unmul — Unit Pelayanan Alumni dan Pengembangan Karir Universitas Mulawarman.')
@php
    $heroSlides = [
        ['img' => asset('img/photos/leader-02.jpg'), 'alt' => 'Suasana Kampus Unmul'],
        ['img' => asset('img/photos/leader-02.jpg'), 'alt' => 'Kegiatan UPA Perkasa'],
        ['img' => asset('img/photos/leader-02.jpg'), 'alt' => 'Bursa Kerja Unmul'],
    ];

    $pengumuman = [
        ['date'=>'12 Sep 2024','title'=>'Hasil Seleksi Administrasi Magang Batch 5','url'=>'#'],
        ['date'=>'05 Sep 2024','title'=>'Pendaftaran Beasiswa Unggulan Mulawarman','url'=>'#'],
        ['date'=>'01 Sep 2024','title'=>'Panduan Pengisian Tracer Study Alumni 2023','url'=>'#'],
        ['date'=>'28 Agu 2024','title'=>'Jadwal Yudisium Periode Semester Ganjil 2024/2025','url'=>'#'],
        ['date'=>'22 Agu 2024','title'=>'Perpanjangan Pendaftaran Program Magang Bersertifikat','url'=>'#'],
        ['date'=>'15 Agu 2024','title'=>'Pengumuman Penerima Beasiswa KIP Kuliah Tahap 2','url'=>'#'],
    ];

    // `logo` = path to the company's logo image (e.g. asset('img/logos/nama-perusahaan.png')).
    // Leave it null/blank to show an empty placeholder template — once you have
    // the real logo, just fill this in and it'll appear in the card automatically.
    $lowongan = [
        ['title'=>'Software Engineer','company'=>'PT. Teknologi Borneo Maju','logo'=>null,'status'=>'Open','tags'=>['S1','S2'],'deadline'=>'15 Okt 2024','url'=>route('publikasi.lowongan-detail','pt-teknologi-maju-bersama')],
        ['title'=>'Management Trainee','company'=>'Bank Kaltimtara','logo'=>null,'status'=>'Open','tags'=>['S1','S2'],'deadline'=>'20 Okt 2024','url'=>route('publikasi.lowongan-detail','bank-kaltimtara')],
        ['title'=>'Field Supervisor','company'=>'PT. Agro Lestari Utama','logo'=>null,'status'=>'Open','tags'=>['S1','S2'],'deadline'=>'12 Okt 2024','url'=>route('publikasi.lowongan-detail','pt-agro-lestari-utama')],
    ];

    $berita = [
        ['image'=>asset('img/photos/leader-02.jpg'),'date'=>'10 Sep 2024','title'=>'Tips Menghadapi Wawancara Kerja di Perusahaan Multinasional','excerpt'=>'Menghadapi interview di level global membutuhkan persiapan mental dan skill komunikasi yang matang. Berikut adalah...','url'=>'#'],
        ['image'=>asset('img/photos/leader-02.jpg'),'date'=>'08 Sep 2024','title'=>'Workshop Kewirausahaan: Membangun Startup dari Kampus','excerpt'=>'Universitas Mulawarman kembali menggelar rangkaian workshop bagi para pengusaha muda untuk mematangkan konsep bisnis...','url'=>'#'],
        ['image'=>asset('img/photos/leader-02.jpg'),'date'=>'05 Sep 2024','title'=>'Pelepasan Magang Bersertifikat Batch 5 Tahun 2024','excerpt'=>'Sebanyak 150 mahasiswa terpilih dilepas untuk mengikuti program magang di berbagai BUMN dan perusahaan ternama...','url'=>'#'],
    ];

    $agenda = [
        ['month'=>'SEP','day'=>'25','title'=>'Career Talk: Navigating the Tech Industry','time'=>'09:00 - 12:00 WITA','location'=>'Ruang Aula Rektorat Lt. 3'],
        ['month'=>'OKT','day'=>'02','title'=>'Seminar Nasional: Ekonomi Kreatif 5.0','time'=>'13:00 - 16:00 WITA','location'=>'Online via Zoom'],
        ['month'=>'OKT','day'=>'10','title'=>'Bursa Kerja Unmul (Unmul Job Fair 2024)','time'=>'08:00 - 17:00 WITA','location'=>'GOR 27 September Unmul'],
        ['month'=>'OKT','day'=>'14','title'=>'Company Visit: PT. Pupuk Kaltim','time'=>'09:00 - 15:00 WITA','location'=>'Bontang, Kalimantan Timur'],
        ['month'=>'OKT','day'=>'18','title'=>'Workshop CV & Portfolio Building','time'=>'13:00 - 15:30 WITA','location'=>'Lab Komputer FEB Unmul'],
        ['month'=>'OKT','day'=>'25','title'=>'Sesi Konseling Karir Kelompok','time'=>'10:00 - 12:00 WITA','location'=>'Ruang Konseling UPA Perkasa'],
    ];
@endphp

@section('content')

    <!-- HERO — Swiper.js banner slider -->
<section class="upa-hero">
    <div class="swiper upa-hero-swiper">
        <div class="swiper-wrapper">
            @foreach ($heroSlides as $slide)
                <div class="swiper-slide">
                    <div class="upa-hero__img-wrap">
                        <img src="{{ $slide['img'] }}" alt="{{ $slide['alt'] }}" class="upa-hero__img">
                    </div>
                    <div class="upa-hero__overlay"></div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination upa-hero-swiper__pagination"></div>
    </div>
</section>

    <!-- AGENDA KEGIATAN — carousel otomatis, geser & mengulang terus -->
<section class="upa-announce-section">
    <div class="container px-3 px-lg-5">

        <div class="text-center mb-5">
            <h2 class="heading-bubble upa-announce-section__title">Agenda Kegiatan</h2>
            <p class="upa-announce-section__subtitle mb-3 ps-3" data-aos="fade-up">Jangan lewatkan rangkaian kegiatan UPA Perkasa mendatang</p>
        </div>

        <div class="swiper upa-announce-swiper mb-3 ps-3" data-aos="fade-up"">
            <div class="swiper-wrapper">
                @foreach ($agenda as $item)
                    <div class="swiper-slide">
                        @include('components.agenda-item', $item)
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination upa-announce-swiper__pagination mt-3"></div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('publikasi.agenda') }}" class="btn btn-upa-light">Lihat Selengkapnya</a>
        </div>
    </div>
</section>

    <!-- LOWONGAN KERJA TERBARU -->
<section class="upa-section bg-white">
    <div class="container px-3 px-lg-5">

        @include('components.section-header', [
            'icon'     => 'bi-briefcase',
            'title'    => 'Lowongan Kerja Terbaru',
            'subtitle' => 'Temukan peluang karir yang sesuai dengan kompetensi Anda.',
            'linkText' => 'Lihat Semua Lowongan',
            'linkUrl'  => route('publikasi.lowongan'),
        ])

        <div class="row g-4 d-none d-lg-flex">
            @foreach ($lowongan as $i => $item)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    @include('components.vacancy-card', $item)
                </div>
            @endforeach
        </div>

        {{-- Mobile / tablet: Swiper --}}
        <div class="swiper upa-lowongan-swiper d-lg-none">
            <div class="swiper-wrapper">
                @foreach ($lowongan as $item)
                    <div class="swiper-slide">
                        @include('components.vacancy-card', $item)
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination upa-lowongan-swiper__pagination mt-4"></div>
        </div>
    </div>
</section>

    <!-- BERITA TERBARU — Swiper.js (mobile slide / desktop grid) -->
<section class="upa-section upa-section--alt">
    <div class="container px-3 px-lg-5">

        @include('components.section-header', [
            'icon'     => 'bi-newspaper',
            'title'    => 'Berita Terbaru',
            'subtitle' => 'Informasi seputar pengembangan karir dan kampus.',
            'linkText' => 'Lihat Semua Berita',
            'linkUrl'  => route('publikasi.berita'),
        ])

        {{-- Desktop grid: 3 cards side by side --}}
        <div class="row g-4 d-none d-lg-flex">
            @foreach ($berita as $i => $item)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    @include('components.news-card', $item)
                </div>
            @endforeach
        </div>

        {{-- Mobile / tablet: Swiper --}}
        <div class="swiper upa-berita-swiper d-lg-none">
            <div class="swiper-wrapper">
                @foreach ($berita as $i => $item)
                    <div class="swiper-slide">
                        @include('components.news-card', $item)
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination upa-berita-swiper__pagination mt-4"></div>
        </div>
    </div>
</section>

    <!-- PENGUMUMAN -->
<section class="upa-section bg-white">
    <div class="container px-3 px-lg-5">

        @include('components.section-header', [
            'icon'     => 'bi-megaphone',
            'title'    => 'Pengumuman',
            'subtitle' => 'Informasi resmi dan update terbaru seputar kegiatan UPA PERKASA',
            'linkText' => 'Lihat Semua Pengumuman',
            'linkUrl'  => route('publikasi.pengumuman'),
        ])

        <div class="upa-pengumuman-grid" data-aos="fade-up">
            @foreach ($pengumuman as $item)
                @include('components.announcement-card', $item)
            @endforeach
        </div>

        {{-- Mobile / tablet: Swiper --}}
        <div class="swiper upa-agenda-swiper d-lg-none">
            <div class="swiper-wrapper">
                @foreach ($pengumuman as $item)
                    <div class="swiper-slide">
                        @include('components.announcement-card', $item)
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination upa-agenda-swiper__pagination mt-4"></div>
        </div>
    </div>
</section>

@endsection