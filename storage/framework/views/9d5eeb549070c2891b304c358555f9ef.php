

<?php $__env->startSection('title', 'Hubungi Kami - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Contact Section -->
    <section class="py-12 bg-white">
        <div class="max-w-5xl mx-auto px-6 sm:px-8 lg:px-10">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Hubungi Kami</h2>
                <p class="text-gray-600 text-sm">Hubungi kami untuk informasi lebih lanjut atau pertanyaan apapun</p>
            </div>

            <!-- WhatsApp CTA -->
            <div class="bg-gradient-to-br from-blue-700 to-blue-900 rounded-xl p-10 text-white text-center max-w-2xl mx-auto mb-12 shadow-lg">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-6">
                    <i class="bi bi-whatsapp text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-3">Hubungi Kami via WhatsApp</h3>
                <p class="text-blue-100 mb-8 leading-relaxed">Hubungi kami untuk mendapatkan informasi lebih lanjut tentang pendaftaran, program, atau pertanyaan lainnya.</p>
                <a href="https://wa.me/<?php echo e(\App\Models\Setting::get('sekolah_whatsapp', '6281234567890')); ?>" target="_blank" class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold px-8 py-3 rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg">
                    <i class="bi bi-whatsapp text-xl"></i>
                    <span>Buka WhatsApp</span>
                </a>
            </div>

            <!-- Contact Information Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <!-- Alamat -->
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="text-3xl mb-3 text-blue-600">📍</div>
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Alamat</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <?php echo e(\App\Models\Setting::get('sekolah_alamat', 'Jl. Raya Krasak No. 45, Desa Krasak, Kec. Bangsri, Kabupaten Jepara, Jawa Tengah 59453')); ?>

                    </p>
                </div>

                <!-- Telepon -->
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="text-3xl mb-3 text-blue-600">📞</div>
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Telepon</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <strong class="text-gray-900"><?php echo e(\App\Models\Setting::get('sekolah_telepon', '(0291) 771380')); ?></strong><br>
                        <span class="text-xs text-gray-500">Telepon Sekolah</span>
                    </p>
                </div>

                <!-- Email -->
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="text-3xl mb-3 text-blue-600">✉️</div>
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Email</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <a href="mailto:<?php echo e(\App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com')); ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                            <?php echo e(\App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com')); ?>

                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/kontak.blade.php ENDPATH**/ ?>