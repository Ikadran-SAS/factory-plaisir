<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FaqItem::grouped();

        $seo = [
            'title' => 'FAQ Factory & Co Plaisir 78 | Horaires & Allergènes',
            'description' => 'FAQ Factory & Co Plaisir : horaires 7j/7 dès 8h, allergènes détaillés, options halal et végétariennes, terrasse, Wi-Fi gratuit, click & collect. Mon Grand Plaisir.',
            'keywords' => 'faq factory co plaisir 78, horaires mon grand plaisir yvelines, restaurant végétarien plaisir, allergènes cheesecake bagel, click collect plaisir',
            'canonical' => route('faq'),
        ];

        return view('pages.faq', compact('faqs', 'seo'));
    }
}
