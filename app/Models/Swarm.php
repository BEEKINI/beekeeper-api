<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->hasMany(Darwin::class, 'swarm_id');
    }

    public function states(): HasMany
    {
        return $this->hasMany(SwarmState::class);
    }

    public static function originalAll(): Collection
    {
        return parent::all();
    }

    public static function all($columns = ['*']): Collection
    {
        return parent::all($columns)->load(['hive.apiary', 'states'])->where('hive.apiary.user_id', auth()->id());
    }

    /**
     * Clone a swarm
     *
     * @param Swarm $swarmOrigin
     * @param array $attribute
     * @return Swarm
     */
    public static function cloneSwarm(Swarm $swarmOrigin, array $attribute): Swarm
    {
        $swarmOriginID = $swarmOrigin->darwins()->first()?->swarm_origin_id;
        if (!$swarmOriginID) $swarmOriginID = $swarmOrigin->id;
        $newSwarm = self::create($attribute);

        $newSwarm->darwins()->create([
            'swarm_id' => $newSwarm->id,
            'swarm_origin_id' => $swarmOriginID,
            'swarm_parent_id' => $swarmOrigin->id
        ]);

        return $newSwarm;
    }

    /**
     * Get the ascendant swarm
     *
     * @return \Illuminate\Support\Collection
     */
    public function ascendantSwarm(): \Illuminate\Support\Collection
    {
        $ascendantSwarm = collect();
        $swarm = $this;

        while ($swarm->darwins()->first()) {
            $swarm = $swarm->darwins()->first()->swarmParent;
            $ascendantSwarm->push($swarm);
        }
        return $ascendantSwarm;
    }
}
