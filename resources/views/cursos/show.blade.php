<x-layout>
    <x-titulo>Curso: {{ $curso['nombre'] }}</x-titulo>

    <div class="mt-4">
        <h2>{{ $curso['nombre'] }}</h2>
        <p>Dictado por: {{ $curso['instructor'] }}</p>
        <p>Categoria: {{ $curso['categoria'] }}</p>
        <p>Nivel: {{ $curso['nivel'] }}</p>
    </div>

    <div class="mt-6 flex gap-x-6">
        <a href="/cursos/{{ $curso['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar el curso</a>
        <form method="POST" action="/cursos/{{ $curso['id'] }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar el curso</button>
        </form>
    </div>
</x-layout>
<script>
    let botonEliminar = document.querySelector("#boton-eliminar");

    botonEliminar.addEventListener("click", function(e) {
        // Desactivar el envio automatico del formulario
        e.preventDefault();

        let confirmacion = confirm("¿Está seguro que desea eliminar el curso?");
        if(confirmacion) {
            let formEliminar = document.querySelector("#form-eliminar");
            // Enviar el formulario para que sea procesado
            formEliminar.submit();
        }
    });
</script>
