<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserNivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_nivels')->insert([
            [
                'fkp_rol' => '311',
                'nivel' => '1',
                'logueado' => '1',
                'fk_user' => '1',
                'fk_id_user' => '1',
            ],
            [
                'fkp_rol' => '312',
                'nivel' => '2',
                'logueado' => '0',
                'fk_user' => '1',
                'fk_id_user' => '1',
            ],
            [
                'fkp_rol' => '313',
                'nivel' => '3',
                'logueado' => '0',
                'fk_user' => '1',
                'fk_id_user' => '1',
            ],
            [
                'fkp_rol' => '314',
                'nivel' => '4',
                'logueado' => '0',
                'fk_user' => '1',
                'fk_id_user' => '1',
            ],
        ]);
    }
}
