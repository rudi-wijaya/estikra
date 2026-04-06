@extends('layouts.public')

@section('title', 'Prestasi - SD Negeri 3 Krasak Bangsri')

@section('content')
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <div class="text-center mb-12 animate-fadeInUp">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Prestasi Sekolah</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Kumpulan pencapaian siswa dan sekolah kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @forelse ($prestasis as $prestasi)
                    <div class="card-hover bg-white rounded-xl border-2 border-yellow-100 hover:border-yellow-300 hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <div class="h-44 bg-gradient-to-br from-yellow-100 to-yellow-50 overflow-hidden">
                            @if ($prestasi->foto)
                                <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="{{ $prestasi->judul }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="bi bi-trophy-fill text-yellow-500 text-5xl opacity-70"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <h4 class="font-bold text-gray-900 text-lg mb-1">{{ $prestasi->judul }}</h4>
                            @if ($prestasi->keterangan)
                                <p class="text-gray-600 text-sm mb-3">{{ $prestasi->keterangan }}</p>
                            @endif
                            @if ($prestasi->tahun)
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $prestasi->tahun }}</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <p class="text-2xl text-gray-600 font-semibold mb-2">Belum ada data prestasi</p>
                        <p class="text-gray-500">Prestasi sekolah akan ditampilkan di sini.</p>
                    </div>
                @endforelse
            </div>

            @if ($prestasis->hasPages())
                <div class="flex justify-center mt-10">
                    <nav class="flex items-center gap-2" aria-label="Pagination">
                        @if ($prestasis->onFirstPage())
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Previous</span>
                        @else
                            <a href="{{ $prestasis->previousPageUrl() }}" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Previous</a>
                        @endif

                        @for ($page = 1; $page <= $prestasis->lastPage(); $page++)
                            @php
                                $isNearCurrent = abs($page - $prestasis->currentPage()) <= 1;
                                $isEdgePage = in_array($page, [1, $prestasis->lastPage()], true);
                            @endphp

                            @if (!($isNearCurrent || $isEdgePage))
                                @continue
                            @endif

                            @if ($page > 1 && !($isNearCurrent || in_array($page - 1, [1, $prestasis->lastPage()], true) || abs(($page - 1) - $prestasis->currentPage()) <= 1))
                                <span class="inline-flex items-center justify-center min-w-10 h-10 text-sm font-semibold text-gray-400">...</span>
                            @endif

                            @if ($page == $prestasis->currentPage())
                                <span class="inline-flex items-center justify-center min-w-10 h-10 rounded-full px-3 text-sm font-bold text-white bg-blue-600">{{ $page }}</span>
                            @else
                                <a href="{{ $prestasis->url($page) }}" class="inline-flex items-center justify-center min-w-10 h-10 rounded-full px-3 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">{{ $page }}</a>
                            @endif
                        @endfor

                        @if ($prestasis->hasMorePages())
                            <a href="{{ $prestasis->nextPageUrl() }}" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Next</a>
                        @else
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Next</span>
                        @endif
                    </nav>
                </div>
            @endif
        </div>
    </section>
@endsection
