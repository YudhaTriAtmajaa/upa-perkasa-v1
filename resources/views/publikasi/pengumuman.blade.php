@extends('layouts.app')
@section('title', 'Pengumuman Resmi')

@php
    // Dummy data — replace with paginated data from backend later ($pengumuman->items(), etc.)
    $pengumumanList = [
        [
            'slug'     => 'seleksi-beasiswa-unggulan-mahasiswa-berprestasi-2024',
            'date'     => '24 Oktober 2024',
            'title'    => 'Pendaftaran Program Magang Industri Batch 5 Tahun 2024',
            'division' => 'Divisi Pengembangan Karir',
            'excerpt'  => 'Dibuka kesempatan magang bagi mahasiswa tingkat akhir di 15 mitra industri nasional dengan konversi SKS sesuai kurikulum MBKM.',
        ],
        [
            'slug'     => 'sosialisasi-pengisian-tracer-study-wisuda-september-2024',
            'date'     => '20 Oktober 2024',
            'title'    => 'Sosialisasi Pengisian Tracer Study Lulusan Periode Wisuda September 2024',
            'division' => 'Unit Tracer Study',
            'excerpt'  => 'Diharapkan seluruh alumni yang baru lulus untuk mengisi kuesioner pemetaan karir guna meningkatkan kualitas IKU universitas.',
        ],
        [
            'slug'     => 'hasil-seleksi-administrasi-beasiswa-pemberdayaan-mahasiswa-berprestasi',
            'date'     => '15 Oktober 2024',
            'title'    => 'Hasil Seleksi Administrasi Beasiswa Pemberdayaan Mahasiswa Berprestasi',
            'division' => 'Administrasi Umum & Beasiswa',
            'excerpt'  => 'Berikut adalah daftar nama mahasiswa yang dinyatakan lolos tahap pertama seleksi beasiswa internal tahun akademik 2024/2025.',
        ],
        [
            'slug'     => 'pemutakhiran-data-mandiri-portal-karir-upa-perkasa',
            'date'     => '10 Oktober 2024',
            'title'    => 'Pemutakhiran Data Mandiri di Portal Karir UPA Perkasa',
            'division' => 'Sistem Informasi',
            'excerpt'  => 'Himbauan pembaruan CV dan Portofolio digital untuk mempermudah pemetaan kompetensi mahasiswa dalam penyaluran kerja.',
        ],
        [
            'slug'     => 'pedoman-penulisan-laporan-akhir-pkl-terbaru',
            'date'     => '05 Oktober 2024',
            'title'    => 'Pedoman Penulisan Laporan Akhir Praktik Kerja Lapangan (PKL) Terbaru',
            'division' => 'Bagian Akademik',
            'excerpt'  => 'Pemberitahuan mengenai format standar terbaru dalam penyusunan laporan PKL yang mulai berlaku pada semester ganjil ini.',
        ],
    ];

    $totalPengumuman = 48;
    $currentPage     = 1;
    $totalPages      = 10;
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Publikasi','url'=>route('publikasi.pengumuman')],
    ['label'=>'Pengumuman'],
]])
@include('components.page-hero', [
    'variant'  => 'panel',
    'title'    => 'Pengumuman Resmi',
    'subtitle' => 'Informasi resmi, kebijakan, dan edaran penting dari UPA Perkasa Universitas Mulawarman untuk seluruh civitas akademika dan stakeholder terkait.',
    'icon'     => 'bi-megaphone',
])

<section class="upa-section pt-4" id="pengumuman-list">
    <div class="container px-3 px-lg-5">

        {{-- Filter bar --}}
        <form method="GET" class="upa-pengumuman-filter mb-4" data-aos="fade-up">
            <div class="upa-pengumuman-filter__search">
                <i class="bi bi-search"></i>
                <input type="text" name="q" placeholder="Cari pengumuman" value="{{ request('q') }}">
            </div>
            <select name="divisi">
                <option value="">Pilih Divisi</option>
                @foreach (['Divisi Pengembangan Karir','Unit Tracer Study','Administrasi Umum & Beasiswa','Sistem Informasi','Bagian Akademik'] as $divisi)
                    <option value="{{ $divisi }}" @selected(request('divisi') === $divisi)>{{ $divisi }}</option>
                @endforeach
            </select>
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
            @foreach ($pengumumanList as $i => $item)
                <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    @include('components.pengumuman-card', [
                        'date'     => $item['date'],
                        'title'    => $item['title'],
                        'division' => $item['division'],
                        'excerpt'  => $item['excerpt'],
                        'url'      => route('publikasi.pengumuman-detail', $item['slug']),
                    ])
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="upa-pagination-bar" data-aos="fade-up">
            <span class="upa-pagination-bar__info">
                Menampilkan 1-{{ count($pengumumanList) }} dari {{ $totalPengumuman }} Pengumuman
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

        var section = document.getElementById('pengumuman-list');
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