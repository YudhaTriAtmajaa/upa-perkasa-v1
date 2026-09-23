{{--
    Job row — company vacancy-detail page ("3 Lowongan Tersedia").
    Each item also renders its own detail modal (see
    components.lowongan-detail-modal), opened by the "Lihat Detail" button.

    Props (see publikasi/lowongan-perusahaan.blade.php for the shape):
        job       array
        company   array
--}}
@php
    $statusClass = match ($job['status']) {
        'Sedang Dibuka'   => 'upa-badge-open',
        'Terbuka'         => 'upa-badge-open',
        'Segera Berakhir' => 'upa-badge-warning',
        'Hampir Berakhir' => 'upa-badge-warning',
        'Telah Tutup'     => 'upa-badge-danger',
        'Ditutup'         => 'upa-badge-danger',
        default           => 'upa-badge-open',
    };
    $modalId = 'lowonganModal-' . $job['id'];
@endphp

<div class="upa-vacancy-item" data-aos="fade-up" data-aos-delay="{{ $aosDelay ?? 0 }}">
    <div class="upa-vacancy-item__body">
        <div class="upa-vacancy-item__status">
            <span class="upa-badge {{ $statusClass }}">{{ $job['status'] }}</span>
            <span class="upa-vacancy-item__posted">Diposting: {{ $job['postedAgo'] }}</span>
        </div>
        <div class="upa-vacancy-item__actions">
            <a href="{{ $job['applyUrl'] ?? '#' }}" class="btn btn-upa-primary">
                <i class="bi bi-lightning-charge-fill me-1"></i>Lamar Sekarang
            </a>
            <button type="button" class="btn btn-upa-outline" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">
                Lihat Detail
            </button>
        </div>

        <h3 class="upa-vacancy-item__title">{{ $job['title'] }}</h3>

        @if (!empty($job['tags']))
            <div class="upa-vacancy-item__tags">
                @foreach ($job['tags'] as $tag)
                    <span class="upa-lowongan-tag">{{ $tag }}</span>
                @endforeach
            </div>
        @endif
    </div>

    <div class="upa-vacancy-item__divider"></div>

    <div class="upa-vacancy-item__footer">
        <div class="upa-vacancy-item__meta">
            <span class="upa-vacancy-item__deadline"><i class="bi bi-calendar-event"></i>Batas Waktu: {{ $job['deadline'] }}</span>
            <span><i class="bi bi-eye me-1"></i>Dilihat: {{ $job['views'] }}</span>
        </div>
        <span class="upa-vacancy-item__salary"><i class="bi bi-cash-stack"></i>{{ $job['salary'] }}</span>
    </div>
</div>

@include('components.lowongan-detail-modal', ['job' => $job, 'company' => $company, 'modalId' => $modalId])