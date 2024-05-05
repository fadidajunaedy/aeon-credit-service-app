<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_name',
        'recruitment_type',
        'work_location',
        'working_time',
        'worker_status',
        'application_deadline',
        'job_description',
        'requirements',
        'level',
        'minimum_experience',
        'education_level',
        'major',
    ];
}
