@extends('layouts.public')

@section('title', 'Guru & Staff - SD Negeri 3 Krasak Bangsri')

@section('content')
    <style>
        /* Org chart */
        .org-tree { display: flex; flex-direction: column; align-items: center; }
        .org-node {
            background: white;
            border: 2px solid #3b82f6;
            border-radius: 10px;
            padding: 10px 22px;
            text-align: center;
            min-width: 160px;
            box-shadow: 0 2px 8px rgba(59,130,246,0.15);
        }
        .org-node.head { background: #1e40af; color: white; border-color: #1e40af; }
        .org-node .node-name { font-weight: 700; font-size: 14px; }
        .org-node .node-jabatan { font-size: 11px; opacity: 0.75; margin-top: 2px; }
        .org-connector { width: 2px; height: 28px; background: #3b82f6; margin: 0 auto; }
        .org-children { display: flex; align-items: flex-start; justify-content: center; gap: 0; width: 100%; }
        .org-child-col { display: flex; flex-direction: column; align-items: center; flex: 1; padding: 0 8px; }
        @media (max-width: 640px) {
            .org-children { flex-direction: column; align-items: center; }
            .org-child-col { width: 100%; }
        }

        /* Staff cards */
        .staff-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 24px;
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
    <section class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-6 sm:px-10 lg:px-16">
            <div class="text-center mb-16 animate-fadeInUp">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Tim Pendidik Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Tim profesional yang berdedikasi untuk pendidikan berkualitas dan pembentukan karakter siswa</p>
            </div>

            @php
                $kategoriLabels = \App\Models\GuruStaff::$kategoriLabels;
                $urutan = ['kepala_sekolah', 'guru_kelas', 'guru_mapel', 'staff'];
                $isEmpty = $guruStaffs->isEmpty();
            @endphp

            @if ($isEmpty)
                <div class="text-center py-16 text-gray-400">
                    <div class="text-6xl mb-4">👥</div>
                    <p class="text-lg">Data guru &amp; staff belum tersedia.</p>
                    <p class="text-sm mt-2">Silakan tambahkan data melalui halaman admin.</p>
                </div>
            @else

                {{-- ===== STRUKTUR ORGANISASI ===== --}}
                <div class="mb-16 bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h3 class="text-2xl font-bold text-gray-900 text-center mb-10 pb-4 border-b-2 border-blue-400">
                        Struktur Organisasi
                    </h3>
                    <div class="org-tree">
                        {{-- Kepala Sekolah --}}
                        @foreach ($guruStaffs->get('kepala_sekolah', collect()) as $ks)
                            <div class="org-node head">
                                <div class="node-name">{{ $ks->nama }}</div>
                                <div class="node-jabatan">{{ $ks->jabatan }}</div>
                            </div>
                        @endforeach
                        @if ($guruStaffs->get('kepala_sekolah', collect())->isEmpty())
                            <div class="org-node head">
                                <div class="node-name">Kepala Sekolah</div>
                                <div class="node-jabatan">—</div>
                            </div>
                        @endif

                        <div class="org-connector"></div>

                        {{-- Cabang: Guru Kelas, Guru Mapel, Staff --}}
                        <div class="org-children w-full">
                            @foreach (['guru_kelas', 'guru_mapel', 'staff'] as $kat)
                                @if ($guruStaffs->has($kat) && $guruStaffs[$kat]->count())
                                    <div class="org-child-col">
                                        <div class="org-connector"></div>
                                        <div class="org-node">
                                            <div class="node-name">{{ $kategoriLabels[$kat] }}</div>
                                            <div class="node-jabatan">{{ $guruStaffs[$kat]->count() }} orang</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- ===== DAFTAR PER KATEGORI ===== --}}
                @foreach ($urutan as $kat)
                    @php $list = $guruStaffs->get($kat, collect()); @endphp
                    @if ($list->count())
                        <div class="mt-14">
                            <h3 class="text-2xl font-bold text-gray-900 text-center mb-8 pb-4 border-b-2 border-blue-400">
                                {{ $kategoriLabels[$kat] }}
                            </h3>
                        </div>
                        <div class="staff-grid mb-10 {{ $kat === 'kepala_sekolah' ? 'max-w-xs mx-auto' : '' }}">
                            @foreach ($list as $gs)
                                <div class="staff-card">
                                    @if ($gs->foto)
                                        <img src="{{ asset('storage/' . $gs->foto) }}" alt="{{ $gs->nama }}" class="staff-avatar">
                                    @else
                                        <div class="staff-avatar">👤</div>
                                    @endif
                                    <div class="staff-info">
                                        <div class="staff-name">{{ $gs->nama }}</div>
                                        <div class="staff-position">{{ $gs->jabatan }}</div>
                                        @if ($gs->deskripsi)
                                            <p class="staff-description">{{ $gs->deskripsi }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>
@endsection
