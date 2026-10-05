@extends('layouts.app')
@section('title', $berita['title'] ?? 'Detail Berita')

@php
    // Dummy data — replace with the resolved $berita model from the route model binding later.
    $berita = $berita ?? [
        'image'   => asset('img/photos/leader-02.jpg'),
        'title'   => 'Peningkatan Kualitas Lulusan Melalui Program Sertifikasi Kompetensi Internasional 2024',
        'author'  => 'HumasUnmul',
        'date'    => '24 Oktober 2024',
        'views'   => '1.245',
        'tags'    => ['#KarirUnmul', '#Sertifikasi', '#IKU1'],
        // Isi berita berupa urutan blok: paragraf -> gambar -> paragraf -> gambar, dst.
        // type: 'text' (paragraf) | 'image' (src + caption opsional) | 'quote' (kutipan)
        'content' => [
            ['type' => 'text', 'value' => 'Universitas Mulawarman melalui Unit Penunjang Akademik (UPA) Perkasa kembali menegaskan komitmennya dalam mencetak lulusan yang siap bersaing di kancah global. Salah satu langkah strategis yang diambil adalah dengan meluncurkan program subsidi sertifikasi kompetensi internasional bagi mahasiswa tingkat akhir dan alumni.'],
            ['type' => 'image', 'src' => asset('img/photos/demo-berita-1.jpg'), 'caption' => 'Peluncuran program sertifikasi kompetensi internasional di Universitas Mulawarman.'],
            ['type' => 'text', 'value' => 'Program ini mencakup berbagai bidang mulai dari teknologi informasi, manajemen rantai pasok, hingga keahlian teknik sipil. Direktur UPA Perkasa Unmul menyatakan bahwa sertifikasi ini bukan sekadar bukti formalitas, melainkan jembatan konkret antara teori akademis dengan kebutuhan industri modern yang dinamis.'],
            ['type' => 'text', 'value' => 'Pendaftaran program gelombang pertama telah dibuka hingga akhir bulan ini. Mahasiswa yang berminat diharapkan dapat segera memverifikasi kelengkapan dokumen melalui portal internal masing-masing. Informasi lebih lanjut mengenai jenis sertifikasi yang tersedia dapat diakses melalui menu Program Kerja di website resmi ini.'],
            ['type' => 'quote', 'value' => '"Kami ingin memastikan setiap lulusan Unmul tidak hanya membawa ijazah, tetapi juga paspor kompetensi yang diakui secara global."'],
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

        {{-- Gambar utama (satu gambar saja) --}}
        <img src="{{ $berita['image'] }}" alt="{{ $berita['title'] }}" class="upa-berita-detail__cover" data-aos="fade-up">

        <div data-aos="fade-up" data-aos-delay="80">
            <div class="upa-berita-detail__body">
                @foreach ($berita['content'] as $block)
                    @switch($block['type'])
                        @case('image')
                            <figure class="upa-berita-detail__figure">
                                <img src="{{ $block['src'] }}" alt="{{ $block['caption'] ?? $berita['title'] }}" loading="lazy">
                                @if (!empty($block['caption']))
                                    <figcaption>{{ $block['caption'] }}</figcaption>
                                @endif
                            </figure>
                            @break

                        @case('quote')
                            <blockquote class="upa-berita-detail__quote">{{ $block['value'] }}</blockquote>
                            @break

                        @default
                            <p>{{ $block['value'] }}</p>
                    @endswitch
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