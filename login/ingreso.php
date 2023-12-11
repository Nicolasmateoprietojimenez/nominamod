<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso</title>
    <link rel="stylesheet" href="../styles/ingreso_styles.css">
</head>
<body>

<?php
require_once '../class/clase_usuarios.php';

if (isset($_POST['logear'])) {
    $tipo_documento = $_POST["tipo_documento"];
    $identidad_usuario = $_POST["id_usuario"];
    
    $password_usuario = $_POST["contrasena"];
    $estado_usuario = 1;
    $crud = new usuarios();

    $usuarios = $crud->validarusuario($identidad_usuario);

    if (!empty($usuarios)) {
        $tipo_doc = $usuarios[0]['tipo_documento'];
        $estado_usu = $usuarios[0]['estado_usuario'];
        $pass_usu = $usuarios[0]['password_usuario'];
        $tipo_usu = $usuarios[0]['id_tipo_usuario'];

        if (password_verify($password_usuario, $pass_usu) || PASSWORD($pass_usu) === $password_usuario) {

            if ($estado_usu == $estado_usuario) {

                if ($tipo_doc == $tipo_documento) {
                    $_SESSION['identidad_usuario'] = $identidad_usuario;
                    $valor_session = $_SESSION['identidad_usuario'];
                    echo "El valor de la session 'identidad_usuario' es: $valor_session";
                    if ($tipo_usu == 1){
                        echo '<script>';
                        echo 'alert("Bienvenido.");';
                        echo 'window.location.href = "../admin/admin.php";';
                        echo '</script>';
                        exit;
                    }elseif ($tipo_usu == 2){
                        echo '<script>';
                        echo 'alert("Bienvenido.");';
                        echo 'window.location.href = "../ope/ope.php";';
                        echo '</script>';
                        exit;
                    }else{
                        echo '<script>';
                        echo 'alert("Bienvenido.");';
                        echo 'window.location.href = "../lector/lector.php";';
                        echo '</script>';
                        exit;
                    }
                } else {
                    echo '<script>';
                    echo 'alert("Tipo de documento erróneo.");';
                    echo 'window.location.href = "ingreso.php";';
                    echo '</script>';
                    exit;
                }
            } else {
                echo '<script>';
                echo 'alert("Su estado de usuario se encuentra inactivo.");';
                echo 'window.location.href = "ingreso.php";';
                echo '</script>';
                exit;
            }
        } else {
            echo '<script>';
            echo 'alert("Contraseña incorrecta.");';
            echo 'window.location.href = "ingreso.php";';
            echo '</script>';
            exit;
        }
    } else {
        echo '<script>';
        echo 'alert("Usuario no encontrado.");';
        echo 'window.location.href = "ingreso.php";';
        echo '</script>';
        exit;
    }
}
?>

<main>
    <div class="login">
        <h2>INICIAR SESIÓN</h2>
        <form action="ingreso.php" method="POST">
            <h3>
                Bienvenido a <br> Nominamod
            </h3>
            <select name="tipo_documento" required>
                <option value="" disabled selected hidden>Tipo Documento</option>
                <option value="cedula_ciudadania">Cédula de Ciudadanía</option>
                <option value="cedula_extranjeria">Cédula de Extranjería</option>
                <option value="pasaporte">Pasaporte</option>
            </select>
            <input type="text" id="id_usuario" name="id_usuario" placeholder="N° Identificacion" required>
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>

            <input type="submit" name="logear" class="sumb1" value="logear">
            <input type="submit" class="sumb2" value="registrar" onclick="window.location.href='registro.php'";
        </form>
    </div>
</main>

</body>
</html>
