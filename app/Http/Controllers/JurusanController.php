<?php

namespace App\Http\Controllers;
use App\Models\JurusanFasilitas;
use App\Models\JurusanKerjaSama;
use App\Models\JurusanMerdekaBelajar;
use App\Models\JurusanProfil;
use App\Models\JurusanAgenda;
use App\Models\JurusanSdm;
use App\Models\JurusanSambutan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    //
    public function getFirstJurusanSdm()
    {
        $sdm = JurusanSdm::first();
        return view('jurusan.sdm', compact('sdm'));
    }

    public function getFirstJurusanSambutan()
    {
        $sambutan = JurusanSambutan::first();
        return view('jurusan.sambutan', compact('sambutan'));
    }

    public function getFirstJurusanFasilitas()
    {
        $fasilitas = JurusanFasilitas::first();
        return view('jurusan.fasilitas', compact('fasilitas'));
    }

    /**
     * Get the first record of JurusanKerjaSama model.
     */
    public function getFirstJurusanKerjaSama()
    {
        $kerjasama = JurusanKerjaSama::first();
        return view('jurusan.kerjasama', compact('kerjasama'));
    }

    /**
     * Get the first record of JurusanMerdekaBelajar model.
     */
    public function getFirstJurusanMerdekaBelajar()
    {
        $merdekabelajar = JurusanMerdekaBelajar::first();
        return view('jurusan.merdekabelajar', compact('merdekabelajar'));
    }

    /**
     * Get the first record of JurusanProfil model.
     */
    public function getFirstJurusanProfil()
    {
        $profil = JurusanProfil::first();
        return view('jurusan.profil', compact('profil'));
    }

    /**
     * Get all active agendas from JurusanAgenda model.
     */
    public function getActiveAgendas()
    {
        $activeAgendas = JurusanAgenda::where('aktif', true)->get();
        return view('jurusan.agenda', compact('activeAgendas'));
    }
}
