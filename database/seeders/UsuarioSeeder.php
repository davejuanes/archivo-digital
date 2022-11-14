<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@correo.com',
                'nivel' => '1',
                'password' => '$2y$10$woiOtip5xFSMpeK.qlf9q.aK6zCp1iF9z/XXntmaIZkzIHLnWEaOO',
            ],
        ]);
    }
}
