<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grabaciones</title>
</head>
<body>
    <h1>Información de Grabaciones</h1>
    <a href="/grabaciones/create">Crear nueva grabacion</a>
    
    <a href="/grabacion/{{ $grabacion->id}}/edit">Editar</a>
    <br>
    <a href="{{ route('grabacion.edit',[$grabacion->id]) }}">Editar Grabación</a>
    <br>
    <form action="{{ route('grabacion.destroy',[$grabacion]) }}" method="POST">
         @method('DELETE')
         @csrf
         <button type="submit">Eliminar</button>
    </form>


    <table>
        <tr>
            <th>ID</th>
            <th>Tema</th>
        </tr>
        <tr>
            <td>{{ $grabacion->id }}</td>
            <td>{{ $grabacion->tema }}</td>
        </tr>
    </table>
</body>
</html>