<x-layout>
    <x-titulo>Perfil de {{ $nombre }}</x-titulo>

    <h2 class="text-2xl my-5">Proyectos</h2>

    @if($proyectos)
        <div class="grid grid-cols-12 gap-x-5">
        @foreach ($proyectos as $proyecto)
            <div class="col-span-3 bg-white min-h-44 rounded-md p-3 flex flex-col justify-between">
                <div>
                    <h1 class="text-xl text-center">{{ $proyecto['nombre'] }}</h1>
                    <div class="flex justify-between items-center my-5">
                        <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full">{{ $proyecto['anio'] }}</span>
                        @php
                            $color = 'text-green-900';
                            if($proyecto['estado'] === 'En curso') {
                                $color = 'text-yellow-800';
                            }
                        @endphp
                        <p class="{{ $color }} font-bold text-sm">{{ $proyecto['estado'] }}</p>
                    </div>

                    @if($proyecto['tipo'] == 'web')
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        <p class="ml-2">{{ $proyecto['rol'] }}</p>
                    </div>
                    <div class="flex mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <p class="ml-2">{{ $proyecto['supervisor'] }}</p>
                    </div>
                    @endif

                    @if($proyecto['tipo'] == 'curso')
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                        </svg>
                        <p class="ml-2">{{ $proyecto['organizacion'] }}</p>
                    </div>
                    @endif
                </div>
                <p class="text-xs text-gray-700 italic mt-8">{{ $proyecto['creacion'] }}</p>
            </div>
        @endforeach
        </div>
    @else
        <p>De momento no existen proyectos cargados.</p>
    @endif

    <x-footer />
</x-layout>
