

<?php $__env->startSection('page_title', 'Kelola Galeri'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .galeri-img { height: 130px; object-fit: cover; }
    @media (min-width: 768px) { .galeri-img { height: 200px; } }
    .galeri-placeholder { height: 130px; }
    @media (min-width: 768px) { .galeri-placeholder { height: 200px; } }
</style>
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-8 col-md-6">
            <h2 class="h4">Daftar Galeri Foto</h2>
        </div>
        <div class="col-4 col-md-6 text-end">
            <a href="<?php echo e(route('admin.galeris.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Tambah Foto</span>
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
            <div class="col-6 col-md-4 mb-3 mb-md-4">
                <div class="card h-100">
                    <?php if($galeri->gambar): ?>
                        <img src="<?php echo e(asset('storage/' . $galeri->gambar)); ?>" class="card-img-top galeri-img" alt="<?php echo e($galeri->judul); ?>">
                    <?php else: ?>
                        <div class="card-img-top bg-light galeri-placeholder d-flex align-items-center justify-content-center">
                            <i class="bi bi-image" style="font-size: 2rem; color: #ccc;"></i>
                        </div>
                    <?php endif; ?>
                    <div class="card-body p-2 p-md-3">
                        <h5 class="card-title fs-6 mb-1" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo e($galeri->judul); ?></h5>
                        <p class="card-text small text-muted d-none d-md-block"><?php echo e(Str::limit($galeri->deskripsi, 80)); ?></p>
                        <div class="small mb-2">
                            <span class="badge bg-primary d-none d-sm-inline"><?php echo e($galeri->tanggal_upload->format('d M Y')); ?></span>
                            <?php if($galeri->status == 'aktif'): ?>
                                <span class="badge bg-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Nonaktif</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top p-2">
                        <div class="d-flex gap-1 justify-content-center">
                            <a href="<?php echo e(route('admin.galeris.show', $galeri)); ?>" class="btn btn-sm btn-outline-secondary flex-fill" title="Lihat">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="<?php echo e(route('admin.galeris.edit', $galeri)); ?>" class="btn btn-sm btn-outline-secondary flex-fill" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="<?php echo e(route('admin.galeris.destroy', $galeri)); ?>" method="POST" class="flex-fill">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-secondary w-100" title="Hapus" onclick="return confirm('Yakin hapus foto ini?')">
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