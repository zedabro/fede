<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    
    $consulta = "SELECT id, nombre FROM usuarios WHERE correo = ? AND contraseña = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("ss", $correo, $contraseña);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $nombre);
        $stmt->fetch();
        $_SESSION["id"] = $id;
        $_SESSION["nombre"] = $nombre;
        header("location: bienvenido.php"); 
    } else {
        echo "Error: Credenciales incorrectas.";
    }

    $stmt->close();
    $conexion->close();
}
?>
