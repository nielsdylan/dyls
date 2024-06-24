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
        Schema::create('recepcion_detalles', function (Blueprint $table) {
            $table->id();
            $table->integer('recepcion_id')->nullable();
            $table->integer('cliente_id')->nullable();
            $table->date('fecha_entrada')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->time('hora_entrada')->nullable();
            $table->time('hora_salida')->nullable();
            $table->float('adelanto', 8, 2)->nullable();
            $table->float('saldo', 8, 2)->nullable();
            $table->float('total', 8, 2)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('estado_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepcion_detalles');
    }
};
