<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Swarm extends Model
{
    use HasFactory;

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
