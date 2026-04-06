@extends('layouts.public')

@section('title', 'Program - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- Programs Section -->

        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Program Unggulan Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Program-program terbaik dirancang untuk mengembangkan potensi akademik dan karakter siswa</p>
            </div>

            <!-- Programs Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programs as $program)
                <!-- Program Card -->
                <a href="{{ route('program.show', $program) }}" class="card-hover group bg-white rounded-2xl overflow-hidden border-2 border-gray-100 hover:border-blue-300 transition-all duration-300 shadow-md hover:shadow-lg flex flex-col">
                    <!-- Program Image -->
                    <div class="w-full h-48 bg-blue-100 flex items-center justify-center overflow-hidden">
                        @if($program->foto)
                            @php
                                $programFoto = ltrim((string) $program->foto, '/');
                                $programFotoUrl = str_starts_with($programFoto, 'storage/')
                                    ? asset($programFoto)
                                    : asset('storage/' . $programFoto);
                            @endphp
                            <img src="{{ $programFotoUrl }}" alt="{{ $program->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            @php
                                $icons = [
                                    'Literasi' => 'bi-book',
                                    'Sholat Dhuha' => 'bi-moon-stars',
                                    'Pentaque' => 'bi-bullseye',
                                ];
                                $icon = $icons[$program->judul] ?? 'bi-star';
                            @endphp
                            <i class="bi {{ $icon }} text-blue-600 text-6xl opacity-50"></i>
                        @endif
                    </div>

                    <!-- Program Info -->
                    <div class="p-8 flex flex-col flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $program->judul }}</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">{{ \Illuminate\Support\Str::limit($program->deskripsi, 140) }}</p>
                        <span class="inline-flex items-center text-blue-600 font-semibold mt-auto">Baca Selengkapnya</span>
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center py-12 text-gray-400">
                    <p class="text-lg">Belum ada program unggulan yang ditambahkan.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
