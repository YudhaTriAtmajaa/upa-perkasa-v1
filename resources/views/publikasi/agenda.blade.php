@extends('layouts.app')
@section('title', 'Agenda Kegiatan')

@php
    // Dummy data — replace with paginated data from backend later ($agenda->items(), etc.)
    $agendaList = [
        [
            'slug'       => 'workshop-persiapan-karir-campus-hiring-2024',
            'status'     => 'Pendaftaran Dibuka',
            'date'       => '24 Oktober 2024',
            'category'   => 'Campus Hiring',
            'title'      => 'Workshop Persiapan Karir & Campus Hiring 2024',
            'excerpt'    => 'Agenda tahunan UPA Perkasa yang membekali calon wisudawan dan alumni dengan keterampilan praktis menghadapi dunia kerja.',
            'location'   => 'Auditorium Universitas Mulawarman, Samarinda',
            'capacity'   => '200 Peserta',
            'time'       => '08:00 - 15:30 WITA',
        ],
        [
            'slug'       => 'strategi-branding-media-sosial-2024',
            'status'     => 'Akan Datang',
            'date'       => '28 Oktober 2024',
            'category'   => 'Workshop Digital Marketing',
            'title'      => 'Strategi Branding & Media Sosial 2024',
            'excerpt'    => 'Pelajari cara membangun brand yang kuat di era digital bersama praktisi industri berpengalaman. Sesi ini akan mencakup audit media sosial, pembuatan konten, dan iklan berbayar.',
            'location'   => 'Gedung Aula Lantai 3, Unmul',
            'narasumber' => 'Sarah Wijaya (HR Lead)',
            'capacity'   => '100 Peserta',
            'time'       => '08:00 - 15:30 WITA',
        ],
        [
            'slug'       => 'persiapan-interview-kerja-simulasi-linkedin',
            'status'     => 'Akan Datang',
            'date'       => '05 November 2024',
            'category'   => 'Seminar Karir',
            'title'      => 'Persiapan Interview Kerja & Simulasi LinkedIn',
            'excerpt'    => 'Bagaimana cara tampil percaya diri saat interview? Kami menghadirkan HR dari perusahaan multinasional untuk berbagi tips eksklusif dan review profil LinkedIn secara langsung.',
            'location'   => 'Zoom Meeting (Online)',
            'narasumber' => 'Sarah Wijaya (HR Lead)',
            'capacity'   => '100 Peserta',
            'time'       => '08:00 - 15:30 WITA',
        ],
        [
            'slug'       => 'bootcamp-dasar-data-science-python',
            'status'     => 'Akan Datang',
            'date'       => '12 November 2024',
            'category'   => 'Pelatihan Teknis',
            'title'      => 'Bootcamp Dasar-Dasar Data Science dengan Python',
            'excerpt'    => 'Program intensif 2 hari untuk mengenalkan mahasiswa pada dunia pengolahan data. Peserta akan belajar memvisualisasikan data dan melakukan prediksi sederhana.',
            'location'   => 'Lab Komputer Terpadu',
            'narasumber' => 'Sarah Wijaya (HR Lead)',
            'capacity'   => '100 Peserta',
            'time'       => '08:00 - 15:30 WITA',
        ],
        [
            'slug'       => 'mulawarman-career-expo-road-to-success',
            'status'     => 'Akan Datang',
            'date'       => '20 November 2024',
            'category'   => 'Job Fair',
            'title'      => 'Mulawarman Career Expo: Road to Success',
            'excerpt'    => 'Kesempatan bertemu langsung dengan puluhan perusahaan mitra Universitas Mulawarman. Tersedia lebih dari 500 lowongan kerja untuk fresh graduate dan profesional.',
            'location'   => 'GOR Universitas Mulawarman',
            'capacity'   => '100 Peserta',
            'time'       => '08:00 - 15:30 WITA',
        ],
        [
            'slug'       => 'mulawarman-career-expo-road-to-success-2',
            'status'     => 'Akan Datang',
            'date'       => '27 November 2024',
            'category'   => 'Job Fair',
            'title'      => 'Mulawarman Career Expo: Road to Success',
            'excerpt'    => 'Kesempatan bertemu langsung dengan puluhan perusahaan mitra Universitas Mulawarman. Tersedia lebih dari 500 lowongan kerja untuk fresh graduate dan profesional.',
            'location'   => 'GOR Universitas Mulawarman',
            'capacity'   => '100 Peserta',
            'time'       => '08:00 - 15:30 WITA',
        ],
    ];

    $totalAgenda = 48;
    $currentPage = 1;
    $totalPages  = 10;
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Publikasi','url'=>route('publikasi.agenda')],
    ['label'=>'Agenda Kegiatan'],
]])
@include('components.page-hero', [
    'variant'  => 'panel',
    'title'    => 'Agenda Kegiatan',
    'subtitle' => 'Jadwal kegiatan, workshop, seminar, dan pelatihan yang akan datang di lingkungan kampus Universitas Mulawarman untuk menunjang karir dan kompetensi mahasiswa serta alumni.',
    'icon'     => 'bi-calendar-check',
])

<section class="upa-section pt-4" id="agenda-list">
    <div class="container px-3 px-lg-5">

        {{-- Filter bar --}}
        <form method="GET" class="upa-agenda-filter mb-4" data-aos="fade-up">
            <div class="upa-agenda-filter__search">
                <i class="bi bi-search"></i>
                <input type="text" name="q" placeholder="Cari agenda kegiatan" value="{{ request('q') }}">
            </div>
            <select name="bulan">
                <option value="">Pilih Bulan</option>
                @foreach (['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                    <option value="{{ $bulan }}" @selected(request('bulan') === $bulan)>{{ $bulan }}</option>
                @endforeach
            </select>
            <select name="tahun">
                <option value="">Pilih Tahun</option>
                @foreach (range(now()->year, now()->year - 5) as $tahun)
                    <option value="{{ $tahun }}" @selected((int) request('tahun') === $tahun)>{{ $tahun }}</option>
                @endforeach
            </select>
        </form>

        {{-- List --}}
        <div class="d-flex flex-column gap-4 mb-4">
            @foreach ($agendaList as $i => $item)
                <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    @include('components.agenda-card', [
                        'status'     => $item['status'],
                        'category'   => $item['category'],
                        'date'       => $item['date'],
                        'title'      => $item['title'],
                        'excerpt'    => $item['excerpt'],
                        'location'   => $item['location'],
                        'narasumber' => $item['narasumber'] ?? null,
                        'capacity'   => $item['capacity'],
                        'time'       => $item['time'],
                        'url'        => route('publikasi.agenda-detail', $item['slug']),
                    ])
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="upa-pagination-bar" data-aos="fade-up">
            <span class="upa-pagination-bar__info">
                Menampilkan 1-{{ count($agendaList) }} dari {{ $totalAgenda }} Agenda Kegiatan
            </span>
            <ul class="upa-pagination">
                <li>
                    <a href="#" class="upa-pagination__prev {{ $currentPage === 1 ? 'disabled' : '' }}" aria-label="Halaman sebelumnya">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
                <li>
                    <div class="upa-pagination__numbers">
                        @for ($p = 1; $p <= $totalPages; $p++)
                            <a href="#" class="upa-pagination__item {{ $p === $currentPage ? 'active' : '' }}">{{ $p }}</a>
                        @endfor
                    </div>
                </li>
                <li>
                    <a href="#" class="upa-pagination__next {{ $currentPage === $totalPages ? 'disabled' : '' }}" aria-label="Halaman berikutnya">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var strip = document.querySelector('.upa-pagination__numbers');
    var prevBtn = document.querySelector('.upa-pagination__prev');
    var nextBtn = document.querySelector('.upa-pagination__next');
    if (!strip || !prevBtn || !nextBtn) return;

    var items = Array.prototype.slice.call(strip.querySelectorAll('.upa-pagination__item'));

    function scrollItemIntoView(item) {
        var stripRect = strip.getBoundingClientRect();
        var itemRect  = item.getBoundingClientRect();
        if (itemRect.left < stripRect.left) {
            strip.scrollBy({ left: itemRect.left - stripRect.left - 12, behavior: 'smooth' });
        } else if (itemRect.right > stripRect.right) {
            strip.scrollBy({ left: itemRect.right - stripRect.right + 12, behavior: 'smooth' });
        }
    }

    // See berita.blade.php for why we hand off to Lenis instead of using
    // the native scrollIntoView()/scrollTo() APIs directly.
    function scrollToTop(section) {
        if (window.lenis && typeof window.lenis.scrollTo === 'function') {
            window.lenis.scrollTo(section, { offset: -100, duration: 1 });
        } else {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function setActive(index) {
        if (index < 0 || index >= items.length) return;
        items.forEach(function (el, i) { el.classList.toggle('active', i === index); });
        prevBtn.classList.toggle('disabled', index === 0);
        nextBtn.classList.toggle('disabled', index === items.length - 1);
        scrollItemIntoView(items[index]);

        var section = document.getElementById('agenda-list');
        if (section) {
            scrollToTop(section);
        }
    }

    function activeIndex() {
        var i = items.findIndex(function (el) { return el.classList.contains('active'); });
        return i === -1 ? 0 : i;
    }

    items.forEach(function (item, i) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            setActive(i);
        });
    });
    prevBtn.addEventListener('click', function (e) {
        e.preventDefault();
        setActive(activeIndex() - 1);
    });
    nextBtn.addEventListener('click', function (e) {
        e.preventDefault();
        setActive(activeIndex() + 1);
    });
});
</script>
@endpush