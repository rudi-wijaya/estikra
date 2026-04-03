@extends('layouts.admin')

@section('page_title', 'Kelola Prestasi')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-8 col-md-6">
            <h2 class="h4">Daftar Prestasi</h2>
        </div>
        <div class="col-4 col-md-6 text-end">
            <a href="{{ route('admin.settings.tentang.index') }}" class="btn btn-secondary me-2">
                <i class="bi bi-arrow-left"></i> <span class="d-none d-sm-inline">Kembali</span>
            </a>
            <a href="{{ route('admin.prestasis.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Tambah Prestasi</span>
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="d-none d-md-table-cell" style="width: 50px">ID</th>
                        <th>Prestasi</th>
                        <th class="d-none d-sm-table-cell" style="width: 80px">Tahun</th>
                        <th class="d-none d-sm-table-cell" style="width: 80px">Urutan</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prestasis as $prestasi)
                        <tr>
                            <td class="d-none d-md-table-cell">{{ $prestasi->id }}</td>
                            <td>
                                <strong class="d-block" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 220px;">{{ $prestasi->judul }}</strong>
                                <small class="text-muted d-none d-md-block">{{ \Illuminate\Support\Str::limit($prestasi->keterangan, 80) }}</small>
                            </td>
                            <td class="d-none d-sm-table-cell">{{ $prestasi->tahun ?: '-' }}</td>
                            <td class="d-none d-sm-table-cell">{{ $prestasi->urutan }}</td>
                            <td>
                                @if ($prestasi->status === 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.prestasis.edit', $prestasi) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.prestasis.destroy', $prestasi) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus prestasi ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Belum ada data prestasi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($prestasis->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $prestasis->links() }}
        </div>
    @endif
</div>
@endsection
