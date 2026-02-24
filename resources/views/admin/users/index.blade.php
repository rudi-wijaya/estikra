@extends('layouts.admin')

@section('page_title', 'Manajemen User')

@section('content')
    <div class="page-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">Manajemen User</h1>
                <p class="page-subtitle">Kelola semua user dalam sistem</p>
            </div>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah User
            </a>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.users.index') }}" class="row g-3">
                <div class="col-12 col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..." value="{{ request('search') }}">
                </div>
                <div class="col-7 col-md-4">
                    <select name="role" class="form-select">
                        <option value="">Semua Role</option>
                        <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div class="col-5 col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">
                        <i class="bi bi-search me-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Users Table -->
    <div class="card">
        <div class="card-header">
            <i class="bi bi-table me-2"></i>Daftar User
        </div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Terdaftar</th>
                        <th>Status</th>
                        <th style="width: 150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar" style="width: 36px; height: 36px; font-size: 14px;">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold">{{ $user->name }}</div>
                                        <small class="text-muted">ID: {{ $user->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                @if($user->email_verified_at)
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Terverifikasi
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        <i class="bi bi-clock-history me-1"></i>Pending
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-outline-secondary" title="Lihat">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="confirmDelete(event, '{{ $user->name }}')" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="bi bi-inbox" style="font-size: 48px; opacity: 0.5;"></i>
                                <p class="mt-3">Belum ada user</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($users->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        function confirmDelete(e, userName) {
            e.preventDefault();
            if (confirm(`Apakah Anda yakin ingin menghapus user "${userName}"? Tindakan ini tidak dapat dibatalkan.`)) {
                e.target.closest('form').submit();
            }
        }
    </script>
@endsection
