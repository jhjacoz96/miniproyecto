<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('estatus')->default('A');
            
            // clave foranea  Departamento
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on("departamentos")->nullable();
    
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
        Schema::dropIfExists('empleados');
    }
}
