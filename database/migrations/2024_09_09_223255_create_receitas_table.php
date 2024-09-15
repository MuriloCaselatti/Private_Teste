<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Adiciona a coluna 'title'
            $table->text('description'); // Adiciona a coluna 'description'
            $table->text('ingredients')->nullable(); // Adiciona a coluna 'ingredients' (opcional)
            $table->text('steps')->nullable(); // Adiciona a coluna 'steps' (opcional)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receitas');
    }
};
