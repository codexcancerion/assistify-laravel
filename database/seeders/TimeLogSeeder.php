<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeLog;
use Carbon\Carbon;

class TimeLogSeeder extends Seeder
{
    public function run()
    {
        $timeLogs = [
            [
                'student_id' => 2,
                'check_in' => Carbon::now()->subHours(8),
                'check_out' => Carbon::now(),
                'total_hours_worked' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'check_in' => Carbon::now()->subDays(1)->setTime(9, 0),
                'check_out' => Carbon::now()->subDays(1)->setTime(17, 0),
                'total_hours_worked' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'check_in' => Carbon::now()->subDays(2)->setTime(10, 0),
                'check_out' => Carbon::now()->subDays(2)->setTime(15, 0),
                'total_hours_worked' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($timeLogs as $log) {
            TimeLog::create($log);
        }
    }
}
