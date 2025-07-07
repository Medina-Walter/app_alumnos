<div class="p-6 max-w-5xl mx-auto space-y-6">

    @if (session()->has('mensaje'))
        <div class="bg-green-100 text-green-700 p-3 rounded text-center">
            {{ session('mensaje') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-center">Gestión de Profesores</h2>

    @foreach ($profesores as $profesor)
        <div class="bg-white shadow rounded-xl p-6 space-y-4">

            <div>
                <label class="block font-semibold mb-1">Nombre:</label>
                <input type="text"
                       wire:model.defer="datos.{{ $profesor->id }}.nombre"
                       class="border rounded px-3 py-2 w-full"
                       @if (!$modoEdicion[$profesor->id]) readonly @endif>
            </div>

            <div>
                <label class="block font-semibold mb-1">Apellido:</label>
                <input type="text"
                       wire:model.defer="datos.{{ $profesor->id }}.apellido"
                       class="border rounded px-3 py-2 w-full"
                       @if (!$modoEdicion[$profesor->id]) readonly @endif>
            </div>

            <div>
                <label class="block font-semibold mb-1">Email:</label>
                <input type="email"
                       wire:model.defer="datos.{{ $profesor->id }}.email"
                       class="border rounded px-3 py-2 w-full"
                       @if (!$modoEdicion[$profesor->id]) readonly @endif>
            </div>

            <div>
                <label class="block font-semibold mb-1">Especialidad:</label>
                <input type="text"
                       wire:model.defer="datos.{{ $profesor->id }}.especialidad"
                       class="border rounded px-3 py-2 w-full"
                       @if (!$modoEdicion[$profesor->id]) readonly @endif>
            </div>

            <div>
                <label class="block font-semibold mb-1">Rol:</label>
                <div class="text-gray-800">{{ $profesor->rol }}</div>
            </div>

            <div class="flex justify-end space-x-2">
                @if (!$modoEdicion[$profesor->id])
                    <button wire:click="editar({{ $profesor->id }})"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                        Editar
                    </button>
                @else
                    <button wire:click="actualizar({{ $profesor->id }})"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Guardar
                    </button>
                @endif

                <button wire:click="eliminar({{ $profesor->id }})"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                        onclick="return confirm('¿Estás segura de eliminar este usuario?')">
                    Eliminar
                </button>
            </div>

        </div>
    @endforeach
</div>
