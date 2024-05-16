<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permiso extends Model
{
    use HasFactory;

    /**
     * Many to many relation models
     */

     public function roles(): BelongsToMany
     {
        return $this->belongsToMany('App\Models\Role'); //role model 
     }
}
