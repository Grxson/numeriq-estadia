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
        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id('idInscripcion');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idTema');
            $table->string('estado');
            $table->date('fechaInscripcion');
            $table->decimal('progreso', 5, 2);
            $table->timestamps();

            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idTema')->references('idTema')->on('temas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripcions');
    }
};
