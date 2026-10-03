<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'description',
        'background',
        'objective',
        'features',
        'contribution',
        'development',
        'result',
        'image',
        'category',
        'technologies',
        'github_url',
        'demo_url',
        'year',
        'featured',
        'order',
    ];

    protected $casts = [
        'features'     => 'array',
        'technologies' => 'array',
        'featured'     => 'boolean',
        'year'         => 'integer',
        'order'        => 'integer',
    ];

    /**
     * Auto-generate slug dari title kalau slug belum diset.
     */
    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = static::generateUniqueSlug($project->title);
            }
        });
    }

    public static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i    = 2;

        while (
            static::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderByDesc('year')->orderByDesc('created_at');
    }
}