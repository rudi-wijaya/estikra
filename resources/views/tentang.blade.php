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
                            @foreach (array_filter(explode("\n", \App\Models\Setting::get('tentang_visi', ''))) as $poin)
                                <li class="flex items-start gap-3 text-gray-600">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>{{ trim($poin) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Misi -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                            <i class="text-blue-600 text-2xl"></i> Misi Kami
                        </h3>
                        <ul class="space-y-3">
                            @foreach (array_filter(explode("\n", \App\Models\Setting::get('tentang_misi', ''))) as $poin)
                                <li class="flex items-start gap-3 text-gray-600">
                                    <span class="text-gray-400 mt-1">•</span>
                                    <span>{{ trim($poin) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
