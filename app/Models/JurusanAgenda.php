<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurusanAgenda extends Model
{
    //
    //
    protected $fillable = [
        'judul',
        'slug',
        'agenda',
        'mulai',
        'berjalan',
        'aktif',
        'selesai'
    ];

    protected function casts(): array
    {
        return [
            'mulai' => 'datetime',
            'running'=> 'boolean',
            'aktif'=> 'boolean',
            'selesai' => 'boolean'
        ];
    }
}
