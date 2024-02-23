<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Concepto</title>
    <!-- Vinculación al CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Encabezado -->
    <div class="encabezado">
        <div class="imagen">
            <img src="imagenes/upb1.png" class="img-thumbnail" alt="..." width="350" height="100">
        </div>
        <div class="texto">
            <h1 style="font-size: 24px;">Glosario Sistemas Cliente-Servidor</h1>
            <div style="display: inline-block;">
                <h2 style="display: inline-block;">
                    <a href="{{ route('editar') }}" style="color: white; background-color: #28a745; padding: 8px 16px; font-size: 18px; text-decoration: none;">EDITAR</a>
                </h2>
                <h2 class="float-flex"><a href="{{ route('index') }}">Regresar</a></h2>
            </div>
        </div>
    </div>

    <!-- Barra lateral derecha -->
    <div class="sidebar">
        <a href="{{ route('glosario.about') }}" style="margin-top: 10px; font-size: 16px;">Acerca de...</a>
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Formulario para agregar un nuevo concepto -->
        <div class="content">
            <h1>Agregar Nuevo Concepto</h1>
            <form action="{{ route('guardar_concepto') }}" method="POST">
                @csrf
                <label for="concepto">Concepto:</label><br>
                <input type="text" id="concepto" name="concepto"><br><br>
                <label for="definicion">Definición:</label><br>
                <textarea id="definicion" name="definicion"></textarea><br><br>
                <button type="submit">Guardar Concepto</button>
            </form>
        </div>
    </div>
</body>
</html>
