<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'description' => 'Complete the quarterly report',
                'deadline' => Carbon::now()->addDays(5),
                'priority' => 'High',
                'status' => 'Pending',
                'assigned_to' => 2,
                'assigned_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'description' => 'Organize the team meeting',
                'deadline' => Carbon::now()->addDays(10),
                'priority' => 'Medium',
                'status' => 'In Progress',
                'assigned_to' => 3,
                'assigned_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
