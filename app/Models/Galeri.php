<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeris';
    
    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'tanggal_upload',
        'status',
    ];

    protected $casts = [
        'tanggal_upload' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
