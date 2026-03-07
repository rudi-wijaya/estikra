<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'SD Negeri 3 Krasak Bangsri - Berkarakter, Berprestasi, Berakhlak Mulia'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-slideInRight {
            animation: slideInRight 0.8s ease-out;
        }

        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out;
        }

        /* Visi Accordion */
        .visi-content {
            animation: fadeIn 0.3s ease-out;
        }

        .visi-tab {
            position: relative;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 3px;
            background: #5a74e8;
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        nav a:hover::after,
        nav a.active::after {
            width: 100%;
        }

        /* Hamburger animated bars */
        .hamburger-bar {
            display: block;
            width: 22px;
            height: 2px;
            border-radius: 2px;
            background-color: currentColor;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                        opacity 0.25s ease,
                        width 0.3s ease;
            transform-origin: center;
        }

        /* Open state */
        .hamburger.open .bar-top {
            transform: translateY(8px) rotate(45deg);
        }
        .hamburger.open .bar-mid {
            opacity: 0;
            width: 0;
        }
        .hamburger.open .bar-bot {
            transform: translateY(-8px) rotate(-45deg);
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nav-mobile {
            animation: slideInDown 0.25s ease-out;
        }

        /* Mobile nav — default (white navbar / all pages except beranda hero) */
        .mobile-nav-link {
            display: block;
            padding: 14px 18px;
            text-decoration: none;
            font-weight: 500;
            border-radius: 14px;
            transition: all 0.2s ease;
            background: #f1f3f9;
            color: #374151;
            border: none;
            text-shadow: none;
            box-shadow: none;
        }

        .mobile-nav-link:hover {
            background: #5a74e8;
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(90,116,232,0.25);
        }

        .mobile-nav-link.active {
            background: #5a74e8;
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(90,116,232,0.25);
        }

        /* Mobile nav — beranda hero (transparan, belum scroll) */
        #navbar-header[data-transparent]:not(.scrolled) .mobile-nav-link {
            background: #f1f3f9;
            color: #111827;
            border: none;
            text-shadow: none;
        }

        #navbar-header[data-transparent]:not(.scrolled) .mobile-nav-link:hover {
            background: #5a74e8;
            color: #ffffff;
            text-shadow: none;
        }

        #navbar-header[data-transparent]:not(.scrolled) .mobile-nav-link.active {
            background: #5a74e8;
            color: #ffffff;
            text-shadow: none;
        }



        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Default: navbar selalu solid (untuk halaman selain beranda) */
        #navbar-header {
            background-color: rgba(255, 255, 255, 0.97);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: background-color 0.5s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Hanya di beranda: navbar transparan saat belum scroll */
        #navbar-header[data-transparent] {
            background-color: transparent;
            box-shadow: none;
        }

        #navbar-header[data-transparent].scrolled {
            background-color: rgba(255, 255, 255, 0.97);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Warna teks default (halaman biasa): hitam */
        #navbar-header .nav-link {
            color: #111827;
            transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #navbar-header .nav-logo-text h1 {
            color: #111827;
            transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #navbar-header .nav-logo-text p {
            color: #4b5563;
            transition: color 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #navbar-header .hamburger .hamburger-bar {
            background-color: #111827;
        }

        /* Warna teks di beranda: putih saat transparan */
        #navbar-header[data-transparent]:not(.scrolled) .nav-link {
            color: #ffffff;
            text-shadow: 0 1px 6px rgba(0,0,0,0.5);
        }

        #navbar-header[data-transparent]:not(.scrolled) .nav-logo-text h1 {
            color: #ffffff;
            text-shadow: 0 1px 6px rgba(0,0,0,0.5);
        }

        #navbar-header[data-transparent]:not(.scrolled) .nav-logo-text p {
            color: rgba(255,255,255,0.7);
            text-shadow: 0 1px 4px rgba(0,0,0,0.4);
        }

        #navbar-header[data-transparent]:not(.scrolled) .hamburger .hamburger-bar {
            background-color: #ffffff;
        }

        /* Setelah scroll di beranda: warna hitam */
        #navbar-header[data-transparent].scrolled .nav-link {
            color: #111827;
        }

        #navbar-header[data-transparent].scrolled .nav-logo-text h1 {
            color: #111827;
        }

        #navbar-header[data-transparent].scrolled .nav-logo-text p {
            color: #4b5563;
        }

        #navbar-header[data-transparent].scrolled .hamburger .hamburger-bar {
            background-color: #111827;
        }

        #navbar-header .top-bar {
            transition: opacity 0.4s ease-in-out, max-height 0.4s ease-in-out, padding 0.4s ease-in-out;
            overflow: hidden;
            max-height: 60px;
        }

        /* Top bar hanya disembunyikan saat scroll di beranda */
        #navbar-header[data-transparent].scrolled .top-bar {
            opacity: 0;
            max-height: 0;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-slate-50 to-white text-gray-700">
    <!-- Fixed Top Bar + Navigation -->
    <div id="navbar-header" class="fixed top-0 left-0 right-0 w-full z-50 backdrop-blur-sm" <?php if(request()->is('/')): ?> data-transparent="true" <?php endif; ?>>

        <!-- Top Header -->
        <div class="top-bar text-white py-2.5 text-xs" style="background-color: #5a74e8;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <!-- Email & Phone: hanya desktop -->
                    <div class="hidden sm:flex gap-6">
                        <a href="mailto:<?php echo e(\App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com')); ?>" class="flex items-center gap-2 hover:text-blue-200 transition-colors duration-300">
                            <i class="bi bi-envelope-fill"></i>
                            <span><?php echo e(\App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com')); ?></span>
                        </a>
                        <a href="tel:<?php echo e(\App\Models\Setting::get('sekolah_telepon', '(0291) 771380')); ?>" class="flex items-center gap-2 hover:text-blue-200 transition-colors duration-300">
                            <i class="bi bi-telephone-fill"></i>
                            <span><?php echo e(\App\Models\Setting::get('sekolah_telepon', '(0291) 771380')); ?></span>
                        </a>
                    </div>
                    <!-- Sosmed: selalu tampil, di mobile center -->
                    <div class="flex gap-4 sm:ml-auto mx-auto sm:mx-0">
                        <a href="<?php echo e(\App\Models\Setting::get('sekolah_instagram', 'https://www.instagram.com/sdn3krasakbangsri')); ?>" target="_blank" class="w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="Instagram"><i class="bi bi-instagram text-sm"></i></a>
                        <a href="<?php echo e(\App\Models\Setting::get('sekolah_youtube', 'https://youtube.com/@sdnegeri3krasakbangsri786')); ?>" target="_blank" class="w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="YouTube"><i class="bi bi-youtube text-sm"></i></a>
                        <a href="<?php echo e(\App\Models\Setting::get('sekolah_tiktok', 'https://www.tiktok.com/@sdn3krasakbangsri')); ?>" target="_blank" class="w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="TikTok"><i class="bi bi-tiktok text-sm"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header/Navigation -->
        <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <?php $logoUrl = \App\Models\Setting::get('sekolah_logo'); ?>
                    <?php if($logoUrl): ?>
                        <img src="<?php echo e(asset($logoUrl)); ?>" alt="Logo Sekolah" class="w-14 h-14 object-contain">
                    <?php else: ?>
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center shadow-lg" style="background-color: #5a74e8;">
                            <span class="text-white font-bold text-lg">SD</span>
                        </div>
                    <?php endif; ?>
                    <div class="nav-logo-text hidden sm:block">
                        <h1 class="text-sm font-bold transition-colors duration-300">SD Negeri 3 Krasak</h1>
                        <p class="text-xs transition-colors duration-300">Berkarakter Berprestasi</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex">
                    <ul class="flex gap-1">
                        <li><a href="/" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 <?php if(request()->is('/')): ?> active <?php endif; ?>">Beranda</a></li>
                        <li><a href="/tentang" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 <?php if(request()->is('tentang')): ?> active <?php endif; ?>">Tentang</a></li>
                        <li><a href="/program" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 <?php if(request()->is('program')): ?> active <?php endif; ?>">Program</a></li>
                        <li><a href="/guru-staff" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 <?php if(request()->is('guru-staff')): ?> active <?php endif; ?>">Guru &amp; Staff</a></li>
                        <li><a href="/berita" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 <?php if(request()->is('berita')): ?> active <?php endif; ?>">Berita</a></li>
                        <li><a href="/galeri" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 <?php if(request()->is('galeri')): ?> active <?php endif; ?>">Galeri</a></li>
                        <li><a href="/ppdb" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 <?php if(request()->is('ppdb')): ?> active <?php endif; ?>">PPDB</a></li>
                        <li><a href="/kontak" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 <?php if(request()->is('kontak')): ?> active <?php endif; ?>">Kontak</a></li>
                    </ul>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="hamburger lg:hidden flex flex-col items-center justify-center gap-1.5 bg-transparent border-none cursor-pointer p-2" id="hamburger" aria-label="Toggle menu">
                    <span class="hamburger-bar bar-top"></span>
                    <span class="hamburger-bar bar-mid"></span>
                    <span class="hamburger-bar bar-bot"></span>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav id="navbar" class="hidden lg:hidden nav-mobile rounded-b-3xl overflow-hidden bg-white shadow-lg">
                <div class="py-4 px-4 pb-5">
                    <ul class="flex flex-col gap-2">
                        <li><a href="/" class="mobile-nav-link <?php if(request()->is('/')): ?> active <?php endif; ?>">Beranda</a></li>
                        <li><a href="/tentang" class="mobile-nav-link <?php if(request()->is('tentang')): ?> active <?php endif; ?>">Tentang</a></li>
                        <li><a href="/program" class="mobile-nav-link <?php if(request()->is('program')): ?> active <?php endif; ?>">Program</a></li>
                        <li><a href="/guru-staff" class="mobile-nav-link <?php if(request()->is('guru-staff')): ?> active <?php endif; ?>">Guru & Staff</a></li>
                        <li><a href="/berita" class="mobile-nav-link <?php if(request()->is('berita')): ?> active <?php endif; ?>">Berita</a></li>
                        <li><a href="/galeri" class="mobile-nav-link <?php if(request()->is('galeri')): ?> active <?php endif; ?>">Galeri</a></li>
                        <li><a href="/ppdb" class="mobile-nav-link <?php if(request()->is('ppdb')): ?> active <?php endif; ?>">PPDB</a></li>
                        <li><a href="/kontak" class="mobile-nav-link <?php if(request()->is('kontak')): ?> active <?php endif; ?>">Kontak</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    </div><!-- end #navbar-header -->

    <!-- Main Content -->
    <main class="min-h-screen <?php if(!request()->is('/')): ?> pt-32 <?php endif; ?>">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Footer Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- About & Contact -->
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <?php $logoUrl = \App\Models\Setting::get('sekolah_logo'); ?>
                        <?php if($logoUrl): ?>
                            <img src="<?php echo e(asset($logoUrl)); ?>" alt="Logo Sekolah" class="w-16 h-16 object-contain">
                        <?php else: ?>
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-xl">SD</span>
                            </div>
                        <?php endif; ?>
                        <div>
                            <h3 class="text-white font-bold text-sm">SD Negeri 3</h3>
                            <p class="text-xs text-gray-400">Krasak Bangsri</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed mb-4"><?php echo e(\App\Models\Setting::get('sekolah_alamat', 'Jl. Raya Krasak No. 45 Desa Krasak, Kec. Bangsri Kabupaten Jepara, Jawa Tengah 59453')); ?></p>
                    <p class="text-xs font-semibold text-gray-300 mb-3">No Telp</p>
                    <p class="text-sm font-bold text-blue-400 mb-4"><?php echo e(\App\Models\Setting::get('sekolah_telepon', '(0291) 771380')); ?></p>
                    <div class="flex gap-3">
                        <a href="<?php echo e(\App\Models\Setting::get('sekolah_instagram', 'https://www.instagram.com/sdn3krasakbangsri')); ?>" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
                            <i class="bi bi-instagram text-sm"></i>
                        </a>
                        <a href="<?php echo e(\App\Models\Setting::get('sekolah_youtube', 'https://youtube.com/@sdnegeri3krasakbangsri786')); ?>" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
                            <i class="bi bi-youtube text-sm"></i>
                        </a>
                        <a href="<?php echo e(\App\Models\Setting::get('sekolah_tiktok', 'https://www.tiktok.com/@sdn3krasakbangsri')); ?>" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
                            <i class="bi bi-tiktok text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Menu Utama -->
                <div>
                    <h4 class="text-white font-bold mb-4 text-sm">Menu Utama</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="/" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Beranda</a></li>
                        <li><a href="/tentang" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Tentang</a></li>
                        <li><a href="/berita" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Berita</a></li>
                        <li><a href="/galeri" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Galeri</a></li>
                        <li><a href="/kontak" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Kontak</a></li>
                    </ul>
                </div>

                <!-- Lain - Lain -->
                <div>
                    <h4 class="text-white font-bold mb-4 text-sm">Lain - Lain</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="/program" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Program Unggulan</a></li>
                        <li><a href="/guru-staff" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">guru & staff</a></li>
                        <li><a href="/tentang" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Fasilitas</a></li>
                        <li><a href="/tentang" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Visi & Misi</a></li>
                    </ul>
                </div>

                <!-- Maps -->
                <div>
                    <h4 class="text-white font-bold mb-3 text-sm">Maps</h4>
                    <div class="rounded-lg overflow-hidden h-40 shadow-lg border border-gray-700">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d559.8102610922303!2d110.75636700555906!3d-6.528610492722258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e71189725f32787%3A0x9d13f4409aad6ce8!2sSD%20Negeri%201%2C%202%20dan%203%20Krasak%20Bangsri!5e1!3m2!1sen!2sid!4v1771315568758!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-800"></div>

            <!-- Footer Bottom -->
            <div class="flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500 gap-3 pt-6">
                <p>&copy; 2026 © SD Negeri 3 Krasak Bangsri, All Right Reserved. dikembangkan oleh <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors duration-300 underline">M Rudi Wijaya</a></p>
            </div>
        </div>
    </footer>

    <script>
        // Scroll ke atas saat halaman dimuat/refresh
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        window.scrollTo(0, 0);

        // Navbar scroll effect (hanya aktif di beranda)
        const navbarHeader = document.getElementById('navbar-header');
        if (navbarHeader.hasAttribute('data-transparent')) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbarHeader.classList.add('scrolled');
                } else {
                    navbarHeader.classList.remove('scrolled');
                }
            });
        } else {
            navbarHeader.classList.add('scrolled');
        }

        // Hamburger menu
        const hamburger = document.getElementById('hamburger');
        const navbar = document.getElementById('navbar');
        const navLinks = navbar.querySelectorAll('a');

        function openMenu() {
            navbar.classList.remove('hidden');
            hamburger.classList.add('open');
        }

        function closeMenu() {
            navbar.classList.add('hidden');
            hamburger.classList.remove('open');
        }

        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            navbar.classList.contains('hidden') ? openMenu() : closeMenu();
        });

        // Close menu when clicking on a link
        navLinks.forEach(link => {
            link.addEventListener('click', () => closeMenu());
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('header')) closeMenu();
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const navbarHeight = document.getElementById('navbar-header').offsetHeight;
                        const top = target.getBoundingClientRect().top + window.scrollY - navbarHeight - 16;
                        window.scrollTo({ top, behavior: 'smooth' });
                    }
                }
            });
        });

        // Intersection Observer untuk animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeInUp');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('[data-animate]').forEach(el => {
            observer.observe(el);
        });

        // Visi / Misi expand/collapse with smooth Tailwind animation
        function toggleCollapse(contentId, iconId) {
            const el = document.getElementById(contentId);
            const icon = document.getElementById(iconId);
            const isOpen = el.dataset.open === 'true';

            if (!isOpen) {
                el.classList.remove('max-h-0', 'opacity-0');
                el.classList.add('max-h-96', 'opacity-100');
                el.dataset.open = 'true';
                icon.style.transform = 'rotate(180deg)';
            } else {
                el.classList.remove('max-h-96', 'opacity-100');
                el.classList.add('max-h-0', 'opacity-0');
                el.dataset.open = 'false';
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\estikra\resources\views/layouts/public.blade.php ENDPATH**/ ?>