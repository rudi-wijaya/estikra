

<?php $__env->startSection('title', 'Galeri Foto - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Gallery Section -->
  
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Galeri Foto Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Dokumentasi kegiatan dan momen berharga di sekolah kami</p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <?php $__empty_1 = true; $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl flex flex-col">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative flex-shrink-0">
                            <?php if($galeri->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $galeri->gambar)); ?>" alt="<?php echo e($galeri->judul); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2"><?php echo e($galeri->judul); ?></h3>
                            <?php if($galeri->deskripsi): ?>
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-3 flex-1"><?php echo e(Str::limit($galeri->deskripsi, 100)); ?></p>
                            <?php else: ?>
                                <div class="flex-1"></div>
                            <?php endif; ?>
                            <div class="flex items-center text-gray-500 text-sm mt-auto">
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
                <div class="flex justify-center mt-10">
                    <nav class="flex items-center gap-2" aria-label="Pagination">
                        <?php if($galeris->onFirstPage()): ?>
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Previous</span>
                        <?php else: ?>
                            <a href="<?php echo e($galeris->previousPageUrl()); ?>" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Previous</a>
                        <?php endif; ?>

                        <?php for($page = 1; $page <= $galeris->lastPage(); $page++): ?>
                            <?php
                                $isNearCurrent = abs($page - $galeris->currentPage()) <= 1;
                                $isEdgePage = in_array($page, [1, $galeris->lastPage()], true);
                            ?>

                            <?php if(!($isNearCurrent || $isEdgePage)): ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php if($page > 1 && !($isNearCurrent || in_array($page - 1, [1, $galeris->lastPage()], true) || abs(($page - 1) - $galeris->currentPage()) <= 1)): ?>
                                <span class="inline-flex items-center justify-center min-w-10 h-10 text-sm font-semibold text-gray-400">...</span>
                            <?php endif; ?>

                            <?php if($page == $galeris->currentPage()): ?>
                                <span class="inline-flex items-center justify-center min-w-10 h-10 rounded-full px-3 text-sm font-bold text-white bg-blue-600"><?php echo e($page); ?></span>
                            <?php else: ?>
                                <a href="<?php echo e($galeris->url($page)); ?>" class="inline-flex items-center justify-center min-w-10 h-10 rounded-full px-3 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors"><?php echo e($page); ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if($galeris->hasMorePages()): ?>
                            <a href="<?php echo e($galeris->nextPageUrl()); ?>" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Next</a>
                        <?php else: ?>
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Next</span>
                        <?php endif; ?>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/galeri.blade.php ENDPATH**/ ?>