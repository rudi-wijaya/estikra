@extends('layouts.admin')

@section('page_title', 'Detail Berita')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="h4">{{ $berita->judul }}</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.beritas.edit', $berita) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('admin.beritas.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($berita->gambar)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid rounded">
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="text-muted small">Tanggal Terbit</label>
                    <p class="mb-0"><strong>{{ $berita->tanggal_terbit->format('d F Y') }}</strong></p>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small">Status</label>
                    <p class="mb-0">
                        @if ($berita->status == 'published')
                            <span class="badge bg-success">Published</span>
                        @elseif ($berita->status == 'draft')
                            <span class="badge bg-warning">Draft</span>
                        @else
                            <span class="badge bg-danger">Archived</span>
                        @endif
                    </p>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small">Dibuat</label>
                    <p class="mb-0"><strong>{{ $berita->created_at->format('d F Y H:i') }}</strong></p>
                </div>
            </div>

            <hr>

            <div class="mb-4">
                <h5>Konten</h5>
                <div class="card bg-light">
                    <div class="card-body">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('admin.beritas.destroy', $berita) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus berita ini?')">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
                <a href="{{ route('admin.beritas.edit', $berita) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="{{ route('admin.beritas.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
