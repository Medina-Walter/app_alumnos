<div class="p-6 max-w-4xl mx-auto relative">
    <div class="absolute top-4 right-4 z-10">
        <button wire:click="logout"
            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
            Cerrar sesión
        </button>
    </div>

    
    
    <div class="mt-16">
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="{{ $cliente_id ? 'update' : 'store' }}" class="grid grid-cols-2 gap-4 mb-6">
            <input wire:model="nombre" type="text" placeholder="Nombre" class="border p-2 rounded">
            <input wire:model="email" type="email" placeholder="Email" class="border p-2 rounded">
            <input wire:model="telefono" type="text" placeholder="Teléfono" class="border p-2 rounded col-span-2">
            <input wire:model="domicilio" type="text" placeholder="Domicilio" class="border p-2 rounded col-span-2">
            <input wire:model="ocupacion" type="text" placeholder="Ocupación" class="border p-2 rounded col-span-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded col-span-2">
                {{ $cliente_id ? 'Actualizar' : 'Guardar' }}
            </button>
        </form>

        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-2 py-1">Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Domicilio</th>
                    <th>Ocupación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr class="border-t">
                        <td class="px-2">{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->domicilio }}</td>
                        <td>{{ $cliente->ocupacion }}</td>
                        <td class="space-x-2">
                            <button wire:click="edit({{ $cliente->id }})" class="bg-yellow-400 px-2 py-1 rounded">Editar</button>
                            <button wire:click="destroy({{ $cliente->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>