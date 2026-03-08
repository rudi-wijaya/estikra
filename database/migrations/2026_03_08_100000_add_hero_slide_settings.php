<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->insert([
            [
                'key'   => 'hero_background_2',
                'label' => 'Foto Hero Slide 2',
                'value' => null,
                'group' => 'beranda',
            ],
            [
                'key'   => 'hero_background_3',
                'label' => 'Foto Hero Slide 3',
                'value' => null,
                'group' => 'beranda',
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('settings')->whereIn('key', ['hero_background_2', 'hero_background_3'])->delete();
    }
};
