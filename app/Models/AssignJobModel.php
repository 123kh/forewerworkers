<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Master\Companyres;
use App\Models\Master\Employee;
use App\Models\Master\Location;

class AssignJobModel extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'location_id',
        'company_id',
        'employee_id',
        'job_title',
        'job_description',
        'job_start_date',
        'job_end_date',
        'expected_hour',
        'status'
    ];

    public function getCompanyNameAttribute()
    {
        return ucWords(Companyres::find($this->company_id)->company_name);
    }

    public function getLocationNameAttribute()
    {
        return ucWords(Location::find($this->location_id)->location).' ,India';
    }

    public function getEmployeeNameAttribute()
    {
        return ucWords(Employee::find($this->employee_id)->employee_name);
    }
}
