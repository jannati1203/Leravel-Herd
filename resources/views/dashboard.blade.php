@extends('layouts.app')

@section('title', 'Dashboard - ' . config('office.app_name'))

@section('content')
<div class="mb-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div>
        <h4 class="fw-bold mb-1" style="letter-spacing: -0.5px;">Dashboard Overview</h4>
        <p class="text-muted mb-0">Track workload statistics, task completion rates, recent activities, and upcoming deadlines.</p>
    </div>
    <div>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2" style="background: linear-gradient(135deg, #6366f1, #4f46e5); border: none;">
            <i class="bi bi-plus-lg"></i>
            <span>Add New Task</span>
        </a>
    </div>
</div>

<!-- Section A: Main Statistic Cards -->
<div class="row g-3 mb-4">
    <!-- Total Tasks -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
        <div class="stat-card bg-total">
            <div class="text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.5px; opacity: 0.9;">Total Tasks</div>
            <div class="fs-2 fw-extrabold my-1">{{ $stats['total'] }}</div>
            <div style="font-size: 0.75rem; opacity: 0.85;">All system tasks</div>
            <i class="bi bi-layers-fill stat-icon"></i>
        </div>
    </div>

    <!-- Pending -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
        <div class="stat-card bg-pending">
            <div class="text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.5px; opacity: 0.9;">Pending</div>
            <div class="fs-2 fw-extrabold my-1">{{ $stats['pending'] }}</div>
            <div style="font-size: 0.75rem; opacity: 0.85;">Awaiting execution</div>
            <i class="bi bi-clock-history stat-icon"></i>
        </div>
    </div>

    <!-- In Progress -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
        <div class="stat-card bg-progress">
            <div class="text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.5px; opacity: 0.9;">In Progress</div>
            <div class="fs-2 fw-extrabold my-1">{{ $stats['in_progress'] }}</div>
            <div style="font-size: 0.75rem; opacity: 0.85;">Currently active</div>
            <i class="bi bi-arrow-repeat stat-icon"></i>
        </div>
    </div>

    <!-- Completed -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
        <div class="stat-card bg-completed">
            <div class="text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.5px; opacity: 0.9;">Completed</div>
            <div class="fs-2 fw-extrabold my-1">{{ $stats['completed'] }}</div>
            <div style="font-size: 0.75rem; opacity: 0.85;">Finished tasks</div>
            <i class="bi bi-check-circle-fill stat-icon"></i>
        </div>
    </div>

    <!-- High Priority -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
        <div class="stat-card bg-high">
            <div class="text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.5px; opacity: 0.9;">High Priority</div>
            <div class="fs-2 fw-extrabold my-1">{{ $stats['high'] }}</div>
            <div style="font-size: 0.75rem; opacity: 0.85;">High importance</div>
            <i class="bi bi-exclamation-circle-fill stat-icon"></i>
        </div>
    </div>

    <!-- Overdue Tasks Card -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-2">
        <div class="stat-card bg-overdue">
            <div class="text-uppercase fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.5px; opacity: 0.9;">Overdue Tasks</div>
            <div class="fs-2 fw-extrabold my-1">{{ $stats['overdue'] }}</div>
            <div style="font-size: 0.75rem; opacity: 0.85;">Past due date</div>
            <i class="bi bi-exclamation-triangle-fill stat-icon"></i>
        </div>
    </div>
</div>

<!-- Section B: Task Statistics (Percentages & Progress Bars) -->
<div class="card card-custom p-4 mb-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h5 class="fw-bold mb-0">Task Completion Statistics</h5>
            <small class="text-muted">Dynamic breakdown of tasks based on status ratio</small>
        </div>
        <span class="badge bg-light text-dark border px-3 py-1.5 fw-semibold">
            Total Workload: {{ $stats['total'] }} Tasks
        </span>
    </div>

    <div class="row g-4">
        <!-- Completed Progress Bar -->
        <div class="col-12 col-md-4">
            <div class="p-3 border rounded-3 bg-light">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold text-success"><i class="bi bi-check-circle-fill me-1"></i> Completed</span>
                    <span class="fw-extrabold fs-5 text-success">{{ $stats['completed_pct'] }}%</span>
                </div>
                <div class="progress" style="height: 12px; background-color: #e2e8f0;">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $stats['completed_pct'] }}%;" aria-valuenow="{{ $stats['completed_pct'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="mt-2 text-muted small">
                    {{ $stats['completed'] }} of {{ $stats['total'] }} tasks completed
                </div>
            </div>
        </div>

        <!-- In Progress Progress Bar -->
        <div class="col-12 col-md-4">
            <div class="p-3 border rounded-3 bg-light">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold text-info"><i class="bi bi-arrow-repeat me-1"></i> In Progress</span>
                    <span class="fw-extrabold fs-5 text-info">{{ $stats['in_progress_pct'] }}%</span>
                </div>
                <div class="progress" style="height: 12px; background-color: #e2e8f0;">
                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $stats['in_progress_pct'] }}%;" aria-valuenow="{{ $stats['in_progress_pct'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="mt-2 text-muted small">
                    {{ $stats['in_progress'] }} of {{ $stats['total'] }} tasks active
                </div>
            </div>
        </div>

        <!-- Pending Progress Bar -->
        <div class="col-12 col-md-4">
            <div class="p-3 border rounded-3 bg-light">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="fw-bold text-warning"><i class="bi bi-clock-history me-1"></i> Pending</span>
                    <span class="fw-extrabold fs-5 text-warning">{{ $stats['pending_pct'] }}%</span>
                </div>
                <div class="progress" style="height: 12px; background-color: #e2e8f0;">
                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $stats['pending_pct'] }}%;" aria-valuenow="{{ $stats['pending_pct'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="mt-2 text-muted small">
                    {{ $stats['pending'] }} of {{ $stats['total'] }} tasks pending
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Section C: Due Soon Tasks (Next 3 Days) -->
    <div class="col-12 col-lg-6">
        <div class="card card-custom p-4 h-100 border-warning" style="border-width: 1.5px;">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-exclamation-circle-fill text-warning fs-4"></i>
                    <div>
                        <h5 class="fw-bold mb-0">Due Soon</h5>
                        <small class="text-muted">Tasks due within the next 3 days</small>
                    </div>
                </div>
                <span class="badge bg-warning text-dark rounded-pill px-3 py-1.5 fw-bold" style="font-size: 0.75rem;">
                    DUE SOON ({{ count($dueSoonTasks) }})
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                            <th>Task</th>
                            <th>Assigned To</th>
                            <th>Due Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dueSoonTasks as $task)
                            <tr class="table-warning-subtle">
                                <td>
                                    <a href="{{ route('tasks.show', $task) }}" class="fw-bold text-decoration-none">
                                        {{ $task->title }}
                                    </a>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $task->assigned_to }}</span>
                                </td>
                                <td class="fw-bold">
                                    <i class="bi bi-calendar-event me-1 text-warning"></i>
                                    {{ $task->due_date ? $task->due_date->format('d M') : 'N/A' }}
                                </td>
                                <td>
                                    <span class="badge rounded-pill badge-status-{{ str_replace(' ', '-', $task->status) }}">
                                        {{ $task->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <i class="bi bi-check2-circle fs-3 d-block mb-2 text-success"></i>
                                    No tasks due within the next 3 days.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Section D: Recent Tasks (Latest 5 Tasks) -->
    <div class="col-12 col-lg-6">
        <div class="card card-custom p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <h5 class="fw-bold mb-0">Recent Tasks</h5>
                    <small class="text-muted">Latest 5 tasks added to the system</small>
                </div>
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                    View All <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                            <th>Task</th>
                            <th>Assigned To</th>
                            <th>Priority</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentTasks as $task)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-1">
                                        <a href="{{ route('tasks.show', $task) }}" class="fw-semibold text-decoration-none">
                                            {{ $task->title }}
                                        </a>
                                        @if($task->isOverdue())
                                            <span class="badge bg-danger text-white rounded-pill px-1.5 py-0.5" style="font-size: 0.6rem;">OVERDUE</span>
                                        @elseif($task->isDueSoon())
                                            <span class="badge bg-warning text-dark rounded-pill px-1.5 py-0.5" style="font-size: 0.6rem;">DUE SOON</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $task->assigned_to }}</span>
                                </td>
                                <td>
                                    <span class="badge rounded-pill badge-priority-{{ $task->priority }}">
                                        {{ $task->priority }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge rounded-pill badge-status-{{ str_replace(' ', '-', $task->status) }}">
                                        {{ $task->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-3 d-block mb-2 text-secondary"></i>
                                    No recent tasks found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Section E: Overdue Tasks Alert Section (if any overdue tasks exist) -->
@if(count($overdueTasks) > 0)
    <div class="card card-custom border-danger border-2 p-4" style="background-color: #fff5f5;">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill text-danger fs-4"></i>
                <h5 class="fw-bold text-danger mb-0">Overdue Tasks Attention Required</h5>
            </div>
            <span class="badge bg-danger rounded-pill px-3 py-2 fs-6">
                {{ count($overdueTasks) }} OVERDUE
            </span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 bg-white rounded-3 shadow-sm">
                <thead class="table-light">
                    <tr class="text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                        <th>Task</th>
                        <th>Assigned To</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($overdueTasks as $task)
                        <tr class="table-danger-subtle">
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('tasks.show', $task) }}" class="fw-bold text-dark text-decoration-none">
                                        {{ $task->title }}
                                    </a>
                                    <span class="badge bg-danger text-white rounded-pill px-2 py-1" style="font-size: 0.68rem;">OVERDUE</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-danger-subtle border text-danger d-flex align-items-center justify-content-center fw-bold" style="width: 28px; height: 28px; font-size: 0.75rem;">
                                        {{ strtoupper(substr($task->assigned_to, 0, 1)) }}
                                    </div>
                                    <span class="fw-medium">{{ $task->assigned_to }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge rounded-pill badge-priority-{{ $task->priority }}">
                                    {{ $task->priority }}
                                </span>
                            </td>
                            <td>
                                <span class="badge rounded-pill badge-status-{{ str_replace(' ', '-', $task->status) }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td class="text-danger fw-bold">
                                <i class="bi bi-calendar-x me-1"></i> {{ $task->due_date ? $task->due_date->format('d M Y') : 'N/A' }}
                            </td>
                            <td>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-pencil-square"></i> Resolve / Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
