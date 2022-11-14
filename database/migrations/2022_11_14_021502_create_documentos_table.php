<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('pk_id_documento')->unique()->comment('LLAVE PRIMARIA DE LA TABLA');
            $table->string('codigo', 100)->nullable()->comment('CODIGO DEL DOCUMENTO');
            $table->string('contenido', 3000)->nullable()->comment('TEXTO DEL DOCUMENTO');
            $table->date('fecha_inicio')->nullable()->comment('FECHA DE INICIO DEL DOCUMENTO O CASO');
            $table->date('fecha_fin')->nullable()->comment('FECHA DE FINALIZACION DEL DOCUMENTO O CASO');
            $table->integer('fkp_estado')->nullable()->comment('PARAMETRICA DEL ESTADO DE DOCUMENTO');
            $table->timestamps();

            $table->integer('fk_id_cliente')->unsigned();
            $table->foreign('fk_id_cliente')->references('pk_id_cliente')->on('clientes');

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
        Schema::dropIfExists('documentos');
    }
}
