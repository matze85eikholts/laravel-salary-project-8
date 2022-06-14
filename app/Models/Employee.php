<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['employee_name',
    'employee_middlename',
    'employee_familyname',
    'date_of_birth',
    'education',
    'email',
    'phone',
    'employment_start',
    'job_title_id',
    'department_id',
    'chief_id'
    ];
    
}
