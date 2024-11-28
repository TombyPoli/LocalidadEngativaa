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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <style>
        body {
            background-color: #87ccc1;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            width: 50%;
            margin: auto;
            margin-top: 30px;
        }
        table {
            border: 3px solid #cca633;
            padding: 20px 50px;
            margin-top: 20px;
            border-radius: 5px;
            background-color: #edf797;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Formulario de Registro</h1>
    <form action="" method="post">
        <table border="0" align="center">
            <tr>
                <td>Día:</td>
                <td><input type="text" name="dia" placeholder="Día (Ej: 28 Mayo)" required></td>
            </tr>
            <tr>
                <td>Año:</td>
                <td><input type="number" name="anio" placeholder="Año (Ej: 2024)" required></td>
            </tr>
            <tr>
                <td>NDVI:</td>
                <td><input type="number" step="0.001" name="NDVI" placeholder="NDVI (Ej: 0.75)" required></td>
            </tr>
            <tr>
                <td>NDWI:</td>
                <td><input type="number" step="0.001" name="NDWI" placeholder="NDWI (Ej: 0.65)" required></td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" name="registro" value="Registrar">
                </td>
                <td align="center">
                    <input type="reset" value="Limpiar">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['registro'])) {
        $dia = $_POST['dia'];
        $anio = $_POST['anio'];
        $NDVI = $_POST['NDVI'];
        $NDWI = $_POST['NDWI'];

        // Consulta SQL corregida
        $InsertarDatos = "INSERT INTO datosndwiyndvi (dia, año, NDVI, NDWI) 
                          VALUES ('$dia', '$anio', '$NDVI', '$NDWI')";
        
        $EjecutarInsertar = $enlace->query($InsertarDatos);

        if ($EjecutarInsertar) {
            echo "<p style='text-align: center; color: green;'>Registro exitoso.</p>";
        } else {
            echo "<p style='text-align: center; color: red;'>Error al registrar: " . $enlace->error . "</p>";
        }
    }
    ?>
</body>
</html>