<article class="upa-news-card upa-card h-100 position-relative">
    <div class="upa-news-card__media">
        <img src="{{ $image }}" alt="{{ $title }}" loading="lazy">
        <span class="upa-news-card__date">{{ $date }}</span>
    </div>
    <div class="p-3 p-lg-4">
        <h5 class="upa-news-card__title">{{ $title }}</h5>
        <p class="upa-news-card__excerpt">{{ $excerpt }}</p>
        <a href="{{ $url ?? '#' }}" class="upa-news-card__link stretched-link">
            Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
</article>