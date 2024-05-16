<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    /**
     * Many to many relation models
     */

     public function user(): BelongsToMany
     {
        return $this->belongsToMany('App\Models\User'); //user model
     }

     public function permiso(): BelongsToMany
     {
        return $this->belongsToMany('App\Models\Permiso');  //permiso model
     }
}
