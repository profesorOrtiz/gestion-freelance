<x-layout>
    <x-titulo>Contacto</x-titulo>

    <p>Esta es la página para contactarte con {{ $nombre }}</p>

    @if (session('estado') === 'ok'):
        <div>
            Hemos recibido tu mensaje y te contestaremos a la brevedad
        </div>
    @endif

    <form action="{{ route('contacto.guardar') }}" method="POST" class="my-10">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <p class="text-red-800">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje">{{ old('mensaje') }}</textarea>
            @error('mensaje')
                <p class="text-red-800">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5">
            <input type="submit" value="Enviar" class="p-3 text-blue-900 bg-blue-200 rounded">
        </div>
    </form>

    <x-footer />
</x-layout>
