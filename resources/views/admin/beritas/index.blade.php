@extends('layouts.admin')

@section('page_title', 'Kelola Berita')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="h4">Daftar Berita</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.beritas.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Berita
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
                        <th style="width: 50px">ID</th>
                        <th>Judul</th>
                        <th style="width: 100px">Tanggal</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beritas as $berita)
                        <tr>
                            <td>{{ $berita->id }}</td>
                            <td>
                                <strong>{{ $berita->judul }}</strong><br>
                                <small class="text-muted">{{ Str::limit($berita->konten, 100) }}</small>
                            </td>
                            <td>{{ $berita->tanggal_terbit->format('d M Y') }}</td>
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
                                <a href="{{ route('admin.beritas.show', $berita) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.beritas.edit', $berita) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.beritas.destroy', $berita) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus berita ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
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
