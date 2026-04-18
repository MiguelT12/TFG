<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = ['nombre', 'descripcion'];

    public function clases(): HasMany
    {
        return $this->hasMany(Clase::class, 'id_actividad');
    }
}
