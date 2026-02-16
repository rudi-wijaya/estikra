@extends('layouts.public')

@section('title', 'Guru & Staff - SD Negeri 3 Krasak Bangsri')

@section('content')
    <style>
        .staff-section {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .staff-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .staff-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
        }

        .staff-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .staff-avatar {
            width: 100%;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-size: 80px;
            color: white;
        }

        .staff-info {
            padding: 25px;
        }

        .staff-name {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: #2c3e50;
        }

        .staff-position {
            font-size: 14px;
            color: #3498db;
            font-weight: 600;
            margin: 0 0 15px 0;
        }

        .staff-description {
            font-size: 13px;
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        .section-subtitle {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin: 60px 0 30px 0;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .section-subtitle::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #3498db, #667eea);
            border-radius: 2px;
        }

        @media (max-width: 768px) {
            .staff-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
            }

            .staff-avatar {
                height: 200px;
                font-size: 60px;
            }

            .staff-info {
                padding: 15px;
            }

            .staff-name {
                font-size: 16px;
            }

            .staff-position {
                font-size: 12px;
            }
        }
    </style>

    <!-- Guru & Staff Section -->
    <section class="staff-section">
        <div class="container">
            <div class="section-title">
                <h2>Guru & Staff</h2>
                <p>Tim profesional yang berdedikasi untuk pendidikan berkualitas</p>
            </div>

            <!-- Kepala Sekolah -->
            <div class="section-subtitle">Kepala Sekolah</div>
            <div class="staff-grid" style="max-width: 400px; margin-left: auto; margin-right: auto;">
                <div class="staff-card">
                    <div class="staff-avatar">👨‍💼</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Sutanti</div>
                        <div class="staff-position">Kepala Sekolah</div>
                        <p class="staff-description">Memimpin dengan visi pendidikan berkualitas dan karakter yang kuat</p>
                    </div>
                </div>
            </div>

            <!-- Guru Kelas -->
            <div class="section-subtitle">Guru Kelas</div>
            <div class="staff-grid">
                <div class="staff-card">
                    <div class="staff-avatar">👩‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Siti Nur</div>
                        <div class="staff-position">Guru Kelas I A</div>
                        <p class="staff-description">Berpengalaman dalam pembelajaran aktif dan kreatif</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👩‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Dwi Ratna</div>
                        <div class="staff-position">Guru Kelas I B</div>
                        <p class="staff-description">Fokus pada pengembangan karakter peserta didik</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👨‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Bapak Ahmad</div>
                        <div class="staff-position">Guru Kelas II A</div>
                        <p class="staff-description">Spesialis pembelajaran berbasis STEM</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👩‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Rina Saputri</div>
                        <div class="staff-position">Guru Kelas II B</div>
                        <p class="staff-description">Ahli dalam literasi dan numerasi</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👨‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Bapak Hendra</div>
                        <div class="staff-position">Guru Kelas III A</div>
                        <p class="staff-description">Pengalaman mengajar lebih dari 10 tahun</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👩‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Eka Wijaya</div>
                        <div class="staff-position">Guru Kelas III B</div>
                        <p class="staff-description">Fokus pada pembelajaran berdiferensiasi</p>
                    </div>
                </div>
            </div>

            <!-- Guru Mata Pelajaran -->
            <div class="section-subtitle">Guru Mata Pelajaran</div>
            <div class="staff-grid">
                <div class="staff-card">
                    <div class="staff-avatar">👨‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Bapak Suryanto</div>
                        <div class="staff-position">Guru Olahraga</div>
                        <p class="staff-description">Mengembangkan bakat olahraga siswa</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👩‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Sari Lestari</div>
                        <div class="staff-position">Guru Seni Budaya</div>
                        <p class="staff-description">Membina siswa dalam seni dan budaya</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👨‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Bapak Riyan</div>
                        <div class="staff-position">Guru TIK</div>
                        <p class="staff-description">Ahli teknologi informasi dan literasi digital</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👩‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Nurul Azizah</div>
                        <div class="staff-position">Guru Bahasa Inggris</div>
                        <p class="staff-description">Mengembangkan kemampuan bahasa internasional</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👨‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Bapak Irwanto</div>
                        <div class="staff-position">Guru Agama Islam</div>
                        <p class="staff-description">Membina akhlak dan karakter Islami</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👩‍🏫</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Christiana</div>
                        <div class="staff-position">Guru Agama Katolik</div>
                        <p class="staff-description">Mendampingi siswa dalam pendidikan spiritual</p>
                    </div>
                </div>
            </div>

            <!-- Staff Administrasi -->
            <div class="section-subtitle">Staff Administrasi & Pendukung</div>
            <div class="staff-grid" style="max-width: 600px;">
                <div class="staff-card">
                    <div class="staff-avatar">👨‍💼</div>
                    <div class="staff-info">
                        <div class="staff-name">Bapak Utomo</div>
                        <div class="staff-position">Tata Usaha</div>
                        <p class="staff-description">Mengelola administrasi sekolah</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👨‍🔧</div>
                    <div class="staff-info">
                        <div class="staff-name">Pak Dani</div>
                        <div class="staff-position">Petugas Kebersihan</div>
                        <p class="staff-description">Menjaga kebersihan dan kenyamanan sekolah</p>
                    </div>
                </div>
                <div class="staff-card">
                    <div class="staff-avatar">👨‍⚕️</div>
                    <div class="staff-info">
                        <div class="staff-name">Ibu Eka Setiawati</div>
                        <div class="staff-position">Tenaga Kesehatan</div>
                        <p class="staff-description">Menjaga kesehatan siswa dan daya saing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
