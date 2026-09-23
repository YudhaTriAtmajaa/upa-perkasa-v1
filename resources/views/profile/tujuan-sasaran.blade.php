@extends('layouts.app')
@section('title', 'Tujuan dan Sasaran')

@php
    $tujuan = [
        'Meningkatkan pengetahuan, keterampilan dan sikap lulusan melalui berbagai kegiatan yang relevan.',
        'Memberikan masukan kepada seluruh elemen yang terkait di Unmul untuk mewujudkan sumber daya manusia lulusan Universitas Mulawarman yang mandiri dan berdaya saing tinggi.',
        'Membuka kesempatan bagi mahasiswa Universitas Mulawarman untuk meningkatkan profesionalitas, pengalaman dan pengembangan wawasan.',
        'Mengembangkan kesempatan kerja dan peluang usaha bagi para lulusan serta menghasilkan manfaat bagi Universitas Mulawarman dan mitra.',
    ];
    $sasaran = [
        'Lulusan Universitas Mulawarman memiliki prestasi akademik yang tinggi dan keahlian pada bidang pilihannya.',
        'Kurikulum berbasis profesionalisme dan kewirausahaan yang diimplementasikan di seluruh elemen terkait.',
        'Mahasiswa Universitas Mulawarman mendapat akses luas dan mudah untuk meningkatkan profesionalitas, menambah pengalaman dan memperluas wawasan.',
        'Lulusan Universitas Mulawarman mendapatkan kesempatan kerja dan usaha yang sesuai bidang pilihannya.',
        'Universitas Mulawarman meningkatkan jaringan dan jalinan mitra kerja yang lebih luas dan berkualitas.',
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Profile','url'=>route('profile.sejarah')],
    ['label'=>'Tujuan dan Sasaran'],
]])
@include('components.page-hero', ['variant'=>'split','titleTop'=>'TUJUAN DAN SASARAN','titleAccent'=>'UPA PERKASA Universitas Mulawarman','underline'=>true])

<section class="upa-section pt-0 upa-ts-section">
    <div class="container px-3 px-lg-5" style="max-width:980px;">
        <div data-aos="fade-up">
            <div class="upa-box upa-box--filled mb-4">
                <h2 class="upa-box__heading">TUJUAN</h2>
                <ul>@foreach($tujuan as $item)<li>{{ $item }}</li>@endforeach</ul>
            </div>
        </div>
        <div data-aos="fade-up" data-aos-delay="100">
            <div class="upa-box upa-box--outline">
                <h2 class="upa-box__heading">SASARAN</h2>
                <ul>@foreach($sasaran as $item)<li>{{ $item }}</li>@endforeach</ul>
            </div>
        </div>
    </div>
</section>
@endsection