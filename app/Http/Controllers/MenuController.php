<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;

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

        $featuredReviews = Review::featured()
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        $googleReviewsController = new GoogleReviewsController;
        $aggregateData = $googleReviewsController->getAggregateRating();
        $averageRating = $aggregateData['rating'] ?? ($featuredReviews->count() > 0 ? $featuredReviews->avg('rating') : 0);
        $totalReviews = $aggregateData['total'] ?? Review::where('is_visible', true)->count();

        $seo = [
            'title' => 'Carte Factory & Co Plaisir 78 | Menu & Prix',
            'description' => 'Carte Factory & Co Plaisir : smash burgers artisanaux, bagels new-yorkais, cheesecakes, bowls. Options halal et végétariennes. Mon Grand Plaisir, Yvelines.',
            'keywords' => 'carte factory co plaisir 78, menu restaurant plaisir yvelines, burger smash plaisir, bagel cheesecake mon grand plaisir, bowl végétarien plaisir',
            'canonical' => route('menu.index'),
            'h1' => 'La Carte – Factory & Co Plaisir',
        ];

        return view('pages.menu.carte', compact('seo', 'burgers', 'bagels', 'cheesecakes', 'bowls', 'featuredReviews', 'averageRating', 'totalReviews'));
    }
}
