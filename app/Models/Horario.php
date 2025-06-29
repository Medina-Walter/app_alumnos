<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';

    protected $fillable = ['taller_id', 'dia_semana', 'hora_inicio', 'hora_fin'];

    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }
}
