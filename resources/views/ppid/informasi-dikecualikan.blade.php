@extends('layouts.app')
@section('title', 'Informasi Yang Dikecualikan')
@section('meta_description', 'Kategori informasi yang dikecualikan sesuai Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.')

@php
    // Dokumen dihost di Google Drive (bukan file lokal, jadi tidak pakai asset()).
    $driveId = '1YCXaq-vvVBmwSuKh84ceNuXCk-vX4xzl';
    $dokumen = [
        'title'   => 'Dokumen Penetapan Informasi Dikecualikan',
        'nomor'   => 'Unmul/PPID/SK-04/2024',
        'preview' => "https://drive.google.com/file/d/{$driveId}/preview",
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'PPID','url'=>route('ppid.tentang')],
    ['label'=>'Informasi Yang Dikecualikan'],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5">

        <div class="upa-ppid-hero" data-aos="fade-up">
            <span class="upa-ppid-hero__badge"><i class="bi bi-shield-lock"></i> Regulasi PPID</span>
            <h1 class="upa-ppid-hero__title heading-bubble">Informasi Yang Dikecualikan</h1>
            <p class="upa-ppid-hero__text">
                Berdasarkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik,
                terdapat kategori informasi yang tidak dapat diakses secara bebas demi kepentingan
                nasional, privasi, dan kerahasiaan negara. Pengecualian informasi harus didasarkan
                pada pengujian konsekuensi.
            </p>
        </div>

        {{--
            Reuses the .upa-report-preview__* markup/CSS already shipped in
            resources/css/report.css (see components/report-preview-panel.blade.php)
            for visual + code consistency, but always shown "loaded" — there's
            only one document here, not a list to pick from.
        --}}
        <div class="upa-report-preview upa-ppid-doc-viewer" data-aos="fade-up" data-aos-delay="100">
            <div class="upa-report-preview__header">
                <div class="upa-report-preview__header-left">
                    <span class="upa-report-preview__header-icon"><i class="bi bi-filetype-pdf"></i></span>
                    <div class="upa-report-preview__header-info">
                        <p class="upa-report-preview__header-title mb-0">{{ $dokumen['title'] }}</p>
                        <p class="upa-report-preview__header-meta mb-0">Nomor: {{ $dokumen['nomor'] }}</p>
                    </div>
                </div>
            </div>
            <iframe class="upa-report-preview__frame" title="Pratinjau dokumen penetapan informasi dikecualikan" loading="lazy" src="{{ $dokumen['preview'] }}" allow="autoplay"></iframe>
        </div>

    </div>
</section>
@endsection