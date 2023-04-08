<?php

namespace App\Models\Tax_Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Othertax extends Model
{
    use HasFactory;
    protected $table="othertaxs";
    protected $fillable=['vacation_pay','CPP_Employee_Contribution','max_value_cpp','cpp_employers_contribution','Max_Values_con','EI_Employee_Contribution','Max_Value_Ei','ei_employers_contribution','max_value_emprs'];
}
