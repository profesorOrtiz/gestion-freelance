<x-layout>
    <x-titulo>Curso: {{ $curso['nombre'] }}</x-titulo>

    <div class="mt-4">
        <h2>{{ $curso['nombre'] }}</h2>
        <p>Dictado por: {{ $curso['instructor'] }}</p>
        <p>Categoria: {{ $curso['categoria'] }}</p>
        <p>Nivel: {{ $curso['nivel'] }}</p>
    </div>

    @auth
    <div class="flex mt-6 gap-x-6">
        <a href="/cursos/{{ $curso['id'] }}/edit" class="p-4 text-blue-900 bg-blue-200">Editar el curso</a>
        <form method="POST" action="/cursos/{{ $curso['id'] }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button class="p-4 font-bold text-red-800" id="boton-eliminar">Eliminar el curso</button>
        </form>
    </div>
    @endauth
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
