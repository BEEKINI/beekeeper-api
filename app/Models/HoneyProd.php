<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HoneyProd extends Model
{
    public function apiary(): BelongsTo
    {
        return $this->belongsTo(Apiary::class);
    }

    /**
     * @param array|string $columns
     * @return Collection<int|static>
     */
    public static function all($columns = ['*']): Collection
    {
        return parent::all($columns)->where('user_id', auth()->id());
    }

}
