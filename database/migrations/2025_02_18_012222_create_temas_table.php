<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id('idTema');
            $table->string('nombreTema');
            $table->text('descripcionTema')->nullable();
            $table->string('imagenTema')->nullable();
            $table->integer('numUsuarios');
            $table->integer('likes');
            $table->decimal('precio', 8, 2);
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idNivel');
            $table->integer('horasContenido');
            $table->date('fechaUltimaActualizacion');
            $table->string('idioma');
            $table->boolean('certificado');
            $table->timestamps();

            $table->foreign('idCategoria')->references('idCategoria')->on('categorias');
            $table->foreign('idNivel')->references('idNivel')->on('nivel_educativos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temas');
    }
};
