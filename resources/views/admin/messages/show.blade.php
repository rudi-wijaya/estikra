@extends('layouts.admin')

@section('page_title', 'Detail Pesan')

@section('content')
    <div class="page-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">{{ $message->nama ?? $message->name ?? 'Pesan dari Kontak' }}</h1>
                <p class="page-subtitle">Detail pesan kontak</p>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Message Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="bi bi-chat-dots me-2"></i>Konten Pesan
                        </span>
                        <div>
                            @if(!$message->read_at)
                                <span class="badge bg-warning">
                                    <i class="bi bi-exclamation-circle me-1"></i>Belum Dibaca
                                </span>
                            @else
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i>Sudah Dibaca
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Sender Info -->
                    <div class="row mb-4 pb-4 border-bottom">
                        <div class="col-md-6">
                            <label class="form-label text-muted">Nama Pengirim</label>
                            <p class="fw-semibold" style="font-size: 16px;">
                                <i class="bi bi-person-circle me-2"></i>{{ $message->nama ?? $message->name ?? 'Anonymous' }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted">Email</label>
                            <p class="fw-semibold" style="font-size: 16px;">
                                <a href="mailto:{{ $message->email }}" style="color: var(--primary-color);">
                                    {{ $message->email }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="mb-4 pb-4 border-bottom">
                        <label class="form-label text-muted">Pesan</label>
                        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; line-height: 1.6;">
                            {{ $message->pesan ?? $message->message }}
                        </div>
                    </div>

                    <!-- Message Date -->
                    <div>
                        <label class="form-label text-muted">Diterima</label>
                        <p class="text-muted">
                            <i class="bi bi-calendar-event me-2"></i>
                            {{ $message->created_at->format('d F Y') }} 
                            <strong>Pukul {{ $message->created_at->format('H:i') }}</strong>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-lightning me-2"></i>Aksi Cepat
                </div>
                <div class="card-body">
                    <div class="d-flex gap-2 flex-wrap">
                        @if(!$message->read_at)
                            <form action="{{ route('admin.messages.markAsRead', $message->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle me-2"></i>Tandai Sudah Dibaca
                                </button>
                            </form>
                        @endif

                        <a href="mailto:{{ $message->email }}" class="btn btn-primary">
                            <i class="bi bi-envelope me-2"></i>Balas Email
                        </a>

                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(event, '{{ $message->nama ?? $message->name ?? 'Pesan' }}')">
                                <i class="bi bi-trash me-2"></i>Hapus Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="col-lg-4">
            <!-- Sender Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-person me-2"></i>Informasi Pengirim
                </div>
                <div class="card-body text-center">
                    <div class="user-avatar mx-auto" style="width: 60px; height: 60px; font-size: 24px; margin-bottom: 15px;">
                        {{ substr($message->nama ?? $message->name ?? 'A', 0, 1) }}
                    </div>
                    <h5 class="card-title">{{ $message->nama ?? $message->name ?? 'Anonymous' }}</h5>
                    <p class="text-muted mb-3">
                        <i class="bi bi-envelope me-1"></i>
                        <a href="mailto:{{ $message->email }}" style="color: var(--primary-color);">
                            {{ $message->email }}
                        </a>
                    </p>
                </div>
            </div>

            <!-- Status Card -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Status
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block mb-2">Status Baca</small>
                        @if($message->read_at)
                            <span class="badge bg-success p-2">
                                <i class="bi bi-check-circle me-1"></i>Sudah Dibaca
                            </span>
                            <p class="text-muted mt-2">
                                <small>{{ $message->read_at->format('d/m/Y H:i') }}</small>
                            </p>
                        @else
                            <span class="badge bg-warning p-2">
                                <i class="bi bi-exclamation-circle me-1"></i>Belum Dibaca
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Meta Info -->
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-calendar-event me-2"></i>Waktu
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted">Diterima</small>
                        <p class="fw-semibold">
                            {{ $message->created_at->format('d/m/Y') }}
                            <br>
                            <small>{{ $message->created_at->diffForHumans() }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(e, messageName) {
            e.preventDefault();
            if (confirm(`Apakah Anda yakin ingin menghapus pesan dari "${messageName}"? Tindakan ini tidak dapat dibatalkan.`)) {
                e.target.closest('form').submit();
            }
        }
    </script>
@endsection
