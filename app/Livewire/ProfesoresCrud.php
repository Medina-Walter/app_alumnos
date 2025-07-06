<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class ProfesoresCrud extends Component
{
    public $profesores;
    public $datos = [];
    public $modoEdicion = [];

    public function mount()
    {
        $this->profesores = User::where('rol', 'profesor')->get();

        foreach ($this->profesores as $profesor) {
            $this->datos[$profesor->id] = [
                'nombre' => $profesor->nombre,
                'apellido' => $profesor->apellido,
                'email' => $profesor->email,
                'especialidad' => $profesor->especialidad ?? '',
            ];
            $this->modoEdicion[$profesor->id] = false; // por defecto no editable
        }
    }

    public function editar($id)
    {
        $this->modoEdicion[$id] = true;
    }

    public function actualizar($id)
    {
        $profesor = User::findOrFail($id);

        $profesor->nombre = $this->datos[$id]['nombre'];
        $profesor->apellido = $this->datos[$id]['apellido'];
        $profesor->email = $this->datos[$id]['email'];
        $profesor->especialidad = $this->datos[$id]['especialidad'];
        $profesor->save();

        session()->flash('mensaje', 'Perfil actualizado correctamente.');

        $this->modoEdicion[$id] = false;
        $this->profesores = User::where('rol', 'profesor')->get();
    }

    public function eliminar($id)
    {
        User::findOrFail($id)->delete();

        session()->flash('mensaje', 'Usuario eliminado correctamente.');
        $this->profesores = User::where('rol', 'profesor')->get();
    }

    public function render()
    {
        return view('livewire.profesores-crud');
    }
}
