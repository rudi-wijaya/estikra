@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Selamat Datang, {{ auth()->user()->name }}!</h1>
        <p class="page-subtitle">Kelola data aplikasi Anda dari sini</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-30">
        <div class="col-6 col-lg-3">
            <div class="stat-card primary">
                <div class="stat-value">{{ $totalUsers ?? 0 }}</div>
                <div class="stat-label">Total User</div>
                <div class="stat-icon"><i class="bi bi-people"></i></div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-value">100%</div>
                <div class="stat-label">Sistem Normal</div>
                <div class="stat-icon"><i class="bi bi-activity"></i></div>
            </div>
        </div>
    </div>

    <!-- Information Cards -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-info-circle me-2"></i>Tentang Sistem
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <strong>Nama Aplikasi:</strong> {{ config('app.name', 'Estikra') }}
                    </p>
                    <p class="mb-2">
                        <strong>Versi:</strong> 1.0.0
                    </p>
                    <p class="mb-0">
                        <strong>Terakhir Update:</strong> {{ now()->format('d/m/Y H:i') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
