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
        Schema::create('rollos', function (Blueprint $table) {
            $table->id();
            $table->integer('prontuario');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('identificacion', 50);
            $table->string('nombrearchivo');
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rollos');
    }
};
