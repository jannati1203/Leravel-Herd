<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;

class TaskTrackerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_loads_and_displays_dynamic_statistics_including_overdue(): void
    {
        Task::create([
            'title' => 'Future Pending Task',
            'assigned_to' => 'Rahim',
            'priority' => 'High',
            'status' => 'Pending',
            'due_date' => Carbon::now()->addDays(5),
        ]);

        Task::create([
            'title' => 'Overdue Pending Task',
            'assigned_to' => 'Hasan',
            'priority' => 'High',
            'status' => 'In Progress',
            'due_date' => Carbon::now()->subDays(3),
        ]);

        Task::create([
            'title' => 'Completed Task Past Due',
            'assigned_to' => 'Karim',
            'priority' => 'Low',
            'status' => 'Completed',
            'due_date' => Carbon::now()->subDays(5),
        ]);

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Total Tasks');
        $response->assertSee('Overdue Tasks');
        $response->assertSee('Overdue Pending Task');
        // Completed task past due date should not be listed in overdue tasks section
        $this->assertEquals(1, Task::overdue()->count());
    }

    public function test_task_creation_with_validation(): void
    {
        $invalidResponse = $this->post('/tasks', [
            'title' => '',
            'assigned_to' => '',
            'priority' => 'Medium',
            'status' => 'Pending',
        ]);

        $invalidResponse->assertSessionHasErrors(['title', 'assigned_to']);
        $this->assertEquals(0, Task::count());

        $validResponse = $this->post('/tasks', [
            'title' => 'New Office Task',
            'description' => 'Detailed description',
            'assigned_to' => 'Rahim',
            'priority' => 'High',
            'status' => 'In Progress',
            'due_date' => '2026-09-15',
        ]);

        $validResponse->assertRedirect(route('tasks.index'));
        $validResponse->assertSessionHas('success', 'Task created successfully.');
        $this->assertDatabaseHas('tasks', [
            'title' => 'New Office Task',
            'assigned_to' => 'Rahim',
            'priority' => 'High',
            'status' => 'In Progress',
        ]);
    }

    public function test_combined_search_status_and_priority_filtering(): void
    {
        Task::create([
            'title' => 'Update Website',
            'assigned_to' => 'Rahim',
            'priority' => 'High',
            'status' => 'Pending',
        ]);

        Task::create([
            'title' => 'Prepare Report',
            'assigned_to' => 'Rahim',
            'priority' => 'Medium',
            'status' => 'Pending',
        ]);

        Task::create([
            'title' => 'Backup Database',
            'assigned_to' => 'Hasan',
            'priority' => 'High',
            'status' => 'In Progress',
        ]);

        // Search Rahim + Status Pending + Priority High
        $response = $this->get('/tasks?search=Rahim&status=Pending&priority=High');
        $response->assertStatus(200);
        $response->assertSee('Update Website');
        $response->assertDontSee('Prepare Report');
        $response->assertDontSee('Backup Database');
    }

    public function test_overdue_task_detection_logic(): void
    {
        $overdueTask = Task::create([
            'title' => 'Overdue Task',
            'assigned_to' => 'Rahim',
            'priority' => 'High',
            'status' => 'Pending',
            'due_date' => Carbon::now()->subDays(2),
        ]);

        $completedPastTask = Task::create([
            'title' => 'Completed Past Task',
            'assigned_to' => 'Hasan',
            'priority' => 'Medium',
            'status' => 'Completed',
            'due_date' => Carbon::now()->subDays(2),
        ]);

        $this->assertTrue($overdueTask->isOverdue());
        $this->assertFalse($completedPastTask->isOverdue());
    }

    public function test_csv_export_feature_flag_enabled_and_disabled(): void
    {
        Task::create([
            'title' => 'Exportable Task',
            'assigned_to' => 'Rahim',
            'priority' => 'High',
            'status' => 'Pending',
        ]);

        // Enabled test
        config(['office.enable_task_export' => true]);
        $enabledResponse = $this->get('/tasks/export');
        $enabledResponse->assertStatus(200);
        $enabledResponse->assertHeader('content-type', 'text/csv; charset=UTF-8');
        $this->assertStringContainsString('Exportable Task', $enabledResponse->streamedContent());

        // Disabled test
        config(['office.enable_task_export' => false]);
        $disabledResponse = $this->get('/tasks/export');
        $disabledResponse->assertStatus(403);
    }

    public function test_custom_office_configurations(): void
    {
        $this->assertEquals('ASTGD Task Tracker', config('office.app_name'));
        $this->assertEquals('ASTGD', config('office.company_name'));
        $this->assertEquals('office@example.com', config('office.company_email'));
        $this->assertEquals(10, config('office.tasks_per_page'));

        // Test dynamic app_name change
        config(['office.app_name' => 'My Office Tracker']);
        $response = $this->get('/dashboard');
        $response->assertSee('My Office Tracker');

        // Test dynamic company_name and company_email change
        config([
            'office.company_name' => 'ABC Corporation',
            'office.company_email' => 'info@abc.com',
        ]);
        $responseFooter = $this->get('/dashboard');
        $responseFooter->assertSee('ABC Corporation');
        $responseFooter->assertSee('info@abc.com');

        // Test dynamic pagination per_page change
        config(['office.tasks_per_page' => 5]);
        for ($i = 1; $i <= 8; $i++) {
            Task::create([
                'title' => "Pagination Task {$i}",
                'assigned_to' => 'Worker',
                'priority' => 'Low',
                'status' => 'Pending',
            ]);
        }
        $responsePagination = $this->get('/tasks');
        $responsePagination->assertStatus(200);
        $this->assertEquals(5, $responsePagination->viewData('tasks')->perPage());
    }

    public function test_environment_indicator_visibility(): void
    {
        // Local environment -> shows Environment: Development
        $this->app['env'] = 'local';
        $localResponse = $this->get('/dashboard');
        $localResponse->assertSee('Environment: Development');

        // Production environment -> does NOT show Environment: Production
        $this->app['env'] = 'production';
        $prodResponse = $this->get('/dashboard');
        $prodResponse->assertDontSee('Environment: Development');
        $prodResponse->assertDontSee('Environment: Production');

        // Reset env back to local
        $this->app['env'] = 'local';
    }

    public function test_task_statistics_percentages_calculation(): void
    {
        // 13 Completed, 4 Pending, 3 In Progress = 20 total
        for ($i = 0; $i < 13; $i++) {
            Task::create(['title' => "Comp {$i}", 'assigned_to' => 'A', 'priority' => 'Low', 'status' => 'Completed']);
        }
        for ($i = 0; $i < 4; $i++) {
            Task::create(['title' => "Pend {$i}", 'assigned_to' => 'B', 'priority' => 'Low', 'status' => 'Pending']);
        }
        for ($i = 0; $i < 3; $i++) {
            Task::create(['title' => "Prog {$i}", 'assigned_to' => 'C', 'priority' => 'Low', 'status' => 'In Progress']);
        }

        $response = $this->get('/dashboard');
        $response->assertStatus(200);

        $stats = $response->viewData('stats');
        $this->assertEquals(65, $stats['completed_pct']);
        $this->assertEquals(20, $stats['pending_pct']);
        $this->assertEquals(15, $stats['in_progress_pct']);
    }

    public function test_due_soon_tasks_filtering_and_detection(): void
    {
        $today = Carbon::today();

        // Due soon: today, +2 days
        $dueSoon1 = Task::create(['title' => 'Due Today Task', 'assigned_to' => 'Rahim', 'priority' => 'High', 'status' => 'Pending', 'due_date' => $today]);
        $dueSoon2 = Task::create(['title' => 'Due 2 Days Task', 'assigned_to' => 'Hasan', 'priority' => 'Medium', 'status' => 'In Progress', 'due_date' => $today->copy()->addDays(2)]);

        // Not due soon: +5 days, past due (overdue), or completed
        $futureTask = Task::create(['title' => 'Future Task', 'assigned_to' => 'Karim', 'priority' => 'Low', 'status' => 'Pending', 'due_date' => $today->copy()->addDays(5)]);
        $completedTask = Task::create(['title' => 'Completed Task', 'assigned_to' => 'Anika', 'priority' => 'High', 'status' => 'Completed', 'due_date' => $today]);
        $overdueTask = Task::create(['title' => 'Past Task', 'assigned_to' => 'Fatema', 'priority' => 'High', 'status' => 'Pending', 'due_date' => $today->copy()->subDays(2)]);

        $this->assertTrue($dueSoon1->isDueSoon());
        $this->assertTrue($dueSoon2->isDueSoon());
        $this->assertFalse($futureTask->isDueSoon());
        $this->assertFalse($completedTask->isDueSoon());
        $this->assertFalse($overdueTask->isDueSoon());

        $this->assertEquals(2, Task::dueSoon()->count());
    }

    public function test_filtered_csv_export_respects_search_and_filters(): void
    {
        config(['office.enable_task_export' => true]);

        Task::create(['title' => 'Matching Rahim Task', 'assigned_to' => 'Rahim', 'priority' => 'High', 'status' => 'Pending']);
        Task::create(['title' => 'Other Task', 'assigned_to' => 'Hasan', 'priority' => 'Low', 'status' => 'Completed']);

        $response = $this->get('/tasks/export?search=Rahim&status=Pending&priority=High');
        $response->assertStatus(200);

        $csvContent = $response->streamedContent();
        $this->assertStringContainsString('Matching Rahim Task', $csvContent);
        $this->assertStringNotContainsString('Other Task', $csvContent);
    }

    public function test_task_edit_and_update(): void
    {
        $task = Task::create([
            'title' => 'Original Title',
            'assigned_to' => 'Rahim',
            'priority' => 'Low',
            'status' => 'Pending',
        ]);

        $response = $this->put("/tasks/{$task->id}", [
            'title' => 'Updated Title',
            'assigned_to' => 'Rahim',
            'description' => 'Updated description',
            'priority' => 'High',
            'status' => 'Completed',
        ]);

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task updated successfully.');

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Title',
            'status' => 'Completed',
            'priority' => 'High',
        ]);
    }

    public function test_task_delete(): void
    {
        $task = Task::create([
            'title' => 'Task to Delete',
            'assigned_to' => 'Rahim',
            'priority' => 'Medium',
            'status' => 'Pending',
        ]);

        $response = $this->delete("/tasks/{$task->id}");

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('success', 'Task deleted successfully.');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
