<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'headline',
        'short_bio',
        'about_me',
        'photo',
        'cv_file',
        'location',
        'university',
        'major',
        'graduation_status',
    ];

    /**
     * Ambil profile aktif (single-row pattern).
     * Kalau belum ada, return instance kosong dengan fallback default.
     */
    public static function current(): self
    {
        return static::query()->first() ?? new static([
            'full_name'         => config('portfolio.name'),
            'headline'          => config('portfolio.headline'),
            'photo'             => config('portfolio.profile_photo'),
            'cv_file'           => config('portfolio.cv_path'),
        ]);
    }
}