@extends('layouts.public')

@section('title', 'Berita & Kegiatan - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- News Section -->
    <section class="news">
        <div class="container">
            <div class="section-title">
                <h2>Berita & Kegiatan</h2>
                <p>Informasi terkini seputar kegiatan sekolah</p>
            </div>
            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image">📰</div>
                    <div class="news-content">
                        <div class="news-date">5 Februari 2026</div>
                        <h3>Penerimaan Peserta Didik Baru 2026/2027</h3>
                        <p>Pendaftaran siswa baru tahun ajaran 2026/2027 dibuka mulai tanggal 1 Maret 2026. Info lengkap kunjungi sekolah.</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image">🏆</div>
                    <div class="news-content">
                        <div class="news-date">28 Januari 2026</div>
                        <h3>Juara 1 Olimpiade Matematika Tingkat Kabupaten</h3>
                        <p>Selamat kepada Ananda Rizki Ramadan meraih juara 1 Olimpiade Matematika SD tingkat Kabupaten Jepara.</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-image">🎭</div>
                    <div class="news-content">
                        <div class="news-date">15 Januari 2026</div>
                        <h3>Pentas Seni dan Budaya Semester Ganjil</h3>
                        <p>Kegiatan pentas seni menampilkan berbagai pertunjukan tari, musik, dan drama dari siswa-siswi SD N 3 Krasak.</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
