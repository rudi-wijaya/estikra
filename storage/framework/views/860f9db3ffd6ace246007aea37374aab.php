

<?php $__env->startSection('title', 'Galeri Foto - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Gallery Section -->
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Galeri Foto Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Dokumentasi kegiatan dan momen berharga di sekolah kami</p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <?php $__empty_1 = true; $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative">
                            <?php if($galeri->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $galeri->gambar)); ?>" alt="<?php echo e($galeri->judul); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2"><?php echo e($galeri->judul); ?></h3>
                            <?php if($galeri->deskripsi): ?>
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-3"><?php echo e(Str::limit($galeri->deskripsi, 100)); ?></p>
                            <?php endif; ?>
                            <div class="flex items-center text-gray-500 text-sm">
                                <i class="bi bi-calendar-event mr-2"></i>
                                <?php echo e($galeri->tanggal_upload->format('d M Y')); ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-16">
                        <p class="text-2xl text-gray-600 font-semibold mb-2">Belum ada foto</p>
                        <p class="text-gray-500">Foto galeri akan ditampilkan di sini</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if($galeris->hasPages()): ?>
                <div class="flex justify-center mt-12">
                    <?php echo e($galeris->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/galeri.blade.php ENDPATH**/ ?>