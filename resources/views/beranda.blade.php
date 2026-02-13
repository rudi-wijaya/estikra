@extends('layouts.public')

@section('title', 'SD Negeri 3 Krasak Bangsri - Berkarakter, Berprestasi, Berakhlak Mulia')

@section('content')
    <!-- Hero Section - BERANDA -->
    <section id="beranda" class="hero" style="background: linear-gradient(rgba(30, 64, 175, 0.6), rgba(30, 64, 175, 0.6)), url('{{ asset('images/test.jpeg') }}') center/cover no-repeat;">
        <div class="hero-content">
            <h2>Selamat Datang di SD Negeri 3 Krasak</h2>
            <p>Membentuk Generasi Berkarakter, Berprestasi, dan Berakhlak Mulia</p>
            <div class="cta-buttons">
                <a href="#tentang" class="btn btn-primary">Pelajari Selengkapnya</a>
                <a href="#kontak" class="btn btn-secondary">PPDB</a>
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

    <!-- About Section - TENTANG -->
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

    <!-- Programs Section - PROGRAM -->
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
            <div class="program-cta" style="text-align: center; margin-top: 40px;">
                <a href="{{ url('/program') }}" class="btn btn-primary">Pelajari Lebih Lanjut →</a>
            </div>
        </div>
    </section>

    <!-- News Section - BERITA -->
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
            <div class="news-cta" style="text-align: center; margin-top: 40px;">
                <a href="{{ url('/berita') }}" class="btn btn-primary">Lihat Semua Berita →</a>
            </div>
        </div>
    </section>

    <!-- Gallery Section - GALERI -->
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
            <div class="gallery-cta" style="text-align: center; margin-top: 40px;">
                <a href="{{ url('/galeri') }}" class="btn btn-primary">Lihat Galeri Lengkap →</a>
            </div>
        </div>
    </section>

    <!-- Contact Section - KONTAK -->
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
                    @if ($errors->any())
                        <div style="background-color: #fee; color: #c33; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div style="background-color: #efe; color: #3c3; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="/kirim-pesan" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="subjek">Subjek</label>
                            <input type="text" id="subjek" name="subjek" value="{{ old('subjek') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea id="pesan" name="pesan" required>{{ old('pesan') }}</textarea>
                        </div>
                        <button type="submit" class="btn-submit">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
