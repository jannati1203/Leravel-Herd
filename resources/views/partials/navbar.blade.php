<div class="top-navbar d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-3">
        <button class="btn btn-outline-secondary d-lg-none border shadow-sm" type="button" onclick="document.getElementById('sidebar').classList.toggle('active')">
            <i class="bi bi-list fs-5"></i>
        </button>
        <span class="fw-bold fs-5 mb-0" style="letter-spacing: -0.4px;">
            {{ config('office.app_name') }}
        </span>
    </div>

    <div class="d-flex align-items-center gap-3">
        <!-- Bright / Dark Mode Switcher Dropdown -->
        <div class="dropdown me-1">
            <button class="btn btn-outline-secondary btn-sm dropdown-toggle d-flex align-items-center gap-2 rounded-pill px-3 py-1.5 shadow-sm" type="button" id="themeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i id="theme-icon-active" class="bi bi-sun-fill text-warning"></i>
                <span id="theme-text-active" class="fw-semibold small">Bright</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="themeDropdown" style="min-width: 165px; border-radius: 12px;">
                <li>
                    <button class="dropdown-item d-flex align-items-center gap-2 py-2" type="button" data-theme-value="light" onclick="setTheme('light')">
                        <i class="bi bi-sun-fill text-warning fs-6"></i>
                        <span>Bright Mode</span>
                    </button>
                </li>
                <li>
                    <button class="dropdown-item d-flex align-items-center gap-2 py-2" type="button" data-theme-value="dark" onclick="setTheme('dark')">
                        <i class="bi bi-moon-stars-fill text-warning fs-6"></i>
                        <span>Dark Mode</span>
                    </button>
                </li>
                <li><hr class="dropdown-divider my-1"></li>
                <li>
                    <button class="dropdown-item d-flex align-items-center gap-2 py-2" type="button" data-theme-value="system" onclick="setTheme('system')">
                        <i class="bi bi-display text-primary fs-6"></i>
                        <span>System Preference</span>
                    </button>
                </li>
            </ul>
        </div>

        <div class="d-none d-sm-block text-end me-1">
            <small class="text-muted d-block" style="font-size: 0.75rem;">Logged in as</small>
            <span class="fw-semibold" style="font-size: 0.88rem;">Admin Manager</span>
        </div>
        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 40px; height: 40px; background: linear-gradient(135deg, #6366f1, #4f46e5) !important;">
            <i class="bi bi-person-fill fs-5"></i>
        </div>
    </div>
</div>

