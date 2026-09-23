{{--
    Navbar  —  UPA Perkasa Unmul
    @include('layouts.navbar') dipanggil dari layouts/app.blade.php
--}}
@php
    $profilDropdown = [
        ['label' => 'Sejarah',                'url' => route('profile.sejarah')],
        ['label' => 'Visi dan Misi',           'url' => route('profile.visi-misi')],
        ['label' => 'Struktur UPA PERKASA',    'url' => route('profile.struktur')],
        ['label' => 'Profil Pimpinan',         'url' => route('profile.pimpinan')],
        ['label' => 'Tujuan dan Sasaran',      'url' => route('profile.tujuan-sasaran')],
        ['label' => 'Panduan Tracer Study',    'url' => route('profile.panduan-tracer-study')],
        ['label' => 'Program Kerja',           'url' => route('profile.program-kerja')],
        ['label' => 'Logo UPA PERKASA',        'url' => route('profile.logo')],
    ];
    $publikasiDropdown = [
        ['label' => 'Lowongan Kerja',  'url' => route('publikasi.lowongan')],
        ['label' => 'Berita',          'url' => route('publikasi.berita')],
        ['label' => 'Agenda Kegiatan', 'url' => route('publikasi.agenda')],
        ['label' => 'Pengumuman',      'url' => route('publikasi.pengumuman')],
    ];
    $ppidDropdown = [
        ['label' => 'Tentang PPID',                  'url' => route('ppid.tentang')],
        ['label' => 'Informasi Wajib Berkala',        'url' => route('ppid.wajib-berkala')],
        ['label' => 'Informasi Tersedia Setiap Saat', 'url' => route('ppid.tersedia-setiap-saat')],
        ['label' => 'Informasi Yang Dikecualikan',    'url' => route('ppid.dikecualikan')],
    ];
    $reportDropdown = [
        ['label' => 'Laporan Tahunan UPA PERKASA',         'url' => route('report.laporan-tahunan')],
        ['label' => 'Laporan Tracer Study',  'url' => route('report.tracer-study')],
        ['label' => 'Capaian IKU1 UNMUL Tahun 2025',  'url' => route('report.capaian-iku1')],
    ];
@endphp

<header class="upa-navbar sticky-top">
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container-fluid px-3 px-lg-5">

            {{-- Logo --}}
            <a class="navbar-brand upa-navbar__brand" href="{{ route('home') }}">
                <img src="{{ asset('img/logo/logo-full.png') }}" alt="UPA Perkasa Unmul">
            </a>

            {{-- Mobile toggler → custom full-screen nav (see below). Plain
                JS toggle, not Bootstrap's offcanvas component. --}}
            <button class="navbar-toggler border-0" type="button"
                    id="upaMenuToggle" aria-controls="upaMobileMenu"
                    aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Desktop nav (d-none on mobile, shown on lg+) --}}
            <div class="collapse navbar-collapse d-none d-lg-flex">
                <ul class="navbar-nav mx-auto upa-navbar__nav align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"><span class="upa-navlink__label">Beranda</span></a>
                    </li>

                    @foreach ([
                        ['label'=>'Profil',    'items'=>$profilDropdown,   'route'=>'profile.*'],
                        ['label'=>'Publikasi', 'items'=>$publikasiDropdown,'route'=>'publikasi.*'],
                        ['label'=>'PPID',      'items'=>$ppidDropdown,     'route'=>'ppid.*'],
                        ['label'=>'Report',    'items'=>$reportDropdown,   'route'=>'report.*'],
                    ] as $menu)
                    <li class="nav-item dropdown upa-dropdown">
                        <a class="nav-link dropdown-toggle upa-dropdown__toggle {{ $menu['route'] && request()->routeIs($menu['route']) ? 'active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="upa-navlink__label">{{ $menu['label'] }}</span>
                            <i class="bi bi-chevron-down upa-dropdown__caret"></i>
                        </a>
                        <ul class="dropdown-menu upa-dropdown__menu">
                            @foreach ($menu['items'] as $item)
                                <li>
                                    <a class="dropdown-item upa-dropdown__item" href="{{ $item['url'] }}">
                                        {{ $item['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://perkasa.unmul.ac.id/perkasa2/tracer-study"><span class="upa-navlink__label">Tracer Study</span></a>
                    </li>
                </ul>

                {{-- Desktop: login --}}
                <div class="d-flex align-items-center upa-navbar__actions">
                    <a href="https://perkasa.unmul.ac.id/start-session" class="btn btn-upa-primary upa-navbar__login">Login</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- ── Mobile full-screen nav ────────────────────────────────────
        Custom panel (not Bootstrap's offcanvas/accordion) — avoids the
        scrollbar-compensation + collapse-init issues those components
        had here, and matches the full-screen mobile nav pattern used
        on unmul.ac.id. Opened/closed purely via navbar.js. ──────── --}}
    <div class="upa-mobile-nav" id="upaMobileMenu" aria-hidden="true">
        <div class="upa-mobile-nav__header">
            <img src="{{ asset('img/logo/logo-full.png') }}" alt="Logo UPA Perkasa" class="upa-mobile-nav__logo">
            <button type="button" class="upa-mobile-nav__close" id="upaMenuClose" aria-label="Tutup menu">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <div class="upa-mobile-nav__body">

            <nav class="upa-mobile-nav__list">
                <a href="{{ route('home') }}"
                class="upa-mobile-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>

                @foreach ([
                    ['id'=>'mobileProfil',    'label'=>'Profil',    'items'=>$profilDropdown],
                    ['id'=>'mobilePublikasi', 'label'=>'Publikasi', 'items'=>$publikasiDropdown],
                    ['id'=>'mobilePpid',      'label'=>'PPID',      'items'=>$ppidDropdown],
                    ['id'=>'mobileReport',    'label'=>'Report',    'items'=>$reportDropdown],
                ] as $m)
                <div class="upa-mobile-accordion">
                    <button type="button" class="upa-mobile-accordion__btn"
                            data-accordion-toggle aria-expanded="false" aria-controls="{{ $m['id'] }}">
                        <span>{{ $m['label'] }}</span>
                        <i class="bi bi-chevron-down upa-mobile-accordion__chevron"></i>
                    </button>
                    <div id="{{ $m['id'] }}" class="upa-mobile-accordion__panel">
                        @foreach ($m['items'] as $item)
                            <a href="{{ $item['url'] }}" class="upa-mobile-sublink">{{ $item['label'] }}</a>
                        @endforeach
                    </div>
                </div>
                @endforeach

                <a target="_blank" href="https://perkasa.unmul.ac.id/perkasa2/tracer-study" class="upa-mobile-link">Tracer Study</a>
            </nav>

            <a href="https://perkasa.unmul.ac.id/start-session" class="btn btn-upa-primary w-100 mt-4 upa-mobile-nav__login">Login</a>
        </div>
    </div>
</header>