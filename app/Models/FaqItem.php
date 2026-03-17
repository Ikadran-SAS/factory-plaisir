<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FaqItem extends Model
{
    protected $fillable = [
        'category', 'category_label', 'category_icon',
        'question', 'answer', 'is_visible', 'sort_order',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('is_visible', true)->orderBy('sort_order');
    }

    /**
     * Retourne les FAQs groupées par catégorie
     */
    public static function grouped(): \Illuminate\Support\Collection
    {
        return static::visible()->get()->groupBy('category');
    }
}
