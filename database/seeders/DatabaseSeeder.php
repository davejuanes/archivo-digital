<?php

namespace Database\Seeders;

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
        $this->call(UsuarioSeeder::class);
        $this->call(UserNivelSeeder::class);
        $this->call(ParametricaSeeder::class);
        $this->call(DescripcionParametricaSeeder::class);
    }
}
