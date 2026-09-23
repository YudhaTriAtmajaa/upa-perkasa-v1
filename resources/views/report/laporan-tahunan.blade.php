@extends('layouts.app')
@section('title', 'Laporan Tahunan UPA PERKASA')

@php
    // Dummy data — replace with paginated data from backend later.
    // NOTE: untuk sementara semua kartu memakai SATU file contoh dari
    // Google Drive ($contohDrive) supaya preview-nya bisa dites tanpa
    // perlu upload PDF dulu. Sebelum publish, ganti nilai 'file' tiap
    // baris dengan PDF aslinya, mis. asset('files/laporan/laporan-tahunan-2025.pdf')
    // atau link Drive masing-masing laporan (bentuk /view maupun
    // /preview sama-sama diterima — report.js yang menormalkannya).
    //
    // Urutan: tahun terlama → terbaru (2019 → 2025). Kalau nanti data diambil
    // dari database, pakai orderBy('year', 'asc') supaya urutan ini tetap.
    $contohDrive = 'https://drive.google.com/file/d/1hKOq6VtHcf8oAj7EPR9ZaCDxlv3PzdOI/view';

    $laporanTahunan = [
        ['year' => '2019', 'date' => '15 Jan 2019', 'title' => 'Laporan Tahunan 2019', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
        ['year' => '2020', 'date' => '15 Jan 2020', 'title' => 'Laporan Tahunan 2020', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
        ['year' => '2022', 'date' => '15 Jan 2022', 'title' => 'Laporan Tahunan 2022', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
        ['year' => '2023', 'date' => '10 Des 2023', 'title' => 'Laporan Tahunan 2023', 'size' => '2.8 MB', 'pages' => 15, 'file' => $contohDrive],
        ['year' => '2024', 'date' => '15 Jan 2024', 'title' => 'Laporan Tahunan 2024', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
        ['year' => '2025', 'date' => '15 Jan 2025', 'title' => 'Laporan Tahunan 2025', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Report','url'=>route('report.laporan-tahunan')],
    ['label'=>'Laporan Tahunan UPA PERKASA'],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5">

        <div class="upa-report-heading" data-aos="fade-up">
            <h1>Laporan Tahunan UPA PERKASA</h1>
            <p>Arsip dokumentasi capaian strategis, evaluasi program kerja, dan performa institusi UPA Perkasa Universitas Mulawarman dalam kurun waktu satu tahun akademik.</p>
        </div>

        <div class="upa-report-search" data-aos="fade-up">
            <i class="bi bi-search"></i>
            <input type="text" id="reportSearchInput" placeholder="Cari laporan" autocomplete="off">
        </div>

        <p class="upa-report-list-label" data-aos="fade-up">Daftar Laporan Tahunan UPA PERKASA</p>

        <div class="upa-report-doc-grid" data-aos="fade-up">
            @foreach ($laporanTahunan as $doc)
                @include('components.report-doc-card', $doc)
            @endforeach
        </div>

        @include('components.report-preview-panel')
    </div>
</section>
@endsection