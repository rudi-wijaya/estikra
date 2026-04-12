@extends('layouts.public')

@section('title', $program->judul . ' - SD Negeri 3 Krasak Bangsri')

@section('content')
    <section class="py-10 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-5xl mx-auto px-8 sm:px-12 lg:px-16">

            <!-- Back link -->
            <div class="mb-8">
                <a href="{{ url('/program') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Program
                </a>
            </div>

            <!-- Program Detail -->
            <article class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">

                <!-- Featured Image -->
                @if ($program->foto)
                    @php
                        $detailFoto = ltrim((string) $program->foto, '/');
                        $detailFotoUrl = str_starts_with($detailFoto, 'storage/')
                            ? asset($detailFoto)
                            : asset('storage/' . $detailFoto);
                    @endphp
                    <div class="w-full h-80 sm:h-96 overflow-hidden">
                        <img src="{{ $detailFotoUrl }}" alt="{{ $program->judul }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="w-full h-52 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <i class="bi bi-image text-white text-7xl opacity-80"></i>
                    </div>
                @endif

                <!-- Body -->
                <div class="p-8 lg:p-12">
                    <div class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-4">
                        Program Unggulan
                    </div>

                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">{{ $program->judul }}</h1>

                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $program->deskripsi }}
                    </div>

                    @if (is_array($program->galeri_foto) && count($program->galeri_foto))
                        <div class="mt-10">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Galeri Program</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($program->galeri_foto as $foto)
                                    @php
                                        $galeriPath = ltrim((string) $foto, '/');
                                        $galeriUrl = str_starts_with($galeriPath, 'storage/')
                                            ? asset($galeriPath)
                                            : asset('storage/' . $galeriPath);
                                    @endphp
                                    <div class="rounded-xl overflow-hidden border border-gray-200 bg-white">
                                        <img
                                            src="{{ $galeriUrl }}"
                                            alt="Galeri {{ $program->judul }}"
                                            class="w-full h-48 object-cover cursor-zoom-in"
                                            data-program-lightbox-image="{{ $galeriUrl }}"
                                            data-program-lightbox-title="{{ $program->judul }}"
                                        >
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </article>

            <!-- Program Lainnya -->
            @if ($lainnya->count())
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Program Lainnya</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($lainnya as $item)
                            <a href="{{ route('program.show', $item) }}" class="group bg-white rounded-xl border border-gray-200 hover:border-blue-400 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col">
                                <div class="h-44 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 flex-shrink-0">
                                    @if ($item->foto)
                                        @php
                                            $itemFoto = ltrim((string) $item->foto, '/');
                                            $itemFotoUrl = str_starts_with($itemFoto, 'storage/')
                                                ? asset($itemFoto)
                                                : asset('storage/' . $itemFoto);
                                        @endphp
                                        <img src="{{ $itemFotoUrl }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="bi bi-image text-white text-5xl opacity-80"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4 flex flex-col flex-1">
                                    <h3 class="text-base font-bold text-gray-900 line-clamp-2 leading-snug mb-2">{{ $item->judul }}</h3>
                                    <p class="text-sm text-gray-600 line-clamp-3">{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>

        <!-- Program Gallery Lightbox -->
        <div id="programLightbox" class="fixed inset-0 z-[100] hidden" aria-hidden="true">
            <div class="absolute inset-0 bg-black/80"></div>

            <button
                type="button"
                id="programLightboxClose"
                class="absolute top-4 right-4 text-white text-3xl leading-none w-10 h-10 rounded-full bg-white/20 hover:bg-white/30 transition-colors"
                aria-label="Tutup popup gambar"
            >&times;</button>

            <div class="relative h-full w-full flex items-center justify-center p-4 sm:p-8">
                <div class="max-w-5xl w-full flex flex-col items-center">
                    <img id="programLightboxImage" src="" alt="Preview galeri program" class="max-h-[80vh] w-auto max-w-full object-contain rounded-xl shadow-2xl">
                    <p id="programLightboxTitle" class="mt-4 text-white text-center text-base sm:text-lg font-medium"></p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lightbox = document.getElementById('programLightbox');
            const lightboxImage = document.getElementById('programLightboxImage');
            const lightboxTitle = document.getElementById('programLightboxTitle');
            const closeButton = document.getElementById('programLightboxClose');
            const galleryImages = document.querySelectorAll('[data-program-lightbox-image]');

            if (!lightbox || !lightboxImage || !lightboxTitle || !closeButton || galleryImages.length === 0) {
                return;
            }

            const openLightbox = (src, title) => {
                lightboxImage.src = src;
                lightboxTitle.textContent = title || '';
                lightbox.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                lightbox.setAttribute('aria-hidden', 'false');
            };

            const closeLightbox = () => {
                lightbox.classList.add('hidden');
                lightboxImage.src = '';
                lightboxTitle.textContent = '';
                document.body.classList.remove('overflow-hidden');
                lightbox.setAttribute('aria-hidden', 'true');
            };

            galleryImages.forEach((image) => {
                image.addEventListener('click', function () {
                    openLightbox(this.dataset.programLightboxImage, this.dataset.programLightboxTitle);
                });
            });

            closeButton.addEventListener('click', closeLightbox);

            lightbox.addEventListener('click', function (event) {
                if (event.target !== lightboxImage) {
                    closeLightbox();
                }
            });

            lightboxImage.addEventListener('click', function (event) {
                event.stopPropagation();
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && lightbox.getAttribute('aria-hidden') === 'false') {
                    closeLightbox();
                }
            });
        });
    </script>
@endsection
