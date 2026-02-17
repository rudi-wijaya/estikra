@extends('layouts.public')

@section('title', 'Tentang Kami - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- About Section -->
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 border-2 border-gray-300 rounded-3xl p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Tentang SD Negeri 3 Krasak</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Mengenal lebih dekat sekolah kami dan komitmen kami terhadap pendidikan berkualitas</p>
            </div>

            <!-- Visi & Misi Content -->
            <div class="space-y-12 mb-16">
                <!-- Icon at Top -->
                <div class="flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-600 rounded-3xl transform rotate-6 opacity-10"></div>
                        <div class="relative bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl w-80 h-80 flex items-center justify-center shadow-2xl">
                            
                        </div>
                    </div>
                </div>

                <!-- Visi & Misi Text Below -->
                <div>
                    <!-- Visi -->
                    <div class="mb-10">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <i class="text-blue-600 text-2xl"></i> Visi Kami
                        </h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Terwujudnya lulusan yang unggul dalam iman dan taqwa</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Terwujudnya lulusan yang kompeten dan berprestasi yang membanggakan</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Terwujudnya Kurikulum berwawasan karakter Profil Pelajar Pancasila dan lingkungan</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Terwujudnya PBM yang efektif, efisien, dan inovatif</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Terwujudnya warga sekolah yang berkarakter jujur, mandiri, gotong royong, percaya diri, bernalar kritis, kreatif, dan menghargai kebhinekaan</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Terwujudnya standar pengelolaan dan manajemen sekolah sesuai ketentuan</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Merwujudnya budaya sekolah sahabat keluarga dan lingkungan yang nyaman, aman, rindang, asri dan bersih dalam penyelengaraan pendidikan yang berkualitas</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Misi -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <i class="text-blue-600 text-2xl"></i> Misi Kami
                        </h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Menumbuh kembangkkan pengamalam ajaran agama sesuai dengan agama dan kepercayaan masing-masing</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Menciptakan insan yang unggul dalam IPTEK dan mampu berdaya saing</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Melaksanakan pembelajaran yang aktiif, kreatif, inovatif yang menghasilkan peserta didik yang berkarya, bernalar kritis, dan mandiri</span>
                            </li>
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="text-gray-400 mt-1">•</span>
                                <span>Menumbuhkan warga sekolah yang berkarakter jujur, disiplin, percaya diri, sopan santun, menghargai kebhinekaya dalam bertindak</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Principal's Greeting Section -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 border-2 border-gray-300 rounded-3xl p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                <span class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold mb-4">💬 Sambutan Kepala Sekolah</span>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Pesan dari Pimpinan Sekolah</h2>
            </div>

            <!-- Greeting Content -->
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
@endsection
