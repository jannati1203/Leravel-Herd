@extends('layouts.app')

@section('title', $task->title . ' - Task Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-9">
        <div class="mb-4 d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
            <div>
                <a href="{{ route('tasks.index') }}" class="text-decoration-none text-muted small fw-semibold">
                    <i class="bi bi-arrow-left me-1"></i> Back to All Tasks
                </a>
                <h4 class="fw-bold mt-1 mb-0" style="letter-spacing: -0.5px;">Task Details</h4>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-primary shadow-sm px-3">
                    <i class="bi bi-pencil-square me-1"></i> Edit Task
                </a>
                <button type="button" 
                        class="btn btn-outline-danger shadow-sm px-3" 
                        data-bs-toggle="modal" 
                        data-bs-target="#deleteModal">
                    <i class="bi bi-trash-fill me-1"></i> Delete
                </button>
            </div>
        </div>

        <!-- Task Main Card -->
        <div class="card card-custom p-4 mb-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3 pb-3 border-bottom">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge rounded-pill badge-status-{{ str_replace(' ', '-', $task->status) }} px-3 py-2 fs-6">
                        <i class="bi bi-circle-fill me-1" style="font-size: 0.6rem;"></i> {{ $task->status }}
                    </span>
                    <span class="badge rounded-pill badge-priority-{{ $task->priority }} px-3 py-2 fs-6">
                        Priority: {{ $task->priority }}
                    </span>
                </div>
                <div class="text-muted small">
                    Task ID: <strong>#{{ $task->id }}</strong>
                </div>
            </div>

            <h3 class="fw-bold text-dark mb-3" style="letter-spacing: -0.5px;">
                {{ $task->title }}
            </h3>

            <div class="mb-4">
                <h6 class="fw-semibold text-uppercase text-muted" style="font-size: 0.78rem; letter-spacing: 0.5px;">Description</h6>
                <div class="bg-light rounded-3 p-3 text-secondary" style="white-space: pre-line; min-height: 80px; font-size: 0.95rem;">
                    {{ $task->description ?: 'No detailed description provided for this task.' }}
                </div>
            </div>

            <div class="row g-3 pt-2">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="border rounded-3 p-3">
                        <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.72rem; font-weight: 600;">Assigned To</small>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: 0.85rem; background: linear-gradient(135deg, #6366f1, #4f46e5) !important;">
                                {{ strtoupper(substr($task->assigned_to, 0, 1)) }}
                            </div>
                            <span class="fw-bold text-dark">{{ $task->assigned_to }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="border rounded-3 p-3">
                        <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.72rem; font-weight: 600;">Due Date</small>
                        <div class="fw-semibold text-dark">
                            <i class="bi bi-calendar-event me-1 text-primary"></i>
                            {{ $task->due_date ? $task->due_date->format('d M Y') : 'Not set' }}
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="border rounded-3 p-3">
                        <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.72rem; font-weight: 600;">Created Date</small>
                        <div class="fw-semibold text-dark">
                            <i class="bi bi-clock me-1 text-secondary"></i>
                            {{ $task->created_at->format('d M Y, h:i A') }}
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="border rounded-3 p-3">
                        <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.72rem; font-weight: 600;">Last Updated</small>
                        <div class="fw-semibold text-dark">
                            <i class="bi bi-arrow-repeat me-1 text-info"></i>
                            {{ $task->updated_at->format('d M Y, h:i A') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-danger" id="deleteModalLabel">
                    <i class="bi bi-exclamation-circle-fill me-1"></i> Confirm Delete
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start py-3">
                <p class="mb-1 fw-semibold fs-6">Are you sure you want to delete this task?</p>
                <p class="text-muted small mb-0">"{{ $task->title }}" will be permanently deleted from the system database.</p>
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
@endsection
