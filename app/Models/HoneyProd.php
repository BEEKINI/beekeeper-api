<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HoneyProd extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function apiary(): BelongsTo
    {
        return $this->belongsTo(Apiary::class);
    }

}
