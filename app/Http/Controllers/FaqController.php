<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FaqItem::grouped();

        $seo = [
            'title'       => 'FAQ – Questions Fréquentes | Factory & Co Toulouse-Blagnac',
            'description' => 'Toutes les réponses à vos questions sur Factory & Co Toulouse-Blagnac : horaires, accès Hall C, options Halal, allergènes, Click & Collect, traiteur.',
            'keywords'    => 'faq factory and co toulouse, halal aéroport toulouse, allergènes restaurant blagnac, horaires factory co toulouse',
            'canonical'   => route('faq'),
        ];

        return view('pages.faq', compact('faqs', 'seo'));
    }
}
