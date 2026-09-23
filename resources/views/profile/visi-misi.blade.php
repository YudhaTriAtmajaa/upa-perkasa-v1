@extends('layouts.app')
@section('title', 'Visi dan Misi')

@php
    $misi = [
        'Mendukung terwujudnya sumber daya manusia lulusan Universitas Mulawarman yang mandiri dan berdaya saing tinggi.',
        'Mendorong terbentuknya sistem pendidikan yang berorientasi pada kemandirian dan profesionalitas lulusan.',
        'Menjalin dan meningkatkan kualitas kemitraan dengan para pemangku kepentingan/stakeholders.',
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Profile','url'=>route('profile.sejarah')],
    ['label'=>'Visi dan Misi'],
]])
@include('components.page-hero', ['variant'=>'split','titleTop'=>'VISI DAN MISI','titleAccent'=>'UPA PERKASA Universitas Mulawarman','underline'=>true])

<section class="upa-section pt-0">
    <div class="container px-3 px-lg-5">
        <div class="row g-4">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="upa-box upa-box--outline h-100">
                    <h2 class="upa-box__heading">VISI</h2>
                    <p class="mb-0" style="line-height:1.8;">
                        "Unit Penunjang Akademik yang berperan dalam terwujudnya lulusan yang profesional,
                        berdaya saing tinggi, dan berjiwa kewirausahaan yang berbasis pada keunggulan lokal."
                    </p>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="100">
                <div class="upa-box upa-box--filled h-100">
                    <h2 class="upa-box__heading">MISI</h2>
                    <ol>
                        @foreach ($misi as $item)<li>{{ $item }}</li>@endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
