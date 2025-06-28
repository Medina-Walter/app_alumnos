<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';

    protected $fillable = ['user_id', 'dni', 'especialidad'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function talleres()
    {
        return $this->hasMany(Taller::class);
    }
}
