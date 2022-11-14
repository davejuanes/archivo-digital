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
                'descripcion' => 'MONEDA',
            ],
            //id=2
            [
                'descripcion' => 'PERIODO',
            ],
            //id=3
            [
                'descripcion' => 'FASE PROYECTO',
            ],
            //id=4
            [
                'descripcion' => 'TIPO PROYECTO',
            ],
            //id=5
            [
                'descripcion' => 'SUPERFICIE RODADURA',
            ],
            //id=6
            [
                'descripcion' => 'ESTADO OBRA INTERVENCIÓN',
            ],
            //id=7
            [
                'descripcion' => 'MODALIDAD CONTRATACION',
            ],
            //id=8
            [
                'descripcion' => 'MES',
            ],
            //id=9
            [
                'descripcion' => 'TIPOS FORMULARIO POA',
            ],
            //id=10
            [
                'descripcion' => 'ESTADO POA',
            ],
            //id=11
            [
                'descripcion' => 'NO CORRESPONDE',
            ],
            //id=12
            [
                'descripcion' => 'GESTIONES',
            ],
            //id=13
            [
                'descripcion' => 'TIPO DE FUNCIONAMIENTO',
            ],
            //id=14
            [
                'descripcion' => 'TIPO CONSULTORIA',
            ],
            //id=15
            [
                'descripcion' => 'UNIDAD DE MEDIDA',
            ],
            //id=16
            [
                'descripcion' => 'TIPO DE COMPONENTE',
            ],
            //id=17
            [
                'descripcion' => 'DEPARTAMENTO',
            ],
            //id=18
            [
                'descripcion' => 'EJE DE INTEGRACION',
            ],
            //id=19
            [
                'descripcion' => 'CORREDOR',
            ],
            //id=20
            [
                'descripcion' => 'ESTADO REGISTRO',
            ],
            //id=21
            [
                'descripcion' => 'ESTADO CONTRATACION',
            ],
            //id=22
            [
                'descripcion' => 'TIPO CONSULTORIA',
            ],
            //id=23
            [
                'descripcion' => 'TIPO PROGRAMACION INVERSION',
            ],
            //id=24
            [
                'descripcion' => 'PRIORIZACION',
            ],
            //id=25
            [
                'descripcion' => 'TIPO CONVENIO',
            ],
            //id=26
            [
                'descripcion' => 'ETAPA POA',
            ],
            //id=27
            [
                'descripcion' => 'POA',
            ],
            //id=28
            [
                'descripcion' => 'TIPO DE DOCUMENTO',
            ],
            //id=29
            [
                'descripcion' => 'ESTADO FORMULARIO',
            ],
            //id=30
            [
                'descripcion' => 'VIGENCIA',
            ],
            //id=31
            [
                'descripcion' => 'ROLES',
            ],
            //id=32
            [
                'descripcion' => 'CUMPLIMIENTO',
            ],
            //id=33
            [
                'descripcion' => 'COMPROBANTES',
            ],
            //id=34
            [
                'descripcion' => 'FUENTES DE FONDOS',
            ],
            //id=35
            [
                'descripcion' => 'BANCOS TESORERIA',
            ],
            //id=36
            [
                'descripcion' => 'TIPOS DE DOCUMENTOS',
            ],
            //id=37
            [
                'descripcion' => 'IMPUTACIONES',
            ],
            //id=38
            [
                'descripcion' => 'TIPO DE DOCUMENTO C-21',
            ],
            //id=39
            [
                'descripcion' => 'MEDIOS DE PERCEPCION',
            ],
            //id=40
            [
                'descripcion' => 'DOCUMENTOS DE RESPALDO',
            ],
            //id=41
            [
                'descripcion' => 'TIPOS REGISTROS',
            ],
            //id=42
            [
                'descripcion' => 'TIPOS DE PAGO ',
            ],
            // id=43
            [
                'descripcion' => 'TIPOS CONTRATOS'
            ],
            // id=44
            [
                'descripcion' => 'TIPOS INICIOS'
            ],
            // id = 45
            [
                'descripcion' => 'TIPOS ADJUNTOS'
            ],
            // id = 46
            [
                'descripcion' => 'NIVELES DEL SISTEMA'
            ]

        ]);
    }
}
