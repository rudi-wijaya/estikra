@extends('layouts.admin')

@section('page_title', 'Pengaturan')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="h4 mb-0">{{ $pageTitle ?? 'Pengaturan Website' }}</h2>
            <p class="text-muted small mt-1">{{ $pageSubtitle ?? 'Kelola informasi dan konten yang tampil di website' }}</p>
        </div>
    </div>

    @if (request()->routeIs('admin.settings.tentang.*'))
        <div class="admin-top-tabs">
            <a class="tab-link active" href="{{ route('admin.settings.tentang.index') }}">
                <i class="bi bi-info-circle"></i>Konten Tentang
            </a>
            <a class="tab-link" href="{{ route('admin.prestasis.index') }}">
                <i class="bi bi-trophy"></i>Data Prestasi
            </a>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ $formAction ?? route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @php
            $tentangProfilKeys = ['sekolah_status', 'npsn', 'akreditasi'];
            $tentangProfilLabelKeys = ['tentang_label_status', 'tentang_label_npsn', 'tentang_label_akreditasi', 'tentang_label_alamat', 'tentang_label_email'];
            $groupLabels = [
                'sekolah' => ['label' => 'Informasi Sekolah', 'icon' => 'bi-building'],
                'beranda' => ['label' => 'Beranda (Hero)', 'icon' => 'bi-house-door'],
                'tentang' => ['label' => 'Halaman Tentang', 'icon' => 'bi-info-circle'],
            ];

            $berandaStatFields = [
                1 => ['angka_key' => 'beranda_stat_1_angka', 'label_key' => 'beranda_stat_1_label', 'default_angka' => '150+', 'default_label' => 'Siswa Aktif'],
                2 => ['angka_key' => 'beranda_stat_2_angka', 'label_key' => 'beranda_stat_2_label', 'default_angka' => '10+', 'default_label' => 'Guru & Staff'],
                3 => ['angka_key' => 'beranda_stat_3_angka', 'label_key' => 'beranda_stat_3_label', 'default_angka' => '6', 'default_label' => 'Kelas'],
                4 => ['angka_key' => 'beranda_stat_4_angka', 'label_key' => 'beranda_stat_4_label', 'default_angka' => '50+', 'default_label' => 'Prestasi'],
            ];

            $berandaStatKeys = collect($berandaStatFields)
                ->flatMap(fn ($item) => [$item['angka_key'], $item['label_key']])
                ->values()
                ->all();

            $heroSlides = [];
            $heroSlidesSetting = $settings->get('beranda')?->firstWhere('key', 'hero_slides');
            if ($heroSlidesSetting) {
                $decodedHeroSlides = json_decode($heroSlidesSetting->value ?? '[]', true);
                if (is_array($decodedHeroSlides)) {
                    $heroSlides = array_values(array_filter(array_map(fn ($slide) => trim((string) $slide), $decodedHeroSlides)));
                }
            }
        @endphp

        @foreach ($settings as $group => $items)
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi {{ $groupLabels[$group]['icon'] ?? 'bi-gear' }}"></i>
                    <strong>{{ $groupLabels[$group]['label'] ?? ucfirst($group) }}</strong>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @if ($group === 'beranda')
                            <div class="col-12">
                                <div class="border rounded p-3 bg-light-subtle">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="mb-0">Statistik Beranda</h6>
                                        <small class="text-muted">Format per kartu: angka|label (contoh: 150+|Siswa Aktif)</small>
                                    </div>
                                    <div class="row g-3">
                                        @foreach ($berandaStatFields as $index => $statField)
                                            @php
                                                $angkaSetting = $items->firstWhere('key', $statField['angka_key']);
                                                $labelSetting = $items->firstWhere('key', $statField['label_key']);
                                                $combinedValue = trim(($angkaSetting->value ?? $statField['default_angka']) . '|' . ($labelSetting->value ?? $statField['default_label']));
                                            @endphp
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <label class="form-label" for="beranda_stat_{{ $index }}_combined">Kartu {{ $index }}</label>
                                                <input
                                                    type="text"
                                                    id="beranda_stat_{{ $index }}_combined"
                                                    name="beranda_stat_{{ $index }}_combined"
                                                    class="form-control"
                                                    value="{{ old('beranda_stat_' . $index . '_combined', $combinedValue) }}"
                                                    placeholder="{{ $statField['default_angka'] }}|{{ $statField['default_label'] }}"
                                                >
                                                <small class="text-muted d-block mt-1">Pisahkan dengan karakter |</small>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @foreach ($items as $setting)
                            @php
                                $isTentangPage = request()->routeIs('admin.settings.tentang.*');
                                $wideKeysDefault = ['tentang_visi', 'tentang_misi', 'sekolah_alamat', 'tentang_deskripsi', 'footer_maps_embed'];
                                $wideKeysTentang = ['tentang_visi', 'tentang_misi', 'tentang_deskripsi'];
                                $isWideField = in_array($setting->key, $isTentangPage ? $wideKeysTentang : $wideKeysDefault, true);
                            @endphp

                            @if (request()->routeIs('admin.settings.tentang.*') && (in_array($setting->key, $tentangProfilKeys, true) || in_array($setting->key, $tentangProfilLabelKeys, true)))
                                @continue
                            @endif

                            @if (in_array($setting->key, ['hero_background', 'hero_background_2', 'hero_background_3']))
                                @continue
                            @endif

                            @if (in_array($setting->key, $berandaStatKeys))
                                @continue
                            @endif

                            @if ($setting->key === 'hero_slides')
                                <div class="col-12">
                                    <label class="form-label">Foto Hero Slides</label>

                                    <div class="row g-3 mb-2">
                                        @forelse ($heroSlides as $slide)
                                            <div class="col-12 col-md-4">
                                                <div class="border rounded p-2 h-100">
                                                    <img src="{{ asset($slide) }}" alt="Hero slide"
                                                        class="img-thumbnail w-100"
                                                        style="height: 140px; object-fit: cover;">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" name="hero_slides_delete[]" value="{{ $slide }}" id="delete_slide_{{ md5($slide) }}">
                                                        <label class="form-check-label" for="delete_slide_{{ md5($slide) }}">
                                                            Hapus gambar ini
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="text-muted small">Belum ada slide hero. Tambahkan gambar baru di bawah.</div>
                                            </div>
                                        @endforelse
                                    </div>

                                    <div id="heroSlideInputs" class="d-flex flex-column gap-2"></div>
                                    <button type="button" id="addHeroSlideBtn" class="btn btn-outline-primary btn-sm mt-2">
                                        <i class="bi bi-plus-circle me-1"></i>Tambah Gambar Hero
                                    </button>
                                    <small class="text-muted d-block mt-2">Anda bisa menambah atau menghapus slide seperti pengelolaan data list. Jumlah slide di Beranda otomatis mengikuti jumlah gambar aktif.</small>
                                </div>
                                @continue
                            @endif

                            <div class="col-12 {{ $isWideField ? '' : 'col-md-6' }}">
                                <label class="form-label" for="{{ $setting->key }}">{{ $setting->label }}</label>
                                @if (in_array($setting->key, ['sekolah_logo', 'sambutan_foto']))
                                    @if ($setting->value)
                                        <div class="mb-2">
                                            <img src="{{ asset($setting->value) }}" alt="Gambar saat ini"
                                                class="img-thumbnail"
                                                style="height: 100px; width: {{ $setting->key === 'sekolah_logo' ? '100px' : 'auto' }}; object-fit: cover;">
                                            <small class="d-block text-muted mt-1">Gambar saat ini</small>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" value="1" id="clear_{{ $setting->key }}" name="clear_{{ $setting->key }}">
                                            <label class="form-check-label" for="clear_{{ $setting->key }}">
                                                Hapus gambar ini
                                            </label>
                                        </div>
                                    @endif
                                    <input type="file" id="{{ $setting->key }}" name="{{ $setting->key }}" class="form-control" accept="image/*">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                @elseif (in_array($setting->key, ['tentang_visi', 'tentang_misi', 'footer_maps_embed']) || strlen($setting->value ?? '') > 80 || str_contains(strtolower($setting->label), 'deskripsi') || str_contains(strtolower($setting->label), 'alamat'))
                                    <textarea
                                        id="{{ $setting->key }}"
                                        name="{{ $setting->key }}"
                                        class="form-control"
                                        rows="{{ in_array($setting->key, ['tentang_visi', 'tentang_misi']) ? 8 : (in_array($setting->key, ['footer_maps_embed']) ? 4 : 3) }}"
                                    >{{ old($setting->key, $setting->value) }}</textarea>
                                    @if (in_array($setting->key, ['tentang_visi', 'tentang_misi']))
                                        <small class="text-muted">Tulis satu poin per baris. Tekan Enter untuk baris baru.</small>
                                    @elseif ($setting->key === 'footer_maps_embed')
                                        <small class="text-muted">Tempel URL embed dari Google Maps (nilai pada atribut src iframe).</small>
                                    @endif
                                @else
                                    <input
                                        type="text"
                                        id="{{ $setting->key }}"
                                        name="{{ $setting->key }}"
                                        class="form-control"
                                        value="{{ old($setting->key, $setting->value) }}"
                                    >
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        @if (request()->routeIs('admin.settings.tentang.*'))
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi bi-building"></i>
                    <strong>Profil Sekolah</strong>
                </div>
                <div class="card-body">
                    @php
                        $labelMap = collect($profilSekolahLabelSettings ?? collect())->keyBy('key');
                        $valueMap = collect($profilSekolahSettings ?? collect())->keyBy('key');
                        $pairs = [
                            ['label' => 'tentang_label_status', 'value' => 'sekolah_status'],
                            ['label' => 'tentang_label_npsn', 'value' => 'npsn'],
                            ['label' => 'tentang_label_akreditasi', 'value' => 'akreditasi'],
                            ['label' => 'tentang_label_alamat', 'value' => 'sekolah_alamat'],
                            ['label' => 'tentang_label_email', 'value' => 'sekolah_email'],
                        ];
                    @endphp

                    <div class="row g-3">
                        @foreach ($pairs as $pair)
                            @php
                                $labelSetting = $labelMap->get($pair['label']);
                                $valueSetting = $valueMap->get($pair['value']);
                                $isAlamat = $pair['value'] === 'sekolah_alamat';
                            @endphp

                            @if ($labelSetting && $valueSetting)
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="{{ $labelSetting->key }}">{{ $labelSetting->label }}</label>
                                    <input type="text" id="{{ $labelSetting->key }}" name="{{ $labelSetting->key }}" class="form-control" value="{{ old($labelSetting->key, $labelSetting->value) }}">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="{{ $valueSetting->key }}">{{ $valueSetting->label }}</label>
                                    @if ($isAlamat)
                                        <textarea id="{{ $valueSetting->key }}" name="{{ $valueSetting->key }}" class="form-control" rows="3">{{ old($valueSetting->key, $valueSetting->value) }}</textarea>
                                    @else
                                        <input type="text" id="{{ $valueSetting->key }}" name="{{ $valueSetting->key }}" class="form-control" value="{{ old($valueSetting->key, $valueSetting->value) }}">
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-4">
            <button type="submit" class="btn btn-primary px-5">
                <i class="bi bi-save me-2"></i>Simpan Pengaturan
            </button>
        </div>
    </form>

        @if (request()->routeIs('admin.settings.tentang.*'))
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi bi-trophy"></i>
                    <strong>Data Prestasi</strong>
                </div>
                <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                    <p class="mb-0 text-muted">Pengelolaan data Prestasi dipisahkan di halaman tersendiri agar lebih fokus dan rapi.</p>
                    <a href="{{ route('admin.prestasis.index') }}" class="btn btn-primary">
                        <i class="bi bi-box-arrow-up-right me-1"></i>Buka Halaman Prestasi
                    </a>
                </div>
            </div>
        @endif
</div>
@endsection

@section('scripts')
<script>
    (function () {
        const addBtn = document.getElementById('addHeroSlideBtn');
        const container = document.getElementById('heroSlideInputs');
        if (!addBtn || !container) return;

        function createInputRow() {
            const row = document.createElement('div');
            row.className = 'd-flex gap-2 align-items-center';
            row.innerHTML = `
                <input type="file" name="hero_slides_new[]" class="form-control" accept="image/*">
                <button type="button" class="btn btn-outline-danger btn-sm" title="Hapus input">
                    <i class="bi bi-trash"></i>
                </button>
            `;

            row.querySelector('button')?.addEventListener('click', function () {
                row.remove();
            });

            container.appendChild(row);
        }

        addBtn.addEventListener('click', createInputRow);
        createInputRow();
    })();
</script>
@endsection
