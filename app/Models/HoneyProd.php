<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HoneyProd extends Model
{
    protected $guarded = [];

    public function apiary(): BelongsTo
    {
        return $this->belongsTo(Apiary::class);
    }

}
