

<?php $__env->startSection('page_title', 'Kelola Galeri'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="h4">Daftar Galeri Foto</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo e(route('admin.galeris.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Foto
            </a>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e($message); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <?php if($galeri->gambar): ?>
                        <img src="<?php echo e(asset('storage/' . $galeri->gambar)); ?>" class="card-img-top" alt="<?php echo e($galeri->judul); ?>" style="height: 250px; object-fit: cover;">
                    <?php else: ?>
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="bi bi-image" style="font-size: 3rem; color: #ccc;"></i>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($galeri->judul); ?></h5>
                        <p class="card-text small text-muted"><?php echo e(Str::limit($galeri->deskripsi, 100)); ?></p>
                        <div class="small mb-3">
                            <span class="badge bg-primary"><?php echo e($galeri->tanggal_upload->format('d M Y')); ?></span>
                            <?php if($galeri->status == 'aktif'): ?>
                                <span class="badge bg-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Nonaktif</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="btn-group btn-group-sm w-100" role="group">
                            <a href="<?php echo e(route('admin.galeris.show', $galeri)); ?>" class="btn btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="<?php echo e(route('admin.galeris.edit', $galeri)); ?>" class="btn btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="<?php echo e(route('admin.galeris.destroy', $galeri)); ?>" method="POST" style="flex: 1;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm w-100" onclick="return confirm('Yakin hapus foto ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="card text-center py-5">
                    <p class="text-muted mb-0">Tidak ada foto galeri</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <?php echo e($galeris->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/galeris/index.blade.php ENDPATH**/ ?>