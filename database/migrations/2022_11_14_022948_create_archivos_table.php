<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id('pk_id_archivo')->unique()->comment('LLAVE PRIMARIA DE LA TABLA');
            $table->string('codigo_archivador', 100)->nullable()->comment('DATOS DEL ARCHIVADOR');
            $table->string('ubicacion', 500)->nullable()->comment('UBICACION DEL CONTENEDOR DE DOCUMENTO');
            $table->integer('fkp_tipo_documento')->nullable()->comment('TIPO DE DOCUMENTO PARAMETRIZADO');
            $table->integer('fkp_estado_documento')->nullable()->comment('ESTADO DE DOCUMENTO PARAMETRIZADO');
            $table->string('ruta', 250)->nullable()->comment('UBICACION DEL DOCUMENTO EN CODIGO');
            $table->date('fecha_archivo')->nullable()->comment('FECHA DEL ARCHIVO DEL DOCUMENTO');
            $table->integer('activo')->nullable()->default(1)->comment('ESTADO DEL REGISTRO');
            $table->integer('fk_user')->nullable()->comment('USUARIO REGISTRADOR');
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
        Schema::dropIfExists('archivos');
    }
}
