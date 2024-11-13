<?php

namespace App\Http\Controllers;
use App\Models\LabTentang;
use App\Models\LabAset;
use Illuminate\Http\Request;

class LabController extends Controller
{
    //
     //
     public function getFirstLabTentang()
     {
         $tentang = LabTentang::first();
         return view('lab.tentang', compact('tentang'));
     }
 
     /**
      * Get all active agendas from JurusanAgenda model.
      */
     public function allAsets()
     {
         $asets = LabAset::all();
         return view('lab.aset', compact('aset'));
     }
}
