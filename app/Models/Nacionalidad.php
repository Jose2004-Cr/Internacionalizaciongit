<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nacionalidad extends Model
{
    use HasFactory;

    /**
     * One to many inverse relation models
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');  //user model
    }
}
