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
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('nivel_id')->nullable();
            $table->integer('categoria_id')->nullable();
            $table->integer('tarifa_id')->nullable();
            // $table->integer('categoria_id')->nullable();
            $table->float('precio', 8, 2)->nullable();
            $table->string('descripcion');
            $table->integer('estado')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
