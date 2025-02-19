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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('idComentario');
            $table->tinyInteger('rating');
            $table->text('comentario');
            $table->unsignedBigInteger('idTema');
            $table->unsignedBigInteger('idUser');
            $table->date('fechaComentario');
            $table->timestamps();

            $table->foreign('idTema')->references('idTema')->on('temas');
            $table->foreign('idUser')->references('idUser')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
