<?php

namespace App\Http\Controllers;

class AvisController extends Controller
{
    public function index()
    {
        $seo = [
            'title' => 'Avis Clients | Factory & Co – Nos Clients Témoignent',
            'description' => 'Découvrez les avis vérifiés de nos clients satisfaits. 4.8★ - Plus de 500 avis positifs. Factory & Co Val d\'Europe à Serris.',
            'keywords' => 'avis clients factory co, témoignages factory co, avis burgers serris, reviews factory and co, avis restaurants val d\'europe',
            'canonical' => route('avis'),
        ];

        return view('pages.avis', compact('seo'));
    }
}
