<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Documento extends Model
{
    protected $guarded = [];

    use HasFactory;

    /**
     * One to one inverse relation models
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User'); //user model
    }

    /**
     * One to one polymorphic relation models
     */

     public function image(): MorphOne
     {
            return $this->morphOne('App\Models\Image', 'imageable');    //image model
     }
}
