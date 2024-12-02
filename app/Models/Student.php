<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',      
        'last_name',
        'email',
        'password',
        'role',
        'hours_worked',
    ];

    public function timeLogs()
    {
        return $this->hasMany(TimeLog::class);
    }

}
