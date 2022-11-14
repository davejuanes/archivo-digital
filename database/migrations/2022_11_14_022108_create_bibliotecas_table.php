<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliotecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotecas', function (Blueprint $table) {
            $table->id('pk_id_biblioteca')->unique()->comment('LLAVE PRIMARIA DE LA TABLA');
            $table->string('numero_normativa', 100)->nullable()->comment('NUMERO O CODIGO DE LA NORMATIVA ALMACENADA');
            $table->string('descripcion', 250)->nullable()->comment('NOMBRE O DESCRIPCION DE LA NORMATIVA');
            $table->string('ruta', 150)->nullable()->comment('RUTA DEL DOCUMENTO ALMACENADO');
            $table->date('fecha_promulgacion')->nullable()->comment('FECHA DE PROMULGACION DE LA NORMATIVA');
            $table->integer('fkp_tipo_normativa')->nullable()->comment('TIPO DE NORMATIVA PARAMETRIZADA');
            $table->integer('fkp_estado')->nullable()->comment('ESTADO DE NORMATIVA PARAMETRIZADA');
            $table->timestamps();

            $table->integer('activo')->nullable()->default(1)->comment('ESTADO DEL REGISTRO');
            $table->integer('fk_user')->nullable()->comment('USUARIO REGISTRADOR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibliotecas');
    }
}
