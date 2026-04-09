<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuruStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruStaffController extends Controller
{
    public function index()
    {
        $guruStaffs = GuruStaff::orderedByKategori()->get();
        $groupedGuruStaffs = $guruStaffs->groupBy('kategori');

        return view('admin.guru-staffs.index', compact('guruStaffs', 'groupedGuruStaffs'));
    }

    public function create()
    {
        $guruStaff = new GuruStaff();
        $kepalaSekolahExists = GuruStaff::where('kategori', 'kepala_sekolah')->exists();

        return view('admin.guru-staffs.form', compact('guruStaff', 'kepalaSekolahExists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'nullable|string|max:255',
            'kategori'  => 'required|in:kepala_sekolah,guru_kelas,guru_mapel,staff',
            'deskripsi' => 'nullable|string',
            'aktif'     => 'required|boolean',
            'foto'      => 'nullable|image|max:2048',
        ]);

        $data['jabatan'] = $data['jabatan'] ?: (GuruStaff::$kategoriLabels[$data['kategori']] ?? 'Guru / Staff');

        if ($data['kategori'] === 'kepala_sekolah' && GuruStaff::where('kategori', 'kepala_sekolah')->exists()) {
            return back()
                ->withInput()
                ->with('error', 'Kepala Sekolah sudah ada. Gunakan menu edit untuk mengganti data yang ada.');
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru-staffs', 'public');
        }

        $data['aktif'] = $request->boolean('aktif');

        GuruStaff::create($data);
        return redirect()->route('admin.guru-staffs.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(GuruStaff $guruStaff)
    {
        $kepalaSekolahExists = GuruStaff::where('kategori', 'kepala_sekolah')
            ->where('id', '!=', $guruStaff->id)
            ->exists();

        return view('admin.guru-staffs.form', compact('guruStaff', 'kepalaSekolahExists'));
    }

    public function update(Request $request, GuruStaff $guruStaff)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'jabatan'   => 'nullable|string|max:255',
            'kategori'  => 'required|in:kepala_sekolah,guru_kelas,guru_mapel,staff',
            'deskripsi' => 'nullable|string',
            'aktif'     => 'required|boolean',
            'foto'      => 'nullable|image|max:2048',
        ]);

        $data['jabatan'] = $data['jabatan'] ?: (GuruStaff::$kategoriLabels[$data['kategori']] ?? 'Guru / Staff');

        if (
            $data['kategori'] === 'kepala_sekolah'
            && GuruStaff::where('kategori', 'kepala_sekolah')->where('id', '!=', $guruStaff->id)->exists()
        ) {
            return back()
                ->withInput()
                ->with('error', 'Kepala Sekolah hanya boleh 1 data. Silakan edit data Kepala Sekolah yang sudah ada.');
        }

        if ($request->hasFile('foto')) {
            if ($guruStaff->foto) {
                Storage::disk('public')->delete($guruStaff->foto);
            }
            $data['foto'] = $request->file('foto')->store('guru-staffs', 'public');
        }

        $data['aktif'] = $request->boolean('aktif');

        $guruStaff->update($data);
        return redirect()->route('admin.guru-staffs.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function updateStatus(Request $request, GuruStaff $guruStaff)
    {
        $validated = $request->validate([
            'aktif' => 'required|boolean',
        ]);

        $guruStaff->update([
            'aktif' => (bool) $validated['aktif'],
        ]);

        return redirect()->back()->with('success', 'Status guru/staff berhasil diperbarui.');
    }

    public function destroy(GuruStaff $guruStaff)
    {
        if ($guruStaff->kategori === 'kepala_sekolah') {
            return redirect()
                ->route('admin.guru-staffs.index')
                ->with('error', 'Data Kepala Sekolah tidak dapat dihapus. Gunakan fitur edit untuk mengganti.');
        }

        if ($guruStaff->foto) {
            Storage::disk('public')->delete($guruStaff->foto);
        }
        $guruStaff->delete();
        return redirect()->route('admin.guru-staffs.index')->with('success', 'Data berhasil dihapus.');
    }
}
