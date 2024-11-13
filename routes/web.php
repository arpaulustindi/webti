<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Livewire\DaftarTracerAlumni;


Route::get('/', function () {
    return view('beranda');
});
Route::get('/jurusan/sambutan', [JurusanController::class, 'getFirstJurusanSambutan']);

Route::get('/jurusan/profil', [JurusanController::class, 'getFirstJurusanProfil']);

Route::get('/jurusan/sdm', [JurusanController::class, 'getFirstJurusanSdm']);

Route::get('/jurusan/fasilitas', [JurusanController::class, 'getFirstJurusanFasilitas']);

Route::get('/jurusan/kerjasama', [JurusanController::class, 'getFirstJurusanKerjaSama']);

Route::get('/jurusan/merdekabelajar', [JurusanController::class, 'getFirstJurusanMerdekaBelajar']);

Route::get('/jurusan/agenda', [JurusanController::class, 'getActiveAgendas']);


Route::get('/berita', function () {
    return view('berita.berita');
});

Route::get('/prodi/tentang', [ProdiController::class, 'getFirstProdiTentang']);

Route::get('/prodi/kurikulum', [ProdiController::class, 'allKurikulums']);


Route::get('/lab/tentang', [LabController::class, 'getFirstLabTentang']);

Route::get('/lab/aset', [LabController::class, 'allAsets']);




Route::get('/legal/standar', function () {
    return view('legal.standar');
});
Route::get('/legal/sop', function () {
    return view('legal.sop');
});
Route::get('/legal/peraturan', function () {
    return view('legal.peraturan');
});


Route::get('/mahasiswa/organisasi', [MahasiswaController::class, 'getFirstMahasiswaOrganisasi']);

Route::get('/mahasiswa/kegiatan', [MahasiswaController::class, 'getFirstMahasiswaKegiatan']);

Route::get('/mahasiswa/traceralumni', [MahasiswaController::class, 'allAlumnis']);

Route::get('/mahasiswa/penggunalulusan', [MahasiswaController::class, 'allPenggunaLulusans']);

//Route::get('/traceralumni', DaftarTracerAlumni::class);
Route::get('/traceralumni', function () {
    return view('tracer');
});
