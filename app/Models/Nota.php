<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';

    protected $fillable = ['alumno_id', 'taller_id', 'nota', 'comentario'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }
}
