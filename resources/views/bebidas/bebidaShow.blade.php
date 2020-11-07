<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas</title>
</head>
<body>
    <h1>Información de Bebidas</h1>
    <a href="/bebidas/create">Crear nueva Bebida</a>
    
    <!--<a href="/bebida/{{ $bebida->id}}/edit">Editar</a>-->
    <br>
    <a href="{{ route('bebida.edit',[$bebida->id]) }}">Editar Bebida</a>
    <br>
    <form action="{{ route('bebida.destroy',[$bebida]) }}" method="POST">
         @method('DELETE')
         @csrf
         <button type="submit">Eliminar</button>
    </form>


    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td>{{ $bebida->id }}</td>
            <td>{{ $bebida->nombre }}</td>
            <td>{{ $bebida->precio }}</td>
        </tr>
    </table>
</body>
</html>