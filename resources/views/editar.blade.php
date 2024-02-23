<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Concepto</title>
    <!-- Vinculación al CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Vinculación a JavaScript -->
    <script>
        function mostrarDefinicion(termino, definicion) {
            // Actualizar los campos del formulario de edición
            document.getElementById("concepto").value = termino;
            document.getElementById("definicion").value = definicion;
        }
    </script>
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
                <h2 style="margin-right: 10px; display: inline-block;">
                    <a href="{{ route('nuevo') }}" style="color: white; background-color: #007bff; padding: 8px 16px; font-size: 18px; text-decoration: none;">NUEVO</a>
                </h2>
                <h2 class="float-flex"><a href="{{ route('index') }}">Regresar</a></h2>
            </div>
        </div>
        <!-- Formulario de búsqueda -->
        
    </div>

    <!-- Barra lateral izquierda -->
    <div class="sidebar">
        <ul>
            @foreach ($conceptos as $concepto)
                <li><a href="#" onclick="mostrarDefinicion('{{ $concepto->termino }}', '{{ $concepto->definicion }}')">{{ $concepto->termino }}</a></li>
            @endforeach
        </ul>
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Formulario para editar el concepto -->
        <div class="content">
    <h1>Editar Concepto</h1>
    <form action="{{ route('guardar_cambios') }}" method="POST">
        @csrf
        <!-- Campo oculto para el ID del concepto -->
        <input type="hidden" name="id" id="id" value="{{ $concepto->id }}">
        <label for="concepto">Concepto:</label><br>
        <input type="text" id="concepto" name="concepto" value="{{ $concepto->termino }}"><br><br>
        <label for="definicion">Definición:</label><br>
        <textarea id="definicion" name="definicion">{{ $concepto->definicion }}</textarea><br><br>
        <!-- Botón para guardar los cambios -->
        <button type="submit">Guardar Cambios</button>
    </form>
</div>

    </div>
</body>
</html>



