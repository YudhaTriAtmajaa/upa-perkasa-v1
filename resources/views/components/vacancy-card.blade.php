<div class="upa-vacancy-card upa-card h-100 position-relative">
    <div class="upa-vacancy-card__top">
        <div class="upa-vacancy-card__logo">
            @if (!empty($logo))
                <img src="{{ $logo }}" alt="Logo {{ $company }}">
            @else
                <i class="bi bi-building"></i>
            @endif
        </div>

        <div class="upa-vacancy-card__info">
            <h5 class="upa-vacancy-card__title">{{ $title }}</h5>
            <p class="upa-vacancy-card__company">{{ $company }}</p>
            @if (!empty($tags))
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <span class="upa-vacancy-card__tag">{{ $tag }}</span>
                    @endforeach
                </div>
            @endif
        </div>

        <span class="upa-badge upa-badge-open">{{ $status ?? 'Open' }}</span>
    </div>

    <hr class="upa-vacancy-card__divider">
    <div class="d-flex justify-content-between align-items-center">
        <small class="upa-vacancy-card__deadline">Deadline: {{ $deadline }}</small>
        <a href="{{ $url ?? '#' }}" class="upa-vacancy-card__link stretched-link">
            Detail <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
</div>