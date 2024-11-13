<?php

namespace App\Http\Controllers;
use App\Models\ProdiTentang;
use App\Models\ProdiKurikulum;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    //
    public function getFirstProdiTentang()
    {
        $tentang = ProdiTentang::first();
        return view('prodi.tentang', compact('tentang'));
    }

    /**
     * Get all active agendas from JurusanAgenda model.
     */
    public function allKurikulums()
    {
        $kurikulums = ProdiKurikulum::all();
        return view('prodi.kurikulum', compact('kurikulums'));
    }
}
