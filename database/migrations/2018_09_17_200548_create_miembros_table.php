<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Matricula',12)->unique();
            $table->string('Nombre'); 
            $table->string('Primer_Apellido');
            $table->string('Segundo_Apellido')->nullable();
            $table->string('CURP',18)->unique();
            $table->string('Sexo'); 
            $table->integer('UID')->nullable();
            $table->string('U_Admin');
            $table->string('U_Admin_Cve')->nullable();
            $table->float('Porm_Gral');
            $table->integer('Semestre');
            $table->string('Email_Institucional',50)->unique();
            $table->string('Fecha_Nacimiento')->nullable();
            $table->integer('Edad');
            $table->string('Estado_Civil');
            $table->string('Telefono')->nullable();
            $table->string('Tel_Celular');
            $table->string('Calle')->nullable();
            $table->string('Colonia');
            $table->string('Municipio');
            $table->string('Estado');
            $table->string('Sit_Academica');
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
        Schema::dropIfExists('miembros');
    }
}
