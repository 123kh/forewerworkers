<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="employees";
    protected $fillable=['select_location','employee_id','employee_name','address','contact_number','Email','ID_proof','address_proof','DOB','sin','bcdl','bank_name','account_number','bank_details','Job_Acceptreject','Show_Hide','Only_Straight_hours'];
}
