@extends('layouts.app')
@section('title', 'Panduan Tracer Study')

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Profile','url'=>route('profile.sejarah')],
    ['label'=>'Panduan Tracer Study'],
]])
@include('components.page-hero', [
    'variant'  => 'bubble',
    'title'    => 'Panduan Tracer Study',
    'subtitle' => 'Portal komprehensif bagi alumni dan mitra industri untuk memahami proses pelacakan lulusan Universitas Mulawarman dalam meningkatkan kualitas pendidikan dan karir.',
])

@php
    // Single source of truth for the tab bar — icon + label only.
    // Panel markup itself lives further down since each panel's layout differs.
    $ptsTabs = [
        'pengantar'   => ['icon' => 'bi-info-circle',        'label' => 'Pengantar'],
        'video'       => ['icon' => 'bi-file-earmark-play',  'label' => 'Video Panduan'],
        'akreditasi'  => ['icon' => 'bi-gear',                'label' => 'Data Akreditasi'],
        'konsultasi'  => ['icon' => 'bi-chat-square-text',   'label' => 'Konsultasi'],
        'unmul'       => ['icon' => 'bi-file-earmark-text',  'label' => 'Tracer Study UNMUL'],
    ];
@endphp

<section class="upa-section pt-0">
    <div class="container px-3 px-lg-5">

            <!-- TAB BAR — clicking a button swaps the visible panel below. -->
        <div class="upa-tabs-wrap">
            <div class="upa-tabs" role="tablist" aria-label="Navigasi Panduan Tracer Study" data-aos="fade-up">
                <span class="upa-tabs__indicator" aria-hidden="true"></span>
                @foreach ($ptsTabs as $key => $tab)
                    <button
                        type="button"
                        class="upa-tab-btn @if($loop->first) active @endif"
                        data-tab="{{ $key }}"
                        role="tab"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                        aria-controls="panel-{{ $key }}"
                    >
                        <i class="bi {{ $tab['icon'] }}"></i>
                        <span>{{ $tab['label'] }}</span>
                    </button>
                @endforeach
            </div>
            {{-- Mobile-only clue that the tab bar can be swiped horizontally.
                Right arrow shows by default; once the user scrolls the tab
                bar all the way to the end, JS below hides it and reveals
                the left arrow instead (see @push('scripts')). --}}
            <span class="upa-tabs-swipe-arrow upa-tabs-swipe-arrow--right d-md-none" aria-hidden="true">
                <i class="bi bi-chevron-right"></i>
            </span>
            <span class="upa-tabs-swipe-arrow upa-tabs-swipe-arrow--left is-hidden d-md-none" aria-hidden="true">
                <i class="bi bi-chevron-left"></i>
            </span>
        </div>

        <!-- PANEL 1 — Pengantar -->
        <div class="upa-tab-panel active" id="panel-pengantar" role="tabpanel" data-aos="fade-up">
            <div class="upa-panel-card">
                <div class="upa-panel-header">
                    <span class="upa-panel-icon"><i class="bi bi-rocket-takeoff"></i></span>
                    <h2 class="upa-panel-title">Pengantar Tracer Study</h2>
                </div>
                <div class="row g-4 align-items-start">
                    <div class="col-lg-7">
                        <p class="upa-panel-text mb-3">
                            Tracer Study Universitas Mulawarman adalah instrumen riset longitudinal yang bertujuan
                            untuk memetakan transisi lulusan dari dunia akademik ke dunia kerja. Data yang terkumpul
                            sangat krusial untuk evaluasi kurikulum, akreditasi program studi, dan pengembangan
                            layanan karir mahasiswa.
                        </p>
                        <p class="upa-panel-text mb-0">
                            Kami mengajak seluruh alumni untuk meluangkan waktu 10-15 menit dalam mengisi kuesioner
                            ini secara akurat. Kontribusi Anda adalah investasi berharga bagi masa depan almamater.
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <div class="upa-photo-slot" style="aspect-ratio:4 / 3;">
                            <img
                                src="{{ asset('img/photos/leader-02.jpg') }}"
                                alt="Wisuda Universitas Mulawarman"
                                loading="lazy"
                                onload="this.parentElement.classList.add('is-loaded')"
                                onerror="this.parentElement.classList.add('is-empty')"
                            >
                            <div class="upa-photo-slot__placeholder">
                                <i class="bi bi-image"></i>
                                <span>Ganti foto di sini</span>
                                <code>img/photos/leader-02.jpg</code>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- PANEL 2 — Video Panduan -->
        <div class="upa-tab-panel" id="panel-video" role="tabpanel" data-aos="fade-up">
            <div class="upa-panel-card">
                <div class="upa-panel-header">
                    <span class="upa-panel-icon upa-panel-icon--yellow"><i class="bi bi-play-fill"></i></span>
                    <h2 class="upa-panel-title">Video Panduan</h2>
                </div>
                <p class="upa-panel-text mb-4">Panduan Pengisian Tracer Study</p>

                <div class="row g-4">
                    @php
                        // Ambil ID video YouTube dari berbagai bentuk URL
                        // (youtu.be/ID, watch?v=ID, embed/ID, shorts/ID) lalu
                        // pakai thumbnail bawaan YouTube — tidak perlu upload
                        // gambar manual, cukup isi `url` saja.
                        $ytThumb = function (string $url) {
                            preg_match(
                                '/(?:youtu\.be\/|v=|\/embed\/|\/shorts\/)([A-Za-z0-9_-]{11})/',
                                $url,
                                $m
                            );
                            return isset($m[1])
                                ? "https://img.youtube.com/vi/{$m[1]}/hqdefault.jpg"
                                : asset('img/photos/leader-02.jpg');
                        };

                        $ptsVideos = [
                            [
                                'title' => 'Langkah-langkah Registrasi Akun Alumni',
                                'desc'  => 'Panduan lengkap mendaftar dan memverifikasi data alumni di portal Tracer Study.',
                                'url'   => 'https://youtu.be/tMWdCqzvBM4?si=PLjVmtsmCTG-iFBy',
                            ],
                            [
                                'title' => 'Panduan Pengisian Form Alumni',
                                'desc'  => 'Tutorial pengisian kuesioner alumni lulusan tahun 2020 kebawah.',
                                'url'   => 'https://youtu.be/edKIpEblAJI?si=tT4AB-XTCRrBGp5X',
                            ],
                        ];
                    @endphp
                    @foreach ($ptsVideos as $video)
                        <div class="col-md-6">
                            <div class="upa-video-card">
                                <a href="{{ $video['url'] }}" target="_blank" rel="noopener" class="upa-video-card__thumb" aria-label="Putar video: {{ $video['title'] }}">
                                    <img src="{{ $ytThumb($video['url']) }}" alt="{{ $video['title'] }}" loading="lazy">
                                    <i class="bi bi-play-circle-fill"></i>
                                </a>
                                <div class="upa-video-card__body">
                                    <p class="upa-video-card__title">{{ $video['title'] }}</p>
                                    <p class="upa-video-card__desc mb-0">{{ $video['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

            <!-- PANEL 3 — Data Akreditasi -->
        <div class="upa-tab-panel" id="panel-akreditasi" role="tabpanel" data-aos="fade-up">
            <div class="upa-panel-card">
                <div class="upa-panel-header">
                    <span class="upa-panel-icon"><i class="bi bi-file-earmark-text"></i></span>
                    <h2 class="upa-panel-title">Data Akreditasi Universitas Mulawarman</h2>
                </div>
                <p class="upa-panel-text mb-0">
                    Sehubungan dengan kebutuhan data Akreditasi program study di lingkungan Universitas Mulawarman.
                    Berikut kami tarikan data tracer study pertanggal <strong>13-3-2024</strong> untuk dipergunakan
                    secara semestinya.
                </p>
            </div>

            <div class="upa-doc-viewer mt-4">
                <div class="upa-doc-viewer__toolbar">
                    <div class="upa-doc-viewer__file">
                        <span class="upa-doc-viewer__file-icon"><i class="bi bi-filetype-pdf"></i></span>
                        <p class="upa-doc-viewer__file-name">Sertifikat Akreditasi Universitas Mulawarman</p>
                    </div>
                    {{-- Ganti path di asset() dengan lokasi file PDF yang sebenarnya --}}
                    <a href="{{ asset('docs/sertifikat-akreditasi-unmul.pdf') }}" download class="upa-doc-viewer__download">
                        <i class="bi bi-download"></i> Unduh
                    </a>
                </div>
                <div class="upa-doc-viewer__body">
                    <div class="upa-doc-viewer__page">
                        <div class="upa-photo-slot upa-photo-slot--flush" style="aspect-ratio:400 / 295;">
                            <img
                                src="{{ asset('img/photos/leader-02.jpg') }}"
                                alt="Sertifikat Akreditasi BAN-PT Universitas Mulawarman"
                                loading="lazy"
                                onload="this.parentElement.classList.add('is-loaded')"
                                onerror="this.parentElement.classList.add('is-empty')"
                            >
                            <div class="upa-photo-slot__placeholder">
                                <i class="bi bi-image"></i>
                                <span>Ganti scan sertifikat di sini</span>
                                <code>img/photos/leader-02.jpg</code>
                            </div>
                        </div>
                    </div>
                    <span class="upa-doc-viewer__page-label">Halaman 1</span>
                </div>
            </div>
        </div>

            <!-- PANEL 4 — Konsultasi -->
        <div class="upa-tab-panel" id="panel-konsultasi" role="tabpanel" data-aos="fade-up">
            <div class="upa-panel-card">
                <div class="upa-panel-header">
                    <span class="upa-panel-icon"><i class="bi bi-chat-square-text"></i></span>
                    <h2 class="upa-panel-title">Layanan Konsultasi</h2>
                </div>
                <p class="upa-panel-text mb-4">
                    Salam Perkasa! UPA Perkasa Universitas Mulawarman menyediakan layanan konsultasi admin bagi alumni yang menemui hambatan teknis maupun administratif
                    saat berpartisipasi dalam program Tracer Study. Kami berkomitmen untuk memastikan data Anda
                    terekam dengan akurat untuk kemajuan universitas.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <span class="upa-schedule-pill">
                        <i class="bi bi-calendar-week"></i> Senin - Jumat
                        <span class="badge-time"><i class="bi bi-clock"></i> 08:00 - 16:00 WITA</span>
                    </span>
                </div>
            </div>

            <h3 class="fw-bold mt-4 mb-3" style="color:var(--upa-green-heading); font-family:var(--upa-font-display);">
                Layanan yang Tersedia
            </h3>
            <div class="row g-4 mb-4">
                @php
                    $ptsServices = [
                        [
                            'icon'  => 'bi-person-check',
                            'title' => 'Registrasi Tracer Study',
                            'desc'  => 'Pendaftaran akun alumni untuk memulai pengisian data tracer study. Pastikan NIM dan data identitas Anda sudah valid.',
                            'url'   => 'https://perkasa.unmul.ac.id/mahasiswa/login-mahasiswa',
                        ],
                        [
                            'icon'  => 'bi-pencil-square',
                            'title' => 'Form Perbaikan Data Profil',
                            'desc'  => 'Ajukan perubahan data profil alumni jika terdapat ketidaksesuaian informasi dalam sistem Tracer Study kami.',
                            'url'   => 'https://docs.google.com/forms/d/e/1FAIpQLScfSsgxNOJ6lVzxV0m0qpgPiq2VVgZbKWNrRIFU7i9ZuTEVsQ/viewform',
                        ],
                    ];
                @endphp
                @foreach ($ptsServices as $service)
                    <div class="col-md-6">
                        <div class="upa-service-card">
                            <div class="upa-service-card__head">
                                <span class="upa-service-card__icon"><i class="bi {{ $service['icon'] }}"></i></span>
                                <div class="upa-service-card__body">
                                    <p class="upa-service-card__title mb-1">{{ $service['title'] }}</p>
                                    <p class="upa-service-card__desc">{{ $service['desc'] }}</p>
                                </div>
                            </div>
                            <a href="{{ $service['url'] }}" target="_blank" class="btn-upa-primary text-center w-100">Buka Link <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="upa-cta-banner">
                <div class="row g-0 align-items-stretch">
                    <div class="col-lg-7 p-4 p-lg-5 d-flex flex-column justify-content-center">
                        <h3 class="upa-cta-banner__title">Butuh Bantuan Teknis?</h3>
                        <p class="upa-cta-banner__text">
                            Tim helpdesk kami siap membantu kendala login, verifikasi data, hingga pertanyaan teknis
                            seputar Tracer Study setiap hari kerja.
                        </p>
                        <a href="https://wa.me/6285212345678" target="_blank" rel="noopener" class="upa-cta-banner__btn upa-cta-banner__btn--light">
                            <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
                        </a>
                        <a href="mailto:upt.perkasa@unmul.ac.id" class="upa-cta-banner__btn upa-cta-banner__btn--outline mb-0">
                            <i class="bi bi-envelope"></i> Hubungi via Email
                        </a>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="upa-cta-banner__media">
                            <div class="upa-photo-slot upa-photo-slot--flush" style="height:100%;">
                                <img
                                    src="{{ asset('img/photos/leader-02.jpg') }}"
                                    alt="Tim helpdesk Tracer Study UPA Perkasa"
                                    loading="lazy"
                                    onload="this.parentElement.classList.add('is-loaded')"
                                    onerror="this.parentElement.classList.add('is-empty')"
                                >
                                <div class="upa-photo-slot__placeholder">
                                    <i class="bi bi-image"></i>
                                    <span>Ganti foto di sini</span>
                                    <code>img/photos/leader-02.jpg</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- PANEL 5 — Tracer Study UNMUL (Kuisioner) -->
        <div class="upa-tab-panel" id="panel-unmul" role="tabpanel" data-aos="fade-up">
            <div class="upa-panel-card">
                <div class="upa-panel-header">
                    <span class="upa-panel-icon"><i class="bi bi-file-earmark-text"></i></span>
                    <h2 class="upa-panel-title">Kuisioner Tracer Study Universitas Mulawarman</h2>
                </div>
                <p class="upa-panel-text mb-0">
                    Berisi kumpulan pertanyaan kuisioner terhadap alumni Unmul mengikuti pertanyaan standar
                    mandatory dan pertanyaan standar kuisioner tracer study KemdikbudSaintek.
                </p>
            </div>

            @php
                // Cukup ganti ID file Drive di bawah ini kalau dokumennya diperbarui.
                // Pastikan file di-share minimal "Anyone with the link" agar embed tampil.
                $ptsKuisionerDriveId = '1bs0jxyvGH1zeVrBHRQRsRdDIRCr5uioZ';
            @endphp
            <div class="upa-doc-embed mt-4">
                <div class="upa-doc-embed__header">
                    <span class="upa-doc-embed__icon"><i class="bi bi-filetype-pdf"></i></span>
                    <div>
                        <p class="upa-doc-embed__title">Kuisioner Tracer Study KemdikbudSaintek</p>
                        <p class="upa-doc-embed__meta">Nomor: Unmul/PPID/TS-01/2024</p>
                    </div>
                </div>
                <div class="upa-doc-embed__frame">
                    <iframe
                        src="https://drive.google.com/file/d/{{ $ptsKuisionerDriveId }}/preview"
                        title="Kuisioner Tracer Study KemdikbudSaintek"
                        loading="lazy"
                        allow="autoplay"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var tabBar     = document.querySelector('.upa-tabs');
    var indicator  = document.querySelector('.upa-tabs__indicator');
    var buttons    = document.querySelectorAll('.upa-tab-btn');
    var panels     = document.querySelectorAll('.upa-tab-panel');
    if (!tabBar || !buttons.length || !panels.length) return;

    function moveIndicator(btn) {
        if (!indicator) return;
        indicator.style.width     = btn.offsetWidth + 'px';
        indicator.style.transform = 'translateX(' + btn.offsetLeft + 'px)';
    }

    function scrollButtonIntoView(btn) {
        var barRect = tabBar.getBoundingClientRect();
        var btnRect = btn.getBoundingClientRect();
        if (btnRect.left < barRect.left) {
            tabBar.scrollBy({ left: btnRect.left - barRect.left - 16, behavior: 'smooth' });
        } else if (btnRect.right > barRect.right) {
            tabBar.scrollBy({ left: btnRect.right - barRect.right + 16, behavior: 'smooth' });
        }
    }

    function activate(key, opts) {
        opts = opts || {};
        var activeBtn = null;

        buttons.forEach(function (btn) {
            var isActive = btn.dataset.tab === key;
            btn.classList.toggle('active', isActive);
            btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
            if (isActive) activeBtn = btn;
        });
        panels.forEach(function (panel) {
            panel.classList.toggle('active', panel.id === 'panel-' + key);
        });

        if (activeBtn) {
            moveIndicator(activeBtn);
            if (opts.scrollIntoView) scrollButtonIntoView(activeBtn);
        }
        if (typeof AOS !== 'undefined') AOS.refreshHard();
    }

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var key = btn.dataset.tab;
            activate(key, { scrollIntoView: true });
            history.replaceState(null, '', '#' + key);
        });
    });

    var resizeTimer;
    window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
            var current = document.querySelector('.upa-tab-btn.active');
            if (current) moveIndicator(current);
        }, 120);
    });

    var initial = (window.location.hash || '').replace('#', '');
    var isValid = Array.prototype.some.call(buttons, function (b) { return b.dataset.tab === initial; });
    activate(isValid ? initial : buttons[0].dataset.tab);

    function realign() {
        var current = document.querySelector('.upa-tab-btn.active');
        if (current) moveIndicator(current);
    }
    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(realign);
    }
    window.addEventListener('load', realign);

    requestAnimationFrame(function () {
        tabBar.classList.add('upa-tabs--ready');
    });

    var rightArrow = document.querySelector('.upa-tabs-swipe-arrow--right');
    var leftArrow  = document.querySelector('.upa-tabs-swipe-arrow--left');
    if (rightArrow && leftArrow) {
        var updateArrows = function () {
            var maxScroll = tabBar.scrollWidth - tabBar.clientWidth;
            if (maxScroll <= 2) {
                rightArrow.classList.add('is-hidden');
                leftArrow.classList.add('is-hidden');
                return;
            }
            var atEnd = tabBar.scrollLeft >= maxScroll - 2;
            rightArrow.classList.toggle('is-hidden', atEnd);
            leftArrow.classList.toggle('is-hidden', !atEnd);
        };
        updateArrows();
        tabBar.addEventListener('scroll', updateArrows, { passive: true });
        window.addEventListener('resize', updateArrows);
    }
});
</script>
@endpush