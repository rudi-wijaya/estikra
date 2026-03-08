<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg: #5a74e8;
            --sidebar-hover: #6b83ec;
            --sidebar-active: #8fa0f2;
            --primary-color: #5a74e8;
            --primary-hover: #4a63d8;
            --primary-shadow: rgba(90, 116, 232, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            background-color: #f2f3fb;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #4a63d8 0%, #5a74e8 50%, #6b83ec 100%);
            color: #e8ecfd;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            padding-top: 20px;
            box-shadow: 4px 0 20px rgba(90, 116, 232, 0.3);
        }

        .sidebar-header {
            padding: 24px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            margin-bottom: 20px;
            background: rgba(255,255,255,0.05);
        }

        .sidebar-title {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            letter-spacing: 0.5px;
        }

        .sidebar-subtitle {
            font-size: 11px;
            color: #bae6fd;
            margin-top: 4px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #e0f2fe;
            text-decoration: none;
            transition: all 0.25s ease;
            border-left: 3px solid transparent;
            border-radius: 0 8px 8px 0;
            margin: 2px 8px 2px 0;
            font-size: 14px;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background-color: rgba(255, 255, 255, 0.18);
            color: #fff;
            border-left-color: #bae6fd;
        }

        .sidebar-menu a.active {
            background-color: rgba(255, 255, 255, 0.25);
            color: #fff;
            border-left-color: #fff;
            font-weight: 600;
        }

        .sidebar-menu i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 18px;
        }

        .sidebar-divider {
            height: 1px;
            background-color: rgba(255, 255, 255, 0.12);
            margin: 12px 16px;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Top Navigation */
        .top-navbar {
            background-color: #fff;
            border-bottom: 1px solid #c7d2fa;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(90, 116, 232, 0.08);
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-brand {
            font-size: 18px;
            font-weight: 600;
            color: #5a74e8;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .navbar-item {
            cursor: pointer;
            color: #5a74e8;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .navbar-item:hover {
            color: var(--primary-color);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 7px 14px;
            border-radius: 20px;
            background-color: #eef0fd;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background-color: #dde1fb;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, #5a74e8 0%, #6b83ec 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 500;
            color: #5a74e8;
        }

        /* Page Content */
        .page-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
            color: #5a74e8;
            margin-bottom: 5px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #7f8c8d;
        }

        /* Cards */
        .card {
            border: none;
            box-shadow: 0 2px 12px rgba(37, 99, 235, 0.07);
            border-radius: 12px;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        .card:hover {
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.13);
        }

        .card-header {
            background-color: #f0f2fd;
            border-bottom: 1px solid #c7d2fa;
            border-radius: 12px 12px 0 0 !important;
            font-weight: 600;
            color: #5a74e8;
        }

        /* Dashboard Stats */
        .stat-card {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.3);
        }

        .stat-card.primary {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.3);
        }

        .stat-card.success {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            box-shadow: 0 4px 16px rgba(5, 150, 105, 0.3);
        }

        .stat-card.warning {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            box-shadow: 0 4px 16px rgba(217, 119, 6, 0.3);
        }

        .stat-card.danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            box-shadow: 0 4px 16px rgba(220, 38, 38, 0.3);
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }

        .stat-icon {
            font-size: 48px;
            opacity: 0.2;
            text-align: right;
            position: absolute;
            right: 25px;
            top: 25px;
        }

        /* Table */
        .table {
            font-size: 14px;
        }

        .table thead {
            background-color: #f0f2fd;
        }

        .table thead th {
            font-weight: 600;
            color: #5a74e8;
            border: none;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f0f2fd;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.25s ease;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px var(--primary-shadow);
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 12px;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Forms */
        .form-control, .form-select {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(90, 116, 232, 0.2);
        }

        .form-label {
            font-weight: 600;
            color: #5a74e8;
            margin-bottom: 8px;
        }

        /* Overlay for mobile sidebar */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 260px;
                position: fixed;
                left: -260px;
                z-index: 1000;
                transition: left 0.3s ease;
            }

            .sidebar.show {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .page-content {
                padding: 15px;
            }

            .top-navbar {
                padding: 12px 16px;
            }

            .navbar-brand {
                font-size: 16px;
            }

            .page-title {
                font-size: 20px;
            }

            .user-name {
                display: none;
            }

            .stat-value {
                font-size: 24px;
            }

            .table-responsive {
                font-size: 13px;
            }

            #sidebarToggle {
                display: inline-flex !important;
            }
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Alert */
        .alert {
            border: none;
            border-radius: 8px;
            border-left: 4px solid;
        }

        .alert-success {
            border-left-color: #2ecc71;
            background-color: #f0fdf4;
            color: #065f46;
        }

        .alert-danger {
            border-left-color: #e74c3c;
            background-color: #fef2f2;
            color: #7f1d1d;
        }

        .alert-warning {
            border-left-color: #f39c12;
            background-color: #fffbeb;
            color: #78350f;
        }

        .alert-info {
            border-left-color: #5a74e8;
            background-color: #f0f2fd;
            color: #3a52c4;
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-title">
                    <i class="bi bi-shield-lock"></i> Admin
                </div>
                <div class="sidebar-subtitle">Dashboard</div>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <span>User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="bi bi-gear"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.beritas.index') }}" class="{{ request()->routeIs('admin.beritas.*') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galeris.index') }}" class="{{ request()->routeIs('admin.galeris.*') ? 'active' : '' }}">
                        <i class="bi bi-images"></i>
                        <span>Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.guru-staffs.index') }}" class="{{ request()->routeIs('admin.guru-staffs.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Guru & Staff</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.ppdb.index') }}" class="{{ request()->routeIs('admin.ppdb.*') ? 'active' : '' }}">
                        <i class="bi bi-person-plus-fill"></i>
                        <span>PPDB</span>
                    </a>
                </li>
                <div class="sidebar-divider"></div>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:void(0)" onclick="event.currentTarget.closest('form').submit()">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navigation -->
            <nav class="top-navbar">
                <div class="navbar-left">
                    <button class="btn btn-link" id="sidebarToggle" style="color: #5a74e8; padding: 4px 8px;">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="navbar-brand">
                        @yield('page_title', 'Dashboard')
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="navbar-item" title="Notifikasi">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="user-profile">
                        <div class="user-avatar">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="user-name">{{ auth()->user()->name }}</div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="page-content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.add('show');
            sidebarOverlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        sidebarToggle?.addEventListener('click', function() {
            if (sidebar.classList.contains('show')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        sidebarOverlay?.addEventListener('click', closeSidebar);

        // Close sidebar on larger screens
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                closeSidebar();
            }
        });

        // Hide toggle on desktop, show on mobile
        function updateToggleVisibility() {
            if (sidebarToggle) {
                sidebarToggle.style.display = window.innerWidth <= 768 ? 'inline-flex' : 'none';
            }
        }
        updateToggleVisibility();
        window.addEventListener('resize', updateToggleVisibility);
    </script>

    @yield('scripts')
</body>
</html>
