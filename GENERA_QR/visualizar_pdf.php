<?php
// Conexión a la base de datos y otras configuraciones necesarias
$conexion = new mysqli("localhost", "root", "", "sistema");
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Verificar si se ha proporcionado un ID válido
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_documento = $_GET['id'];
    
    // Obtener el nombre del documento desde la base de datos
    $sql = "SELECT pdf FROM documentos WHERE id = $id_documento";
    $resultado = $conexion->query($sql);
    if($resultado && $resultado->num_rows > 0) {
        $documento = $resultado->fetch_assoc();
        $nombre_archivo_pdf = $documento['pdf'];
        
        // Verificar si el nombre del archivo está vacío
        if(!empty($nombre_archivo_pdf)) {
            // Ruta relativa para acceder al archivo PDF
            $ruta_archivo_pdf = "http://localhost/estadias/Assets/Documentos/" . $nombre_archivo_pdf;
            
            // Redirigir directamente al PDF
            header("Location: $ruta_archivo_pdf");
            exit;
        } else {
            echo "El administrador aún no ha cargado un documento PDF para este registro.";
        }
    } else {
        echo "Documento no encontrado.";
    }
} else {
    echo "ID de documento no válido.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
