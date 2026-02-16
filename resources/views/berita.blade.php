@extends('layouts.public')

@section('title', 'Berita & Kegiatan - SD Negeri 3 Krasak Bangsri')

@section('content')
    <style>
        .news {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .news-grid-custom {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin: 40px 0;
        }

        .news-card-custom {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .news-card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .news-image-wrapper {
            width: 100%;
            height: 280px;
            overflow: hidden;
            position: relative;
        }

        .news-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card-custom:hover .news-image-wrapper img {
            transform: scale(1.1);
        }

        .news-info-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.9) 0%, rgba(52, 73, 94, 0.9) 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 30px 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            color: white;
        }

        .news-card-custom:hover .news-info-overlay {
            opacity: 1;
        }

        .news-info-overlay h5 {
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 10px 0;
            line-height: 1.4;
        }

        .news-info-overlay p {
            font-size: 13px;
            margin: 0 0 15px 0;
            line-height: 1.5;
        }

        .news-read-more {
            display: inline-block;
            color: #3498db;
            font-weight: 600;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .news-read-more:hover {
            color: #2980b9;
        }

        .news-date-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            margin-bottom: 15px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .news-grid-custom {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .news-grid-custom {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .news-image-wrapper {
                height: 250px;
            }

            .news-info-overlay {
                opacity: 1;
                background: linear-gradient(180deg, rgba(44, 62, 80, 0.5) 0%, rgba(44, 62, 80, 0.95) 100%);
            }
        }
    </style>

    <!-- News Section -->
    <section class="news">
        <div class="container">
            <div class="section-title">
                <h2>Berita & Kegiatan</h2>
                <p>Informasi terkini seputar kegiatan sekolah</p>
            </div>
            <div class="news-grid-custom">
                @forelse ($beritas as $berita)
                    <div class="news-card-custom">
                        <div class="news-image-wrapper">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                            @else
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 60px;">
                                    📰
                                </div>
                            @endif
                            <div class="news-info-overlay">
                                <div class="news-date-badge">{{ $berita->tanggal_terbit->format('d M Y') }}</div>
                                <h5>{{ $berita->judul }}</h5>
                                <p>{{ Str::limit(strip_tags($berita->konten), 120) }}</p>
                                <a href="#" class="news-read-more">Baca Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
                        <p style="color: #666; font-size: 16px;">📢 Belum ada berita yang dipublikasikan</p>
                    </div>
                @endforelse
            </div>

            @if ($beritas->hasPages())
                <div style="text-align: center; margin-top: 40px;">
                    {{ $beritas->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
