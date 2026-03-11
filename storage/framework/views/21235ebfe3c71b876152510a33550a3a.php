

<?php $__env->startSection('page_title', 'PPDB'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h4 mb-0">Kelola PPDB</h2>
            <p class="text-muted small mt-1">Atur informasi, persyaratan, dan alur pendaftaran peserta didik baru</p>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center gap-2">
            <i class="bi bi-sliders"></i>
            <strong>Pengaturan Umum PPDB</strong>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.ppdb.settings.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="ppdb_tahun_ajaran" name="ppdb_tahun_ajaran"
                            value="<?php echo e($settings['ppdb_tahun_ajaran']->value ?? '2026/2027'); ?>"
                            placeholder="contoh: 2026/2027">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_tanggal">Tanggal Pendaftaran</label>
                        <input type="text" class="form-control" id="ppdb_tanggal" name="ppdb_tanggal"
                            value="<?php echo e($settings['ppdb_tanggal']->value ?? ''); ?>"
                            placeholder="contoh: 1 Juni – 14 Juni 2026">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_jam">Jam Pendaftaran</label>
                        <input type="text" class="form-control" id="ppdb_jam" name="ppdb_jam"
                            value="<?php echo e($settings['ppdb_jam']->value ?? ''); ?>"
                            placeholder="contoh: Senin – Sabtu, 08.00 – 13.00 WIB">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_lokasi">Tempat Pendaftaran</label>
                        <input type="text" class="form-control" id="ppdb_lokasi" name="ppdb_lokasi"
                            value="<?php echo e($settings['ppdb_lokasi']->value ?? ''); ?>"
                            placeholder="contoh: Ruang Tata Usaha">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="ppdb_lokasi_detail">Detail Lokasi</label>
                        <input type="text" class="form-control" id="ppdb_lokasi_detail" name="ppdb_lokasi_detail"
                            value="<?php echo e($settings['ppdb_lokasi_detail']->value ?? ''); ?>"
                            placeholder="contoh: SD Negeri 3 Krasak, Jl. Raya Krasak No. 45">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_kuota">Kuota Penerimaan</label>
                        <input type="text" class="form-control" id="ppdb_kuota" name="ppdb_kuota"
                            value="<?php echo e($settings['ppdb_kuota']->value ?? ''); ?>"
                            placeholder="contoh: 28 Siswa Baru">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ppdb_kuota_keterangan">Keterangan Kuota</label>
                        <input type="text" class="form-control" id="ppdb_kuota_keterangan" name="ppdb_kuota_keterangan"
                            value="<?php echo e($settings['ppdb_kuota_keterangan']->value ?? ''); ?>"
                            placeholder="contoh: Kelas 1 Tahun Ajaran 2026/2027">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="ppdb_syarat_usia">
                            Syarat Usia
                            <small class="text-muted fw-normal">(satu syarat per baris)</small>
                        </label>
                        <textarea class="form-control" id="ppdb_syarat_usia" name="ppdb_syarat_usia" rows="4"
                            placeholder="Berusia 7 tahun wajib diterima (prioritas utama)&#10;Berusia 6 tahun dapat diterima jika kuota masih tersedia"><?php echo e($settings['ppdb_syarat_usia']->value ?? ''); ?></textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-check"></i>
                <strong>Persyaratan Dokumen</strong>
                <span class="badge bg-secondary"><?php echo e($dokumen->count()); ?></span>
            </div>
            <a href="<?php echo e(route('admin.ppdb.create', ['type' => 'dokumen'])); ?>" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Dokumen
            </a>
        </div>
        <div class="card-body p-0">
            <?php if($dokumen->isEmpty()): ?>
                <p class="text-muted text-center py-4">Belum ada item dokumen.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width:60px">Urutan</th>
                                <th style="width:50px">Icon</th>
                                <th>Judul</th>
                                <th class="d-none d-md-table-cell">Deskripsi</th>
                                <th style="width:90px">Status</th>
                                <th style="width:110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center fw-semibold"><?php echo e($item->urutan); ?></td>
                                    <td class="text-center">
                                        <i class="bi <?php echo e($item->icon ?: 'bi-file-earmark'); ?> fs-5 text-primary"></i>
                                    </td>
                                    <td class="fw-semibold"><?php echo e($item->judul); ?></td>
                                    <td class="d-none d-md-table-cell text-muted small"><?php echo e(Str::limit($item->deskripsi, 80)); ?></td>
                                    <td>
                                        <?php if($item->aktif): ?>
                                            <span class="badge bg-success">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.ppdb.edit', $item)); ?>" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.ppdb.destroy', $item)); ?>" method="POST" class="d-inline"
                                            onsubmit="return confirm('Hapus item ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-list-ol"></i>
                <strong>Alur Pendaftaran</strong>
                <span class="badge bg-secondary"><?php echo e($alur->count()); ?></span>
            </div>
            <a href="<?php echo e(route('admin.ppdb.create', ['type' => 'alur'])); ?>" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Tambah Langkah
            </a>
        </div>
        <div class="card-body p-0">
            <?php if($alur->isEmpty()): ?>
                <p class="text-muted text-center py-4">Belum ada langkah alur pendaftaran.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width:60px">Urutan</th>
                                <th>Judul Langkah</th>
                                <th class="d-none d-md-table-cell">Deskripsi</th>
                                <th style="width:90px">Status</th>
                                <th style="width:110px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $alur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center">
                                        <span class="badge bg-indigo" style="background-color:#007AFF;font-size:.85rem;width:28px;height:28px;line-height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;">
                                            <?php echo e($step->urutan); ?>

                                        </span>
                                    </td>
                                    <td class="fw-semibold"><?php echo e($step->judul); ?></td>
                                    <td class="d-none d-md-table-cell text-muted small"><?php echo e(Str::limit($step->deskripsi, 80)); ?></td>
                                    <td>
                                        <?php if($step->aktif): ?>
                                            <span class="badge bg-success">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.ppdb.edit', $step)); ?>" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.ppdb.destroy', $step)); ?>" method="POST" class="d-inline"
                                            onsubmit="return confirm('Hapus langkah ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/ppdb/index.blade.php ENDPATH**/ ?>