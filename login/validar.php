<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "rol");

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $filas = mysqli_fetch_array($resultado);
    
    if (!empty($filas)) {
        if ($filas['id_cargo'] == 1) { // Administrador
            header("location: admin.php");
        } else if ($filas['id_cargo'] == 2) { // Cliente
            header("location: cliente.php");
        } else {
            include("index.html");
            echo "<h1 class='bad'>ERROR EN LA AUTENTIFICACION</h1>";
        }
    } else {
        include("index.html");
        echo "<h1 class='bad'>ERROR EN LA AUTENTIFICACION</h1>";
    }
} else {
    include("index.html");
    echo "<h1 class='bad'>ERROR EN LA AUTENTIFICACION</h1>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
