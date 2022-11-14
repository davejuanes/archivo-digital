<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('pk_id_cliente')->unique()->commnet('LLAVE PRIMARIA DE LA TABLA');
            $table->string('nombre', 150)->nullable()->comment('NOMBRE DE CLIENTE');
            $table->string('numero_ci', 10)->nullable()->comment('NUMERO DE CI DE CLIENTE');
            $table->string('numero_telefono', 20)->nullable()->comment('NUMERO DE CONTACTO');
            $table->string('email', 100)->nullable()->comment('CORREO ELECTRONICO DEL CLIENTE');
            $table->string('direccion', 250)->nullable()->comment('DIRECCION DEL CLIENTE');
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
        Schema::dropIfExists('clientes');
    }
}
