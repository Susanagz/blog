<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentos</title>
</head>
<body>
    <h1>Crear nuevo Alimento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@if(isset($alimento))
    <form action="{{ route('alimento.update', [$alimento]) }}" method="POST">
        @method('patch')
@else
    <form action="{{ route('alimento.store') }}" method="POST">
@endif

    <!--<form action="/alimento" method="POST">-->
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') ?? $alimento->nombre ??''}}"><br>

        <label for="precio">Precio</label>
        <input type="text" name="precio" value="{{ old('precio') ?? $alimento->precio ??''}}"><br>


        <button class="btn btn-success" type="submit">Enviar</button>
    </form>

</body>
</html>
