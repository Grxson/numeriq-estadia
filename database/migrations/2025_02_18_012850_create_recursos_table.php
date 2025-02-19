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
        Schema::create('recursos', function (Blueprint $table) {
            $table->id('idRecurso');
            $table->string('tipoRecurso');
            $table->string('tituloRecurso');
            $table->text('descripcionRecurso')->nullable();
            $table->string('urlRecurso');
            $table->integer('duracionVideo')->nullable();
            $table->string('tipoExamen')->nullable();
            $table->unsignedBigInteger('idTema');
            $table->timestamps();
            $table->foreign('idTema')->references('idTema')->on('temas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos');
    }
};
