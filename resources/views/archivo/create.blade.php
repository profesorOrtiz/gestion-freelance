<x-layout>
    {{-- Para subir archivos:
    1) El method siempre va a ser POST
    2) El action tiene que apuntar a la ruta que va a guardar el archivo
    3) Debemos agregar obligatoriamente enctype="multipart/form-data" --}}
    <form action="{{ route('archivo.store') }}" method="POST" class="my-10" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="archivo">Archivo</label>
            {{-- El tipo de input para subir archivos es file --}}
            <input type="file" name="archivo" id="archivo">
            @error('archivo')
                <p class="text-red-800">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5">
            <input type="submit" value="Guardar" class="p-3 text-blue-900 bg-blue-200 rounded">
        </div>
    </form>
</x-layout>
