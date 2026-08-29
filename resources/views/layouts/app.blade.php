<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('office.app_name'))</title>
    
    <!-- Inline Anti-FOUC Theme Script -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'system';
            let activeTheme = savedTheme;
            if (savedTheme === 'system') {
                activeTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }
            document.documentElement.setAttribute('data-bs-theme', activeTheme);
        })();
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            --stat-total-grad: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            --stat-pending-grad: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --stat-progress-grad: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            --stat-completed-grad: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --stat-high-grad: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            --stat-overdue-grad: linear-gradient(135deg, #ef4444 0%, #b91c1c 100%);
            
            --bg-body: #f8fafc;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            --card-bg: #ffffff;
            --card-border: #e2e8f0;
            --top-navbar-bg: #ffffff;
            --top-navbar-border: #e2e8f0;
            --sidebar-bg: #0f172a;
            --footer-bg: #ffffff;
            --footer-border: #e2e8f0;
            --text-main: #1e293b;
            --text-muted-custom: #64748b;
            --table-header-bg: #f8fafc;
            --table-header-text: #64748b;
        }

        [data-bs-theme="dark"] {
            --bg-body: #0b0f19;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            --card-bg: #131c2e;
            --card-border: #1e293b;
            --top-navbar-bg: #131c2e;
            --top-navbar-border: #1e293b;
            --sidebar-bg: #070b14;
            --footer-bg: #131c2e;
            --footer-border: #1e293b;
            --text-main: #f8fafc;
            --text-muted-custom: #94a3b8;
            --table-header-bg: #0f172a;
            --table-header-text: #94a3b8;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Sidebar Styling */
        #sidebar {
            width: var(--sidebar-width);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background: var(--sidebar-bg);
            color: #f8fafc;
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 4px 0 15px rgba(0,0,0,0.15);
        }

        #sidebar .brand-header {
            padding: 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            background: rgba(255,255,255,0.02);
        }

        #sidebar .nav-link {
            color: #94a3b8;
            padding: 0.85rem 1.5rem;
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            border-left: 4px solid transparent;
            transition: all 0.2s ease;
        }

        #sidebar .nav-link:hover {
            color: #ffffff;
            background: rgba(255,255,255,0.05);
            border-left-color: #6366f1;
        }

        #sidebar .nav-link.active {
            color: #ffffff;
            background: linear-gradient(90deg, rgba(99, 102, 241, 0.2) 0%, rgba(99, 102, 241, 0) 100%);
            border-left-color: #6366f1;
            font-weight: 600;
        }

        /* Main Content Wrapper */
        #main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        /* Top Navbar */
        .top-navbar {
            background: var(--top-navbar-bg);
            border-bottom: 1px solid var(--top-navbar-border);
            padding: 0.9rem 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        /* Cards and Elements */
        .card-custom {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease, background-color 0.3s ease, border-color 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.12), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
        }

        .stat-card {
            border: none;
            border-radius: 14px;
            color: #ffffff;
            position: relative;
            overflow: hidden;
            padding: 1.5rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
            transition: transform 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.3;
            position: absolute;
            right: 1.25rem;
            bottom: 1rem;
        }

        .stat-card.bg-total { background: var(--stat-total-grad); }
        .stat-card.bg-pending { background: var(--stat-pending-grad); }
        .stat-card.bg-progress { background: var(--stat-progress-grad); }
        .stat-card.bg-completed { background: var(--stat-completed-grad); }
        .stat-card.bg-high { background: var(--stat-high-grad); }
        .stat-card.bg-overdue { background: var(--stat-overdue-grad); }

        /* Badge Enhancements */
        .badge-priority-High { background-color: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }
        .badge-priority-Medium { background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .badge-priority-Low { background-color: #e0e7ff; color: #3730a3; border: 1px solid #c7d2fe; }

        .badge-status-Pending { background-color: #fffbebf5; color: #b45309; border: 1px solid #fcd34d; }
        .badge-status-In-Progress { background-color: #e0f2fe; color: #0369a1; border: 1px solid #7dd3fc; }
        .badge-status-Completed { background-color: #dcfce7; color: #15803d; border: 1px solid #86efac; }
        .badge-overdue { background-color: #dc2626; color: #ffffff; font-weight: 700; letter-spacing: 0.5px; }

        [data-bs-theme="dark"] .badge-priority-High { background-color: rgba(239, 68, 68, 0.2); color: #fca5a5; border-color: rgba(239, 68, 68, 0.4); }
        [data-bs-theme="dark"] .badge-priority-Medium { background-color: rgba(245, 158, 11, 0.2); color: #fde68a; border-color: rgba(245, 158, 11, 0.4); }
        [data-bs-theme="dark"] .badge-priority-Low { background-color: rgba(99, 102, 241, 0.2); color: #c7d2fe; border-color: rgba(99, 102, 241, 0.4); }

        [data-bs-theme="dark"] .badge-status-Pending { background-color: rgba(245, 158, 11, 0.25); color: #fde68a; border-color: rgba(245, 158, 11, 0.4); }
        [data-bs-theme="dark"] .badge-status-In-Progress { background-color: rgba(6, 182, 212, 0.25); color: #a5f3fc; border-color: rgba(6, 182, 212, 0.4); }
        [data-bs-theme="dark"] .badge-status-Completed { background-color: rgba(16, 185, 129, 0.25); color: #6ee7b7; border-color: rgba(16, 185, 129, 0.4); }

        /* Dark Mode Specific Table & Form Refinements */
        [data-bs-theme="dark"] .table-light {
            background-color: var(--table-header-bg) !important;
            color: var(--table-header-text) !important;
        }

        [data-bs-theme="dark"] .table-warning-subtle {
            background-color: rgba(245, 158, 11, 0.12) !important;
            color: #fde68a !important;
        }

        [data-bs-theme="dark"] .table-danger-subtle {
            background-color: rgba(239, 68, 68, 0.15) !important;
            color: #fca5a5 !important;
        }

        [data-bs-theme="dark"] .modal-content {
            background-color: #131c2e;
            border: 1px solid #1e293b;
            color: #f8fafc;
        }

        [data-bs-theme="dark"] .input-group-text {
            background-color: #0f172a !important;
            border-color: #334155 !important;
            color: #94a3b8 !important;
        }

        [data-bs-theme="dark"] .form-control,
        [data-bs-theme="dark"] .form-select {
            background-color: #0f172a;
            border-color: #334155;
            color: #f8fafc;
        }

        [data-bs-theme="dark"] .form-control:focus,
        [data-bs-theme="dark"] .form-select:focus {
            background-color: #0f172a;
            border-color: #6366f1;
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
        }

        .table > :not(caption) > * > * {
            padding: 0.95rem 1rem;
            vertical-align: middle;
        }

        footer {
            margin-top: auto;
            background: var(--footer-bg);
            border-top: 1px solid var(--footer-border);
            padding: 1.2rem 2rem;
            color: var(--text-muted-custom);
            font-size: 0.85rem;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        @media (max-width: 991.98px) {
            #sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            #sidebar.active {
                margin-left: 0;
            }
            #main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content Area -->
    <div id="main-content">
        <!-- Top Navbar -->
        @include('partials.navbar')

        <!-- Main Body Content -->
        <main class="container-fluid p-4">
            @include('partials.flash')
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
                <div>
                    &copy; {{ date('Y') }} <strong>{{ config('office.company_name') }}</strong> | {{ config('office.app_name') }}. Email: <a href="mailto:{{ config('office.company_email') }}" class="text-decoration-none text-secondary">{{ config('office.company_email') }}</a>
                </div>
                @if (app()->environment('local', 'development', 'testing'))
                    <div>
                        <span class="badge bg-warning text-dark px-2.5 py-1.5 fw-semibold">
                            <i class="bi bi-code-slash me-1"></i> Environment: Development
                        </span>
                    </div>
                @endif
            </div>
        </footer>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Theme Controller Script -->
    <script>
        function setTheme(mode) {
            localStorage.setItem('theme', mode);
            let activeTheme = mode;
            if (mode === 'system') {
                activeTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }
            document.documentElement.setAttribute('data-bs-theme', activeTheme);
            updateThemeUI(mode, activeTheme);
        }

        function updateThemeUI(storedMode, activeTheme) {
            const iconEl = document.getElementById('theme-icon-active');
            const textEl = document.getElementById('theme-text-active');
            
            document.querySelectorAll('[data-theme-value]').forEach(btn => {
                const val = btn.getAttribute('data-theme-value');
                if (val === storedMode) {
                    btn.classList.add('active', 'fw-bold');
                } else {
                    btn.classList.remove('active', 'fw-bold');
                }
            });

            if (!iconEl) return;

            if (storedMode === 'dark') {
                iconEl.className = 'bi bi-moon-stars-fill text-warning';
                if (textEl) textEl.textContent = 'Dark';
            } else if (storedMode === 'light') {
                iconEl.className = 'bi bi-sun-fill text-warning';
                if (textEl) textEl.textContent = 'Bright';
            } else {
                iconEl.className = 'bi bi-display text-primary';
                if (textEl) textEl.textContent = 'System (' + (activeTheme === 'dark' ? 'Dark' : 'Bright') + ')';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const storedMode = localStorage.getItem('theme') || 'system';
            let activeTheme = storedMode;
            if (storedMode === 'system') {
                activeTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            }
            updateThemeUI(storedMode, activeTheme);

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if ((localStorage.getItem('theme') || 'system') === 'system') {
                    const newTheme = e.matches ? 'dark' : 'light';
                    document.documentElement.setAttribute('data-bs-theme', newTheme);
                    updateThemeUI('system', newTheme);
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
