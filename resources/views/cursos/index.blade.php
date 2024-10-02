<x-layout>
    <div class="flex justify-between">
        <x-titulo>Cursos</x-titulo>
        @auth
        @can('crear_curso')
        <a href="{{ route('cursos.create') }}" class="p-4 font-bold text-blue-900 bg-blue-200 rounded">Crear curso</a>
        @endcan
        @endauth
    </div>

    @forelse ($cursos as $curso)
        <div class="mt-4">
            <a href="/cursos/{{ $curso['id'] }}" class="inline-block">
                <h2>{{ $curso['nombre'] }}</h2>
                <p>Dictado por: {{ $curso['instructor'] }}</p>
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen cursos cargados en la plataforma</h2>
    @endforelse
</x-layout>
