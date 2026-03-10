@extends('layouts.public')

@section('title', 'Beranda - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- Hero Section -->
    @php
        $heroSlides = collect([
            \App\Models\Setting::get('hero_background',   'images/homepage.jpg'),
            \App\Models\Setting::get('hero_background_2'),
            \App\Models\Setting::get('hero_background_3'),
        ])->filter()->values();
    @endphp

    <section id="hero-section" class="relative flex flex-col justify-between -mt-32" style="min-height: calc(820px + 8rem);">

        {{-- Slideshow layers --}}
        <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
            @foreach ($heroSlides as $i => $slide)
                <div class="hero-slide absolute inset-0 transition-opacity duration-1000 {{ $i === 0 ? 'opacity-100' : 'opacity-0' }}"
                     style="background-image: url('{{ asset($slide) }}'); background-size: cover; background-position: center top;"></div>
            @endforeach
        </div>

        <div class="absolute inset-0 bg-black/40"></div>
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 right-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-10 left-10 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
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
                {{ \App\Models\Setting::get('hero_judul', 'SD Negeri 3 Krasak Bangsri') }}
            </h1>

            <!-- Subheading -->
            <p class="text-white/90 text-lg mb-8 max-w-xl animate-fadeInUp" style="animation-delay: 0.2s; text-shadow: 0 1px 6px rgba(0,0,0,0.4);">
                {{ \App\Models\Setting::get('hero_subjudul', 'Membentuk Generasi Berkarakter, Berprestasi, dan Berakhlak Mulia') }}
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap items-center gap-4 animate-fadeInUp" style="animation-delay: 0.3s;">
                <a href="#tentang-sekolah"
                   class="card-hover group inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-7 py-3.5 rounded-xl shadow-lg hover:shadow-blue-300 transition-all duration-200">
                    <span>Pelajari Lebih Lanjut</span>
                </a>
                <a href="/ppdb"
                   class="card-hover group inline-flex items-center gap-2 border-2 border-white text-white hover:bg-white/20 font-semibold px-7 py-3 rounded-xl transition-all duration-200 backdrop-blur-sm">
                    <i class=""></i>
                    <span>PPDB 2026</span>
                </a>
            </div>
        </div>

        <!-- Stats Cards (langsung menempel di bawah hero, tanpa gap) -->
        <div class="relative z-10 py-8">
            <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                    <div class="backdrop-blur-md rounded-2xl p-6 border border-white/30 text-center animate-fadeInUp transition-all duration-300 hover:bg-white/40 hover:scale-105 hover:shadow-lg cursor-default" style="background: rgba(255,255,255,0.20); animation-delay: 0.4s;">
                        <span class="font-black text-4xl lg:text-5xl leading-none drop-shadow" style="color: #c5deff">150<span>+</span></span>
                        <p class="text-blue-100 text-sm mt-2 font-medium drop-shadow">Siswa Aktif</p>
                    </div>

                    <div class="backdrop-blur-md rounded-2xl p-6 border border-white/30 text-center animate-fadeInUp transition-all duration-300 hover:bg-white/40 hover:scale-105 hover:shadow-lg cursor-default" style="background: rgba(255,255,255,0.20); animation-delay: 0.5s;">
                        <span class="font-black text-4xl lg:text-5xl leading-none drop-shadow" style="color: #c5deff">10<span>+</span></span>
                        <p class="text-blue-100 text-sm mt-2 font-medium drop-shadow">Guru &amp; Staff</p>
                    </div>

                    <div class="backdrop-blur-md rounded-2xl p-6 border border-white/30 text-center animate-fadeInUp transition-all duration-300 hover:bg-white/40 hover:scale-105 hover:shadow-lg cursor-default" style="background: rgba(255,255,255,0.20); animation-delay: 0.6s;">
                        <span class="font-black text-4xl lg:text-5xl leading-none drop-shadow" style="color: #c5deff">6</span>
                        <p class="text-blue-100 text-sm mt-2 font-medium drop-shadow">Kelas</p>
                    </div>

                    <div class="backdrop-blur-md rounded-2xl p-6 border border-white/30 text-center animate-fadeInUp transition-all duration-300 hover:bg-white/40 hover:scale-105 hover:shadow-lg cursor-default" style="background: rgba(255,255,255,0.20); animation-delay: 0.7s;">
                        <span class="font-black text-4xl lg:text-5xl leading-none drop-shadow" style="color: #c5deff">50<span>+</span></span>
                        <p class="text-blue-100 text-sm mt-2 font-medium drop-shadow">Prestasi</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @if ($heroSlides->count() > 1)
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
    @endif



    <!-- Tentang Sekolah Section -->
    <section id="tentang-sekolah" class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 animate-fadeInUp" data-animate>
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
                    
                    <div class="space-y-4 text-gray-600">
                        <!-- Visi Card -->
                        <div class="bg-white rounded-2xl border border-blue-100 shadow-sm overflow-hidden">
                            <!-- Header + Toggle -->
                            <button onclick="toggleCollapse('visiExtra','visiIcon')" class="w-full flex items-center justify-between p-6 text-left hover:bg-blue-50 transition-colors duration-200">
                                <h4 class="text-lg font-bold text-gray-900">Visi Kami</h4>
                                <span id="visiIcon" class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0 transition-transform duration-300">
                                    <i class="bi bi-chevron-down text-sm"></i>
                                </span>
                            </button>

                            <!-- Visi List -->
                            <div class="px-6 pb-6 space-y-2.5">
                                <!-- Items 1-3: selalu tampil -->
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                    <span class="text-gray-700 text-sm">Terwujudnya lulusan yang unggul dalam iman dan taqwa.</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                    <span class="text-gray-700 text-sm">Terwujudnya lulusan yang kompeten dan berprestasi yang membanggakan.</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                    <span class="text-gray-700 text-sm">Terwujudnya Kurikulum berwawasan karakter Profil Pelajar Pancasila dan lingkungan.</span>
                                </div>

                                <!-- Items 4-7: expand/collapse -->
                                <div id="visiExtra" class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                                    <div class="space-y-2.5 pt-2.5">
                                        <div class="flex items-start gap-3">
                                            <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                            <span class="text-gray-700 text-sm">Terwujudnya PBM yang efektif, efisien, dan inovatif.</span>
                                        </div>
                                        <div class="flex items-start gap-3">
                                            <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                            <span class="text-gray-700 text-sm">Terwujudnya warga sekolah yang berkarakter jujur, mandiri, gotong royong, percaya diri, bernalar kritis, kreatif, dan menghargai kebhinekaan.</span>
                                        </div>
                                        <div class="flex items-start gap-3">
                                            <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                            <span class="text-gray-700 text-sm">Terwujudnya standar pengelolaan dan manajemen sekolah sesuai ketentuan.</span>
                                        </div>
                                        <div class="flex items-start gap-3">
                                            <span class="w-2 h-2 bg-blue-400 rounded-full mt-1.5 shrink-0"></span>
                                            <span class="text-gray-700 text-sm">Terwujudnya budaya sekolah sahabat keluarga dan lingkungan yang nyaman, aman, rindang, asri dan bersih dalam penyelenggaraan pendidikan yang berkualitas.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Misi Card -->
                        <div class="bg-white rounded-2xl border border-indigo-100 shadow-sm overflow-hidden">
                            <!-- Header + Toggle -->
                            <button onclick="toggleCollapse('misiExtra','misiIcon')" class="w-full flex items-center justify-between p-6 text-left hover:bg-indigo-50 transition-colors duration-200">
                                <h4 class="text-lg font-bold text-gray-900">Misi Kami</h4>
                                <span id="misiIcon" class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 flex-shrink-0 transition-transform duration-300">
                                    <i class="bi bi-chevron-down text-sm"></i>
                                </span>
                            </button>

                            <!-- Misi List -->
                            <div class="px-6 pb-6 space-y-2.5">
                                <!-- Items 1-3: selalu tampil -->
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 bg-indigo-400 rounded-full mt-1.5 shrink-0"></span>
                                    <span class="text-gray-700 text-sm">Menumbuh kembangkan pengamalan ajaran agama sesuai dengan agama dan kepercayaan masing-masing.</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 bg-indigo-400 rounded-full mt-1.5 shrink-0"></span>
                                    <span class="text-gray-700 text-sm">Menciptakan insan yang unggul dalam IPTEK dan mampu berdaya saing.</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <span class="w-2 h-2 bg-indigo-400 rounded-full mt-1.5 shrink-0"></span>
                                    <span class="text-gray-700 text-sm">Melaksanakan pembelajaran yang aktif, kreatif, inovatif yang menghasilkan peserta didik yang berkarya, bernalar kritis, dan mandiri.</span>
                                </div>

                                <!-- Item 4: expand/collapse -->
                                <div id="misiExtra" class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                                    <div class="space-y-2.5 pt-2.5">
                                        <div class="flex items-start gap-3">
                                            <span class="w-2 h-2 bg-indigo-400 rounded-full mt-1.5 shrink-0"></span>
                                            <span class="text-gray-700 text-sm">Menumbuhkan warga sekolah yang berkarakter jujur, disiplin, percaya diri, sopan santun, menghargai kebhinekaan dalam bertindak.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 animate-fadeInUp" data-animate>
            <div class="text-center mb-8">
            
                <h2 class="section-title">Sambutan dari Pimpinan Sekolah</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Photo -->
                <div class="flex justify-center lg:justify-start">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-600 rounded-3xl transform rotate-6 opacity-10"></div>
                        @php $sambutanFoto = \App\Models\Setting::get('sambutan_foto'); @endphp
                        @if($sambutanFoto)
                            <img src="{{ asset($sambutanFoto) }}" alt="Kepala Sekolah" class="relative rounded-3xl w-80 h-80 object-cover shadow-2xl">
                        @else
                            <div class="relative bg-gradient-to-br from-green-500 to-blue-600 rounded-3xl w-80 h-80 flex items-center justify-center shadow-2xl">
                                <span class="text-9xl">👨‍💼</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right Text -->
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-4">Assalamu'alaikum Warahmatullahi Wabarakatuh</h3>
                    <div class="mb-6">
                        <p class="text-lg font-semibold text-blue-600">Ibu Sutanti, S.Pd</p>
                        <p class="text-gray-500">Kepala Sekolah</p>
                    </div>

                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>Dengan penuh kerendahan hati, kami menyambut kehadiran Anda di SD Negeri 3 Krasak. Sekolah kami berkomitmen untuk menjadi institusi pendidikan yang tidak hanya mengembangkan potensi akademik siswa, tetapi juga membentuk karakter yang kuat dan berakhlak mulia sesuai dengan nilai-nilai Pancasila dan ajaran agama.</p>
                        
                        <p>Kami percaya bahwa pendidikan yang berkualitas adalah hasil dari kerjasama sinergis antara guru, siswa, orang tua, dan masyarakat. Oleh karena itu, kami mengundang seluruh pihak untuk bersama-sama mendukung proses pembelajaran yang menyenangkan, bermakna, dan mempersiapkan siswa menjadi generasi penerus bangsa yang kompeten dan berintegritas.</p>
                        
                        <p>Terima kasih atas kepercayaan dan dukungan Anda. Semoga SD Negeri 3 Krasak terus berkembang dan menjadi sekolah pilihan yang menghasilkan lulusan berkarakter, berprestasi, dan berakhlak mulia.</p>
                    </div>

                    <div class="mt-8 pt-6 border-t-2 border-gray-200">
                        <p class="font-bold text-gray-900">Ibu Sutanti, S.Pd</p>
                        <p class="text-sm text-gray-600">Kepala Sekolah SD Negeri 3 Krasak Bangsri</p>
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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="card-hover bg-white rounded-xl p-6 border border-gray-100 text-center hover:shadow-xl">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-book text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Literasi</h3>
                    <p class="text-sm text-gray-600">Pembiasaan membaca dan menulis setiap hari untuk meningkatkan kemampuan literasi siswa sejak dini.</p>
                </div>

                <div class="card-hover bg-white rounded-xl p-6 border border-gray-100 text-center hover:shadow-xl">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-moon-stars text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Sholat Dhuha</h3>
                    <p class="text-sm text-gray-600">Pembiasaan sholat dhuha berjamaah setiap pagi untuk penguatan karakter spiritual dan kedisiplinan siswa.</p>
                </div>

                <div class="card-hover bg-white rounded-xl p-6 border border-gray-100 text-center hover:shadow-xl">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-bullseye text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Pentaque</h3>
                    <p class="text-sm text-gray-600">Olahraga pentaque untuk melatih konsentrasi, strategi, dan sportivitas siswa dalam kompetisi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Guru & Staff Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <div class="text-center mb-8">
                <h2 class="section-title">Guru & Staff Kami</h2>
                <p class="section-subtitle text-gray-600">Tim profesional yang berdedikasi dalam mendidik dan membimbing generasi masa depan</p>
            </div>

            @if ($guruStaffs->isEmpty())
                <div class="text-center text-gray-400 py-8">
                    <i class="bi bi-people text-5xl"></i>
                    <p class="mt-2">Belum ada data guru &amp; staff.</p>
                </div>
            @else
            @php
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
            @endphp
            <style>
                @media (max-width: 639px) {
                    #gs-track { width: {{ $gsTrackWMob }}% !important; }
                }
                @media (min-width: 640px) and (max-width: 1023px) {
                    #gs-track { width: {{ $gsTrackWTab }}% !important; }
                }
            </style>

            <div class="relative px-6">
                {{-- Overflow container --}}
                <div style="overflow:hidden; width:100%;">
                    {{-- Track: wider than container to hold all cards --}}
                    <div id="gs-track"
                         style="display:flex; width:{{ $gsTrackW }}%; transition:transform 0.6s cubic-bezier(0.4,0,0.2,1);">
                        @foreach ($gsItems as $gs)
                        <div style="width:{{ $gsCardW }}%; flex-shrink:0; padding:0 12px;">
                            <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-blue-200" style="display:flex; flex-direction:column; height:100%;">
                                @if ($gs->foto)
                                    <img src="{{ asset('storage/' . $gs->foto) }}" alt="{{ $gs->nama }}" class="w-full h-64 object-cover" style="flex-shrink:0;">
                                @else
                                    <div class="w-full h-64 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center" style="flex-shrink:0;">
                                        <i class="bi bi-person-fill text-white text-6xl opacity-40"></i>
                                    </div>
                                @endif
                                <div style="padding:16px 20px 20px; flex:1; display:flex; flex-direction:column; justify-content:flex-start;">
                                    <h3 style="font-size:15px; font-weight:700; color:#1f2937; line-height:1.45; word-break:break-word; overflow-wrap:break-word; min-height:2.9em; margin:0 0 5px 0; display:flex; align-items:flex-start;">{{ $gs->nama }}</h3>
                                    <p style="font-size:13px; color:#5a74e8; font-weight:600; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; margin:0 0 10px 0;">{{ $gs->jabatan }}</p>
                                    @if ($gs->deskripsi)
                                        <p class="text-gray-600 text-sm">{{ $gs->deskripsi }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if ($gsTotal > 1)
                <button onclick="gsPrev()"
                    class="absolute left-0 top-32 z-10 w-10 h-10 rounded-full bg-white shadow-md border border-gray-100 flex items-center justify-center text-blue-600 hover:bg-blue-50 transition">
                    <i class="bi bi-chevron-left text-lg"></i>
                </button>
                <button onclick="gsNext()"
                    class="absolute right-0 top-32 z-10 w-10 h-10 rounded-full bg-white shadow-md border border-gray-100 flex items-center justify-center text-blue-600 hover:bg-blue-50 transition">
                    <i class="bi bi-chevron-right text-lg"></i>
                </button>
                @endif
            </div>
            @endif

            <div class="text-center mt-8">
                <a href="/guru-staff" class="btn-primary inline-block">
                    Lihat Semua Guru & Staff
                </a>
            </div>
        </div>
    </section>

    @if (isset($gsTotal) && $gsTotal > 1)
    <script>
        var gsCurrent = 0;
        var gsTotal   = {{ $gsTotal }};
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
    @endif

    <!-- Berita Terbaru Section -->
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <!-- Section Header -->
            <div class="text-center mb-8 animate-fadeInUp">
               
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Berita Terkini</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Informasi dan update terbaru seputar kegiatan sekolah kami</p>
            </div>

            <!-- Berita Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse ($beritas as $berita)
                    <div class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl flex flex-col">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative flex-shrink-0">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-1">
                            <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-3 self-start">
                                {{ $berita->tanggal_terbit->format('d M Y') }}
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $berita->judul }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4 flex-1">{{ Str::limit(strip_tags($berita->konten), 150) }}</p>
                            <a href="#" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300 self-start mt-auto">
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
    <section class="py-8 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <!-- Section Header -->
            <div class="text-center mb-8 animate-fadeInUp">
                
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
    <section class="py-8 bg-gradient-to-r from-blue-600 to-indigo-600">
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


@endsection
