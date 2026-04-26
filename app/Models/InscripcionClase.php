<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionClase extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'clase_id',  
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clase_id');
    }
}