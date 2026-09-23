@extends('layouts.app')
@section('title', 'Laporan Tracer Study & Laporan Triwulan')

@php
    // Dummy data — replace with paginated data from backend later.
    // NOTE: untuk sementara semua kartu memakai SATU file contoh dari
    // Google Drive ($contohDrive) supaya preview-nya bisa dites tanpa
    // perlu upload PDF dulu. Sebelum publish, ganti nilai 'file' tiap
    // baris dengan PDF aslinya, mis. asset('files/laporan/tracer-study-2025.pdf')
    // atau link Drive masing-masing laporan (bentuk /view maupun
    // /preview sama-sama diterima — report.js yang menormalkannya).
    //
    // Urutan: tahun terlama → terbaru. Kalau nanti data diambil dari database,
    // pakai orderBy('year', 'asc') supaya urutan ini tetap.
    $contohDrive = 'https://drive.google.com/file/d/1hKOq6VtHcf8oAj7EPR9ZaCDxlv3PzdOI/view';

    $laporanTracer = [
        ['year' => '2022', 'date' => '15 Jan 2022', 'title' => 'Laporan Tracer Study 2022', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
        ['year' => '2023', 'date' => '10 Des 2023', 'title' => 'Laporan Tracer Study 2023', 'size' => '2.8 MB', 'pages' => 15, 'file' => $contohDrive],
        ['year' => '2024', 'date' => '15 Jan 2024', 'title' => 'Laporan Tracer Study 2024', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
        ['year' => '2025', 'date' => '15 Jan 2025', 'title' => 'Laporan Tracer Study 2025', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
    ];
    $laporanTriwulan = [
        ['year' => '2026', 'date' => '15 Jan 2026', 'title' => 'Laporan Triwulan 1 2026', 'size' => '3.1 MB', 'pages' => 18, 'file' => $contohDrive],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Report','url'=>route('report.laporan-tahunan')],
    ['label'=>'Laporan Tracer Study & Laporan Triwulan'],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5">

        <div class="upa-report-heading" data-aos="fade-up">
            <h1>Laporan Tracer Study & Laporan Triwulan</h1>
            <p>Akses publikasi resmi hasil Tracer Study tahunan dan pemantauan Indikator Kinerja Utama (IKU) secara berkala bagi civitas akademika Universitas Mulawarman.</p>
        </div>

        <div class="upa-report-search" data-aos="fade-up">
            <i class="bi bi-search"></i>
            <input type="text" id="reportSearchInput" placeholder="Cari laporan" autocomplete="off">
        </div>

        <p class="upa-report-list-label" data-aos="fade-up">Daftar Laporan Tracer Study</p>
        <div class="upa-report-doc-grid mb-4" data-aos="fade-up">
            @foreach ($laporanTracer as $doc)
                @include('components.report-doc-card', $doc)
            @endforeach
        </div>

        <p class="upa-report-list-label" data-aos="fade-up">Daftar Laporan Triwulan</p>
        <div class="upa-report-doc-grid" data-aos="fade-up">
            @foreach ($laporanTriwulan as $doc)
                @include('components.report-doc-card', $doc)
            @endforeach
        </div>

        @include('components.report-preview-panel')
    </div>
</section>
@endsection