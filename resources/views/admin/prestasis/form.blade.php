@extends('layouts.admin')

@section('page_title', isset($prestasi) ? 'Edit Prestasi' : 'Tambah Prestasi')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="h4">{{ isset($prestasi) ? 'Edit Prestasi' : 'Tambah Prestasi Baru' }}</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.prestasis.index') }}" class="btn btn-primary">
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
            <form action="{{ isset($prestasi) ? route('admin.prestasis.update', $prestasi) : route('admin.prestasis.store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($prestasi))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Prestasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                           id="judul" name="judul" value="{{ old('judul', $prestasi->judul ?? '') }}" required>
                    @error('judul')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror"
                              id="keterangan" name="keterangan" rows="4">{{ old('keterangan', $prestasi->keterangan ?? '') }}</textarea>
                    @error('keterangan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                                   id="tahun" name="tahun" value="{{ old('tahun', $prestasi->tahun ?? '') }}" placeholder="2026">
                            @error('tahun')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="urutan" class="form-label">Urutan</label>
                            <input type="number" min="0" class="form-control @error('urutan') is-invalid @enderror"
                                   id="urutan" name="urutan" value="{{ old('urutan', $prestasi->urutan ?? 0) }}">
                            @error('urutan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="aktif" {{ old('status', $prestasi->status ?? 'aktif') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $prestasi->status ?? '') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Prestasi</label>
                    @if (isset($prestasi) && $prestasi->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="{{ $prestasi->judul }}" class="img-thumbnail" style="max-width: 280px; max-height: 220px; object-fit: cover;">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                    <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Max: 5MB</small>
                    @error('foto')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('admin.prestasis.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> {{ isset($prestasi) ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
