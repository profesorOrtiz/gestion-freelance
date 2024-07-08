<x-layout>
    <x-titulo>Curso: {{ $curso['nombre'] }}</x-titulo>

    <div class="mt-4">
        <h2>{{ $curso['nombre'] }}</h2>
        <p>Dictado por: {{ $curso['instructor'] }}</p>
        <p>Categoria: {{ $curso['categoria'] }}</p>
        <p>Nivel: {{ $curso['nivel'] }}</p>
    </div>

    <div class="mt-6">
        <a href="/cursos/{{ $curso['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar el curso</a>
    </div>
</x-layout>
