<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $prestasis = Prestasi::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('judul', 'like', '%' . $search . '%')
                        ->orWhere('keterangan', 'like', '%' . $search . '%')
                        ->orWhere('tahun', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('urutan')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.prestasis.index', compact('prestasis', 'search'));
    }

    public function create()
    {
        return view('admin.prestasis.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tahun' => 'nullable|string|max:10',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('prestasis', 'public');
        }

        Prestasi::create($validated);
        Prestasi::refreshUrutanByTanggalTahun();

        return redirect()->route('admin.prestasis.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasis.form', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'tahun' => 'nullable|string|max:10',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'required|in:aktif,nonaktif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            if ($prestasi->foto && file_exists(storage_path('app/public/' . $prestasi->foto))) {
                unlink(storage_path('app/public/' . $prestasi->foto));
            }
            $validated['foto'] = $request->file('foto')->store('prestasis', 'public');
        }

        $prestasi->update($validated);
        Prestasi::refreshUrutanByTanggalTahun();

        return redirect()->route('admin.prestasis.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->foto && file_exists(storage_path('app/public/' . $prestasi->foto))) {
            unlink(storage_path('app/public/' . $prestasi->foto));
        }

        $prestasi->delete();
        Prestasi::refreshUrutanByTanggalTahun();

        return redirect()->route('admin.prestasis.index')->with('success', 'Prestasi berhasil dihapus');
    }
}
