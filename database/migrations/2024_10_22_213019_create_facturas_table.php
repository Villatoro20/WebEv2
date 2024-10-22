<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('idFactura');  // Clave primaria
            $table->unsignedBigInteger('idPedido');  // Clave foránea hacia 'pedidos'
            $table->string('numeroFactura')->unique();
            $table->date('fechaEmision');
            $table->decimal('montoTotal', 10, 2);
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
        Schema::dropIfExists('facturas');
    }
}

