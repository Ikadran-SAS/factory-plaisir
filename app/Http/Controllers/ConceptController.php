<?php

namespace App\Http\Controllers;

class ConceptController extends Controller
{
    public function index()
    {
        $seo = [
            'title' => 'Notre Concept | Factory & Co Plaisir 78 – Diner Américain',
            'description' => 'Concept Factory & Co Plaisir : authenticité, passion, savoir-faire depuis 1989. Burgers artisanaux, ingrédients frais. Terrasse, Wi-Fi à Mon Grand Plaisir, Yvelines.',
            'keywords' => 'concept restaurant plaisir 78, burger authentique yvelines, diner américain mon grand plaisir, factory co plaisir, restaurant artisanal plaisir',
            'canonical' => route('concept'),
        ];

        return view('pages.concept', compact('seo'));
    }
}
