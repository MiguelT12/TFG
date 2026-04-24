<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaPista extends Model
{
    protected $table = 'reservas_pistas';

    protected $fillable = [
        'id_cliente',
        'pista_id',
        'hora_inicio',
        'hora_fin',
        'fecha'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }

    public function pista()
    {
        return $this->belongsTo(Pista::class);
    }
}