<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cif');
            $table->string('nombre_fiscal');
            $table->string('direccion_fiscal');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('numero_colegiado');
            $table->string('colegio_dentistas');
            $table->string('direccion_envio');
            $table->string('persona_contacto');
            $table->string('telefono');  
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('codigo_comercial'); 
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_active')->default(0);
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
