

<?php $__env->startSection('title', 'Berita & Kegiatan - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Berita Section -->
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 border-2 border-gray-300 rounded-3xl p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Berita Terkini</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Informasi dan update terbaru seputar kegiatan sekolah kami</p>
            </div>

            <!-- Berita Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative">
                            <?php if($berita->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $berita->gambar)); ?>" alt="<?php echo e($berita->judul); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-3">
                                <?php echo e($berita->tanggal_terbit->format('d M Y')); ?>

                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2"><?php echo e($berita->judul); ?></h3>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4"><?php echo e(Str::limit(strip_tags($berita->konten), 150)); ?></p>
                            <a href="#" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-16">
                        <p class="text-2xl text-gray-600 font-semibold mb-2">Belum ada berita</p>
                        <p class="text-gray-500">Berita terbaru akan ditampilkan di sini</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if($beritas->hasPages()): ?>
                <div class="flex justify-center mt-12">
                    <?php echo e($beritas->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/berita.blade.php ENDPATH**/ ?>