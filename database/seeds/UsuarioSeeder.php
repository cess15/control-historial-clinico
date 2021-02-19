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
                'cedula'=>'',
                'nombres'=>'Andreina',
                'apellidos'=>'Pérez',
                'usuario'=>'admin',
                'email'=>'pandreina25@yahoo.es',
                'email_verified_at'=>'2021-01-10 20:37:29.456945-05',
                'updated'=>true,
                'password'=>'$2y$12$ZhM5n8UreTdt2C3qbuaxweTSlKP89aTb714dYf8sQXAA5stHyTxaC',
                'telefono'=>'0963295489',
                'imagen_perfil'=>'user_logo.png',
                'url_imagen_perfil'=>'/foto/user_logo.png',
                'genero'=>'Femenino',
                'created_at'=>'2021-01-10 20:37:29.456945-05',
                'updated_at'=>'2021-01-10 20:37:29.456945-05',
            ],
            [
                'role_id'=>2,
                'cedula'=>'1206857375',
                'nombres'=>'César',
                'apellidos'=>'Lata',
                'usuario'=>'cess15',
                'email'=>'cesarlata1@hotmail.com',
                'email_verified_at'=>'2021-01-10 20:37:29.456945-05',
                'updated'=>true,
                'password'=>'$2y$12$ZhM5n8UreTdt2C3qbuaxweTSlKP89aTb714dYf8sQXAA5stHyTxaC',
                'telefono'=>'0988561847',
                'imagen_perfil'=>'user_logo.png',
                'url_imagen_perfil'=>'/foto/user_logo.png',
                'genero'=>'Masculino',
                'created_at'=>'2021-01-10 20:37:29.456945-05',
                'updated_at'=>'2021-01-10 20:37:29.456945-05',
            ],
            [
                'role_id'=>3,
                'cedula'=>'1207342872',
                'nombres'=>'Julissa',
                'apellidos'=>'Jara',
                'usuario'=>'juli25',
                'email'=>'julissacjj@gmail.com',
                'email_verified_at'=>'2021-01-10 20:37:29.456945-05',
                'updated'=>true,
                'password'=>'$2y$12$ZhM5n8UreTdt2C3qbuaxweTSlKP89aTb714dYf8sQXAA5stHyTxaC',
                'telefono'=>'0990940393',
                'imagen_perfil'=>'user_logo.png',
                'url_imagen_perfil'=>'/foto/user_logo.png',
                'genero'=>'Femenino',
                'created_at'=>'2021-01-10 20:37:29.456945-05',
                'updated_at'=>'2021-01-10 20:37:29.456945-05',
            ],
            [
                'role_id'=>4,
                'cedula'=>'1207342914',
                'nombres'=>'Linda',
                'apellidos'=>'Estefania',
                'usuario'=>'linda25',
                'email'=>'linda98vb@gmail.com',
                'email_verified_at'=>'2021-01-10 20:37:29.456945-05',
                'updated'=>true,
                'password'=>'$2y$12$ZhM5n8UreTdt2C3qbuaxweTSlKP89aTb714dYf8sQXAA5stHyTxaC',
                'telefono'=>'0983677534',
                'imagen_perfil'=>'user_logo.png',
                'url_imagen_perfil'=>'/foto/user_logo.png',
                'genero'=>'Femenino',
                'created_at'=>'2021-01-10 20:37:29.456945-05',
                'updated_at'=>'2021-01-10 20:37:29.456945-05',
            ],
            [
                'role_id'=>5,
                'cedula'=>'1207016187',
                'nombres'=>'Francisco',
                'apellidos'=>'Remache',
                'usuario'=>'francisco25',
                'email'=>'deweplaynow@gmail.com',
                'email_verified_at'=>'2021-01-10 20:37:29.456945-05',
                'updated'=>true,
                'password'=>'$2y$12$ZhM5n8UreTdt2C3qbuaxweTSlKP89aTb714dYf8sQXAA5stHyTxaC',
                'telefono'=>'0991930292',
                'imagen_perfil'=>'user_logo.png',
                'url_imagen_perfil'=>'/foto/user_logo.png',
                'genero'=>'Masculino',
                'created_at'=>'2021-01-10 20:37:29.456945-05',
                'updated_at'=>'2021-01-10 20:37:29.456945-05',
            ],
        ]);    
    }
}
