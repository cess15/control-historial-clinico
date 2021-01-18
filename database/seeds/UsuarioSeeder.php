<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DateTime;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return \DB::table('users')->insert([
            [
                'role_id'=>1,
                'cedula'=>'1206857375',
                'nombres'=>'César Santos',
                'apellidos'=>'Lata Jácome',
                'usuario'=>'admin',
                'email'=>'cesarlata1@gmail.com',
                'password'=>'$2y$12$ZhM5n8UreTdt2C3qbuaxweTSlKP89aTb714dYf8sQXAA5stHyTxaC',
                'telefono'=>'0988561847',
                'imagen_perfil'=>'',
                'genero'=>'Masculino',
                'confirmed'=>true,
                'confirmation_code'=>'',
                'created_at'=>'2021-01-10 20:37:29.456945-05',
                'updated_at'=>'2021-01-10 20:37:29.456945-05',
            ]
        ]);    
    }
}
