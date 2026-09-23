@extends('layouts.app')
@section('title', 'Informasi Wajib Berkala')
@section('meta_description', 'Daftar informasi publik yang wajib disediakan dan diumumkan secara berkala oleh UPA Perkasa Universitas Mulawarman.')

@php
    // Dummy data — replace with data from backend later.
    $profilInstitusi = [
        ['title' => 'Sejarah UPA Perkasa',           'url' => route('profile.sejarah')],
        ['title' => 'Visi dan Misi',                 'url' => route('profile.visi-misi')],
        ['title' => 'Struktur Organisasi',           'url' => route('profile.struktur')],
        ['title' => 'Tujuan dan Sasaran',             'url' => route('profile.tujuan-sasaran')],
        ['title' => 'Program Kerja',                 'url' => route('profile.program-kerja')],
        ['title' => 'Arti Logo UPA Perkasa Unmul',   'url' => route('profile.logo')],
    ];
    $kegiatanKinerja = [
        ['title' => 'Capaian IKU 1 Universitas Mulawarman', 'url' => route('report.capaian-iku1')],
        ['title' => 'Laporan Tahunan UPA Perkasa',           'url' => route('report.laporan-tahunan')],
        ['title' => 'Laporan Tracer Study UPA Perkasa',      'url' => route('report.tracer-study')],
        ['title' => 'Panduan Mengisi TracerStudy',           'url' => route('profile.panduan-tracer-study')],
        ['title' => 'Kuesioner TracerStudy KemdikbudSaintek','url' => '#', 'external' => true],
        ['title' => 'Konsultasi Tracerstudy',                 'url' => route('profile.panduan-tracer-study') . '#konsultasi'],
        ['title' => 'Permohonan Informasi Publik',           'url' => '#'],
        ['title' => 'Pengaduan Masyarakat',                  'url' => '#'],
        ['title' => 'Kontak Admin UPA Perkasa Unmul',        'url' => 'mailto:upt.perkasa@unmul.ac.id'],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'PPID','url'=>route('ppid.tentang')],
    ['label'=>'Informasi Wajib Berkala'],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5">

        <div class="upa-ppid-hero" data-aos="fade-up">
            <span class="upa-ppid-hero__badge"><i class="bi bi-journal-check"></i> Perki No. 1/2021 Pasal 14</span>
            <h1 class="upa-ppid-hero__title heading-bubble">Informasi Wajib Berkala</h1>
            <p class="upa-ppid-hero__text">
                Informasi yang wajib disediakan dan diumumkan secara berkala adalah informasi yang wajib
                diperbaharui kemudian disediakan dan diumumkan kepada publik secara rutin atau berkala
                sekurang-kurangnya setiap 6 bulan sekali berdasarkan Peraturan Komisi Informasi No. 1
                Tahun 2021 Pasal 14.
            </p>
        </div>

        <div class="upa-ppid-section-head" data-aos="fade-up">
            <div class="upa-ppid-section-head__icon"><i class="bi bi-bank2"></i></div>
            <div>
                <h2>Profil Institusi</h2>
                <p>Informasi fundamental mengenai identitas dan struktur organisasi</p>
            </div>
        </div>

        <div class="upa-ppid-table-wrap" data-aos="fade-up">
            <div class="table-responsive">
                <table class="upa-ppid-table">
                    <thead>
                        <tr><th>No</th><th>Judul Informasi</th><th>Format</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($profilInstitusi as $i => $row)
                            <tr>
                                <td class="upa-ppid-table__no" data-label="No">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="fw-semibold" data-label="Judul Informasi">{{ $row['title'] }}</td>
                                <td class="upa-ppid-table__format" data-label="Format"><span class="upa-badge">Link</span></td>
                                <td class="upa-ppid-table__aksi" data-label="Aksi">
                                    <a href="{{ $row['url'] }}" @if($row['external'] ?? false) target="_blank" rel="noopener" @endif class="upa-ppid-btn-visit">
                                        Kunjungi <i class="bi bi-arrow-up-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="upa-ppid-section-head" data-aos="fade-up">
            <div class="upa-ppid-section-head__icon upa-ppid-section-head__icon--yellow"><i class="bi bi-graph-up-arrow"></i></div>
            <div>
                <h2>Kegiatan dan Kinerja</h2>
                <p>Laporan berkala mengenai capaian dan realisasi program</p>
            </div>
        </div>

        <div class="upa-ppid-table-wrap" data-aos="fade-up">
            <div class="table-responsive">
                <table class="upa-ppid-table">
                    <thead>
                        <tr><th>No</th><th>Judul Informasi</th><th>Format</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatanKinerja as $i => $row)
                            <tr>
                                <td class="upa-ppid-table__no" data-label="No">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="fw-semibold" data-label="Judul Informasi">{{ $row['title'] }}</td>
                                <td class="upa-ppid-table__format" data-label="Format"><span class="upa-badge">Link</span></td>
                                <td class="upa-ppid-table__aksi" data-label="Aksi">
                                    <a href="{{ $row['url'] }}" @if($row['external'] ?? false) target="_blank" rel="noopener" @endif class="upa-ppid-btn-visit">
                                        Kunjungi <i class="bi bi-arrow-up-right"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection