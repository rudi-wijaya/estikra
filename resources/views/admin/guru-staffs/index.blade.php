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

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @php
        $kategoriLabels = \App\Models\GuruStaff::$kategoriLabels;
        $urutan = ['kepala_sekolah', 'guru_kelas', 'guru_mapel', 'staff'];
        $kategoriTersedia = collect($urutan)->filter(function ($kat) use ($groupedGuruStaffs) {
            return isset($groupedGuruStaffs[$kat]) && $groupedGuruStaffs[$kat]->count();
        });
        $kategoriAktif = 'semua';
        $totalData = $kategoriTersedia->sum(function ($kat) use ($groupedGuruStaffs) {
            return $groupedGuruStaffs[$kat]->count();
        });
    @endphp

    @if ($kategoriTersedia->count())
        <div class="admin-top-tabs mb-3" id="guru-staff-kategori-nav" role="tablist" aria-label="Filter kategori guru dan staff" style="overflow-x:auto; white-space:nowrap;">
            <button type="button" class="tab-link active kategori-filter-btn" data-kategori="semua" aria-pressed="true" style="background:none;border:none;">
                Semua
                <span class="text-muted">({{ $totalData }})</span>
            </button>
            @foreach ($urutan as $kat)
                @php $jumlah = isset($groupedGuruStaffs[$kat]) ? $groupedGuruStaffs[$kat]->count() : 0; @endphp
                <button type="button" class="tab-link kategori-filter-btn" data-kategori="{{ $kat }}" aria-pressed="false" style="background:none;border:none;">
                    {{ $kategoriLabels[$kat] }}
                    <span class="text-muted">({{ $jumlah }})</span>
                </button>
            @endforeach
        </div>
    @endif

    @foreach ($urutan as $kat)
        @if (isset($groupedGuruStaffs[$kat]) && $groupedGuruStaffs[$kat]->count())
            <div class="card mb-4 kategori-panel" data-kategori="{{ $kat }}">
                <div class="card-header"><strong>{{ $kategoriLabels[$kat] }}</strong></div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width:50px">Foto</th>
                                <th>Nama</th>
                                <th style="width:170px">Status</th>
                                <th class="d-none d-md-table-cell" style="width:180px">Jabatan</th>
                                <th style="width:110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupedGuruStaffs[$kat] as $gs)
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
                                    <td>
                                        <form action="{{ route('admin.guru-staffs.update-status', $gs) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select
                                                name="aktif"
                                                class="form-select form-select-sm"
                                                aria-label="Ubah status {{ $gs->nama }}"
                                                onchange="this.form.submit()"
                                            >
                                                <option value="1" {{ $gs->aktif ? 'selected' : '' }}>Aktif</option>
                                                <option value="0" {{ ! $gs->aktif ? 'selected' : '' }}>Belum Aktif</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $gs->jabatan }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('admin.guru-staffs.edit', $gs) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            @if ($gs->kategori !== 'kepala_sekolah')
                                                <form action="{{ route('admin.guru-staffs.destroy', $gs) }}" method="POST" style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nav = document.getElementById('guru-staff-kategori-nav');

        if (!nav) {
            return;
        }

        const buttons = nav.querySelectorAll('.kategori-filter-btn');
        const panels = document.querySelectorAll('.kategori-panel');

        const setActiveKategori = function (kategori) {
            buttons.forEach(function (button) {
                const isActive = button.dataset.kategori === kategori;
                button.classList.toggle('active', isActive);
                button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            panels.forEach(function (panel) {
                if (kategori === 'semua') {
                    panel.classList.remove('d-none');
                    return;
                }

                panel.classList.toggle('d-none', panel.dataset.kategori !== kategori);
            });
        };

        setActiveKategori('semua');

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                setActiveKategori(button.dataset.kategori);
            });
        });
    });
</script>
@endsection
