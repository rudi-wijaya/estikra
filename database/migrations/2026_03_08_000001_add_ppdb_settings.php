<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $settings = [
            ['key' => 'ppdb_tahun_ajaran',      'value' => '2026/2027',                                      'label' => 'Tahun Ajaran',              'group' => 'ppdb'],
            ['key' => 'ppdb_tanggal',            'value' => '1 Juni – 14 Juni 2026',                          'label' => 'Tanggal Pendaftaran',       'group' => 'ppdb'],
            ['key' => 'ppdb_jam',                'value' => 'Senin – Sabtu, 08.00 – 13.00 WIB',              'label' => 'Jam Pendaftaran',           'group' => 'ppdb'],
            ['key' => 'ppdb_lokasi',             'value' => 'Ruang Tata Usaha',                               'label' => 'Tempat Pendaftaran',        'group' => 'ppdb'],
            ['key' => 'ppdb_lokasi_detail',      'value' => 'SD Negeri 3 Krasak, Jl. Raya Krasak No. 45',   'label' => 'Detail Lokasi',             'group' => 'ppdb'],
            ['key' => 'ppdb_kuota',              'value' => '28 Siswa Baru',                                  'label' => 'Kuota Penerimaan',          'group' => 'ppdb'],
            ['key' => 'ppdb_kuota_keterangan',   'value' => 'Kelas 1 Tahun Ajaran 2026/2027',                'label' => 'Keterangan Kuota',          'group' => 'ppdb'],
            ['key' => 'ppdb_syarat_usia',        'value' => "Berusia 7 tahun wajib diterima (prioritas utama)\nBerusia 6 tahun pada 1 Juli 2026 dapat diterima jika kuota masih tersedia\nBerusia 5 tahun 6 bulan dapat dipertimbangkan dengan rekomendasi psikolog", 'label' => 'Syarat Usia (satu per baris)', 'group' => 'ppdb'],
        ];

        $now = now();
        foreach ($settings as $setting) {
            \DB::table('settings')->insert(array_merge($setting, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }

    public function down(): void
    {
        \DB::table('settings')->whereIn('key', [
            'ppdb_tahun_ajaran', 'ppdb_tanggal', 'ppdb_jam', 'ppdb_lokasi',
            'ppdb_lokasi_detail', 'ppdb_kuota', 'ppdb_kuota_keterangan', 'ppdb_syarat_usia',
        ])->delete();
    }
};
