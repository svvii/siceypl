<?php
// Inicializa la variable del contenido
$contenido = "";

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtiene el contenido ingresado por el usuario
    $contenido = $_POST["contenido"];
    
    // Escapa el contenido para evitar posibles problemas de seguridad
    $contenido = htmlspecialchars($contenido);
    
    // Tamaño del código QR en píxeles
    $tamano = "200x200";
    
    // Construye la URL del API de Google Charts
    $url = "https://chart.googleapis.com/chart?chs={$tamano}&cht=qr&chl={$contenido}";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Código QR sandra</title>
</head>
<body>
    <h1>Generador de Código QR</h1>
    <form method="post">
        <label for="contenido">Contenido del Código QR:</label>
        <input type="text" name="contenido" id="contenido" value="<?php echo $contenido; ?>">
        <button type="submit">Generar Código QR</button>
    </form>

    <!-- Mostrar la imagen del código QR si hay un contenido válido -->
    <?php if (!empty($contenido)) : ?>
        <h2>Código QR Generado:</h2>
        <img src="<?php echo $url; ?>" alt="Código QR">
    <?php endif; ?>
</body>
</html>
