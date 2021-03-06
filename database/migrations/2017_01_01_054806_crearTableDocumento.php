<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTableDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idPorMat')->unsigned();
            $table->index('idPorMat');
            $table->foreign('idPorMat')->references('id')->on('portafolio_materia')->onDelete('cascade');

            $table->integer('idPar')->unsigned();
            $table->index('idPar');
            $table->foreign('idPar')->references('id')->on('parametro')->onDelete('cascade');

            $table->integer('idProAca')->unsigned();
            $table->index('idProAca');
            $table->foreign('idProAca')->references('id')->on('producto_academico')->onDelete('cascade');

            $table->string('descripcion', 200);
            $table->string('urlArchivo', 500);
            $table->string('tipo', 200);
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
        Schema::dropIfExists('documento');
    }
}
