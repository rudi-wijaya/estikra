<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpdbItem;
use App\Models\Setting;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    protected array $settingKeys = [
        'ppdb_tahun_ajaran',
        'ppdb_tanggal',
        'ppdb_jam',
        'ppdb_lokasi',
        'ppdb_lokasi_detail',
        'ppdb_kuota',
        'ppdb_kuota_keterangan',
        'ppdb_syarat_usia',
    ];

    public function index()
    {
        $settings = Setting::whereIn('key', $this->settingKeys)->get()->keyBy('key');
        $dokumen  = PpdbItem::where('type', 'dokumen')->orderBy('urutan')->paginate(10, ['*'], 'dokumen_page');
        $alur     = PpdbItem::where('type', 'alur')->orderBy('urutan')->paginate(10, ['*'], 'alur_page');
        return view('admin.ppdb.index', compact('settings', 'dokumen', 'alur'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->only($this->settingKeys);
        foreach ($data as $key => $value) {
            Setting::set($key, $value ?? '');
        }
        return back()->with('success', 'Pengaturan PPDB berhasil disimpan.');
    }

    public function create()
    {
        $item = new PpdbItem(['type' => request('type', 'dokumen')]);
        return view('admin.ppdb.form', compact('item'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'     => 'required|in:dokumen,alur',
            'judul'    => 'required|string|max:255',
            'deskripsi'=> 'nullable|string|max:1000',
            'icon'     => 'nullable|string|max:100',
            'urutan'   => 'required|integer|min:0',
        ]);

        PpdbItem::create([
            'type'      => $request->type,
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'icon'      => $request->type === 'dokumen' ? $request->icon : null,
            'urutan'    => $request->urutan,
            'aktif'     => $request->boolean('aktif'),
        ]);

        return redirect()->route('admin.ppdb.index')->with('success', 'Item berhasil ditambahkan.');
    }

    public function edit(PpdbItem $ppdb)
    {
        return view('admin.ppdb.form', ['item' => $ppdb]);
    }

    public function update(Request $request, PpdbItem $ppdb)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'icon'      => 'nullable|string|max:100',
            'urutan'    => 'required|integer|min:0',
        ]);

        $ppdb->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'icon'      => $ppdb->type === 'dokumen' ? $request->icon : null,
            'urutan'    => $request->urutan,
            'aktif'     => $request->boolean('aktif'),
        ]);

        return redirect()->route('admin.ppdb.index')->with('success', 'Item berhasil diperbarui.');
    }

    public function destroy(PpdbItem $ppdb)
    {
        $ppdb->delete();
        return back()->with('success', 'Item berhasil dihapus.');
    }
}
