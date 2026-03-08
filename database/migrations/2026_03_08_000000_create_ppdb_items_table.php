<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdb_items', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['dokumen', 'alur']);
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedSmallInteger('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });

        // Seed default dokumen items
        $dokumen = [
            ['judul' => 'Akta Kelahiran',                     'deskripsi' => 'Fotokopi akta kelahiran (2 lembar)',                              'icon' => 'bi-file-earmark-text-fill', 'urutan' => 1],
            ['judul' => 'Kartu Keluarga (KK)',                'deskripsi' => 'Fotokopi Kartu Keluarga (2 lembar)',                              'icon' => 'bi-card-text',              'urutan' => 2],
            ['judul' => 'KTP Orang Tua/Wali',                 'deskripsi' => 'Fotokopi KTP ayah dan ibu (masing-masing 2 lembar)',              'icon' => 'bi-person-badge',           'urutan' => 3],
            ['judul' => 'Ijazah / Surat Keterangan TK/PAUD', 'deskripsi' => 'Bagi yang pernah menempuh TK/PAUD (jika ada)',                   'icon' => 'bi-award-fill',             'urutan' => 4],
            ['judul' => 'Pas Foto',                           'deskripsi' => '4 lembar ukuran 3×4 cm berlatar merah',                          'icon' => 'bi-image',                  'urutan' => 5],
            ['judul' => 'Surat Keterangan Domisili',          'deskripsi' => 'Dari RT/RW setempat (jika alamat KK berbeda)',                   'icon' => 'bi-house-fill',             'urutan' => 6],
            ['judul' => 'Buku Kesehatan Anak',                'deskripsi' => 'Termasuk rekam imunisasi (jika ada)',                            'icon' => 'bi-hospital',               'urutan' => 7],
        ];

        // Seed default alur items
        $alur = [
            ['judul' => 'Ambil Formulir',      'deskripsi' => 'Datang ke ruang TU, ambil dan isi formulir pendaftaran secara lengkap.',                      'icon' => null, 'urutan' => 1],
            ['judul' => 'Lengkapi Berkas',     'deskripsi' => 'Siapkan semua dokumen yang dipersyaratkan dan masukkan ke dalam map.',                        'icon' => null, 'urutan' => 2],
            ['judul' => 'Serahkan Berkas',     'deskripsi' => 'Serahkan formulir beserta berkas ke petugas TU pada jam yang ditentukan.',                    'icon' => null, 'urutan' => 3],
            ['judul' => 'Verifikasi Dokumen',  'deskripsi' => 'Petugas melakukan pengecekan kelengkapan dan keabsahan dokumen.',                             'icon' => null, 'urutan' => 4],
            ['judul' => 'Pengumuman',          'deskripsi' => 'Pengumuman hasil seleksi diumumkan pada 20 Juni 2026 di papan pengumuman sekolah.',           'icon' => null, 'urutan' => 5],
            ['judul' => 'Daftar Ulang',        'deskripsi' => 'Calon siswa yang diterima wajib melakukan daftar ulang pada 23–27 Juni 2026.',               'icon' => null, 'urutan' => 6],
        ];

        $now = now();
        foreach ($dokumen as $item) {
            \DB::table('ppdb_items')->insert(array_merge($item, ['type' => 'dokumen', 'aktif' => true, 'created_at' => $now, 'updated_at' => $now]));
        }
        foreach ($alur as $item) {
            \DB::table('ppdb_items')->insert(array_merge($item, ['type' => 'alur', 'aktif' => true, 'created_at' => $now, 'updated_at' => $now]));
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdb_items');
    }
};
