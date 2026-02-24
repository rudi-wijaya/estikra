<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingVisiMisiSeeder extends Seeder
{
    public function run(): void
    {
        $visi = implode("\n", [
            'Terwujudnya lulusan yang unggul dalam iman dan taqwa',
            'Terwujudnya lulusan yang kompeten dan berprestasi yang membanggakan',
            'Terwujudnya Kurikulum berwawasan karakter Profil Pelajar Pancasila dan lingkungan',
            'Terwujudnya PBM yang efektif, efisien, dan inovatif',
            'Terwujudnya warga sekolah yang berkarakter jujur, mandiri, gotong royong, percaya diri, bernalar kritis, kreatif, dan menghargai kebhinekaan',
            'Terwujudnya standar pengelolaan dan manajemen sekolah sesuai ketentuan',
            'Merwujudnya budaya sekolah sahabat keluarga dan lingkungan yang nyaman, aman, rindang, asri dan bersih dalam penyelengaraan pendidikan yang berkualitas',
        ]);

        $misi = implode("\n", [
            'Menumbuh kembangkkan pengamalam ajaran agama sesuai dengan agama dan kepercayaan masing-masing',
            'Menciptakan insan yang unggul dalam IPTEK dan mampu berdaya saing',
            'Melaksanakan pembelajaran yang aktiif, kreatif, inovatif yang menghasilkan peserta didik yang berkarya, bernalar kritis, dan mandiri',
            'Menumbuhkan warga sekolah yang berkarakter jujur, disiplin, percaya diri, sopan santun, menghargai kebhinekaya dalam bertindak',
        ]);

        DB::table('settings')->insert([
            [
                'key'        => 'tentang_visi',
                'value'      => $visi,
                'label'      => 'Visi Sekolah (satu poin per baris)',
                'group'      => 'tentang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key'        => 'tentang_misi',
                'value'      => $misi,
                'label'      => 'Misi Sekolah (satu poin per baris)',
                'group'      => 'tentang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
