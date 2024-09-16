<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') ?? 'Gestion Freelance' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-inter">

<div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
                <a href="/">
                    <p class="flex items-center justify-center w-10 h-10 text-xl font-bold text-white rounded-full bg-slate-600">GF</p>
                </a>
            </div>
            <div class="hidden md:block">
              <div class="flex items-baseline ml-10 space-x-4">
                <a href="{{ route('contacto') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('contacto') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    Contacto
                </a>
                <a href="{{ route('perfil') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('perfil') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    Perfil
                </a>
                <a href="{{ route('cursos.index') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('cursos.index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                    Cursos
                </a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            @guest
            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                Login
            </a>
            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-sm font-medium {{ request()->routeIs('register') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                Registro
            </a>
            @endguest
            @auth
                <p class="text-white">{{ auth()->user()->name }}</p>
            @endauth
            {{-- <div class="flex items-center ml-4 md:ml-6">
              <button type="button" class="relative p-1 text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>

              <!-- Profile dropdown -->
              <div class="relative ml-3">
                <div>
                  <button type="button" class="relative flex items-center max-w-xs text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                  </button>
                </div>

                <!--
                  Dropdown menu, show/hide based on menu state.

                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                <div class="absolute right-0 z-10 hidden w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="contenedor-menu-usuario">
                  <!-- Active: "bg-gray-100", Not Active: "" -->
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </nav>

    <main>
      <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Your content -->
        {{ $slot }}
      </div>
    </main>
  </div>


</body>
</html>
<script>
    // Seleccionar el boton de perfil de usuario
    let userMenuButton = document.querySelector("#user-menu-button");
    // Seleccionar el contenedor del menu
    let contenedorMenuUsuario = document.querySelector("#contenedor-menu-usuario");
    // Agregar el escuchador al click del perfil de usuario
    userMenuButton.addEventListener("click", function() {
        // Si el contenedor tiene la clase hidden (oculto), lo quitamos. Y viceversa
        contenedorMenuUsuario.classList.toggle("hidden");
    });
</script>
