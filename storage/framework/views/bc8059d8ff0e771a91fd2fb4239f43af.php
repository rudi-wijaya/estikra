

<?php $__env->startSection('title', 'Program - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Programs Section -->
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Program Unggulan Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Program-program terbaik dirancang untuk mengembangkan potensi akademik dan karakter siswa</p>
            </div>

            <!-- Programs Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <!-- Program Card -->
                <div class="card-hover group bg-white rounded-2xl overflow-hidden border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 shadow-md hover:shadow-lg">
                    <!-- Program Image -->
                    <div class="w-full h-48 bg-blue-100 flex items-center justify-center overflow-hidden">
                        <?php if($program->foto): ?>
                            <img src="<?php echo e(asset('storage/' . $program->foto)); ?>" alt="<?php echo e($program->judul); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <?php else: ?>
                            <?php
                                $icons = [
                                    'Literasi' => 'bi-book',
                                    'Sholat Dhuha' => 'bi-moon-stars',
                                    'Pentaque' => 'bi-bullseye',
                                ];
                                $icon = $icons[$program->judul] ?? 'bi-star';
                            ?>
                            <i class="bi <?php echo e($icon); ?> text-blue-600 text-6xl opacity-50"></i>
                        <?php endif; ?>
                    </div>

                    <!-- Program Info -->
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3"><?php echo e($program->judul); ?></h3>
                        <p class="text-gray-600 leading-relaxed"><?php echo e($program->deskripsi); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-12 text-gray-400">
                    <p class="text-lg">Belum ada program unggulan yang ditambahkan.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/program.blade.php ENDPATH**/ ?>