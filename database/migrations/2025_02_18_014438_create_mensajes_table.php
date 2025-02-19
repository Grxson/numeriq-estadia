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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id('idMensaje');
            $table->unsignedBigInteger('idRemitente');
            $table->unsignedBigInteger('idDestinatario');
            $table->string('asunto');
            $table->text('cuerpo');
            $table->dateTime('fechaEnvio');
            $table->boolean('leido')->default(false);
            $table->timestamps();

            $table->foreign('idRemitente')->references('idUser')->on('users');
            $table->foreign('idDestinatario')->references('idUser')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
