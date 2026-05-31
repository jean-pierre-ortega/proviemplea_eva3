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
        Schema::create('contacto_solicitados', function (Blueprint $table) {
            $table->id();

            $table->foreignId('empresa_id')->constrained('empresas');
            $table->foreignId('persona_id')->constrained('personas');

            $table->string('estado');
            $table->string('notas_admin')->nullable();

            $table->date('fecha_contacto')->nullable();
            $table->date('fecha_entrevista')->nullable();
            $table->date('fecha_resultado')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto_solicitados');
    }
};
