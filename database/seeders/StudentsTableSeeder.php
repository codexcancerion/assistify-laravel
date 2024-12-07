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
            [
                'first_name' => 'David',
                'last_name' => 'Miller',
                'email' => 'david.miller@example.com',
                'student_id' => 'STU004',
                'department' => 'Electrical Engineering',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 25,
                'supervisor_id' => 1, // Assuming the supervisor ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Eve',
                'last_name' => 'Wilson',
                'email' => 'eve.wilson@example.com',
                'student_id' => 'STU005',
                'department' => 'Mechanical Engineering',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 30,
                'supervisor_id' => 1, // Assuming the supervisor ID 3 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Frank',
                'last_name' => 'Brown',
                'email' => 'frank.brown@example.com',
                'student_id' => 'STU006',
                'department' => 'Physics',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 40,
                'supervisor_id' => 2, // Assuming the supervisor ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Grace',
                'last_name' => 'Taylor',
                'email' => 'grace.taylor@example.com',
                'student_id' => 'STU007',
                'department' => 'Mathematics',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 18,
                'supervisor_id' => 2, // Assuming the supervisor ID 4 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Hannah',
                'last_name' => 'Anderson',
                'email' => 'hannah.anderson@example.com',
                'student_id' => 'STU008',
                'department' => 'Economics',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 22,
                'supervisor_id' => null, // No supervisor assigned
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ivy',
                'last_name' => 'Thomas',
                'email' => 'ivy.thomas@example.com',
                'student_id' => 'STU009',
                'department' => 'Biology',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 16,
                'supervisor_id' => 1, // Assuming the supervisor ID 1 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jack',
                'last_name' => 'Martinez',
                'email' => 'jack.martinez@example.com',
                'student_id' => 'STU010',
                'department' => 'Chemistry',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 28,
                'supervisor_id' => 2, // Assuming the supervisor ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Kathy',
                'last_name' => 'Garcia',
                'email' => 'kathy.garcia@example.com',
                'student_id' => 'STU011',
                'department' => 'Computer Science',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 35,
                'supervisor_id' => 1, // Assuming the supervisor ID 3 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Liam',
                'last_name' => 'Lee',
                'email' => 'liam.lee@example.com',
                'student_id' => 'STU012',
                'department' => 'Information Technology',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 20,
                'supervisor_id' => 2, // Assuming the supervisor ID 4 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Megan',
                'last_name' => 'Hernandez',
                'email' => 'megan.hernandez@example.com',
                'student_id' => 'STU013',
                'department' => 'Engineering',
                'password' => Hash::make('1234'),
                'role' => 'Student',
                'hours_worked' => 38,
                'supervisor_id' => null, // No supervisor assigned
                'created_at' => now(),
                'updated_at' => now(),
            ]
            
        ]);
    }
}
