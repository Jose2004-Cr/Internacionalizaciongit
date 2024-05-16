<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    protected $guarded = [];    //allow bulk assignment

    use HasFactory;

    /**
     * One to one polymorphic relation models
     */

     public function imageable(): MorphTo
     {
        return $this->morphTo();
     }
}
