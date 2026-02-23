

<?php $__env->startSection('page_title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h1 class="page-title">Selamat Datang, <?php echo e(auth()->user()->name); ?>!</h1>
        <p class="page-subtitle">Kelola data aplikasi Anda dari sini</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-30">
        <div class="col-md-6 col-lg-3">
            <div class="stat-card primary">
                <div class="stat-value"><?php echo e($totalUsers ?? 0); ?></div>
                <div class="stat-label">Total User</div>
                <div class="stat-icon"><i class="bi bi-people"></i></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-value">100%</div>
                <div class="stat-label">Sistem Normal</div>
                <div class="stat-icon"><i class="bi bi-activity"></i></div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Recent Users -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-people me-2"></i>User Terbaru</span>
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Terdaftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $recentUsers ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar" style="width: 32px; height: 32px; font-size: 12px;">
                                                    <?php echo e(substr($user->name, 0, 1)); ?>

                                                </div>
                                                <span class="ms-2"><?php echo e($user->name); ?></span>
                                            </div>
                                        </td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td>
                                            <small class="text-muted"><?php echo e($user->created_at->diffForHumans()); ?></small>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">Belum ada user</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Information Cards -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Tentang Sistem
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <strong>Nama Aplikasi:</strong> <?php echo e(config('app.name', 'Estikra')); ?>

                    </p>
                    <p class="mb-2">
                        <strong>Versi:</strong> 1.0.0
                    </p>
                    <p class="mb-0">
                        <strong>Terakhir Update:</strong> <?php echo e(now()->format('d/m/Y H:i')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>