{{--
    Pengumuman card — dipakai di halaman Publikasi > Pengumuman (listing).
    Usage:
        @include('components.pengumuman-card', [
            'date'     => '24 Oktober 2024',
            'title'    => 'Judul pengumuman...',
            'division' => 'Divisi Pengembangan Karir',
            'excerpt'  => 'Ringkasan singkat...',
            'url'      => route('publikasi.pengumuman-detail', $slug),
        ])
--}}
<article class="upa-pengumuman-card upa-card">
    <div class="upa-pengumuman-card__badges">
        <span class="upa-badge upa-badge-yellow">RESMI</span>
        <span class="upa-pengumuman-card__date"><i class="bi bi-calendar3"></i>{{ $date }}</span>
    </div>

    <a href="{{ $url ?? '#' }}" class="upa-pengumuman-card__link">
        Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
    </a>

    <h3 class="upa-pengumuman-card__title">
        <a href="{{ $url ?? '#' }}" class="stretched-link">{{ $title }}</a>
    </h3>

    @isset($division)
        <p class="upa-pengumuman-card__division"><i class="bi bi-building"></i>{{ $division }}</p>
    @endisset

    @isset($excerpt)
        <p class="upa-pengumuman-card__excerpt">{{ $excerpt }}</p>
    @endisset
</article>