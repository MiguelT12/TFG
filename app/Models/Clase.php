<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Clase extends Model
{
    protected $table = 'clases';
    protected $fillable = ['id_actividad', 'id_monitor', 'hora_inicio', 'capacidad', 'dia_semana'];

    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class, 'id_actividad');
    }

    public function monitor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_monitor');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'inscripciones');
    }

    public function plazasOcupadas()
    {
        return $this->usuarios()->count();
    }

    public function estaLlena()
    {
        return $this->plazasOcupadas() >= $this->capacidad;
    }
}