<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'category',
        'level',
        'icon',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('category')->orderBy('order')->orderBy('name');
    }

    /**
     * Group skills by category untuk rendering view.
     * Return: ['Programming' => Collection, 'Database' => Collection, ...]
     */
    public static function groupedByCategory(): array
    {
        return static::ordered()
            ->get()
            ->groupBy('category')
            ->toArray();
    }
}