<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'deadline',
        'priority',
        'status',
        'assigned_to',
        'assigned_by',
    ];

    // Relationship to the Student model
    public function assignedTo()
    {
        return $this->belongsTo(Student::class, 'assigned_to');
    }

    // Relationship to the Supervisor model
    public function assignedBy()
    {
        return $this->belongsTo(Supervisor::class, 'assigned_by');
    }
}
