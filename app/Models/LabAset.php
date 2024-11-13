<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabAset extends Model
{
    //
    protected $fillable = [
        'kode',
        'nama',
        'type',
        'tahun_pengadaan',
        'pembiayaan',
        'jumlah',
        'satuan',
        'kondisi',
        'keterangan',
        'foto'
    ];

    protected function casts(): array
    {
        return [
            'tahun_pengadaan' => 'integer',
        ];
    }
}
