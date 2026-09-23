@extends('layouts.app')
@section('title', 'Profil Pimpinan')

@php
    $wakilRektor = [
        ['photo'=>asset('img/photos/leader-02.jpg'),'name'=>'Prof. Dr. Lambang Subagyo, M.Si.','role'=>'Wakil Rektor Bidang Akademik','desc'=>'Mengkoordinasikan pelaksanaan kegiatan di bidang pendidikan, pengajaran, serta pengembangan kurikulum dan kualitas akademik Universitas Mulawarman.'],
        ['photo'=>asset('img/photos/leader-02.jpg'),'name'=>'Dr. Ir. Abdunnur, M.Si., IPU.','role'=>'Wakil Rektor Bidang Umum, SDM dan Keuangan','desc'=>'Mengelola administrasi umum, pengembangan sumber daya manusia, serta pengawasan anggaran dan tata kelola keuangan Universitas Mulawarman.'],
        ['photo'=>asset('img/photos/leader-02.jpg'),'name'=>'Prof. Dr. H. Moh. Bahzar, M.Si.','role'=>'Wakil Rektor Bidang Kemahasiswaan dan Alumni','desc'=>'Bertanggung jawab atas pembinaan kemahasiswaan, pengembangan minat bakat, serta pengelolaan hubungan strategis dengan alumni Universitas Mulawarman.'],
        ['photo'=>asset('img/photos/leader-02.jpg'),'name'=>'Dr. Ir. Bohari Yusuf, M.Si.','role'=>'Wakil Rektor Bidang Perencanaan, Kerjasama dan Sistem Informasi','desc'=>'Bertanggung jawab dalam perumusan kebijakan teknis, koordinasi, serta pelaksanaan program kerja di bidang perencanaan dan kerjasama internasional.'],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Profile','url'=>route('profile.sejarah')],
    ['label'=>'Profil Pimpinan UNMUL'],
]])
@include('components.page-hero', [
    'variant'  => 'bubble',
    'title'    => 'Profil Pimpinan Universitas Mulawarman',
    'subtitle' => 'Jajaran pimpinan Universitas Mulawarman yang memimpin arah strategis, akademik, dan operasional universitas guna mewujudkan visi unggul dan berdaya saing global.',
])

<section class="upa-section pt-0">
    <div class="container px-3 px-lg-5">

        {{-- Org chart --}}
        <div class="upa-orgchart text-center mb-5" data-aos="fade-up">
            <h4 class="mb-1 text-upa-green">Struktur Kepemimpinan</h4>
            <p class="text-muted small mb-4">Hirarki manajemen eksekutif Universitas Mulawarman</p>

            <div class="d-flex justify-content-center mb-0 upa-orgchart__root-wrap">
                <div class="upa-orgchart__root">
                    <div class="upa-orgchart__root-label">REKTOR</div>
                </div>
            </div>
            <div class="upa-orgchart__children">
                @foreach (['Wakil Rektor I','Wakil Rektor II','Wakil Rektor III','Wakil Rektor IV'] as $wr)
                    <div class="upa-orgchart__child">{{ $wr }}</div>
                @endforeach
            </div>
        </div>

        {{-- Rektor (featured) --}}
        <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
            @include('components.leader-card', [
                'featured' => true,
                'badge'    => 'Pimpinan Utama',
                'photo'    => asset('img/photos/leader-02.jpg'),
                'name'     => 'Prof. Dr. Ir. H. Abdunnur, M.Si., IPU.',
                'role'     => 'Rektor Universitas Mulawarman',
                'desc'     => 'Menjalankan fungsi eksekutif tertinggi dalam memimpin penyelenggaraan pendidikan, penelitian, dan pengabdian kepada masyarakat serta membina sivitas akademika.',
            ])
        </div>

        {{-- Wakil Rektor cards --}}
        <div class="row g-4">
            @foreach ($wakilRektor as $i => $leader)
                <div class="col-12" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    @include('components.leader-card', $leader)
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection