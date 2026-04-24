<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pista extends Model
{
    protected $fillable = ['nombre'];

    public function reservas()
    {
        return $this->hasMany(ReservaPista::class);
    }
}