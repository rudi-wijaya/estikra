

<?php $__env->startSection('title', 'Beranda - SD Negeri 3 Krasak Bangsri'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Section -->
    <?php
        $heroSlidesFromSetting = json_decode(\App\Models\Setting::get('hero_slides', '[]'), true);

        $heroSlides = collect(is_array($heroSlidesFromSetting) ? $heroSlidesFromSetting : [])
            ->map(fn ($slide) => trim((string) $slide))
            ->filter()
            ->values();

        $hasHeroSlides = $heroSlides->isNotEmpty();
    ?>

    <section id="hero-section" class="relative flex flex-col justify-between -mt-32 <?php echo e(!$hasHeroSlides ? 'bg-gradient-to-br from-blue-700 to-slate-800' : ''); ?>" style="min-height: calc(820px + 8rem);">

        
        <?php if($hasHeroSlides): ?>
            <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
                <?php $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hero-slide absolute inset-0 transition-opacity duration-1000 <?php echo e($i === 0 ? 'opacity-100' : 'opacity-0'); ?>"
                         style="background-image: url('<?php echo e(asset($slide)); ?>'); background-size: cover; background-position: center top;"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="absolute inset-0 bg-black/40"></div>
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 right-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-10 left-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 pb-16 w-full relative z-10" style="padding-top: 22rem;">
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
                <a href="#tentang-sekolah"
                         class="card-hover group inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-7 py-3.5 rounded-full shadow-lg hover:shadow-blue-300 transition-all duration-200">
                    <span>Pelajari Lebih Lanjut</span>
                </a>
                <a href="/ppdb"
                         class="card-hover group inline-flex items-center gap-2 border-2 border-white text-white hover:bg-white/20 font-semibold px-7 py-3 rounded-full transition-all duration-200 backdrop-blur-sm">
                    <i class=""></i>
                    <span>PPDB 2026</span>
                </a>
            </div>
        </div>

        <!-- Stats Cards (langsung menempel di bawah hero, tanpa gap) -->
        <div class="relative z-10 py-8">
            <?php
                $berandaStats = [
                    [
                        'angka' => \App\Models\Setting::get('beranda_stat_1_angka', '150+'),
                        'label' => \App\Models\Setting::get('beranda_stat_1_label', 'Siswa Aktif'),
                        'delay' => '0.4s',
                    ],
                    [
                        'angka' => \App\Models\Setting::get('beranda_stat_2_angka', '10+'),
                        'label' => \App\Models\Setting::get('beranda_stat_2_label', 'Guru & Staff'),
                        'delay' => '0.5s',
                    ],
                    [
                        'angka' => \App\Models\Setting::get('beranda_stat_3_angka', '6'),
                        'label' => \App\Models\Setting::get('beranda_stat_3_label', 'Kelas'),
                        'delay' => '0.6s',
                    ],
                    [
                        'angka' => \App\Models\Setting::get('beranda_stat_4_angka', '50+'),
                        'label' => \App\Models\Setting::get('beranda_stat_4_label', 'Prestasi'),
                        'delay' => '0.7s',
                    ],
                ];
            ?>
            <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php $__currentLoopData = $berandaStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="backdrop-blur-md rounded-2xl p-6 border border-white/30 text-center animate-fadeInUp transition-all duration-300 hover:bg-white/40 hover:scale-105 hover:shadow-lg cursor-default" style="background: rgba(255,255,255,0.20); animation-delay: <?php echo e($stat['delay']); ?>;">
                            <span class="font-black text-4xl lg:text-5xl leading-none drop-shadow" style="color: #ffffff"><?php echo e($stat['angka']); ?></span>
                            <p class="text-white text-sm mt-2 font-medium drop-shadow"><?php echo e($stat['label']); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </section>

    <?php if($heroSlides->count() > 1): ?>
    <script>
    (function () {
        const slides   = document.querySelectorAll('#hero-section .hero-slide');
        const total    = slides.length;
        if (total < 2) return;
        let current = 0;
        setInterval(function () {
            slides[current].classList.remove('opacity-100');
            slides[current].classList.add('opacity-0');
            current = (current + 1) % total;
            slides[current].classList.remove('opacity-0');
            slides[current].classList.add('opacity-100');
        }, 4000);
    })();
    </script>
    <?php endif; ?>



    
    <!-- Sambutan Kepala Sekolah Section -->
    <section class="py-8 bg-white ">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 animate-fadeInUp" data-animate>
            <div class="text-center mb-8">
                <h2 class="section-title">Sambutan Kepala Sekolah</h2>
            </div>

            <div class="max-w-4xl mx-auto" data-stagger>
                <div class="mx-auto md:mx-0 md:float-left md:mr-8 mb-6 md:mb-3 flex flex-col items-center w-fit">
                    <?php
                        $kepalaSekolah = \App\Models\GuruStaff::aktif()
                            ->where('kategori', 'kepala_sekolah')
                            ->orderBy('urutan')
                            ->orderBy('nama')
                            ->first();
                    ?>
                    <?php $sambutanFoto = \App\Models\Setting::get('sambutan_foto'); ?>
                    <?php
                        $sambutanJudulDefault = "Assalamu'alaikum Warahmatullahi Wabarakatuh";
                        $sambutanIsiDefault = "Dengan penuh rasa syukur, kami menyambut kehadiran Anda di website SD Negeri 3 Krasak Bangsri. Website ini kami hadirkan sebagai media informasi dan komunikasi antara sekolah dengan siswa, orang tua, serta masyarakat.\n\nSD Negeri 3 Krasak Bangsri berkomitmen memberikan pendidikan yang berkualitas. Kami tidak hanya mengembangkan kemampuan akademik siswa, tetapi juga membentuk karakter, kedisiplinan, dan akhlak yang baik sesuai dengan nilai Pancasila dan ajaran agama.\n\nKami percaya pendidikan yang baik lahir dari kerja sama antara sekolah, orang tua, dan masyarakat. Dukungan tersebut membantu menciptakan lingkungan belajar yang nyaman, aktif, dan mendorong siswa untuk berkembang sesuai potensi mereka.\n\nMelalui website ini kami berharap masyarakat dapat mengenal lebih dekat kegiatan, program, serta prestasi yang ada di SD Negeri 3 Krasak Bangsri.\n\nTerima kasih atas kepercayaan dan dukungan yang telah diberikan. Semoga SD Negeri 3 Krasak Bangsri terus berkembang dan mampu mencetak generasi yang berprestasi, berkarakter, dan berakhlak mulia.";

                        $sambutanJudul = \App\Models\Setting::get('sambutan_judul', $sambutanJudulDefault);
                        $sambutanIsi = \App\Models\Setting::get('sambutan_isi', $sambutanIsiDefault);
                        $sambutanParagraf = preg_split('/\R{2,}/', trim((string) $sambutanIsi));
                        $sambutanParagraf = array_values(array_filter(array_map('trim', $sambutanParagraf)));
                    ?>
                    <?php if($kepalaSekolah?->foto): ?>
                        <img src="<?php echo e(asset('storage/' . $kepalaSekolah->foto)); ?>" alt="<?php echo e($kepalaSekolah->nama); ?>" class="rounded-full w-64 h-64 object-cover shadow-xl border-4 border-blue-50">
                    <?php elseif($sambutanFoto): ?>
                        <img src="<?php echo e(asset($sambutanFoto)); ?>" alt="Kepala Sekolah" class="rounded-full w-64 h-64 object-cover shadow-xl border-4 border-blue-50">
                    <?php else: ?>
                        <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-full w-64 h-64 flex items-center justify-center shadow-xl border-4 border-blue-50">
                            <span class="text-6xl"></span>
                        </div>
                    <?php endif; ?>
                    <div class="mt-3 text-center">
                        <p class="text-sm font-bold text-gray-900"><?php echo e($kepalaSekolah->nama ?? 'Ibu Sutanti, S.Pd'); ?></p>
                        <p class="text-xs text-blue-600 font-medium"><?php echo e($kepalaSekolah->jabatan ?? 'Kepala Sekolah'); ?></p>
                        <p class="text-xs text-gray-500">SD Negeri 3 Krasak Bangsri</p>
                    </div>
                </div>

                <div class="text-gray-600 leading-relaxed text-[15px] space-y-4">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4"><?php echo e($sambutanJudul); ?></h3>

                    <?php $__empty_1 = true; $__currentLoopData = $sambutanParagraf; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <p><?php echo e($paragraf); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p><?php echo e($sambutanIsiDefault); ?></p>
                    <?php endif; ?>
                </div>
                <div class="clear-both"></div>
            </div>
        </div>
    </section>

    <!-- Tentang Sekolah Section -->
    <section id="tentang-sekolah" class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 animate-fadeInUp" data-animate>
            <div class="space-y-12">
                <!-- Visi and Misi Below -->
                <div>
                    <div class="text-center mb-12 mt-7">
                        <h2 class="section-title">Tentang SD Negeri 3 Krasak Bangsri</h2>
                    </div>

                    <?php
                        $defaultVisi = implode("\n", [
                            'Terwujudnya lulusan yang unggul dalam iman dan taqwa.',
                            'Terwujudnya lulusan yang kompeten dan berprestasi yang membanggakan.',
                            'Terwujudnya Kurikulum berwawasan karakter Profil Pelajar Pancasila dan lingkungan.',
                            'Terwujudnya PBM yang efektif, efisien, dan inovatif.',
                            'Terwujudnya warga sekolah yang berkarakter jujur, mandiri, gotong royong, percaya diri, bernalar kritis, kreatif, dan menghargai kebhinekaan.',
                            'Terwujudnya standar pengelolaan dan manajemen sekolah sesuai ketentuan.',
                            'Terwujudnya budaya sekolah sahabat keluarga dan lingkungan yang nyaman, aman, rindang, asri dan bersih dalam penyelenggaraan pendidikan yang berkualitas.',
                        ]);

                        $defaultMisi = implode("\n", [
                            'Menumbuh kembangkan pengamalan ajaran agama sesuai dengan agama dan kepercayaan masing-masing.',
                            'Menciptakan insan yang unggul dalam IPTEK dan mampu berdaya saing.',
                            'Melaksanakan pembelajaran yang aktif, kreatif, inovatif yang menghasilkan peserta didik yang berkarya, bernalar kritis, dan mandiri.',
                            'Menumbuhkan warga sekolah yang berkarakter jujur, disiplin, percaya diri, sopan santun, menghargai kebhinekaan dalam bertindak.',
                        ]);

                        $visiItems = array_values(array_filter(array_map('trim', explode("\n", \App\Models\Setting::get('tentang_visi', $defaultVisi)))));
                        $misiItems = array_values(array_filter(array_map('trim', explode("\n", \App\Models\Setting::get('tentang_misi', $defaultMisi)))));

                        $visiPrimary = array_slice($visiItems, 0, 3);
                        $visiExtra = array_slice($visiItems, 3);
                        $misiPrimary = array_slice($misiItems, 0, 3);
                        $misiExtra = array_slice($misiItems, 3);
                    ?>
                    
                    <div class="space-y-4 text-gray-600">
                        <!-- Visi Card -->
                        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm overflow-hidden">
                            <!-- Header + Toggle -->
                            <button
                                <?php if(count($visiExtra) > 0): ?>
                                    onclick="toggleCollapse('visiExtra','visiIcon')"
                                <?php endif; ?>
                                class="w-full flex items-center justify-between p-6 text-left transition-colors duration-200 <?php echo e(count($visiExtra) > 0 ? 'hover:bg-blue-50 cursor-pointer' : 'cursor-default'); ?>"
                            >
                                <h4 class="text-lg font-bold text-gray-900">Visi Kami</h4>
                                <?php if(count($visiExtra) > 0): ?>
                                    <span id="visiIcon" class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0 transition-transform duration-300">
                                        <i class="bi bi-chevron-down text-sm"></i>
                                    </span>
                                <?php endif; ?>
                            </button>

                            <!-- Visi List -->
                            <div class="px-6 pb-6 space-y-2.5">
                                <?php $__currentLoopData = $visiPrimary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-start gap-3">
                                        <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                        <span class="text-gray-700 text-sm"><?php echo e($item); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <!-- Items 4-7: expand/collapse -->
                                <?php if(count($visiExtra) > 0): ?>
                                    <div id="visiExtra" class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                                        <div class="space-y-2.5 pt-2.5">
                                            <?php $__currentLoopData = $visiExtra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="flex items-start gap-3">
                                                    <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                                    <span class="text-gray-700 text-sm"><?php echo e($item); ?></span>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Misi Card -->
                        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm overflow-hidden">
                            <!-- Header -->
                            <div class="w-full p-6 text-left">
                                <h4 class="text-lg font-bold text-gray-900">Misi Kami</h4>
                            </div>

                            <!-- Misi List -->
                            <div class="px-6 pb-6 space-y-2.5">
                                <?php $__currentLoopData = $misiItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-start gap-3">
                                        <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                        <span class="text-gray-700 text-sm"><?php echo e($item); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="text-center ">
                    <a href="/tentang" class="btn-primary mt-8 inline-block rounded-full">
                        Pelajari Lebih Lanjut
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Program Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 animate-fadeInUp" data-animate>
            <div class="text-center mb-8">
            
                <h2 class="section-title">Program Unggulan</h2>
                <p class="section-subtitle text-gray-600">Berbagai program unggulan yang dirancang untuk mengoptimalkan potensi siswa</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-stagger>
                <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div
                        class="card-hover group bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-xl flex flex-col cursor-pointer beranda-popup-trigger"
                        data-popup-title="<?php echo e($program->judul); ?>"
                        data-popup-meta="Program Unggulan"
                        data-popup-description="<?php echo e(e(strip_tags($program->deskripsi ?? ''))); ?>"
                        data-popup-image="<?php echo e($program->foto ? (str_starts_with($program->foto, 'storage/') ? asset($program->foto) : asset('storage/' . $program->foto)) : ''); ?>"
                        data-popup-link="<?php echo e(route('program.show', $program)); ?>"
                        data-popup-link-label="Lihat Detail Program"
                        role="button"
                        tabindex="0"
                        aria-label="Lihat detail program <?php echo e($program->judul); ?>"
                    >
                        <div class="h-44 bg-gradient-to-br from-blue-100 to-blue-200 overflow-hidden">
                            <?php if($program->foto): ?>
                                <?php
                                    $programFoto = str_starts_with($program->foto, 'storage/')
                                        ? asset($program->foto)
                                        : asset('storage/' . $program->foto);
                                ?>
                                <img src="<?php echo e($programFoto); ?>" alt="<?php echo e($program->judul); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="bi bi-image text-blue-500 text-4xl opacity-60"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6 text-center flex flex-col flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo e($program->judul); ?></h3>
                            <p class="text-sm text-gray-600 mb-3"><?php echo e(\Illuminate\Support\Str::limit($program->deskripsi, 130)); ?></p>
                            <span class="text-blue-600 font-semibold mt-auto">Lihat Detail</span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full text-center py-12 text-gray-400">
                        <p class="text-lg">Belum ada program unggulan yang ditambahkan.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="text-center mt-8">
                <a href="/program" class="btn-primary inline-block rounded-full">
                    Lihat Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <!-- Guru & Staff Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16" data-animate>
            <div class="text-center mb-8">
                <h2 class="section-title">Guru & Staff Kami</h2>
                <p class="section-subtitle text-gray-600">Tim profesional yang berdedikasi dalam mendidik dan membimbing generasi masa depan</p>
            </div>

            <?php if($guruStaffs->isEmpty()): ?>
                <div class="text-center text-gray-400 py-8">
                    <i class="bi bi-people text-5xl"></i>
                    <p class="mt-2">Belum ada data guru &amp; staff.</p>
                </div>
            <?php else: ?>
            <?php
                $gsItems      = $guruStaffs->values();
                $gsTotal      = $gsItems->count();
                $gsMax        = max(0, $gsTotal - 3);
                // Desktop: 3 visible. Track width = N/3 * 100%
                $gsTrackW     = round($gsTotal / 3 * 100, 4);
                // Tablet: 2 visible. Track width = N/2 * 100%
                $gsTrackWTab  = round($gsTotal / 2 * 100, 4);
                // Mobile: 1 visible. Track width = N * 100%
                $gsTrackWMob  = $gsTotal * 100;
                // Each card width as % of track (same for all breakpoints)
                $gsCardW      = round(100 / $gsTotal, 4);
            ?>
            <style>
                @media (max-width: 639px) {
                    #gs-track { width: <?php echo e($gsTrackWMob); ?>% !important; }
                }
                @media (min-width: 640px) and (max-width: 1023px) {
                    #gs-track { width: <?php echo e($gsTrackWTab); ?>% !important; }
                }
            </style>

            <div class="relative px-6">
                
                <div class="py-4 -my-4" style="overflow:hidden; width:100%;">
                    
                    <div id="gs-track"
                        data-stagger
                         style="display:flex; width:<?php echo e($gsTrackW); ?>%; transition:transform 0.6s cubic-bezier(0.4,0,0.2,1);">
                        <?php $__currentLoopData = $gsItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="width:<?php echo e($gsCardW); ?>%; flex-shrink:0; padding:0 12px;">
                            <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-blue-200" style="display:flex; flex-direction:column; height:100%;">
                                <div style="padding:20px 20px 0; display:flex; justify-content:center; flex-shrink:0;">
                                <?php if($gs->foto): ?>
                                    <img src="<?php echo e(asset('storage/' . $gs->foto)); ?>" alt="<?php echo e($gs->nama); ?>" class="w-32 h-32 rounded-full object-cover border-4 border-blue-50 shadow-md">
                                <?php else: ?>
                                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center border-4 border-blue-50 shadow-md">
                                        <i class="bi bi-person-fill text-white text-4xl opacity-60"></i>
                                    </div>
                                <?php endif; ?>
                                </div>
                                <div style="padding:16px 20px 20px; flex:1; display:flex; flex-direction:column; justify-content:flex-start;">
                                    <h3 style="font-size:15px; font-weight:700; color:#1f2937; line-height:1.45; word-break:break-word; overflow-wrap:break-word; min-height:2.9em; margin:0 0 5px 0; display:flex; align-items:flex-start;"><?php echo e($gs->nama); ?></h3>
                                    <p style="font-size:13px; color:#007AFF; font-weight:600; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; margin:0 0 10px 0;"><?php echo e($gs->jabatan); ?></p>
                                    <?php if($gs->deskripsi): ?>
                                        <p class="text-gray-600 text-sm"><?php echo e($gs->deskripsi); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <?php if($gsTotal > 1): ?>
                <button onclick="gsPrev()"
                    class="absolute left-0 top-32 z-10 w-10 h-10 rounded-full bg-white shadow-md border border-gray-100 flex items-center justify-center text-blue-600 hover:bg-blue-50 transition">
                    <i class="bi bi-chevron-left text-lg"></i>
                </button>
                <button onclick="gsNext()"
                    class="absolute right-0 top-32 z-10 w-10 h-10 rounded-full bg-white shadow-md border border-gray-100 flex items-center justify-center text-blue-600 hover:bg-blue-50 transition">
                    <i class="bi bi-chevron-right text-lg"></i>
                </button>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="text-center mt-8">
                <a href="/guru-staff" class="btn-primary inline-block rounded-full">
                    Lihat Semua Guru & Staff
                </a>
            </div>
        </div>
    </section>

    <?php if(isset($gsTotal) && $gsTotal > 1): ?>
    <script>
        var gsCurrent = 0;
        var gsTotal   = <?php echo e($gsTotal); ?>;
        var gsTimer   = setInterval(function(){ gsGoTo(gsCurrent + 1); }, 4000);

        function gsVisible() {
            if (window.innerWidth >= 1024) return 3;
            if (window.innerWidth >= 640)  return 2;
            return 1;
        }

        function gsGoTo(n) {
            var max = Math.max(0, gsTotal - gsVisible());
            if (n > max) n = 0;
            if (n < 0)   n = max;
            gsCurrent = n;
            var pct = gsCurrent * 100 / gsTotal;
            document.getElementById('gs-track').style.transform = 'translateX(-' + pct + '%)';
        }

        function gsPrev() {
            clearInterval(gsTimer);
            gsGoTo(gsCurrent - 1);
            gsTimer = setInterval(function(){ gsGoTo(gsCurrent + 1); }, 4000);
        }
        function gsNext() {
            clearInterval(gsTimer);
            gsGoTo(gsCurrent + 1);
            gsTimer = setInterval(function(){ gsGoTo(gsCurrent + 1); }, 4000);
        }

        // Re-snap to current index when resizing to avoid partial card display
        window.addEventListener('resize', function() { gsGoTo(gsCurrent); });
    </script>
    <?php endif; ?>

    <!-- Berita Terbaru Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <!-- Section Header -->
            <div class="text-center mb-8 animate-fadeInUp">
               
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Berita Terkini</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Informasi dan update terbaru seputar kegiatan sekolah kami</p>
            </div>

            <!-- Berita Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" data-stagger>
                <?php $__empty_1 = true; $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div
                        class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl flex flex-col cursor-pointer beranda-popup-trigger"
                        data-popup-title="<?php echo e($berita->judul); ?>"
                        data-popup-meta="<?php echo e($berita->tanggal_terbit->format('d M Y')); ?>"
                        data-popup-description="<?php echo e(e(strip_tags($berita->konten ?? ''))); ?>"
                        data-popup-image="<?php echo e($berita->gambar ? asset('storage/' . $berita->gambar) : ''); ?>"
                        data-popup-link="<?php echo e(route('berita.show', $berita->slug)); ?>"
                        data-popup-link-label="Baca Berita"
                        role="button"
                        tabindex="0"
                        aria-label="Lihat detail berita <?php echo e($berita->judul); ?>"
                    >
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative flex-shrink-0">
                            <?php if($berita->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $berita->gambar)); ?>" alt="<?php echo e($berita->judul); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            <?php endif; ?>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-1">
                            <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-3 self-start">
                                <?php echo e($berita->tanggal_terbit->format('d M Y')); ?>

                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2"><?php echo e($berita->judul); ?></h3>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4 flex-1"><?php echo e(Str::limit(strip_tags($berita->konten), 150)); ?></p>
                            <span class="inline-block px-4 py-2 bg-blue-600 text-white rounded-full font-semibold self-start mt-auto">
                                Baca Selengkapnya
                            </span>
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
                <a href="/berita" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <!-- Section Header -->
            <div class="text-center mb-8 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Galeri Foto Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Dokumentasi kegiatan dan momen berharga di sekolah kami</p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" data-stagger>
                <?php $__empty_1 = true; $__currentLoopData = $galeris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div
                        class="card-hover group bg-white rounded-lg border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl cursor-pointer beranda-popup-trigger"
                        data-popup-title="<?php echo e($galeri->judul); ?>"
                        data-popup-meta="<?php echo e($galeri->tanggal_upload->format('d M Y')); ?>"
                        data-popup-description="<?php echo e(e(strip_tags($galeri->deskripsi ?? ''))); ?>"
                        data-popup-image="<?php echo e($galeri->gambar ? asset('storage/' . $galeri->gambar) : ''); ?>"
                        data-popup-link="/galeri"
                        data-popup-link-label="Lihat Semua Galeri"
                        role="button"
                        tabindex="0"
                        aria-label="Lihat detail galeri <?php echo e($galeri->judul); ?>"
                    >
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
                <a href="/galeri" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-full hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Galeri
                </a>
            </div>

            <div id="beranda-popup-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
                <div class="absolute inset-0 bg-black/70" data-close-beranda-popup></div>
                <div class="relative w-full max-w-3xl rounded-2xl bg-white shadow-2xl overflow-hidden">
                    <button
                        type="button"
                        class="absolute right-3 top-3 z-10 inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-gray-700 hover:bg-white"
                        data-close-beranda-popup
                        aria-label="Tutup popup"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>

                    <div class="h-64 sm:h-80 bg-gradient-to-br from-blue-100 to-blue-200">
                        <img id="beranda-popup-image" src="" alt="" class="hidden w-full h-full object-cover">
                        <div id="beranda-popup-fallback" class="w-full h-full flex items-center justify-center">
                            <i class="bi bi-image text-blue-500 text-6xl opacity-70"></i>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-start justify-between gap-3">
                            <h3 id="beranda-popup-title" class="text-2xl font-bold text-gray-900"></h3>
                            <span id="beranda-popup-meta" class="hidden bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full"></span>
                        </div>
                        <p id="beranda-popup-description" class="mt-4 text-gray-600 leading-relaxed"></p>
                        <a id="beranda-popup-link" href="#" class="hidden mt-5 px-4 py-2 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-colors duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="py-8 bg-gradient-to-r from-blue-600 to-blue-700">
        <div class="max-w-4xl mx-auto px-6 sm:px-8 lg:px-10 text-center">
            <!-- Section Header -->
            <div class="mb-8 animate-fadeInUp">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">Hubungi Kami</h2>
                <p class="text-lg text-blue-100 max-w-2xl mx-auto leading-relaxed">
                    Ikuti Instagram kami untuk melihat kegiatan terbaru, informasi sekolah, dan momen-momen terbaik siswa SD Negeri 3 Krasak Bangsri.
                </p>
            </div>

            <!-- CTA Button -->
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="<?php echo e(\App\Models\Setting::get('sekolah_instagram', 'https://www.instagram.com/sdn3krasakbangsri')); ?>" target="_blank" rel="noopener noreferrer"
                         class="card-hover group inline-flex items-center gap-3 bg-white hover:bg-gray-50 text-blue-600 font-bold px-8 py-4 rounded-full shadow-xl hover:shadow-2xl transition-all duration-300 text-lg">
                    <i class="bi bi-instagram text-xl"></i>
                    <span>Kunjungi Instagram Kami</span>
                </a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('beranda-popup-modal');
            const titleEl = document.getElementById('beranda-popup-title');
            const metaEl = document.getElementById('beranda-popup-meta');
            const descriptionEl = document.getElementById('beranda-popup-description');
            const imageEl = document.getElementById('beranda-popup-image');
            const fallbackEl = document.getElementById('beranda-popup-fallback');
            const linkEl = document.getElementById('beranda-popup-link');
            const triggers = document.querySelectorAll('.beranda-popup-trigger');
            const closeButtons = document.querySelectorAll('[data-close-beranda-popup]');

            if (!modal || !titleEl || !metaEl || !descriptionEl || !imageEl || !fallbackEl || !linkEl || !triggers.length) {
                return;
            }

            const openModal = function (trigger) {
                const title = trigger.dataset.popupTitle || 'Detail';
                const meta = trigger.dataset.popupMeta || '';
                const description = trigger.dataset.popupDescription || 'Tidak ada deskripsi.';
                const image = trigger.dataset.popupImage || '';
                const link = trigger.dataset.popupLink || '';
                const linkLabel = trigger.dataset.popupLinkLabel || 'Lihat Detail';

                titleEl.textContent = title;
                descriptionEl.textContent = description;

                if (meta !== '') {
                    metaEl.textContent = meta;
                    metaEl.classList.remove('hidden');
                } else {
                    metaEl.classList.add('hidden');
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

                if (link !== '') {
                    linkEl.href = link;
                    linkEl.textContent = linkLabel;
                    linkEl.classList.remove('hidden');
                } else {
                    linkEl.classList.add('hidden');
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

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/beranda.blade.php ENDPATH**/ ?>