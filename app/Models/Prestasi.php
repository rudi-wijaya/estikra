<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Prestasi extends Model
{
    protected $fillable = [
        'berita_id',
        'judul',
        'keterangan',
        'tahun',
        'foto',
        'urutan',
        'status',
    ];

    public function berita(): BelongsTo
    {
        return $this->belongsTo(Berita::class);
    }

    public static function refreshUrutanByTanggalTahun(): void
    {
        $ids = self::query()
            ->leftJoin('beritas', 'prestasis.berita_id', '=', 'beritas.id')
            ->orderByRaw("COALESCE(beritas.tanggal_terbit, STR_TO_DATE(CONCAT(prestasis.tahun, '-12-31'), '%Y-%m-%d'), prestasis.created_at) DESC")
            ->orderByDesc('prestasis.created_at')
            ->orderByDesc('prestasis.id')
            ->pluck('prestasis.id');

        DB::transaction(function () use ($ids) {
            foreach ($ids->values() as $index => $id) {
                self::whereKey($id)->update(['urutan' => $index + 1]);
            }
        });
    }
}
