<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HoneyProd extends Model
{
    public function apiary(): BelongsTo
    {
        return $this->belongsTo(Apiary::class);
    }
}
