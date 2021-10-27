<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Foto;
use App\Models\Comentario;
use App\Models\Documento;

class Trabajo extends Model
{
    use HasFactory;
    protected $fillable = [
       'tarifa_cod', 'nombre_paciente', 'apellidos_paciente', 'edad',  'nombre_clinica', 'nombre_doctor', 'objetivos', 'fecha_solicitud', 'estado_cod', 'user_id', 'numero_colegiado', 'numero_expediente'
    ];

    /**
     * Get the fotos for the trabajo.
     */
    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    /**
     * Get the comentarios for the trabajo.
     */
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

     /**
     * Get the documentos for the trabajo.
     */
    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
