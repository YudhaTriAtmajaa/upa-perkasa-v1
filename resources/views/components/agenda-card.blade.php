{{--
    Agenda card — dipakai di halaman Publikasi > Agenda Kegiatan (listing).
    Usage:
        @include('components.agenda-card', [
            'status'     => 'Akan Datang', // Akan Datang | Pendaftaran Dibuka | Selesai
            'category'   => 'Workshop Digital Marketing',
            'date'       => '24 Oktober 2024',
            'title'      => 'Judul agenda...',
            'excerpt'    => 'Ringkasan singkat...',
            'location'   => 'Gedung Aula Lantai 3, Unmul',
            'narasumber' => 'Sarah Wijaya (HR Lead)', // opsional
            'capacity'   => '100 Peserta',
            'time'       => '08:00 - 15:30 WITA',
            'url'        => route('publikasi.agenda-detail', $slug),
        ])
--}}
@php
    $statusClass = match ($status ?? 'Akan Datang') {
        'Pendaftaran Dibuka' => 'upa-badge-open',
        'Selesai'            => 'upa-badge-danger',
        default              => 'upa-badge-yellow',
    };
    $statusIcon = match ($status ?? 'Akan Datang') {
        'Pendaftaran Dibuka' => 'bi-check-circle-fill',
        'Selesai'            => 'bi-x-circle-fill',
        default              => 'bi-clock-history',
    };
@endphp

<article class="upa-agenda-card upa-card">
    <div class="upa-agenda-card__badges">
        <span class="upa-badge {{ $statusClass }}"><i class="bi {{ $statusIcon }}"></i>{{ $status ?? 'Akan Datang' }}</span>
        @isset($date)
            <span class="upa-agenda-card__date"><i class="bi bi-calendar3"></i>{{ $date }}</span>
        @endisset
    </div>

    <a href="{{ $url ?? '#' }}" class="upa-agenda-card__link">
        Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
    </a>

    <h3 class="upa-agenda-card__title">
        <a href="{{ $url ?? '#' }}" class="stretched-link">{{ $title }}</a>
    </h3>

    @isset($excerpt)
        <p class="upa-agenda-card__excerpt">{{ $excerpt }}</p>
    @endisset

    <div class="upa-agenda-card__meta">
        @isset($location)
            <span><i class="bi bi-geo-alt"></i>{{ $location }}</span>
        @endisset
        @isset($narasumber)
            <span><i class="bi bi-person"></i>Narasumber: {{ $narasumber }}</span>
        @endisset
        @isset($capacity)
            <span><i class="bi bi-people"></i>Kapasitas: {{ $capacity }}</span>
        @endisset
        @isset($time)
            <span><i class="bi bi-clock"></i>{{ $time }}</span>
        @endisset
    </div>
</article>