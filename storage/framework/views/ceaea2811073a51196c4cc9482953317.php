

<?php $__env->startSection('page_title', 'Manajemen User'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        @media (max-width: 768px) {
            .user-page-header {
                gap: 0.75rem;
            }

            .user-page-header .btn {
                width: 100%;
            }

            .users-mobile-table thead {
                display: none;
            }

            .users-mobile-table tbody,
            .users-mobile-table tr,
            .users-mobile-table td {
                display: block;
                width: 100%;
            }

            .users-mobile-table tr {
                border: 1px solid #dbeafe;
                border-radius: 12px;
                background: #fff;
                margin: 0 0 12px;
                padding: 10px;
            }

            .users-mobile-table td {
                border: 0;
                border-bottom: 1px dashed #dbeafe;
                padding: 8px 4px;
            }

            .users-mobile-table td:last-child {
                border-bottom: 0;
                padding-bottom: 2px;
            }

            .users-mobile-table td::before {
                content: attr(data-label);
                display: block;
                font-size: 11px;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                color: #64748b;
                margin-bottom: 5px;
                font-weight: 600;
            }

            .users-mobile-table td[data-label="Aksi"] .d-flex {
                flex-wrap: wrap;
            }

            .users-mobile-table td[data-label="Aksi"] .btn {
                flex: 1 1 calc(33.333% - 6px);
                min-width: 44px;
            }
        }
    </style>

    <div class="page-header mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center user-page-header">
            <div>
                <h1 class="page-title">Manajemen User</h1>
                <p class="page-subtitle">Kelola semua user dalam sistem</p>
            </div>
            <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah User
            </a>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('admin.users.index')); ?>" class="row g-3">
                <div class="col-12 col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-7 col-md-4">
                    <select name="role" class="form-select">
                        <option value="">Semua Role</option>
                        <option value="user" <?php echo e(request('role') == 'user' ? 'selected' : ''); ?>>User</option>
                        <option value="admin" <?php echo e(request('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
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
            <table class="table mb-0 users-mobile-table">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Terdaftar</th>
                        <th>Status Akun</th>
                        <th style="width: 150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="#"><?php echo e($loop->iteration); ?></td>
                            <td data-label="Nama">
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar" style="width: 36px; height: 36px; font-size: 14px;">
                                        <?php echo e(substr($user->name, 0, 1)); ?>

                                    </div>
                                    <div class="ms-2">
                                        <div class="fw-semibold"><?php echo e($user->name); ?></div>
                                        <small class="text-muted">ID: <?php echo e($user->id); ?></small>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Email"><?php echo e($user->email); ?></td>
                            <td data-label="Terdaftar">
                                <?php echo e($user->created_at->format('d/m/Y H:i')); ?>

                            </td>
                            <td data-label="Status Akun">
                                <?php if($user->status === 'active'): ?>
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Aktif
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-danger">
                                        <i class="bi bi-x-circle me-1"></i>Tidak Aktif
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td data-label="Aksi">
                                <div class="d-flex gap-1">
                                    <a href="<?php echo e(route('admin.users.show', $user->id)); ?>" class="btn btn-sm btn-outline-secondary" title="Lihat">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="confirmDelete(event, '<?php echo e($user->name); ?>')" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="bi bi-inbox" style="font-size: 48px; opacity: 0.5;"></i>
                                <p class="mt-3">Belum ada user</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <?php if($users->hasPages()): ?>
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($users->links()); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function confirmDelete(e, userName) {
            e.preventDefault();
            if (confirm(`Apakah Anda yakin ingin menghapus user "${userName}"? Tindakan ini tidak dapat dibatalkan.`)) {
                e.target.closest('form').submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/users/index.blade.php ENDPATH**/ ?>