

<?php $__env->startSection('title', 'Tentang Kami - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- About Section -->
    <section class="py-12 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <!-- Section Header -->
            <div class="text-center mb-10 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4"><?php echo e(\App\Models\Setting::get('tentang_judul', 'Tentang SD Negeri 3 Krasak')); ?></h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto"><?php echo e(\App\Models\Setting::get('tentang_subjudul', 'Mengenal lebih dekat sekolah kami dan komitmen kami terhadap pendidikan berkualitas')); ?></p>
            </div>

            <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-3"><?php echo e(\App\Models\Setting::get('tentang_deskripsi_judul', 'Deskripsi Singkat')); ?></h3>
                <p class="text-gray-700 leading-relaxed">
                    <?php echo e(\App\Models\Setting::get('tentang_deskripsi', 'SD Negeri 3 Krasak Bangsri merupakan sekolah dasar yang berkomitmen memberikan pendidikan berkualitas, membentuk karakter siswa, dan mendorong prestasi akademik maupun non akademik.')); ?>

                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4"><?php echo e(\App\Models\Setting::get('tentang_profil_judul', 'Profil Sekolah')); ?></h3>
                <?php
                    $profilItems = [
                        [
                            'label' => \App\Models\Setting::get('tentang_label_status', 'Status'),
                            'value' => \App\Models\Setting::get('sekolah_status', 'Sekolah Negeri'),
                            'span' => '',
                        ],
                        [
                            'label' => \App\Models\Setting::get('tentang_label_npsn', 'NPSN'),
                            'value' => \App\Models\Setting::get('npsn', '20318102'),
                            'span' => '',
                        ],
                        [
                            'label' => \App\Models\Setting::get('tentang_label_akreditasi', 'Akreditasi'),
                            'value' => \App\Models\Setting::get('akreditasi', 'A'),
                            'span' => '',
                        ],
                        [
                            'label' => \App\Models\Setting::get('tentang_label_email', 'Email'),
                            'value' => \App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com'),
                            'span' => '',
                        ],
                        [
                            'label' => \App\Models\Setting::get('tentang_label_alamat', 'Alamat'),
                            'value' => \App\Models\Setting::get('sekolah_alamat', 'Jl. Raya Krasak No. 45, Desa Krasak, Kec. Bangsri, Kabupaten Jepara, Jawa Tengah 59453'),
                            'span' => 'md:col-span-2',
                        ],
                    ];
                ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php $__currentLoopData = $profilItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-xl border border-blue-100 bg-blue-50/40 p-4 <?php echo e($item['span']); ?>">
                            <p class="text-sm font-semibold text-gray-900 mb-1"><?php echo e($item['label']); ?></p>
                            <p class="text-gray-700 leading-relaxed"><?php echo e($item['value']); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Visi & Misi Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Visi Card -->
                <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6"><?php echo e(\App\Models\Setting::get('tentang_visi_judul', 'Visi Kami')); ?></h3>
                    <ul class="space-y-3">
                        <?php $__currentLoopData = array_filter(explode("\n", \App\Models\Setting::get('tentang_visi', ''))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mt-2 shrink-0"></span>
                                <span><?php echo e(trim($poin)); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <!-- Misi Card -->
                <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6"><?php echo e(\App\Models\Setting::get('tentang_misi_judul', 'Misi Kami')); ?></h3>
                    <ul class="space-y-3">
                        <?php $__currentLoopData = array_filter(explode("\n", \App\Models\Setting::get('tentang_misi', ''))); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mt-2 shrink-0"></span>
                                <span><?php echo e(trim($poin)); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Section -->
    <section class="py-10 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 animate-fadeInUp">
            <div class="text-center mb-8">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3"><?php echo e(\App\Models\Setting::get('tentang_prestasi_judul', 'Prestasi')); ?></h2>
                <p class="text-gray-600"><?php echo e(\App\Models\Setting::get('tentang_prestasi_subjudul', 'Pencapaian membanggakan siswa dan sekolah kami')); ?></p>
            </div>
            <div class="space-y-4">
                <?php if(isset($prestasis) && $prestasis->count() > 0): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__currentLoopData = $prestasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-hover bg-white rounded-xl border-2 border-yellow-100 hover:border-yellow-300 hover:shadow-xl transition-all duration-300 overflow-hidden">
                                <div class="h-44 bg-gradient-to-br from-yellow-100 to-yellow-50 overflow-hidden">
                                    <?php if($prestasi->foto): ?>
                                        <img src="<?php echo e(asset('storage/' . $prestasi->foto)); ?>" alt="<?php echo e($prestasi->judul); ?>" class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="bi bi-trophy-fill text-yellow-500 text-5xl opacity-70"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-5">
                                    <h4 class="font-bold text-gray-900 text-lg mb-1"><?php echo e($prestasi->judul); ?></h4>
                                    <?php if($prestasi->keterangan): ?>
                                        <p class="text-gray-600 text-sm mb-3"><?php echo e($prestasi->keterangan); ?></p>
                                    <?php endif; ?>
                                    <?php if($prestasi->tahun): ?>
                                        <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full"><?php echo e($prestasi->tahun); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php
                            $defaultPrestasi = [
                                ['judul' => 'Juara 1 Pentaque', 'keterangan' => 'Tingkat Kabupaten Jepara', 'tahun' => '2025'],
                                ['judul' => 'Juara 2 Literasi', 'keterangan' => 'Lomba Bercerita Tingkat Kecamatan', 'tahun' => '2025'],
                                ['judul' => 'Sekolah Adiwiyata', 'keterangan' => 'Penghargaan Sekolah Peduli Lingkungan', 'tahun' => '2024'],
                            ];
                        ?>
                        <?php $__currentLoopData = $defaultPrestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-hover bg-white rounded-xl p-6 border-2 border-yellow-100 hover:border-yellow-300 hover:shadow-xl transition-all duration-300">
                                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center mb-4">
                                    <i class="bi bi-trophy-fill text-yellow-500 text-xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1"><?php echo e($p['judul']); ?></h4>
                                <p class="text-gray-600 text-sm mb-3"><?php echo e($p['keterangan']); ?></p>
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full"><?php echo e($p['tahun']); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/tentang.blade.php ENDPATH**/ ?>