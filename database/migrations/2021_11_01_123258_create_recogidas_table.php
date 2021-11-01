<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecogidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recogidas', function (Blueprint $table) {
            $table->id();
            $table->integer('trabajo_id');          
            $table->unsignedBigInteger('user_id');
            $table->boolean('vaciado')->default(0);
            $table->boolean('arcadainferior')->default(0);
            $table->boolean('arcadasuperior')->default(0);
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
        Schema::dropIfExists('recogidas');
    }
}
