<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grabaciones</title>
</head>
<body>
    <h1>Listado de Grabaciones</h1>
    <a href="/grabacion/create">Crear nueva grabacion</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Tema</th>
        </tr>

        @foreach ($grabaciones as $grab)
            <tr>
                <td>{{ $grab->id }}</td>
                <td><a href="/grabacion/{{$grab->id}}">{{ $grab->tema }}</a></td>
            </tr>
        @endforeach

    </table>
</body>
</html>