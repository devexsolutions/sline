<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
                               
            User::create( [
            'id'=>1,
            'cif'=>'1122334456M',
            'nombre_fiscal'=>'Tecnico Sline',
            'direccion_fiscal'=>' ',
            'nombre'=>'Esperanza',
            'apellidos'=>' ',
            'numero_colegiado'=>' ',
            'colegio_dentistas'=>' ',
            'direccion_envio'=>'',
            'persona_contacto'=>'María Galvez',
            'telefono'=>'614523986',
            'email'=>'admin@admin.com',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$BKmi5/k4WMqkwN8pXg.cqOzdKpEDTq0lZAMcmN9k.AB5oLRfVfsEG',
            'two_factor_secret'=>NULL,
            'two_factor_recovery_codes'=>NULL,
            'remember_token'=>NULL,
            'is_admin'=>1,
            'is_active'=>1,
            'is_external'=>0,
            'current_team_id'=>NULL,
            'profile_photo_path'=>NULL,
            'created_at'=>'2021-10-17 03:30:08',
            'updated_at'=>'2021-10-17 03:30:08'
            ] );
            
    }
}
