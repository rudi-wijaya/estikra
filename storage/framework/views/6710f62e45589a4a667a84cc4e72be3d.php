

<?php $__env->startSection('title', 'PPDB ' . \App\Models\Setting::get('ppdb_tahun_ajaran', '2026') . ' - ' . \App\Models\Setting::get('sekolah_nama', 'SD Negeri 3 Krasak Bangsri')); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero PPDB -->
    <section class="py-16 bg-gradient-to-br from-blue-600 to-indigo-700 text-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 text-center">
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm border border-white/30 text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-6">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Tahun Ajaran <?php echo e(\App\Models\Setting::get('ppdb_tahun_ajaran', '2026/2027')); ?></span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black mb-4 leading-tight">Penerimaan Peserta Didik Baru</h1>
            <p class="text-xl text-blue-100 font-semibold mb-2">PPDB <?php echo e(\App\Models\Setting::get('ppdb_tahun_ajaran', '2026')); ?> — <?php echo e(\App\Models\Setting::get('sekolah_nama', 'SD Negeri 3 Krasak Bangsri')); ?></p>
            <p class="text-blue-200 max-w-2xl mx-auto">Pendaftaran dilakukan secara <strong class="text-white">offline</strong> langsung di sekolah. Kami membuka kesempatan bagi putra-putri terbaik untuk bergabung dan tumbuh bersama kami.</p>
        </div>
    </section>

    <!-- Info Penting -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Jadwal -->
                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 text-center">
                    <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-calendar3 text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Jadwal Pendaftaran</h3>
                    <p class="text-blue-700 font-semibold text-sm"><?php echo e(\App\Models\Setting::get('ppdb_tanggal', '1 Juni – 14 Juni 2026')); ?></p>
                    <p class="text-gray-500 text-xs mt-1"><?php echo e(\App\Models\Setting::get('ppdb_jam', 'Senin – Sabtu, 08.00 – 13.00 WIB')); ?></p>
                </div>
                <!-- Lokasi -->
                <div class="bg-indigo-50 border border-indigo-100 rounded-2xl p-6 text-center">
                    <div class="w-14 h-14 bg-indigo-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-geo-alt-fill text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Lokasi Pendaftaran</h3>
                    <p class="text-indigo-700 font-semibold text-sm"><?php echo e(\App\Models\Setting::get('ppdb_lokasi', 'Ruang Tata Usaha')); ?></p>
                    <p class="text-gray-500 text-xs mt-1"><?php echo e(\App\Models\Setting::get('ppdb_lokasi_detail', 'SD Negeri 3 Krasak, Jl. Raya Krasak No. 45')); ?></p>
                </div>
                <!-- Kuota -->
                <div class="bg-green-50 border border-green-100 rounded-2xl p-6 text-center">
                    <div class="w-14 h-14 bg-green-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-people-fill text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Kuota Penerimaan</h3>
                    <p class="text-green-700 font-semibold text-sm"><?php echo e(\App\Models\Setting::get('ppdb_kuota', '28 Siswa Baru')); ?></p>
                    <p class="text-gray-500 text-xs mt-1"><?php echo e(\App\Models\Setting::get('ppdb_kuota_keterangan', 'Kelas 1 Tahun Ajaran 2026/2027')); ?></p>
                </div>
            </div>

            <!-- Syarat Usia -->
            <?php
                $syaratUsia = array_values(array_filter(
                    array_map('trim', explode("\n", \App\Models\Setting::get('ppdb_syarat_usia',
                        "Berusia 7 tahun wajib diterima (prioritas utama)\nBerusia 6 tahun pada 1 Juli 2026 dapat diterima jika kuota masih tersedia\nBerusia 5 tahun 6 bulan dapat dipertimbangkan dengan rekomendasi psikolog"
                    )))
                ));
            ?>
            <?php if(count($syaratUsia)): ?>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-xl p-5 mb-10 flex gap-4 items-start">
                <i class="bi bi-exclamation-triangle-fill text-yellow-500 text-2xl shrink-0 mt-0.5"></i>
                <div>
                    <h4 class="font-bold text-gray-900 mb-1">Syarat Usia Calon Peserta Didik</h4>
                    <ul class="text-gray-700 text-sm space-y-1 list-disc list-inside">
                        <?php $__currentLoopData = $syaratUsia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $syarat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($syarat); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Persyaratan Dokumen -->
                <?php if($dokumen->count()): ?>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center text-sm font-bold">1</span>
                        Persyaratan Dokumen
                    </h2>
                    <div class="space-y-3">
                        <?php $__currentLoopData = $dokumen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center shrink-0">
                                <i class="bi <?php echo e($item->icon ?: 'bi-file-earmark'); ?> text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-sm"><?php echo e($item->judul); ?></p>
                                <?php if($item->deskripsi): ?>
                                    <p class="text-gray-500 text-xs mt-0.5"><?php echo e($item->deskripsi); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Alur Pendaftaran -->
                <?php if($alur->count()): ?>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 bg-indigo-600 text-white rounded-lg flex items-center justify-center text-sm font-bold">2</span>
                        Alur Pendaftaran
                    </h2>
                    <div class="relative">
                        <div class="absolute left-5 top-6 bottom-6 w-0.5 bg-indigo-100"></div>
                        <div class="space-y-5">
                            <?php $__currentLoopData = $alur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex gap-4 relative">
                                <div class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center font-bold text-sm shrink-0 z-10 shadow"><?php echo e($i + 1); ?></div>
                                <div class="pt-1.5">
                                    <p class="font-semibold text-gray-900 text-sm"><?php echo e($step->judul); ?></p>
                                    <?php if($step->deskripsi): ?>
                                        <p class="text-gray-500 text-xs mt-0.5"><?php echo e($step->deskripsi); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Kontak & CTA -->
    <section class="py-12 bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <div class="bg-white rounded-3xl shadow-sm border border-blue-100 p-8 md:p-12 flex flex-col md:flex-row items-center gap-8">
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Ada pertanyaan seputar PPDB?</h3>
                    <p class="text-gray-600 mb-4">Hubungi kami langsung atau datang ke sekolah pada jam kerja untuk informasi lebih lanjut.</p>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="tel:<?php echo e(\App\Models\Setting::get('sekolah_telepon', '(0291) 771380')); ?>" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-200 shadow-sm">
                            <i class="bi bi-telephone-fill"></i>
                            <span><?php echo e(\App\Models\Setting::get('sekolah_telepon', '(0291) 771380')); ?></span>
                        </a>
                        <a href="/kontak" class="inline-flex items-center gap-2 border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-semibold px-6 py-3 rounded-xl transition-all duration-200">
                            <i class="bi bi-envelope-fill"></i>
                            <span>Kirim Pesan</span>
                        </a>
                    </div>
                </div>
                <div class="w-full md:w-auto flex-shrink-0">
                    <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 text-center min-w-[200px]">
                        <i class="bi bi-clock-fill text-blue-500 text-3xl block mb-2"></i>
                        <p class="font-bold text-gray-900 text-sm">Jam Layanan PPDB</p>
                        <p class="text-blue-600 font-semibold text-sm mt-1"><?php echo e(\App\Models\Setting::get('ppdb_jam', 'Senin – Sabtu, 08.00 – 13.00 WIB')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/ppdb.blade.php ENDPATH**/ ?>