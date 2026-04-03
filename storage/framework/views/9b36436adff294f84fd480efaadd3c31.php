

<?php $__env->startSection('page_title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h1 class="page-title">Selamat Datang, <?php echo e(auth()->user()->name); ?>!</h1>
        <p class="page-subtitle">Kelola data aplikasi Anda dari sini</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-30">
        <div class="col-6 col-lg-3">
            <div class="stat-card primary">
                <div class="stat-value"><?php echo e($totalUsers ?? 0); ?></div>
                <div class="stat-label">Total User</div>
                <div class="stat-icon"><i class="bi bi-people"></i></div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-value">100%</div>
                <div class="stat-label">Sistem Normal</div>
                <div class="stat-icon"><i class="bi bi-activity"></i></div>
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