<x-layout>
    <x-titulo>Editar curso: {{ $curso['nombre'] }}</x-titulo>

    <form action="/cursos/{{ $curso['id'] }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $curso['nombre'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="instructor">Instructor:</label>
            <input type="text" name="instructor" id="instructor" value="{{ $curso['instructor'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" id="categoria" value="{{ $curso['categoria'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="nivel">Nivel:</label>
            <input type="text" name="nivel" id="nivel" value="{{ $curso['nivel'] }}">
        </div>

        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
