<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = 'talleres';

    protected $fillable = ['nombre', 'descripcion', 'cupo_maximo', 'profesor_id'];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'inscripciones');
    }
}

