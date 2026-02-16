@extends('layouts.admin')

@section('page_title', 'Detail User')

@section('content')
    <div class="page-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">{{ $user->name }}</h1>
                <p class="page-subtitle">Detail informasi user</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil me-2"></i>Edit
                </a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- User Information -->
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-body pt-5">
                    <div class="user-avatar mx-auto" style="width: 80px; height: 80px; font-size: 36px; margin-bottom: 20px;">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <h3 class="card-title">{{ $user->name }}</h3>
                    <p class="text-muted mb-3">{{ $user->email }}</p>
                    
                    <!-- Status Badge -->
                    <div class="mb-4">
                        @if($user->email_verified_at)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i>Terverifikasi
                            </span>
                        @else
                            <span class="badge bg-warning">
                                <i class="bi bi-clock-history me-1"></i>Pending Verifikasi
                            </span>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary btn-sm" onclick="copyToClipboard('{{ $user->id }}')">
                            <i class="bi bi-files me-2"></i>Copy User ID
                        </button>
                    </div>
                </div>
            </div>

            <!-- Activity -->
            <div class="card mt-3">
                <div class="card-header">
                    <i class="bi bi-clock-history me-2"></i>Aktivitas
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Terdaftar</small>
                        <p class="mb-0 fw-semibold">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                        <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                    </div>
                    <hr>
                    <div class="mb-0">
                        <small class="text-muted">Terakhir Diubah</small>
                        <p class="mb-0 fw-semibold">{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                        <small class="text-muted">{{ $user->updated_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Information -->
        <div class="col-lg-8">
            <!-- Basic Information -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-person me-2"></i>Informasi Dasar
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Nama Lengkap</label>
                            <p class="fw-semibold">{{ $user->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Email</label>
                            <p class="fw-semibold">{{ $user->email }}</p>
                        </div>
                        <div class="col-md-6 mb-0">
                            <label class="form-label text-muted">ID User</label>
                            <p class="fw-semibold">{{ $user->id }}</p>
                        </div>
                        <div class="col-md-6 mb-0">
                            <label class="form-label text-muted">Status</label>
                            <p class="fw-semibold">
                                @if($user->status === 'active')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Verification Information -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-shield-check me-2"></i>Verifikasi
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Status Verifikasi Email</label>
                            @if($user->email_verified_at)
                                <p class="fw-semibold">
                                    <span class="badge bg-success">Terverifikasi</span>
                                </p>
                            @else
                                <p class="fw-semibold">
                                    <span class="badge bg-warning">Belum Terverifikasi</span>
                                </p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Tanggal Verifikasi</label>
                            @if($user->email_verified_at)
                                <p class="fw-semibold">{{ $user->email_verified_at->format('d/m/Y H:i') }}</p>
                            @else
                                <p class="text-muted">-</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Timestamps Information -->
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-calendar-event me-2"></i>Data Historis
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <tr>
                                <td>
                                    <strong>Dibuat pada</strong>
                                    <br>
                                    <small class="text-muted">{{ $user->created_at->format('d F Y H:i:s') }}</small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Terakhir diubah</strong>
                                    <br>
                                    <small class="text-muted">{{ $user->updated_at->format('d F Y H:i:s') }}</small>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="card mt-3 border-danger">
                <div class="card-header bg-danger text-white">
                    <i class="bi bi-exclamation-triangle me-2"></i>Zona Berbahaya
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">Tindakan di bawah tidak dapat dibatalkan. Lakukan dengan hati-hati.</p>
                    <div class="d-flex gap-2">
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, '{{ $user->name }}')">
                                <i class="bi bi-trash me-2"></i>Hapus User
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('User ID disalin ke clipboard!');
            });
        }

        function confirmDelete(e, userName) {
            e.preventDefault();
            if (confirm(`Apakah Anda yakin ingin menghapus user "${userName}"? Tindakan ini tidak dapat dibatalkan.`)) {
                e.target.closest('form').submit();
            }
        }
    </script>
@endsection
