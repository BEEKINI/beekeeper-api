<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Intervention extends Model
{

    protected $fillable = [
        'title',
        'description',
        'apiary_id',
        'is_finished',
        'closed_at',
        'date_start',
        'date_end',
    ];

    public function apiary(): BelongsTo
    {
        return $this->belongsTo(Apiary::class);
    }

    protected function casts(): array
    {
        return [
            'date_start' => 'date',
            'date_end' => 'date',
        ];
    }

    /**
     * Update an intervention
     *
     * @param array $attributes
     * @param array $options
     * @return bool
     */
    public function update(array $attributes = [], array $options = []): bool
    {
        if (isset($attributes['is_finished']) && $attributes['is_finished']) {
            $attributes['closed_at'] = now();
        } else {
            $attributes['closed_at'] = null;
        }
        return parent::update($attributes, $options);
    }
}
