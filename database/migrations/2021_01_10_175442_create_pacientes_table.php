<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id')->nullable();
            $table->enum('tipo_sangre', ['O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+'])->nullable();
            $table->boolean('discapacidad')->default(0);
            $table->date('fecha_nacimiento');
            $table->string('ocupacion', 255);
            $table->string('direccion', 45);
            $table->string('ciudad', 45);
            $table->enum('estado_civil', ['Soltero/a', 'Casado/a', 'Divorciado/a', 'Vuido/a'])->nullable();

            $table->foreign('usuario_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('pacientes');
    }
}
