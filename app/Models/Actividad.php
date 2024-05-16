<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actividad extends Model
{
    use HasFactory;

    /**
     * One to many relation model
     */

    public function formulario(): HasMany
    {
        return $this->hasMany('App\Models\Formulario'); //formulario model
    }
}
