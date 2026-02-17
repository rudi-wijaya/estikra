@extends('layouts.public')

@section('title', 'Beranda - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[520px] flex flex-col justify-between overflow-hidden" style="background-image: url('{{ asset('images/test.jpeg') }}'); background-size: cover; background-position: center;" >
        <div class="absolute inset-0 bg-white/70"></div>
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 right-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-10 left-10 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6 py-16 w-full relative z-10">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white/80 backdrop-blur-sm border border-blue-100 text-blue-700 text-sm font-semibold px-4 py-1.5 rounded-full shadow-sm mb-6 animate-fadeInUp">
                <span></span>
                <span>Selamat Datang</span>
            </div>

            <!-- Heading -->
            <h1 class="text-5xl md:text-6xl font-black text-gray-900 leading-tight mb-4 animate-fadeInUp" style="animation-delay: 0.1s;">
                SD Negeri 3 <span class="text-blue-600">Krasak Bangsri</span>
            </h1>

            <!-- Subheading -->
            <p class="text-gray-700 text-lg mb-8 max-w-xl animate-fadeInUp" style="animation-delay: 0.2s;">
                Membentuk Generasi Berkarakter, Berprestasi, dan Berakhlak Mulia
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap items-center gap-4 animate-fadeInUp" style="animation-delay: 0.3s;">
                <a href="/tentang"
                   class="card-hover group inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg hover:shadow-blue-300 transition-all duration-200">
                    <span>→</span>
                    <span>Pelajari Lebih Lanjut</span>
                </a>
                <a href="/kontak"
                   class="card-hover group inline-flex items-center gap-2 border-2 border-blue-500 text-blue-600 hover:bg-blue-50 font-semibold px-7 py-3 rounded-xl transition-all duration-200 bg-white/60 backdrop-blur-sm">
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
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Terwujudnya lulusan yang unggul dalam iman dan taqwa</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Terwujudnya lulusan yang kompeten dan berprestasi yang membanggakan</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Terwujudnya Kurikulum berwawasan karakter Profil Pelajar Pancasila dan lingkungan</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Terwujudnya PBM yang efektif, efisien, dan inovatif</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Terwujudnya warga sekolah yang berkarakter jujur, mandiri, gotong royong, percaya diri, bernalar kritis, kreatif, dan menghargai kebhinekaan</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Terwujudnya standar pengelolaan dan manajemen sekolah sesuai ketentuan</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Merwujudnya budaya sekolah sahabat keluarga dan lingkungan yang nyaman, aman, rindang, asri dan bersih dalam penyelengaraan pendidikan yang berkualitas</span>
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
                                    <span>Menumbuh kembangkkan pengamalam ajaran agama sesuai dengan agama dan kepercayaan masing-masing</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Menciptakan insan yang unggul dalam IPTEK dan mampu berdaya saing</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Melaksanakan pembelajaran yang aktiif, kreatif, inovatif yang menghasilkan peserta didik yang berkarya, bernalar kritis, dan mandiri</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>Menumbuhkan warga sekolah yang berkarakter jujur, disiplin, percaya diri, sopan santun, menghargai kebhinekaya dalam bertindak</span>
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
            
                <h2 class="section-title">Pesan dari Pimpinan Sekolah</h2>
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
                <!-- Guru 1 -->
                <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-blue-200">
                    <div class="w-full h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <i class="bi bi-person-fill text-white text-6xl opacity-40"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Ibu Siti Nurhayati</h3>
                        <p class="text-blue-600 text-sm font-semibold mb-4">Guru Kelas 6</p>
                        <p class="text-gray-600 text-sm">Berpengalaman lebih dari 15 tahun dalam bidang pendidikan</p>
                    </div>
                </div>

                <!-- Guru 2 -->
                <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-blue-200">
                    <div class="w-full h-64 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                        <i class="bi bi-person-fill text-white text-6xl opacity-40"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Bapak Bambang Sutrisno</h3>
                        <p class="text-blue-600 text-sm font-semibold mb-4">Guru Matematika</p>
                        <p class="text-gray-600 text-sm">Spesialis pembelajaran matematika dengan metode interaktif</p>
                    </div>
                </div>

                <!-- Guru 3 -->
                <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-blue-200">
                    <div class="w-full h-64 bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                        <i class="bi bi-person-fill text-white text-6xl opacity-40"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Ibu Rina Sukarno</h3>
                        <p class="text-blue-600 text-sm font-semibold mb-4">Guru Bahasa Indonesia</p>
                        <p class="text-gray-600 text-sm">Pengajar berbakat dengan fokus pada literasi dan komunikasi</p>
                    </div>
                </div>
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
                @forelse ($beritas as $berita)
                    <div class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-3">
                                {{ $berita->tanggal_terbit->format('d M Y') }}
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $berita->judul }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">{{ Str::limit(strip_tags($berita->konten), 150) }}</p>
                            <a href="#" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <p class="text-2xl text-gray-600 font-semibold mb-2"> Belum ada berita</p>
                        <p class="text-gray-500">Berita terbaru akan ditampilkan di sini</p>
                    </div>
                @endforelse
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
                @forelse ($galeris as $galeri)
                    <div class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative">
                            @if ($galeri->gambar)
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $galeri->judul }}</h3>
                            @if ($galeri->deskripsi)
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-3">{{ Str::limit($galeri->deskripsi, 100) }}</p>
                            @endif
                            <div class="flex items-center text-gray-500 text-sm">
                                <i class="bi bi-calendar-event mr-2"></i>
                                {{ $galeri->tanggal_upload->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <p class="text-2xl text-gray-600 font-semibold mb-2">Belum ada foto</p>
                        <p class="text-gray-500">Foto galeri akan ditampilkan di sini</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center">
                <a href="/galeri" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    Lihat Semua Galeri
                </a>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section class="py-12 bg-white">
        <div class="max-w-5xl mx-auto px-6 sm:px-8 lg:px-10">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Kontak Kami</h2>
                <p class="text-gray-600 text-sm">Hubungi kami untuk informasi lebih lanjut atau pertanyaan apapun</p>
            </div>

            <!-- Contact Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Alamat -->
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="text-2xl mb-3"></div>
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Alamat</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Jl. Raya Krasak No. 45<br>
                        Desa Krasak, Kec. Bangsri<br>
                        Kabupaten Jepara, Jawa Tengah 59453
                    </p>
                </div>

                <!-- Telepon -->
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="text-2xl mb-3"></div>
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Telepon</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <strong class="text-gray-900">(0291) 771380</strong><br>
                        <span class="text-xs text-gray-500">Telepon Sekolah</span><br><br>
                        <strong class="text-gray-900">0812-3456-7890</strong><br>
                        <span class="text-xs text-gray-500">WhatsApp</span>
                    </p>
                </div>

                <!-- Email -->
                <div class="border border-gray-200 rounded-lg p-6 hover:border-blue-300 transition-colors">
                    <div class="text-2xl mb-3"></div>
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Email</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        <strong class="text-gray-900 break-words">sdn3krasakbangsri@gmail.com</strong><br>
                        <span class="text-xs text-gray-500">Email Utama</span><br><br>
                        
                    </p>
                </div>
            </div>

            <!-- Contact Form & Jam Operasional -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Form -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Kirim Pesan</h3>

                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded">
                            <ul class="space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-700 text-sm flex items-start gap-2">
                                        <i class="bi bi-exclamation-circle-fill text-xs mt-0.5 flex-shrink-0"></i>
                                        <span>{{ $error }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded text-green-700 text-sm flex items-start gap-2">
                            <i class="bi bi-check-circle-fill text-xs mt-0.5 flex-shrink-0"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="/kirim-pesan" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-900 mb-1">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required 
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-400 transition-colors text-sm" 
                                placeholder="Nama Anda">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-900 mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-400 transition-colors text-sm" 
                                placeholder="Email Anda">
                        </div>
                        <div>
                            <label for="subjek" class="block text-sm font-medium text-gray-900 mb-1">Subjek</label>
                            <input type="text" id="subjek" name="subjek" value="{{ old('subjek') }}" required 
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-400 transition-colors text-sm" 
                                placeholder="Subjek Pesan">
                        </div>
                        <div>
                            <label for="pesan" class="block text-sm font-medium text-gray-900 mb-1">Pesan</label>
                            <textarea id="pesan" name="pesan" required rows="4"
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-400 transition-colors resize-none text-sm" 
                                placeholder="Tulis pesan Anda">{{ old('pesan') }}</textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded hover:bg-blue-700 transition-colors text-sm">
                            <i class="bi bi-send mr-2"></i> Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- Jam Operasional -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Jam Operasional</h3>

                    <div class="space-y-4">
                        <!-- Senin-Kamis -->
                        <div class="pb-4 border-b border-gray-200">
                            <div class="flex items-center gap-2 mb-2">
                                
                                <h4 class="font-medium text-gray-900 text-sm">Senin - Kamis</h4>
                            </div>
                            <p class="text-gray-600 text-sm ml-6">07:00 - 14:00 WIB</p>
                        </div>

                        <!-- Jumat -->
                        <div class="pb-4 border-b border-gray-200">
                            <div class="flex items-center gap-2 mb-2">
                                
                                <h4 class="font-medium text-gray-900 text-sm">Jumat</h4>
                            </div>
                            <p class="text-gray-600 text-sm ml-6">07:00 - 11:00 WIB</p>
                        </div>

                        <!-- Sabtu -->
                        <div class="pb-4 border-b border-gray-200">
                            <div class="flex items-center gap-2 mb-2">
                                
                                <h4 class="font-medium text-gray-900 text-sm">Sabtu</h4>
                            </div>
                            <p class="text-gray-600 text-sm ml-6">07:00 - 12:30 WIB</p>
                        </div>

                        <!-- Minggu -->
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                
                                <h4 class="font-medium text-gray-900 text-sm">Minggu</h4>
                            </div>
                            <p class="text-gray-600 text-sm ml-6">Libur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection
