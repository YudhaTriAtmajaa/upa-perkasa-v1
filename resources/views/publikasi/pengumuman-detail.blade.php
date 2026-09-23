@extends('layouts.app')
@section('title', $pengumuman['title'] ?? 'Detail Pengumuman')

@php
    // Dummy data — replace with the resolved $pengumuman model from the route model binding later.
    $pengumuman = $pengumuman ?? [
        'date'       => '24 Oktober 2024',
        'division'   => 'Divisi Kemahasiswaan & Alumni',
        'views'      => '1.248',
        'title'      => 'Pengumuman Seleksi Beasiswa Unggulan Mahasiswa Berprestasi 2024 Tingkat Universitas Mulawarman',
        'body'       => [
            'Yth. Seluruh Mahasiswa Universitas Mulawarman,',
            'Dalam rangka mendukung peningkatan prestasi akademik dan non-akademik mahasiswa, UPA Perkasa Unmul bersama dengan Direktorat Kemahasiswaan mengumumkan pembukaan pendaftaran Seleksi Beasiswa Unggulan 2024.',
            'Program beasiswa ini bertujuan untuk memberikan penghargaan bagi mahasiswa yang memiliki capaian prestasi luar biasa di berbagai bidang. Seluruh proses seleksi akan dilakukan secara transparan melalui portal resmi UPA Perkasa.',
        ],
        'requirements_title' => 'Persyaratan Umum:',
        'requirements'        => [
            'Mahasiswa aktif jenjang S1/D3 minimal semester 3.',
            'IPK minimal 3.50 berskala 4.00.',
            'Memiliki sertifikat prestasi minimal tingkat provinsi dalam 2 tahun terakhir.',
            'Tidak sedang menerima beasiswa dari sumber lain (APBN/APBD/Swasta).',
        ],
        'timeline_title' => 'Timeline Seleksi:',
        'timeline'        => [
            ['step' => '01', 'title' => 'Pendaftaran Online', 'date' => '25 Okt - 10 Nov 2024', 'active' => true],
            ['step' => '02', 'title' => 'Seleksi Berkas',     'date' => '11 Nov - 15 Nov 2024', 'active' => false],
        ],
        'body_after' => [
            'Informasi lebih lanjut mengenai tata cara unggah dokumen dapat dilihat pada lampiran dokumen PDF di bawah ini. Pastikan seluruh berkas yang diunggah telah sesuai dengan format yang ditentukan.',
        ],
        'attachment' => [
            'name'        => 'Panduan_Beasiswa_Unggulan_2024.pdf',
            'size'        => '2.4 MB',
            'updatedAt'   => '24 Okt 2024',
            'url'         => '#',
        ],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Publikasi','url'=>route('publikasi.pengumuman')],
    ['label'=>'Pengumuman','url'=>route('publikasi.pengumuman')],
    ['label'=>'Detail Pengumuman'],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5" style="max-width:980px;">
        <div class="upa-pengumuman-detail" data-aos="fade-up">

            <span class="upa-badge upa-badge-yellow"><i class="bi bi-patch-check-fill me-1"></i>Resmi</span>

            <h1 class="upa-pengumuman-detail__title">{{ $pengumuman['title'] }}</h1>

            <div class="upa-pengumuman-detail__meta">
                <span><i class="bi bi-calendar3"></i>{{ $pengumuman['date'] }}</span>
                <span><i class="bi bi-building"></i>{{ $pengumuman['division'] }}</span>
                <span><i class="bi bi-eye"></i>{{ $pengumuman['views'] }} Dilihat</span>
            </div>

            <div class="upa-pengumuman-detail__body">
                @foreach ($pengumuman['body'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach

                @isset($pengumuman['requirements'])
                    <h3>{{ $pengumuman['requirements_title'] ?? 'Persyaratan Umum:' }}</h3>
                    <ul>
                        @foreach ($pengumuman['requirements'] as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                @endisset

                @isset($pengumuman['timeline'])
                    <h3>{{ $pengumuman['timeline_title'] ?? 'Timeline Seleksi:' }}</h3>
                    <div class="upa-pengumuman-detail__timeline">
                        @foreach ($pengumuman['timeline'] as $step)
                            <div class="upa-pengumuman-detail__timeline-step {{ !empty($step['active']) ? 'upa-pengumuman-detail__timeline-step--active' : '' }}">
                                <span class="upa-pengumuman-detail__timeline-num">{{ $step['step'] }}</span>
                                <div>
                                    <p class="upa-pengumuman-detail__timeline-title mb-0">{{ $step['title'] }}</p>
                                    <p class="upa-pengumuman-detail__timeline-date mb-0">{{ $step['date'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endisset

                @foreach ($pengumuman['body_after'] ?? [] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            @isset($pengumuman['attachment'])
                <div class="upa-pengumuman-detail__attachment">
                    <div class="upa-pengumuman-detail__attachment-info">
                        <span class="upa-pengumuman-detail__attachment-icon"><i class="bi bi-filetype-pdf"></i></span>
                        <div>
                            <p class="upa-pengumuman-detail__attachment-name mb-0">{{ $pengumuman['attachment']['name'] }}</p>
                            <p class="upa-pengumuman-detail__attachment-size mb-0">Ukuran File: {{ $pengumuman['attachment']['size'] }} &bull; Diperbarui: {{ $pengumuman['attachment']['updatedAt'] }}</p>
                        </div>
                    </div>
                    <a href="{{ $pengumuman['attachment']['url'] ?? '#' }}" class="btn btn-upa-primary d-inline-flex align-items-center gap-2">
                        <i class="bi bi-download"></i> Unduh Dokumen
                    </a>
                </div>
            @endisset

            <div class="upa-pengumuman-detail__footer">
                <a href="{{ route('publikasi.pengumuman') }}" class="btn btn-upa-primary d-inline-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>

                <div class="upa-pengumuman-detail__share">
                    Bagikan:
                    <button type="button" class="upa-pengumuman-detail__share-btn" title="Bagikan" onclick="if(navigator.share){navigator.share({title:document.title,url:location.href})}">
                        <i class="bi bi-share"></i>
                    </button>
                    <button type="button" class="upa-pengumuman-detail__share-btn" title="Salin tautan" onclick="navigator.clipboard.writeText(location.href)">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection