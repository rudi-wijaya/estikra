

<?php $__env->startSection('title', 'Prestasi - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <div class="text-center mb-12 animate-fadeInUp">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Prestasi Sekolah</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Kumpulan pencapaian siswa dan sekolah kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <?php $__empty_1 = true; $__currentLoopData = $prestasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-16">
                        <p class="text-2xl text-gray-600 font-semibold mb-2">Belum ada data prestasi</p>
                        <p class="text-gray-500">Prestasi sekolah akan ditampilkan di sini.</p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($prestasis->hasPages()): ?>
                <div class="flex justify-center mt-10">
                    <nav class="flex items-center gap-2" aria-label="Pagination">
                        <?php if($prestasis->onFirstPage()): ?>
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Previous</span>
                        <?php else: ?>
                            <a href="<?php echo e($prestasis->previousPageUrl()); ?>" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Previous</a>
                        <?php endif; ?>

                        <?php for($page = 1; $page <= $prestasis->lastPage(); $page++): ?>
                            <?php
                                $isNearCurrent = abs($page - $prestasis->currentPage()) <= 1;
                                $isEdgePage = in_array($page, [1, $prestasis->lastPage()], true);
                            ?>

                            <?php if(!($isNearCurrent || $isEdgePage)): ?>
                                <?php continue; ?>
                            <?php endif; ?>

                            <?php if($page > 1 && !($isNearCurrent || in_array($page - 1, [1, $prestasis->lastPage()], true) || abs(($page - 1) - $prestasis->currentPage()) <= 1)): ?>
                                <span class="inline-flex items-center justify-center min-w-10 h-10 text-sm font-semibold text-gray-400">...</span>
                            <?php endif; ?>

                            <?php if($page == $prestasis->currentPage()): ?>
                                <span class="inline-flex items-center justify-center min-w-10 h-10 rounded-full px-3 text-sm font-bold text-white bg-blue-600"><?php echo e($page); ?></span>
                            <?php else: ?>
                                <a href="<?php echo e($prestasis->url($page)); ?>" class="inline-flex items-center justify-center min-w-10 h-10 rounded-full px-3 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors"><?php echo e($page); ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if($prestasis->hasMorePages()): ?>
                            <a href="<?php echo e($prestasis->nextPageUrl()); ?>" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Next</a>
                        <?php else: ?>
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Next</span>
                        <?php endif; ?>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/prestasi.blade.php ENDPATH**/ ?>