<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruStaff;
use Illuminate\Http\Request;

class GuruStaffController extends Controller
{
    public function index()
    {
        $guruStaffs = GuruStaff::orderBy('urutan')->orderBy('nama')->get()->groupBy('kategori');
        return view('admin.guru-staffs.index', compact('guruStaffs'));
    }

    public function create()
    {
        return view('admin.guru-staffs.form', ['guruStaff' => new GuruStaff()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'required|string|max:255',
            'kategori'  => 'required|in:kepala_sekolah,guru_kelas,guru_mapel,staff',
            'deskripsi' => 'nullable|string',
            'urutan'    => 'nullable|integer',
            'aktif'     => 'nullable|boolean',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru-staffs', 'public');
        }

        $data['aktif'] = $request->has('aktif') ? 1 : 0;
        $data['urutan'] = $data['urutan'] ?? 0;

        GuruStaff::create($data);
        return redirect()->route('admin.guru-staffs.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(GuruStaff $guruStaff)
    {
        return view('admin.guru-staffs.form', compact('guruStaff'));
    }

    public function update(Request $request, GuruStaff $guruStaff)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'required|string|max:255',
            'kategori'  => 'required|in:kepala_sekolah,guru_kelas,guru_mapel,staff',
            'deskripsi' => 'nullable|string',
            'urutan'    => 'nullable|integer',
            'aktif'     => 'nullable|boolean',
            'foto'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($guruStaff->foto) {
                \Storage::disk('public')->delete($guruStaff->foto);
            }
            $data['foto'] = $request->file('foto')->store('guru-staffs', 'public');
        }

        $data['aktif'] = $request->has('aktif') ? 1 : 0;
        $data['urutan'] = $data['urutan'] ?? 0;

        $guruStaff->update($data);
        return redirect()->route('admin.guru-staffs.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(GuruStaff $guruStaff)
    {
        if ($guruStaff->foto) {
            \Storage::disk('public')->delete($guruStaff->foto);
        }
        $guruStaff->delete();
        return redirect()->route('admin.guru-staffs.index')->with('success', 'Data berhasil dihapus.');
    }
}
