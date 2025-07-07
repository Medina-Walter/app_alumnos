<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'Gestion de talleres extracurriculares')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex justify-end items-center">
            <!-- Checkbox oculto para el menú principal -->
            <input type="checkbox" id="menu-toggle" class="hidden peer">

            <!-- Botón hamburguesa con ícono de cierre -->
            <label for="menu-toggle" class="md:hidden text-white cursor-pointer relative">
                <svg class="w-6 h-6 peer-checked:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg class="w-6 h-6 hidden peer-checked:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </label>

            <!-- Enlaces de navegación -->
            <div class="hidden peer-checked:flex md:flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 absolute md:static top-16 right-0 w-full md:w-auto bg-blue-500 md:bg-transparent p-4 md:p-0 transition-all duration-300 ease-in-out">
                <a href="{{ route("talleres.index"); }}" class="text-white hover:text-gray-300 text-right">Inicio</a>
                <a href="#" class="text-white hover:text-gray-300 text-right">Mi Perfil</a>
                <a href="{{ route("mis_talleres") }}" class="text-white hover:text-gray-300 text-right">Mis Talleres</a>
                
                <!-- Opción Perfiles con desplegable -->
                <div class="relative group">
                    <!-- Checkbox oculto para el submenú -->
                    <input type="checkbox" id="profile-toggle" class="hidden peer/profile">

                    <!-- Label para Perfiles -->
                    <label for="profile-toggle" class="flex items-center justify-end text-white hover:text-gray-300 cursor-pointer text-right md:cursor-default">
                        Desarrolladores
                        <svg class="w-4 h-4 ml-2 md:hidden peer-checked/profile:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </label>

                    <!-- Submenú desplegable -->
                    <div class="hidden peer-checked/profile:flex md:group-hover:flex flex-col space-y-2 mt-2 md:absolute md:top-full md:right-0 md:bg-blue-500 md:p-2 md:rounded-md md:min-w-[150px] transition-all duration-200 ease-in-out">
                        <a href="{{ route('medina_walter') }}" class="text-white hover:text-gray-300 text-right md:text-left px-2 py-1">Walter Medina</a>
                        <a href="{{ route('camila_ozuna') }}" class="text-white hover:text-gray-300 text-right md:text-left px-2 py-1">Camila Ozuna</a>
                        <a href="{{ route('jose_sosa') }}" class="text-white hover:text-gray-300 text-right md:text-left px-2 py-1">José Sosa</a>
                        <a href="#" class="text-white hover:text-gray-300 text-right md:text-left px-2 py-1">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('contenido')
    </main>
    @livewireScripts
</body>
</html>
