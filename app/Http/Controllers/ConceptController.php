<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ConceptController extends Controller
{
    public function index()
    {
        $featuredReviews = Review::featured()
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        $googleReviewsController = new GoogleReviewsController;
        $aggregateData = $googleReviewsController->getAggregateRating();
        $averageRating = $aggregateData['rating'] ?? ($featuredReviews->count() > 0 ? $featuredReviews->avg('rating') : 0);
        $totalReviews = $aggregateData['total'] ?? Review::where('is_visible', true)->count();

        $seo = [
            'title' => 'Factory & Co Plaisir | Concept Diner Américain 78',
            'description' => 'Le concept Factory & Co Plaisir : authenticité et savoir-faire depuis 1989. Burgers artisanaux, ingrédients frais, recettes de Brooklyn. Mon Grand Plaisir, Yvelines.',
            'keywords' => 'concept restaurant plaisir 78, burger authentique yvelines, diner américain mon grand plaisir, factory co plaisir, restaurant artisanal plaisir',
            'canonical' => route('concept'),
        ];

        return view('pages.concept', compact('seo', 'featuredReviews', 'averageRating', 'totalReviews'));
    }
}
