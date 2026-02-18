@extends('layouts.admin')

@section('page_title', 'Detail Pesan')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

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
                            <label class="form-label text-muted">Nomor HP / WhatsApp</label>
                            <p class="fw-semibold" style="font-size: 16px;">
                                <a href="https://wa.me/62{{ ltrim($message->nomor_hp, '0') }}" target="_blank" style="color: var(--primary-color);">
                                    <i class="bi bi-whatsapp me-1"></i>{{ $message->nomor_hp }}
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="mb-4 pb-4 border-bottom">
                        <label class="form-label text-muted">Subjek</label>
                        <p class="fw-semibold" style="font-size: 16px; background-color: #f0f4ff; padding: 12px 16px; border-radius: 6px; border-left: 4px solid var(--primary-color);">
                            <i class="bi bi-chat-left-dots me-2"></i>{{ $message->subjek ?? 'Tanpa Subjek' }}
                        </p>
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
                    <div class="d-flex gap-2 flex-wrap mb-3">
                        @if(!$message->read_at)
                            <form action="{{ route('admin.messages.markAsRead', $message->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle me-2"></i>Tandai Sudah Dibaca
                                </button>
                            </form>
                        @endif

                        @if(!$message->replied_at)
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyModal">
                                <i class="bi bi-reply me-2"></i>Balas Pesan
                            </button>
                        @else
                            <button type="button" class="btn btn-success" disabled>
                                <i class="bi bi-check2-circle me-2"></i>Sudah Dibalas
                            </button>
                        @endif

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

            @if($message->replied_at)
                <!-- Reply History -->
                <div class="card mt-4">
                    <div class="card-header bg-success">
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-check-circle me-2"></i>Balasan Admin</span>
                            <small class="text-white">{{ $message->replied_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Tampilan Balasan -->
                        <div id="replyDisplay" style="display: block;">
                            <div style="background-color: #e8f5e9; padding: 20px; border-radius: 8px; border-left: 4px solid #28a745; margin-bottom: 20px;">
                                <p id="replyText" style="white-space: pre-wrap; word-wrap: break-word; margin: 0;">{{ $message->admin_reply }}</p>
                            </div>
                            <div>
                                <button type="button" class="btn btn-warning btn-sm" onclick="toggleEditMode()">
                                    <i class="bi bi-pencil-square me-2"></i>Edit Balasan
                                </button>
                                <button type="button" class="btn btn-success btn-sm" onclick="sendToWhatsApp()">
                                    <i class="bi bi-whatsapp me-2"></i>Kirim ke WhatsApp
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="copyReplyToClipboard()">
                                    <i class="bi bi-files me-2"></i>Copy Pesan
                                </button>
                            </div>
                        </div>

                        <!-- Form Edit Balasan -->
                        <div id="replyEdit" style="display: none;">
                            <form id="editReplyForm" action="{{ route('admin.messages.updateReply', $message->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="edit_reply_text" class="form-label"><strong>Edit Balasan</strong></label>
                                    <textarea 
                                        class="form-control" 
                                        id="edit_reply_text" 
                                        name="reply_text" 
                                        rows="6"
                                        required>{{ $message->admin_reply }}</textarea>
                                    <small class="form-text text-muted d-block mt-2">
                                        <i class="bi bi-info-circle me-1"></i>Balasan minimal 10 karakter.
                                    </small>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="bi bi-save me-2"></i>Simpan Perubahan
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="toggleEditMode()">
                                        <i class="bi bi-x-circle me-2"></i>Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Reply Modal -->
            <div class="modal fade" id="replyModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-reply me-2"></i>Balas Pesan
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <!-- Informasi Pengirim -->
                                <div class="mb-4 pb-3 border-bottom">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label text-muted"><strong>Nama Pengirim</strong></label>
                                            <p class="fw-semibold">
                                                <i class="bi bi-person-circle me-2"></i>{{ $message->nama ?? $message->name ?? 'Anonymous' }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-muted"><strong>Nomor HP</strong></label>
                                            <p class="fw-semibold">
                                                <i class="bi bi-phone me-2"></i>{{ $message->nomor_hp }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Subjek -->
                                <div class="mb-4 pb-3 border-bottom">
                                    <label class="form-label text-muted"><strong>Subjek</strong></label>
                                    <p class="fw-semibold" style="background-color: #f0f4ff; padding: 10px 12px; border-radius: 6px; border-left: 4px solid var(--primary-color);">
                                        <i class="bi bi-chat-left-dots me-2"></i>{{ $message->subjek ?? 'Tanpa Subjek' }}
                                    </p>
                                </div>

                                <!-- Pesan Asli -->
                                <div class="mb-4 pb-3 border-bottom">
                                    <label class="form-label text-muted"><strong>Pesan dari Pengirim</strong></label>
                                    <div style="background-color: #f8f9fa; padding: 15px; border-radius: 6px; border-left: 4px solid #6c757d;">
                                        {{ $message->pesan ?? $message->message }}
                                    </div>
                                </div>

                                <!-- Form Balasan -->
                                <div>
                                    <label for="reply_text" class="form-label"><strong>Balasan Anda <span class="text-danger">*</span></strong></label>
                                    <textarea 
                                        class="form-control @error('reply_text') is-invalid @enderror" 
                                        id="reply_text" 
                                        name="reply_text" 
                                        rows="6" 
                                        placeholder="Ketikkan balasan Anda di sini..."
                                        required></textarea>
                                    @if($errors->has('reply_text'))
                                        <div class="invalid-feedback d-block">{{ $errors->first('reply_text') }}</div>
                                    @endif
                                    <small class="form-text text-muted d-block mt-2">
                                        <i class="bi bi-info-circle me-1"></i>Balasan minimal 10 karakter.
                                    </small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" id="submitReplyBtn">
                                    <i class="bi bi-save me-2"></i>Simpan Balasan
                                </button>
                            </div>
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
                        <i class="bi bi-whatsapp me-1"></i>
                        <a href="https://wa.me/62{{ ltrim($message->nomor_hp, '0') }}" target="_blank" style="color: var(--primary-color);">
                            {{ $message->nomor_hp }}
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

        function copyReplyToClipboard() {
            const text = document.getElementById('replyText').innerText;
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            
            // Show notification
            const btn = event.target.closest('button');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check me-2"></i>Tersalin!';
            setTimeout(() => {
                btn.innerHTML = originalText;
            }, 2000);
        }

        function sendToWhatsApp() {
            const replyText = document.getElementById('replyText').innerText;
            const phoneNumber = '{{ ltrim($message->nomor_hp, "0") }}';
            
            // Create WhatsApp link with proper encoding
            const encodedMessage = encodeURIComponent(replyText);
            const whatsappUrl = `https://wa.me/62${phoneNumber}?text=${encodedMessage}`;
            
            // Open in new tab
            window.open(whatsappUrl, '_blank');
        }

        function toggleEditMode() {
            const display = document.getElementById('replyDisplay');
            const edit = document.getElementById('replyEdit');
            
            if (edit.style.display === 'none') {
                display.style.display = 'none';
                edit.style.display = 'block';
            } else {
                display.style.display = 'block';
                edit.style.display = 'none';
            }
        }

        // Update reply text when form is submitted
        document.addEventListener('DOMContentLoaded', function() {
            const editForm = document.getElementById('editReplyForm');
            if (editForm) {
                editForm.addEventListener('submit', function(e) {
                    // The form will submit and page will reload
                    // No need for special handling
                });
            }
        });
    </script>
@endsection
