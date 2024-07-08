<x-layout>
    <x-titulo>Crear curso</x-titulo>

    <form action="/cursos" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
        </div>

        <div class="flex flex-col mb-4">
            <label for="instructor">Instructor:</label>
            <input type="text" name="instructor" id="instructor">
        </div>

        <div class="flex flex-col mb-4">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" id="categoria">
        </div>

        <div class="flex flex-col mb-4">
            <label for="nivel">Nivel:</label>
            <input type="text" name="nivel" id="nivel">
        </div>

        <input type="submit" value="Crear" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
