<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = ['alumno_id', 'taller_id'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function taller()
    {
        return $this->belongsTo(Taller::class);
    }
}
