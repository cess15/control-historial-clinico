<?php

use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('medicos')->insert([
            [
                'usuario_id'=>2,
                'especialidad_id'=>3,
            ]
        ]);
    }
}
