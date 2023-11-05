<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyres extends Model
{
    use HasFactory;
    protected $table="companysregs";
    protected $fillable=[
    'company_name',
    'transit_number',
    'institution_number',
    'account_number',
    'address',
    'zip',
    'contact_person',
    'email',
    'contact_number'];

}
