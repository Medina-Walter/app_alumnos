<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Alumno;

class GestionAlumnos extends Component
{
    public $alumnos;
    public $datos = [];
    public $modoEdicion = [];

    public function mount()
    {
        $this->alumnos = Alumno::all();

        foreach ($this->alumnos as $alumno) {
            $this->datos[$alumno->id] = $alumno->toArray();
            $this->modoEdicion[$alumno->id] = false;
        }
    }

    public function editar($id)
    {
        $this->modoEdicion[$id] = true;
    }

    public function actualizar($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->update($this->datos[$id]);
        $this->modoEdicion[$id] = false;
        session()->flash('mensaje', 'Alumno actualizado correctamente.');
    }

    public function eliminar($id)
    {
        Alumno::destroy($id);
        session()->flash('mensaje', 'Alumno eliminado correctamente.');
        return redirect()->route('alumnos');
    }

    public function render()
    {
        $this->alumnos = Alumno::all();
        return view('livewire.gestion-alumnos');
    }
}
