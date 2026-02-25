

<?php $__env->startSection('title', 'Beranda - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <section class="relative flex flex-col justify-between -mt-32" style="min-height: calc(820px + 8rem); background-image: url('<?php echo e(asset(\App\Models\Setting::get('hero_background', 'images/homepage.jpg'))); ?>'); background-size: cover; background-position: center top;">
        <div class="absolute inset-0 bg-black/40"></div>
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 right-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-10 left-10 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 pb-16 w-full relative z-10" style="padding-top: 19rem;">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm border border-blue-100 text-blue-700 text-sm font-semibold px-4 py-1.5 rounded-full shadow-sm mb-6 animate-fadeInUp">
                <span></span>
                <span>Selamat Datang</span>
            </div>

            <!-- Heading -->
            <h1 class="text-5xl md:text-6xl font-black text-white leading-tight mb-4 animate-fadeInUp" style="animation-delay: 0.1s; text-shadow: 0 2px 12px rgba(0,0,0,0.5);">
                <?php echo e(\App\Models\Setting::get('hero_judul', 'SD Negeri 3 Krasak Bangsri')); ?>

            </h1>

            <!-- Subheading -->
            <p class="text-white/90 text-lg mb-8 max-w-xl animate-fadeInUp" style="animation-delay: 0.2s; text-shadow: 0 1px 6px rgba(0,0,0,0.4);">
                <?php echo e(\App\Models\Setting::get('hero_subjudul', 'Membentuk Generasi Berkarakter, Berprestasi, dan Berakhlak Mulia')); ?>

            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap items-center gap-4 animate-fadeInUp" style="animation-delay: 0.3s;">
                <a href="/tentang"
                   class="card-hover group inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg hover:shadow-blue-300 transition-all duration-200">
                    <span>Pelajari Lebih Lanjut</span>
                </a>
                <a href="/kontak"
                   class="card-hover group inline-flex items-center gap-2 border-2 border-white text-white hover:bg-white/20 font-semibold px-7 py-3 rounded-xl transition-all duration-200 backdrop-blur-sm">
                    <i class=""></i>
                    <span>PPDB 2026</span>
                </a>
            </div>
        </div>

        <!-- Stats Strip (langsung menempel di bawah hero, tanpa gap) -->
        <div class="relative z-10 border-t-2 border-white/40 bg-white/50">
            <div class="relative z-10 max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-4 divide-x divide-white/30">

                    <div class="flex flex-col items-center py-8 animate-fadeInUp" style="animation-delay: 0.4s;">
                        <span class="font-black text-blue-600 text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl leading-none">150<span class="text-blue-500">+</span></span>
                        <span class="text-gray-700 text-xs sm:text-sm md:text-base mt-2 font-medium">Siswa Aktif</span>
                    </div>

                    <div class="flex flex-col items-center py-8 animate-fadeInUp" style="animation-delay: 0.5s;">
                        <span class="font-black text-blue-600 text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl leading-none">10<span class="text-blue-500">+</span></span>
                        <span class="text-gray-700 text-xs sm:text-sm md:text-base mt-2 font-medium">Guru &amp; Staff</span>
                    </div>

                    <div class="flex flex-col items-center py-8 animate-fadeInUp" style="animation-delay: 0.6s;">
                        <span class="font-black text-blue-600 text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl leading-none">6</span>
                        <span class="text-gray-700 text-xs sm:text-sm md:text-base mt-2 font-medium">Kelas</span>
                    </div>

                    <div class="flex flex-col items-center py-8 animate-fadeInUp" style="animation-delay: 0.7s;">
                        <span class="font-black text-blue-600 text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl leading-none">50<span class="text-blue-500">+</span></span>
                        <span class="text-gray-700 text-xs sm:text-sm md:text-base mt-2 font-medium">Prestasi</span>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- Tentang Sekolah Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 border-2 border-gray-300 rounded-3xl p-12 animate-fadeInUp" data-animate>
            <div class="space-y-12">
                <!-- Image First -->
                <div>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-600 rounded-3xl transform -rotate-6 opacity-10"></div>
                        <div class="relative bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl overflow-hidden shadow-2xl p-8">
                            <div class="flex items-center justify-center h-96">
                                <div class="text-center text-white">
                                    <i class="bi bi-graduation-cap text-7xl opacity-30 block mb-4"></i>
                                    <p class="text-lg font-semibold">Berkarakter, Berprestasi,</p>
                                    <p class="text-lg font-semibold">Berakhlak Mulia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visi and Misi Below -->
                <div>
            
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Tentang SD Negeri 3 Krasak Bangsri</h2>
                    
                    <div class="space-y-6 text-gray-600">
                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-3">
                                <i class=" text-blue-600"></i> Visi Kami
                            </h4>
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1"></span>
                                    <span>Mewujudkan lulusan yang beriman dan bertakwa, kompeten, berprestasi, berkarakter Profil Pelajar Pancasila, serta didukung pembelajaran inovatif dan lingkungan sekolah yang nyaman, aman, dan tertata.</span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-3">
                                <i class="text-blue-600"></i> Misi Kami
                            </h4>
                            <ul class="space-y-2 text-sm">
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Menumbuh kembangkkan pengamalam ajaran agama sesuai dengan agama dan kepercayaan masing-masing.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Menciptakan insan yang unggul dalam IPTEK dan mampu berdaya saing.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Melaksanakan pembelajaran yang aktiif, kreatif, inovatif yang menghasilkan peserta didik yang berkarya, bernalar kritis, dan mandiri.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Menumbuhkan warga sekolah yang berkarakter jujur, disiplin, percaya diri, sopan santun, menghargai kebhinekaan dalam bertindak.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <a href="/tentang" class="btn-primary mt-8 inline-block">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sambutan Kepala Sekolah Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 border-2 border-gray-300 rounded-3xl p-12 animate-fadeInUp" data-animate>
            <div class="text-center mb-8">
            
                <h2 class="section-title">Sambutan dari Pimpinan Sekolah</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Icon -->
                <div class="flex justify-center lg:justify-start">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-600 rounded-3xl transform rotate-6 opacity-10"></div>
                        <div class="relative bg-gradient-to-br from-green-500 to-blue-600 rounded-3xl w-80 h-80 flex items-center justify-center shadow-2xl">
                            <span class="text-9xl">👨‍💼</span>
                        </div>
                    </div>
                </div>

                <!-- Right Text -->
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Assalamu'alaikum Warahmatullahi Wabarakatuh</h3>
                    <div class="mb-6">
                        <p class="text-lg font-semibold text-blue-600">Ibu Sutanti</p>
                        <p class="text-gray-500">Kepala Sekolah</p>
                    </div>

                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>Dengan penuh kerendahan hati, kami menyambut kehadiran Anda di SD Negeri 3 Krasak. Sekolah kami berkomitmen untuk menjadi institusi pendidikan yang tidak hanya mengembangkan potensi akademik siswa, tetapi juga membentuk karakter yang kuat dan berakhlak mulia sesuai dengan nilai-nilai Pancasila dan ajaran agama.</p>
                        
                        <p>Kami percaya bahwa pendidikan yang berkualitas adalah hasil dari kerjasama sinergis antara guru, siswa, orang tua, dan masyarakat. Oleh karena itu, kami mengundang seluruh pihak untuk bersama-sama mendukung proses pembelajaran yang menyenangkan, bermakna, dan mempersiapkan siswa menjadi generasi penerus bangsa yang kompeten dan berintegritas.</p>
                        
                        <p>Terima kasih atas kepercayaan dan dukungan Anda. Semoga SD Negeri 3 Krasak terus berkembang dan menjadi sekolah pilihan yang menghasilkan lulusan berkarakter, berprestasi, dan berakhlak mulia.</p>
                    </div>

                    <div class="mt-8 pt-6 border-t-2 border-gray-200">
                        <p class="font-bold text-gray-900">Ibu Sutanti</p>
                        <p class="text-sm text-gray-600">Kepala Sekolah SD Negeri 3 Krasak Bangsri</p>
                    </div>

                    
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section class="py-8 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 border-2 border-gray-300 rounded-3xl p-12 animate-fadeInUp" data-animate>
            <div class="text-center mb-8">
            
                <h2 class="section-title">Program Pembelajaran</h2>
                <p class="section-subtitle text-gray-600">Berbagai program pendidikan yang dirancang untuk mengoptimalkan potensi siswa</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-100 text-center hover:shadow-xl">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-pencil-square text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Akademik</h3>
                    <p class="text-sm text-gray-600">Fokus pada pengembangan kemampuan akademik siswa dalam mata pelajaran inti.</p>
                </div>

                <div class="card-hover bg-white rounded-xl p-6 border border-gray-100 text-center hover:shadow-xl">
                    <div class="w-14 h-14 bg-indigo-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-music-note-beamed text-indigo-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Seni & Budaya</h3>
                    <p class="text-sm text-gray-600">Program pengembangan seni dan apresiasi budaya lokal dan nasional.</p>
                </div>

                <div class="card-hover bg-white rounded-xl p-6 border border-gray-100 text-center hover:shadow-xl">
                    <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-football text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Olahraga</h3>
                    <p class="text-sm text-gray-600">Program pengembangan kemampuan olahraga dan kesehatan siswa.</p>
                </div>

                <div class="card-hover bg-white rounded-xl p-6 border border-gray-100 text-center hover:shadow-xl">
                    <div class="w-14 h-14 bg-orange-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-translate text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Bahasa & IT</h3>
                    <p class="text-sm text-gray-600">Program belajar bahasa Inggris dan literasi digital untuk abad ke-21.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Guru & Staff Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 border-2 border-gray-300 rounded-3xl p-12 animate-fadeInUp" data-animate>
            <div class="text-center mb-8">
            
                <h2 class="section-title">Guru & Staff Kami</h2>
                <p class="section-subtitle text-gray-600">Tim profesional yang berdedikasi dalam mendidik dan membimbing generasi masa depan</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                <?php $__empty_1 = true; $__currentLoopData = $guruStaffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-blue-200">
                        <?php if($gs->foto): ?>
                            <img src="<?php echo e(asset('storage/' . $gs->foto)); ?>" alt="<?php echo e($gs->nama); ?>" class="w-full h-64 object-cover">
                        <?php else: ?>
                            <div class="w-full h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                <i class="bi bi-person-fill text-white text-6xl opacity-40"></i>
                            </div>
                        <?php endif; ?>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-1"><?php echo e($gs->nama); ?></h3>
                            <p class="text-blue-600 text-sm font-semibold mb-4"><?php echo e($gs->jabatan); ?></p>
                            <?php if($gs->deskripsi): ?>
                                <p class="text-gray-600 text-sm"><?php echo e($gs->deskripsi); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-3 text-center text-gray-400 py-8">
                        <i class="bi bi-people text-5xl"></i>
                        <p class="mt-2">Belum ada data guru &amp; staff.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="text-center">
                <a href="/guru-staff" class="btn-primary inline-block">
                    Lihat Semua Guru & Staff
                </a>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru Section -->
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
                        <p class="text-2xl text-gray-600 font-semibold mb-2"> Belum ada berita</p>
                        <p class="text-gray-500">Berita terbaru akan ditampilkan di sini</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="text-center">
                <a href="/berita" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 border-2 border-gray-300 rounded-3xl p-12">
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

            <div class="text-center">
                <a href="/galeri" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Galeri
                </a>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600">
        <div class="max-w-4xl mx-auto px-6 sm:px-8 lg:px-10 text-center">
            <!-- Section Header -->
            <div class="mb-8 animate-fadeInUp">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">Hubungi Kami</h2>
                <p class="text-lg text-blue-100 max-w-2xl mx-auto leading-relaxed">
                    Kami siap menjawab semua pertanyaan Anda tentang sekolah, pendaftaran, atau hal lainnya. Hubungi kami sekarang melalui berbagai saluran komunikasi yang tersedia.
                </p>
            </div>

            <!-- CTA Button -->
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="/kontak"
                   class="card-hover group inline-flex items-center gap-3 bg-white hover:bg-gray-50 text-blue-600 font-bold px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 text-lg">
                    <i class="bi bi-telephone-fill text-xl"></i>
                    <span>Hubungi Kami Sekarang</span>
                </a>
            </div>
        </div>
    </section>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/beranda.blade.php ENDPATH**/ ?>