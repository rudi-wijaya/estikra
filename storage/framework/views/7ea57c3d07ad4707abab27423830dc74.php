

<?php $__env->startSection('title', 'Prestasi - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <div class="text-center mb-12 animate-fadeInUp">
                <div class="relative mb-4">
                    <a href="<?php echo e(url('/tentang')); ?>" class="absolute left-0 top-1/2 -translate-y-1/2 inline-flex items-center justify-center w-9 h-9 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors duration-300 md:w-auto md:h-auto md:px-4 md:py-2 md:gap-2" aria-label="Kembali ke Tentang">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="hidden md:inline">Kembali</span>
                    </a>
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900">Prestasi Sekolah</h2>
                </div>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Kumpulan pencapaian siswa dan sekolah kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <?php $__empty_1 = true; $__currentLoopData = $prestasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div
                        class="card-hover bg-white rounded-xl border-2 border-yellow-100 hover:border-yellow-300 hover:shadow-xl transition-all duration-300 overflow-hidden prestasi-popup-trigger cursor-pointer"
                        data-title="<?php echo e($prestasi->judul); ?>"
                        data-description="<?php echo e(e(strip_tags($prestasi->keterangan ?? ''))); ?>"
                        data-tahun="<?php echo e($prestasi->tahun ?? ''); ?>"
                        data-image="<?php echo e($prestasi->foto ? asset('storage/' . $prestasi->foto) : ''); ?>"
                        role="button"
                        tabindex="0"
                        aria-label="Lihat detail prestasi <?php echo e($prestasi->judul); ?>"
                    >
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

            <div id="prestasi-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
                <div class="absolute inset-0 bg-black/70" data-close-prestasi-modal></div>
                <div class="relative w-full max-w-3xl rounded-2xl bg-white shadow-2xl overflow-hidden">
                    <button
                        type="button"
                        class="absolute right-3 top-3 z-10 inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-gray-700 hover:bg-white"
                        data-close-prestasi-modal
                        aria-label="Tutup popup"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>

                    <div id="prestasi-modal-image-wrap" class="h-64 sm:h-80 bg-gradient-to-br from-yellow-100 to-yellow-50">
                        <img id="prestasi-modal-image" src="" alt="" class="hidden w-full h-full object-cover">
                        <div id="prestasi-modal-fallback" class="w-full h-full flex items-center justify-center">
                            <i class="bi bi-trophy-fill text-yellow-500 text-6xl opacity-70"></i>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-start justify-between gap-3">
                            <h3 id="prestasi-modal-title" class="text-2xl font-bold text-gray-900"></h3>
                            <span id="prestasi-modal-year" class="hidden bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full"></span>
                        </div>
                        <p id="prestasi-modal-description" class="mt-4 text-gray-600 leading-relaxed"></p>
                    </div>
                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('prestasi-modal');
            const titleEl = document.getElementById('prestasi-modal-title');
            const descriptionEl = document.getElementById('prestasi-modal-description');
            const yearEl = document.getElementById('prestasi-modal-year');
            const imageEl = document.getElementById('prestasi-modal-image');
            const fallbackEl = document.getElementById('prestasi-modal-fallback');
            const triggers = document.querySelectorAll('.prestasi-popup-trigger');
            const closeButtons = document.querySelectorAll('[data-close-prestasi-modal]');

            if (!modal || !titleEl || !descriptionEl || !yearEl || !imageEl || !fallbackEl || !triggers.length) {
                return;
            }

            const openModal = function (trigger) {
                const title = trigger.dataset.title || 'Prestasi';
                const description = trigger.dataset.description || 'Tidak ada deskripsi.';
                const year = trigger.dataset.tahun || '';
                const image = trigger.dataset.image || '';

                titleEl.textContent = title;
                descriptionEl.textContent = description;

                if (year !== '') {
                    yearEl.textContent = year;
                    yearEl.classList.remove('hidden');
                } else {
                    yearEl.classList.add('hidden');
                }

                if (image !== '') {
                    imageEl.src = image;
                    imageEl.alt = title;
                    imageEl.classList.remove('hidden');
                    fallbackEl.classList.add('hidden');
                } else {
                    imageEl.src = '';
                    imageEl.alt = '';
                    imageEl.classList.add('hidden');
                    fallbackEl.classList.remove('hidden');
                }

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            };

            const closeModal = function () {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            };

            triggers.forEach(function (trigger) {
                trigger.addEventListener('click', function () {
                    openModal(trigger);
                });

                trigger.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        openModal(trigger);
                    }
                });
            });

            closeButtons.forEach(function (button) {
                button.addEventListener('click', closeModal);
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal.classList.contains('flex')) {
                    closeModal();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/prestasi.blade.php ENDPATH**/ ?>