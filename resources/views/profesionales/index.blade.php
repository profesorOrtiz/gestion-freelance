<x-layout>
    <x-titulo>Profesionales</x-titulo>

    @foreach ($profesionales as $profesional)
        <div class="mt-5">
            <h2 class="text-2xl mb-2">
                {{ $profesional->nombre . ' ' . $profesional->apellido }}
            </h2>
            @php
                $colores = [
                    'violet' => ['bg-violet-300', 'text-violet-900', 'hover:bg-violet-400'],
                    'green' => ['bg-green-300', 'text-green-900', 'hover:bg-green-400'],
                    'yellow' => ['bg-yellow-300', 'text-yellow-900', 'hover:bg-yellow-400'],
                    'red' => ['bg-red-300', 'text-red-900', 'hover:bg-red-400'],
                    'blue' => ['bg-blue-300', 'text-blue-900', 'hover:bg-blue-400'],
                ];
            @endphp
            {{-- tecnologias es el método de relación que existe en el modelo Profesional --}}
            @foreach ($profesional->tecnologias as $tecnologia)
                <a href="{{ route('tecnologias.show', $tecnologia->id) }}" class="inline-block {{ $colores[$tecnologia->color][0] }} {{ $colores[$tecnologia->color][1] }} py-1 px-3 rounded-xl mr-2 {{ $colores[$tecnologia->color][2] }}">
                    {{ $tecnologia->nombre }}
                </a>
            @endforeach
        </div>
    @endforeach
</x-layout>
