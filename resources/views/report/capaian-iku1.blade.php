@extends('layouts.app')
@section('title', 'Capaian IKU1 dalam Tracer Study')

@php
    // Dashboard eksternal (Looker Studio) — ganti URL ini kalau laporannya
    // diganti/di-update dari Looker Studio.
    $lookerStudioUrl = 'https://lookerstudio.google.com/embed/reporting/8d997321-25e9-46be-829a-12bd22cd3893/page/GzjnF';
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Report','url'=>route('report.laporan-tahunan')],
    ['label'=>'Capaian IKU1'],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5">

        <div class="upa-report-heading" data-aos="fade-up">
            <h1>Capaian IKU1 dalam Tracer Study</h1>
            <p>Visualisasi indikator keterserapan lulusan Universitas Mulawarman.</p>
        </div>



        {{-- Visualisasi Performa — dashboard Looker Studio yang di-embed --}}
        <div class="upa-iku1-panel" data-aos="fade-up">
            <div class="upa-iku1-panel__head">
                <h2><i class="bi bi-graph-up"></i> Visualisasi Performa</h2>
            </div>

            <div class="upa-iku1-embed">
                <iframe
                    src="{{ $lookerStudioUrl }}"
                    class="upa-iku1-embed__frame"
                    frameborder="0"
                    style="border:0"
                    allowfullscreen
                    sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"
                    loading="lazy"
                    title="Dashboard Capaian IKU1 - Tracer Study">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection
