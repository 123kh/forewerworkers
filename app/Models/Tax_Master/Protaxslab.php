<?php

namespace App\Models\Tax_Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protaxslab extends Model
{
    use HasFactory;
    protected $table="protaxslabs";
    protected $fillable=['min_values','max_values','percentage_of_taxs'];
}
