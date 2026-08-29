@extends('layouts.app')

@section('title', 'Add New Task - Office Task Tracker')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fw-bold mb-1" style="letter-spacing: -0.5px;">Create New Task</h4>
                <p class="text-muted mb-0">Fill in the details below to assign a new task.</p>
            </div>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Back to Tasks
            </a>
        </div>

        <div class="card card-custom p-4">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <!-- Task Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">
                        Task Title <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           class="form-control @error('title') is-invalid @enderror" 
                           placeholder="e.g. Update Company Website"
                           value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback fw-medium">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Assigned To -->
                <div class="mb-3">
                    <label for="assigned_to" class="form-label fw-semibold">
                        Assigned To <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           id="assigned_to" 
                           name="assigned_to" 
                           class="form-control @error('assigned_to') is-invalid @enderror" 
                           placeholder="e.g. Rahim or Hasan"
                           value="{{ old('assigned_to') }}">
                    @error('assigned_to')
                        <div class="invalid-feedback fw-medium">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea id="description" 
                              name="description" 
                              rows="4" 
                              class="form-control @error('description') is-invalid @enderror" 
                              placeholder="Provide detailed instructions or overview of the task...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback fw-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3 mb-3">
                    <!-- Priority Select -->
                    <div class="col-12 col-md-4">
                        <label for="priority" class="form-label fw-semibold">
                            Priority <span class="text-danger">*</span>
                        </label>
                        <select id="priority" name="priority" class="form-select @error('priority') is-invalid @enderror">
                            <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ old('priority', 'Medium') == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')
                            <div class="invalid-feedback fw-medium">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status Select -->
                    <div class="col-12 col-md-4">
                        <label for="status" class="form-label fw-semibold">
                            Status <span class="text-danger">*</span>
                        </label>
                        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="Pending" {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback fw-medium">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Due Date -->
                    <div class="col-12 col-md-4">
                        <label for="due_date" class="form-label fw-semibold">Due Date</label>
                        <input type="date" 
                               id="due_date" 
                               name="due_date" 
                               class="form-control @error('due_date') is-invalid @enderror" 
                               value="{{ old('due_date') }}">
                        @error('due_date')
                            <div class="invalid-feedback fw-medium">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('tasks.index') }}" class="btn btn-light border px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4" style="background: #4f46e5; border-color: #4f46e5;">
                        <i class="bi bi-check-lg me-1"></i> Save Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
