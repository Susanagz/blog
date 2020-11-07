<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentos</title>
</head>
<body>
    <h1>Información de Alimentos</h1>
    <a href="/alimentos/create">Crear nuevo Alimento</a>

    <!--<a href="/alimento/{{ $alimento->id}}/edit">Editar</a>-->
    <br>
    <a href="{{ route('alimento.edit',[$alimento->id]) }}">Editar Alimento</a>
    <br>
    <form action="{{ route('alimento.destroy',[$alimento]) }}" method="POST">
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
            <td>{{ $alimento->id }}</td>
            <td>{{ $alimento->nombre }}</td>
            <td>{{ $alimento->precio }}</td>
        </tr>
    </table>
</body>
</html>
