<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Berita extends Model
{
    protected $table = 'beritas';
    
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'link_eksternal',
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

    public function prestasi(): HasOne
    {
        return $this->hasOne(Prestasi::class);
    }
}
