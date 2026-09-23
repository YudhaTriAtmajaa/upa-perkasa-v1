@extends('layouts.app')
@section('title', 'Tentang PPID')
@section('meta_description', 'Latar belakang, dasar hukum, dan struktur organisasi PPID Universitas Mulawarman.')

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'PPID','url'=>route('ppid.tentang')],
    ['label'=>'Tentang PPID'],
]])

<section class="upa-section pt-4">
    <div class="container px-3 px-lg-5">

        <div class="upa-ppid-hero" data-aos="fade-up">
            <h1 class="upa-ppid-hero__title heading-bubble">Tentang PPID</h1>
            <p class="upa-ppid-hero__text">
                Informasi yang wajib disediakan dan diumumkan secara berkala adalah informasi yang wajib
                diperbaharui kemudian disediakan dan diumumkan kepada publik secara rutin atau berkala
                sekurang-kurangnya setiap 6 bulan sekali berdasarkan Peraturan Komisi Informasi No. 1
                Tahun 2021 Pasal 14.
            </p>
        </div>

        <div class="upa-ppid-latar" data-aos="fade-up" data-aos-delay="100">
            <div class="upa-ppid-latar__head">
                <i class="bi bi-journal-bookmark-fill"></i>
                <h2>Latar Belakang &amp; Dasar Hukum</h2>
            </div>
            <p>
                Universitas Mulawarman sebagai Badan Publik memiliki kewajiban untuk menyediakan,
                memberikan, dan/atau menerbitkan informasi publik yang berada di bawah kewenangannya
                kepada pemohon informasi publik, selain informasi yang dikecualikan.
            </p>
            <p>
                Pembentukan PPID di lingkungan Universitas Mulawarman merupakan wujud implementasi
                Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (KIP) yang
                bertujuan untuk menciptakan tata kelola universitas yang transparan, akuntabel, dan
                partisipatif.
            </p>
            <div class="upa-ppid-latar__quote">
                &ldquo;Keterbukaan adalah pondasi utama dalam membangun kepercayaan antara institusi
                pendidikan dan masyarakat luas.&rdquo;
            </div>
        </div>

    </div>
</section>
@endsection