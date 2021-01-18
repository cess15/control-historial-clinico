<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasReservadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas_reservadas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('paciente_id')->nullable();
            $table->unsignedInteger('cita_id')->nullable();
            $table->boolean('pagada')->default(0);
            $table->string('descripcion', 255);
            $table->timestamps();

            $table->foreign('paciente_id')
                ->references('id')
                ->on('pacientes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->foreign('cita_id')
                ->references('id')
                ->on('citas')
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
        Schema::dropIfExists('citas_reservadas');
    }
}
