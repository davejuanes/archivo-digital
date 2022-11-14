<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpDescripcionParametricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pp_descripcion_parametricas', function (Blueprint $table) {
            $table->id('pk_id_descripcion_parametrica')->comment('CLAVE PRINCIPAL');
            $table->string('codigo', 250)->nullable()->comment('CODIGO O SIGLA');
            $table->string('descripcion', 250)->nullable()->comment('DESCRIPCION DE LA PARAMETRICA');
            $table->integer('nivel')->nullable()->comment('NIVEL DEL USUARIO');
            $table->integer('activo')->nullable()->default(1)->comment('VIGENTE');
            $table->timestamps();

            $table->integer('fk_id_parametrica')->unsigned();
            $table->foreign('fk_id_parametrica')->references('pk_id_parametrica')->on('pp_parametricas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pp_descripcion_parametricas');
    }
}
