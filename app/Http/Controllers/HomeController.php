<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\OpeningHour;

class HomeController extends Controller
{
    /**
     * Page d'accueil — Hub de marque SEO
     */
    public function index()
    {
        $featuredProducts = Product::available()
            ->featured()
            ->ordered()
            ->get()
            ->groupBy('category');

        $featuredReviews = Review::featured()
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        $openingHours = OpeningHour::orderBy('sort_order')->get();

        $seo = [
            'title'       => 'Factory & Co Toulouse-Blagnac – Restaurant Burger Aéroport Toulouse',
            'description' => 'Factory & Co, restaurant burger, bagel et cheesecake à l\'Aéroport Toulouse-Blagnac. Zone réservée Hall C, Portes 30-36. Ouvert 7j/7 de 07h00 à 22h30. Smash Burgers, Bagels New-Yorkais, Cheesecake Factory.',
            'keywords'    => 'restaurant burger aéroport toulouse, factory and co blagnac, manger aéroport toulouse blagnac, smash burger toulouse, cheesecake toulouse, bagel toulouse aéroport',
            'canonical'   => route('home'),
        ];

        return view('pages.home', compact('featuredProducts', 'featuredReviews', 'openingHours', 'seo'));
    }

    /**
     * Page Click & Collect
     */
    public function clickCollect()
    {
        $seo = [
            'title'       => 'Click & Collect – Commandez en avance | Factory & Co Toulouse-Blagnac',
            'description' => 'Commandez votre repas en ligne et récupérez-le sans attendre à l\'Aéroport Toulouse-Blagnac Hall C. Click & Collect disponible 7j/7 de 07h00 à 22h30.',
            'keywords'    => 'click collect restaurant aéroport toulouse, commander en ligne factory co blagnac, commande à emporter aéroport toulouse',
            'canonical'   => route('click-collect'),
        ];

        $popularProducts = Product::available()
            ->featured()
            ->ordered()
            ->take(6)
            ->get();

        return view('pages.click-collect', compact('seo', 'popularProducts'));
    }

    /**
     * Page Traiteur Business
     */
    public function traiteur()
    {
        $seo = [
            'title'       => 'Traiteur Business Blagnac – Plateaux Repas Entreprises | Factory & Co',
            'description' => 'Factory & Co propose une offre traiteur pour les entreprises du bassin toulousain (Airbus, ATR, Thalès). Plateaux repas, cocktails dinatoires, buffets. Devis gratuit.',
            'keywords'    => 'traiteur blagnac entreprise, plateaux repas airbus toulouse, traiteur aéroport toulouse, buffet entreprise blagnac',
            'canonical'   => route('traiteur'),
        ];

        return view('pages.traiteur', compact('seo'));
    }
}
