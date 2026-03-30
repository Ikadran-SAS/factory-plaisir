<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleBusinessController extends Controller
{
    /**
     * Fetch real reviews from Google Places API.
     * Returns up to 10 unique reviews (newest + most relevant).
     */
    public function getReviews(): array
    {
        $apiKey = config('app.google_places_api_key');

        if (! $apiKey) {
            Log::warning('Google Places API key non configurée.');

            return [];
        }

        return Cache::remember('google_real_reviews', 3600, function () use ($apiKey) {
            $placeId = $this->getPlaceId();

            if (! $placeId) {
                return [];
            }

            $allReviews = [];

            // Fetch newest reviews
            $newest = $this->fetchReviewsFromPlaces($placeId, $apiKey, 'newest');
            foreach ($newest as $review) {
                $allReviews[$review['author_name'].'_'.md5($review['content'])] = $review;
            }

            // Fetch most relevant reviews for more diversity
            $relevant = $this->fetchReviewsFromPlaces($placeId, $apiKey, 'most_relevant');
            foreach ($relevant as $review) {
                $allReviews[$review['author_name'].'_'.md5($review['content'])] = $review;
            }

            return array_values($allReviews);
        });
    }

    /**
     * Get aggregate rating from Google Places API.
     */
    public function getAggregateRating(): array
    {
        $apiKey = config('app.google_places_api_key');

        if (! $apiKey) {
            return ['rating' => null, 'total' => null];
        }

        return Cache::remember('google_aggregate_rating', 3600, function () use ($apiKey) {
            $placeId = $this->getPlaceId();

            if (! $placeId) {
                return ['rating' => null, 'total' => null];
            }

            try {
                $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                    'place_id' => $placeId,
                    'fields' => 'rating,user_ratings_total',
                    'key' => $apiKey,
                ]);

                $data = $response->json();

                if ($response->successful() && isset($data['result'])) {
                    return [
                        'rating' => $data['result']['rating'] ?? null,
                        'total' => $data['result']['user_ratings_total'] ?? null,
                    ];
                }
            } catch (\Exception $e) {
                Log::error('Google Places API Error: '.$e->getMessage());
            }

            return ['rating' => null, 'total' => null];
        });
    }

    /**
     * Get the Place ID, using cache and text search fallback.
     */
    private function getPlaceId(): ?string
    {
        return Cache::remember('google_place_id', 86400, function () {
            $apiKey = config('app.google_places_api_key');

            if (! $apiKey) {
                return null;
            }

            try {
                $response = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
                    'query' => 'Factory & Co Plaisir Mon Grand Plaisir',
                    'key' => $apiKey,
                ]);

                $data = $response->json();

                if ($response->successful() && ! empty($data['results'])) {
                    return $data['results'][0]['place_id'] ?? null;
                }
            } catch (\Exception $e) {
                Log::error('Google Places API: impossible de trouver le Place ID', [
                    'error' => $e->getMessage(),
                ]);
            }

            return null;
        });
    }

    /**
     * Fetch reviews from Google Places API Details endpoint.
     */
    private function fetchReviewsFromPlaces(string $placeId, string $apiKey, string $sort = 'newest'): array
    {
        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                'place_id' => $placeId,
                'fields' => 'reviews',
                'reviews_sort' => $sort,
                'language' => 'fr',
                'key' => $apiKey,
            ]);

            $data = $response->json();

            if (! $response->successful() || ! isset($data['result']['reviews'])) {
                return [];
            }

            $reviews = [];

            foreach ($data['result']['reviews'] as $review) {
                if (empty($review['text'])) {
                    continue;
                }

                $authorName = $review['author_name'] ?? 'Anonyme';

                $reviews[] = [
                    'author_name' => $authorName,
                    'author_initial' => mb_strtoupper(mb_substr($authorName, 0, 1)),
                    'rating' => $review['rating'] ?? 5,
                    'content' => $review['text'],
                    'source' => 'google',
                    'date_label' => $review['relative_time_description'] ?? '',
                ];
            }

            return $reviews;
        } catch (\Exception $e) {
            Log::error('Google Places API: erreur récupération avis', [
                'error' => $e->getMessage(),
            ]);

            return [];
        }
    }
}
