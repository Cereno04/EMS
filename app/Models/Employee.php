<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'position',
        'department_id',
        'employee_type',
        'date_hired',
        'status',
    ];

    // Defines the relationship: an employee belongs to a department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}