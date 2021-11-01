<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recogida extends Model
{
    use HasFactory;
    protected $fillable = ['trabajo_id', 'operacion', 'user_id'];
}
