<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentos</title>
</head>
<body>
    <h1>Listado de Alimentos</h1>
    <a href="/alimento/create">Registrar nuevo Alimento</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>

        @foreach ($alimentos as $ali)
            <tr>
                <td>{{ $ali->id }}</td>
                <td><a href="/alimento/{{$ali->id}}">{{ $ali->nombre }}</a></td>
                <td><a href="/alimento/{{$ali->id}}">{{ $ali->precio }}</a></td>
            </tr>
        @endforeach

    </table>
</body>
</html>