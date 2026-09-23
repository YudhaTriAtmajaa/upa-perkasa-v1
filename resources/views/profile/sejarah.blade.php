@extends('layouts.app')
@section('title', 'Sejarah')

@php
    $tantangan = [
        ['icon'=>'bi-briefcase',  'title'=>'Kesenjangan Dunia Kerja',       'desc'=>'Mengatasi tingginya angka pengangguran lulusan baru ("fresh graduate") akibat kurangnya kesesuaian ("gap") antara kompetensi akademik lulusan dengan kebutuhan riil pasar industri.'],
        ['icon'=>'bi-lightbulb',  'title'=>'Jiwa Kewirausahaan',            'desc'=>'Membangun mentalitas wirausaha mandiri di kalangan mahasiswa agar mampu menciptakan lapangan pekerjaan baru sebagai alternatif sektor formal.', 'yellow'=>true],
        ['icon'=>'bi-mortarboard','title'=>'Tri Dharma Perguruan Tinggi',   'desc'=>'Memperkuat implementasi pengabdian masyarakat melalui program kemitraan strategis, memastikan manfaat institusi dapat dirasakan langsung secara luas.'],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Profile','url'=>route('profile.sejarah')],
    ['label'=>'Sejarah'],
]])
@include('components.page-hero', [
    'variant'  => 'bubble',
    'title'    => 'Sejarah Terbentuknya PERKASA',
    'subtitle' => 'UPA Pengembangan Karir dan Kewirausahaan (UPA Perkasa) Universitas Mulawarman didirikan dengan visi besar: meningkatkan daya saing lulusan agar mampu bersaing dalam dunia kerja yang semakin kompetitif di tingkat nasional maupun global. Resmi berdiri pada tahun 2016, unit ini menjadi salah satu pilar strategis yang memperkuat layanan mahasiswa dan alumni di bidang karir, kemandirian bisnis, serta kemitraan dengan dunia industri.',
    'class'    => 'upa-hero-sejarah',
])

{{-- Dasar Hukum --}}
<section class="upa-section pt-0 upa-sejarah-section">
    <div class="container px-3 px-lg-5">
        <h3 class="mb-3 border-start border-4 border-success ps-3" data-aos="fade-up">
            Dasar Hukum &amp; Latar Belakang Pendirian
        </h3>
        <p class="text-muted mb-2" style="line-height:1.75;text-align:justify;" data-aos="fade-up" data-aos-delay="50">
            Pembentukan UPA Perkasa dilandasi oleh Peraturan Menteri Riset, Teknologi, dan Pendidikan Tinggi
            Nomor 9 Tahun 2015 tentang Organisasi dan Tata Kerja (OTK) Universitas Mulawarman.
            Peraturan ini mendorong perguruan tinggi memiliki unit khusus yang bertanggung jawab penuh
            mendukung keberhasilan transisi alumni dari dunia kampus ke dunia profesi.
        </p>
        <p class="text-muted mb-4" style="line-height:1.75;text-align:justify;" data-aos="fade-up" data-aos-delay="80">
            Dalam perkembangannya, UPA Perkasa hadir sebagai jawaban taktis atas 3 (tiga) tantangan utama berikut:
        </p>

        <div class="row g-4">
            @foreach ($tantangan as $i => $item)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="upa-reason-card">
                        <div class="upa-reason-card__header">
                            <div class="upa-reason-card__icon {{ ($item['yellow'] ?? false) ? 'upa-reason-card__icon--yellow' : '' }}">
                                <i class="bi {{ $item['icon'] }}"></i>
                            </div>
                            <h5 class="upa-reason-card__title mb-0">{{ $item['title'] }}</h5>
                        </div>
                        <p class="upa-reason-card__desc mb-0">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kronologi --}}
<section class="upa-section pt-0 upa-sejarah-section">
    <div class="container px-3 px-lg-5">
        <h3 class="mb-4 border-start border-4 border-success ps-3" data-aos="fade-up">
            Kronologi Proses Pembentukan
        </h3>

        <div class="upa-timeline">
            {{-- Event 1 --}}
            <div class="upa-timeline__event row g-5 mb-5" data-aos="fade-up">
                <div class="col-md-6">
                    <span class="upa-timeline__date">26 - 28 November 2015</span>
                    <h4 class="upa-timeline__title mt-2">Lokakarya Persiapan Organisasi Kerja</h4>
                    <p class="upa-timeline__desc" style="text-align:justify;">
                        Langkah awal dimulai melalui lokakarya persiapan yang digelar oleh Bidang Kemahasiswaan
                        Unmul di Blue Sky Hotel, Balikpapan. Acara resmi dibuka oleh Rektor Unmul, Prof. Dr. H. Masjaya, M.Si.
                        serta dihadiri jajaran Wakil Rektor. Diskusi intensif ini berhasil merumuskan blueprint
                        struktur organisasi terpadu yang menyatukan layanan karir dan kewirausahaan.
                    </p>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="upa-timeline__photo">
                        {{-- TEMPLATE FOTO: kosong secara default. Untuk memasukkan foto,
                            hapus <i> dan <span> di bawah ini, ganti dengan misalnya:
                            <img src="{{ asset('images/sejarah/lokakarya.jpg') }}" alt="Dokumentasi Lokakarya Persiapan Organisasi Kerja"> --}}
                        <i class="bi bi-image upa-timeline__photo-icon"></i>
                        <span>Foto Lokakarya</span>
                    </div>
                    <p class="upa-timeline__caption">Dokumentasi: Lokakarya Pembentukan UPA Perkasa Unmul</p>
                </div>
                <span class="upa-timeline__dot"></span>
            </div>

            {{-- Event 2 --}}
            <div class="upa-timeline__event upa-timeline__event--reverse row g-5" data-aos="fade-up">
                <div class="col-md-6 order-md-2" data-aos="fade-up" data-aos-delay="100">
                    <span class="upa-timeline__date">3 Juni 2016</span>
                    <h4 class="upa-timeline__title mt-2">Pelantikan Kepala UPA Perkasa Pertama</h4>
                    <p class="upa-timeline__desc" style="text-align:justify;">
                        Menandai operasional resmi lembaga, Rektor Universitas Mulawarman melantik
                        Dr. Uni Wahyuni Sagena, S.IP, M.Si sebagai Kepala UPA Perkasa yang pertama,
                        bersamaan dengan pelantikan sembilan pejabat struktural lainnya di lingkungan kampus.
                    </p>
                    <div class="upa-timeline__quote">
                        "Setelah dilantik, saya berharap kinerja semakin meningkat, membanggakan, serta
                        membawa kemajuan untuk kampus kita tercinta ini."
                        <cite>— Prof. Dr. H. Masjaya, M.Si (Rektor Unmul)</cite>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="upa-timeline__photo">
                        {{-- TEMPLATE FOTO: kosong secara default. Untuk memasukkan foto,
                            hapus <i> dan <span> di bawah ini, ganti dengan misalnya:
                            <img src="{{ asset('images/sejarah/pelantikan.jpg') }}" alt="Dokumentasi Pelantikan Kepala UPA Perkasa Pertama"> --}}
                        <i class="bi bi-image upa-timeline__photo-icon"></i>
                        <span>Foto Pelantikan</span>
                    </div>
                </div>
                <span class="upa-timeline__dot"></span>
            </div>
        </div>

        <div class="upa-closing-card mt-5" data-aos="zoom-in">
            <div class="upa-closing-card__icon"><i class="bi bi-shield-check"></i></div>
            <p class="upa-closing-card__text mb-0">
                Hadirnya UPA Perkasa merupakan bukti nyata komitmen Universitas Mulawarman untuk mendampingi
                mahasiswa sepanjang perjalanan akademis hingga masa pasca-kelulusan. Dengan pendekatan yang
                terintegrasi, UPA Perkasa diharapkan mampu terus konsisten mencetak lulusan yang siap kerja,
                mandiri secara ekonomi melalui kewirausahaan, serta berkontribusi nyata dalam pembangunan
                daerah maupun nasional.
            </p>
        </div>
    </div>
</section>
@endsection