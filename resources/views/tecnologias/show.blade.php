<x-layout>
    <x-titulo>{{ $tecnologia->nombre }}</x-titulo>

    @foreach ($tecnologia->profesionales as $profesional)
        <div class="mt-5">
            <h2 class="text-2xl mb-2">
                {{ $profesional->nombre . ' ' . $profesional->apellido }}
            </h2>
        </div>
    @endforeach
</x-layout>
