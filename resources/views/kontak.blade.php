@extends('layouts.public')

@section('title', 'Hubungi Kami - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- Contact Section -->
    <section class="py-12 bg-white">
        <div class="max-w-5xl mx-auto px-6 sm:px-8 lg:px-10">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Hubungi Kami</h2>
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
