<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdiKurikulum extends Model
{
    //
    protected $fillable = [
        'semester',
        'jenis',
        'rumpun',
        'kode',
        'mata_kuliah',
        'teori',
        'praktek',
        'rps',
        'modul'
    ];
}
