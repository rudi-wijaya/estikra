@extends('layouts.admin')

@section('page_title', isset($user) ? 'Edit User' : 'Tambah User')

@section('content')
    <div class="page-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">{{ isset($user) ? 'Edit User' : 'Tambah User Baru' }}</h1>
                <p class="page-subtitle">{{ isset($user) ? 'Perbarui informasi user' : 'Isi form di bawah untuk menambah user baru' }}</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-{{ isset($user) ? 'pencil' : 'plus-circle' }} me-2"></i>
                    {{ isset($user) ? 'Edit' : 'Form Tambah User' }}
                </div>
                <div class="card-body">
                    <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
                        @csrf
                        @if(isset($user))
                            @method('PUT')
                        @endif

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name', $user->name ?? '') }}" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email', $user->email ?? '') }}" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                                @if(isset($user))
                                    <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small>
                                @endif
                            </label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                {{ isset($user) ? '' : 'required' }}>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', $user->status ?? 'active') === 'active' ? 'selected' : '' }}>
                                    Aktif
                                </option>
                                <option value="inactive" {{ old('status', $user->status ?? '') === 'inactive' ? 'selected' : '' }}>
                                    Tidak Aktif
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-{{ isset($user) ? 'check-circle' : 'plus-circle' }} me-2"></i>
                                {{ isset($user) ? 'Perbarui' : 'Tambah' }} User
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Card -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Informasi
                </div>
                <div class="card-body">
                    @if(isset($user))
                        <div class="mb-3">
                            <small class="text-muted">ID User</small>
                            <p class="mb-0 fw-semibold">{{ $user->id }}</p>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Terdaftar</small>
                            <p class="mb-0 fw-semibold">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Terakhir Diubah</small>
                            <p class="mb-0 fw-semibold">{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Verifikasi Email</small>
                            <p class="mb-0">
                                @if($user->email_verified_at)
                                    <span class="badge bg-success">Terverifikasi</span>
                                    <small class="text-muted d-block mt-1">{{ $user->email_verified_at->format('d/m/Y H:i') }}</small>
                                @else
                                    <span class="badge bg-warning">Belum Terverifikasi</span>
                                @endif
                            </p>
                        </div>
                    @else
                        <div class="alert alert-info">
                            <i class="bi bi-lightbulb me-2"></i>
                            Lengkapi semua data dengan benar sebelum menambah user baru.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Password Tips -->
            <div class="card mt-3">
                <div class="card-header">
                    <i class="bi bi-shield-lock me-2"></i>Tips Keamanan
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0" style="font-size: 13px;">
                        <li><i class="bi bi-check-circle text-success me-2"></i>Minimal 8 karakter</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Gunakan huruf besar & kecil</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Sertakan angka</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i>Jangan gunakan nama pengguna</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
