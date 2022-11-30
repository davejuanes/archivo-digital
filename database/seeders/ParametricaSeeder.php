<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pp_parametricas')->insert([

            //id=1
            [
                'descripcion' => 'ESTADO',
            ],
            //id=2
            [
                'descripcion' => 'TIPOS DE DOCUMENTOS',
            ],
            //id=3
            [
                'descripcion' => 'ESTADOS DE DOCUMENTOS',
            ],
        ]);
    }
}
