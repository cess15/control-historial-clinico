<?php

use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('especialidades')->insert([
            [
                'id'=>1,
                'name'=>'Medicina General'
            ],
            [
                'id'=>2,
                'name'=>'Gerontología'
            ],
            [
                'id'=>3,
                'name'=>'Odontología'
            ],
            [
                'id'=>4,
                'name'=>'Urología'
            ],
            [
                'id'=>5,
                'name'=>'Ginecología'
            ],
            [
                'id'=>6,
                'name'=>'Traumotología'
            ],
            [
                'id'=>7,
                'nombre'=>'Optometría'
            ],
            [
                'id'=>8,
                'nombre'=>'Psicología'
            ],
            [
                'id'=>9,
                'nombre'=>'Terapia de Lenguaje'
            ],
            [
                'id'=>10,
                'nombre'=>'Terapia Respiratoria'
            ],
            [
                'id'=>11,
                'nombre'=>'Terapia Física'
            ],
        ]);
    }
}
