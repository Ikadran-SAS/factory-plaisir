<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');                          // Nom du produit
            $table->string('slug')->unique();                // URL-friendly
            $table->string('category');                      // burgers | bagels | cheesecake | bowls
            $table->string('subcategory')->nullable();       // smash | halal | kids | veggie | etc.
            $table->text('description');                     // Description courte
            $table->text('ingredients')->nullable();         // Liste des ingrédients
            $table->decimal('price', 5, 2);                  // Prix en euros
            $table->string('badge')->nullable();             // Best-seller | Signature | Halal | Nouveau | etc.
            $table->string('badge_color')->default('pink');  // pink | green | dark | navy
            $table->string('image_url')->nullable();         // URL de l'image
            $table->boolean('is_halal')->default(false);
            $table->boolean('is_vegetarian')->default(false);
            $table->boolean('is_vegan')->default(false);
            $table->boolean('is_featured')->default(false);  // Mis en avant sur la home
            $table->boolean('is_available')->default(true);
            $table->json('allergens')->nullable();            // Liste des allergènes
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('category');
            $table->index('is_featured');
            $table->index('is_available');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
