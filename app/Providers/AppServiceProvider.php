<?php

namespace App\Providers;

use App\Http\Controllers\GoogleReviewsController;
use App\Models\Review;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
        $this->shareGlobalReviewData();
    }

    /**
     * Share aggregate review data with the layout for the global Restaurant schema.
     * Results are cached for 6 hours to protect the Google Places API quota.
     */
    protected function shareGlobalReviewData(): void
    {
        View::composer('layouts.app', function ($view) {
            $aggregate = Cache::remember('google_aggregate_rating', 6 * 60 * 60, function () {
                try {
                    $controller = new GoogleReviewsController;
                    $data = $controller->getAggregateRating();

                    return [
                        'rating' => $data['rating'] ?? Review::where('is_visible', true)->avg('rating') ?? 0,
                        'total' => $data['total'] ?? Review::where('is_visible', true)->count(),
                    ];
                } catch (\Throwable $e) {
                    \Log::warning('Google aggregate rating fetch failed: '.$e->getMessage());

                    return [
                        'rating' => Review::where('is_visible', true)->avg('rating') ?? 0,
                        'total' => Review::where('is_visible', true)->count(),
                    ];
                }
            });

            $view->with('globalRating', $aggregate['rating']);
            $view->with('globalReviewCount', $aggregate['total']);
        });
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
