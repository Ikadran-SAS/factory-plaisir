<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    protected $fillable = [
        'days_label', 'days_of_week', 'opens_at', 'closes_at', 'sort_order',
    ];

    protected $casts = [
        'days_of_week' => 'array',
    ];

    public function getOpensAtFormattedAttribute(): string
    {
        return substr($this->opens_at, 0, 5); // "07:00"
    }

    public function getClosesAtFormattedAttribute(): string
    {
        return substr($this->closes_at, 0, 5); // "22:30"
    }

    /**
     * Retourne les horaires au format Schema.org OpeningHoursSpecification
     */
    public static function toSchemaOrg(): array
    {
        return static::orderBy('sort_order')->get()->map(function ($h) {
            return [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => $h->days_of_week,
                'opens' => substr($h->opens_at, 0, 5),
                'closes' => substr($h->closes_at, 0, 5),
            ];
        })->toArray();
    }
}
