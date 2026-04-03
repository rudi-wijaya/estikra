<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::orderByDesc('created_at')->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'galeri_foto' => 'nullable|array',
            'galeri_foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('programs', 'public');
        }

        if ($request->hasFile('galeri_foto')) {
            $galeriFotoPaths = [];
            foreach ($request->file('galeri_foto') as $file) {
                $galeriFotoPaths[] = $file->store('programs', 'public');
            }
            $validated['galeri_foto'] = $galeriFotoPaths;
        }

        Program::create($validated);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'galeri_foto' => 'nullable|array',
            'galeri_foto.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'hapus_foto' => 'nullable|boolean',
            'hapus_galeri_foto' => 'nullable|array',
            'hapus_galeri_foto.*' => 'string',
        ]);

        $existingGaleriFoto = is_array($program->galeri_foto) ? array_values($program->galeri_foto) : [];

        if ($request->boolean('hapus_foto') && $program->foto) {
            $this->deleteFromPublicDisk($program->foto);
            $validated['foto'] = null;
        }

        $hapusGaleriFoto = $request->input('hapus_galeri_foto', []);
        if (is_array($hapusGaleriFoto) && count($hapusGaleriFoto)) {
            foreach ($hapusGaleriFoto as $foto) {
                if (in_array($foto, $existingGaleriFoto, true)) {
                    $this->deleteFromPublicDisk($foto);
                }
            }

            $existingGaleriFoto = array_values(array_filter(
                $existingGaleriFoto,
                fn ($foto) => !in_array($foto, $hapusGaleriFoto, true)
            ));
        }

        if ($request->hasFile('foto')) {
            if ($program->foto) {
                $this->deleteFromPublicDisk($program->foto);
            }
            $validated['foto'] = $request->file('foto')->store('programs', 'public');
        }

        if ($request->hasFile('galeri_foto')) {
            foreach ($request->file('galeri_foto') as $file) {
                $existingGaleriFoto[] = $file->store('programs', 'public');
            }
        }

        $validated['galeri_foto'] = $existingGaleriFoto;
        unset($validated['hapus_foto'], $validated['hapus_galeri_foto']);

        $program->update($validated);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        if ($program->foto) {
            $this->deleteFromPublicDisk($program->foto);
        }

        $galeriFoto = is_array($program->galeri_foto) ? $program->galeri_foto : [];
        foreach ($galeriFoto as $foto) {
            if ($foto) {
                $this->deleteFromPublicDisk($foto);
            }
        }

        $program->delete();

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dihapus');
    }

    private function deleteFromPublicDisk(string $path): void
    {
        $normalized = ltrim($path, '/');
        if (str_starts_with($normalized, 'storage/')) {
            $normalized = substr($normalized, 8);
        }

        if ($normalized !== '' && Storage::disk('public')->exists($normalized)) {
            Storage::disk('public')->delete($normalized);
        }
    }
}
