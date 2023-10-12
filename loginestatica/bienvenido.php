<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("location: index.html"); 
    exit;
}

$nombre = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/principal.css">
</head>
<body>
    <h1>Bienvenido, <?php echo $nombre; ?>!</h1>
    <p><a href="cerrar_sesion.php">Cerrar Sesión</a></p>
</body>
</html>
