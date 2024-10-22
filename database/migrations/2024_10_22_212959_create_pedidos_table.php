<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('idPedido');  // Clave primaria
            $table->unsignedBigInteger('idCliente');  // Clave foránea hacia 'clientes'
            $table->date('fechaPedido');
            $table->enum('estado', ['Ordenado', 'En proceso', 'En ruta', 'Entregado']);
            $table->string('direccionEntrega');
            $table->text('notas')->nullable();
            $table->timestamps();  // Agrega created_at y updated_at

            // Relación con 'clientes' con eliminación en cascada
            $table->foreign('idCliente')
                  ->references('idCliente')
                  ->on('clientes')
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
        Schema::dropIfExists('pedidos');
    }
}




