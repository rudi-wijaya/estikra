@extends('layouts.public')

@section('title', 'Galeri Foto - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- Gallery Section -->
  
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Galeri Foto Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Dokumentasi kegiatan dan momen berharga di sekolah kami</p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse ($galeris as $galeri)
                    <div class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl flex flex-col">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative flex-shrink-0">
                            @if ($galeri->gambar)
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $galeri->judul }}</h3>
                            @if ($galeri->deskripsi)
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-3 flex-1">{{ Str::limit($galeri->deskripsi, 100) }}</p>
                            @else
                                <div class="flex-1"></div>
                            @endif
                            <div class="flex items-center text-gray-500 text-sm mt-auto">
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

            <!-- Pagination -->
            @if ($galeris->hasPages())
                <div class="flex justify-center mt-10">
                    <nav class="flex items-center gap-2" aria-label="Pagination">
                        @if ($galeris->onFirstPage())
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Previous</span>
                        @else
                            <a href="{{ $galeris->previousPageUrl() }}" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Previous</a>
                        @endif

                        @for ($page = 1; $page <= $galeris->lastPage(); $page++)
                            @php
                                $isNearCurrent = abs($page - $galeris->currentPage()) <= 1;
                                $isEdgePage = in_array($page, [1, $galeris->lastPage()], true);
                            @endphp

                            @if (!($isNearCurrent || $isEdgePage))
                                @continue
                            @endif

                            @if ($page > 1 && !($isNearCurrent || in_array($page - 1, [1, $galeris->lastPage()], true) || abs(($page - 1) - $galeris->currentPage()) <= 1))
                                <span class="inline-flex items-center justify-center min-w-10 h-10 text-sm font-semibold text-gray-400">...</span>
                            @endif

                            @if ($page == $galeris->currentPage())
                                <span class="inline-flex items-center justify-center min-w-10 h-10 rounded-full px-3 text-sm font-bold text-white bg-blue-600">{{ $page }}</span>
                            @else
                                <a href="{{ $galeris->url($page) }}" class="inline-flex items-center justify-center min-w-10 h-10 rounded-full px-3 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">{{ $page }}</a>
                            @endif
                        @endfor

                        @if ($galeris->hasMorePages())
                            <a href="{{ $galeris->nextPageUrl() }}" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Next</a>
                        @else
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Next</span>
                        @endif
                    </nav>
                </div>
            @endif
        </div>
    </section>
@endsection
