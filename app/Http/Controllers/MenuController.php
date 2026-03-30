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
            'title' => 'Carte & Menu | Factory & Co Plaisir 78 – Mon Grand Plaisir',
            'description' => 'Menu Factory & Co Plaisir : smash burgers artisanaux, bagels new-yorkais, cheesecakes, bowls. Options végétariennes. Mon Grand Plaisir, Yvelines.',
            'keywords' => 'carte factory co plaisir 78, menu restaurant plaisir yvelines, burger smash plaisir, bagel cheesecake mon grand plaisir, bowl végétarien plaisir',
            'canonical' => route('menu.index'),
            'h1' => 'La Carte – Factory & Co Plaisir',
        ];

        return view('pages.menu.carte', compact('seo', 'burgers', 'bagels', 'cheesecakes', 'bowls'));
    }
}
