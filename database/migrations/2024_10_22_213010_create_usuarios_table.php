<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idUsuario');  // Clave primaria
            $table->unsignedBigInteger('idRol');  // Clave foránea, mismo tipo que idRol en roles
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        
            // Definir la relación foránea con eliminación en cascada
            $table->foreign('idRol')
                  ->references('idRol')
                  ->on('roles')
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
        Schema::dropIfExists('usuarios');
    }
}

