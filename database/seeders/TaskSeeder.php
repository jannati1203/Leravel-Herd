<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Update Company Website',
                'description' => 'Redesign homepage hero section and update modern features showcase page.',
                'assigned_to' => 'Rahim',
                'priority' => 'High',
                'status' => 'In Progress',
                'due_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
            ],
            [
                'title' => 'Prepare Client Report',
                'description' => 'Compile Q3 performance analytics and client satisfaction report for Acme Corp.',
                'assigned_to' => 'Hasan',
                'priority' => 'Medium',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(7)->format('Y-m-d'),
            ],
            [
                'title' => 'Backup Server',
                'description' => 'Perform full system backup of database servers and archive old log files.',
                'assigned_to' => 'Karim',
                'priority' => 'High',
                'status' => 'Completed',
                'due_date' => Carbon::now()->subDays(2)->format('Y-m-d'),
            ],
            [
                'title' => 'Design Mobile App Mockup',
                'description' => 'Create Figma wireframes and high-fidelity mockups for task tracking mobile app.',
                'assigned_to' => 'Fatema',
                'priority' => 'High',
                'status' => 'In Progress',
                'due_date' => Carbon::now()->addDays(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Fix Authentication Bug',
                'description' => 'Investigate and resolve password reset token expiration issue reported by QA.',
                'assigned_to' => 'Tanvir',
                'priority' => 'High',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(1)->format('Y-m-d'),
            ],
            [
                'title' => 'Setup CI/CD Pipeline',
                'description' => 'Configure GitHub Actions for automated linting, unit testing, and deployment to staging server.',
                'assigned_to' => 'Rahim',
                'priority' => 'Medium',
                'status' => 'In Progress',
                'due_date' => Carbon::now()->addDays(8)->format('Y-m-d'),
            ],
            [
                'title' => 'Review Code Pull Requests',
                'description' => 'Review backend REST API endpoints pull requests for sprint 14 features.',
                'assigned_to' => 'Anika',
                'priority' => 'Low',
                'status' => 'Completed',
                'due_date' => Carbon::now()->subDays(1)->format('Y-m-d'),
            ],
            [
                'title' => 'Draft Office Equipment Policy',
                'description' => 'Write comprehensive documentation regarding remote work hardware allocation and usage.',
                'assigned_to' => 'Hasan',
                'priority' => 'Low',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(12)->format('Y-m-d'),
            ],
            [
                'title' => 'Optimize SQL Queries',
                'description' => 'Analyze slow database queries in task listing endpoints and add proper indexes.',
                'assigned_to' => 'Karim',
                'priority' => 'Medium',
                'status' => 'In Progress',
                'due_date' => Carbon::now()->addDays(4)->format('Y-m-d'),
            ],
            [
                'title' => 'Security Audit & Compliance',
                'description' => 'Conduct quarterly vulnerability scan and ensure SSL certificates and headers are updated.',
                'assigned_to' => 'Tanvir',
                'priority' => 'High',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(6)->format('Y-m-d'),
            ],
            [
                'title' => 'Organize Team Workshop',
                'description' => 'Schedule and prepare agenda for modern Laravel & Vue.js development workshop.',
                'assigned_to' => 'Fatema',
                'priority' => 'Low',
                'status' => 'Completed',
                'due_date' => Carbon::now()->subDays(4)->format('Y-m-d'),
            ],
            [
                'title' => 'Client Onboarding Presentation',
                'description' => 'Prepare slide deck for introductory kick-off meeting with new enterprise partner.',
                'assigned_to' => 'Anika',
                'priority' => 'Medium',
                'status' => 'Completed',
                'due_date' => Carbon::now()->subDays(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Update API Documentation',
                'description' => 'Publish OpenAPI/Swagger specification for task management microservice endpoints.',
                'assigned_to' => 'Rahim',
                'priority' => 'Low',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(10)->format('Y-m-d'),
            ],
            [
                'title' => 'Inventory System Sync',
                'description' => 'Verify cloud database records match hardware physical assets count in office warehouse.',
                'assigned_to' => 'Hasan',
                'priority' => 'Medium',
                'status' => 'Completed',
                'due_date' => Carbon::now()->subDays(5)->format('Y-m-d'),
            ],
            [
                'title' => 'Prepare Monthly Financial Report',
                'description' => 'Overdue monthly financial audit and budget reconciliation report.',
                'assigned_to' => 'Hasan',
                'priority' => 'High',
                'status' => 'Pending',
                'due_date' => Carbon::now()->subDays(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Renew Domain & SSL Certificate',
                'description' => 'Renew core domain registration and update wildcard SSL certificate.',
                'assigned_to' => 'Rahim',
                'priority' => 'High',
                'status' => 'In Progress',
                'due_date' => Carbon::now()->subDays(5)->format('Y-m-d'),
            ],
            [
                'title' => 'Submit Quarterly Tax Statements',
                'description' => 'Finalize tax audit files and upload to government portal.',
                'assigned_to' => 'Anika',
                'priority' => 'High',
                'status' => 'Pending',
                'due_date' => Carbon::today()->format('Y-m-d'),
            ],
            [
                'title' => 'Setup Monitoring & Alerts',
                'description' => 'Integrate Uptime Robot and Prometheus alerts for production server downtime notifications.',
                'assigned_to' => 'Karim',
                'priority' => 'High',
                'status' => 'Pending',
                'due_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
