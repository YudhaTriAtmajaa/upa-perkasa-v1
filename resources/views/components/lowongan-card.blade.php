{{--
    Job listing card — grid item on "Semua Lowongan Pekerjaan".
    Links through to the company's vacancy-detail page.

    Layout: small logo on the left that stretches the full height of the
    card, content column on the right (title/badge, tags, company name,
    then a divider line with the posted date + "Lihat Selengkapnya" pinned
    to the bottom).

    Props:
        title       string   Job title
        company     string   Company name
        logo        string|null
        tags        array    e.g. ['S1', 'S2']
        totalJobs   int      Number of open positions at this company
        postedDate  string   e.g. '15 Okt 2024' (date only, no time)
        url         string
--}}
<a href="{{ $url ?? '#' }}" class="upa-lowongan-card upa-hover-lift">
    <div class="upa-lowongan-card__logo">
        @if (!empty($logo))
            <img src="{{ $logo }}" alt="Logo {{ $company }}">
        @else
            <i class="bi bi-building"></i>
        @endif
    </div>

    <div class="upa-lowongan-card__body">
        <div class="upa-lowongan-card__head">
            <div class="upa-lowongan-card__head-text">
                <h3 class="upa-lowongan-card__title">{{ $title }}</h3>
            </div>
            @if (!empty($totalJobs))
                <span class="upa-badge upa-badge-yellow upa-lowongan-card__badge">{{ $totalJobs }} LOWONGAN</span>
            @endif
        </div>

        @if (!empty($tags))
            <div class="upa-lowongan-card__tags">
                <span class="upa-lowongan-card__meta-label">Mencari:</span>
                @foreach ($tags as $tag)
                    <span class="upa-lowongan-tag">{{ $tag }}</span>
                @endforeach
            </div>
        @endif

        <p class="upa-lowongan-card__company">{{ $company }}</p>

        <div class="upa-lowongan-card__spacer"></div>

        <div class="upa-lowongan-card__footer">
            @if (!empty($postedDate))
                <span class="upa-lowongan-card__posted"><i class="bi bi-calendar3"></i>Diposting: {{ $postedDate }}</span>
            @endif
            <span class="upa-lowongan-card__link">Lihat Selengkapnya <i class="bi bi-arrow-right ms-1"></i></span>
        </div>
    </div>
</a>