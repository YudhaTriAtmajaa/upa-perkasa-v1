{{--
    Page hero heading component
    Usage (split — dua baris judul, e.g. Visi & Misi):
        @include('components.page-hero', [
            'variant'     => 'split',
            'titleTop'    => 'VISI DAN MISI',
            'titleAccent' => 'UPA PERKASA Universitas Mulawarman',
            'underline'   => true,
        ])
    Usage (bubble — single big heading, e.g. Sejarah):
        @include('components.page-hero', [
            'variant'  => 'bubble',
            'title'    => 'Sejarah Terbentuknya PERKASA',
            'subtitle' => 'Teks deskripsi...',
        ])
    Usage (panel — white card, left-aligned, w/ decorative icon, e.g. Berita/Agenda/Pengumuman):
        @include('components.page-hero', [
            'variant'  => 'panel',
            'title'    => 'Berita Terkini',
            'subtitle' => 'Teks deskripsi...',
            'icon'     => 'bi-newspaper',
        ])
--}}
@php $variant = $variant ?? 'bubble'; $extraClass = $class ?? ''; @endphp

@if ($variant === 'split')
    <section class="page-hero page-hero--split">
        <div class="container px-3">
            <h1 class="page-hero__title-top">{{ $titleTop }}</h1>
            @isset($titleAccent)
                <h1 class="page-hero__title-accent heading-bubble">{{ $titleAccent }}</h1>
            @endisset
            @if ($underline ?? false)
                <div class="page-hero__underline"></div>
            @endif
        </div>
    </section>
@elseif ($variant === 'panel')
    <section class="page-hero page-hero--panel">
        <div class="container px-3 px-lg-5">
            <div class="upa-hero-panel">
                <div class="upa-hero-panel__text">
                    <h1 class="page-hero__title heading-bubble mb-2">{{ $title }}</h1>
                    @isset($subtitle)
                        <p class="upa-hero-panel__subtitle" data-aos="fade-up" data-aos-delay="150">{{ $subtitle }}</p>
                    @endisset
                </div>
                @isset($icon)
                    <div class="upa-hero-panel__icon d-none d-lg-flex" data-aos="zoom-in" data-aos-delay="200">
                        <i class="bi {{ $icon }}"></i>
                    </div>
                @endisset
            </div>
        </div>
    </section>
@else
    <section class="page-hero page-hero--bubble {{ $extraClass }}">
        <div class="container px-3">
            <h1 class="page-hero__title heading-bubble">{{ $title }}</h1>
            @isset($subtitle)
                <p class="page-hero__subtitle" data-aos="fade-up" data-aos-delay="150">{{ $subtitle }}</p>
            @endisset
        </div>
    </section>
@endif