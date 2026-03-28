<?php

namespace App\Http\Controllers;

class GoogleReviewsController extends Controller
{
    /**
     * Récupère les avis du restaurant depuis Google My Business API
     */
    public function getReviews(): array
    {
        $googleBusinessController = new GoogleBusinessController;

        return $googleBusinessController->getReviews();
    }

    /**
     * Récupère la note agrégée depuis Google
     */
    public function getAggregateRating(): array
    {
        $googleBusinessController = new GoogleBusinessController;

        return $googleBusinessController->getAggregateRating();
    }
}
