<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
			$table->integer('tipo_cod');
			$table->string('nombre_paciente',50);
			$table->string('apellidos_paciente',100);
			$table->integer('edad');
			$table->string('nombre_clinica',100);
			$table->string('nombre_doctor',100);
			$table->longText('objetivos');
			$table->timestamp('fecha_solicitud')->nullable();
			$table->integer('estado_cod');
            $table->integer('tarifa_cod');
            $table->string('numero_expediente',100);
            $table->string('numero_colegiado',100);
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
}
