<?php

namespace App\Models\Tax_Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fedraltaxslab extends Model
{
    use HasFactory;
    protected $table="fedralslabs";
    protected $fillable=['min_value','max_value','percentage_of_tax'];
}
