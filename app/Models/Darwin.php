<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Darwin extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function swarm(): BelongsTo
    {
        return $this->belongsTo(Swarm::class);
    }

    public function swarmParent(): BelongsTo
    {
        return $this->belongsTo(Swarm::class, 'swarm_parent_id');
    }

    public function swarmOrigin(): BelongsTo
    {
        return $this->belongsTo(Swarm::class, 'swarm_origin_id');
    }
}
