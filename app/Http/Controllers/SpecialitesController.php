<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;

class SpecialitesController extends Controller
{
    public function index()
    {
        // Get only specialties-related FAQs
        $faqs = FaqItem::where('category', 'specialites')
            ->orderBy('sort_order')
            ->get()
            ->toArray();

        $seo = [
            'title' => 'Spécialités Factory & Co Plaisir 78 | Burgers & Bagels',
            'description' => 'Spécialités Factory & Co Plaisir : smash burgers artisanaux, bagels new-yorkais, cheesecakes maison, breakfast dès 8h. Options halal et végétariennes. Mon Grand Plaisir.',
            'keywords' => 'smash burger plaisir 78, bagels new-yorkais yvelines, cheesecake plaisir, breakfast factory co, spécialités mon grand plaisir',
            'canonical' => route('specialites'),
        ];

        return view('pages.specialites', compact('seo', 'faqs'));
    }
}
