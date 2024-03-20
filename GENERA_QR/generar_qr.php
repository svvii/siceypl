<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="http://utparral.edu.mx/logotipos/UTP.png">
    <link href="../Assets/css/generador_qr.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Generador de QR</title>
</head>
<body>
    <?php
    if (isset($_GET["id"])) {
        $libro_id = $_GET["id"];
        
        // Conexión a la base de datos
        $servidor = "localhost";
        $usuario = "root";
        $contraseña = "";
        $base_de_datos = "sistema";
        $conexion = new mysqli($servidor, $usuario, $contraseña, $base_de_datos);
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para obtener los detalles del libro por su ID
        $sql = "SELECT * FROM documentos WHERE id = $libro_id";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $libro = $resultado->fetch_assoc();
            
            // Construir el contenido para el QR
            $contenido_qr = "Apellido Paterno: " . $libro["apellido_p"] . "\nApellido Materno: " . $libro["apellido_m"] . "\nNombres: " . $libro["nombre"] . "\nCarrera: " . $libro["id_carrera"] . "\nCodigo de Estadia: " . $libro["codigo_estadia"] . "\nNombre del Proyecto: " . $libro["nombre_proyecto"] . "\nFecha del documento:" . $libro["fecha_documento"] . "\nNombre de la Empresa:" . $libro["nombre_empresa"] . "\nTutor Academico:" . $libro["tutor_academico"]. "\nAsesor Academico: " . $libro["asesor_academico"] . "\nAsesor Empresarial: " . $libro["asesor_empresarial"] . "\nObservaciones: " . $libro["observaciones"]; 
        } else {
            $contenido_qr = "No se encontró información de libro.";
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    }
    ?>

    <h1>SISTEMA INTEGRAL PARA EL CONTROL DE ESTADÍAS</h1>
    
    <?php if (isset($contenido_qr)) : ?>
        <BR></BR>
        <button id="mostrarModal"><i class="fa-solid fa-qrcode"></i> Mostrar QR</button>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <h2>Información del Documento De Estadias:</h2>
                <pre><?php //echo $contenido_qr; ?></pre>
                <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo urlencode($contenido_qr); ?>" alt="Código QR" class="qr-code">
                <br>
                <button id="cerrarModal">Cerrar</button>
            </div>
        </div>
        <script>
            var modal = document.getElementById("myModal");
            var btnMostrar = document.getElementById("mostrarModal");
            var btnCerrar = document.getElementById("cerrarModal");

            btnMostrar.onclick = function() {
                modal.style.display = "block";
            }

            btnCerrar.onclick = function() {
                modal.style.display = "none";
            }
        </script>
    <?php else : ?>
        <p>No se encontró información de la Estadia.</p>
    <?php endif; ?>
</body>
</html>

</body>
</html>

