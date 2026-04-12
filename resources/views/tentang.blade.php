@extends('layouts.public')

@section('title', 'Tentang Kami - SD Negeri 3 Krasak Bangsri')

@section('content')
    <!-- About Section -->
    <section class="py-12 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16">
            <!-- Section Header -->
            <div class="text-center mb-10 animate-fadeInUp">
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">{{ \App\Models\Setting::get('tentang_judul', 'Tentang SD Negeri 3 Krasak') }}</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">{{ \App\Models\Setting::get('tentang_subjudul', 'Mengenal lebih dekat sekolah kami dan komitmen kami terhadap pendidikan berkualitas') }}</p>
            </div>

            @php
                $tentangDeskripsi = \App\Models\Setting::get('tentang_deskripsi', 'SD Negeri 3 Krasak Bangsri merupakan sekolah dasar yang berkomitmen memberikan pendidikan berkualitas, membentuk karakter siswa, dan mendorong prestasi akademik maupun non akademik.');
                $deskripsiParagraf = preg_split('/\R{2,}/', trim($tentangDeskripsi));
            @endphp
            <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm mb-8">
                <div class="max-w-5xl text-gray-700 text-lg leading-9">
                    @foreach ($deskripsiParagraf as $paragraf)
                        @if (trim($paragraf) !== '')
                            <p class="mb-5 last:mb-0 whitespace-pre-line">{{ trim($paragraf) }}</p>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <span class="inline-flex items-center rounded-full border border-blue-200 bg-blue-50 px-4 py-1 text-sm font-semibold text-blue-700">Profil Sekolah</span>
            </div>
            <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm mb-10">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ \App\Models\Setting::get('tentang_profil_judul', 'Profil Sekolah') }}</h3>
                @php
                    $profilItems = [
                        [
                            'label' => \App\Models\Setting::get('tentang_label_status', 'Status'),
                            'value' => \App\Models\Setting::get('sekolah_status', 'Sekolah Negeri'),
                            'span' => '',
                            'is_email' => false,
                        ],
                        [
                            'label' => \App\Models\Setting::get('tentang_label_npsn', 'NPSN'),
                            'value' => \App\Models\Setting::get('npsn', '20318102'),
                            'span' => '',
                            'is_email' => false,
                        ],
                        [
                            'label' => \App\Models\Setting::get('tentang_label_akreditasi', 'Akreditasi'),
                            'value' => \App\Models\Setting::get('akreditasi', 'A'),
                            'span' => '',
                            'is_email' => false,
                        ],
                        [
                            'label' => \App\Models\Setting::get('tentang_label_email', 'Email'),
                            'value' => \App\Models\Setting::get('sekolah_email', 'sdn3krasakbangsri@gmail.com'),
                            'span' => '',
                            'is_email' => true,
                        ],
                        [
                            'label' => \App\Models\Setting::get('tentang_label_alamat', 'Alamat'),
                            'value' => \App\Models\Setting::get('sekolah_alamat', 'Jl. Raya Krasak No. 45, Desa Krasak, Kec. Bangsri, Kabupaten Jepara, Jawa Tengah 59453'),
                            'span' => 'md:col-span-2',
                            'is_email' => false,
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($profilItems as $item)
                        <div class="rounded-xl border border-blue-100 bg-blue-50/40 p-4 {{ $item['span'] }}">
                            <p class="text-sm font-semibold text-gray-900 mb-1">{{ $item['label'] }}</p>
                            <p class="text-gray-700 leading-relaxed {{ $item['is_email'] ? '[overflow-wrap:anywhere]' : '' }}">{{ $item['value'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                <span class="inline-flex items-center rounded-full border border-blue-200 bg-blue-50 px-4 py-1 text-sm font-semibold text-blue-700">Visi & Misi</span>
            </div>

            <!-- Visi & Misi Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Visi Card -->
                <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ \App\Models\Setting::get('tentang_visi_judul', 'Visi Kami') }}</h3>
                    <ul class="space-y-3">
                        @foreach (array_filter(explode("\n", \App\Models\Setting::get('tentang_visi', ''))) as $poin)
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mt-2 shrink-0"></span>
                                <span>{{ trim($poin) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Misi Card -->
                <div class="bg-white rounded-2xl p-8 border border-blue-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ \App\Models\Setting::get('tentang_misi_judul', 'Misi Kami') }}</h3>
                    <ul class="space-y-3">
                        @foreach (array_filter(explode("\n", \App\Models\Setting::get('tentang_misi', ''))) as $poin)
                            <li class="flex items-start gap-3 text-gray-600">
                                <span class="w-2 h-2 bg-blue-400 rounded-full mt-2 shrink-0"></span>
                                <span>{{ trim($poin) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Section -->
    <section class="py-10 bg-white">
        <div class="max-w-6xl mx-auto px-8 sm:px-12 lg:px-16 animate-fadeInUp">
            <div class="text-center mb-8">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">{{ \App\Models\Setting::get('tentang_prestasi_judul', 'Prestasi') }}</h2>
                <p class="text-gray-600">{{ \App\Models\Setting::get('tentang_prestasi_subjudul', 'Pencapaian membanggakan siswa dan sekolah kami') }}</p>
            </div>
            <div class="space-y-4">
                @if (isset($prestasis) && $prestasis->count() > 0)
                    @php
                        $prestasiUtama = $prestasis->take(3);
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($prestasiUtama as $prestasi)
                            <div
                                class="card-hover bg-white rounded-xl border-2 border-yellow-100 hover:border-yellow-300 hover:shadow-xl transition-all duration-300 overflow-hidden prestasi-popup-trigger cursor-pointer"
                                data-title="{{ $prestasi->judul }}"
                                data-description="{{ e(strip_tags($prestasi->keterangan ?? '')) }}"
                                data-tahun="{{ $prestasi->tahun ?? '' }}"
                                data-image="{{ $prestasi->foto ? asset('storage/' . $prestasi->foto) : '' }}"
                                role="button"
                                tabindex="0"
                                aria-label="Lihat detail prestasi {{ $prestasi->judul }}"
                            >
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
                        @endforeach
                    </div>

                    <div id="prestasi-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
                        <div class="absolute inset-0 bg-black/70" data-close-prestasi-modal></div>
                        <div class="relative w-full max-w-3xl rounded-2xl bg-white shadow-2xl overflow-hidden">
                            <button
                                type="button"
                                class="absolute right-3 top-3 z-10 inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-gray-700 hover:bg-white"
                                data-close-prestasi-modal
                                aria-label="Tutup popup"
                            >
                                <i class="bi bi-x-lg"></i>
                            </button>

                            <div class="h-64 sm:h-80 bg-gradient-to-br from-yellow-100 to-yellow-50">
                                <img id="prestasi-modal-image" src="" alt="" class="hidden w-full h-full object-cover">
                                <div id="prestasi-modal-fallback" class="w-full h-full flex items-center justify-center">
                                    <i class="bi bi-trophy-fill text-yellow-500 text-6xl opacity-70"></i>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex items-start justify-between gap-3">
                                    <h3 id="prestasi-modal-title" class="text-2xl font-bold text-gray-900"></h3>
                                    <span id="prestasi-modal-year" class="hidden bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full"></span>
                                </div>
                                <p id="prestasi-modal-description" class="mt-4 text-gray-600 leading-relaxed"></p>
                            </div>
                        </div>
                    </div>

                    @if ($prestasis->count() > 3)
                        <div class="text-center pt-2">
                            <a href="{{ route('prestasi.index') }}" class="btn-primary inline-block rounded-full">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    @endif
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @php
                            $defaultPrestasi = [
                                ['judul' => 'Juara 1 Pentaque', 'keterangan' => 'Tingkat Kabupaten Jepara', 'tahun' => '2025'],
                                ['judul' => 'Juara 2 Literasi', 'keterangan' => 'Lomba Bercerita Tingkat Kecamatan', 'tahun' => '2025'],
                                ['judul' => 'Sekolah Adiwiyata', 'keterangan' => 'Penghargaan Sekolah Peduli Lingkungan', 'tahun' => '2024'],
                            ];
                        @endphp
                        @foreach ($defaultPrestasi as $p)
                            <div class="card-hover bg-white rounded-xl p-6 border-2 border-yellow-100 hover:border-yellow-300 hover:shadow-xl transition-all duration-300">
                                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center mb-4">
                                    <i class="bi bi-trophy-fill text-yellow-500 text-xl"></i>
                                </div>
                                <h4 class="font-bold text-gray-900 text-lg mb-1">{{ $p['judul'] }}</h4>
                                <p class="text-gray-600 text-sm mb-3">{{ $p['keterangan'] }}</p>
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $p['tahun'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('prestasi-modal');
            const titleEl = document.getElementById('prestasi-modal-title');
            const descriptionEl = document.getElementById('prestasi-modal-description');
            const yearEl = document.getElementById('prestasi-modal-year');
            const imageEl = document.getElementById('prestasi-modal-image');
            const fallbackEl = document.getElementById('prestasi-modal-fallback');
            const triggers = document.querySelectorAll('.prestasi-popup-trigger');
            const closeButtons = document.querySelectorAll('[data-close-prestasi-modal]');

            if (!modal || !titleEl || !descriptionEl || !yearEl || !imageEl || !fallbackEl || !triggers.length) {
                return;
            }

            const openModal = function (trigger) {
                const title = trigger.dataset.title || 'Prestasi';
                const description = trigger.dataset.description || 'Tidak ada deskripsi.';
                const year = trigger.dataset.tahun || '';
                const image = trigger.dataset.image || '';

                titleEl.textContent = title;
                descriptionEl.textContent = description;

                if (year !== '') {
                    yearEl.textContent = year;
                    yearEl.classList.remove('hidden');
                } else {
                    yearEl.classList.add('hidden');
                }

                if (image !== '') {
                    imageEl.src = image;
                    imageEl.alt = title;
                    imageEl.classList.remove('hidden');
                    fallbackEl.classList.add('hidden');
                } else {
                    imageEl.src = '';
                    imageEl.alt = '';
                    imageEl.classList.add('hidden');
                    fallbackEl.classList.remove('hidden');
                }

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            };

            const closeModal = function () {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            };

            triggers.forEach(function (trigger) {
                trigger.addEventListener('click', function () {
                    openModal(trigger);
                });

                trigger.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        openModal(trigger);
                    }
                });
            });

            closeButtons.forEach(function (button) {
                button.addEventListener('click', closeModal);
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modal.classList.contains('flex')) {
                    closeModal();
                }
            });
        });
    </script>
@endsection
