<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained('recipes')->onDelete('cascade'); // Corrigido para 'recipes'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('rating')->unsigned(); // Definido como unsigned
            $table->text('comment')->nullable(); // Comentário opcional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
