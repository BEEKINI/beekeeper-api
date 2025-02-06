<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hive extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function apiary(): BelongsTo
    {
        return $this->belongsTo(Apiary::class);
    }

    public function swarms(): HasMany
    {
        return $this->hasMany(Swarm::class);
    }
}
