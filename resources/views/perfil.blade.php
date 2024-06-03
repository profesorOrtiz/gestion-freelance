<x-layout>
    <x-titulo>Este es el perfil de {{ $nombre }}</x-titulo>

    <h2>Mis proyectos</h2>

    @if($proyectos)
        @foreach ($proyectos as $proyecto)
            <ul class="mt-8">
                <li>{{ $proyecto['creacion'] }}</li>
                <li>{{ $proyecto['nombre'] }}</li>
                <li>{{ $proyecto['anio'] }}</li>
                <li>{{ $proyecto['estado'] }}</li>

                @if($proyecto['tipo'] == 'web')
                <li>{{ $proyecto['rol'] }}</li>
                <li>{{ $proyecto['supervisor'] }}</li>
                @endif

                @if($proyecto['tipo'] == 'curso')
                <li>{{ $proyecto['organizacion'] }}</li>
                @endif
            </ul>
        @endforeach
    @else
        <p>De momento no existen proyectos cargados.</p>
    @endif



    @php
        $suma = 1 + 1;
    @endphp
    <p>El resultado de la suma es {{ $suma }}</p>

    {{-- Tarea: crear un componente llamado footer cuyo texto será el siguiente:
    &copy; AÑO ACTUAL SU NOMBRE - Todos los derechos reservados.
        --}}
    <x-footer />
</x-layout>
