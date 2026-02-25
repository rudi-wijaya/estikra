<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?> - Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
            --primary-color: #3498db;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background-color: var(--sidebar-bg);
            color: #ecf0f1;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-title {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
        }

        .sidebar-subtitle {
            font-size: 12px;
            color: #95a5a6;
            margin-top: 5px;
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
            color: #bdc3c7;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover {
            background-color: var(--sidebar-hover);
            color: #fff;
            border-left-color: var(--primary-color);
            padding-left: 18px;
        }

        .sidebar-menu a.active {
            background-color: var(--sidebar-hover);
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }

        .sidebar-menu i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 18px;
        }

        .sidebar-divider {
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 15px 0;
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
            border-bottom: 1px solid #e9ecef;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 600;
            color: var(--sidebar-bg);
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .navbar-item {
            cursor: pointer;
            color: #2c3e50;
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
            padding: 8px 15px;
            border-radius: 20px;
            background-color: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background-color: #e9ecef;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color) 0%, #2980b9 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
        }

        .user-name {
            font-size: 14px;
            color: var(--sidebar-bg);
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
            font-size: 28px;
            font-weight: 700;
            color: var(--sidebar-bg);
            margin-bottom: 5px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #7f8c8d;
        }

        /* Cards */
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        .card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
            border-radius: 10px 10px 0 0 !important;
            font-weight: 600;
            color: var(--sidebar-bg);
        }

        /* Dashboard Stats */
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .stat-card.primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        .stat-card.success {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            box-shadow: 0 4px 12px rgba(46, 204, 113, 0.3);
        }

        .stat-card.warning {
            background: linear-gradient(135deg, #f39c12 0%, #d68910 100%);
            box-shadow: 0 4px 12px rgba(243, 156, 18, 0.3);
        }

        .stat-card.danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
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
            background-color: #f8f9fa;
        }

        .table thead th {
            font-weight: 600;
            color: var(--sidebar-bg);
            border: none;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Buttons */
        .btn {
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
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
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: var(--sidebar-bg);
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
            border-left-color: #3498db;
            background-color: #f0f9ff;
            color: #0c2340;
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
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="<?php echo e(request()->routeIs('admin.users.*') ? 'active' : ''); ?>">
                        <i class="bi bi-people"></i>
                        <span>User</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.settings.index')); ?>" class="<?php echo e(request()->routeIs('admin.settings.*') ? 'active' : ''); ?>">
                        <i class="bi bi-gear"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.beritas.index')); ?>" class="<?php echo e(request()->routeIs('admin.beritas.*') ? 'active' : ''); ?>">
                        <i class="bi bi-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.galeris.index')); ?>" class="<?php echo e(request()->routeIs('admin.galeris.*') ? 'active' : ''); ?>">
                        <i class="bi bi-images"></i>
                        <span>Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.guru-staffs.index')); ?>" class="<?php echo e(request()->routeIs('admin.guru-staffs.*') ? 'active' : ''); ?>">
                        <i class="bi bi-people-fill"></i>
                        <span>Guru & Staff</span>
                    </a>
                </li>
                <div class="sidebar-divider"></div>
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
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
                    <button class="btn btn-link" id="sidebarToggle" style="color: #2c3e50; padding: 4px 8px;">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="navbar-brand">
                        <?php echo $__env->yieldContent('page_title', 'Dashboard'); ?>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="navbar-item" title="Notifikasi">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="user-profile">
                        <div class="user-avatar">
                            <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

                        </div>
                        <div class="user-name"><?php echo e(auth()->user()->name); ?></div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="page-content">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
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

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\estikra\resources\views/layouts/admin.blade.php ENDPATH**/ ?>