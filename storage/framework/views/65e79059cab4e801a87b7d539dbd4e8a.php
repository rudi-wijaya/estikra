

<?php $__env->startSection('page_title', 'Kelola Berita'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2 class="h4">Daftar Berita</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="<?php echo e(route('admin.beritas.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Berita
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
                        <th style="width: 50px">ID</th>
                        <th>Judul</th>
                        <th style="width: 100px">Tanggal</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($berita->id); ?></td>
                            <td>
                                <strong><?php echo e($berita->judul); ?></strong><br>
                                <small class="text-muted"><?php echo e(Str::limit($berita->konten, 100)); ?></small>
                            </td>
                            <td><?php echo e($berita->tanggal_terbit->format('d M Y')); ?></td>
                            <td>
                                <?php if($berita->status == 'published'): ?>
                                    <span class="badge bg-success">Published</span>
                                <?php elseif($berita->status == 'draft'): ?>
                                    <span class="badge bg-warning">Draft</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Archived</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.beritas.show', $berita)); ?>" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.beritas.edit', $berita)); ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('admin.beritas.destroy', $berita)); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus berita ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada berita</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <?php echo e($beritas->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/beritas/index.blade.php ENDPATH**/ ?>