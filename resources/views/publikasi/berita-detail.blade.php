@extends('layouts.app')
@section('title', $berita['title'] ?? 'Detail Berita')

@php
    // Dummy data — replace with the resolved $berita model from the route model binding later.
    $berita = $berita ?? [
        'image'   => asset('img/photos/leader-02.jpg'),
        // Foto galeri berita — isi dengan beberapa foto (2 s/d 8 foto disarankan).
        // Kalau field 'images' tidak diisi, carousel otomatis jatuh ke 'image' tunggal di atas.
        // NOTE: 4 foto placeholder di bawah ini cuma buat TES TAMPILAN carousel biar
        // kelihatan jelas geser-nya (beda warna/nomor). Ganti dengan foto asli berita
        // sebelum publish — hapus juga file public/img/photos/demo-berita-*.jpg.
        'images'  => [
            asset('img/photos/demo-berita-1.jpg'),
            asset('img/photos/demo-berita-2.jpg'),
            asset('img/photos/demo-berita-3.jpg'),
            asset('img/photos/demo-berita-4.jpg'),
        ],
        'title'   => 'Peningkatan Kualitas Lulusan Melalui Program Sertifikasi Kompetensi Internasional 2024',
        'author'  => 'HumasUnmul',
        'date'    => '24 Oktober 2024',
        'views'   => '1.245',
        'tags'    => ['#KarirUnmul', '#Sertifikasi', '#IKU1'],
        'body'    => [
            'Universitas Mulawarman melalui Unit Penunjang Akademik (UPA) Perkasa kembali menegaskan komitmennya dalam mencetak lulusan yang siap bersaing di kancah global. Salah satu langkah strategis yang diambil adalah dengan meluncurkan program subsidi sertifikasi kompetensi internasional bagi mahasiswa tingkat akhir dan alumni.',
            'Program ini mencakup berbagai bidang mulai dari teknologi informasi, manajemen rantai pasok, hingga keahlian teknik sipil. Direktur UPA Perkasa Unmul menyatakan bahwa sertifikasi ini bukan sekadar bukti formalitas, melainkan jembatan konkret antara teori akademis dengan kebutuhan industri modern yang dinamis.',
        ],
        'quote' => '"Kami ingin memastikan setiap lulusan Unmul tidak hanya membawa ijazah, tetapi juga paspor kompetensi yang diakui secara global."',
        'body_after' => [
            'Pendaftaran program gelombang pertama telah dibuka hingga akhir bulan ini. Mahasiswa yang berminat diharapkan dapat segera memverifikasi kelengkapan dokumen melalui portal internal masing-masing. Informasi lebih lanjut mengenai jenis sertifikasi yang tersedia dapat diakses melalui menu Program Kerja di website resmi ini.',
        ],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Publikasi','url'=>route('publikasi.berita')],
    ['label'=>'Berita','url'=>route('publikasi.berita')],
    ['label'=>'Detail Berita'],
]])

<section class="upa-section">
    <div class="container px-3 px-lg-5" style="max-width:980px;">

        <div data-aos="fade-up">
            <h1 class="upa-berita-detail__title">{{ $berita['title'] }}</h1>

            <div class="upa-berita-detail__meta">
                <span><i class="bi bi-person-fill"></i> Diposting oleh {{ $berita['author'] }}</span>
                <span><i class="bi bi-calendar3"></i> {{ $berita['date'] }}</span>
                <span><i class="bi bi-eye"></i> {{ $berita['views'] }} Dilihat</span>
            </div>
        </div>

        @php $galleryImages = $berita['images'] ?? [$berita['image']]; @endphp

        @if (count($galleryImages) > 1)
            {{-- Galeri foto berita — carousel kartu 3D (efek Swiper "cards") --}}
            <div class="upa-berita-detail__gallery-wrap" data-aos="fade-up">
                <div class="swiper upa-berita-detail__gallery">
                    <div class="swiper-wrapper">
                        @foreach ($galleryImages as $img)
                            <div class="swiper-slide">
                                <img src="{{ $img }}" alt="{{ $berita['title'] }} - foto {{ $loop->iteration }}" class="upa-berita-detail__cover">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="upa-berita-detail__gallery-nav">
                    <button type="button" class="upa-berita-detail__gallery-btn upa-berita-detail__gallery-btn--prev" aria-label="Foto sebelumnya">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <div class="swiper-pagination upa-berita-detail__gallery-pagination"></div>
                    <button type="button" class="upa-berita-detail__gallery-btn upa-berita-detail__gallery-btn--next" aria-label="Foto berikutnya">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>
        @else
            <img src="{{ $berita['image'] }}" alt="{{ $berita['title'] }}" class="upa-berita-detail__cover" data-aos="fade-up">
        @endif

        <div data-aos="fade-up" data-aos-delay="80">
            <div class="upa-berita-detail__body">
                @foreach ($berita['body'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach

                @isset($berita['quote'])
                    <blockquote class="upa-berita-detail__quote">{{ $berita['quote'] }}</blockquote>
                @endisset

                @foreach ($berita['body_after'] ?? [] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="upa-berita-detail__footer">
                <a href="{{ route('publikasi.berita') }}" class="btn btn-upa-primary d-inline-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>

                <div class="upa-berita-detail__share">
                    Bagikan:
                    <button type="button" class="upa-berita-detail__share-btn" title="Bagikan" onclick="if(navigator.share){navigator.share({title:document.title,url:location.href})}">
                        <i class="bi bi-share"></i>
                    </button>
                    <button type="button" class="upa-berita-detail__share-btn" title="Salin tautan" onclick="navigator.clipboard.writeText(location.href)">
                        <i class="bi bi-clipboard"></i>
                    </button>
                </div>

                <div class="upa-berita-detail__tags">
                    @foreach ($berita['tags'] as $tag)
                        <span class="upa-berita-detail__tag">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection