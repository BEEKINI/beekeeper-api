<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function all($columns = ['*']): Collection
    {
        return parent::all($columns)->where('user_id', auth()->id());
    }
}
