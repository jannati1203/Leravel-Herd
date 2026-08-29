<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with dynamic statistics, percentage metrics, recent tasks, due soon tasks, and overdue tasks.
     */
    public function index()
    {
        $total      = Task::count();
        $pending    = Task::where('status', 'Pending')->count();
        $inProgress = Task::where('status', 'In Progress')->count();
        $completed  = Task::where('status', 'Completed')->count();
        $high       = Task::where('priority', 'High')->count();
        $overdue    = Task::overdue()->count();

        // Calculate dynamic task completion percentages with zero task protection
        $completedPct  = $total > 0 ? (int) round(($completed / $total) * 100) : 0;
        $pendingPct    = $total > 0 ? (int) round(($pending / $total) * 100) : 0;
        $inProgressPct = $total > 0 ? (int) round(($inProgress / $total) * 100) : 0;

        $stats = [
            'total'           => $total,
            'pending'         => $pending,
            'in_progress'     => $inProgress,
            'completed'       => $completed,
            'high'            => $high,
            'overdue'         => $overdue,
            'completed_pct'   => $completedPct,
            'pending_pct'     => $pendingPct,
            'in_progress_pct' => $inProgressPct,
        ];

        // Fetch latest 5 recent tasks
        $recentTasks = Task::latest()->take(5)->get();

        // Fetch tasks due within the next 3 days (excluding completed)
        $dueSoonTasks = Task::dueSoon()->orderBy('due_date', 'asc')->get();

        // Fetch overdue tasks
        $overdueTasks = Task::overdue()->orderBy('due_date', 'asc')->get();

        return view('dashboard', compact('stats', 'recentTasks', 'dueSoonTasks', 'overdueTasks'));
    }
}
