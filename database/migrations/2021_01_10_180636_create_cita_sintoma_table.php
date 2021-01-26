<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitaSintomaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_sintoma', function (Blueprint $table) {
            $table->unsignedInteger('sintoma_id')->nullable();
            $table->unsignedInteger('cita_reservada_id')->nullable();

            $table->foreign('sintoma_id')
                ->references('id')
                ->on('sintomas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('cita_reservada_id')
                ->references('id')
                ->on('citas_reservadas')
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
        Schema::dropIfExists('cita_sintoma');
    }
}
