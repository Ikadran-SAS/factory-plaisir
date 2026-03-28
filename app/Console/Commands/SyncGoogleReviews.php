<?php

namespace App\Console\Commands;

use App\Http\Controllers\GoogleBusinessController;
use App\Models\Review;
use Illuminate\Console\Command;

class SyncGoogleReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reviews:sync-google {--limit=10 : Maximum number of reviews to sync}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize reviews from Google Places API to database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Starting Google Reviews synchronization...');

        try {
            $googleController = new GoogleBusinessController();
            $googleReviews = $googleController->getReviews();
            $limit = (int) $this->option('limit');

            if (empty($googleReviews)) {
                $this->warn('No reviews found from Google Places API');
                return 1;
            }

            $synced = 0;
            $skipped = 0;

            // Only process up to the limit
            $reviewsToSync = array_slice($googleReviews, 0, $limit);

            foreach ($reviewsToSync as $googleReview) {
                // Check if review already exists by author name and content
                $existingReview = Review::where('author_name', $googleReview['author_name'])
                    ->where('content', $googleReview['content'])
                    ->first();

                if ($existingReview) {
                    $this->line("  ⊘ Skipped: {$googleReview['author_name']} (already exists)");
                    $skipped++;
                    continue;
                }

                // Create new review
                Review::create([
                    'author_name' => $googleReview['author_name'],
                    'author_initial' => $googleReview['author_initial'],
                    'avatar_color' => $this->generateAvatarColor(),
                    'rating' => $googleReview['rating'],
                    'content' => $googleReview['content'],
                    'source' => $googleReview['source'],
                    'date_label' => $googleReview['date_label'],
                    'is_featured' => false,
                    'is_visible' => true,
                    'sort_order' => Review::count() + 1,
                ]);

                $this->line("  ✓ Synced: {$googleReview['author_name']} ({$googleReview['rating']}★)");
                $synced++;
            }

            $this->info("\n✓ Sync complete!");
            $this->line("  Synced: {$synced}");
            $this->line("  Skipped: {$skipped}");

            return 0;
        } catch (\Exception $e) {
            $this->error('Error during sync: '.$e->getMessage());
            return 1;
        }
    }

    /**
     * Generate a random avatar color
     */
    private function generateAvatarColor(): string
    {
        $colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8', '#F7DC6F', '#BB8FCE', '#85C1E2'];

        return $colors[array_rand($colors)];
    }
}
