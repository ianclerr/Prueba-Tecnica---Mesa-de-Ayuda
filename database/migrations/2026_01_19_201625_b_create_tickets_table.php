<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('tickets', function ($table) {
        $table->id();
        $table->string('titulo');
        $table->text('descripcion');
        $table->enum('prioridad', ['baja', 'media', 'alta'])->default('baja');
        $table->enum('estado', ['abierto', 'en_proceso', 'cerrado'])->default('abierto');
        $table->foreignId('created_by')->constrained('users'); // Aquí busca a users
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
