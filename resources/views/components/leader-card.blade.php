{{--
    Leader card component
    featured=true → large card (Rektor)
    featured=false/unset → row card (Wakil Rektor)
--}}
@php $featured = $featured ?? false; @endphp

<div class="upa-leader-card {{ $featured ? 'upa-leader-card--featured' : 'upa-leader-card--row' }} upa-hover-lift"
    data-aos="fade-up">
    <div class="d-md-flex">
        <div class="upa-leader-card__media flex-shrink-0">
            @isset($badge)
                <span class="upa-leader-card__badge">{{ $badge }}</span>
            @endisset
            <img src="{{ $photo }}" alt="{{ $name }}" loading="lazy">
        </div>
        <div class="p-4">
            <h5 class="upa-leader-card__name">{{ $name }}</h5>
            <p class="upa-leader-card__role">{{ $role }}</p>
            <p class="upa-leader-card__desc">{{ $desc }}</p>
            <a href="{{ $url ?? '#' }}" class="btn btn-upa-primary btn-sm upa-leader-card__cta">
                Lihat Profil Lengkap <i class="bi bi-box-arrow-up-right ms-1"></i>
            </a>
        </div>
    </div>
</div>