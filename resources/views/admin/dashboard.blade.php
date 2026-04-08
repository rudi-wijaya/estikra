@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')
    <style>
        .page-content {
            overflow-x: hidden;
        }

        .dashboard-shell {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }

        .dashboard-shell,
        .dashboard-shell * {
            box-sizing: border-box;
        }

        .dashboard-shell .row {
            margin-left: 0;
            margin-right: 0;
        }

        .dashboard-shell .row > [class*='col-'] {
            padding-left: 0;
            padding-right: 0;
        }

        .dashboard-grid-gap {
            row-gap: 1rem;
        }

        .dashboard-shell .card,
        .dashboard-shell .stat-card,
        .dashboard-shell .quick-action,
        .dashboard-shell canvas {
            max-width: 100%;
        }

        .dashboard-shell .card-body {
            overflow-x: hidden;
        }

        .chart-wrap {
            position: relative;
            width: 100%;
            max-width: 100%;
        }

        .chart-wrap-line {
            height: 290px;
        }

        .chart-wrap-pie {
            height: 320px;
            max-width: 420px;
            margin: 0 auto;
        }

        .dashboard-stat-col {
            min-width: 0;
        }

        .quick-action {
            border: 1px solid #dbeafe;
            border-radius: 12px;
            padding: 12px;
            background: #ffffff;
            text-decoration: none;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .quick-action:hover {
            border-color: #93c5fd;
            background: #f8fbff;
            transform: translateY(-1px);
        }

        .quick-action i {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #e5f2ff;
            color: #007AFF;
            font-size: 16px;
        }

        .activity-item {
            display: flex;
            gap: 10px;
            padding: 10px 0;
            border-bottom: 1px dashed #dbeafe;
        }

        .activity-item:last-child {
            border-bottom: 0;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 14px;
            flex-shrink: 0;
        }

        .activity-primary { background: #2563eb; }
        .activity-info { background: #0284c7; }
        .activity-success { background: #059669; }
        .activity-warning { background: #d97706; }

        @media (max-width: 768px) {
            .page-content {
                padding: 12px !important;
            }

            .page-header {
                margin-bottom: 20px;
            }

            .page-title {
                font-size: 22px;
                line-height: 1.25;
            }

            .stat-card {
                padding: 16px;
                margin-bottom: 12px;
            }

            .stat-value {
                font-size: 24px;
            }

            .stat-label {
                font-size: 12px;
            }

            .stat-icon {
                font-size: 34px;
                right: 14px;
                top: 14px;
            }

            .card-header {
                font-size: 14px;
                padding: 10px 14px;
            }

            .card-body {
                padding: 14px;
            }

            .quick-action {
                padding: 10px;
            }

            .quick-action i {
                width: 30px;
                height: 30px;
                font-size: 14px;
            }

            .quick-action .fw-semibold {
                font-size: 13px;
            }

            .quick-action small {
                font-size: 11px;
                line-height: 1.3;
                display: block;
            }

            .chart-wrap-line {
                height: 250px;
            }

            .chart-wrap-pie {
                height: 280px;
                max-width: 100%;
            }

            .activity-item {
                align-items: flex-start;
            }

        }

        @media (min-width: 576px) {
            .dashboard-shell .row > [class*='col-'] {
                padding-left: 6px;
                padding-right: 6px;
            }
        }

        @media (max-width: 575.98px) {
            .dashboard-grid-gap {
                row-gap: 0.75rem;
            }

            .dashboard-stat-col {
                width: 50%;
                padding-left: 4px !important;
                padding-right: 4px !important;
            }

            .stat-card {
                padding: 12px;
                margin-bottom: 8px;
                border-radius: 10px;
            }

            .stat-value {
                font-size: 20px;
                margin-bottom: 3px;
            }

            .stat-label {
                font-size: 11px;
            }

            .stat-icon {
                font-size: 24px;
                right: 10px;
                top: 10px;
            }

            .card-header.d-flex {
                flex-wrap: wrap;
                gap: 0.35rem;
            }

            .card-header.d-flex small {
                width: 100%;
            }


            .chart-wrap-line {
                height: 220px;
            }

            .chart-wrap-pie {
                height: 250px;
            }
        }

    </style>

    <div class="dashboard-shell">

    <div class="page-header">
        <h1 class="page-title">Selamat Datang, {{ auth()->user()->name }}!</h1>
        <p class="page-subtitle">Ringkasan operasional panel admin untuk hari ini</p>
    </div>

    <div class="row dashboard-grid-gap mb-2">
        <div class="col-6 col-sm-6 col-lg-3 dashboard-stat-col">
            <div class="stat-card">
                <div class="stat-value">{{ $totalUsers }}</div>
                <div class="stat-label">Total User</div>
                <div class="stat-icon"><i class="bi bi-people"></i></div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-lg-3 dashboard-stat-col">
            <div class="stat-card">
                <div class="stat-value">{{ $activeUsers }}</div>
                <div class="stat-label">User Aktif</div>
                <div class="stat-icon"><i class="bi bi-person-check"></i></div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-lg-3 dashboard-stat-col">
            <div class="stat-card">
                <div class="stat-value">{{ $publishedBeritas }}</div>
                <div class="stat-label">Berita Publish</div>
                <div class="stat-icon"><i class="bi bi-newspaper"></i></div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-lg-3 dashboard-stat-col">
            <div class="stat-card">
                <div class="stat-value">{{ $totalGaleris }}</div>
                <div class="stat-label">Total Galeri</div>
                <div class="stat-icon"><i class="bi bi-activity"></i></div>
            </div>
        </div>
    </div>

    <div class="row dashboard-grid-gap">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <i class="bi bi-lightning-charge me-2"></i>Quick Actions
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.beritas.create') }}" class="quick-action">
                            <i class="bi bi-plus-square"></i>
                            <div>
                                <div class="fw-semibold">Tambah Berita</div>
                                <small class="text-muted">Publikasikan informasi terbaru</small>
                            </div>
                        </a>
                        <a href="{{ route('admin.galeris.create') }}" class="quick-action">
                            <i class="bi bi-image"></i>
                            <div>
                                <div class="fw-semibold">Tambah Galeri</div>
                                <small class="text-muted">Unggah dokumentasi kegiatan</small>
                            </div>
                        </a>
                        <a href="{{ route('admin.guru-staffs.create') }}" class="quick-action">
                            <i class="bi bi-person-plus"></i>
                            <div>
                                <div class="fw-semibold">Tambah Guru/Staff</div>
                                <small class="text-muted">Perbarui data tenaga pendidik</small>
                            </div>
                        </a>
                        <a href="{{ route('admin.users.create') }}" class="quick-action">
                            <i class="bi bi-people-fill"></i>
                            <div>
                                <div class="fw-semibold">Tambah User Admin</div>
                                <small class="text-muted">Buat akun akses panel</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-clock-history me-2"></i>Aktivitas Terbaru</span>
                    <small class="text-muted">5 aktivitas terbaru</small>
                </div>
                <div class="card-body">
                    @forelse($recentActivities->take(5) as $activity)
                        <div class="activity-item">
                            <span class="activity-icon activity-{{ $activity['color'] }}">
                                <i class="bi {{ $activity['icon'] }}"></i>
                            </span>
                            <div>
                                <div class="fw-semibold" style="font-size: 13px;">{{ $activity['title'] }}</div>
                                <div class="text-muted" style="font-size: 13px;">{{ $activity['description'] }}</div>
                                <small class="text-muted">{{ optional($activity['time'])->diffForHumans() }}</small>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mb-0">Belum ada aktivitas terbaru.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <i class="bi bi-bar-chart-line me-2"></i>Grafik 7 Hari Terakhir
                </div>
                <div class="card-body">
                    <div class="chart-wrap chart-wrap-line">
                        <canvas id="contentChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header">
                    <i class="bi bi-pie-chart me-2"></i>Komposisi Konten
                </div>
                <div class="card-body">
                    <div class="chart-wrap chart-wrap-pie">
                        <canvas id="contentPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartLabels = @json($chartLabels);
        const chartBerita = @json($chartBerita);
        const chartGaleri = @json($chartGaleri);
        const chartUsers = @json($chartUsers);
        const isMobile = window.matchMedia('(max-width: 575.98px)').matches;

        const lineCtx = document.getElementById('contentChart');
        if (lineCtx) {
            new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: chartLabels,
                    datasets: [
                        {
                            label: 'Berita',
                            data: chartBerita,
                            borderColor: '#2563eb',
                            backgroundColor: 'rgba(37, 99, 235, 0.12)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.35
                        },
                        {
                            label: 'Galeri',
                            data: chartGaleri,
                            borderColor: '#0284c7',
                            backgroundColor: 'rgba(2, 132, 199, 0.12)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.35
                        },
                        {
                            label: 'User Baru',
                            data: chartUsers,
                            borderColor: '#0f766e',
                            backgroundColor: 'rgba(15, 118, 110, 0.12)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.35
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: { top: 4, right: 8, bottom: 0, left: 0 }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: isMobile ? 10 : 12,
                                padding: isMobile ? 10 : 14,
                                font: { size: isMobile ? 10 : 12 }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: true,
                                maxRotation: 0,
                                font: { size: isMobile ? 10 : 12 }
                            },
                            grid: {
                                display: !isMobile
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0,
                                font: { size: isMobile ? 10 : 12 }
                            }
                        }
                    }
                }
            });
        }

        const pieCtx = document.getElementById('contentPieChart');
        if (pieCtx) {
            new Chart(pieCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Berita', 'Galeri', 'Guru & Staff', 'Program', 'PPDB'],
                    datasets: [{
                        data: [{{ $totalBeritas }}, {{ $totalGaleris }}, {{ $totalGuruStaff }}, {{ $totalPrograms }}, {{ $totalPpdbItems }}],
                        backgroundColor: ['#2563eb', '#0284c7', '#0f766e', '#d97706', '#7c3aed'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: isMobile ? 10 : 12,
                                padding: isMobile ? 10 : 14,
                                font: { size: isMobile ? 10 : 12 },
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        }
                    },
                    cutout: isMobile ? '62%' : '70%'
                }
            });
        }

    </script>
@endsection
