<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // Keys yang berupa file upload
    protected array $fileKeys = ['hero_background'];

    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')->get()->groupBy('group');
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

        // Handle text fields (skip file keys)
        $data = $request->except(array_merge(['_token', '_method'], $this->fileKeys));
        foreach ($data as $key => $value) {
            Setting::set($key, $value ?? '');
        }

        return back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}
