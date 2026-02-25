<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruStaff extends Model
{
    protected $table = 'guru_staffs';

    protected $fillable = [
        'nama', 'jabatan', 'kategori', 'foto', 'deskripsi', 'urutan', 'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public static array $kategoriLabels = [
        'kepala_sekolah' => 'Kepala Sekolah',
        'guru_kelas'     => 'Guru Kelas',
        'guru_mapel'     => 'Guru Mata Pelajaran',
        'staff'          => 'Staff & Administrasi',
    ];

    public function getKategoriLabelAttribute(): string
    {
        return self::$kategoriLabels[$this->kategori] ?? $this->kategori;
    }

    public function getFotoUrlAttribute(): string
    {
        return $this->foto
            ? asset('storage/' . $this->foto)
            : asset('images/default-avatar.png');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }
}
