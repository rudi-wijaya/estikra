<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value')->nullable();
            $table->string('label');
            $table->string('group')->default('umum');
            $table->timestamps();
        });

        // Default values
        $defaults = [
            ['key' => 'sekolah_nama',      'value' => 'SD Negeri 3 Krasak Bangsri', 'label' => 'Nama Sekolah',         'group' => 'sekolah'],
            ['key' => 'sekolah_alamat',    'value' => 'Jl. Raya Krasak No. 45, Desa Krasak, Kec. Bangsri, Kabupaten Jepara, Jawa Tengah 59453', 'label' => 'Alamat', 'group' => 'sekolah'],
            ['key' => 'sekolah_telepon',   'value' => '(0291) 771380',              'label' => 'Nomor Telepon',         'group' => 'sekolah'],
            ['key' => 'sekolah_email',     'value' => 'sdn3krasakbangsri@gmail.com','label' => 'Email',                 'group' => 'sekolah'],
            ['key' => 'sekolah_whatsapp',  'value' => '6281234567890',              'label' => 'Nomor WhatsApp (tanpa +)', 'group' => 'sekolah'],
            ['key' => 'sekolah_instagram', 'value' => 'https://www.instagram.com/sdn3krasakbangsri', 'label' => 'Link Instagram', 'group' => 'sekolah'],
            ['key' => 'sekolah_youtube',   'value' => 'https://youtube.com/@sdnegeri3krasakbangsri786', 'label' => 'Link YouTube', 'group' => 'sekolah'],
            ['key' => 'sekolah_tiktok',    'value' => 'https://www.tiktok.com/@sdn3krasakbangsri', 'label' => 'Link TikTok', 'group' => 'sekolah'],
            ['key' => 'hero_judul',        'value' => 'SD Negeri 3 Krasak Bangsri',  'label' => 'Judul Hero Beranda',   'group' => 'beranda'],
            ['key' => 'hero_subjudul',     'value' => 'Membentuk Generasi Berkarakter, Berprestasi, dan Berakhlak Mulia', 'label' => 'Subjudul Hero', 'group' => 'beranda'],
            ['key' => 'tentang_deskripsi', 'value' => 'Kami berkomitmen untuk memberikan pendidikan terbaik bagi setiap siswa.', 'label' => 'Deskripsi Tentang', 'group' => 'tentang'],
        ];

        foreach ($defaults as $setting) {
            \DB::table('settings')->insert(array_merge($setting, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
