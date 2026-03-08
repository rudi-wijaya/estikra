<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpdbItem extends Model
{
    protected $fillable = ['type', 'judul', 'deskripsi', 'icon', 'urutan', 'aktif'];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }
}
