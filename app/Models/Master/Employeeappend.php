<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeeappend extends Model
{
    use HasFactory;
    protected $table="employeesappend";
    protected $fillable=[
        'select_categories',
        'straight_pay_hours',
        'overtime_hours1',
        'overtime_hours2',
        'night_hours_pay',
        'employee_id'];
}
