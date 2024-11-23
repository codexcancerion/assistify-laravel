<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OSAS extends Model
{
    use HasFactory;


    protected $table = 'osas'; // Explicitly specify the correct table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',     
        'email',
        'role',
    ];
}
