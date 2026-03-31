

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

            $berandaStatFields = [
                1 => ['angka_key' => 'beranda_stat_1_angka', 'label_key' => 'beranda_stat_1_label', 'default_angka' => '150+', 'default_label' => 'Siswa Aktif'],
                2 => ['angka_key' => 'beranda_stat_2_angka', 'label_key' => 'beranda_stat_2_label', 'default_angka' => '10+', 'default_label' => 'Guru & Staff'],
                3 => ['angka_key' => 'beranda_stat_3_angka', 'label_key' => 'beranda_stat_3_label', 'default_angka' => '6', 'default_label' => 'Kelas'],
                4 => ['angka_key' => 'beranda_stat_4_angka', 'label_key' => 'beranda_stat_4_label', 'default_angka' => '50+', 'default_label' => 'Prestasi'],
            ];

            $berandaStatKeys = collect($berandaStatFields)
                ->flatMap(fn ($item) => [$item['angka_key'], $item['label_key']])
                ->values()
                ->all();

            $heroSlides = [];
            $heroSlidesSetting = $settings->get('beranda')?->firstWhere('key', 'hero_slides');
            if ($heroSlidesSetting) {
                $decodedHeroSlides = json_decode($heroSlidesSetting->value ?? '[]', true);
                if (is_array($decodedHeroSlides)) {
                    $heroSlides = array_values(array_filter(array_map(fn ($slide) => trim((string) $slide), $decodedHeroSlides)));
                }
            }
        ?>

        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi <?php echo e($groupLabels[$group]['icon'] ?? 'bi-gear'); ?>"></i>
                    <strong><?php echo e($groupLabels[$group]['label'] ?? ucfirst($group)); ?></strong>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <?php if($group === 'beranda'): ?>
                            <div class="col-12">
                                <div class="border rounded p-3 bg-light-subtle">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="mb-0">Statistik Beranda</h6>
                                        <small class="text-muted">Format per kartu: angka|label (contoh: 150+|Siswa Aktif)</small>
                                    </div>
                                    <div class="row g-3">
                                        <?php $__currentLoopData = $berandaStatFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $statField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $angkaSetting = $items->firstWhere('key', $statField['angka_key']);
                                                $labelSetting = $items->firstWhere('key', $statField['label_key']);
                                                $combinedValue = trim(($angkaSetting->value ?? $statField['default_angka']) . '|' . ($labelSetting->value ?? $statField['default_label']));
                                            ?>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <label class="form-label" for="beranda_stat_<?php echo e($index); ?>_combined">Kartu <?php echo e($index); ?></label>
                                                <input
                                                    type="text"
                                                    id="beranda_stat_<?php echo e($index); ?>_combined"
                                                    name="beranda_stat_<?php echo e($index); ?>_combined"
                                                    class="form-control"
                                                    value="<?php echo e(old('beranda_stat_' . $index . '_combined', $combinedValue)); ?>"
                                                    placeholder="<?php echo e($statField['default_angka']); ?>|<?php echo e($statField['default_label']); ?>"
                                                >
                                                <small class="text-muted d-block mt-1">Pisahkan dengan karakter |</small>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($setting->key, ['hero_background', 'hero_background_2', 'hero_background_3'])): ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php if(in_array($setting->key, $berandaStatKeys)): ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php if($setting->key === 'hero_slides'): ?>
                                <div class="col-12">
                                    <label class="form-label">Foto Hero Slides</label>

                                    <div class="row g-3 mb-2">
                                        <?php $__empty_1 = true; $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="col-12 col-md-4">
                                                <div class="border rounded p-2 h-100">
                                                    <img src="<?php echo e(asset($slide)); ?>" alt="Hero slide"
                                                        class="img-thumbnail w-100"
                                                        style="height: 140px; object-fit: cover;">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" name="hero_slides_delete[]" value="<?php echo e($slide); ?>" id="delete_slide_<?php echo e(md5($slide)); ?>">
                                                        <label class="form-check-label" for="delete_slide_<?php echo e(md5($slide)); ?>">
                                                            Hapus gambar ini
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="col-12">
                                                <div class="text-muted small">Belum ada slide hero. Tambahkan gambar baru di bawah.</div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div id="heroSlideInputs" class="d-flex flex-column gap-2"></div>
                                    <button type="button" id="addHeroSlideBtn" class="btn btn-outline-primary btn-sm mt-2">
                                        <i class="bi bi-plus-circle me-1"></i>Tambah Gambar Hero
                                    </button>
                                    <small class="text-muted d-block mt-2">Anda bisa menambah atau menghapus slide seperti pengelolaan data list. Jumlah slide di Beranda otomatis mengikuti jumlah gambar aktif.</small>
                                </div>
                                <?php continue; ?>
                            <?php endif; ?>

                            <div class="col-12 <?php echo e(!in_array($setting->key, ['tentang_visi', 'tentang_misi', 'sekolah_alamat', 'tentang_deskripsi', 'footer_maps_embed']) ? 'col-md-6' : ''); ?>">
                                <label class="form-label" for="<?php echo e($setting->key); ?>"><?php echo e($setting->label); ?></label>
                                <?php if(in_array($setting->key, ['sekolah_logo', 'sambutan_foto'])): ?>
                                    <?php if($setting->value): ?>
                                        <div class="mb-2">
                                            <img src="<?php echo e(asset($setting->value)); ?>" alt="Gambar saat ini"
                                                class="img-thumbnail"
                                                style="height: 100px; width: <?php echo e($setting->key === 'sekolah_logo' ? '100px' : 'auto'); ?>; object-fit: cover;">
                                            <small class="d-block text-muted mt-1">Gambar saat ini</small>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="1" id="clear_<?php echo e($setting->key); ?>" name="clear_<?php echo e($setting->key); ?>">
                                            <label class="form-check-label" for="clear_<?php echo e($setting->key); ?>">
                                                Hapus gambar ini
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" id="<?php echo e($setting->key); ?>" name="<?php echo e($setting->key); ?>" class="form-control" accept="image/*">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                <?php elseif(in_array($setting->key, ['tentang_visi', 'tentang_misi', 'footer_maps_embed']) || strlen($setting->value ?? '') > 80 || str_contains(strtolower($setting->label), 'deskripsi') || str_contains(strtolower($setting->label), 'alamat')): ?>
                                    <textarea
                                        id="<?php echo e($setting->key); ?>"
                                        name="<?php echo e($setting->key); ?>"
                                        class="form-control"
                                        rows="<?php echo e(in_array($setting->key, ['tentang_visi', 'tentang_misi']) ? 8 : (in_array($setting->key, ['footer_maps_embed']) ? 4 : 3)); ?>"
                                    ><?php echo e(old($setting->key, $setting->value)); ?></textarea>
                                    <?php if(in_array($setting->key, ['tentang_visi', 'tentang_misi'])): ?>
                                        <small class="text-muted">Tulis satu poin per baris. Tekan Enter untuk baris baru.</small>
                                    <?php elseif($setting->key === 'footer_maps_embed'): ?>
                                        <small class="text-muted">Tempel URL embed dari Google Maps (nilai pada atribut src iframe).</small>
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

<?php $__env->startSection('scripts'); ?>
<script>
    (function () {
        const addBtn = document.getElementById('addHeroSlideBtn');
        const container = document.getElementById('heroSlideInputs');
        if (!addBtn || !container) return;

        function createInputRow() {
            const row = document.createElement('div');
            row.className = 'd-flex gap-2 align-items-center';
            row.innerHTML = `
                <input type="file" name="hero_slides_new[]" class="form-control" accept="image/*">
                <button type="button" class="btn btn-outline-danger btn-sm" title="Hapus input">
                    <i class="bi bi-trash"></i>
                </button>
            `;

            row.querySelector('button')?.addEventListener('click', function () {
                row.remove();
            });

            container.appendChild(row);
        }

        addBtn.addEventListener('click', createInputRow);
        createInputRow();
    })();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>