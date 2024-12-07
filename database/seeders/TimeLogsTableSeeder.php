<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timeLogs = [];

        // Only use student IDs 1, 2, and 3
        foreach ([1,2,3] as $studentId) {
            for ($i = 1; $i <= 10; $i++) {
                $checkIn = now()->subDays(rand(1, 30))->subHours(rand(1, 8));
                $checkOut = $checkIn->copy()->addHours(rand(1, 8));
                $totalHoursWorked = $checkIn->diffInHours($checkOut);

                $timeLogs[] = [
                    'student_id' => $studentId, // Use only student IDs 1, 2, and 3
                    'check_in' => $checkIn,
                    'check_out' => $checkOut,
                    'total_hours_worked' => $totalHoursWorked,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('time_logs')->insert($timeLogs);
    }
}
