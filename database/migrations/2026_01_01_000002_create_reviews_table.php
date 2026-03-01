<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_initial');               // Initiale pour l'avatar
            $table->string('avatar_color')->default('#1B263A'); // Couleur de fond de l'avatar
            $table->tinyInteger('rating');                  // Note de 1 à 5
            $table->text('content');                        // Contenu de l'avis
            $table->string('source')->default('google');    // google | tripadvisor
            $table->string('date_label');                   // "Il y a 2 semaines"
            $table->boolean('is_featured')->default(false); // Affiché sur la home
            $table->boolean('is_visible')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('is_featured');
            $table->index('source');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
