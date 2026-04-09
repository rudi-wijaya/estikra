@extends('layouts.admin')

@section('page_title', 'Kelola Prestasi')

@section('content')
<div class="container-fluid">
    <div class="admin-top-tabs">
        <a class="tab-link" href="{{ route('admin.settings.tentang.index') }}">
            <i class="bi bi-info-circle"></i>Konten Tentang
        </a>
        <a class="tab-link active" href="{{ route('admin.prestasis.index') }}">
            <i class="bi bi-trophy"></i>Data Prestasi
        </a>
    </div>

    <div class="row mb-4 align-items-center">
        <div class="col-8 col-md-6">
            <h2 class="h4">Daftar Prestasi</h2>
        </div>
        <div class="col-4 col-md-6 text-end">
            <a href="{{ route('admin.settings.tentang.index') }}" class="btn btn-primary me-2">
                <i class="bi bi-arrow-left"></i> <span class="d-none d-sm-inline">Kembali</span>
            </a>
            <a href="{{ route('admin.prestasis.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Tambah Prestasi</span>
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <form id="prestasi-search-form" method="GET" action="{{ route('admin.prestasis.index') }}" class="row g-2 align-items-center">
                <div class="col-12 col-md-8 col-lg-9">
                    <label for="q" class="form-label mb-1">Pencarian Prestasi</label>
                    <input
                        type="text"
                        id="q"
                        name="q"
                        class="form-control"
                        placeholder="Cari judul, keterangan, tahun, atau status..."
                        autocomplete="off"
                        value="{{ $search ?? '' }}"
                    >
                </div>
                <div class="col-12 col-md-4 col-lg-3 d-flex gap-2 mt-md-4">
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="bi bi-search me-1"></i>Cari
                    </button>
                    <a id="prestasi-search-reset" href="{{ route('admin.prestasis.index') }}" class="btn btn-outline-secondary {{ empty($search) ? 'd-none' : '' }}">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div id="prestasi-table-wrapper" class="card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="d-none d-md-table-cell" style="width: 50px">ID</th>
                        <th>Prestasi</th>
                        <th class="d-none d-sm-table-cell" style="width: 80px">Tahun</th>
                        <th class="d-none d-sm-table-cell" style="width: 80px">Urutan</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prestasis as $prestasi)
                        <tr>
                            <td class="d-none d-md-table-cell">{{ $prestasi->id }}</td>
                            <td>
                                <strong class="d-block" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 220px;">{{ $prestasi->judul }}</strong>
                                <small class="text-muted d-none d-md-block">{{ \Illuminate\Support\Str::limit($prestasi->keterangan, 80) }}</small>
                            </td>
                            <td class="d-none d-sm-table-cell">{{ $prestasi->tahun ?: '-' }}</td>
                            <td class="d-none d-sm-table-cell">{{ $prestasi->urutan }}</td>
                            <td>
                                @if ($prestasi->status === 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.prestasis.edit', $prestasi) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.prestasis.destroy', $prestasi) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus prestasi ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                {{ !empty($search) ? 'Data prestasi tidak ditemukan untuk kata kunci tersebut' : 'Belum ada data prestasi' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="prestasi-pagination" class="d-flex justify-content-center mt-4">
        @if ($prestasis->hasPages())
            {{ $prestasis->links() }}
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('prestasi-search-form');
        const input = document.getElementById('q');
        const resetButton = document.getElementById('prestasi-search-reset');
        const tableWrapper = document.getElementById('prestasi-table-wrapper');
        const paginationWrapper = document.getElementById('prestasi-pagination');

        if (!form || !input || !tableWrapper || !paginationWrapper) {
            return;
        }

        let abortController;
        let searchTimer;

        const toggleResetButton = function () {
            if (!resetButton) {
                return;
            }

            if (input.value.trim() === '') {
                resetButton.classList.add('d-none');
            } else {
                resetButton.classList.remove('d-none');
            }
        };

        const fetchAndRender = function (url, pushState = true) {
            if (abortController) {
                abortController.abort();
            }

            abortController = new AbortController();
            tableWrapper.style.opacity = '0.55';

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                signal: abortController.signal,
            })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Request gagal');
                    }
                    return response.text();
                })
                .then(function (html) {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    const newTableWrapper = doc.getElementById('prestasi-table-wrapper');
                    const newPaginationWrapper = doc.getElementById('prestasi-pagination');

                    if (newTableWrapper) {
                        tableWrapper.innerHTML = newTableWrapper.innerHTML;
                    }

                    if (newPaginationWrapper) {
                        paginationWrapper.innerHTML = newPaginationWrapper.innerHTML;
                    } else {
                        paginationWrapper.innerHTML = '';
                    }

                    if (pushState) {
                        window.history.replaceState({}, '', url);
                    }
                })
                .catch(function (error) {
                    if (error.name !== 'AbortError') {
                        console.error(error);
                    }
                })
                .finally(function () {
                    tableWrapper.style.opacity = '1';
                });
        };

        const buildSearchUrl = function () {
            const url = new URL(form.action, window.location.origin);
            const query = input.value.trim();

            if (query !== '') {
                url.searchParams.set('q', query);
            }

            return url.toString();
        };

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            toggleResetButton();
            fetchAndRender(buildSearchUrl());
        });

        input.addEventListener('input', function () {
            clearTimeout(searchTimer);
            toggleResetButton();

            searchTimer = setTimeout(function () {
                const current = new URLSearchParams(window.location.search).get('q') ?? '';
                if (current !== input.value.trim()) {
                    fetchAndRender(buildSearchUrl());
                }
            }, 450);
        });

        if (resetButton) {
            resetButton.addEventListener('click', function (event) {
                event.preventDefault();
                input.value = '';
                toggleResetButton();
                fetchAndRender(form.action);
            });
        }

        paginationWrapper.addEventListener('click', function (event) {
            const link = event.target.closest('a');

            if (!link || !paginationWrapper.contains(link)) {
                return;
            }

            event.preventDefault();
            fetchAndRender(link.href);
        });
    });
</script>
@endsection
