<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\Review;

class AvisController extends Controller
{
    public function index()
    {
        $faqsGrouped = FaqItem::grouped();
        // Flatten grouped FAQs into a single array for the accordion component
        $faqs = collect($faqsGrouped)->flatten(1)->values()->all();

        // Fetch visible reviews sorted by sort_order
        $reviews = Review::where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        // Get aggregate rating (try Google first, fallback to local DB)
        $googleReviewsController = new GoogleReviewsController;
        $aggregateData = $googleReviewsController->getAggregateRating();

        // Use Google data if available, otherwise use local DB
        $averageRating = $aggregateData['rating'] ?? ($reviews->count() > 0 ? $reviews->avg('rating') : 0);
        $totalReviews = $aggregateData['total'] ?? $reviews->count();

        $seo = [
            'title' => 'Avis Factory & Co Plaisir 78 | '.number_format($averageRating, 1, ',', '').'★ – '.$totalReviews.' Avis',
            'description' => 'Avis vérifiés Factory & Co Plaisir : '.number_format($averageRating, 1, ',', '').'★ avec '.$totalReviews.' témoignages. Smash burgers, bagels, cheesecakes, terrasse. Mon Grand Plaisir, Yvelines.',
            'keywords' => 'avis factory co plaisir 78, témoignages restaurant yvelines, avis burgers smash plaisir, reviews cheesecake bagel, avis mon grand plaisir',
            'canonical' => route('avis'),
        ];

        return view('pages.avis', compact('seo', 'faqs', 'reviews', 'averageRating', 'totalReviews'));
    }
}
