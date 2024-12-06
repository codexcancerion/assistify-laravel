<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupervisorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supervisors')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('1234'),
                'role' => 'Head Supervisor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('1234'),
                'role' => 'Supervisor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Mark',
                'last_name' => 'Taylor',
                'email' => 'mark.taylor@example.com',
                'password' => Hash::make('1234'),
                'role' => 'Supervisor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
