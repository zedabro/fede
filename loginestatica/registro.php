<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $servidor = "localhost";
    $usuario_db = "root";
    $contraseña_db = "";
    $nombre_db = "usuariosbdd";

    $conexion = new mysqli($servidor, $usuario_db, $contraseña_db, $nombre_db);

    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    $consulta = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("sss", $nombre, $correo, $contraseña);

    if ($stmt->execute()) {
        echo "Registro exitoso. <a href='index.html'>Iniciar Sesión</a>";
    } else {
        echo "Error en el registro: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
