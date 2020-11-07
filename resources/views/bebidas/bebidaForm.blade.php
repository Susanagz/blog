<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas</title>
</head>
<body>
    <h1>Crear nueva Bebida</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@if(isset($bebida))
    <form action="{{ route('bebida.update', [$bebida]) }}" method="POST">
        @method('patch')
@else
    <form action="{{ route('bebida.store') }}" method="POST">
@endif

    <!--<form action="/bebida" method="POST">-->
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') ?? $bebida->nombre ??''}}"><br>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="{{ old('precio') ?? $bebida->precio ??''}}"><br>


        <button type="submit">Enviar</button>
    </form>

</body>
</html>