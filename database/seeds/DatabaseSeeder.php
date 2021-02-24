<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(EspecialidadSeeder::class);
        $this->call(MedicoSeeder::class);
        $this->call(PacienteSeeder::class);
    }
}
