

<?php $__env->startSection('page_title', 'Kelola Guru & Staff'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-8 col-md-6">
            <h2 class="h4 mb-0">Guru & Staff</h2>
        </div>
        <div class="col-4 col-md-6 text-end">
            <a href="<?php echo e(route('admin.guru-staffs.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> <span class="d-none d-sm-inline">Tambah</span>
            </a>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php
        $kategoriLabels = \App\Models\GuruStaff::$kategoriLabels;
        $urutan = ['kepala_sekolah', 'guru_kelas', 'guru_mapel', 'staff'];
    ?>

    <?php $__currentLoopData = $urutan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($guruStaffs[$kat]) && $guruStaffs[$kat]->count()): ?>
            <div class="card mb-4">
                <div class="card-header"><strong><?php echo e($kategoriLabels[$kat]); ?></strong></div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width:50px">Foto</th>
                                <th>Nama</th>
                                <th class="d-none d-md-table-cell">Jabatan</th>
                                <th class="d-none d-sm-table-cell">Urutan</th>
                                <th style="width:80px">Status</th>
                                <th style="width:110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $guruStaffs[$kat]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php if($gs->foto): ?>
                                            <img src="<?php echo e(asset('storage/' . $gs->foto)); ?>" class="rounded-circle" style="width:36px;height:36px;object-fit:cover;">
                                        <?php else: ?>
                                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width:36px;height:36px;font-size:14px;">
                                                <?php echo e(substr($gs->nama, 0, 1)); ?>

                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong class="d-block" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:150px;"><?php echo e($gs->nama); ?></strong>
                                        <small class="text-muted d-md-none"><?php echo e($gs->jabatan); ?></small>
                                    </td>
                                    <td class="d-none d-md-table-cell"><?php echo e($gs->jabatan); ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo e($gs->urutan); ?></td>
                                    <td>
                                        <?php if($gs->aktif): ?>
                                            <span class="badge bg-success">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="<?php echo e(route('admin.guru-staffs.edit', $gs)); ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.guru-staffs.destroy', $gs)); ?>" method="POST" style="display:inline;">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-secondary" title="Hapus" onclick="return confirm('Yakin hapus?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($guruStaffs->isEmpty()): ?>
        <div class="card text-center py-5">
            <p class="text-muted">Belum ada data guru & staff. <a href="<?php echo e(route('admin.guru-staffs.create')); ?>">Tambah sekarang</a></p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/guru-staffs/index.blade.php ENDPATH**/ ?>