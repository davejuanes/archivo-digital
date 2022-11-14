<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpParametricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pp_parametricas', function (Blueprint $table) {
            $table->id('pk_id_parametrica')->comment('CLAVE PRINCIPAL');
            $table->string('descripcion')->nullable()->comment('NOMBRE DE LA PARAMETRICA');
            $table->integer('activo')->nullable()->default(1)->comment('VIGENTE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pp_parametricas');
    }
}
