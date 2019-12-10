<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_adds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->string('rfc')->nullable();
            $table->string('cedula_profesional')->nullable();
            $table->text('certificacion')->nullable();
            $table->text('permisos_especiales')->nullable();
            $table->text('otro')->nullable();
            $table->boolean('fines_semana')->default(false);
            $table->boolean('tiempo_completo')->default(false);
            $table->boolean('domicilio')->default(false);
            $table->boolean('atencion_inmediata')->default(false);
            $table->boolean('servicios_externos')->default(false);
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
        Schema::dropIfExists('data_adds');
    }
}
