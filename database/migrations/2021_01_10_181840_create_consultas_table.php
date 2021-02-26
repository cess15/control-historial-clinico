<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('historia_clinica_id')->nullable();
            $table->unsignedInteger('medico_id')->nullable();
            $table->text('diagnostico');
            $table->text('recomendacion');
            $table->text('observacion');
            $table->timestamps();

            $table->foreign('historia_clinica_id')
                ->references('id')
                ->on('historia_clinica')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('medico_id')
                ->references('id')
                ->on('medicos')
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
        Schema::dropIfExists('consultas');
    }
}
