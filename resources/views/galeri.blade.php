@extends('layouts.public')

@section('title', 'Galeri Foto - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- Gallery Section -->
  
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 p-12">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Galeri Foto Kami</h2>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse ($galeris as $galeri)
                    <div class="card-hover group bg-white rounded-2xl border-2 border-gray-200 hover:border-blue-400 overflow-hidden transition-all duration-300 shadow-md hover:shadow-xl flex flex-col">
                        <!-- Image -->
                        <div class="h-64 overflow-hidden bg-gradient-to-br from-blue-400 to-blue-600 relative flex-shrink-0">
                            @if ($galeri->gambar)
                                <img
                                    src="{{ asset('storage/' . $galeri->gambar) }}"
                                    alt="{{ $galeri->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300 cursor-zoom-in"
                                    data-lightbox-image="{{ asset('storage/' . $galeri->gambar) }}"
                                    data-lightbox-title="{{ $galeri->judul }}"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl"></div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $galeri->judul }}</h3>
                            <div class="flex-1"></div>
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
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Sebelumnya</span>
                        @else
                            <a href="{{ $galeris->previousPageUrl() }}" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Sebelumnya</a>
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
                            <a href="{{ $galeris->nextPageUrl() }}" class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">Berikutnya</a>
                        @else
                            <span class="inline-flex items-center rounded-full px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-100 cursor-not-allowed">Berikutnya</span>
                        @endif
                    </nav>
                </div>
            @endif
        </div>

        <!-- Lightbox Modal -->
        <div id="galeriLightbox" class="fixed inset-0 z-[100] hidden" aria-hidden="true">
            <div class="absolute inset-0 bg-black/80"></div>

            <button
                type="button"
                id="lightboxCloseButton"
                class="absolute top-4 right-4 text-white text-3xl leading-none w-10 h-10 rounded-full bg-white/20 hover:bg-white/30 transition-colors"
                aria-label="Tutup popup gambar"
            >&times;</button>

            <div class="relative h-full w-full flex items-center justify-center p-4 sm:p-8">
                <div class="max-w-5xl w-full flex flex-col items-center">
                    <img id="lightboxImage" src="" alt="Preview gambar galeri" class="max-h-[80vh] w-auto max-w-full object-contain rounded-xl shadow-2xl">
                    <p id="lightboxTitle" class="mt-4 text-white text-center text-base sm:text-lg font-medium"></p>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lightbox = document.getElementById('galeriLightbox');
            const lightboxImage = document.getElementById('lightboxImage');
            const lightboxTitle = document.getElementById('lightboxTitle');
            const closeButton = document.getElementById('lightboxCloseButton');
            const galleryImages = document.querySelectorAll('[data-lightbox-image]');

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
                    openLightbox(this.dataset.lightboxImage, this.dataset.lightboxTitle);
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
