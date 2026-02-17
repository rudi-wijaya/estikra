<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SD Negeri 3 Krasak Bangsri - Berkarakter, Berprestasi, Berakhlak Mulia')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        nav a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        nav a:hover::after,
        nav a.active::after {
            width: 100%;
        }

        .hamburger span {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(12px, 12px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        .nav-mobile {
            animation: slideInRight 0.3s ease-out;
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
    </style>
</head>
<body class="bg-gradient-to-b from-slate-50 to-white text-gray-700">
    <!-- Top Header -->
    <div class="hidden sm:block bg-gradient-to-r from-blue-900 to-blue-800 text-white py-2.5 text-xs border-b border-blue-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-3">
                <div class="flex flex-col sm:flex-row gap-6">
                    <a href="mailto:sdn3krasakbangsri@gmail.com" class="flex items-center gap-2 hover:text-blue-200 transition-colors duration-300">
                        <i class="bi bi-envelope-fill"></i>
                        <span>sdn3krasakbangsri@gmail.com</span>
                    </a>
                    <a href="tel:+6291771380" class="flex items-center gap-2 hover:text-blue-200 transition-colors duration-300">
                        <i class="bi bi-telephone-fill"></i>
                        <span>(0291) 771380</span>
                    </a>
                </div>
                <div class="flex gap-4">
                    <a href="https://www.instagram.com/sdn3krasakbangsri" target="_blank" class="text-white w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="Instagram"><i class="bi bi-instagram text-sm"></i></a>
                    <a href="https://youtube.com/@sdnegeri3krasakbangsri786" target="_blank" class="text-white w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="YouTube"><i class="bi bi-youtube text-sm"></i></a>
                    <a href="https://www.tiktok.com/@sdn3krasakbangsri" target="_blank" class="text-white w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="TikTok"><i class="bi bi-tiktok text-sm"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header/Navigation -->
    <header class="sticky top-0 z-50 bg-white shadow-md backdrop-blur-sm bg-opacity-95">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <span class="text-white font-bold text-lg">SD</span>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-sm font-bold text-gray-900">SD Negeri 3 Krasak</h1>
                        <p class="text-xs text-gray-500">Berkarakter Berprestasi</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex">
                    <ul class="flex gap-1">
                        <li><a href="/" class="px-4 py-2 no-underline text-gray-700 font-medium transition-colors duration-300 relative group hover:text-blue-600 @if(request()->is('/')) active text-blue-600 @endif">Beranda</a></li>
                        <li><a href="/tentang" class="px-4 py-2 no-underline text-gray-700 font-medium transition-colors duration-300 relative group hover:text-blue-600 @if(request()->is('tentang')) active text-blue-600 @endif">Tentang</a></li>
                        <li><a href="/program" class="px-4 py-2 no-underline text-gray-700 font-medium transition-colors duration-300 relative group hover:text-blue-600 @if(request()->is('program')) active text-blue-600 @endif">Program</a></li>
                        <li><a href="/guru-staff" class="px-4 py-2 no-underline text-gray-700 font-medium transition-colors duration-300 relative group hover:text-blue-600 @if(request()->is('guru-staff')) active text-blue-600 @endif">Guru & Staff</a></li>
                        <li><a href="/berita" class="px-4 py-2 no-underline text-gray-700 font-medium transition-colors duration-300 relative group hover:text-blue-600 @if(request()->is('berita')) active text-blue-600 @endif">Berita</a></li>
                        <li><a href="/galeri" class="px-4 py-2 no-underline text-gray-700 font-medium transition-colors duration-300 relative group hover:text-blue-600 @if(request()->is('galeri')) active text-blue-600 @endif">Galeri</a></li>
                        <li><a href="/kontak" class="px-4 py-2 no-underline text-gray-700 font-medium transition-colors duration-300 relative group hover:text-blue-600 @if(request()->is('kontak')) active text-blue-600 @endif">Kontak</a></li>
                    </ul>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="hamburger lg:hidden flex flex-col bg-transparent border-none cursor-pointer p-2 gap-1.5 hover:opacity-75 transition-opacity" id="hamburger">
                    <span class="w-6 h-0.5 bg-gray-900 rounded-full"></span>
                    <span class="w-6 h-0.5 bg-gray-900 rounded-full"></span>
                    <span class="w-6 h-0.5 bg-gray-900 rounded-full"></span>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav id="navbar" class="hidden lg:hidden nav-mobile">
                <div class="border-t border-gray-100 py-4 px-2">
                    <ul class="flex flex-col gap-2">
                        <li><a href="/" class="block px-4 py-2 no-underline text-gray-700 font-medium rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 @if(request()->is('/')) active bg-blue-50 text-blue-600 @endif">Beranda</a></li>
                        <li><a href="/tentang" class="block px-4 py-2 no-underline text-gray-700 font-medium rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 @if(request()->is('tentang')) active bg-blue-50 text-blue-600 @endif">Tentang</a></li>
                        <li><a href="/program" class="block px-4 py-2 no-underline text-gray-700 font-medium rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 @if(request()->is('program')) active bg-blue-50 text-blue-600 @endif">Program</a></li>
                        <li><a href="/guru-staff" class="block px-4 py-2 no-underline text-gray-700 font-medium rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 @if(request()->is('guru-staff')) active bg-blue-50 text-blue-600 @endif">Guru & Staff</a></li>
                        <li><a href="/berita" class="block px-4 py-2 no-underline text-gray-700 font-medium rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 @if(request()->is('berita')) active bg-blue-50 text-blue-600 @endif">Berita</a></li>
                        <li><a href="/galeri" class="block px-4 py-2 no-underline text-gray-700 font-medium rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 @if(request()->is('galeri')) active bg-blue-50 text-blue-600 @endif">Galeri</a></li>
                        <li><a href="/kontak" class="block px-4 py-2 no-underline text-gray-700 font-medium rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300 @if(request()->is('kontak')) active bg-blue-50 text-blue-600 @endif">Kontak</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Footer Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- About & Contact -->
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-xl">SD</span>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-sm">SD Negeri 3</h3>
                            <p class="text-xs text-gray-400">Krasak Bangsri</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed mb-4">Jl. Raya Krasak No. 45 Desa Krasak, Kec. Bangsri Kabupaten Jepara, Jawa Tengah 59453</p>
                    <p class="text-xs font-semibold text-gray-300 mb-3">No Telp</p>
                    <p class="text-sm font-bold text-blue-400 mb-4">(0291) 771380</p>
                    <div class="flex gap-3">
                        <a href="https://www.instagram.com/sdn3krasakbangsri" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
                            <i class="bi bi-instagram text-sm"></i>
                        </a>
                        <a href="https://youtube.com/@sdnegeri3krasakbangsri786" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
                            <i class="bi bi-youtube text-sm"></i>
                        </a>
                        <a href="https://www.tiktok.com/@sdn3krasakbangsri" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
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
        const hamburger = document.getElementById('hamburger');
        const navbar = document.getElementById('navbar');
        const navLinks = navbar.querySelectorAll('a');

        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            hamburger.classList.toggle('active');
            navbar.classList.toggle('hidden');
        });

        // Close menu when clicking on a link
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navbar.classList.add('hidden');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('header')) {
                hamburger.classList.remove('active');
                navbar.classList.add('hidden');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
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
    </script>
</body>
</html>
