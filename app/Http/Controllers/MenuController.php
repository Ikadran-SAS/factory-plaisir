<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MenuController extends Controller
{
    /**
     * Page Silo 1 — L'Atelier Burger
     */
    public function burgers()
    {
        $products = Product::available()
            ->category('burgers')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title'       => 'Burgers Toulouse Aéroport – Smash Burger, Halal, Veggie | Factory & Co',
            'description' => 'Découvrez L\'Atelier Burger de Factory & Co à l\'Aéroport Toulouse-Blagnac. Smash Burgers au bœuf français, options Halal certifiées, menus enfants. Hall C, Portes 30-36.',
            'keywords'    => 'burger toulouse aéroport, smash burger blagnac, burger halal toulouse, meilleur burger blagnac, factory and co burger',
            'canonical'   => route('menu.burgers'),
            'h1'          => 'L\'Atelier Burger – Smash Burgers à l\'Aéroport Toulouse-Blagnac',
        ];

        return view('pages.menu.burgers', compact('products', 'seo'));
    }

    /**
     * Page Silo 2 — Bagels New-Yorkais
     */
    public function bagels()
    {
        $products = Product::available()
            ->category('bagels')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title'       => 'Bagels Toulouse Aéroport – Breakfast Américain dès 07h00 | Factory & Co',
            'description' => 'Bagels frais new-yorkais à l\'Aéroport Toulouse-Blagnac. Chauds, froids, à composer. Petit-déjeuner américain dès 07h00 en zone réservée Hall C.',
            'keywords'    => 'bagel toulouse aéroport, petit déjeuner américain toulouse, bagel frais blagnac, breakfast aéroport toulouse, factory and co bagel',
            'canonical'   => route('menu.bagels'),
            'h1'          => 'Bagels New-Yorkais – Breakfast dès 07h00 à l\'Aéroport Toulouse',
        ];

        return view('pages.menu.bagels', compact('products', 'seo'));
    }

    /**
     * Page Silo 3 — Cheesecake Factory
     */
    public function cheesecake()
    {
        $products = Product::available()
            ->category('cheesecake')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title'       => 'Cheesecake Toulouse – Recettes New-Yorkaises du Chef | Factory & Co',
            'description' => 'Le meilleur cheesecake de Toulouse à l\'Aéroport Toulouse-Blagnac. Recettes du chef Jonathan Jablonski : New-Yorkais classique, Oreo, Kinder Bueno, Spéculoos. À emporter en coffret.',
            'keywords'    => 'cheesecake toulouse, meilleur cheesecake toulouse, cheesecake aéroport toulouse, pâtisserie américaine blagnac, factory and co cheesecake',
            'canonical'   => route('menu.cheesecake'),
            'h1'          => 'Cheesecake Factory – Pâtisseries New-Yorkaises à Toulouse-Blagnac',
        ];

        return view('pages.menu.cheesecake', compact('products', 'seo'));
    }

    /**
     * Page Silo 4 — Healthy & Bowls
     */
    public function bowls()
    {
        $products = Product::available()
            ->category('bowls')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title'       => 'Bowls & Salades Saines – Vegan, Végétarien | Factory & Co Toulouse',
            'description' => 'Super Bowls, salades sur mesure et options véganes à l\'Aéroport Toulouse-Blagnac. Manger sain et équilibré avant votre vol. Hall C, Portes 30-36.',
            'keywords'    => 'bowl sain toulouse aéroport, salade healthy blagnac, vegan aéroport toulouse, manger sain aéroport toulouse, factory and co bowl',
            'canonical'   => route('menu.bowls'),
            'h1'          => 'Healthy & Bowls – Manger Sain à l\'Aéroport Toulouse-Blagnac',
        ];

        return view('pages.menu.bowls', compact('products', 'seo'));
    }
}
