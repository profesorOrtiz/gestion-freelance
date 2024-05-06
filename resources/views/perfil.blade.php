<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
</head>
<body>
    <x-titulo>Este es el perfil de {{ $nombre }}</x-titulo>

    <h2>Mis proyectos</h2>

    @if($proyectos)
        @foreach ($proyectos as $proyecto)
            <ul>
                <li>{{ $proyecto['nombre'] }}</li>
                <li>{{ $proyecto['anio'] }}</li>
                <li>{{ $proyecto['estado'] }}</li>
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
</body>
</html>
