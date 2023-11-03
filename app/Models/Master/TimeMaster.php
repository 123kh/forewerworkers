<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'day_start_time',
        'day_end_time',
        'night_start_time',
        'night_end_time',
    ];
}
