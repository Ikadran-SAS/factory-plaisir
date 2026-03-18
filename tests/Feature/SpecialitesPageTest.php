<?php

use App\Models\FaqItem;
use Database\Seeders\FaqSeeder;

beforeEach(function () {
    $this->seed(FaqSeeder::class);
});

test('specialites page loads successfully', function () {
    $response = $this->get('/specialites');

    $response->assertStatus(200);
});

test('specialites page contains faq accordion component', function () {
    $response = $this->get('/specialites');

    // The FAQ data is passed to Vue component via data-faqs attribute
    $response->assertSee('faq-accordion-app');
    $response->assertSee('data-faqs');
});

test('specialites page does not display non-specialties faqs', function () {
    // Generic FAQs from other categories should not be on this page
    $response = $this->get('/specialites');

    // These are from other FAQ categories and shouldn't appear on specialties page
    $response->assertDontSeeText('Comment fonctionne le Click & Collect');
});

test('specialites faq items exist in database', function () {
    $count = FaqItem::where('category', 'specialites')->count();

    expect($count)->toBe(4);
});
