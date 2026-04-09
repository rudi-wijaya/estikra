

<?php $__env->startSection('page_title', 'Kelola Berita'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <style>
        @media (max-width: 767.98px) {
            .berita-mobile-card .card-title {
                font-size: 1rem;
                line-height: 1.3;
            }

            .berita-mobile-card .btn {
                min-width: 2.2rem;
            }
        }
    </style>

    <div class="row mb-4 align-items-center">
        <div class="col-8 col-md-6">
            <h2 class="h4">Daftar Berita</h2>
        </div>
        <div class="col-4 col-md-6 text-end">
            <a href="<?php echo e(route('admin.beritas.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Tambah Berita</span>
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
            <form id="berita-search-form" method="GET" action="<?php echo e(route('admin.beritas.index')); ?>" class="row g-2 align-items-end">
                <div class="col-12 col-md-9 col-lg-10">
                    <label for="q" class="form-label mb-1">Pencarian Berita</label>
                    <input
                        type="text"
                        id="q"
                        name="q"
                        class="form-control"
                        placeholder="Cari judul, konten, status, atau tanggal (YYYY-MM-DD)..."
                        autocomplete="off"
                        value="<?php echo e($search ?? ''); ?>"
                    >
                </div>
                <div class="col-12 col-md-3 col-lg-2">
                    <label for="status" class="form-label mb-1">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="published" <?php echo e(($status ?? '') === 'published' ? 'selected' : ''); ?>>Published</option>
                        <option value="draft" <?php echo e(($status ?? '') === 'draft' ? 'selected' : ''); ?>>Draft</option>
                        <option value="archived" <?php echo e(($status ?? '') === 'archived' ? 'selected' : ''); ?>>Archived</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div id="berita-table-wrapper" class="card">
        <div class="table-responsive d-none d-md-block">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="d-none d-md-table-cell" style="width: 50px">No</th>
                        <th>Judul</th>
                        <th class="d-none d-sm-table-cell" style="width: 100px">Tanggal</th>
                        <th style="width: 150px">Status</th>
                        <th class="d-none d-lg-table-cell" style="width: 120px">Link</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="d-none d-md-table-cell"><?php echo e($beritas->firstItem() + $loop->index); ?></td>
                            <td>
                                <strong class="d-block" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 160px;"><?php echo e($berita->judul); ?></strong>
                                <small class="text-muted d-none d-md-block"><?php echo e(Str::limit($berita->konten, 80)); ?></small>
                            </td>
                            <td class="d-none d-sm-table-cell"><?php echo e($berita->tanggal_terbit->format('d M Y')); ?></td>
                            <td>
                                <form action="<?php echo e(route('admin.beritas.update-status', $berita)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <select
                                        name="status"
                                        class="form-select form-select-sm"
                                        style="min-width: 130px;"
                                        aria-label="Ubah status berita <?php echo e($berita->judul); ?>"
                                        onchange="this.form.submit()"
                                    >
                                        <option value="published" <?php echo e($berita->status === 'published' ? 'selected' : ''); ?>>Published</option>
                                        <option value="draft" <?php echo e($berita->status === 'draft' ? 'selected' : ''); ?>>Draft</option>
                                        <option value="archived" <?php echo e($berita->status === 'archived' ? 'selected' : ''); ?>>Archived</option>
                                    </select>
                                </form>
                            </td>
                            <td class="d-none d-lg-table-cell">
                                <?php if($berita->link_eksternal): ?>
                                    <a href="<?php echo e($berita->link_eksternal); ?>" class="btn btn-sm btn-outline-info" title="Buka artikel lengkap" target="_blank">
                                        <i class="bi bi-link-45deg"></i> Baca
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted text-sm">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="<?php echo e(route('admin.beritas.show', $berita)); ?>" class="btn btn-sm btn-outline-secondary" title="Lihat">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.beritas.edit', $berita)); ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.beritas.destroy', $berita)); ?>" method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus berita ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <?php echo e(!empty($search) || !empty($status) ? 'Data berita tidak ditemukan untuk filter yang dipilih' : 'Tidak ada berita'); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="d-md-none p-3">
            <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="berita-mobile-card border rounded-3 p-3 mb-3">
                    <div class="d-flex justify-content-between gap-2 align-items-start">
                        <h3 class="card-title mb-1 fw-semibold">
                            <?php echo e(Str::limit($berita->judul, 40)); ?>

                        </h3>
                        <small class="text-muted text-nowrap"><?php echo e($berita->tanggal_terbit->format('d M Y')); ?></small>
                    </div>

                    <p class="text-muted small mb-3"><?php echo e(Str::limit(strip_tags($berita->konten), 90)); ?></p>

                    <div class="mb-3">
                        <label class="form-label small mb-1">Status</label>
                        <form action="<?php echo e(route('admin.beritas.update-status', $berita)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <select
                                name="status"
                                class="form-select form-select-sm"
                                aria-label="Ubah status berita <?php echo e($berita->judul); ?>"
                                onchange="this.form.submit()"
                            >
                                <option value="published" <?php echo e($berita->status === 'published' ? 'selected' : ''); ?>>Published</option>
                                <option value="draft" <?php echo e($berita->status === 'draft' ? 'selected' : ''); ?>>Draft</option>
                                <option value="archived" <?php echo e($berita->status === 'archived' ? 'selected' : ''); ?>>Archived</option>
                            </select>
                        </form>
                    </div>

                    <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap">
                        <?php if($berita->link_eksternal): ?>
                            <a href="<?php echo e($berita->link_eksternal); ?>" class="btn btn-sm btn-outline-info" target="_blank" title="Buka artikel lengkap">
                                <i class="bi bi-link-45deg"></i> Baca
                            </a>
                        <?php else: ?>
                            <span class="text-muted small">Tidak ada link eksternal</span>
                        <?php endif; ?>

                        <div class="d-flex gap-1 flex-wrap justify-content-end">
                            <a href="<?php echo e(route('admin.beritas.show', $berita)); ?>" class="btn btn-sm btn-outline-secondary" title="Lihat">
                                <i class="bi bi-eye me-1"></i>Lihat
                            </a>
                            <a href="<?php echo e(route('admin.beritas.edit', $berita)); ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form action="<?php echo e(route('admin.beritas.destroy', $berita)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus berita ini?')">
                                    <i class="bi bi-trash me-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-4">
                    <?php echo e(!empty($search) || !empty($status) ? 'Data berita tidak ditemukan untuk filter yang dipilih' : 'Tidak ada berita'); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <div id="berita-pagination" class="d-flex justify-content-center mt-4">
        <?php echo e($beritas->links()); ?>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('berita-search-form');
        const input = document.getElementById('q');
        const statusSelect = document.getElementById('status');
        const tableWrapper = document.getElementById('berita-table-wrapper');
        const paginationWrapper = document.getElementById('berita-pagination');

        if (!form || !input || !statusSelect || !tableWrapper || !paginationWrapper) {
            return;
        }

        let abortController;
        let searchTimer;

        const buildSearchUrl = function () {
            const url = new URL(form.action, window.location.origin);
            const query = input.value.trim();

            if (query !== '') {
                url.searchParams.set('q', query);
            }

            if (statusSelect.value !== '') {
                url.searchParams.set('status', statusSelect.value);
            }

            return url.toString();
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

                    const newTableWrapper = doc.getElementById('berita-table-wrapper');
                    const newPaginationWrapper = doc.getElementById('berita-pagination');

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

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            fetchAndRender(buildSearchUrl());
        });

        input.addEventListener('input', function () {
            clearTimeout(searchTimer);

            searchTimer = setTimeout(function () {
                const current = new URLSearchParams(window.location.search).get('q') ?? '';
                if (current !== input.value.trim()) {
                    fetchAndRender(buildSearchUrl());
                }
            }, 450);
        });

        statusSelect.addEventListener('change', function () {
            fetchAndRender(buildSearchUrl());
        });

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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/beritas/index.blade.php ENDPATH**/ ?>