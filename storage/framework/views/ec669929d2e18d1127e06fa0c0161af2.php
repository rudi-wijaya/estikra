

<?php $__env->startSection('page_title', 'Kelola Prestasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="admin-top-tabs">
        <a class="tab-link" href="<?php echo e(route('admin.settings.tentang.index')); ?>">
            <i class="bi bi-info-circle"></i>Konten Tentang
        </a>
        <a class="tab-link active" href="<?php echo e(route('admin.prestasis.index')); ?>">
            <i class="bi bi-trophy"></i>Data Prestasi
        </a>
    </div>

    <div class="row mb-4 align-items-center">
        <div class="col-8 col-md-6">
            <h2 class="h4">Daftar Prestasi</h2>
        </div>
        <div class="col-4 col-md-6 text-end">
            <a href="<?php echo e(route('admin.settings.tentang.index')); ?>" class="btn btn-secondary me-2">
                <i class="bi bi-arrow-left"></i> <span class="d-none d-sm-inline">Kembali</span>
            </a>
            <a href="<?php echo e(route('admin.prestasis.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Tambah Prestasi</span>
            </a>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e($message); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-body">
            <form id="prestasi-search-form" method="GET" action="<?php echo e(route('admin.prestasis.index')); ?>" class="row g-2 align-items-center">
                <div class="col-12 col-md-8 col-lg-9">
                    <label for="q" class="form-label mb-1">Pencarian Prestasi</label>
                    <input
                        type="text"
                        id="q"
                        name="q"
                        class="form-control"
                        placeholder="Cari judul, keterangan, tahun, atau status..."
                        autocomplete="off"
                        value="<?php echo e($search ?? ''); ?>"
                    >
                </div>
                <div class="col-12 col-md-4 col-lg-3 d-flex gap-2 mt-md-4">
                    <button type="submit" class="btn btn-primary flex-grow-1">
                        <i class="bi bi-search me-1"></i>Cari
                    </button>
                    <a id="prestasi-search-reset" href="<?php echo e(route('admin.prestasis.index')); ?>" class="btn btn-outline-secondary <?php echo e(empty($search) ? 'd-none' : ''); ?>">Reset</a>
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
                    <?php $__empty_1 = true; $__currentLoopData = $prestasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="d-none d-md-table-cell"><?php echo e($prestasi->id); ?></td>
                            <td>
                                <strong class="d-block" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 220px;"><?php echo e($prestasi->judul); ?></strong>
                                <small class="text-muted d-none d-md-block"><?php echo e(\Illuminate\Support\Str::limit($prestasi->keterangan, 80)); ?></small>
                            </td>
                            <td class="d-none d-sm-table-cell"><?php echo e($prestasi->tahun ?: '-'); ?></td>
                            <td class="d-none d-sm-table-cell"><?php echo e($prestasi->urutan); ?></td>
                            <td>
                                <?php if($prestasi->status === 'aktif'): ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Nonaktif</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="<?php echo e(route('admin.prestasis.edit', $prestasi)); ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.prestasis.destroy', $prestasi)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus prestasi ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <?php echo e(!empty($search) ? 'Data prestasi tidak ditemukan untuk kata kunci tersebut' : 'Belum ada data prestasi'); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="prestasi-pagination" class="d-flex justify-content-center mt-4">
        <?php if($prestasis->hasPages()): ?>
            <?php echo e($prestasis->links()); ?>

        <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/prestasis/index.blade.php ENDPATH**/ ?>