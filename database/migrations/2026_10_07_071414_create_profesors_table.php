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
        Schema::create('profesor', function (Blueprint $table) {
            $table->id();
             //nombre
            $table ->string('nombre', 100);
            //apellidos
             $table ->string('apellido', 100);
             //especialidad
             $table ->string('especialidad', 100);
            //fecha de alta
             $table ->date('fchalt') ->nullable();
            //salario
            $table->decimal('salario', 8, 2)->nullable();
            $table->timestamps();
            $table->unique(['nombre', 'apellido']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor');
    }
};