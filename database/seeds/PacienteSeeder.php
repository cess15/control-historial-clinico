<?php

use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('pacientes')->insert([
            [
                'usuario_id'=>3,
                'tipo_sangre'=>'O+',
                'discapacidad'=>false,
                'fecha_nacimiento'=>'1996-07-17',
                'ocupacion'=>'Estudiante',
                'direccion'=>'Vía Pisagua',
                'ciudad'=>'Montalvo',
                'estado_civil'=>'Soltero'
            ]
        ]);
    }
}
