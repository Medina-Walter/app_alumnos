<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';

    protected $fillable = ['user_id', 'nombre', 'apellido', 'dni'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function talleres()
    {
        return $this->belongsToMany(Taller::class, 'inscripciones');
    }
}
