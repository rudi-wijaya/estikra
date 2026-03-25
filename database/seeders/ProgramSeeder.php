<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'judul' => 'Literasi',
            'deskripsi' => 'Program pembiasaan membaca dan menulis setiap hari untuk meningkatkan kemampuan literasi siswa sejak dini secara menyenangkan.',
            'foto' => null,
        ]);

        Program::create([
            'judul' => 'Sholat Dhuha',
            'deskripsi' => 'Pembiasaan sholat dhuha berjamaah setiap pagi sebagai bentuk penguatan karakter spiritual dan kedisiplinan siswa dalam kehidupan sehari-hari.',
            'foto' => null,
        ]);

        Program::create([
            'judul' => 'Pentaque',
            'deskripsi' => 'Olahraga pentaque sebagai program unggulan untuk melatih konsentrasi, strategi, dan sportivitas siswa dalam kompetisi tingkat daerah maupun nasional.',
            'foto' => null,
        ]);
    }
}
