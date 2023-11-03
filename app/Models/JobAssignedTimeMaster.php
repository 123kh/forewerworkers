<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAssignedTimeMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'day_start_time',
        'day_end_time',
        'night_start_time',
        'night_end_time',
    ];
}
