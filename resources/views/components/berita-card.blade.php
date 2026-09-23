{{--
    Berita (news) card — used on the Publikasi > Berita listing page.
    Usage:
        @include('components.berita-card', [
            'image'   => asset('img/photos/leader-02.jpg'),
            'date'    => '24 Oktober 2024',
            'title'   => 'Judul berita...',
            'excerpt' => 'Ringkasan singkat...',
            'views'   => '1,2k',
            'url'     => route('publikasi.berita-detail', $slug),
        ])
--}}
<article class="upa-berita-card upa-card h-100">
    <a href="{{ $url ?? '#' }}" class="upa-berita-card__media">
        <img src="{{ $image }}" alt="{{ $title }}" loading="lazy">
    </a>
    <div class="p-3 p-lg-4 d-flex flex-column">
        <span class="upa-berita-card__date"><i class="bi bi-calendar3"></i> {{ $date }}</span>
        <h5 class="upa-berita-card__title">
            <a href="{{ $url ?? '#' }}">{{ $title }}</a>
        </h5>
        <p class="upa-berita-card__excerpt">{{ $excerpt }}</p>
        <div class="upa-berita-card__footer mt-auto">
            <span class="upa-berita-card__views"><i class="bi bi-eye"></i> {{ $views }}</span>
            <a href="{{ $url ?? '#' }}" class="upa-berita-card__link">
                Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</article>