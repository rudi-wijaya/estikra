<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // Keys yang berupa file upload
    protected array $fileKeys = ['sekolah_logo', 'sambutan_foto'];

    protected function ensureHeroSettingsExist(): void
    {
        $defaults = [
            'hero_background' => 'Foto Hero Slide 1',
            'hero_background_2' => 'Foto Hero Slide 2',
            'hero_background_3' => 'Foto Hero Slide 3',
            'hero_slides' => 'Daftar Foto Hero',
        ];

        foreach ($defaults as $key => $label) {
            Setting::firstOrCreate(
                ['key' => $key],
                [
                    'value' => '',
                    'label' => $label,
                    'group' => 'beranda',
                ]
            );
        }

        $heroSlidesRaw = Setting::get('hero_slides', '');
        if (trim($heroSlidesRaw) === '') {
            $legacySlides = collect([
                Setting::get('hero_background', ''),
                Setting::get('hero_background_2', ''),
                Setting::get('hero_background_3', ''),
            ])->map(fn ($slide) => trim($slide ?? ''))->filter()->values()->all();

            Setting::set('hero_slides', json_encode($legacySlides, JSON_UNESCAPED_SLASHES));
        }
    }

    protected function ensureTentangSettingsExist(): void
    {
        $defaults = [
            'tentang_visi' => 'Visi Sekolah (satu poin per baris)',
            'tentang_misi' => 'Misi Sekolah (satu poin per baris)',
        ];

        foreach ($defaults as $key => $label) {
            Setting::firstOrCreate(
                ['key' => $key],
                [
                    'value' => '',
                    'label' => $label,
                    'group' => 'tentang',
                ]
            );
        }
    }

    protected function ensurePublicSettingsExist(): void
    {
        $defaults = [
            'beranda_stat_1_angka' => [
                'value' => '150+',
                'label' => 'Statistik Beranda 1 - Angka',
                'group' => 'beranda',
            ],
            'beranda_stat_1_label' => [
                'value' => 'Siswa Aktif',
                'label' => 'Statistik Beranda 1 - Label',
                'group' => 'beranda',
            ],
            'beranda_stat_2_angka' => [
                'value' => '10+',
                'label' => 'Statistik Beranda 2 - Angka',
                'group' => 'beranda',
            ],
            'beranda_stat_2_label' => [
                'value' => 'Guru & Staff',
                'label' => 'Statistik Beranda 2 - Label',
                'group' => 'beranda',
            ],
            'beranda_stat_3_angka' => [
                'value' => '6',
                'label' => 'Statistik Beranda 3 - Angka',
                'group' => 'beranda',
            ],
            'beranda_stat_3_label' => [
                'value' => 'Kelas',
                'label' => 'Statistik Beranda 3 - Label',
                'group' => 'beranda',
            ],
            'beranda_stat_4_angka' => [
                'value' => '50+',
                'label' => 'Statistik Beranda 4 - Angka',
                'group' => 'beranda',
            ],
            'beranda_stat_4_label' => [
                'value' => 'Prestasi',
                'label' => 'Statistik Beranda 4 - Label',
                'group' => 'beranda',
            ],
            'sekolah_tagline' => [
                'value' => 'Berkarakter Berprestasi',
                'label' => 'Tagline Sekolah',
                'group' => 'sekolah',
            ],
            'footer_maps_embed' => [
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d559.8102610922303!2d110.75636700555906!3d-6.528610492722258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e71189725f32787%3A0x9d13f4409aad6ce8!2sSD%20Negeri%201%2C%202%20dan%203%20Krasak%20Bangsri!5e1!3m2!1sen!2sid!4v1771315568758!5m2!1sen!2sid',
                'label' => 'Maps Embed URL (Footer)',
                'group' => 'sekolah',
            ],
        ];

        foreach ($defaults as $key => $config) {
            Setting::firstOrCreate(
                ['key' => $key],
                [
                    'value' => $config['value'],
                    'label' => $config['label'],
                    'group' => $config['group'],
                ]
            );
        }
    }

    public function index()
    {
        $this->ensureHeroSettingsExist();
        $this->ensureTentangSettingsExist();
        $this->ensurePublicSettingsExist();

        $settings = Setting::orderBy('group')->orderBy('key')
            ->where('group', '!=', 'ppdb')
            ->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->ensureHeroSettingsExist();
        $this->ensureTentangSettingsExist();
        $this->ensurePublicSettingsExist();

        // Handle hero slides (dynamic list)
        $heroSlides = json_decode(Setting::get('hero_slides', '[]'), true);
        if (!is_array($heroSlides)) {
            $heroSlides = [];
        }
        $heroSlides = array_values(array_filter(array_map(fn ($slide) => trim((string) $slide), $heroSlides)));

        $deletedSlides = $request->input('hero_slides_delete', []);
        if (!is_array($deletedSlides)) {
            $deletedSlides = [];
        }
        $deletedSlides = array_values(array_filter(array_map(fn ($slide) => trim((string) $slide), $deletedSlides)));

        if (!empty($deletedSlides)) {
            foreach ($deletedSlides as $slidePath) {
                if (str_starts_with($slidePath, 'storage/')) {
                    Storage::disk('public')->delete(substr($slidePath, 8));
                }
            }

            $heroSlides = array_values(array_filter(
                $heroSlides,
                fn ($slidePath) => !in_array($slidePath, $deletedSlides, true)
            ));
        }

        if ($request->hasFile('hero_slides_new')) {
            foreach ($request->file('hero_slides_new') as $file) {
                if ($file) {
                    $path = $file->store('images', 'public');
                    $heroSlides[] = 'storage/' . $path;
                }
            }
        }

        Setting::set('hero_slides', json_encode($heroSlides, JSON_UNESCAPED_SLASHES));

        // Keep legacy keys in sync for compatibility
        Setting::set('hero_background', $heroSlides[0] ?? '');
        Setting::set('hero_background_2', $heroSlides[1] ?? '');
        Setting::set('hero_background_3', $heroSlides[2] ?? '');

        // Handle clear existing image
        foreach ($this->fileKeys as $key) {
            if ($request->boolean('clear_' . $key)) {
                $oldPath = Setting::get($key, '');
                if (str_starts_with($oldPath, 'storage/')) {
                    Storage::disk('public')->delete(substr($oldPath, 8));
                }

                Setting::set($key, '');
            }
        }

        // Handle file uploads
        foreach ($this->fileKeys as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('images', 'public');
                Setting::set($key, 'storage/' . $path);
            }
        }

        // Handle combined beranda stat inputs (format: angka|label)
        for ($i = 1; $i <= 4; $i++) {
            $combinedKey = 'beranda_stat_' . $i . '_combined';
            $raw = trim((string) $request->input($combinedKey, ''));
            if ($raw === '') {
                continue;
            }

            $angkaKey = 'beranda_stat_' . $i . '_angka';
            $labelKey = 'beranda_stat_' . $i . '_label';

            $separatorPos = strpos($raw, '|');
            if ($separatorPos !== false) {
                $angka = trim(substr($raw, 0, $separatorPos));
                $label = trim(substr($raw, $separatorPos + 1));
            } else {
                // If separator is omitted, keep previous label and update angka only.
                $angka = $raw;
                $label = Setting::get($labelKey, '');
            }

            Setting::set($angkaKey, $angka);
            Setting::set($labelKey, $label);
        }

        // Handle text fields (skip file keys and ppdb keys)
        $combinedStatKeys = [
            'beranda_stat_1_combined',
            'beranda_stat_2_combined',
            'beranda_stat_3_combined',
            'beranda_stat_4_combined',
        ];

        $data = $request->except(array_merge(['_token', '_method', 'hero_slides_new', 'hero_slides_delete'], $this->fileKeys, $combinedStatKeys));
        foreach ($data as $key => $value) {
            if (
                !str_starts_with($key, 'ppdb_')
                && !str_starts_with($key, 'clear_')
                && !in_array($key, ['hero_background', 'hero_background_2', 'hero_background_3', 'hero_slides'], true)
                && !is_array($value)
            ) {
                Setting::set($key, $value ?? '');
            }
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
