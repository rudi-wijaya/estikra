@extends('layouts.public')

@section('title', 'Guru & Staff - SD Negeri 3 Krasak Bangsri')

@section('content')
    <style>
        /* ===== ORG CHART ===== */
        .oc-wrap { display: flex; flex-direction: column; align-items: center; }

        .oc-node {
            background: white;
            border: 2px solid #007AFF;
            border-radius: 12px;
            padding: 12px 28px;
            text-align: center;
            min-width: 170px;
            max-width: 260px;
            box-shadow: 0 2px 10px rgba(0,122,255,0.15);
            position: relative;
            z-index: 1;
        }
        .oc-node.oc-head {
            background: linear-gradient(135deg, #0066d6 0%, #007AFF 100%);
            color: white;
            border-color: #0066d6;
            box-shadow: 0 4px 16px rgba(0,122,255,0.35);
        }
        .oc-node .node-name { font-weight: 700; font-size: 14px; line-height: 1.3; }
        .oc-node .node-sub  { font-size: 11px; opacity: 0.8; margin-top: 3px; }

        /* Vertical trunk line */
        .oc-trunk { width: 2px; height: 32px; background: #007AFF; }

        /* Children row */
        .oc-children {
            display: flex;
            justify-content: center;
            position: relative;
            width: 100%;
        }
        /* Horizontal bar — spans from centre of first child to centre of last child */
        .oc-children.has-multiple::before {
            content: '';
            position: absolute;
            top: 0;
            left:  calc(100% / (2 * var(--n, 2)));
            right: calc(100% / (2 * var(--n, 2)));
            height: 2px;
            background: #007AFF;
        }
        /* Each child column */
        .oc-child {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            padding: 32px 12px 0;
            position: relative;
        }
        /* Vertical drop from horizontal bar to each child node */
        .oc-child::before {
            content: '';
            position: absolute;
            top: 0; left: 50%;
            transform: translateX(-50%);
            width: 2px; height: 32px;
            background: #007AFF;
        }
        @media (max-width: 640px) {
            .oc-children { flex-direction: column; align-items: center; }
            .oc-children.has-multiple::before { display: none; }
            .oc-child { flex: none; width: 100%; padding-top: 16px; }
            .oc-child::before { height: 16px; }
        }

        /* Staff cards */
        .staff-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 24px;
            margin: 40px 0;
            align-items: stretch;
        }

        .staff-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: left;
            display: flex;
            flex-direction: column;
        }

        .staff-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .staff-avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #007AFF 0%, #3396ff 100%);
            font-size: 60px;
            color: white;
            object-fit: cover;
            border: 4px solid #e5f2ff;
            box-shadow: 0 4px 14px rgba(0,122,255,0.2);
            margin: 20px auto 0;
        }

        .staff-info {
            padding: 16px 20px 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .staff-name {
            font-size: 15px;
            font-weight: 700;
            margin: 0 0 5px 0;
            color: #2c3e50;
            line-height: 1.45;
            word-break: break-word;
            overflow-wrap: break-word;
            min-height: 2.9em;
            display: flex;
            align-items: flex-start;
        }

        .staff-position {
            font-size: 13px;
            color: #007AFF;
            font-weight: 600;
            margin: 0 0 12px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
            background: linear-gradient(90deg, #007AFF, #3396ff);
            border-radius: 2px;
        }

        @media (max-width: 768px) {
            .staff-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
            }

            .staff-avatar {
                width: 120px;
                height: 120px;
                font-size: 50px;
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

                    @php
                        $ksNode   = $guruStaffs->get('kepala_sekolah', collect())->first();
                        $childKats = collect(['guru_kelas', 'guru_mapel', 'staff'])
                            ->filter(fn($k) => $guruStaffs->has($k) && $guruStaffs[$k]->count())
                            ->values();
                        $cn = $childKats->count();
                    @endphp

                    <div class="oc-wrap">
                        {{-- Kepala Sekolah --}}
                        <div class="oc-node oc-head">
                            <div class="node-name">{{ $ksNode ? $ksNode->nama : 'Kepala Sekolah' }}</div>
                            <div class="node-sub">{{ $ksNode ? $ksNode->jabatan : '—' }}</div>
                        </div>

                        @if ($cn > 0)
                            {{-- Trunk line --}}
                            <div class="oc-trunk"></div>

                            {{-- Children --}}
                            <div class="oc-children {{ $cn > 1 ? 'has-multiple' : '' }}" style="--n: {{ $cn }};">
                                @foreach ($childKats as $kat)
                                    <div class="oc-child">
                                        <div class="oc-node">
                                            <div class="node-name">{{ $kategoriLabels[$kat] }}</div>
                                            <div class="node-sub">{{ $guruStaffs[$kat]->count() }} orang</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
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
