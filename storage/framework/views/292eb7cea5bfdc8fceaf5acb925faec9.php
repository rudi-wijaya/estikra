

<?php $__env->startSection('title', $berita->judul . ' - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-5xl mx-auto px-8 sm:px-12 lg:px-16">

            <!-- Back link -->
            <div class="mb-8">
                <a href="<?php echo e(url('/berita')); ?>" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-semibold transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Berita
                </a>
            </div>

            <!-- Article -->
            <article class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">

                <!-- Featured Image -->
                <?php if($berita->gambar): ?>
                    <div class="w-full h-80 sm:h-96 overflow-hidden">
                        <img src="<?php echo e(asset('storage/' . $berita->gambar)); ?>" alt="<?php echo e($berita->judul); ?>" class="w-full h-full object-cover">
                    </div>
                <?php else: ?>
                    <div class="w-full h-52 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-7xl">📰</div>
                <?php endif; ?>

                <!-- Body -->
                <div class="p-8 lg:p-12">
                    <!-- Date badge -->
                    <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-4">
                        <?php echo e($berita->tanggal_terbit->format('d M Y')); ?>

                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight"><?php echo e($berita->judul); ?></h1>

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        <?php echo $berita->konten; ?>

                    </div>
                </div>
            </article>

            <!-- Berita Lainnya -->
            <?php if($lainnya->count()): ?>
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Lainnya</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <?php $__currentLoopData = $lainnya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('berita.show', $item->slug)); ?>" class="group bg-white rounded-xl border border-gray-200 hover:border-blue-400 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col">
                                <div class="h-44 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 flex-shrink-0">
                                    <?php if($item->gambar): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="<?php echo e($item->judul); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center text-5xl">📰</div>
                                    <?php endif; ?>
                                </div>
                                <div class="p-4 flex flex-col flex-1">
                                    <span class="text-xs text-blue-600 font-semibold mb-2"><?php echo e($item->tanggal_terbit->format('d M Y')); ?></span>
                                    <h3 class="text-sm font-bold text-gray-900 line-clamp-2 leading-snug"><?php echo e($item->judul); ?></h3>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/berita-detail.blade.php ENDPATH**/ ?>