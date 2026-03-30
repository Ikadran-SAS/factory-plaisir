<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Adaptation du contenu pour Factory & Co Plaisir
     * Remplace les références Val d'Europe/Serris par Plaisir/Mon Grand Plaisir
     */
    public function up(): void
    {
        $replacements = [
            "Val d'Europe" => 'Plaisir',
            'Val d\'Europe' => 'Plaisir',
            'Serris' => 'Plaisir',
            '14 Rue du Danube' => '1170 Av. de Saint-Germain',
            '77700' => '78370',
            'RER A Val d\'Europe' => 'Parking gratuit',
            'RER A Plaisir' => 'Parking gratuit',
            'RER E' => 'Transilien N',
            'Gare de l\'Est' => 'Paris Montparnasse',
            'Hausmann-St-Lazare' => 'Plaisir-Grignon',
            'gare du Val d\'Europe' => 'gare de Plaisir-Grignon',
            'Gare du Val d\'Europe' => 'Gare de Plaisir-Grignon',
            'gare du Plaisir' => 'gare de Plaisir-Grignon',
            'Disneyland Paris' => 'Mon Grand Plaisir',
            'Disneyland' => 'Mon Grand Plaisir',
            'CC Val d\'Europe' => 'CC Mon Grand Plaisir',
            'CC Plaisir' => 'CC Mon Grand Plaisir',
            'centre commercial Val d\'Europe' => 'centre commercial Mon Grand Plaisir',
            'centre commercial Plaisir' => 'centre commercial Mon Grand Plaisir',
            '8h30' => '8h00',
            '07h00' => '08h00',
            '22h00' => '21h30',
            '22h30' => '21h30',
            'Lundi–Mercredi' => 'Lundi–Jeudi',
            'Jeudi–Vendredi' => 'Vendredi–Samedi',
            'Samedi–Dimanche' => 'Dimanche',
        ];

        // Update FAQ items
        foreach ($replacements as $search => $replace) {
            DB::table('faq_items')
                ->where('question', 'like', "%{$search}%")
                ->orWhere('answer', 'like', "%{$search}%")
                ->get()
                ->each(function ($item) use ($search, $replace) {
                    DB::table('faq_items')
                        ->where('id', $item->id)
                        ->update([
                            'question' => str_replace($search, $replace, $item->question),
                            'answer' => str_replace($search, $replace, $item->answer),
                        ]);
                });
        }

        // Update blog posts
        foreach ($replacements as $search => $replace) {
            DB::table('blog_posts')
                ->where('title', 'like', "%{$search}%")
                ->orWhere('content', 'like', "%{$search}%")
                ->orWhere('excerpt', 'like', "%{$search}%")
                ->orWhere('meta_title', 'like', "%{$search}%")
                ->orWhere('meta_description', 'like', "%{$search}%")
                ->get()
                ->each(function ($item) use ($search, $replace) {
                    DB::table('blog_posts')
                        ->where('id', $item->id)
                        ->update([
                            'title' => str_replace($search, $replace, $item->title),
                            'slug' => str_replace(
                                ['val-europe', 'serris', 'val-d-europe'],
                                ['plaisir', 'plaisir', 'plaisir'],
                                $item->slug
                            ),
                            'content' => str_replace($search, $replace, $item->content),
                            'excerpt' => str_replace($search, $replace, $item->excerpt),
                            'meta_title' => str_replace($search, $replace, $item->meta_title ?? ''),
                            'meta_description' => str_replace($search, $replace, $item->meta_description ?? ''),
                            'image_alt' => str_replace($search, $replace, $item->image_alt ?? ''),
                        ]);
                });
        }

        // Update reviews
        foreach ($replacements as $search => $replace) {
            DB::table('reviews')
                ->where('content', 'like', "%{$search}%")
                ->get()
                ->each(function ($item) use ($search, $replace) {
                    DB::table('reviews')
                        ->where('id', $item->id)
                        ->update([
                            'content' => str_replace($search, $replace, $item->content),
                        ]);
                });
        }

        // Update opening hours for Plaisir schedule
        DB::table('opening_hours')->truncate();
        DB::table('opening_hours')->insert([
            [
                'days_label' => 'Lundi – Jeudi',
                'days_of_week' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday']),
                'opens_at' => '08:00:00',
                'closes_at' => '21:30:00',
                'sort_order' => 1,
            ],
            [
                'days_label' => 'Vendredi – Samedi',
                'days_of_week' => json_encode(['Friday', 'Saturday']),
                'opens_at' => '08:00:00',
                'closes_at' => '23:00:00',
                'sort_order' => 2,
            ],
            [
                'days_label' => 'Dimanche',
                'days_of_week' => json_encode(['Sunday']),
                'opens_at' => '08:00:00',
                'closes_at' => '21:30:00',
                'sort_order' => 3,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not reversible as it modifies content
    }
};
