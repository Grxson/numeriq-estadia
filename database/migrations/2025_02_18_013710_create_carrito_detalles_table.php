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
    if (!Schema::hasTable('carrito_detalles')) {
        Schema::create('carrito_detalles', function (Blueprint $table) {
            $table->id('idCarritoDetalle');
            $table->unsignedBigInteger('idCarrito');
            $table->unsignedBigInteger('idTema');
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();

            $table->foreign('idCarrito')->references('idCarrito')->on('carritos');
            $table->foreign('idTema')->references('idTema')->on('temas');
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_detalles');
    }
};
