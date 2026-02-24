@extends('layouts.admin')

@section('page_title', 'Kelola Berita')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-8 col-md-6">
            <h2 class="h4">Daftar Berita</h2>
        </div>
        <div class="col-4 col-md-6 text-end">
            <a href="{{ route('admin.beritas.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Tambah Berita</span>
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="d-none d-md-table-cell" style="width: 50px">ID</th>
                        <th>Judul</th>
                        <th class="d-none d-sm-table-cell" style="width: 100px">Tanggal</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beritas as $berita)
                        <tr>
                            <td class="d-none d-md-table-cell">{{ $berita->id }}</td>
                            <td>
                                <strong class="d-block" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 160px;">{{ $berita->judul }}</strong>
                                <small class="text-muted d-none d-md-block">{{ Str::limit($berita->konten, 80) }}</small>
                            </td>
                            <td class="d-none d-sm-table-cell">{{ $berita->tanggal_terbit->format('d M Y') }}</td>
                            <td>
                                @if ($berita->status == 'published')
                                    <span class="badge bg-success">Published</span>
                                @elseif ($berita->status == 'draft')
                                    <span class="badge bg-warning">Draft</span>
                                @else
                                    <span class="badge bg-danger">Archived</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.beritas.show', $berita) }}" class="btn btn-sm btn-outline-secondary" title="Lihat">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.beritas.edit', $berita) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.beritas.destroy', $berita) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus berita ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada berita</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $beritas->links() }}
    </div>
</div>
@endsection
