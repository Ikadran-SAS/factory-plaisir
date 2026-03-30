<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FaqItem::grouped();

        $seo = [
            'title' => 'FAQ Factory & Co Plaisir 78 | Horaires, Allergènes, Végétarien',
            'description' => 'FAQ Factory & Co Plaisir (78) : horaires lun-jeu/dim 8h-21h30 & ven-sam 8h-23h, allergènes, options végétariennes, terrasse, Wi-Fi, click & collect. Yvelines.',
            'keywords' => 'faq factory co plaisir 78, horaires mon grand plaisir yvelines, restaurant végétarien plaisir, allergènes cheesecake bagel, click collect plaisir',
            'canonical' => route('faq'),
        ];

        return view('pages.faq', compact('faqs', 'seo'));
    }
}
