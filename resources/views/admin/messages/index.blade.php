@extends('layouts.admin')

@section('page_title', 'Manajemen Pesan')

@section('content')
    <div class="page-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">Manajemen Pesan</h1>
                <p class="page-subtitle">Kelola semua pesan kontak dalam sistem</p>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.messages.index') }}" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                        <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">
                        <i class="bi bi-search me-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="card">
        <div class="card-header">
            <i class="bi bi-chat-dots me-2"></i>Daftar Pesan
        </div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>Pengirim</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $key => $message)
                        <tr class="{{ !$message->read_at ? 'table-light fw-semibold' : '' }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <i class="bi bi-person-circle me-2"></i>{{ $message->nama ?? $message->name ?? 'Anonymous' }}
                            </td>
                            <td>
                                <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                            </td>
                            <td>
                                <small>{{ Str::limit($message->pesan ?? $message->message, 50) }}</small>
                            </td>
                            <td>
                                <small>{{ $message->created_at->format('d/m/Y H:i') }}</small>
                            </td>
                            <td>
                                @if($message->read_at)
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Dibaca
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        <i class="bi bi-exclamation-circle me-1"></i>Belum Dibaca
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-outline-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete(event, '{{ $message->nama ?? $message->name ?? 'Pesan' }}')" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="bi bi-inbox" style="font-size: 48px; opacity: 0.5;"></i>
                                <p class="mt-3">Belum ada pesan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($messages->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $messages->links() }}
        </div>
    @endif
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
