<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trabajo;

class Documento extends Model
{
    use HasFactory;
    /**
     * Get the trabajo that owns the fotos.
     */
    public function trabajo()
    {
        return $this->belongsTo(Trabajo::class);
    }
}
