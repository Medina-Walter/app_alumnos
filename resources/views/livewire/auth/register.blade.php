<div class="max-w-md mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-lg font-bold mb-4">Registro</h2>
    <form wire:submit.prevent="register">
        <input type="text" wire:model="nombre" placeholder="Nombre" class="w-full mb-2 border p-2 rounded">
        <input type="text" wire:model="apellido" placeholder="Apellido" class="w-full mb-2 border p-2 rounded">
        <input type="text" wire:model="dni" placeholder="DNI" class="w-full mb-2 border p-2 rounded">
        <input type="email" wire:model="email" placeholder="Email" class="w-full mb-2 border p-2 rounded">
        <input type="password" wire:model="password" placeholder="Contraseña" class="w-full mb-2 border p-2 rounded">
        <input type="password" wire:model="password_confirmation" placeholder="Confirmar Contraseña" class="w-full mb-4 border p-2 rounded">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Registrarse</button>
    </form>
</div>