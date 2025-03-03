<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SwarmState extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function swarm(): BelongsTo
    {
        return $this->belongsTo(Swarm::class);
    }

    public static function all($columns = ['*']): Collection
    {
        return parent::all($columns)->load('swarm.hive.apiary')->where('swarm.hive.apiary.user_id', auth()->id());
    }
}
