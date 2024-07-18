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
        Schema::create('recepcion_producto_venta', function (Blueprint $table) {
            $table->id();
            $table->float('cantidad', 8, 2)->nullable();
            $table->float('precio', 8, 2)->nullable();
            $table->integer('producto_id')->nullable();
            $table->integer('recepcion_id')->nullable();
            $table->integer('recepcion_detalle_id')->nullable();
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
        Schema::dropIfExists('recepcion_producto_venta');
    }
};
