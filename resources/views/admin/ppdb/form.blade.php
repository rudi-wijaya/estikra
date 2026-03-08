@extends('layouts.admin')

@section('page_title', ($item->exists ? 'Edit' : 'Tambah') . ' Item PPDB')

@section('content')
<div class="container-fluid">

    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h4 mb-0">
                {{ $item->exists ? 'Edit' : 'Tambah' }}
                {{ $item->type === 'alur' ? 'Langkah Alur Pendaftaran' : 'Persyaratan Dokumen' }}
            </h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.ppdb.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ $item->exists ? route('admin.ppdb.update', $item) : route('admin.ppdb.store') }}"
                  method="POST">
                @csrf
                @if ($item->exists)
                    @method('PUT')
                @endif

                {{-- Type (hidden if edit, visible if create) --}}
                @if ($item->exists)
                    <input type="hidden" name="type" value="{{ $item->type }}">
                @else
                    <div class="mb-3">
                        <label class="form-label">Jenis Item <span class="text-danger">*</span></label>
                        <select class="form-select @error('type') is-invalid @enderror" name="type" id="type_select">
                            <option value="dokumen" {{ old('type', $item->type) === 'dokumen' ? 'selected' : '' }}>
                                Persyaratan Dokumen
                            </option>
                            <option value="alur" {{ old('type', $item->type) === 'alur' ? 'selected' : '' }}>
                                Langkah Alur Pendaftaran
                            </option>
                        </select>
                        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label" for="judul">
                        Judul <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           class="form-control @error('judul') is-invalid @enderror"
                           id="judul" name="judul"
                           value="{{ old('judul', $item->judul) }}"
                           placeholder="{{ $item->type === 'alur' ? 'contoh: Ambil Formulir' : 'contoh: Akta Kelahiran' }}"
                           required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                              id="deskripsi" name="deskripsi" rows="3"
                              placeholder="Penjelasan singkat...">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                {{-- Icon field (only for dokumen) --}}
                <div class="mb-3 {{ ($item->type === 'alur' && $item->exists) ? 'd-none' : '' }}" id="icon_field">
                    <label class="form-label" for="icon">
                        Icon
                        <small class="text-muted fw-normal">
                            — nama class Bootstrap Icons, contoh: <code>bi-file-earmark-text-fill</code>
                        </small>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi {{ old('icon', $item->icon) ?: 'bi-file-earmark' }} fs-5" id="icon_preview"></i>
                        </span>
                        <input type="text"
                               class="form-control @error('icon') is-invalid @enderror"
                               id="icon" name="icon"
                               value="{{ old('icon', $item->icon) }}"
                               placeholder="bi-file-earmark-text-fill">
                        @error('icon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <small class="text-muted">Cari icon di
                        <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener">icons.getbootstrap.com</a>
                    </small>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="urutan">
                            Urutan <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               class="form-control @error('urutan') is-invalid @enderror"
                               id="urutan" name="urutan"
                               value="{{ old('urutan', $item->urutan ?? 0) }}"
                               min="0" required>
                        @error('urutan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="text-muted">Angka lebih kecil tampil lebih atas.</small>
                    </div>
                    <div class="col-md-4 d-flex align-items-end pb-1">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                   id="aktif" name="aktif" value="1"
                                   {{ old('aktif', $item->aktif ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="aktif">Tampilkan di website</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        {{ $item->exists ? 'Simpan Perubahan' : 'Tambah Item' }}
                    </button>
                    <a href="{{ route('admin.ppdb.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    // Live icon preview
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('icon_preview');
    if (iconInput && iconPreview) {
        iconInput.addEventListener('input', function () {
            iconPreview.className = 'bi ' + (this.value.trim() || 'bi-file-earmark') + ' fs-5';
        });
    }

    // Show/hide icon field when type changes (create mode)
    const typeSelect = document.getElementById('type_select');
    const iconField  = document.getElementById('icon_field');
    if (typeSelect && iconField) {
        typeSelect.addEventListener('change', function () {
            iconField.classList.toggle('d-none', this.value === 'alur');
        });
    }
</script>
@endsection
