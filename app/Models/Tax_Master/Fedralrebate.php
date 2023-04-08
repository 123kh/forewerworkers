<?php

namespace App\Models\Tax_Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fedralrebate extends Model
{
    use HasFactory;
    protected $table="fedralrebate";
    protected $fillable=['value'];
}
