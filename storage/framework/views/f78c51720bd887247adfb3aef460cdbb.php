

<?php $__env->startSection('page_title', isset($guruStaff->id) ? 'Edit Guru/Staff' : 'Tambah Guru/Staff'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h4 mb-0"><?php echo e(isset($guruStaff->id) ? 'Edit' : 'Tambah'); ?> Guru / Staff</h2>
        </div>
        <div class="text-end">
            <a href="<?php echo e(route('admin.guru-staffs.index')); ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(isset($guruStaff->id) ? route('admin.guru-staffs.update', $guruStaff) : route('admin.guru-staffs.store')); ?>"
                  method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php if(isset($guruStaff->id)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

                <div class="row g-3">
                    <!-- Foto -->
                    <div class="col-12 col-md-4 text-center">
                        <label class="form-label d-block">Foto</label>
                        <div id="fotoPreviewWrapper" class="mb-2">
                            <?php if($guruStaff->foto): ?>
                                <img id="fotoPreview" src="<?php echo e(asset('storage/' . $guruStaff->foto)); ?>"
                                     class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                            <?php else: ?>
                                <div id="fotoPreview" class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white mx-auto"
                                     style="width:120px;height:120px;font-size:40px;">
                                    <?php echo e(substr($guruStaff->nama ?? '?', 0, 1)); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                        <small class="text-muted">Maks. 2MB. Kosongkan jika tidak diubah.</small>
                    </div>

                    <!-- Data -->
                    <div class="col-12 col-md-8">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('nama', $guruStaff->nama)); ?>" required>
                                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" name="jabatan" class="form-control <?php $__errorArgs = ['jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('jabatan', $guruStaff->jabatan)); ?>" required placeholder="cth: Guru Kelas I A">
                                <?php $__errorArgs = ['jabatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select name="kategori" class="form-select <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <?php $__currentLoopData = \App\Models\GuruStaff::$kategoriLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($val); ?>" <?php echo e(old('kategori', $guruStaff->kategori) == $val ? 'selected' : ''); ?>>
                                            <?php echo e($label); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label class="form-label">Urutan Tampil</label>
                                <input type="number" name="urutan" class="form-control"
                                       value="<?php echo e(old('urutan', $guruStaff->urutan ?? 0)); ?>" min="0">
                                <small class="text-muted">Angka kecil tampil lebih dulu</small>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Deskripsi Singkat</label>
                                <textarea name="deskripsi" class="form-control" rows="2"
                                          placeholder="cth: Berpengalaman dalam pembelajaran aktif..."><?php echo e(old('deskripsi', $guruStaff->deskripsi)); ?></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="aktif" id="aktif" class="form-check-input" value="1"
                                           <?php echo e(old('aktif', $guruStaff->aktif ?? true) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="aktif">Tampilkan di website</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mt-4">
                <div class="d-flex justify-content-end gap-2">
                    <a href="<?php echo e(route('admin.guru-staffs.index')); ?>" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startSection('scripts'); ?>
<script>
    document.getElementById('foto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(ev) {
            const wrapper = document.getElementById('fotoPreviewWrapper');
            wrapper.innerHTML = `<img id="fotoPreview" src="${ev.target.result}"
                class="rounded-circle mx-auto d-block" style="width:120px;height:120px;object-fit:cover;">`;
        };
        reader.readAsDataURL(file);
    });
</script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/guru-staffs/form.blade.php ENDPATH**/ ?>