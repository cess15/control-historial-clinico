<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaClinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinica', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paciente_id')->nullable();
            $table->string('descripcion', 255);
            $table->boolean('operado')->default(0);
            $table->boolean('enfermedad_cardiaca')->default(0);
            $table->timestamps();

            $table->foreign('paciente_id')
                ->references('id')
                ->on('pacientes')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('historia_clinica');
    }
}
