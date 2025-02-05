<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Swarm extends Model
{
    protected $guarded = [];

    public function hive(): BelongsTo
    {
        return $this->belongsTo(Hive::class);
    }

    public function darwins(): HasMany
    {
        return $this->hasMany(Darwin::class);
    }
}
