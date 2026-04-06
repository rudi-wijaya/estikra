

<?php $__env->startSection('page_title', 'Detail Berita'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="h4"><?php echo e($berita->judul); ?></h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="<?php echo e(route('admin.beritas.edit', $berita)); ?>" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="<?php echo e(route('admin.beritas.index')); ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <?php if($berita->gambar): ?>
                <div class="mb-4">
                    <img src="<?php echo e(asset('storage/' . $berita->gambar)); ?>" alt="<?php echo e($berita->judul); ?>" class="img-fluid rounded">
                </div>
            <?php endif; ?>

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="text-muted small">Tanggal Terbit</label>
                    <p class="mb-0"><strong><?php echo e($berita->tanggal_terbit->format('d F Y')); ?></strong></p>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small">Status</label>
                    <p class="mb-0">
                        <?php if($berita->status == 'published'): ?>
                            <span class="badge bg-success">Published</span>
                        <?php elseif($berita->status == 'draft'): ?>
                            <span class="badge bg-warning">Draft</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Archived</span>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <label class="text-muted small">Dibuat</label>
                    <p class="mb-0"><strong><?php echo e($berita->created_at->format('d F Y H:i')); ?></strong></p>
                </div>
            </div>

            <hr>

            <div class="mb-4">
                <h5>Konten</h5>
                <div class="card bg-light">
                    <div class="card-body">
                        <?php echo nl2br(e($berita->konten)); ?>

                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="<?php echo e(route('admin.beritas.destroy', $berita)); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus berita ini?')">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
                <a href="<?php echo e(route('admin.beritas.edit', $berita)); ?>" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="<?php echo e(route('admin.beritas.index')); ?>" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/beritas/show.blade.php ENDPATH**/ ?>