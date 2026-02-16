@extends('layouts.admin')

@section('page_title', isset($galeri) ? 'Edit Foto Galeri' : 'Tambah Foto Galeri')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="h4">{{ isset($galeri) ? 'Edit Foto Galeri' : 'Tambah Foto Galeri Baru' }}</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.galeris.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Error!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($galeri) ? route('admin.galeris.update', $galeri) : route('admin.galeris.store') }}" 
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($galeri))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Foto <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                           id="judul" name="judul" value="{{ old('judul', $galeri->judul ?? '') }}" required>
                    @error('judul')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                              id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal_upload" class="form-label">Tanggal Upload <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal_upload') is-invalid @enderror" 
                                   id="tanggal_upload" name="tanggal_upload" 
                                   value="{{ old('tanggal_upload', isset($galeri) ? $galeri->tanggal_upload->format('Y-m-d') : '') }}" required>
                            @error('tanggal_upload')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="aktif" {{ old('status', $galeri->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $galeri->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar {{ isset($galeri) ? '' : '<span class="text-danger">*</span>' }}</label>
                    @if (isset($galeri) && $galeri->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="img-thumbnail" style="max-width: 300px; max-height: 300px;">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                           id="gambar" name="gambar" accept="image/*" {{ isset($galeri) ? '' : 'required' }}>
                    <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF. Max: 2MB</small>
                    @error('gambar')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('admin.galeris.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> {{ isset($galeri) ? 'Update' : 'Tambah' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
