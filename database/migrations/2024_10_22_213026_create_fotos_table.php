<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id('idFoto');  // Clave primaria
            $table->unsignedBigInteger('idPedido');  // Clave foránea hacia 'pedidos'
            $table->string('urlFoto');
            $table->timestamps();  // Agrega created_at y updated_at

            // Relación con 'pedidos', con eliminación en cascada
            $table->foreign('idPedido')
                  ->references('idPedido')
                  ->on('pedidos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos');
    }
}

