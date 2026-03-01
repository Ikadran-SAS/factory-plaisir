<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            $table->string('category');                     // acces | horaires | allergenes | commande
            $table->string('category_label');               // Libellé affiché
            $table->string('category_icon')->default('❓'); // Emoji icône
            $table->string('question');
            $table->text('answer');                         // Réponse HTML
            $table->boolean('is_visible')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('category');
            $table->index('is_visible');
        });

        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->string('days_label');                   // "Lundi – Mercredi"
            $table->json('days_of_week');                   // ["Monday","Tuesday","Wednesday"]
            $table->time('opens_at');
            $table->time('closes_at');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faq_items');
        Schema::dropIfExists('opening_hours');
    }
};
