<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('roles')->insert([
            [
                'id'=>1,
                'nombre'=>'Administrador'
            ],
            [
                'id'=>2,
                'nombre'=>'Médico'
            ],
            [
                'id'=>3,
                'nombre'=>'Paciente'
            ],
        ]);
    }
}
