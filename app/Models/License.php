<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $table = 'licenses';
    protected $primaryKey = 'id';
    protected $fillable = ['no', 'type', 'issue_date', 'expire_date', 'name', 'birth_date', 'id_no', 'user_id'];
}