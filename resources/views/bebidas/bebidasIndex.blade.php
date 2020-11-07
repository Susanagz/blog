<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas</title>
</head>
<body>
    <h1>Listado de Bebidas</h1>
    <a href="/bebida/create">Registrar nueva Bebida</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>

        @foreach ($bebidas as $beb)
            <tr>
                <td>{{ $beb->id }}</td>
                <td><a href="/bebida/{{$beb->id}}">{{ $beb->nombre }}</a></td>
                <td><a href="/bebida/{{$beb->id}}">{{ $beb->precio }}</a></td>
            </tr>
        @endforeach

    </table>
</body>
</html>