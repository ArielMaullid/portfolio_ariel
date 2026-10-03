<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'institution',
        'degree',
        'major',
        'start_year',
        'end_year',
        'status',
        'description',
    ];

    protected $casts = [
        'start_year' => 'integer',
        'end_year'   => 'integer',
    ];

    /**
     * Format periode, mis. "2020 – 2024" atau "2024 – Sekarang".
     */
    public function getPeriodAttribute(): string
    {
        if (! $this->start_year && ! $this->end_year) {
            return '';
        }

        $start = $this->start_year ?? '';
        $end   = $this->end_year ?? 'Sekarang';

        return trim("{$start} – {$end}", ' –');
    }
}