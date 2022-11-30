<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescripcionParametricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pp_descripcion_parametricas')->insert([

            [
                'codigo' => 'I',
                'descripcion' => 'INCIADO',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'codigo' => 'EP',
                'descripcion' => 'EN PROCESO',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'codigo' => 'R',
                'descripcion' => 'RECHAZADO',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'codigo' => 'P',
                'descripcion' => 'PENDIENTE',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'codigo' => 'R',
                'descripcion' => 'RESOLUCION',
                'nivel' => '0',
                'fk_id_parametrica' => '2',
            ],
            [
                'codigo' => 'E',
                'descripcion' => 'EDICTO',
                'nivel' => '0',
                'fk_id_parametrica' => '2',
            ],
            [
                'codigo' => 'T',
                'descripcion' => 'TESTIMONIO',
                'nivel' => '0',
                'fk_id_parametrica' => '2',
            ],
            [
                'codigo' => 'TI',
                'descripcion' => 'TRAMITE INFORMAL',
                'nivel' => '0',
                'fk_id_parametrica' => '2',
            ],
            [
                'codigo' => 'B',
                'descripcion' => 'BUENO',
                'nivel' => '0',
                'fk_id_parametrica' => '3',
            ],
            [
                'codigo' => 'R',
                'descripcion' => 'REGULAR',
                'nivel' => '0',
                'fk_id_parametrica' => '3',
            ],
            [
                'codigo' => 'B',
                'descripcion' => 'MALO',
                'nivel' => '0',
                'fk_id_parametrica' => '3',
            ],
            [
                'codigo' => 'D',
                'descripcion' => 'DETERIORADO',
                'nivel' => '0',
                'fk_id_parametrica' => '3',
            ],
        ]);
    }
}
