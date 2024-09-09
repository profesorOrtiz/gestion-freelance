<x-layout>
    <x-titulo>Profesionales</x-titulo>

    @foreach ($profesionales as $profesional)
        <div class="mt-5">
            <h2 class="text-2xl mb-2">
                {{ $profesional->nombre . ' ' . $profesional->apellido }}
            </h2>
            {{-- tecnologias es el método de relación que existe en el modelo Profesional --}}
            @foreach ($profesional->tecnologias as $tecnologia)
                <a href="{{ route('tecnologias.show', $tecnologia->id) }}" class="inline-block bg-violet-300 text-violet-900 py-1 px-3 rounded-xl mr-2 hover:bg-violet-400">
                    {{ $tecnologia->nombre }}
                </a>
            @endforeach
        </div>
    @endforeach
</x-layout>
