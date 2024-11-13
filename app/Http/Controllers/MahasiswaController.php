<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaKegiatan;
use App\Models\MahasiswaOrganisasi;
use App\Models\AlumniTracer;
use App\Models\AlumniPenggunaLulusan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function getFirstMahasiswaOrganisasi()
    {
        $organisasi = MahasiswaOrganisasi::first();
        return view('mahasiswa.organisasi', compact('organisasi'));
    }

    public function getFirstMahasiswaKegiatan()
    {
        $kegiatan = MahasiswaKegiatan::first();
        return view('mahasiswa.kegiatan', compact('kegiatan'));
    }

    public function allTracerAlumnis()
    {
        $traceralumnis = AlumniTracer::all();
        return view('mahasiswa.traceralumni', compact('traceralumnis'));
    }

    public function allPenggunaLulusans()
    {
        $penggunalulusans = AlumniPenggunaLulusan::all();
        return view('mahasiswa.penggunalulusan', compact('penggunalulusans'));
    }

    public function allAlumnis()
    {
        // Filter data berdasarkan beberapa tahun kelulusan
        $alumnitahuns = AlumniTracer::all();

        // Hitung data berdasarkan kategori di field "lingkup"
        $l_nasional = $alumnitahuns->where('lingkup', 'Nasional')->count();
        $l_multinasional = $alumnitahuns->where('lingkup', 'Multi Nasional/Internasional')->count();
        $l_wirausaha = $alumnitahuns->where('lingkup', 'Wirausaha')->count();

        $b_infokom = $alumnitahuns->where('bidang', 'Profesi Bidang Infokom')->count();
        $b_noninfokom = $alumnitahuns->where('bidang', 'Profesi Bidang Non Infokom')->count();

        // Hitung rata-rata waktu tunggu berdasarkan tahun lulus
        $avg_waktu_tunggu = $alumnitahuns->groupBy('tahun_lulus')->map(function ($group) {
            return round($group->avg('waktu_tunggu'), 2); // Rata-rata dengan pembulatan 2 desimal
        });

        // Hitung jumlah data berdasarkan tahun lulus
        $jlulusan = $alumnitahuns->groupBy('tahun_lulus')->map(function ($group) {
            return $group->count();
        });

        $json_jlulusan = $jlulusan->toArray();
        $json_waktutunggu = $avg_waktu_tunggu->toArray();

        // Kirimkan data ke view
        return view('mahasiswa.traceralumni', compact(
            'l_nasional',
            'l_multinasional',
            'l_wirausaha',
            'b_infokom',
            'b_noninfokom',
            'avg_waktu_tunggu',
            'jlulusan',
            'json_jlulusan',
            'json_waktutunggu'
        ));
    }





    public function allAlumniTahuns(array $tahun)
    {
        // Filter data berdasarkan beberapa tahun kelulusan
        $alumnistahuns = AlumniTracer::whereIn('tahun_kelulusan', $tahun)->get();

        // Hitung data berdasarkan kategori di field "lingkup"
        $nasional = $alumnistahuns->where('lingkup', 'Nasional')->count();
        $multiNasional = $alumnistahuns->where('lingkup', 'Multi Nasional/Internasional')->count();
        $wirausaha = $alumnistahuns->where('lingkup', 'Wirausaha')->count();


        // Kirimkan data ke view
        return view('mahasiswa.traceralumni', compact('penggunalulusans', 'nasional', 'multiNasional', 'wirausaha'));
    }
}
