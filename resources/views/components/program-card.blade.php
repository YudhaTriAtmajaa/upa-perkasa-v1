{{--
    Program kerja card — digunakan sebagai fallback noscript
    Rendering utama dilakukan inline di profile/program-kerja.blade.php
    untuk mendukung vanilla JS filter (data-* attributes).
--}}
@php
    $badgeClass = match($jenis ?? '') {
        'Strategis' => 'upa-pk-badge--strategis',
        'Event'     => 'upa-pk-badge--event',
        default     => 'upa-pk-badge--rutin',
    };
@endphp
<div class="upa-pk-card upa-hover-lift">
    <div class="upa-pk-card__media">
        <img src="{{ $image }}" alt="{{ $title }}" loading="lazy">
        <span class="upa-pk-badge {{ $badgeClass }}">{{ $jenis }}</span>
    </div>
    <div class="upa-pk-card__body">
        <h5 class="upa-pk-card__title">{{ $title }}</h5>
        <p class="upa-pk-card__desc">{{ $description }}</p>
        <div class="upa-pk-card__divisi">
            <i class="bi {{ $icon ?? 'bi-diagram-3' }}"></i>{{ strtoupper($divisi) }}
        </div>
    </div>
</div>
