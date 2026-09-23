@extends('layouts.app')
@section('title', 'Lowongan Pekerjaan')

@php
    // Dummy data — replace with paginated data from backend later ($lowongan->items(), etc.)
    // `logo` = path to the company's logo image. Leave null to show a placeholder icon.
    $lowonganList = [
        [
            'slug'       => 'pt-teknologi-maju-bersama',
            'logo'       => null,
            'title'      => 'Senior Software Engineer',
            'company'    => 'PT. Teknologi Maju Bersama',
            'tags'       => ['S1', 'S2'],
            'totalJobs'  => 3,
            'status'     => 'dibuka',
            'postedDate' => '15 Okt 2024',
        ],
        [
            'slug'       => 'bank-kaltimtara',
            'logo'       => null,
            'title'      => 'Management Trainee',
            'company'    => 'Bank Kaltimtara',
            'tags'       => ['S1'],
            'totalJobs'  => 2,
            'status'     => 'segera_berakhir',
            'postedDate' => '12 Okt 2024',
        ],
        [
            'slug'       => 'pt-agro-lestari-utama',
            'logo'       => null,
            'title'      => 'Field Supervisor',
            'company'    => 'PT. Agro Lestari Utama',
            'tags'       => ['S1', 'D3'],
            'totalJobs'  => 1,
            'status'     => 'tutup',
            'postedDate' => '05 Okt 2024',
        ],
        [
            'slug'       => 'pt-pupuk-kaltim',
            'logo'       => null,
            'title'      => 'Process Engineer',
            'company'    => 'PT. Pupuk Kaltim',
            'tags'       => ['S1', 'S2'],
            'totalJobs'  => 4,
            'status'     => 'dibuka',
            'postedDate' => '18 Okt 2024',
        ],
        [
            'slug'       => 'bumn-perkebunan-nusantara',
            'logo'       => null,
            'title'      => 'Management Trainee Perkebunan',
            'company'    => 'PTPN XIII',
            'tags'       => ['S1'],
            'totalJobs'  => 2,
            'status'     => 'tutup',
            'postedDate' => '01 Okt 2024',
        ],
        [
            'slug'       => 'pt-teknologi-maju-bersama-2',
            'logo'       => null,
            'title'      => 'UI/UX Designer Intern',
            'company'    => 'PT. Teknologi Maju Bersama',
            'tags'       => ['Mahasiswa Akhir'],
            'totalJobs'  => 1,
            'status'     => 'segera_berakhir',
            'postedDate' => '20 Okt 2024',
        ],
    ];

    // Dummy total (lebih besar dari jumlah data dummy di atas) supaya bar
    // pagination menampilkan 10 halaman, sama seperti page Berita.
    // Ganti dengan nilai asli dari backend nanti (mis. $lowongan->total(),
    // $lowongan->currentPage(), $lowongan->lastPage()).
    $totalLowongan = 48;
    $currentPage   = 1;
    $totalPages    = 10;
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Publikasi','url'=>route('publikasi.lowongan')],
    ['label'=>'Lowongan Pekerjaan'],
]])
@include('components.page-hero', [
    'variant'  => 'panel',
    'title'    => 'Lowongan Pekerjaan',
    'subtitle' => 'Temukan peluang karir profesional dan magang yang sesuai dengan kompetensi Anda.',
    'icon'     => 'bi-briefcase',
])

<section class="upa-section pt-4" id="lowongan-list">
    <div class="container px-3 px-lg-5">

        {{-- Filter bar --}}
        <form method="GET" class="upa-lowongan-filter mb-4" data-aos="fade-up">
            <div class="upa-lowongan-filter__search">
                <i class="bi bi-search"></i>
                <input type="text" name="q" placeholder="Cari posisi atau perusahaan" value="{{ request('q') }}">
            </div>
            <select name="jenjang">
                <option value="">Jenjang Pendidikan</option>
                @foreach (['Mahasiswa Akhir','Fresh Graduate','D3','D4','S1','S2','S3'] as $jenjang)
                    <option value="{{ $jenjang }}" @selected(request('jenjang') === $jenjang)>{{ $jenjang }}</option>
                @endforeach
            </select>
            <select name="status">
                <option value="">Status Lowongan</option>
                @foreach (['dibuka' => 'Sedang Dibuka', 'segera_berakhir' => 'Segera Berakhir', 'tutup' => 'Telah Tutup'] as $value => $label)
                    <option value="{{ $value }}" @selected(request('status') === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </form>

        {{-- Grid --}}
        <div class="row g-4 mb-4" id="lowongan-grid">
            @foreach ($lowonganList as $i => $item)
                <div class="col-lg-6 upa-lowongan-grid-item" data-status="{{ $item['status'] }}" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    @include('components.lowongan-card', [
                        'logo'       => $item['logo'],
                        'title'      => $item['title'],
                        'company'    => $item['company'],
                        'tags'       => $item['tags'],
                        'totalJobs'  => $item['totalJobs'],
                        'postedDate' => $item['postedDate'],
                        'url'        => route('publikasi.lowongan-detail', $item['slug']),
                    ])
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="upa-pagination-bar" data-aos="fade-up">
            <span class="upa-pagination-bar__info">
                Menampilkan 1-{{ count($lowonganList) }} dari {{ $totalLowongan }} Lowongan Pekerjaan
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
    var statusSelect = document.querySelector('select[name="status"]');
    var cards        = document.querySelectorAll('#lowongan-grid .upa-lowongan-grid-item');
    if (!statusSelect || !cards.length) return;

    function applyFilter(status) {
        cards.forEach(function (card) {
            var matches = status === '' || card.dataset.status === status;
            card.style.display = matches ? '' : 'none';
        });
    }

    statusSelect.addEventListener('change', function () {
        applyFilter(statusSelect.value);
    });
});

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

        var section = document.getElementById('lowongan-list');
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