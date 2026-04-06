

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

            <!-- Instagram CTA -->
            <div class="bg-gradient-to-br from-blue-700 to-blue-900 rounded-xl p-10 text-white text-center max-w-2xl mx-auto mb-12 shadow-lg">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-6">
                    <i class="bi bi-instagram text-3xl"></i>
                </div>
                <h3 class="text-3xl font-bold mb-3">Hubungi Kami via Instagram</h3>
                <p class="text-blue-100 mb-8 leading-relaxed">Hubungi kami untuk mendapatkan informasi lebih lanjut tentang pendaftaran, program, atau pertanyaan lainnya.</p>
                <a href="<?php echo e(\App\Models\Setting::get('sekolah_instagram', 'https://www.instagram.com/sdn3krasakbangsri')); ?>" target="_blank" class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 text-white font-bold px-8 py-3 rounded-full transition-colors duration-300 shadow-md hover:shadow-lg">
                    <i class="bi bi-instagram text-xl"></i>
                    <span>Buka Instagram</span>
                </a>
            </div>

            <!-- Contact Information Cards -->
            <?php
                $phoneNumber = trim(\App\Models\Setting::get('sekolah_telepon', ''));
                $whatsappNumber = trim(\App\Models\Setting::get('sekolah_whatsapp', ''));
                $whatsappNumberOnlyDigits = preg_replace('/\D+/', '', $whatsappNumber);
            ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
                <!-- Alamat -->
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="w-12 h-12 mb-4 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-4.35 7-11a7 7 0 1 0-14 0c0 6.65 7 11 7 11Z" />
                            <circle cx="12" cy="10" r="2.5" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Alamat</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <?php echo e(\App\Models\Setting::get('sekolah_alamat', 'Jl. Raya Krasak No. 45, Desa Krasak, Kec. Bangsri, Kabupaten Jepara, Jawa Tengah 59453')); ?>

                    </p>
                </div>

                <!-- Telepon -->
                <?php if($phoneNumber !== ''): ?>
                    <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                        <div class="w-12 h-12 mb-4 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 5.25A2.25 2.25 0 0 1 4.5 3h2.1a2.25 2.25 0 0 1 2.17 1.66l.62 2.33a2.25 2.25 0 0 1-.86 2.4l-1.38 1.04a13.06 13.06 0 0 0 6.42 6.42l1.04-1.38a2.25 2.25 0 0 1 2.4-.86l2.33.62A2.25 2.25 0 0 1 21 17.4v2.1a2.25 2.25 0 0 1-2.25 2.25h-.75C9.82 21.75 2.25 14.18 2.25 6V5.25Z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Telepon</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            <a href="tel:<?php echo e($phoneNumber); ?>" class="text-blue-600 hover:text-blue-700 font-semibold">
                                <?php echo e($phoneNumber); ?>

                            </a><br>
                            <span class="text-xs text-gray-500">Telepon Sekolah</span>
                        </p>
                    </div>
                <?php endif; ?>

                <!-- WhatsApp -->
                <?php if($whatsappNumberOnlyDigits !== ''): ?>
                    <div class="border border-gray-200 rounded-lg p-6 hover:border-green-300 transition-colors">
                        <div class="w-12 h-12 mb-4 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 19.5 3.75 21l1.5-3.75A8.25 8.25 0 1 1 7.5 19.5Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 10.5h4.5m-4.5 3h3" />
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-gray-900 mb-2">WhatsApp</h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-4">
                            <a href="https://wa.me/<?php echo e($whatsappNumberOnlyDigits); ?>" target="_blank" rel="noopener" class="text-green-600 hover:text-green-700 font-semibold">
                                <?php echo e($whatsappNumber); ?>

                            </a><br>
                            <span class="text-xs text-gray-500">Chat WhatsApp Sekolah</span>
                        </p>
                        <a href="https://wa.me/<?php echo e($whatsappNumberOnlyDigits); ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-full transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 19.5 3.75 21l1.5-3.75A8.25 8.25 0 1 1 7.5 19.5Z" />
                            </svg>
                            <span>Chat WhatsApp</span>
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Email -->
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="w-12 h-12 mb-4 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5A1.5 1.5 0 0 1 4.5 6h15A1.5 1.5 0 0 1 21 7.5v9A1.5 1.5 0 0 1 19.5 18h-15A1.5 1.5 0 0 1 3 16.5v-9Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="m3 8 9 6 9-6" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Email</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <a href="mailto:<?php echo e(\App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com')); ?>" class="text-blue-600 hover:text-blue-700 font-medium break-all">
                            <?php echo e(\App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com')); ?>

                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/kontak.blade.php ENDPATH**/ ?>