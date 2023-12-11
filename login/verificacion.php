<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activación de cuenta</title>
</head>
<body>
    

<?php
require_once '../class/clase_usuarios.php';
$crud = new usuarios();


if (isset($_POST['subir'])){
    $identidad_usuario = $_POST['identidad_usuario'];
    $codigo_verificacion = $_POST['codigo_verificacion'];
    
    $id_verificacion = $crud->obtenerUltimaVerificacion($identidad_usuario);
    $id_verificacion_obtenido = $id_verificacion;
    $codigo_verificacion_db = $crud->verificacionread($id_verificacion_obtenido);
    $codigo_verificacion_obtenido = $codigo_verificacion_db[0]['codigo_verificacion'];

    if ($codigo_verificacion_obtenido == $codigo_verificacion) {
        
        ?>
        <script>
            alert("Estado de cuenta activado. Código de verificación válido: <?php echo $codigo_verificacion_obtenido; ?>");
        </script>
        <?php
        $data = ['estado_usuario' => 1];
        $actualizacion_exitosa = $crud->verificacionupdate($identidad_usuario, $data);
    } else {
         echo $codigo_verificacion_obtenido;
        ?>
        <!--
        <script>
            alert("No se encontró un código de verificación para esta identidad de usuario.");
            window.location.href = "verificacion.php";
        </script> -->
        <?php
    }
}
?>


    <div class="general">
    <h1>Activación de cuenta</h1>
        <div class="contenedor_verifi">
            <form action="verificacion.php" method="post">
                <input type="text" id="numero_documento" name="identidad_usuario" required placeholder="Número de Documento">
                <input type="text" id="codigo_verificacion" name="codigo_verificacion" required placeholder="Codigo de verificación">
                <input type="submit" value="subir" name="subir">
            </form>
        </div>
    </div>
</body>
</html>
