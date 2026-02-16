@extends('layouts.public')

@section('title', 'Galeri Foto - SD Negeri 3 Krasak Bangsri')

@section('content')
    <style>
        .gallery {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .gallery-grid-custom {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin: 40px 0;
        }

        .gallery-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .gallery-image-wrapper {
            width: 100%;
            height: 280px;
            overflow: hidden;
            position: relative;
        }

        .gallery-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .gallery-image-wrapper img {
            transform: scale(1.1);
        }

        .gallery-info {
            padding: 20px;
        }

        .gallery-info h5 {
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 10px 0;
            color: #2c3e50;
        }

        .gallery-info p {
            font-size: 14px;
            color: #666;
            margin: 0;
            line-height: 1.5;
        }

        .gallery-date {
            font-size: 12px;
            color: #999;
            margin-top: 10px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .gallery-grid-custom {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .gallery-grid-custom {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .gallery-image-wrapper {
                height: 250px;
            }
        }
    </style>

    <!-- Gallery Section -->
    <section class="gallery">
        <div class="container">
            <div class="section-title">
                <h2>Galeri Foto</h2>
                <p>Dokumentasi kegiatan sekolah</p>
            </div>
            <div class="gallery-grid-custom">
                @forelse ($galeris as $galeri)
                    <div class="gallery-card">
                        <div class="gallery-image-wrapper">
                            @if ($galeri->gambar)
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}">
                            @else
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 60px;">
                                    📸
                                </div>
                            @endif
                        </div>
                        <div class="gallery-info">
                            <h5>{{ $galeri->judul }}</h5>
                            @if ($galeri->deskripsi)
                                <p>{{ Str::limit($galeri->deskripsi, 100) }}</p>
                            @endif
                            <div class="gallery-date">
                                📅 {{ $galeri->tanggal_upload->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
                        <p style="color: #666; font-size: 16px;">📷 Belum ada foto galeri</p>
                    </div>
                @endforelse
            </div>

            @if ($galeris->hasPages())
                <div style="text-align: center; margin-top: 40px;">
                    {{ $galeris->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
