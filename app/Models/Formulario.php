<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formulario extends Model
{
    use HasFactory;

    /**
     * One to many inverse relation models
     */

    public function actividad(): BelongsTo
    {
        return $this->belongsTo('App\Models\Actividad');    //actividad model
    }

    public function movilidad(): BelongsTo
    {
        return $this->belongsTo('App\Models\Movilidad');    //movilidad model
    }

    public function evento(): BelongsTo
    {
        return $this->belongsTo('App\Models\Evento');   //evento model
    }

    public function financiera(): BelongsTo
    {
        return $this->belongsTo('App\Models\Financiera');   //financiera model
    }

    public function trayectoria(): BelongsTo
    {
        return $this->belongsTo('App\Models\Trayectoria');  //trayectoria model
    }

    public function institucion(): BelongsTo
    {
        return $this->belongsTo('App\Models\Institucion');  //institucion model
    }
}
