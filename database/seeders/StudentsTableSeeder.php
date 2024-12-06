<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'email' => 'alice.johnson@example.com',
                'student_id' => 'STU001',
                'department' => 'Computer Science',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 10,
                'supervisor_id' => 1, // Assuming the supervisor ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Smith',
                'email' => 'bob.smith@example.com',
                'student_id' => 'STU002',
                'department' => 'Information Technology',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 20,
                'supervisor_id' => 2, // Assuming the supervisor ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Carol',
                'last_name' => 'Davis',
                'email' => 'carol.davis@example.com',
                'student_id' => 'STU003',
                'department' => 'Engineering',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 15,
                'supervisor_id' => null, // No supervisor assigned
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
