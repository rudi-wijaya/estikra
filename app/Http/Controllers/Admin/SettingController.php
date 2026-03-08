<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // Keys yang berupa file upload
    protected array $fileKeys = ['hero_background', 'hero_background_2', 'hero_background_3', 'sekolah_logo', 'sambutan_foto'];

    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')
            ->where('group', '!=', 'ppdb')
            ->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Handle file uploads
        foreach ($this->fileKeys as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('images', 'public');
                Setting::set($key, 'storage/' . $path);
            }
        }

        // Handle text fields (skip file keys and ppdb keys)
        $data = $request->except(array_merge(['_token', '_method'], $this->fileKeys));
        foreach ($data as $key => $value) {
            if (!str_starts_with($key, 'ppdb_')) {
                Setting::set($key, $value ?? '');
            }
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
