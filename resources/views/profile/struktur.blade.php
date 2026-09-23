@extends('layouts.app')
@section('title', 'Struktur Organisasi')

@php
    $struktur = [
        'Pimpinan' => [
            ['jabatan'=>'Kepala UPA Perkasa',       'nama'=>'Dr. H. Muhammad Nasir',    'divisi'=>'Pimpinan Pusat',   'foto'=>asset('img/photos/leader-02.jpg')],
        ],
        'Ketua Divisi' => [
            ['jabatan'=>'Ketua Divisi Karir',        'nama'=>'Siti Aminah, M.Si',         'divisi'=>'Divisi Karir',         'foto'=>asset('img/photos/leader-02.jpg')],
            ['jabatan'=>'Ketua Divisi Wirausaha',    'nama'=>'Dr. Ir. Hendra',            'divisi'=>'Divisi Wirausaha',     'foto'=>asset('img/photos/leader-02.jpg')],
            ['jabatan'=>'Ketua Divisi Kerjasama',    'nama'=>'Nani Suryani, M.Pd',        'divisi'=>'Divisi Kerjasama',     'foto'=>asset('img/photos/leader-02.jpg')],
            ['jabatan'=>'Ketua Divisi Tracer Study', 'nama'=>'Fajar Ramadhan, M.T',       'divisi'=>'Divisi Tracer Study',  'foto'=>asset('img/photos/leader-02.jpg')],
            ['jabatan'=>'Ketua Divisi Inovasi',      'nama'=>'Dr. Sri Wahyuni',           'divisi'=>'Divisi Inovasi',       'foto'=>asset('img/photos/leader-02.jpg')],
        ],
        'Anggota' => [
            ['jabatan'=>'Admin Keuangan', 'nama'=>'Anton Wijaya',   'divisi'=>'Administrasi Umum', 'foto'=>asset('img/photos/leader-02.jpg')],
            ['jabatan'=>'Sekretariat',    'nama'=>'Lestari Putri',  'divisi'=>'Administrasi Umum', 'foto'=>asset('img/photos/leader-02.jpg')],
            ['jabatan'=>'Logistik',       'nama'=>'Slamet Riyadi',  'divisi'=>'Administrasi Umum', 'foto'=>asset('img/photos/leader-02.jpg')],
            ['jabatan'=>'Humas',          'nama'=>'Anisa Rahma',    'divisi'=>'Administrasi Umum', 'foto'=>asset('img/photos/leader-02.jpg')],
        ],
    ];
@endphp

@section('content')
@include('components.breadcrumb', ['crumbs' => [
    ['label'=>'Beranda','url'=>route('home')],
    ['label'=>'Profile','url'=>route('profile.sejarah')],
    ['label'=>'Struktur UPA Perkasa'],
]])
@include('components.page-hero', [
    'variant'  => 'bubble',
    'title'    => 'Struktur Organisasi',
    'subtitle' => 'Daftar struktur kepemimpinan dan staf Unit Penunjang Akademik (UPA) Pengembangan Karir dan Kewirausahaan Universitas Mulawarman.',
])

<section class="upa-section pt-0">
    <div class="container px-3 px-lg-5">

        <div class="upa-org-table" data-aos="fade-up" data-aos-delay="100">
            <div class="table-responsive">
                <table id="orgTable">
                    <thead>
                        <tr>
                            <th>JABATAN</th>
                            <th>NAMA</th>
                            <th>DIVISI/UNIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($struktur as $group => $rows)
                            <tr class="upa-org-table__group upa-org-group-row">
                                <td colspan="3">{{ $group }}</td>
                            </tr>
                            @foreach ($rows as $row)
                                <tr class="upa-org-data-row">
                                    <td class="fw-semibold text-upa-green" data-label="Jabatan">{{ $row['jabatan'] }}</td>
                                    <td data-label="Nama">
                                        <span class="upa-org-table__name">
                                            <img src="{{ $row['foto'] }}" alt="{{ $row['nama'] }}" class="upa-org-table__avatar">
                                            {{ $row['nama'] }}
                                        </span>
                                    </td>
                                    <td class="text-muted" data-label="Divisi/Unit">{{ $row['divisi'] }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
function upaOrgFilter(q) {
    q = q.toLowerCase().trim();
    document.querySelectorAll('#orgTable .upa-org-data-row').forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = (!q || text.includes(q)) ? '' : 'none';
    });
}
</script>
@endpush