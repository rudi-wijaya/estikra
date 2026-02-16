<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';
    
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'tanggal_terbit',
        'status',
    ];

    protected $casts = [
        'tanggal_terbit' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
