<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        \DB::table('settings')->insertOrIgnore([
            'key'        => 'sekolah_logo',
            'value'      => '',
            'label'      => 'Logo Sekolah',
            'group'      => 'sekolah',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        \DB::table('settings')->where('key', 'sekolah_logo')->delete();
    }
};
