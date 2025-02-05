<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hive extends Model
{
    protected $guarded = [];

    public function swarms(): HasMany
    {
        return $this->hasMany(Swarm::class);
    }
}
