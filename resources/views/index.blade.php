<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glosario</title>
    <!-- Vinculación al CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        .encabezado {
            position: relative;
            text-align: center; /* Centra el contenido horizontalmente */
        }
        .imagen {
            display: inline-block;
            margin-right: 20px; /* Espaciado entre la imagen y el texto */
        }
        .texto {
            display: inline-block;
            vertical-align: middle; /* Centra verticalmente el texto */
        }
        #buscar {
            position: absolute;
            top: 75%;
            right: 20px;
            transform: translateY(-50%);
            border-radius: 20px;
            padding: 8px 20px;
            border: 2px solid #007bff;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        #buscar:focus {
            outline: none;
            border-color: #28a745;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <div class="encabezado">
        <div class="imagen">
            <img src="imagenes/upb1.png" class="img-thumbnail" alt="..." width="350" height="100">
        </div>
        <div class="texto">
            <h1 style="font-size: 36px;">Glosario Sistemas Cliente-Servidor</h1>
            <div style="display: inline-block;">
                <h2 style="margin-right: 10px; display: inline-block;">
                    <a href="{{ route('nuevo') }}" style="color: white; background-color: #007bff; padding: 8px 16px; font-size: 18px; text-decoration: none;">NUEVO</a>
                </h2>
                <h2 style="display: inline-block;">
                    <a href="{{ route('editar') }}" style="color: white; background-color: #28a745; padding: 8px 16px; font-size: 18px; text-decoration: none;">EDITAR</a>
                </h2>
            </div>
        </div>
        <!-- Formulario de búsqueda -->
        <input type="text" id="buscar" onkeyup="buscarConcepto()" placeholder="Buscar concepto...">
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Barra lateral izquierda vacía -->
        <div class="sidebar">
            <ul>
                @foreach ($conceptos as $concepto)
                    <h3><a href="#" id="termino{{ $concepto->id }}" onclick="mostrarDefinicion('{{ $concepto->id }}')">{{ $concepto->termino }}</a></h3>
                    <form action="{{ url('/'.$concepto) }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <!--<button class="eliminar" onclick="eliminarConcepto('{{ $concepto->id }}')">Eliminar</button>-->
                    </form>
                    </h3>
                @endforeach
            </ul>
        </div>
        
        <!-- Área central derecha -->
        <div class="content">
            <!-- Aquí se mostrará la definición del concepto seleccionado -->
            @foreach ($conceptos as $concepto)
                <div id="definicion{{ $concepto->id }}" style="display: none;">
                    <h1>{{ $concepto->definicion }}</h1>
                    <img src="foto.png" alt="..">
                </div>
                
            @endforeach
        </div>
    </div>

    <script>
        function mostrarDefinicion(conceptoId) {
            // Oculta todas las definiciones
            var definiciones = document.querySelectorAll('.content div');
            definiciones.forEach(function(definicion) {
                definicion.style.display = 'none';
            });

            // Muestra la definición del concepto seleccionado
            var definicion = document.getElementById('definicion' + conceptoId);
            definicion.style.display = 'block';
        }

        function buscarConcepto() {
            // Obtiene el valor del campo de búsqueda
            var input = document.getElementById("buscar");
            var filter = input.value.toUpperCase();
            var ul = document.querySelector(".sidebar ul");
            var li = ul.getElementsByTagName("h3");

            // Recorre todos los elementos de la lista y muestra solo los que coinciden con la búsqueda
            for (var i = 0; i < li.length; i++) {
                var a = li[i].getElementsByTagName("a")[0];
                var txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
