<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'category', 'subcategory', 'description',
        'ingredients', 'price', 'badge', 'badge_color', 'image_url',
        'is_halal', 'is_vegetarian', 'is_vegan', 'is_featured',
        'is_available', 'allergens', 'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_halal' => 'boolean',
        'is_vegetarian' => 'boolean',
        'is_vegan' => 'boolean',
        'is_featured' => 'boolean',
        'is_available' => 'boolean',
        'allergens' => 'array',
    ];

    /* ── Scopes ── */

    public function scopeCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('is_available', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    /* ── Accesseurs ── */

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 2, ',', '').' €';
    }

    public function getBadgeClassAttribute(): string
    {
        return match ($this->badge_color) {
            'green' => 'product-badge halal',
            'dark' => 'product-badge new',
            default => 'product-badge',
        };
    }
}
