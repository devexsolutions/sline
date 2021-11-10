<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Estado::create( [
            'id'=>1,
            'nombre'=>'Solicitado',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>2,
            'nombre'=>'Pendiente',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>3,
            'nombre'=>'Planificación Realizada',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>4,
            'nombre'=>'Pendiente de Pago',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>5,
            'nombre'=>'Fabricación',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>6,
            'nombre'=>'Solicitud de Recogida',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>7,
            'nombre'=>'Enviado',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>8,
            'nombre'=>'Historico',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>9,
            'nombre'=>'Envio de Plantilla Ataches',
            'created_at'=>'0000-00-00 00:00:00',
            'updated_at'=>'0000-00-00 00:00:00',
            'deleted_at'=>'0000-00-00 00:00:00'
            ] );
                        
            Estado::create( [
            'id'=>10,
            'nombre'=>'Envio Caso Parcial',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>11,
            'nombre'=>'Envio Caso Completo',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>12,
            'nombre'=>'Plantillas Aceptadas',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>13,
            'nombre'=>'Solicitar Refinamiento Intermedio',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>14,
            'nombre'=>'Solicitar Refinamiento Final',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>15,
            'nombre'=>'2ª Revision',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>16,
            'nombre'=>'Refinamiento',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>98,
            'nombre'=>'Faltan Fotos',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
            Estado::create( [
            'id'=>99,
            'nombre'=>'Incompleto',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
    }
}
