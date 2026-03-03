<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        \DB::table('settings')->insertOrIgnore([
            'key'        => 'sambutan_foto',
            'value'      => '',
            'label'      => 'Foto Kepala Sekolah (Sambutan)',
            'group'      => 'beranda',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        \DB::table('settings')->where('key', 'sambutan_foto')->delete();
    }
};
