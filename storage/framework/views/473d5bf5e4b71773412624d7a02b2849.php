

<?php $__env->startSection('page_title', 'Pengaturan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h4 mb-0">Pengaturan Website</h2>
            <p class="text-muted small mt-1">Kelola informasi dan konten yang tampil di website</p>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <?php
            $groupLabels = [
                'sekolah' => ['label' => 'Informasi Sekolah', 'icon' => 'bi-building'],
                'beranda' => ['label' => 'Beranda (Hero)', 'icon' => 'bi-house-door'],
                'tentang' => ['label' => 'Halaman Tentang', 'icon' => 'bi-info-circle'],
            ];
        ?>

        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi <?php echo e($groupLabels[$group]['icon'] ?? 'bi-gear'); ?>"></i>
                    <strong><?php echo e($groupLabels[$group]['label'] ?? ucfirst($group)); ?></strong>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 <?php echo e(!in_array($setting->key, ['tentang_visi', 'tentang_misi', 'sekolah_alamat', 'tentang_deskripsi']) ? 'col-md-6' : ''); ?>">
                                <label class="form-label" for="<?php echo e($setting->key); ?>"><?php echo e($setting->label); ?></label>
                                <?php if($setting->key === 'hero_background'): ?>
                                    <?php if($setting->value): ?>
                                        <div class="mb-2">
                                            <img src="<?php echo e(asset($setting->value)); ?>" alt="Background saat ini" class="img-thumbnail" style="height: 100px; object-fit: cover;">
                                            <small class="d-block text-muted mt-1">Gambar saat ini</small>
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" id="<?php echo e($setting->key); ?>" name="<?php echo e($setting->key); ?>" class="form-control" accept="image/*">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                <?php elseif(in_array($setting->key, ['tentang_visi', 'tentang_misi']) || strlen($setting->value ?? '') > 80 || str_contains(strtolower($setting->label), 'deskripsi') || str_contains(strtolower($setting->label), 'alamat')): ?>
                                    <textarea
                                        id="<?php echo e($setting->key); ?>"
                                        name="<?php echo e($setting->key); ?>"
                                        class="form-control"
                                        rows="<?php echo e(in_array($setting->key, ['tentang_visi', 'tentang_misi']) ? 8 : 3); ?>"
                                    ><?php echo e(old($setting->key, $setting->value)); ?></textarea>
                                    <?php if(in_array($setting->key, ['tentang_visi', 'tentang_misi'])): ?>
                                        <small class="text-muted">Tulis satu poin per baris. Tekan Enter untuk baris baru.</small>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <input
                                        type="text"
                                        id="<?php echo e($setting->key); ?>"
                                        name="<?php echo e($setting->key); ?>"
                                        class="form-control"
                                        value="<?php echo e(old($setting->key, $setting->value)); ?>"
                                    >
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="d-flex justify-content-end mb-4">
            <button type="submit" class="btn btn-primary px-5">
                <i class="bi bi-save me-2"></i>Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>