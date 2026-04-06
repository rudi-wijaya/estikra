<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $beritas = Berita::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('judul', 'like', '%' . $search . '%')
                        ->orWhere('konten', 'like', '%' . $search . '%')
                        ->orWhere('status', 'like', '%' . $search . '%')
                        ->orWhereDate('tanggal_terbit', $search);
                });
            })
            ->orderBy('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.beritas.index', compact('beritas', 'search'));
    }

    public function create()
    {
        return view('admin.beritas.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_terbit' => 'required|date',
            'status' => 'required|in:draft,published,archived',
            'tambah_ke_prestasi' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('beritas', 'public');
        }

        $berita = Berita::create($validated);

        $prestasiDibuat = $this->syncPrestasiFromBerita($berita, $request->boolean('tambah_ke_prestasi'));

        $message = 'Berita berhasil ditambahkan';
        if ($prestasiDibuat) {
            $message .= ' dan ditambahkan ke Prestasi';
        }

        Prestasi::refreshUrutanByTanggalTahun();

        return redirect()->route('admin.beritas.index')->with('success', $message);
    }

    public function show(Berita $berita)
    {
        return view('admin.beritas.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        $berita->load('prestasi');
        return view('admin.beritas.form', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_terbit' => 'required|date',
            'status' => 'required|in:draft,published,archived',
            'tambah_ke_prestasi' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(storage_path('app/public/' . $berita->gambar))) {
                unlink(storage_path('app/public/' . $berita->gambar));
            }
            $validated['gambar'] = $request->file('gambar')->store('beritas', 'public');
        }

        $berita->update($validated);

        $pilihPrestasi = $request->boolean('tambah_ke_prestasi');
        $prestasiDibuat = $this->syncPrestasiFromBerita($berita, $pilihPrestasi);

        $message = 'Berita berhasil diupdate';
        if ($prestasiDibuat) {
            $message .= ' dan ditambahkan ke Prestasi';
        } elseif (! $pilihPrestasi) {
            $message .= '. Status diubah menjadi bukan Prestasi';
        }

        Prestasi::refreshUrutanByTanggalTahun();

        return redirect()->route('admin.beritas.index')->with('success', $message);
    }

    public function destroy(Berita $berita)
    {
        $berita->load('prestasi');

        if ($berita->prestasi) {
            if ($berita->prestasi->foto && $berita->prestasi->foto !== $berita->gambar && file_exists(storage_path('app/public/' . $berita->prestasi->foto))) {
                unlink(storage_path('app/public/' . $berita->prestasi->foto));
            }
            $berita->prestasi->delete();
        }

        if ($berita->gambar && file_exists(storage_path('app/public/' . $berita->gambar))) {
            unlink(storage_path('app/public/' . $berita->gambar));
        }

        $berita->delete();
        Prestasi::refreshUrutanByTanggalTahun();

        return redirect()->route('admin.beritas.index')->with('success', 'Berita berhasil dihapus');
    }

    private function syncPrestasiFromBerita(Berita $berita, bool $isPrestasi): bool
    {
        $berita->loadMissing('prestasi');

        $prestasi = $berita->prestasi;
        $prestasiDibuat = false;

        if (! $isPrestasi) {
            if ($prestasi) {
                $prestasi->delete();
            }

            return false;
        }

        if (! $prestasi) {
            $prestasi = new Prestasi();
            $prestasi->berita_id = $berita->id;
            $prestasi->urutan = 0;
            $prestasiDibuat = true;
        }

        $prestasi->judul = $berita->judul;
        $prestasi->keterangan = Str::limit(strip_tags($berita->konten), 500);
        $prestasi->tahun = $berita->tanggal_terbit?->format('Y');
        $prestasi->foto = $berita->gambar;
        $prestasi->status = $berita->status === 'published' ? 'aktif' : 'nonaktif';
        $prestasi->save();

        return $prestasiDibuat;
    }
}
