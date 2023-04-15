<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payrun extends Model
{
    use HasFactory;
    protected $table="payrun";
    protected $fillable=[
        'add_payrun',
    'no_of_days'];
}
