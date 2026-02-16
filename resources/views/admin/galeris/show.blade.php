@extends('layouts.admin')

@section('page_title', 'Detail Foto Galeri')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="h4">{{ $galeri->judul }}</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.galeris.edit', $galeri) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.galeris.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($galeri->gambar)
                <div class="mb-4 text-center">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="img-fluid rounded" style="max-height: 500px;">
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="text-muted small">Tanggal Upload</label>
                    <p class="mb-0"><strong>{{ $galeri->tanggal_upload->format('d F Y') }}</strong></p>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small">Status</label>
                    <p class="mb-0">
                        @if ($galeri->status == 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Nonaktif</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small">Dibuat</label>
                    <p class="mb-0"><strong>{{ $galeri->created_at->format('d F Y H:i') }}</strong></p>
                </div>
            </div>

            @if ($galeri->deskripsi)
                <hr>
                <div class="mb-4">
                    <h5>Deskripsi</h5>
                    <div class="card bg-light">
                        <div class="card-body">
                            {!! nl2br(e($galeri->deskripsi)) !!}
                        </div>
                    </div>
                </div>
            @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('admin.galeris.destroy', $galeri) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus foto ini?')">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('admin.galeris.edit', $galeri) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="{{ route('admin.galeris.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
