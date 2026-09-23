{{--
    PPID tabs navigation — Tentang / Informasi Wajib Berkala /
    Informasi Tersedia Setiap Saat / Informasi Yang Dikecualikan.
    Dipakai di keempat halaman resources/views/ppid/*.blade.php.

    Usage:
        @include('components.ppid-tabs', ['active' => 'tentang'])
    Nilai $active: 'tentang' | 'wajib-berkala' | 'tersedia-setiap-saat' | 'dikecualikan'
--}}
<div class="upa-ppid-tabs" data-aos="fade-up">
    <a href="{{ route('ppid.tentang') }}"
    class="upa-ppid-tabs__item {{ $active === 'tentang' ? 'active' : '' }}">
        <i class="bi bi-info-circle"></i> Tentang
    </a>
    <a href="{{ route('ppid.wajib-berkala') }}"
    class="upa-ppid-tabs__item {{ $active === 'wajib-berkala' ? 'active' : '' }}">
        <i class="bi bi-patch-check"></i> Informasi Wajib Berkala
    </a>
    <a href="{{ route('ppid.tersedia-setiap-saat') }}"
    class="upa-ppid-tabs__item {{ $active === 'tersedia-setiap-saat' ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text"></i> Informasi Tersedia Setiap Saat
    </a>
    <a href="{{ route('ppid.dikecualikan') }}"
    class="upa-ppid-tabs__item {{ $active === 'dikecualikan' ? 'active' : '' }}">
        <i class="bi bi-eye-slash"></i> Informasi Yang Dikecualikan
    </a>
</div>
