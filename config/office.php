<?php

return [
    'app_name'           => env('OFFICE_APP_NAME', 'Office Task Tracker'),
    'company_name'       => env('COMPANY_NAME', 'Company'),
    'company_email'      => env('COMPANY_EMAIL', 'office@example.com'),
    'tasks_per_page'     => (int) env('TASKS_PER_PAGE', 10),
    'enable_task_export' => filter_var(env('ENABLE_TASK_EXPORT', false), FILTER_VALIDATE_BOOLEAN),
];
