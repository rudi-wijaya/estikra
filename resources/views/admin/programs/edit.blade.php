@extends('layouts.admin')

@section('page_title', 'Edit Program Unggulan')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="h4">Edit Program Unggulan</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">
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
            <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Program <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                           id="judul" name="judul" value="{{ old('judul', $program->judul) }}" required>
                    @error('judul')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                              id="deskripsi" name="deskripsi" rows="6" required>{{ old('deskripsi', $program->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Program</label>
                    @if ($program->foto)
                        <div class="mb-2">
                            @php
                                $fotoUtamaPath = ltrim((string) $program->foto, '/');
                                $fotoUtamaUrl = str_starts_with($fotoUtamaPath, 'storage/') ? asset($fotoUtamaPath) : asset('storage/' . $fotoUtamaPath);
                            @endphp
                            <img src="{{ $fotoUtamaUrl }}" alt="{{ $program->judul }}" class="img-thumbnail" style="max-width: 200px;">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="hapus_foto" name="hapus_foto" value="1" {{ old('hapus_foto') ? 'checked' : '' }}>
                                <label class="form-check-label text-danger" for="hapus_foto">
                                    Hapus foto utama
                                </label>
                            </div>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                           id="foto" name="foto" accept="image/*">
                    <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF. Max: 5MB (Kosongkan jika tidak ingin mengubah foto)</small>
                    @error('foto')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="galeri_foto" class="form-label">Tambah Gambar Lainnya</label>
                    @if (is_array($program->galeri_foto) && count($program->galeri_foto))
                        @php $hapusLama = old('hapus_galeri_foto', []); @endphp
                        <div class="mb-2 d-flex flex-wrap gap-3">
                            @foreach ($program->galeri_foto as $foto)
                                @php
                                    $fotoPath = ltrim((string) $foto, '/');
                                    $fotoUrl = str_starts_with($fotoPath, 'storage/') ? asset($fotoPath) : asset('storage/' . $fotoPath);
                                @endphp
                                <label class="d-flex flex-column align-items-center" style="cursor:pointer;">
                                    <img src="{{ $fotoUrl }}" alt="Gambar tambahan {{ $program->judul }}" class="img-thumbnail" style="width: 96px; height: 96px; object-fit: cover;">
                                    <span class="form-check mt-2 mb-0">
                                        <input class="form-check-input" type="checkbox" name="hapus_galeri_foto[]" value="{{ $foto }}" {{ in_array($foto, $hapusLama, true) ? 'checked' : '' }}>
                                        <span class="form-check-label text-danger small">Hapus</span>
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" class="form-control @error('galeri_foto') is-invalid @enderror @error('galeri_foto.*') is-invalid @enderror"
                           id="galeri_foto" name="galeri_foto[]" accept="image/*" multiple>
                    <small class="form-text text-muted">Bisa pilih lebih dari satu gambar. Gambar baru akan ditambahkan ke daftar lama.</small>
                    @error('galeri_foto')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    @error('galeri_foto.*')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('admin.programs.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Program
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
