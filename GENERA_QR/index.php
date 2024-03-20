<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$resultado = null;
$filtrar = "";
$contadorResultados = 0;

if (isset($_GET['buscar'])) {
    $termino = $_GET['buscar'];
    $tipo_busqueda = $_GET['tipo_busqueda'];

    if (!empty($termino) && !empty($tipo_busqueda)) {
        $palabras_clave = explode(' ', $termino);

        switch ($tipo_busqueda) {
            case 'nombre_matricula':
                $condiciones = [];
                foreach ($palabras_clave as $palabra) {
                    $condiciones[] = "(nombre LIKE '%$palabra%' OR matricula LIKE '%$palabra%')";
                }
                $filtrar = " WHERE " . implode(' AND ', $condiciones);
                break;
            case 'empresa':
                $condiciones = [];
                foreach ($palabras_clave as $palabra) {
                    $condiciones[] = "nombre_empresa LIKE '%$palabra%'";
                }
                $filtrar = " WHERE " . implode(' AND ', $condiciones);
                break;
            case 'tutor':
                $condiciones = [];
                foreach ($palabras_clave as $palabra) {
                    $condiciones[] = "tutor_academico LIKE '%$palabra%'";
                }
                $filtrar = " WHERE " . implode(' AND ', $condiciones);
                break;
            case 'asesor_academico':
                $condiciones = [];
                foreach ($palabras_clave as $palabra) {
                    $condiciones[] = "asesor_academico LIKE '%$palabra%'";
                }
                $filtrar = " WHERE " . implode(' AND ', $condiciones);
                break;
            case 'asesor_empresarial':
                $condiciones = [];
                foreach ($palabras_clave as $palabra) {
                    $condiciones[] = "asesor_empresarial LIKE '%$palabra%'";
                }
                $filtrar = " WHERE " . implode(' AND ', $condiciones);
                break;
            default:
                break;
        }

        $sql = "SELECT id, CONCAT(apellido_p, ' ', apellido_m, ' ', nombre) AS nombre_completo, matricula, nombre_empresa, tutor_academico, asesor_academico, asesor_empresarial FROM documentos" . $filtrar;
        $resultado = $conexion->query($sql);

        if ($resultado === false) {
            die("Error en la consulta: " . $conexion->error);
        }

        $contadorResultados = $resultado->num_rows;
    } else {
        echo "<p class='mensaje-box'>Por favor, ingrese un término de búsqueda y seleccione un tipo de búsqueda.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="http://utparral.edu.mx/logotipos/UTP.png">
    <link href="../Assets/css/BUSCADOR_ESTADIAS.CSS" rel="stylesheet">
    <link href="../Assets/css/LOGO.CSS" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/Zpi_Bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Buscador Estadias</title>
</head>
<body>
<header>
        <div class="logo-left">
        <a href="http://localhost/estadias/Administracion/home"><img src="../../../estadias/Assets/img/utp_modificado.png" width="60" height="60"></a></div>
        <div class="title-center"><h1>SISTEMA INTEGRAL PARA EL CONTROL DE ESTADÍAS</h1></div>
        <div class="logo-right"><a href="http://localhost/estadias/Administracion/home"><img src="../../../estadias/Assets/img/lobo_negro.png" width="60" height="60"></a></div>
    </header>
    <br>
    <form action="" method="GET" style="text-align: center;">
        <input type="text" name="buscar" placeholder="Buscar por Nombre, Matrícula, Empresa, Tutor, Asesor Académico, Asesor Empresarial" style="font-size: 1.2em; padding: 0.5em; border: 1px solid #2ecc71; border-radius: 5px;" value="<?php echo isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : ''; ?>">

        <select name="tipo_busqueda" style="font-size: 1.2em; padding: 0.5em; border: 1px solid #2ecc71; border-radius: 5px;">
            <option value="nombre_matricula" <?php echo (isset($_GET['tipo_busqueda']) && $_GET['tipo_busqueda'] == 'nombre_matricula') ? 'selected' : ''; ?>>Nombre o Matrícula</option>
            <option value="empresa" <?php echo (isset($_GET['tipo_busqueda']) && $_GET['tipo_busqueda'] == 'empresa') ? 'selected' : ''; ?>>Nombre de la Empresa</option>
            <option value="tutor" <?php echo (isset($_GET['tipo_busqueda']) && $_GET['tipo_busqueda'] == 'tutor') ? 'selected' : ''; ?>>Tutor Académico</option>
            <option value="asesor_academico" <?php echo (isset($_GET['tipo_busqueda']) && $_GET['tipo_busqueda'] == 'asesor_academico') ? 'selected' : ''; ?>>Asesor Académico</option>
            <option value="asesor_empresarial" <?php echo (isset($_GET['tipo_busqueda']) && $_GET['tipo_busqueda'] == 'asesor_empresarial') ? 'selected' : ''; ?>>Asesor Empresarial</option>
        </select>

        <input type="submit" value="Buscar" style="font-size: 1.2em; padding: 0.5em 1em; background-color: #248a0e; color: white; border: none; border-radius: 5px; cursor: pointer;">
    </form>

    <?php
    if ($contadorResultados > 0) {
        echo "<p class='mensaje-box'>Total de resultados: $contadorResultados</p>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Matrícula</th><th>Nombre Empresa</th><th>Tutor Académico</th><th>Asesor Académico</th><th>Asesor Empresarial</th><th>Acciones</th></tr>";
        while ($estadia = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$estadia['id']}</td>";
            echo "<td>{$estadia['nombre_completo']}</td>";
            echo "<td>{$estadia['matricula']}</td>";
            echo "<td>{$estadia['nombre_empresa']}</td>";
            echo "<td>{$estadia['tutor_academico']}</td>";
            echo "<td>{$estadia['asesor_academico']}</td>";
            echo "<td>{$estadia['asesor_empresarial']}</td>";
            echo "<td><a href='generar_qr.php?id={$estadia['id']}' style='text-align: center; display: block;'><i class='fa-solid fa-qrcode' style='display: inline-block;'></i></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='mensaje-box'>No se encontraron resultados.</p>";
    }
    ?>

    <?php
    $conexion->close();
    ?>
</body>
</html>
