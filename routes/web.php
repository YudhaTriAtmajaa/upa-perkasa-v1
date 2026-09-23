<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PREVIEW-ONLY ROUTES
|--------------------------------------------------------------------------
| File ini HANYA untuk keperluan preview lokal di Laragon, supaya frontend
| yang sudah dibuat bisa langsung dilihat di browser tanpa menunggu backend.
|
| Semua route di bawah pakai Route::view() - artinya cuma memetakan
| URL -> file Blade, TANPA controller, TANPA logic, TANPA query database.
| Ini konsisten dengan batasan awal: "hanya mengerjakan bagian Frontend/View".
|
| Nanti kalau sudah diintegrasikan dengan backend sungguhan, file ini WAJIB
| diganti/disesuaikan oleh tim backend (pakai Controller, middleware auth,
| dsb sesuai kebutuhan mereka). Nama-nama route di bawah (home, profile.*)
| sengaja disamakan dengan yang sudah dipakai di dalam Blade (route('...')
| pada navbar, footer, breadcrumb), jadi kalau tim backend membuat ulang
| route dengan nama yang sama, tidak ada satupun file Blade yang perlu diubah.
|--------------------------------------------------------------------------
*/

Route::view('/', 'home.index')->name('home');

Route::view('/profil/sejarah', 'profile.sejarah')->name('profile.sejarah');
Route::view('/profil/visi-misi', 'profile.visi-misi')->name('profile.visi-misi');
Route::view('/profil/tujuan-sasaran', 'profile.tujuan-sasaran')->name('profile.tujuan-sasaran');
Route::view('/profil/struktur', 'profile.struktur')->name('profile.struktur');
Route::view('/profil/pimpinan', 'profile.pimpinan')->name('profile.pimpinan');
Route::view('/profil/program-kerja', 'profile.program-kerja')->name('profile.program-kerja');
Route::view('/profil/logo', 'profile.logo')->name('profile.logo');
Route::view('/profil/panduan-tracer-study', 'profile.panduan-tracer-study')->name('profile.panduan-tracer-study');

Route::get('/publikasi/berita', function () {
    return view('publikasi.berita');
})->name('publikasi.berita');

Route::get('/publikasi/berita/{slug}', function (string $slug) {
    return view('publikasi.berita-detail'); 
})->name('publikasi.berita-detail');

Route::view('/publikasi/lowongan-pekerjaan', 'publikasi.lowongan')->name('publikasi.lowongan');
Route::view('/publikasi/lowongan-pekerjaan/{slug}', 'publikasi.lowongan-perusahaan')->name('publikasi.lowongan-detail');

Route::get('/publikasi/agenda-kegiatan', function () {
    return view('publikasi.agenda');
})->name('publikasi.agenda');

Route::get('/publikasi/agenda-kegiatan/{slug}', function ($slug) {
    return view('publikasi.agenda-detail');
})->name('publikasi.agenda-detail');

Route::get('/publikasi/pengumuman', function () {
    return view('publikasi.pengumuman');
})->name('publikasi.pengumuman');

Route::get('/publikasi/pengumuman/{slug}', function ($slug) {
    return view('publikasi.pengumuman-detail');
})->name('publikasi.pengumuman-detail');

Route::prefix('report')->name('report.')->group(function () {
    Route::view('/laporan-tahunan', 'report.laporan-tahunan')->name('laporan-tahunan');
    Route::view('/tracer-study',    'report.tracer-study')->name('tracer-study');
    Route::view('/capaian-iku1',    'report.capaian-iku1')->name('capaian-iku1');
});

Route::prefix('ppid')->name('ppid.')->group(function () {
    Route::view('/tentang', 'ppid.tentang-ppid')->name('tentang');
    Route::view('/informasi-wajib-berkala', 'ppid.informasi-wajib-berkala')->name('wajib-berkala');
    Route::view('/informasi-tersedia-setiap-saat', 'ppid.informasi-tersedia-setiap-saat')->name('tersedia-setiap-saat');
    Route::view('/informasi-yang-dikecualikan', 'ppid.informasi-dikecualikan')->name('dikecualikan');
});