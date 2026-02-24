@extends('layouts.admin')

@section('page_title', 'Pengaturan')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h4 mb-0">Pengaturan Website</h2>
            <p class="text-muted small mt-1">Kelola informasi dan konten yang tampil di website</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @php
            $groupLabels = [
                'sekolah' => ['label' => 'Informasi Sekolah', 'icon' => 'bi-building'],
                'beranda' => ['label' => 'Beranda (Hero)', 'icon' => 'bi-house-door'],
                'tentang' => ['label' => 'Halaman Tentang', 'icon' => 'bi-info-circle'],
            ];
        @endphp

        @foreach ($settings as $group => $items)
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi {{ $groupLabels[$group]['icon'] ?? 'bi-gear' }}"></i>
                    <strong>{{ $groupLabels[$group]['label'] ?? ucfirst($group) }}</strong>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @foreach ($items as $setting)
                            <div class="col-12 {{ !in_array($setting->key, ['tentang_visi', 'tentang_misi', 'sekolah_alamat', 'tentang_deskripsi']) ? 'col-md-6' : '' }}">
                                <label class="form-label" for="{{ $setting->key }}">{{ $setting->label }}</label>
                                @if ($setting->key === 'hero_background')
                                    @if ($setting->value)
                                        <div class="mb-2">
                                            <img src="{{ asset($setting->value) }}" alt="Background saat ini" class="img-thumbnail" style="height: 100px; object-fit: cover;">
                                            <small class="d-block text-muted mt-1">Gambar saat ini</small>
                                        </div>
                                    @endif
                                    <input type="file" id="{{ $setting->key }}" name="{{ $setting->key }}" class="form-control" accept="image/*">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                @elseif (in_array($setting->key, ['tentang_visi', 'tentang_misi']) || strlen($setting->value ?? '') > 80 || str_contains(strtolower($setting->label), 'deskripsi') || str_contains(strtolower($setting->label), 'alamat'))
                                    <textarea
                                        id="{{ $setting->key }}"
                                        name="{{ $setting->key }}"
                                        class="form-control"
                                        rows="{{ in_array($setting->key, ['tentang_visi', 'tentang_misi']) ? 8 : 3 }}"
                                    >{{ old($setting->key, $setting->value) }}</textarea>
                                    @if (in_array($setting->key, ['tentang_visi', 'tentang_misi']))
                                        <small class="text-muted">Tulis satu poin per baris. Tekan Enter untuk baris baru.</small>
                                    @endif
                                @else
                                    <input
                                        type="text"
                                        id="{{ $setting->key }}"
                                        name="{{ $setting->key }}"
                                        class="form-control"
                                        value="{{ old($setting->key, $setting->value) }}"
                                    >
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-end mb-4">
            <button type="submit" class="btn btn-primary px-5">
                <i class="bi bi-save me-2"></i>Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
