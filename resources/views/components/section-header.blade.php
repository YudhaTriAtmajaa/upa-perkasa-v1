<div class="upa-section-header" data-aos="fade-up">
    <div>
        <h2 class="upa-section-header__title">
            @isset($icon)<i class="bi {{ $icon }} me-2"></i>@endisset{{ $title }}
        </h2>
        @isset($subtitle)
            <p class="upa-section-header__subtitle">{{ $subtitle }}</p>
        @endisset
    </div>
    @isset($linkUrl)
        <a href="{{ $linkUrl }}" class="upa-section-header__link">
            {{ $linkText }} <i class="bi bi-chevron-right ms-1"></i>
        </a>
    @endisset
</div>
