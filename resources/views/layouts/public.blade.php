<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SD Negeri 3 Krasak Bangsri - Berkarakter, Berprestasi, Berakhlak Mulia')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #1e40af;
            --secondary-blue: #3b82f6;
            --light-blue: #dbeafe;
            --dark-blue: #1e3a8a;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --white: #ffffff;
            --gray-bg: #f9fafb;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Header & Navigation */
        .top-header {
            background: var(--primary-blue);
            color: var(--white);
            padding: 10px 0;
            font-size: 14px;
        }

        .top-header .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-info {
            display: flex;
            gap: 20px;
        }

        .contact-info span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .social-links {
            display: flex;
            gap: 20px;
        }

        .social-links a {
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .social-links a:hover {
            transform: scale(1.2) translateY(-3px);
            background: rgba(255, 255, 255, 0.3);
        }

        .social-links a:hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            animation: pulse 0.6s;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }

        .social-links a.instagram:hover {
            background: var(--secondary-blue);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .social-links a.youtube:hover {
            background: var(--secondary-blue);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .social-links a.tiktok:hover {
            background: var(--secondary-blue);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }

        .main-header {
            background: var(--white);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .school-identity {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .school-logo {
            width: 70px;
            height: 70px;
            background: var(--secondary-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: var(--white);
            font-weight: bold;
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            flex-direction: column;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            gap: 6px;
        }

        .hamburger span {
            width: 30px;
            height: 3px;
            background: var(--primary-blue);
            border-radius: 2px;
            transition: all 0.3s;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(10px, 10px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(8px, -8px);
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        nav a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s;
            padding: 5px 0;
            position: relative;
        }

        nav a:hover,
        nav a.active {
            color: var(--secondary-blue);
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--secondary-blue);
            transition: width 0.3s;
        }

        nav a:hover::after,
        nav a.active::after {
            width: 100%;
        }

        /* Sections */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        section {
            padding: 80px 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 36px;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }

        .section-title p {
            font-size: 18px;
            color: var(--text-light);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(30, 64, 175, 0.6), rgba(30, 64, 175, 0.6)), url('{{ asset('images/test.jpeg') }}') center/cover no-repeat;
            color: var(--white);
            padding: 100px 20px;
            text-align: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero h2 {
            font-size: 48px;
            margin-bottom: 20px;
            animation: fadeInUp 1s;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            opacity: 0.95;
            animation: fadeInUp 1s 0.2s backwards;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            animation: fadeInUp 1s 0.4s backwards;
        }

        .btn {
            padding: 15px 35px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: var(--white);
            color: var(--primary-blue);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            background: transparent;
            color: var(--white);
            border: 2px solid var(--white);
        }

        .btn-secondary:hover {
            background: var(--white);
            color: var(--primary-blue);
        }

        /* Principal's Greeting Section */
        .principal-greeting {
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--white) 100%);
        }

        .greeting-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .principal-image {
            width: 100%;
            height: 400px;
            background: var(--secondary-blue);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 120px;
            color: var(--white);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .greeting-text {
            padding: 30px;
        }

        .greeting-text h3 {
            font-size: 28px;
            color: var(--primary-blue);
            margin-bottom: 20px;
        }

        .greeting-text .title {
            color: var(--secondary-blue);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .greeting-text p {
            color: var(--text-light);
            line-height: 1.9;
            margin-bottom: 20px;
            font-size: 17px;
            text-align: justify;
        }

        .principal-signature {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid var(--light-blue);
        }

        .principal-name {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 18px;
            margin-bottom: 5px;
        }

        .principal-position {
            color: var(--text-light);
            font-size: 15px;
        }

        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-image {
            width: 100%;
            height: 400px;
            background: var(--light-blue);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 100px;
            color: var(--secondary-blue);
        }

        .about-text h3 {
            font-size: 28px;
            color: var(--primary-blue);
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 15px;
            color: var(--text-light);
            line-height: 1.8;
        }

        /* Stats Section */
        .stats {
            background: transparent;
            margin-top: -80px;
            position: relative;
            z-index: 10;
            padding: 80px 20px 80px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .stat-card {
            text-align: center;
            padding: 40px 20px;
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-10px);
        }

        .stat-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 42px;
            font-weight: bold;
            color: var(--primary-blue);
            margin-bottom: 10px;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 16px;
        }

        /* Programs Section */
        .programs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .program-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .program-card:hover {
            transform: translateY(-10px);
        }

        .program-icon {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: var(--white);
            padding: 40px;
            text-align: center;
            font-size: 60px;
        }

        .program-content {
            padding: 30px;
        }

        .program-content h3 {
            font-size: 22px;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }

        .program-content p {
            color: var(--text-light);
            line-height: 1.8;
        }

        /* News Section */
        .news {
            background: var(--gray-bg);
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .news-card {
            background: var(--white);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-image {
            width: 100%;
            height: 200px;
            background: var(--light-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            color: var(--secondary-blue);
        }

        .news-content {
            padding: 25px;
        }

        .news-date {
            color: var(--secondary-blue);
            font-size: 14px;
            margin-bottom: 10px;
        }

        .news-content h3 {
            font-size: 20px;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .news-content p {
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .read-more {
            color: var(--secondary-blue);
            text-decoration: none;
            font-weight: 600;
        }

        .read-more:hover {
            text-decoration: underline;
        }

        /* Gallery Section */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .gallery-item {
            aspect-ratio: 1;
            background: var(--light-blue);
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            color: var(--secondary-blue);
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        /* Contact Section */
        .contact {
            background: var(--gray-bg);
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .contact-info-box {
            background: var(--white);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .contact-info-box h3 {
            color: var(--primary-blue);
            margin-bottom: 25px;
            font-size: 24px;
        }

        .info-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            align-items: start;
        }

        .info-icon {
            font-size: 24px;
            color: var(--secondary-blue);
            margin-top: 5px;
        }

        .info-text h4 {
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .info-text p {
            color: var(--text-light);
        }

        .contact-form {
            background: var(--white);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .contact-form h3 {
            color: var(--primary-blue);
            margin-bottom: 25px;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--secondary-blue);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-submit {
            background: var(--primary-blue);
            color: var(--white);
            padding: 15px 40px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background: var(--dark-blue);
            color: var(--white);
            padding: 60px 20px 20px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
            align-items: flex-start;
        }

        .footer-about h3 {
            margin-bottom: 20px;
            font-size: 22px;
        }

        .footer-about p {
            line-height: 1.8;
            opacity: 0.9;
            margin-bottom: 15px;
        }

        .footer-section h4 {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section a {
            color: var(--white);
            text-decoration: none;
            opacity: 0.9;
            transition: opacity 0.3s;
        }

        .footer-section a:hover {
            opacity: 1;
            text-decoration: underline;
        }

        .footer-maps {
            max-width: 100%;
            margin: 0;
            padding: 0;
            background: transparent;
            aspect-ratio: 1 / 1;
            border-radius: 12px;
            overflow: hidden;
        }

        .footer-maps iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding: 30px 20px;
            background: var(--dark-blue);
            opacity: 0.8;
        }

        /* Animations */
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

        /* Responsive Design */
        @media (max-width: 968px) {
            .hamburger {
                display: flex;
            }

            .header-content {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--white);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            }

            nav.active {
                max-height: 450px;
            }

            nav ul {
                flex-direction: column;
                gap: 0;
                padding: 20px;
                list-style: none;
            }

            nav ul li {
                border-bottom: 1px solid #e5e7eb;
            }

            nav ul li:last-child {
                border-bottom: none;
            }

            nav a {
                display: block;
                padding: 15px 0;
                color: var(--text-dark);
            }

            nav a::after {
                display: none;
            }

            .hero h2 {
                font-size: 36px;
            }

            .about-content,
            .contact-content,
            .greeting-content {
                grid-template-columns: 1fr;
            }

            .stats-grid,
            .programs-grid,
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .footer-maps iframe {
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .top-header .container {
                flex-direction: column;
                gap: 10px;
            }

            .contact-info {
                flex-direction: column;
                gap: 5px;
            }

            .hero h2 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .stats-grid,
            .programs-grid,
            .news-grid,
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Top Header -->
    <div class="top-header">
        <div class="container">
            <div class="contact-info">
                <span>📧 sdn3krasak@email.com</span>
                <span>📞 (0295) 123-4567</span>
            </div>
            <div class="social-links">
                <a href="https://www.instagram.com/sdn3krasakbangsri?igsh=MTM0bzhrM2dxbHBnYQ==" target="_blank" class="instagram" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://youtube.com/@sdnegeri3krasakbangsri786?si=7C0VrY-oPj4Wb8wr" target="_blank" class="youtube" title="YouTube"><i class="bi bi-youtube"></i></a>
                <a href="https://www.tiktok.com/@sdn3krasakbangsri?is_from_webapp=1&sender_device=pc" target="_blank" class="tiktok" title="TikTok"><i class="bi bi-tiktok"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <div class="header-content">
            <div class="school-identity">
                <div class="school-logo">SD</div>
            </div>
            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav id="navbar">
                <ul>
                    <li><a href="/" class="@if(request()->is('/')) active @endif">Beranda</a></li>
                    <li><a href="/tentang" class="@if(request()->is('tentang')) active @endif">Tentang</a></li>
                    <li><a href="/program" class="@if(request()->is('program')) active @endif">Program</a></li>
                    <li><a href="/berita" class="@if(request()->is('berita')) active @endif">Berita</a></li>
                    <li><a href="/galeri" class="@if(request()->is('galeri')) active @endif">Galeri</a></li>
                    <li><a href="/kontak" class="@if(request()->is('kontak')) active @endif">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-about">
                <h3>SD Negeri 3 Krasak</h3>
                <p>Sekolah Dasar Negeri 3 Krasak Bangsri berkomitmen untuk memberikan pendidikan berkualitas yang mengembangkan potensi akademik, karakter, dan spiritual siswa.</p>
                <p>Berkarakter, Berprestasi, Berakhlak Mulia</p>
            </div>
            <div class="footer-section">
                <h4>Menu Cepat</h4>
                <ul>
                    <li><a href="/">Beranda</a></li>
                    <li><a href="/tentang">Tentang Kami</a></li>
                    <li><a href="/program">Program</a></li>
                    <li><a href="/berita">Berita</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Informasi</h4>
                <ul>
                    <li><a href="#">Profil Sekolah</a></li>
                    <li><a href="#">Visi & Misi</a></li>
                    <li><a href="#">Tenaga Pendidik</a></li>
                    <li><a href="#">Fasilitas</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="#">PPDB</a></li>
                    <li><a href="#">Perpustakaan</a></li>
                    <li><a href="#">Download</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d966.4909233539345!2d110.75661872444648!3d-6.528301821181524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e71189725f32787%3A0x9d13f4409aad6ce8!2sSD%20Negeri%201%2C%202%20dan%203%20Krasak%20Bangsri!5e0!3m2!1sen!2sid!4v1770783795120" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 SD Negeri 3 Krasak Bangsri. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navbar = document.getElementById('navbar');
        const navLinks = navbar.querySelectorAll('a');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navbar.classList.toggle('active');
        });

        // Close menu when clicking on a link
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navbar.classList.remove('active');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.header-content')) {
                hamburger.classList.remove('active');
                navbar.classList.remove('active');
            }
        });
    </script>
</body>
</html>
