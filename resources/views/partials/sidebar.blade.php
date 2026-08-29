<nav id="sidebar">
    <div class="brand-header d-flex align-items-center gap-2">
        <div class="rounded-3 bg-primary text-white d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; font-weight: 700; background: linear-gradient(135deg, #6366f1, #4f46e5) !important;">
            <i class="bi bi-check2-square fs-5"></i>
        </div>
        <div>
            <h6 class="mb-0 fw-bold text-white" style="letter-spacing: -0.3px;">Office Tracker</h6>
            <small class="text-muted" style="font-size: 0.72rem;">Task Management</small>
        </div>
    </div>

    <div class="py-3">
        <div class="px-3 mb-2 text-uppercase text-muted fw-bold" style="font-size: 0.68rem; letter-spacing: 1px;">
            Main Menu
        </div>
        <ul class="nav flex-column list-unstyled">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('tasks.index') || request()->routeIs('tasks.show') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                    <i class="bi bi-list-task"></i>
                    <span>Tasks</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('tasks.create') ? 'active' : '' }}" href="{{ route('tasks.create') }}">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span>Add Task</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
