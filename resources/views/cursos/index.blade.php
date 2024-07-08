<x-layout>
    <div class="flex justify-between">
        <x-titulo>Cursos</x-titulo>
        <a href="{{ route('cursos.create') }}" class="p-4 bg-blue-200 text-blue-900 rounded font-bold">Crear curso</a>
    </div>

    @forelse ($cursos as $curso)
        <div class="mt-4">
            <a href="/cursos/{{ $curso['id'] }}">
                <h2>{{ $curso['nombre'] }}</h2>
                <p>Dictado por: {{ $curso['instructor'] }}</p>
            </a>
        </div>
    @empty
        <h2 class="text-lg">No existen cursos cargados en la plataforma</h2>
    @endforelse
</x-layout>
