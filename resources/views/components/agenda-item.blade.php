<a href="{{ $url ?? '#' }}" class="upa-agenda-item">
    <div class="upa-agenda-item__date">
        <span class="upa-agenda-item__month">{{ $month }}</span>
        <span class="upa-agenda-item__day">{{ $day }}</span>
    </div>
    <div class="upa-agenda-item__body">
        <p class="upa-agenda-item__title mb-1">{{ $title }}</p>
        <div class="upa-agenda-item__meta">
            <span><i class="bi bi-clock me-1"></i>{{ $time }}</span>
            <span><i class="bi bi-geo-alt me-1"></i>{{ $location }}</span>
        </div>
    </div>
</a>