<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Negeri 3 Krasak Bangsri - Berkarakter, Berprestasi, Berakhlak Mulia</title>
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
            padding: 20px;
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

        nav a:hover {
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

        nav a:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            padding: 100px 20px;
            text-align: center;
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
            background: var(--gray-bg);
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
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
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

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
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
                max-height: 300px;
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

            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
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
            <div>
                <span>🕐 Senin - Jumat: 07.00 - 14.00 WIB</span>
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
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#program">Program</a></li>
                    <li><a href="#berita">Berita</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="hero">
        <div class="hero-content">
            <h2>Selamat Datang di SD Negeri 3 Krasak</h2>
            <p>Membentuk Generasi Berkarakter, Berprestasi, dan Berakhlak Mulia</p>
            <div class="cta-buttons">
                <a href="#tentang" class="btn btn-primary">Tentang Kami</a>
                <a href="#kontak" class="btn btn-secondary">Hubungi Kami</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">👨‍🎓</div>
                    <div class="stat-number">350+</div>
                    <div class="stat-label">Siswa Aktif</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">👨‍🏫</div>
                    <div class="stat-number">25</div>
                    <div class="stat-label">Guru & Staff</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">🏆</div>
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Prestasi</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📚</div>
                    <div class="stat-number">12</div>
                    <div class="stat-label">Kelas</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Principal's Greeting Section -->
    <section class="principal-greeting">
        <div class="container">
            <div class="section-title">
                <h2>Sambutan Kepala Sekolah</h2>
                <p>Pesan dari pimpinan sekolah kami</p>
            </div>
            <div class="greeting-content">
                <div class="principal-image">👨‍💼</div>
                <div class="greeting-text">
                    <h3>Assalamu'alaikum Warahmatullahi Wabarakatuh</h3>
                    <p class="title">Bapak Drs. Sutrisno, M.Pd</p>
                    <p>Dengan penuh kerendahan hati, kami menyambut kehadiran Anda di SD Negeri 3 Krasak. Sekolah kami berkomitmen untuk menjadi institusi pendidikan yang tidak hanya mengembangkan potensi akademik siswa, tetapi juga membentuk karakter yang kuat dan berakhlak mulia sesuai dengan nilai-nilai Pancasila dan ajaran agama.</p>
                    
                    <p>Kami percaya bahwa pendidikan yang berkualitas adalah hasil dari kerjasama sinergis antara guru, siswa, orang tua, dan masyarakat. Oleh karena itu, kami mengundang seluruh pihak untuk bersama-sama mendukung proses pembelajaran yang menyenangkan, bermakna, dan mempersiapkan siswa menjadi generasi penerus bangsa yang kompeten dan berintegritas.</p>
                    
                    <p>Terima kasih atas kepercayaan dan dukungan Anda. Semoga SD Negeri 3 Krasak terus berkembang dan menjadi sekolah pilihan yang menghasilkan lulusan berkarakter, berprestasi, dan berakhlak mulia.</p>

                    <div class="principal-signature">
                        <div class="principal-name">Drs. Sutrisno, M.Pd</div>
                        <div class="principal-position">Kepala Sekolah</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="about">
        <div class="container">
            <div class="section-title">
                <h2>Tentang SD Negeri 3 Krasak</h2>
                <p>Mengenal lebih dekat sekolah kami</p>
            </div>
            <div class="about-content">
                <div class="about-image">🏫</div>
                <div class="about-text">
                    <h3>Visi Sekolah</h3>
                    <p>"Terwujudnya peserta didik yang beriman, bertaqwa, berakhlak mulia, cerdas, terampil, dan berwawasan lingkungan."</p>
                    
                    <h3 style="margin-top: 30px;">Misi Sekolah</h3>
                    <p>✓ Menyelenggarakan pendidikan yang berkualitas dan berkarakter</p>
                    <p>✓ Mengembangkan potensi akademik dan non-akademik siswa</p>
                    <p>✓ Menciptakan lingkungan belajar yang kondusif dan menyenangkan</p>
                    <p>✓ Membangun kerjasama dengan orang tua dan masyarakat</p>
                    <p>✓ Menanamkan nilai-nilai religius dan budaya lokal</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="program" class="programs">
        <div class="container">
            <div class="section-title">
                <h2>Program Unggulan</h2>
                <p>Program-program terbaik untuk pengembangan siswa</p>
            </div>
            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-icon">📖</div>
                    <div class="program-content">
                        <h3>Literasi Digital</h3>
                        <p>Program peningkatan kemampuan membaca, menulis, dan penggunaan teknologi digital untuk pembelajaran yang lebih efektif.</p>
                    </div>
                </div>
                <div class="program-card">
                    <div class="program-icon">🎨</div>
                    <div class="program-content">
                        <h3>Ekstrakurikuler</h3>
                        <p>Berbagai kegiatan ekstrakurikuler seperti pramuka, seni tari, musik, olahraga, dan komputer untuk mengembangkan bakat siswa.</p>
                    </div>
                </div>
                <div class="program-card">
                    <div class="program-icon">🕌</div>
                    <div class="program-content">
                        <h3>Pendidikan Karakter</h3>
                        <p>Pembiasaan nilai-nilai religius, kejujuran, kedisiplinan, dan tanggung jawab melalui kegiatan rutin harian.</p>
                    </div>
                </div>
                <div class="program-card">
                    <div class="program-icon">🔬</div>
                    <div class="program-content">
                        <h3>STEM Learning</h3>
                        <p>Pembelajaran berbasis Science, Technology, Engineering, dan Mathematics untuk meningkatkan kemampuan berpikir kritis.</p>
                    </div>
                </div>
                <div class="program-card">
                    <div class="program-icon">🌱</div>
                    <div class="program-content">
                        <h3>Adiwiyata</h3>
                        <p>Program sekolah peduli lingkungan dengan kegiatan penghijauan, pengelolaan sampah, dan edukasi lingkungan hidup.</p>
                    </div>
                </div>
                <div class="program-card">
                    <div class="program-icon">🏅</div>
                    <div class="program-content">
                        <h3>Olimpiade & Kompetisi</h3>
                        <p>Pembinaan khusus untuk siswa berprestasi dalam berbagai kompetisi akademik dan non-akademik tingkat kabupaten hingga nasional.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="berita" class="news">
        <div class="container">
            <div class="section-title">
                <h2>Berita & Kegiatan</h2>
                <p>Informasi terkini seputar kegiatan sekolah</p>
            </div>
            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image">📰</div>
                    <div class="news-content">
                        <div class="news-date">5 Februari 2026</div>
                        <h3>Penerimaan Peserta Didik Baru 2026/2027</h3>
                        <p>Pendaftaran siswa baru tahun ajaran 2026/2027 dibuka mulai tanggal 1 Maret 2026. Info lengkap kunjungi sekolah.</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image">🏆</div>
                    <div class="news-content">
                        <div class="news-date">28 Januari 2026</div>
                        <h3>Juara 1 Olimpiade Matematika Tingkat Kabupaten</h3>
                        <p>Selamat kepada Ananda Rizki Ramadan meraih juara 1 Olimpiade Matematika SD tingkat Kabupaten Jepara.</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image">🎭</div>
                    <div class="news-content">
                        <div class="news-date">15 Januari 2026</div>
                        <h3>Pentas Seni dan Budaya Semester Ganjil</h3>
                        <p>Kegiatan pentas seni menampilkan berbagai pertunjukan tari, musik, dan drama dari siswa-siswi SD N 3 Krasak.</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galeri" class="gallery">
        <div class="container">
            <div class="section-title">
                <h2>Galeri Foto</h2>
                <p>Dokumentasi kegiatan sekolah</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item">📸</div>
                <div class="gallery-item">🎓</div>
                <div class="gallery-item">⚽</div>
                <div class="gallery-item">🎨</div>
                <div class="gallery-item">🏃</div>
                <div class="gallery-item">🎪</div>
                <div class="gallery-item">📚</div>
                <div class="gallery-item">🌳</div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Hubungi Kami</h2>
                <p>Silakan hubungi kami untuk informasi lebih lanjut</p>
            </div>
            <div class="contact-content">
                <div class="contact-info-box">
                    <h3>Informasi Kontak</h3>
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-text">
                            <h4>Alamat</h4>
                            <p>Jl. Raya Krasak No. 45<br>Desa Krasak, Kec. Bangsri<br>Kabupaten Jepara, Jawa Tengah 59453</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div class="info-text">
                            <h4>Telepon</h4>
                            <p>(0295) 123-4567<br>0812-3456-7890 (WhatsApp)</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📧</div>
                        <div class="info-text">
                            <h4>Email</h4>
                            <p>sdn3krasak@email.com<br>info.sdn3krasak@gmail.com</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">🕐</div>
                        <div class="info-text">
                            <h4>Jam Operasional</h4>
                            <p>Senin - Jumat: 07.00 - 14.00 WIB<br>Sabtu: 07.00 - 11.00 WIB</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Kirim Pesan</h3>
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subjek">Subjek</label>
                            <input type="text" id="subjek" name="subjek" required>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea id="pesan" name="pesan" required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

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
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#program">Program</a></li>
                    <li><a href="#berita">Berita</a></li>
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