<?php
$servername = "127.0.0.1"; // Dirección del servidor
$username = "root";        // Usuario por defecto de MySQL
$password = "";            // Contraseña por defecto (vacía en XAMPP)
$dbname = "localidad_engativa"; // Nombre de tu base de datos
$port = 4306;              // Puerto correcto

// Crear conexión
$enlace = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar conexión
if ($enlace->connect_error) {
    die("Conexión fallida: " . $enlace->connect_error);
}

// Consulta para obtener todos los registros de la tabla
$consulta = "SELECT * FROM datosndwiyndvi";
$resultado = $enlace->query($consulta);

if (!$resultado) {
    die("No se ha podido realizar la consulta: " . $enlace->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos NDVI y NDWI</title>
    <style>
        body {
            background-color: #87ccc1;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #edf797;
            border: 2px solid #cca633;
            border-radius: 5px;
        }
        th, td {
            border: 1px solid #cca633;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #cca633;
            color: white;
        }
        a {
            display: block;
            text-align: center;
            margin: 20px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Datos Registrados</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Día</th>
            <th>Año</th>
            <th>NDVI</th>
            <th>NDWI</th>
        </tr>
        <?php
        // Mostrar los datos en la tabla
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['dia'] . "</td>";
            echo "<td>" . $fila['año'] . "</td>";
            echo "<td>" . $fila['NDVI'] . "</td>";
            echo "<td>" . $fila['NDWI'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="index.html">Volver Atrás</a>

    <?php
    // Cerrar conexión
    $enlace->close();
    ?>
</body>
</html>
