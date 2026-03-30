<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\OpeningHour;
use App\Models\Product;
use App\Models\Review;

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

        // Get Google reviews aggregate rating
        $googleReviewsController = new GoogleReviewsController;
        $aggregateData = $googleReviewsController->getAggregateRating();
        $averageRating = $aggregateData['rating'] ?? ($featuredReviews->count() > 0 ? $featuredReviews->avg('rating') : 0);
        $totalReviews = $aggregateData['total'] ?? Review::where('is_visible', true)->count();

        $openingHours = OpeningHour::orderBy('sort_order')->get();

        $faqsGrouped = FaqItem::grouped();
        // Flatten grouped FAQs into a single array for the accordion component
        $faqs = collect($faqsGrouped)->flatten(1)->values()->all();

        $seo = [
            'title' => 'Factory & Co Plaisir 78 | Burgers, Bagels, Cheesecakes',
            'description' => 'Factory & Co Plaisir (78) : smash burgers artisanaux, bagels new-yorkais, cheesecakes maison. Terrasse, Wi-Fi, options halal et végétariennes. Mon Grand Plaisir, Yvelines.',
            'keywords' => 'restaurant burger plaisir 78, factory and co plaisir yvelines, manger mon grand plaisir, smash burger plaisir, cheesecake plaisir, restaurant terrasse plaisir',
            'canonical' => route('home'),
        ];

        return view('pages.home', compact('featuredProducts', 'featuredReviews', 'openingHours', 'faqs', 'seo', 'averageRating', 'totalReviews'));
    }

    /**
     * Page Click & Collect
     */
    public function clickCollect()
    {
        $seo = [
            'title' => 'Click & Collect Factory & Co Plaisir 78 | Commander',
            'description' => 'Click & Collect Factory & Co Plaisir : commandez en ligne, récupérez sans attente. 1170 Av. Saint-Germain, Mon Grand Plaisir 78370. Burgers, bagels, cheesecakes.',
            'keywords' => 'click collect plaisir 78, commander en ligne factory co yvelines, commande emporter plaisir, retrait mon grand plaisir',
            'canonical' => route('click-collect'),
        ];

        $popularProducts = Product::available()
            ->featured()
            ->ordered()
            ->take(6)
            ->get();

        return view('pages.click-collect', compact('seo', 'popularProducts'));
    }
}
