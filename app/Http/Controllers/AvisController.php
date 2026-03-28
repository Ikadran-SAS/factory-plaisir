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
        $googleReviewsController = new GoogleReviewsController();
        $aggregateData = $googleReviewsController->getAggregateRating();

        // Use Google data if available, otherwise use local DB
        $averageRating = $aggregateData['rating'] ?? ($reviews->count() > 0 ? $reviews->avg('rating') : 0);
        $totalReviews = $aggregateData['total'] ?? $reviews->count();

        $seo = [
            'title' => 'Avis Clients | Factory & Co – Nos Clients Témoignent',
            'description' => 'Découvrez les avis vérifiés de nos clients satisfaits. '.number_format($averageRating, 1, ',', '').'★ - '.$totalReviews.' avis. Factory & Co Val d\'Europe à Serris.',
            'keywords' => 'avis clients factory co, témoignages factory co, avis burgers serris, reviews factory and co, avis restaurants val d\'europe',
            'canonical' => route('avis'),
        ];

        return view('pages.avis', compact('seo', 'faqs', 'reviews', 'averageRating', 'totalReviews'));
    }
}
