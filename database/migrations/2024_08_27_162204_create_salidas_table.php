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
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            // $table->string('nombre')->nullable();
            $table->integer('cliente_id')->nullable();
            $table->integer('habitacion_id')->nullable();
            $table->integer('recepcion_detalle_id')->nullable();
            $table->integer('tipo_pago_id')->nullable();

            $table->float('mora_penalidad', 8, 2)->nullable();
            $table->float('precio_habitacion', 8, 2)->nullable();
            $table->date('fecha_entrada')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->time('hora_entrada')->nullable();
            $table->time('hora_salida')->nullable();

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
        Schema::dropIfExists('salidas');
    }
};
