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
                'nombres'=>'Andreina',
                'apellidos'=>'Pérez',
                'usuario'=>'admin',
                'email'=>'pandreina25@yahoo.es',
                'email_verified_at'=>'2021-01-10 20:37:29.456945-05',
                'password'=>'$2y$12$ZhM5n8UreTdt2C3qbuaxweTSlKP89aTb714dYf8sQXAA5stHyTxaC',
                'telefono'=>'0963295489',
                'genero'=>'Femenino',
                'created_at'=>'2021-01-10 20:37:29.456945-05',
                'updated_at'=>'2021-01-10 20:37:29.456945-05',
            ]
        ]);    
    }
}
