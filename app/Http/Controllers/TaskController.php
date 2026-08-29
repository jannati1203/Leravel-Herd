<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks with search, status, and priority filters.
     */
    public function index(Request $request)
    {
        $search   = trim($request->input('search', ''));
        $status   = $request->input('status', 'All');
        $priority = $request->input('priority', 'All');

        $query = Task::query();

        // Search filter (title or assigned_to)
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('assigned_to', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($status !== '' && $status !== 'All') {
            $query->where('status', $status);
        }

        // Priority filter
        if ($priority !== '' && $priority !== 'All') {
            $query->where('priority', $priority);
        }

        $perPage = config('office.tasks_per_page');

        $tasks = $query->orderBy('created_at', 'desc')
                       ->paginate($perPage)
                       ->withQueryString();

        return view('tasks.index', compact('tasks', 'search', 'status', 'priority'));
    }

    /**
     * Export tasks to CSV format.
     */
    public function export(Request $request)
    {
        if (! config('office.enable_task_export')) {
            abort(403, 'Task export feature is currently disabled.');
        }

        $search   = trim($request->input('search', ''));
        $status   = $request->input('status', 'All');
        $priority = $request->input('priority', 'All');

        $query = Task::query();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('assigned_to', 'like', "%{$search}%");
            });
        }

        if ($status !== '' && $status !== 'All') {
            $query->where('status', $status);
        }

        if ($priority !== '' && $priority !== 'All') {
            $query->where('priority', $priority);
        }

        $tasks = $query->orderBy('created_at', 'desc')->get();

        $filename = 'office_tasks_' . date('Y-m-d_His') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function () use ($tasks) {
            $file = fopen('php://output', 'w');
            
            // Add UTF-8 BOM for Excel compatibility
            fputs($file, "\xEF\xBB\xBF");

            // CSV Header
            fputcsv($file, [
                'ID',
                'Task Title',
                'Description',
                'Assigned To',
                'Priority',
                'Status',
                'Due Date',
                'Created Date',
            ]);

            // CSV Rows
            foreach ($tasks as $task) {
                fputcsv($file, [
                    $task->id,
                    $task->title,
                    $task->description,
                    $task->assigned_to,
                    $task->priority,
                    $task->status,
                    $task->due_date ? $task->due_date->format('Y-m-d') : '',
                    $task->created_at ? $task->created_at->format('Y-m-d H:i:s') : '',
                ]);
            }

            fclose($file);
        };

        return response()->streamDownload($callback, $filename, $headers);
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'assigned_to' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority'    => 'required|in:Low,Medium,High',
            'status'      => 'required|in:Pending,In Progress,Completed',
            'due_date'    => 'nullable|date',
        ], [
            'title.required'       => 'Task title is required.',
            'assigned_to.required' => 'Please select or enter the person responsible for this task.',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified task detail.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'assigned_to' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority'    => 'required|in:Low,Medium,High',
            'status'      => 'required|in:Pending,In Progress,Completed',
            'due_date'    => 'nullable|date',
        ], [
            'title.required'       => 'Task title is required.',
            'assigned_to.required' => 'Please select or enter the person responsible for this task.',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
