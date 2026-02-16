@extends('layouts.admin')

@section('page_title', 'Kelola Galeri')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="h4">Daftar Galeri Foto</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.galeris.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Foto
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse ($galeris as $galeri)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($galeri->gambar)
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" class="card-img-top" alt="{{ $galeri->judul }}" style="height: 250px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="bi bi-image" style="font-size: 3rem; color: #ccc;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeri->judul }}</h5>
                        <p class="card-text small text-muted">{{ Str::limit($galeri->deskripsi, 100) }}</p>
                        <div class="small mb-3">
                            <span class="badge bg-primary">{{ $galeri->tanggal_upload->format('d M Y') }}</span>
                            @if ($galeri->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="btn-group btn-group-sm w-100" role="group">
                            <a href="{{ route('admin.galeris.show', $galeri) }}" class="btn btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.galeris.edit', $galeri) }}" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.galeris.destroy', $galeri) }}" method="POST" style="flex: 1;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Yakin hapus foto ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card text-center py-5">
                    <p class="text-muted mb-0">Tidak ada foto galeri</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $galeris->links() }}
    </div>
</div>
@endsection
