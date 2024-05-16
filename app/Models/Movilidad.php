<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movilidad extends Model
{
    use HasFactory;

    /**
     * One to many relation models
     */

     public function formulario(): HasMany
     {
         return $this->hasMany('App\Models\Formulario');    //formulario model
     }
}
