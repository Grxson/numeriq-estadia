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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('rol');
            $table->string('foto')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('institucion')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idUser')->references('idUser')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
