<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SD Negeri 3 Krasak Bangsri - Berkarakter, Berprestasi, Berakhlak Mulia')</title>
    @php $faviconUrl = \App\Models\Setting::get('sekolah_logo'); @endphp
    <link rel="icon" href="{{ $faviconUrl ? asset($faviconUrl) : asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ $faviconUrl ? asset($faviconUrl) : asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        html {
            scrollbar-gutter: stable;
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

        [data-animate] {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.25s ease, transform 0.25s ease;
            will-change: opacity, transform;
        }

        [data-animate].in-view {
            opacity: 1;
            transform: translateY(0);
        }

        [data-stagger] > * {
            opacity: 0;
            transform: translateY(20px);
        }

        [data-stagger].in-view > * {
            animation: fadeInUp 0.7s ease-out forwards;
            animation-delay: calc(var(--stagger-order, 0) * 90ms);
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
            background: #007AFF;
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        nav a:hover::after,
        nav a.active::after {
            width: 100%;
        }

        /* Hamburger animated bars */
        .hamburger {
            position: relative;
            width: 40px;
            height: 40px;
        }

        .hamburger-bar {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 22px;
            height: 2px;
            border-radius: 2px;
            background-color: currentColor;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                        opacity 0.25s ease;
            transform-origin: center;
        }

        .hamburger .bar-top {
            transform: translate(-50%, calc(-50% - 7px));
        }

        .hamburger .bar-mid {
            transform: translate(-50%, -50%);
        }

        .hamburger .bar-bot {
            transform: translate(-50%, calc(-50% + 7px));
        }

        /* Open state */
        .hamburger.open .bar-top {
            transform: translate(-50%, -50%) rotate(45deg);
        }
        .hamburger.open .bar-mid {
            opacity: 0;
        }
        .hamburger.open .bar-bot {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        /* Mobile nav */
        .mobile-nav-link {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 0;
            padding: 14px 18px;
            text-decoration: none;
            font-weight: 500;
            border-radius: 14px;
            transition: all 0.2s ease;
            background: transparent;
            color: #334155;
            border: none;
            text-shadow: none;
            box-shadow: none;
            font-size: 1.2rem;
            line-height: 1.2;
            width: 100%;
        }

        .mobile-nav-link:hover {
            color: #1d4ed8;
        }

        .mobile-nav-link.active {
            background: #007AFF;
            color: #ffffff;
            border-radius: 12px;
            font-weight: 700;
            text-shadow: none;
        }

        .mobile-nav-link .menu-icon {
            display: none;
        }

        .mobile-nav-link.active .menu-icon {
            color: #ffffff;
        }

        .mobile-nav-link::after {
            display: none;
        }

        #navbar-backdrop {
            transition: opacity 0.3s ease;
        }

        #navbar-panel {
            transition: transform 0.3s ease;
        }

        #navbar {
            pointer-events: none;
        }

        #navbar-backdrop,
        #navbar-panel {
            pointer-events: auto;
        }



        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }

        .gradient-text {
            background: linear-gradient(135deg, #007AFF 0%, #3396ff 100%);
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

        /* Keep mobile menu state consistent regardless of page scroll position */
        #navbar-header.mobile-menu-open {
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            backdrop-filter: none;
        }

        #navbar-header.mobile-menu-open .hamburger .hamburger-bar {
            background-color: #111827 !important;
        }

        @media (max-width: 1023px) {
            #navbar-header .top-bar {
                display: none;
            }
        }

        /* Hide top bar on mobile when user scrolls down */
        #navbar-header.mobile-topbar-hidden .top-bar {
            opacity: 0;
            max-height: 0;
            padding-top: 0;
            padding-bottom: 0;
            pointer-events: none;
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
    <div id="navbar-header" class="fixed top-0 left-0 right-0 w-full z-50 backdrop-blur-sm" @if(request()->is('/')) data-transparent="true" @endif>

        <!-- Top Header -->
        <div class="top-bar text-white py-2.5 text-xs" style="background-color: #007AFF;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <!-- Email & Phone: hanya desktop -->
                    <div class="hidden sm:flex gap-6">
                        <a href="mailto:{{ \App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com') }}" class="flex items-center gap-2 hover:text-blue-200 transition-colors duration-300">
                            <i class="bi bi-envelope-fill"></i>
                            <span>{{ \App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com') }}</span>
                        </a>
                        @php $phoneNumber = trim(\App\Models\Setting::get('sekolah_telepon', '')); @endphp
                        @if ($phoneNumber !== '')
                            <a href="tel:{{ $phoneNumber }}" class="flex items-center gap-2 hover:text-blue-200 transition-colors duration-300">
                                <i class="bi bi-telephone-fill"></i>
                                <span>{{ $phoneNumber }}</span>
                            </a>
                        @endif
                    </div>
                    <!-- Sosmed: selalu tampil, di mobile center -->
                    <div class="flex gap-4 sm:ml-auto mx-auto sm:mx-0">
                        <a href="{{ \App\Models\Setting::get('sekolah_instagram', 'https://www.instagram.com/sdn3krasakbangsri') }}" target="_blank" class="w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="Instagram"><i class="bi bi-instagram text-sm"></i></a>
                        <a href="{{ \App\Models\Setting::get('sekolah_youtube', 'https://youtube.com/@sdnegeri3krasakbangsri786') }}" target="_blank" class="w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="YouTube"><i class="bi bi-youtube text-sm"></i></a>
                        <a href="{{ \App\Models\Setting::get('sekolah_tiktok', 'https://www.tiktok.com/@sdn3krasakbangsri') }}" target="_blank" class="w-8 h-8 flex items-center justify-center transition-all duration-300 transform hover:scale-110 opacity-90 hover:opacity-100" title="TikTok"><i class="bi bi-tiktok text-sm"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header/Navigation -->
        <header>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="main-nav-row" class="flex justify-between items-center py-3">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="logo-home-link flex items-center gap-3 no-underline">
                    @php $logoUrl = \App\Models\Setting::get('sekolah_logo'); @endphp
                    @if($logoUrl)
                        <img src="{{ asset($logoUrl) }}" alt="Logo Sekolah" class="w-14 h-14 object-contain">
                    @else
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center shadow-lg" style="background-color: #007AFF;">
                            <span class="text-white font-bold text-lg">SD</span>
                        </div>
                    @endif
                    <div class="nav-logo-text hidden sm:block">
                        <h1 class="text-sm font-bold transition-colors duration-300">{{ \App\Models\Setting::get('sekolah_nama', 'SD Negeri 3 Krasak Bangsri') }}</h1>
                        <p class="text-xs transition-colors duration-300">{{ \App\Models\Setting::get('sekolah_tagline', 'Berkarakter Berprestasi') }}</p>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex">
                    <ul class="flex gap-1">
                        <li><a href="/" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 @if(request()->is('/')) active @endif">Beranda</a></li>
                        <li><a href="/tentang" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 @if(request()->is('tentang')) active @endif">Tentang</a></li>
                        <li><a href="/program" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 @if(request()->is('program')) active @endif">Program</a></li>
                        <li><a href="/guru-staff" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 @if(request()->is('guru-staff')) active @endif">Guru &amp; Staff</a></li>
                        <li><a href="/berita" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 @if(request()->is('berita')) active @endif">Berita</a></li>
                        <li><a href="/galeri" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 @if(request()->is('galeri')) active @endif">Galeri</a></li>
                        <li><a href="/ppdb" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 @if(request()->is('ppdb')) active @endif">PPDB</a></li>
                        <li><a href="/kontak" class="nav-link px-4 py-2 no-underline font-medium transition-colors duration-300 relative group hover:text-blue-300 @if(request()->is('kontak')) active @endif">Kontak</a></li>
                    </ul>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="hamburger lg:hidden relative z-[85] bg-transparent border-none cursor-pointer" id="hamburger" aria-label="Toggle menu">
                    <span class="hamburger-bar bar-top"></span>
                    <span class="hamburger-bar bar-mid"></span>
                    <span class="hamburger-bar bar-bot"></span>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav id="navbar" class="hidden lg:hidden fixed inset-0 z-[45]" aria-label="Mobile Navigation">
                <div id="navbar-backdrop" class="absolute inset-x-0 bottom-0 bg-slate-900/20 opacity-0" style="top: var(--mobile-menu-offset, 0px);"></div>
                <div id="navbar-panel" class="absolute right-0 overflow-y-auto bg-white px-4 pb-5 pt-3 shadow-xl border-l border-slate-100 translate-x-full rounded-bl-2xl" style="top: var(--mobile-menu-offset, 0px); width: min(82vw, 320px); max-height: calc(100vh - var(--mobile-menu-offset, 0px));">
                    <div class="pt-0">

                    <ul class="flex flex-col items-stretch gap-3">
                        <li>
                            <a href="/" class="mobile-nav-link @if(request()->is('/')) active @endif">
                                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75V19.5A2.25 2.25 0 0 0 6.75 21.75h10.5a2.25 2.25 0 0 0 2.25-2.25V9.75" />
                                </svg>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="/tentang" class="mobile-nav-link @if(request()->is('tentang')) active @endif">
                                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.852l.041-.02M12 6.75h.008v.008H12V6.75Z" />
                                    <circle cx="12" cy="12" r="9" />
                                </svg>
                                <span>Tentang</span>
                            </a>
                        </li>
                        <li>
                            <a href="/program" class="mobile-nav-link @if(request()->is('program')) active @endif">
                                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.272 0-2.5.266-3.615.745a.75.75 0 0 0-.385.695v12.62a.75.75 0 0 0 1.04.695A8.964 8.964 0 0 1 6 18.75c2.015 0 3.87.664 5.365 1.785a.75.75 0 0 0 .27.135V6.042Zm0 0A8.967 8.967 0 0 1 18 3.75c1.272 0 2.5.266 3.615.745a.75.75 0 0 1 .385.695v12.62a.75.75 0 0 1-1.04.695A8.964 8.964 0 0 0 18 18.75a8.966 8.966 0 0 0-5.365 1.785.75.75 0 0 1-.27.135V6.042Z" />
                                </svg>
                                <span>Program</span>
                            </a>
                        </li>
                        <li>
                            <a href="/guru-staff" class="mobile-nav-link @if(request()->is('guru-staff')) active @endif">
                                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.742-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.035.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.206-.576-5.965-1.584A6.062 6.062 0 0 1 6 18.75v-.031m12 0A5.971 5.971 0 0 0 15 15.75m3 2.969A5.971 5.971 0 0 1 15 15.75m0 0a3 3 0 1 0-6 0m6 0a3 3 0 1 1-6 0m6 0H9" />
                                </svg>
                                <span>Guru &amp; Staff</span>
                            </a>
                        </li>
                        <li>
                            <a href="/berita" class="mobile-nav-link @if(request()->is('berita')) active @endif">
                                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 6h-15A1.5 1.5 0 0 0 3 7.5v9A1.5 1.5 0 0 0 4.5 18h15a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 19.5 6Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 9.75h4.5m-4.5 3h10.5m-10.5 3h7.5" />
                                </svg>
                                <span>Berita</span>
                            </a>
                        </li>
                        <li>
                            <a href="/galeri" class="mobile-nav-link @if(request()->is('galeri')) active @endif">
                                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5h10.5A2.25 2.25 0 0 1 19.5 9.75v7.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 17.25v-7.5A2.25 2.25 0 0 1 6.75 7.5Z" />
                                    <circle cx="15.75" cy="11.25" r="1.125" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 17.25 4.5-4.5 2.625 2.625 1.875-1.875 4.5 4.5" />
                                </svg>
                                <span>Galeri</span>
                            </a>
                        </li>
                        <li>
                            <a href="/ppdb" class="mobile-nav-link @if(request()->is('ppdb')) active @endif">
                                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5.25A2.25 2.25 0 0 1 11.25 3h1.5A2.25 2.25 0 0 1 15 5.25V6h2.25A2.25 2.25 0 0 1 19.5 8.25v10.5A2.25 2.25 0 0 1 17.25 21H6.75A2.25 2.25 0 0 1 4.5 18.75V8.25A2.25 2.25 0 0 1 6.75 6H9v-.75Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 11.25h6m-6 3h4.5" />
                                </svg>
                                <span>PPDB</span>
                            </a>
                        </li>
                        <li>
                            <a href="/kontak" class="mobile-nav-link @if(request()->is('kontak')) active @endif">
                                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75A2.25 2.25 0 0 1 4.5 4.5h15A2.25 2.25 0 0 1 21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 7.5 8.25 6 8.25-6" />
                                </svg>
                                <span>Kontak</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    </div><!-- end #navbar-header -->

    <!-- Main Content -->
    <main class="min-h-screen @if(!request()->is('/')) pt-20 md:pt-32 @endif">
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
                        @php $logoUrl = \App\Models\Setting::get('sekolah_logo'); @endphp
                        @if($logoUrl)
                            <img src="{{ asset($logoUrl) }}" alt="Logo Sekolah" class="w-16 h-16 object-contain">
                        @else
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center shadow-lg">
                                <span class="text-white font-bold text-xl">SD</span>
                            </div>
                        @endif
                        <div>
                            <h3 class="text-white font-bold text-sm">{{ \App\Models\Setting::get('sekolah_nama', 'SD Negeri 3 Krasak Bangsri') }}</h3>
                            <p class="text-xs text-gray-400">{{ \App\Models\Setting::get('sekolah_tagline', 'Berkarakter Berprestasi') }}</p>
                        </div>
                    </div>
                    @php
                        $footerAlamat = trim(\App\Models\Setting::get('sekolah_alamat', ''));
                        $footerTelepon = trim(\App\Models\Setting::get('sekolah_telepon', ''));
                    @endphp
                    @if ($footerAlamat !== '')
                        <p class="text-xs text-gray-400 leading-relaxed mb-4">{{ $footerAlamat }}</p>
                    @endif
                    @if ($footerTelepon !== '')
                        <p class="text-xs font-semibold text-gray-300 mb-3">No Telp</p>
                        <p class="text-sm font-bold text-blue-400 mb-4">{{ $footerTelepon }}</p>
                    @endif
                    <div class="flex gap-3">
                        @php
                            $footerInstagram = trim(\App\Models\Setting::get('sekolah_instagram', ''));
                            $footerYoutube = trim(\App\Models\Setting::get('sekolah_youtube', ''));
                            $footerTiktok = trim(\App\Models\Setting::get('sekolah_tiktok', ''));
                        @endphp
                        @if ($footerInstagram !== '')
                            <a href="{{ $footerInstagram }}" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
                                <i class="bi bi-instagram text-sm"></i>
                            </a>
                        @endif
                        @if ($footerYoutube !== '')
                            <a href="{{ $footerYoutube }}" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
                                <i class="bi bi-youtube text-sm"></i>
                            </a>
                        @endif
                        @if ($footerTiktok !== '')
                            <a href="{{ $footerTiktok }}" target="_blank" class="w-8 h-8 bg-gray-800 hover:bg-blue-600 text-white flex items-center justify-center rounded transition-colors duration-300">
                                <i class="bi bi-tiktok text-sm"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Menu Utama Kolom 1 -->
                <div>
                    <h4 class="text-white font-bold mb-4 text-sm">Menu Utama</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="/" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Beranda</a></li>
                        <li><a href="/tentang" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Tentang</a></li>
                        <li><a href="/program" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Program</a></li>
                        <li><a href="/guru-staff" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Guru &amp; Staff</a></li>
                    </ul>
                </div>

                <!-- Menu Utama Kolom 2 -->
                <div>
                    <h4 class="text-white font-bold mb-4 text-sm">&nbsp;</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="/berita" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Berita</a></li>
                        <li><a href="/galeri" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Galeri</a></li>
                        <li><a href="/ppdb" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">PPDB</a></li>
                        <li><a href="/kontak" class="text-gray-400 hover:text-blue-400 transition-colors duration-300">Kontak</a></li>
                    </ul>
                </div>

                <!-- Maps -->
                <div>
                    <h4 class="text-white font-bold mb-3 text-sm">Maps</h4>
                    <div class="rounded-lg overflow-hidden h-40 shadow-lg border border-gray-700">
                        <iframe src="{{ \App\Models\Setting::get('footer_maps_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d559.8102610922303!2d110.75636700555906!3d-6.528610492722258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e71189725f32787%3A0x9d13f4409aad6ce8!2sSD%20Negeri%201%2C%202%20dan%203%20Krasak%20Bangsri!5e1!3m2!1sen!2sid!4v1771315568758!5m2!1sen!2sid') }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-800"></div>

            <!-- Footer Bottom -->
            <div class="flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500 gap-3 pt-6">
                <p>&copy; {{ date('Y') }} {{ \App\Models\Setting::get('sekolah_nama', 'SD Negeri 3 Krasak Bangsri') }}, All Right Reserved. dikembangkan oleh <a href="https://www.instagram.com/deekund" target="_blank" rel="noopener noreferrer" class="text-blue-400 hover:text-blue-300 transition-colors duration-300 underline">M. Rudi Wijaya</a></p>
            </div>
        </div>
    </footer>

    <script>
        // Scroll ke atas saat halaman dimuat/refresh
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        window.scrollTo(0, 0);

        // Logo: dari halaman mana pun ke beranda; jika sudah di beranda, paksa refresh dari atas.
        document.querySelectorAll('.logo-home-link').forEach(function (el) {
            el.addEventListener('click', function (e) {
                if (window.location.pathname === '/') {
                    e.preventDefault();
                    window.location.reload();
                }
            });
        });

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

        // Mobile top bar hide/show on scroll (all pages)
        let lastScrollY = window.scrollY;

        function updateMobileMenuOffset() {
            const mobileNavbar = document.getElementById('navbar');
            const mainNavRow = document.getElementById('main-nav-row');
            if (!mobileNavbar) return;

            let menuOffset = Math.round(navbarHeader.getBoundingClientRect().height);
            if (mainNavRow) {
                menuOffset = Math.max(0, Math.ceil(mainNavRow.getBoundingClientRect().bottom) - 1);
            }

            mobileNavbar.style.setProperty('--mobile-menu-offset', `${menuOffset}px`);
        }

        function handleMobileTopBarVisibility() {
            const isMobileViewport = window.innerWidth < 1024;
            const currentScrollY = window.scrollY;

            if (navbarHeader.classList.contains('mobile-menu-open')) {
                lastScrollY = currentScrollY;
                updateMobileMenuOffset();
                return;
            }

            if (!isMobileViewport) {
                navbarHeader.classList.remove('mobile-topbar-hidden');
                lastScrollY = currentScrollY;
                updateMobileMenuOffset();
                return;
            }

            if (currentScrollY <= 10) {
                navbarHeader.classList.remove('mobile-topbar-hidden');
                lastScrollY = currentScrollY;
                updateMobileMenuOffset();
                return;
            }

            if (currentScrollY > lastScrollY && currentScrollY > 40) {
                navbarHeader.classList.add('mobile-topbar-hidden');
            } else if (currentScrollY < lastScrollY) {
                navbarHeader.classList.remove('mobile-topbar-hidden');
            }

            lastScrollY = currentScrollY;
            updateMobileMenuOffset();
        }

        window.addEventListener('scroll', handleMobileTopBarVisibility, { passive: true });
        window.addEventListener('resize', handleMobileTopBarVisibility);
        handleMobileTopBarVisibility();
        updateMobileMenuOffset();

        // Hamburger menu
        const hamburger = document.getElementById('hamburger');
        const navbar = document.getElementById('navbar');
        const navbarBackdrop = document.getElementById('navbar-backdrop');
        const navbarPanel = document.getElementById('navbar-panel');
        const navLinks = navbar.querySelectorAll('a');

        function lockBodyScroll() {
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
        }

        function unlockBodyScroll() {
            document.documentElement.style.overflow = '';
            document.body.style.overflow = '';
        }

        function openMenu() {
            navbar.classList.remove('hidden');
            hamburger.classList.add('open');
            navbarHeader.classList.add('mobile-menu-open');
            updateMobileMenuOffset();
            lockBodyScroll();

            requestAnimationFrame(() => {
                updateMobileMenuOffset();
                navbarBackdrop.classList.remove('opacity-0');
                navbarBackdrop.classList.add('opacity-100');
                navbarPanel.classList.remove('translate-x-full');
            });
        }

        function closeMenu() {
            navbarBackdrop.classList.remove('opacity-100');
            navbarBackdrop.classList.add('opacity-0');
            navbarPanel.classList.add('translate-x-full');

            window.setTimeout(() => {
                navbar.classList.add('hidden');
            }, 300);

            hamburger.classList.remove('open');
            navbarHeader.classList.remove('mobile-menu-open');
            unlockBodyScroll();
        }

        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            navbar.classList.contains('hidden') ? openMenu() : closeMenu();
        });

        // Close menu when clicking on a link
        navLinks.forEach(link => {
            link.addEventListener('click', () => closeMenu());
        });

        if (navbarBackdrop) {
            navbarBackdrop.addEventListener('click', closeMenu);
        }

        // Close menu when clicking outside
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !navbar.classList.contains('hidden')) closeMenu();
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
                    if (entry.target.hasAttribute('data-stagger')) {
                        const children = entry.target.querySelectorAll(':scope > *');
                        children.forEach((child, index) => {
                            child.style.setProperty('--stagger-order', index);
                        });
                        entry.target.classList.add('in-view');
                    } else {
                        entry.target.classList.add('in-view', 'animate-fadeInUp');
                    }

                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Auto-apply reveal animation to pages that don't explicitly define data-animate/data-stagger
        const mainContent = document.querySelector('main');
        if (mainContent) {
            mainContent.querySelectorAll(':scope > *').forEach((el) => {
                if (!el.hasAttribute('data-animate') && !el.hasAttribute('data-stagger')) {
                    el.setAttribute('data-animate', '');
                }
            });

            // Auto stagger for grid-based content blocks (cards/lists) across public pages
            mainContent.querySelectorAll('.grid').forEach((grid) => {
                if (grid.hasAttribute('data-animate') || grid.hasAttribute('data-stagger')) {
                    return;
                }

                if (grid.children.length >= 2) {
                    grid.setAttribute('data-stagger', '');
                }
            });
        }

        document.querySelectorAll('[data-animate], [data-stagger]').forEach(el => {
            // Prevent initial load animation; only animate when element enters viewport
            el.classList.remove('animate-fadeInUp');
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
