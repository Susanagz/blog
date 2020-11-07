<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grabaciones</title>
</head>
<body>
    <h1>Crear nueva Grabación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@if(isset($grabacion))
    <form action="{{ route('grabacion.update', [$grabacion]) }}" method="POST">
        @method('patch')
@else
    <form action="{{ route('grabacion.store') }}" method="POST">
@endif

    <!--<form action="/grabacion" method="POST">-->
        @csrf
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" value="{{ old('fecha') }}{{ $grabacion->fecha ??''}}"><br>

        <label for="tema">Tema</label>
        <input type="text" name="tema" value="{{ old('tema') }}{{ $grabacion->tema ??''}}"><br>

        <label for="observaciones">Observaciones</label>
        <textarea name="observaciones">{{ old('observaciones') }}{{ $grabacion->observaciones ??''}}</textarea><br>

        <label for="enlace">Enlace</label>
        <input type="text" name="enlace" value="{{ old('enlace') }}{{ $grabacion->enlace ??''}}"><br>


        <button type="submit">Enviar</button>
    </form>

</body>
</html>