@extends('layouts.public')

@section('title', 'Program - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- Programs Section -->
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Program Unggulan Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Program-program terbaik dirancang untuk mengembangkan potensi akademik dan karakter siswa</p>
            </div>

            <!-- Programs Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Program 1 -->
                <div class="card-hover group bg-white rounded-2xl p-8 border-2 border-gray-100 hover:border-blue-300 transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-book text-blue-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Literasi</h3>
                    <p class="text-gray-600 leading-relaxed">Program pembiasaan membaca dan menulis setiap hari untuk meningkatkan kemampuan literasi siswa sejak dini secara menyenangkan.</p>
                </div>

                <!-- Program 2 -->
                <div class="card-hover group bg-white rounded-2xl p-8 border-2 border-gray-100 hover:border-indigo-300 transition-all duration-300">
                    <div class="w-16 h-16 bg-indigo-100 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-moon-stars text-indigo-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Sholat Dhuha</h3>
                    <p class="text-gray-600 leading-relaxed">Pembiasaan sholat dhuha berjamaah setiap pagi sebagai bentuk penguatan karakter spiritual dan kedisiplinan siswa dalam kehidupan sehari-hari.</p>
                </div>

                <!-- Program 3 -->
                <div class="card-hover group bg-white rounded-2xl p-8 border-2 border-gray-100 hover:border-purple-300 transition-all duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-bullseye text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Pentaque</h3>
                    <p class="text-gray-600 leading-relaxed">Olahraga pentaque sebagai program unggulan untuk melatih konsentrasi, strategi, dan sportivitas siswa dalam kompetisi tingkat daerah maupun nasional.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
