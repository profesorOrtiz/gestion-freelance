<x-layout>
    <x-titulo>Tecnologias</x-titulo>

    @foreach ($tecnologias as $tecnologia)
        <div class="mt-5">
            <h2 class="text-2xl mb-2">
                <a href="{{ route('tecnologias.show', $tecnologia->id) }}">
                    {{ $tecnologia->nombre }}
                </a>
            </h2>
        </div>
    @endforeach
</x-layout>
