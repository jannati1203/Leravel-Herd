@extends('layouts.app')

@section('title', 'Tasks List - ' . config('office.app_name'))

@section('content')
<div class="mb-4 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
    <div>
        <h4 class="fw-bold mb-1" style="letter-spacing: -0.5px;">All Office Tasks</h4>
        <p class="text-muted mb-0">Search, filter by status or priority, update, and manage your team's workload.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        @if(config('office.enable_task_export'))
            <a href="{{ route('tasks.export', request()->all()) }}" class="btn btn-outline-success d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Export Tasks</span>
            </a>
        @endif
        <a href="{{ route('tasks.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm px-3 py-2" style="background: linear-gradient(135deg, #6366f1, #4f46e5); border: none;">
            <i class="bi bi-plus-lg"></i>
            <span>Add Task</span>
        </a>
    </div>
</div>

<!-- Search Bar & Multi-Filter Card -->
<div class="card card-custom p-3 mb-4">
    <form action="{{ route('tasks.index') }}" method="GET" class="row g-3 align-items-end">
        <!-- Search Task -->
        <div class="col-12 col-md-4">
            <label class="form-label fw-semibold text-muted small mb-1">Search Task</label>
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 text-muted">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" 
                       name="search" 
                       class="form-control border-start-0 ps-0" 
                       placeholder="Search title or assigned person..." 
                       value="{{ $search }}">
            </div>
        </div>

        <!-- Status Filter -->
        <div class="col-12 col-sm-6 col-md-3">
            <label class="form-label fw-semibold text-muted small mb-1">Status Filter</label>
            <select name="status" class="form-select">
                <option value="All" {{ $status == 'All' ? 'selected' : '' }}>All Statuses</option>
                <option value="Pending" {{ $status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ $status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <!-- Priority Filter -->
        <div class="col-12 col-sm-6 col-md-3">
            <label class="form-label fw-semibold text-muted small mb-1">Priority Filter</label>
            <select name="priority" class="form-select">
                <option value="All" {{ $priority == 'All' ? 'selected' : '' }}>All Priorities</option>
                <option value="Low" {{ $priority == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $priority == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <!-- Action Buttons -->
        <div class="col-12 col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-primary w-100" style="background: #4f46e5; border-color: #4f46e5;">
                Apply Filters
            </button>
            @if($search !== '' || $status !== 'All' || $priority !== 'All')
                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary" title="Reset Filters">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Tasks Table -->
<div class="card card-custom p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr class="text-uppercase text-muted" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                    <th>Task</th>
                    <th>Assigned To</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Created Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr class="{{ $task->isOverdue() ? 'table-danger-subtle' : ($task->isDueSoon() ? 'table-warning-subtle' : '') }}">
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ route('tasks.show', $task) }}" class="fw-semibold text-decoration-none">
                                    {{ $task->title }}
                                </a>
                                @if($task->isOverdue())
                                    <span class="badge bg-danger text-white rounded-pill px-2 py-0.5" style="font-size: 0.65rem; letter-spacing: 0.5px;">OVERDUE</span>
                                @elseif($task->isDueSoon())
                                    <span class="badge bg-warning text-dark rounded-pill px-2 py-0.5" style="font-size: 0.65rem; letter-spacing: 0.5px;">DUE SOON</span>
                                @endif
                            </div>
                            @if($task->description)
                                <small class="text-muted text-truncate d-block" style="max-width: 280px;">{{ $task->description }}</small>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle bg-light border text-primary d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.8rem;">
                                    {{ strtoupper(substr($task->assigned_to, 0, 1)) }}
                                </div>
                                <span class="fw-medium">{{ $task->assigned_to }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge rounded-pill badge-priority-{{ $task->priority }} px-2.5 py-1.5">
                                {{ $task->priority }}
                            </span>
                        </td>
                        <td>
                            <span class="badge rounded-pill badge-status-{{ str_replace(' ', '-', $task->status) }} px-2.5 py-1.5">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td class="{{ $task->isOverdue() ? 'text-danger fw-bold' : 'text-muted fw-medium' }}" style="font-size: 0.88rem;">
                            {{ $task->due_date ? $task->due_date->format('d M Y') : 'N/A' }}
                        </td>
                        <td class="text-muted" style="font-size: 0.85rem;">
                            {{ $task->created_at->format('d M Y') }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-outline-secondary" title="View Details">
                                    <i class="bi bi-eye-fill"></i> View
                                </a>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-primary" title="Edit Task">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button type="button" 
                                        class="btn btn-outline-danger" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal{{ $task->id }}" 
                                        title="Delete Task">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
                            </div>

                            <!-- Delete Modal for Task -->
                            <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header border-0 pb-0">
                                            <h5 class="modal-title fw-bold text-danger" id="deleteModalLabel{{ $task->id }}">
                                                <i class="bi bi-exclamation-circle-fill me-1"></i> Confirm Delete
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start py-3">
                                            <p class="mb-1 fw-semibold fs-6">Are you sure you want to delete this task?</p>
                                            <p class="text-muted small mb-0">"{{ $task->title }}" assigned to <strong>{{ $task->assigned_to }}</strong> will be permanently removed.</p>
                                        </div>
                                        <div class="modal-footer border-0 pt-0">
                                            <button type="button" class="btn btn-light border px-3" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger px-4">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-search fs-1 text-muted d-block mb-3"></i>
                            <h6 class="fw-bold text-secondary">No Tasks Found</h6>
                            <p class="text-muted small">No tasks match your current search and filter criteria.</p>
                            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-sm mt-2 me-1">Reset Filters</a>
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm mt-2">Add New Task</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination preserving query string -->
    <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="text-muted small">
            Showing {{ $tasks->firstItem() ?? 0 }} to {{ $tasks->lastItem() ?? 0 }} of {{ $tasks->total() }} tasks
        </div>
        <div>
            {{ $tasks->links() }}
        </div>
    </div>
</div>
@endsection
