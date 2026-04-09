@extends('layouts.admin')

@section('page_title', isset($guruStaff->id) ? 'Edit Guru/Staff' : 'Tambah Guru/Staff')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h4 mb-0">{{ isset($guruStaff->id) ? 'Edit' : 'Tambah' }} Guru / Staff</h2>
        </div>
        <div class="text-end">
            <a href="{{ route('admin.guru-staffs.index') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($guruStaff->id) ? route('admin.guru-staffs.update', $guruStaff) : route('admin.guru-staffs.store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($guruStaff->id)) @method('PUT') @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row g-3">
                    <!-- Foto -->
                    <div class="col-12 col-md-4 text-center">
                        <label class="form-label d-block">Foto</label>
                        <div id="fotoPreviewWrapper" class="mb-2">
                            @if ($guruStaff->foto)
                                <img id="fotoPreview" src="{{ asset('storage/' . $guruStaff->foto) }}"
                                     class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                            @else
                                <div id="fotoPreview" class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white mx-auto"
                                     style="width:120px;height:120px;font-size:40px;">
                                    {{ substr($guruStaff->nama ?? '?', 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                        <small class="text-muted">Maks. 2MB. Kosongkan jika tidak diubah.</small>
                    </div>

                    <!-- Data -->
                    <div class="col-12 col-md-8">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                       value="{{ old('nama', $guruStaff->nama) }}" required>
                                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                    @foreach (\App\Models\GuruStaff::$kategoriLabels as $val => $label)
                                        @if ($val === 'kepala_sekolah' && ($kepalaSekolahExists ?? false) && ($guruStaff->kategori ?? null) !== 'kepala_sekolah')
                                            @continue
                                        @endif
                                        <option value="{{ $val }}" {{ old('kategori', $guruStaff->kategori) == $val ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @if (($kepalaSekolahExists ?? false) && ($guruStaff->kategori ?? null) !== 'kepala_sekolah')
                                    <small class="text-muted"></small>
                                @endif
                            </div>
                            <div class="col-12">
                                <label class="form-label">Deskripsi Singkat</label>
                                <textarea name="deskripsi" class="form-control" rows="2"
                                          placeholder="cth: Berpengalaman dalam pembelajaran aktif...">{{ old('deskripsi', $guruStaff->deskripsi) }}</textarea>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label">Status Tampil Website <span class="text-danger">*</span></label>
                                <select name="aktif" class="form-select @error('aktif') is-invalid @enderror" required>
                                    <option value="1" {{ (string) old('aktif', (int) ($guruStaff->aktif ?? 1)) === '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ (string) old('aktif', (int) ($guruStaff->aktif ?? 1)) === '0' ? 'selected' : '' }}>Belum Aktif</option>
                                </select>
                                @error('aktif')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mt-4">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.guru-staffs.index') }}" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.getElementById('foto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(ev) {
            const wrapper = document.getElementById('fotoPreviewWrapper');
            wrapper.innerHTML = `<img id="fotoPreview" src="${ev.target.result}"
                class="rounded-circle mx-auto d-block" style="width:120px;height:120px;object-fit:cover;">`;
        };
        reader.readAsDataURL(file);
    });
</script>
@endsection
@endsection
