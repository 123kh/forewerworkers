<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyappend extends Model
{
    use HasFactory;
    protected $table="companysregsappend";
    protected $fillable=['select_categories','straight_pay_hours','overtime_hours1','overtime_hours2','night_hours_pay','company_register_id'];


}
