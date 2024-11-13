<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class JurusanSambutan extends Model
{
    //
    protected $fillable = [
        'gambar',
        'sambutan'
    ];

    protected function casts(): array
    {
        return [
            'gambar' => 'string',
            'sambutan' => 'string',
        ];
    }


}
