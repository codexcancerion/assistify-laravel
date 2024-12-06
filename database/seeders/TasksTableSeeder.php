<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'description' => 'Prepare the project documentation.',
                'deadline' => '2024-12-10',
                'priority' => 'High',
                'status' => 'Pending',
                'assigned_to' => 1, // Assuming student ID 1 exists
                'assigned_by' => 1, // Assuming supervisor ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Develop the user login module.',
                'deadline' => '2024-12-15',
                'priority' => 'Medium',
                'status' => 'Pending',
                'assigned_to' => 2, // Assuming student ID 2 exists
                'assigned_by' => 1, // Assuming supervisor ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Conduct system testing.',
                'deadline' => '2024-12-20',
                'priority' => 'High',
                'status' => 'Completed',
                'assigned_to' => 3, // Assuming student ID 3 exists
                'assigned_by' => 2, // Assuming supervisor ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Create UI mockups for the dashboard.',
                'deadline' => '2024-12-12',
                'priority' => 'Low',
                'status' => 'Completed',
                'assigned_to' => 1, // Assuming student ID 1 exists
                'assigned_by' => 2, // Assuming supervisor ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'Prepare the final project presentation.',
                'deadline' => '2024-12-25',
                'priority' => 'Medium',
                'status' => 'Pending',
                'assigned_to' => 2, // Assuming student ID 2 exists
                'assigned_by' => 1, // Assuming supervisor ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
