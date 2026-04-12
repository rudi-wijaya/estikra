@extends('layouts.public')

@section('title', $berita->judul . ' - SD Negeri 3 Krasak Bangsri')

@section('content')
    <section class="py-10 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-5xl mx-auto px-8 sm:px-12 lg:px-16">

            <!-- Back link -->
            <div class="mb-8">
                <a href="{{ url('/berita') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Berita
                </a>
            </div>

            <!-- Article -->
            <article class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">

                <!-- Featured Image -->
                @if ($berita->gambar)
                    <div class="w-full h-80 sm:h-96 overflow-hidden">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-full h-52 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-7xl">📰</div>
                @endif

                <!-- Body -->
                <div class="p-8 lg:p-12">
                    <!-- Date badge -->
                    <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-4">
                        {{ $berita->tanggal_terbit->format('d M Y') }}
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">{{ $berita->judul }}</h1>

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! $berita->konten !!}
                    </div>
                </div>
            </article>

            <!-- Berita Lainnya -->
            @if ($lainnya->count())
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Lainnya</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($lainnya as $item)
                            <a href="{{ route('berita.show', $item->slug) }}" class="group bg-white rounded-xl border border-gray-200 hover:border-blue-400 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col">
                                <div class="h-44 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 flex-shrink-0">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-5xl">📰</div>
                                    @endif
                                </div>
                                <div class="p-4 flex flex-col flex-1">
                                    <span class="text-xs text-blue-600 font-semibold mb-2">{{ $item->tanggal_terbit->format('d M Y') }}</span>
                                    <h3 class="text-sm font-bold text-gray-900 line-clamp-2 leading-snug">{{ $item->judul }}</h3>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
@endsection
