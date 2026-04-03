<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'foto', 'galeri_foto'];

    protected $casts = [
        'galeri_foto' => 'array',
    ];
}
