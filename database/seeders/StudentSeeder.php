<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample students
        Student::insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'student_id' => '2023-01-01',
                'department' => 'CIT',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password123'),
                'role' => 'working_scholar',
                'hours_worked' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'student_id' => '2023-01-01',
                'department' => 'CIT',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('password456'),
                'role' => 'working_scholar',
                'hours_worked' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Johnson',
                'student_id' => '2023-01-01',
                'department' => 'CIT',
                'email' => 'bob.johnson@example.com',
                'password' => bcrypt('password789'),
                'role' => 'working_scholar',
                'hours_worked' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
