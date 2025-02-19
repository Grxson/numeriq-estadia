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
        Schema::create('deseos', function (Blueprint $table) {
            $table->id('idDeseo');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idTema');
            $table->date('fechaAgregado');
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
        Schema::dropIfExists('deseos');
    }
};
