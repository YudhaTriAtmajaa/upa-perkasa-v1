@extends('layouts.app')
@section('title', $company['name'] ?? 'Detail Perusahaan')

@php
    // Dummy data — replace with the real company + job records from the
    // backend later, looked up by the {slug} route parameter.
    $company = [
        'slug'          => 'pt-teknologi-maju-bersama',
        'name'          => 'PT. Teknologi Maju Bersama',
        'logo'          => null,
        'website'       => 'techmaju.com',
        'websiteUrl'    => 'https://techmaju.com',
        'description'   => 'PT. Teknologi Maju Bersama adalah pemimpin inovasi dalam pengembangan solusi perangkat lunak berbasis AI dan Cloud computing. Kami berkomitmen membangun masa depan digital Indonesia dengan menyediakan ekosistem teknologi yang inklusif dan berkelanjutan bagi berbagai industri strategis.',
        'location'      => 'Samarinda, Kalimantan Timur',
        'shortLocation' => 'Pusat Teknologi Industri, Samarinda',
        'industry'      => 'Teknologi Informasi',
    ];

    $jobs = [
        [
            'id'           => 1,
            'status'       => 'Sedang Dibuka',
            'postedAgo'    => '2 Hari yang lalu',
            'title'        => 'Senior Software Engineer',
            'tags'         => ['S1 Informatika', 'S2 Teknik', 'Full-time'],
            'tagsShort'    => ['S1', 'S2'],
            'deadline'     => '20 Nov 2024',
            'views'        => 120,
            'salary'       => 'Rp 12.000.000 - 18.000.000',
            'applyUrl'     => '#',
            'posters'      => [
                asset('img/photos/leader-02.jpg'),
                asset('img/photos/leader-02.jpg'),
                asset('img/photos/leader-02.jpg'),
            ],
            'description'  => 'Kami mencari Senior Software Engineer berpengalaman untuk memimpin pengembangan produk berbasis AI dan Cloud computing yang digunakan oleh ribuan pengguna di seluruh Indonesia.',
            'requirements' => [
                'Minimal S1 Informatika / Sistem Informasi / Jurusan Relevan.',
                'Pengalaman minimal 3 tahun sebagai Software Engineer.',
                'Menguasai arsitektur microservices dan cloud (AWS/GCP).',
            ],
            'responsibilities' => [
                'Merancang dan mengembangkan fitur produk berskala besar.',
                'Melakukan code review dan menjaga kualitas kode tim.',
                'Berkolaborasi dengan tim produk dan desain.',
            ],
        ],
        [
            'id'           => 2,
            'status'       => 'Segera Berakhir',
            'postedAgo'    => '12 Hari yang lalu',
            'title'        => 'UI/UX Designer Intern',
            'tags'         => ['Mahasiswa Akhir', 'Internship'],
            'tagsShort'    => ['S1'],
            'deadline'     => '05 Nov 2024',
            'views'        => 245,
            'salary'       => 'Gaji Kompetitif',
            'applyUrl'     => '#',
            'posters'      => [
                asset('img/photos/leader-02.jpg'),
            ],
            'description'  => 'Program magang bagi mahasiswa tingkat akhir yang tertarik mendalami riset pengguna dan perancangan antarmuka produk digital bersama tim desain kami.',
            'requirements' => [
                'Mahasiswa aktif tingkat akhir jurusan Desain/Informatika/Sistem Informasi.',
                'Memiliki portofolio desain (Figma) yang dapat ditunjukkan.',
                'Mampu bekerja penuh waktu minimal 3 bulan.',
            ],
            'responsibilities' => [
                'Membantu riset pengguna dan pembuatan wireframe.',
                'Merancang purwarupa (prototype) antarmuka aplikasi.',
                'Berpartisipasi dalam sesi review desain mingguan.',
            ],
        ],
        [
            'id'           => 3,
            'status'       => 'Telah Tutup',
            'postedAgo'    => '5 Hari yang lalu',
            'title'        => 'Frontend Developer',
            'tags'         => ['S1 Sistem Informasi', 'Full-time'],
            'tagsShort'    => ['S1'],
            'deadline'     => '20 Nov 2024',
            'views'        => 85,
            'salary'       => 'Rp 8.000.000 - 12.000.000',
            'applyUrl'     => '#',
            'posters'      => [
                asset('img/photos/leader-02.jpg'),
                asset('img/photos/leader-02.jpg'),
            ],
            'description'  => 'Bergabunglah sebagai Frontend Developer untuk membangun antarmuka aplikasi web yang cepat, responsif, dan mudah digunakan bagi pelanggan enterprise kami.',
            'requirements' => [
                'Minimal S1 Sistem Informasi / Ilmu Komputer / Jurusan Relevan.',
                'Menguasai JavaScript modern (React/Vue) dan REST API.',
                'Memahami prinsip dasar UI/UX dan aksesibilitas web.',
            ],
            'responsibilities' => [
                'Mengimplementasikan desain UI menjadi komponen web fungsional.',
                'Mengoptimalkan performa dan kompatibilitas lintas browser.',
                'Berkoordinasi dengan tim backend untuk integrasi API.',
            ],
        ],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Publikasi','url'=>route('publikasi.lowongan')],
    ['label'=>'Lowongan Pekerjaan','url'=>route('publikasi.lowongan')],
    ['label'=> $company['name']],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5">
        <div class="row g-4 g-lg-5">

            {{-- Sidebar --}}
            <div class="col-lg-4" data-aos="fade-up">
                <div class="upa-company-sidebar">
                    <div class="upa-company-sidebar__logo">
                        @if (!empty($company['logo']))
                            <img src="{{ $company['logo'] }}" alt="Logo {{ $company['name'] }}">
                        @else
                            <i class="bi bi-building"></i>
                        @endif
                    </div>
                    <h1 class="upa-company-sidebar__name">{{ $company['name'] }}</h1>
                    @if (!empty($company['website']))
                        <a href="{{ $company['websiteUrl'] ?? '#' }}" target="_blank" rel="noopener" class="upa-company-sidebar__website">
                            <i class="bi bi-globe2 me-1"></i>{{ $company['website'] }}
                        </a>
                    @endif

                    <p class="upa-company-sidebar__label">DESKRIPSI</p>
                    <p class="upa-company-sidebar__desc">{{ $company['description'] }}</p>

                    <hr>

                    <div class="upa-company-sidebar__row">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <p class="upa-company-sidebar__row-label mb-0">Lokasi</p>
                            <p class="upa-company-sidebar__row-value mb-0">{{ $company['location'] }}</p>
                        </div>
                    </div>
                    <div class="upa-company-sidebar__row">
                        <i class="bi bi-building"></i>
                        <div>
                            <p class="upa-company-sidebar__row-label mb-0">Industri</p>
                            <p class="upa-company-sidebar__row-value mb-0">{{ $company['industry'] }}</p>
                        </div>
                    </div>

                    <a href="{{ route('publikasi.lowongan') }}" class="btn btn-upa-primary w-100 mt-auto">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>

            {{-- Job list --}}
            <div class="col-lg-8">
                <div class="upa-vacancy-list-head" data-aos="fade-up">
                    <h2 class="upa-vacancy-list-head__title">{{ count($jobs) }} Lowongan Tersedia</h2>
                    <div class="upa-vacancy-list-head__sort">
                        <span>Filter:</span>
                        <select>
                            <option>Pilih Status</option>
                            <option>Sedang Dibuka</option>
                            <option>Segera Berakhir</option>
                            <option>Telah Tutup</option>
                        </select>
                    </div>
                </div>

                @foreach ($jobs as $i => $job)
                    @include('components.lowongan-item', ['job' => $job, 'company' => $company, 'aosDelay' => $i * 80])
                @endforeach
            </div>
        </div>

        <div class="upa-cta-banner mt-4 mt-lg-5 p-4 p-lg-5 d-flex flex-wrap align-items-center justify-content-between gap-3" data-aos="fade-up">
            <div>
                <h3 class="upa-cta-banner__title mb-2">Punya Pertanyaan Mengenai Perusahaan?</h3>
                <p class="upa-cta-banner__text mb-0">Tim HR kami siap menjawab detail mengenai budaya kerja dan proses rekrutmen.</p>
            </div>
            <a href="#" class="upa-cta-banner__btn upa-cta-banner__btn--yellow">Hubungi Perusahaan</a>
        </div>
    </div>
</section>

<div class="upa-poster-lightbox" id="upaPosterLightbox" aria-hidden="true">
    <button type="button" class="upa-poster-lightbox__close" id="upaPosterLightboxClose" aria-label="Tutup pratinjau poster">
        <i class="bi bi-x-lg"></i>
    </button>
    <img src="" alt="Pratinjau poster ukuran penuh" class="upa-poster-lightbox__img" id="upaPosterLightboxImg">
</div>
@endsection