<?php
$db_host = "localhost";
$db_user = "root";
$db_nombre = "usuario";
$db_pass = "";

$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_nombre);
if(mysqli_connect_errno()){
    echo "la conexion ha fallado";
    exit();
}
mysqli_select_db($conexion,$db_nombre) or die ("no se encontro la bd");

?>
