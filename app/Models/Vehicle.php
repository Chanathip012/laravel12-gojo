<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
   
    protected $primaryKey = 'id';
    
    protected $fillable = ['brand', 'serie', 'color', 'year', 'mileage', 'user_id'];
}