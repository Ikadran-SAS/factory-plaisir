<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MenuController extends Controller
{
    /**
     * Page Landing — La Carte
     */
    public function index()
    {
        $burgers = Product::available()
            ->category('burgers')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $bagels = Product::available()
            ->category('bagels')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $cheesecakes = Product::available()
            ->category('cheesecake')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $bowls = Product::available()
            ->category('bowls')
            ->ordered()
            ->get()
            ->groupBy('subcategory');

        $seo = [
            'title' => 'La Carte | Factory & Co Val d\'Europe',
            'description' => 'Découvrez la carte complète de Factory & Co à Val d\'Europe. Smash Burgers anglais, Bagels New-Yorkais, Cheesecake premium, Bowls sains. Tous les ingrédients frais et délicieux.',
            'keywords' => 'carte factory co serris, menu factory co val d\'europe, burger bagel cheesecake serris',
            'canonical' => route('menu.index'),
            'h1' => 'La Carte – Factory & Co',
        ];

        return view('pages.menu.carte', compact('seo', 'burgers', 'bagels', 'cheesecakes', 'bowls'));
    }

}
