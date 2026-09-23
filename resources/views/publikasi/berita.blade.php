@extends('layouts.app')
@section('title', 'Berita Terkini')

@php
    // Dummy data — replace with paginated data from backend later ($berita->items(), etc.)
    $beritaList = [
        [
            'slug'    => 'pelatihan-soft-skill-mahasiswa-akhir',
            'image'   => asset('img/photos/leader-02.jpg'),
            'date'    => '24 Oktober 2024',
            'title'   => 'Pelatihan Soft Skill Mahasiswa Akhir Menuju Dunia Kerja',
            'excerpt' => 'UPA Perkasa sukses menyelenggarakan program penguatan kompetensi komunikasi dan kerja tim bagi mahasiswa tingkat akhir.',
            'views'   => '1,2k',
        ],
        [
            'slug'    => 'career-fair-2024-menghubungkan-alumni',
            'image'   => asset('img/photos/leader-02.jpg'),
            'date'    => '24 Oktober 2024',
            'title'   => 'Career Fair 2024: Menghubungkan Alumni dengan Industri',
            'excerpt' => 'Lebih dari 30 perusahaan multinasional hadir dalam gelaran tahunan Career Fair Universitas Mulawarman.',
            'views'   => '3,4k',
        ],
        [
            'slug'    => 'update-tracer-study-peningkatan-persentase',
            'image'   => asset('img/photos/leader-02.jpg'),
            'date'    => '24 Oktober 2024',
            'title'   => 'Update Tracer Study: Peningkatan Persentase Serapan Lulusan',
            'excerpt' => 'Data terbaru IKU 1 menunjukkan kenaikan signifikan serapan lulusan Unmul di pasar kerja nasional.',
            'views'   => '2,1k',
        ],
        [
            'slug'    => 'mou-baru-kemitraan-strategis-sektor-industri',
            'image'   => asset('img/photos/leader-02.jpg'),
            'date'    => '24 Oktober 2024',
            'title'   => 'MOU Baru: Kemitraan Strategis dengan Sektor Industri',
            'excerpt' => 'Universitas Mulawarman resmi menjalin kerjasama program magang bersertifikat dengan mitra industri terkemuka.',
            'views'   => '890',
        ],
        [
            'slug'    => 'tips-karir-membangun-personal-branding',
            'image'   => asset('img/photos/leader-02.jpg'),
            'date'    => '24 Oktober 2024',
            'title'   => 'Tips Karir: Membangun Personal Branding bagi Fresh Graduate',
            'excerpt' => 'Langkah-langkah praktis mengoptimalkan profil LinkedIn dan CV agar terlihat lebih menonjol di mata perekrut.',
            'views'   => '5,6k',
        ],
        [
            'slug'    => 'relokasi-kantor-layanan-upa-perkasa',
            'image'   => asset('img/photos/leader-02.jpg'),
            'date'    => '24 Oktober 2024',
            'title'   => 'Relokasi Kantor Layanan UPA Perkasa Unmul',
            'excerpt' => 'Untuk meningkatkan kenyamanan pelayanan, mulai Mei 2024 seluruh layanan dipindahkan ke Gedung Prof. Masjaya Lt. 1.',
            'views'   => '1,1k',
        ],
    ];

    $totalBerita = 48;
    $currentPage = 1;
    $totalPages  = 10;
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Publikasi','url'=>route('publikasi.berita')],
    ['label'=>'Berita'],
]])
@include('components.page-hero', [
    'variant'  => 'panel',
    'title'    => 'Berita Terkini',
    'subtitle' => 'Kumpulan berita, liputan kegiatan, dan informasi terbaru dari UPA Perkasa Universitas Mulawarman.',
    'icon'     => 'bi-newspaper',
])

<section class="upa-section pt-4" id="berita-list">
    <div class="container px-3 px-lg-5">

        {{-- Filter bar --}}
        <form method="GET" class="upa-berita-filter mb-4" data-aos="fade-up">
            <div class="upa-berita-filter__search">
                <i class="bi bi-search"></i>
                <input type="text" name="q" placeholder="Cari berita" value="{{ request('q') }}">
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

        {{-- Grid --}}
        <div class="row g-4 mb-4">
            @foreach ($beritaList as $i => $item)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    @include('components.berita-card', [
                        'image'   => $item['image'],
                        'date'    => $item['date'],
                        'title'   => $item['title'],
                        'excerpt' => $item['excerpt'],
                        'views'   => $item['views'],
                        'url'     => route('publikasi.berita-detail', $item['slug']),
                    ])
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="upa-pagination-bar" data-aos="fade-up">
            <span class="upa-pagination-bar__info">
                Menampilkan 1-{{ count($beritaList) }} dari {{ $totalBerita }} Berita
            </span>
            <ul class="upa-pagination">
                <li>
                    <a href="#" class="upa-pagination__prev {{ $currentPage === 1 ? 'disabled' : '' }}" aria-label="Halaman sebelumnya">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
                <li>
                    {{-- Every page number lives here so it scrolls sideways
                        instead of being truncated with "…" — handy once
                        there are more pages than fit the bar. --}}
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

    // The site's global smooth-scroll (Lenis, set up in main.js) takes over
    // the page's scroll position on every animation frame. A native call
    // like `element.scrollIntoView()` or `window.scrollTo()` gets fought by
    // that loop — it may not move at all, or snap back — which is why the
    // "scroll to top" behaviour looked inconsistent between clicks. When
    // Lenis is available we hand the scroll to it instead; otherwise we
    // fall back to the native API (e.g. if the CDN script failed to load).
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

        // Jump back to the top of the news list whenever the page changes,
        // so the user always starts reading page 2, 3, etc. from the top
        // instead of staying scrolled down near the pagination bar.
        var section = document.getElementById('berita-list');
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