@extends('layouts.public')

@section('title', 'Tentang Kami - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- About Section -->
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Tentang SD Negeri 3 Krasak</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Mengenal lebih dekat sekolah kami dan komitmen kami terhadap pendidikan berkualitas</p>
            </div>

            <!-- Visi & Misi Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <!-- Visi Card -->
                <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Visi Kami</h3>
                    <ul class="space-y-3">
                        @foreach (array_filter(explode("\n", \App\Models\Setting::get('tentang_visi', ''))) as $poin)
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mt-2 shrink-0"></span>
                                <span>{{ trim($poin) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Misi Card -->
                <div class="bg-white rounded-2xl p-8 border border-indigo-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Misi Kami</h3>
                    <ul class="space-y-3">
                        @foreach (array_filter(explode("\n", \App\Models\Setting::get('tentang_misi', ''))) as $poin)
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="w-2 h-2 bg-indigo-400 rounded-full mt-2 shrink-0"></span>
                                <span>{{ trim($poin) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Alamat Lengkap Section -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12 animate-fadeInUp">
            <div class="text-center mb-10">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">Alamat Lengkap</h2>
                <p class="text-gray-600">Lokasi dan informasi kontak SD Negeri 3 Krasak</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-5">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="bi bi-geo-alt-fill text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Alamat</h4>
                            <p class="text-gray-600">{{ \App\Models\Setting::get('sekolah_alamat', 'Jl. Raya Krasak No. 45 Desa Krasak, Kec. Bangsri Kabupaten Jepara, Jawa Tengah 59453') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="bi bi-telephone-fill text-indigo-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Telepon</h4>
                            <p class="text-gray-600">{{ \App\Models\Setting::get('sekolah_telepon', '(0291) 771380') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center shrink-0">
                            <i class="bi bi-envelope-fill text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-1">Email</h4>
                            <p class="text-gray-600">{{ \App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com') }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center shrink-0 mt-1">
                        <i class="bi bi-map-fill text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Kode Pos</h4>
                        <p class="text-gray-600">{{ \App\Models\Setting::get('kode_pos', '-') }}</p>
                        <h4 class="font-bold text-gray-900 mt-4 mb-1">NPSN</h4>
                        <p class="text-gray-600">{{ \App\Models\Setting::get('npsn', '-') }}</p>
                        <h4 class="font-bold text-gray-900 mt-4 mb-1">Akreditasi</h4>
                        <p class="text-gray-600">{{ \App\Models\Setting::get('akreditasi', '-') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section class="py-12 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12 animate-fadeInUp">
            <div class="text-center mb-10">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">Fasilitas</h2>
                <p class="text-gray-600">Fasilitas lengkap untuk mendukung proses belajar mengajar</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php
                    $fasilitas = [
                        ['icon' => 'bi-building', 'color' => 'blue', 'nama' => 'Ruang Kelas'],
                        ['icon' => 'bi-pc-display', 'color' => 'indigo', 'nama' => 'Lab Komputer'],
                        ['icon' => 'bi-book-half', 'color' => 'purple', 'nama' => 'Perpustakaan'],
                        ['icon' => 'bi-cup-hot', 'color' => 'orange', 'nama' => 'Kantin'],
                        ['icon' => 'bi-activity', 'color' => 'green', 'nama' => 'Lapangan Olahraga'],
                        ['icon' => 'bi-heart-pulse', 'color' => 'red', 'nama' => 'UKS'],
                        ['icon' => 'bi-people-fill', 'color' => 'teal', 'nama' => 'Aula'],
                        ['icon' => 'bi-shield-check', 'color' => 'slate', 'nama' => 'Mushola'],
                    ];
                @endphp
                @foreach ($fasilitas as $f)
                    <div class="card-hover bg-white rounded-xl p-6 border border-gray-100 text-center hover:shadow-xl">
                        <div class="w-14 h-14 bg-{{ $f['color'] }}-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i class="bi {{ $f['icon'] }} text-{{ $f['color'] }}-600 text-2xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-800 text-sm">{{ $f['nama'] }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Prestasi Section -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12 animate-fadeInUp">
            <div class="text-center mb-10">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">Prestasi</h2>
                <p class="text-gray-600">Pencapaian membanggakan siswa dan sekolah kami</p>
            </div>
            <div class="space-y-4">
                @php
                    $prestasi = array_filter(explode("\n", \App\Models\Setting::get('prestasi', '')));
                @endphp
                @if (count($prestasi) > 0)
                    @foreach ($prestasi as $item)
                        <div class="flex items-start gap-4 bg-gradient-to-r from-yellow-50 to-white border border-yellow-100 rounded-xl p-5">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center shrink-0">
                                <i class="bi bi-trophy-fill text-yellow-500 text-lg"></i>
                            </div>
                            <p class="text-gray-700 mt-1">{{ trim($item) }}</p>
                        </div>
                    @endforeach
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @php
                            $defaultPrestasi = [
                                ['judul' => 'Juara 1 Pentaque', 'keterangan' => 'Tingkat Kabupaten Jepara', 'tahun' => '2025'],
                                ['judul' => 'Juara 2 Literasi', 'keterangan' => 'Lomba Bercerita Tingkat Kecamatan', 'tahun' => '2025'],
                                ['judul' => 'Sekolah Adiwiyata', 'keterangan' => 'Penghargaan Sekolah Peduli Lingkungan', 'tahun' => '2024'],
                            ];
                        @endphp
                        @foreach ($defaultPrestasi as $p)
                            <div class="card-hover bg-white rounded-xl p-6 border-2 border-yellow-100 hover:border-yellow-300 hover:shadow-xl transition-all duration-300">
                                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center mb-4">
                                    <i class="bi bi-trophy-fill text-yellow-500 text-xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1">{{ $p['judul'] }}</h4>
                                <p class="text-gray-600 text-sm mb-3">{{ $p['keterangan'] }}</p>
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $p['tahun'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
