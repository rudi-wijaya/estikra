<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::orderBy('tanggal_upload', 'desc')->paginate(12);
        return view('admin.galeris.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeris.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_upload' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['gambar'] = $request->file('gambar')->store('galeris', 'public');

        Galeri::create($validated);

        return redirect()->route('admin.galeris.index')->with('success', 'Foto galeri berhasil ditambahkan');
    }

    public function show(Galeri $galeri)
    {
        return view('admin.galeris.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeris.form', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_upload' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && file_exists(storage_path('app/public/' . $galeri->gambar))) {
                unlink(storage_path('app/public/' . $galeri->gambar));
            }
            $validated['gambar'] = $request->file('gambar')->store('galeris', 'public');
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeris.index')->with('success', 'Foto galeri berhasil diupdate');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar && file_exists(storage_path('app/public/' . $galeri->gambar))) {
            unlink(storage_path('app/public/' . $galeri->gambar));
        }

        $galeri->delete();

        return redirect()->route('admin.galeris.index')->with('success', 'Foto galeri berhasil dihapus');
    }
}
