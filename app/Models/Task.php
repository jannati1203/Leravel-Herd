<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'assigned_to',
        'priority',
        'status',
        'due_date',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    /**
     * Check if task is overdue.
     */
    public function isOverdue(): bool
    {
        if (! $this->due_date) {
            return false;
        }

        return $this->due_date->lt(Carbon::today()) && $this->status !== 'Completed';
    }

    /**
     * Scope a query to only include overdue tasks.
     */
    public function scopeOverdue($query)
    {
        return $query->whereNotNull('due_date')
                     ->where('due_date', '<', Carbon::today()->format('Y-m-d'))
                     ->where('status', '!=', 'Completed');
    }

    /**
     * Check if task is due soon (due between today and next 3 days, not completed).
     */
    public function isDueSoon(): bool
    {
        if (! $this->due_date || $this->status === 'Completed') {
            return false;
        }

        $today = Carbon::today();
        $threeDaysLater = Carbon::today()->addDays(3);

        return $this->due_date->gte($today) && $this->due_date->lte($threeDaysLater);
    }

    /**
     * Scope a query to only include tasks due within the next 3 days (not completed).
     */
    public function scopeDueSoon($query)
    {
        $today = Carbon::today()->format('Y-m-d');
        $threeDaysLater = Carbon::today()->addDays(3)->format('Y-m-d');

        return $query->whereNotNull('due_date')
                     ->where('due_date', '>=', $today)
                     ->where('due_date', '<=', $threeDaysLater)
                     ->where('status', '!=', 'Completed');
    }
}
