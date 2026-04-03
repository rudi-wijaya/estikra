

<?php $__env->startSection('page_title', 'Kelola Prestasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
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

    <div class="card">
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
                            <td colspan="6" class="text-center py-4">Belum ada data prestasi</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if($prestasis->hasPages()): ?>
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($prestasis->links()); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/prestasis/index.blade.php ENDPATH**/ ?>