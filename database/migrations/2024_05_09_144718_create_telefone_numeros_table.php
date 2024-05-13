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
        Schema::create('telefone_numeros', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->integer('tipo');
            $table->timestamps();
            $table->foreignId('contato_id')->constrained('contatos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefone_numeros');
    }
};
