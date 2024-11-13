<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabTentang extends Model
{
    //
    protected $fillable = [
        'deskripsi'
    ];

    protected function casts(): array
    {
        return [
            'deskripsi' => 'string',
        ];
    }
}
