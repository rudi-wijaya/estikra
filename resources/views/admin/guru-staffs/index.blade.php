@extends('layouts.admin')

@section('page_title', 'Kelola Guru & Staff')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-8 col-md-6">
            <h2 class="h4 mb-0">Guru & Staff</h2>
        </div>
        <div class="col-4 col-md-6 text-end">
            <a href="{{ route('admin.guru-staffs.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Tambah</span>
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @php
        $kategoriLabels = \App\Models\GuruStaff::$kategoriLabels;
        $urutan = ['kepala_sekolah', 'guru_kelas', 'guru_mapel', 'staff'];
    @endphp

    @foreach ($urutan as $kat)
        @if (isset($guruStaffs[$kat]) && $guruStaffs[$kat]->count())
            <div class="card mb-4">
                <div class="card-header"><strong>{{ $kategoriLabels[$kat] }}</strong></div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width:50px">Foto</th>
                                <th>Nama</th>
                                <th class="d-none d-md-table-cell">Jabatan</th>
                                <th class="d-none d-sm-table-cell">Urutan</th>
                                <th style="width:80px">Status</th>
                                <th style="width:110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guruStaffs[$kat] as $gs)
                                <tr>
                                    <td>
                                        @if ($gs->foto)
                                            <img src="{{ asset('storage/' . $gs->foto) }}" class="rounded-circle" style="width:36px;height:36px;object-fit:cover;">
                                        @else
                                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width:36px;height:36px;font-size:14px;">
                                                {{ substr($gs->nama, 0, 1) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong class="d-block" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:150px;">{{ $gs->nama }}</strong>
                                        <small class="text-muted d-md-none">{{ $gs->jabatan }}</small>
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $gs->jabatan }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $gs->urutan }}</td>
                                    <td>
                                        @if ($gs->aktif)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.guru-staffs.edit', $gs) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.guru-staffs.destroy', $gs) }}" method="POST" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endforeach

    @if ($guruStaffs->isEmpty())
        <div class="card text-center py-5">
            <p class="text-muted">Belum ada data guru & staff. <a href="{{ route('admin.guru-staffs.create') }}">Tambah sekarang</a></p>
        </div>
    @endif
</div>
@endsection
