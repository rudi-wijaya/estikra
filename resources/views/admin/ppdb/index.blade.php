@extends('layouts.admin')

@section('page_title', 'PPDB')

@section('content')
<div class="container-fluid">

    {{-- Header --}}
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h4 mb-0">Kelola PPDB</h2>
            <p class="text-muted small mt-1">Atur informasi, persyaratan, dan alur pendaftaran peserta didik baru</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ============================================================
         SECTION 1 : Pengaturan Umum
    ============================================================ --}}
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center gap-2">
            <i class="bi bi-sliders"></i>
            <strong>Pengaturan Umum PPDB</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.ppdb.settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="ppdb_tahun_ajaran" name="ppdb_tahun_ajaran"
                            value="{{ $settings['ppdb_tahun_ajaran']->value ?? '2026/2027' }}"
                            placeholder="contoh: 2026/2027">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_tanggal">Tanggal Pendaftaran</label>
                        <input type="text" class="form-control" id="ppdb_tanggal" name="ppdb_tanggal"
                            value="{{ $settings['ppdb_tanggal']->value ?? '' }}"
                            placeholder="contoh: 1 Juni – 14 Juni 2026">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_jam">Jam Pendaftaran</label>
                        <input type="text" class="form-control" id="ppdb_jam" name="ppdb_jam"
                            value="{{ $settings['ppdb_jam']->value ?? '' }}"
                            placeholder="contoh: Senin – Sabtu, 08.00 – 13.00 WIB">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_lokasi">Tempat Pendaftaran</label>
                        <input type="text" class="form-control" id="ppdb_lokasi" name="ppdb_lokasi"
                            value="{{ $settings['ppdb_lokasi']->value ?? '' }}"
                            placeholder="contoh: Ruang Tata Usaha">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="ppdb_lokasi_detail">Detail Lokasi</label>
                        <input type="text" class="form-control" id="ppdb_lokasi_detail" name="ppdb_lokasi_detail"
                            value="{{ $settings['ppdb_lokasi_detail']->value ?? '' }}"
                            placeholder="contoh: SD Negeri 3 Krasak, Jl. Raya Krasak No. 45">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_kuota">Kuota Penerimaan</label>
                        <input type="text" class="form-control" id="ppdb_kuota" name="ppdb_kuota"
                            value="{{ $settings['ppdb_kuota']->value ?? '' }}"
                            placeholder="contoh: 28 Siswa Baru">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_kuota_keterangan">Keterangan Kuota</label>
                        <input type="text" class="form-control" id="ppdb_kuota_keterangan" name="ppdb_kuota_keterangan"
                            value="{{ $settings['ppdb_kuota_keterangan']->value ?? '' }}"
                            placeholder="contoh: Kelas 1 Tahun Ajaran 2026/2027">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="ppdb_syarat_usia">
                            Syarat Usia
                            <small class="text-muted fw-normal">(satu syarat per baris)</small>
                        </label>
                        <textarea class="form-control" id="ppdb_syarat_usia" name="ppdb_syarat_usia" rows="4"
                            placeholder="Berusia 7 tahun wajib diterima (prioritas utama)&#10;Berusia 6 tahun dapat diterima jika kuota masih tersedia">{{ $settings['ppdb_syarat_usia']->value ?? '' }}</textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ============================================================
         SECTION 2 : Persyaratan Dokumen
    ============================================================ --}}
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-check"></i>
                <strong>Persyaratan Dokumen</strong>
                <span class="badge bg-secondary">{{ $dokumen->count() }}</span>
            </div>
            <a href="{{ route('admin.ppdb.create', ['type' => 'dokumen']) }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Dokumen
            </a>
        </div>
        <div class="card-body p-0">
            @if ($dokumen->isEmpty())
                <p class="text-muted text-center py-4">Belum ada item dokumen.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width:60px">Urutan</th>
                                <th style="width:50px">Icon</th>
                                <th>Judul</th>
                                <th class="d-none d-md-table-cell">Deskripsi</th>
                                <th style="width:90px">Status</th>
                                <th style="width:110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumen as $item)
                                <tr>
                                    <td class="text-center fw-semibold">{{ $item->urutan }}</td>
                                    <td class="text-center">
                                        <i class="bi {{ $item->icon ?: 'bi-file-earmark' }} fs-5 text-primary"></i>
                                    </td>
                                    <td class="fw-semibold">{{ $item->judul }}</td>
                                    <td class="d-none d-md-table-cell text-muted small">{{ Str::limit($item->deskripsi, 80) }}</td>
                                    <td>
                                        @if ($item->aktif)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.ppdb.edit', $item) }}" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.ppdb.destroy', $item) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Hapus item ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    {{-- ============================================================
         SECTION 3 : Alur Pendaftaran
    ============================================================ --}}
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-list-ol"></i>
                <strong>Alur Pendaftaran</strong>
                <span class="badge bg-secondary">{{ $alur->count() }}</span>
            </div>
            <a href="{{ route('admin.ppdb.create', ['type' => 'alur']) }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Langkah
            </a>
        </div>
        <div class="card-body p-0">
            @if ($alur->isEmpty())
                <p class="text-muted text-center py-4">Belum ada langkah alur pendaftaran.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width:60px">Urutan</th>
                                <th>Judul Langkah</th>
                                <th class="d-none d-md-table-cell">Deskripsi</th>
                                <th style="width:90px">Status</th>
                                <th style="width:110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alur as $step)
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-indigo" style="background-color:#6366f1;font-size:.85rem;width:28px;height:28px;line-height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;">
                                            {{ $step->urutan }}
                                        </span>
                                    </td>
                                    <td class="fw-semibold">{{ $step->judul }}</td>
                                    <td class="d-none d-md-table-cell text-muted small">{{ Str::limit($step->deskripsi, 80) }}</td>
                                    <td>
                                        @if ($step->aktif)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.ppdb.edit', $step) }}" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.ppdb.destroy', $step) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Hapus langkah ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
