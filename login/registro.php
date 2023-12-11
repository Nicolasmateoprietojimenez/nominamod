<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../styles/registro_styles.css">
    <script>
        function validarFormulario(event) {
            var password1 = document.getElementById("contrasena").value;
            var password2 = document.getElementById("confirmar_contrasena").value;
            var correo1 = document.getElementById("correo_electronico").value;
            var correo2 = document.getElementById("confirmar_correo").value;

            if (password1 !== password2) {
                alert("Las contraseñas no coinciden.");
                event.preventDefault();
            } else if (correo1 !== correo2) {
                alert("Las direcciones de correo no coinciden.");
                event.preventDefault();
            }
        }

        window.onload = function() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }

        function cerrarModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        
        function enviarOpcion(opcion) {
            cerrarModal(); 
        }
    </script>
</head>

<body>

    <?php
    require_once '../class/clase_usuarios.php';
    $crud = new usuarios();
    
    
    if (isset($_POST['guardar'])) {
        $nombre_usuario = $_POST['nombre_usuario'];
        $tipo_documento = $_POST['tipo_documento'];
        $identidad_usuario = $_POST['identidad_usuario'];
        $apellido_usuario = $_POST['apellido_usuario'];
        $telef_usuario = $_POST['telef_usuario'];
        $direcc_usuario = $_POST['direcc_usuario'];
        $correo_usuario = $_POST['correo_usuario'];
        $usuario_sistema = $_POST['usuario_sistema'];
        $password_usuario = $_POST['password_usuario'];
        
        $opcion = 1;
        
        $estado_usuario = 0;
        $pass2 = password_hash($password_usuario, PASSWORD_DEFAULT);
        $codigoactivacion = rand(1000, 9999);
        $fecha_actual = date("Y-m-d");
        $hora_actual = date("H:i:s");

        $data = [
            'identidad_usuario' => $identidad_usuario,
            'tipo_documento' => $tipo_documento,
            'nombre_usuario' => $nombre_usuario,
            'apellido_usuario' => $apellido_usuario,
            'id_tipo_usuario' => $opcion,
            'telef_usuario' => $telef_usuario,
            'direcc_usuario' => $direcc_usuario,
            'correo_usuario'=> $correo_usuario,
            'usuario_sistema' => $usuario_sistema,
            'password_usuario' => $pass2,
            'estado_usuario' => $estado_usuario
        ];

        $datados = [
            'codigo_verificacion' => $codigoactivacion,
            'fecha_verificacion' => $fecha_actual,
            'hora_verificacion' => $hora_actual,
            'identidad_usuario' =>$identidad_usuario
        ];

        $crud->create($data);
        $crud->verificacion($datados);

        require_once 'mail.php';

        $correo = new correo();

        $para = ['para' => $correo_usuario];
        $codigoactivacion = ['codigoactivacion' => $codigoactivacion];

        $correo->enviarCorreo($para, $codigoactivacion); 

        echo '<script>';
        echo 'alert("Para la activación de la cuenta, se enviará un mensaje de activación al correo electrónico.");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
    }
    ?>
    <main>
        <form action="registro.php" method="post">
            <div class="centro">
                <div class="formulario">
                    <div class="column">
                        <h3>Datos Personales</h3>
                        <div class="form-group">
                            <select name="tipo_documento" required>
                                <option value="" disabled selected hidden>Tipo Documento</option>
                                <option value="cedula_ciudadania">Cédula de Ciudadanía</option>
                                <option value="cedula_extranjeria">Cédula de Extranjería</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select><br>
                        </div>
                        <div class="form-group">
                            <input type="text" id="numero_documento" name="identidad_usuario" required placeholder="Número de Documento">
                        </div>
                        <div class="form-group">
                            <input type="text" id="nombres" name="nombre_usuario" required placeholder="Nombres Completos">
                        </div>
                        <div class="form-group">
                            <input type="text" id="apellidos" name="apellido_usuario" required placeholder="Apellidos Completos">
                        </div>
                        <div class="form-group">
                            <input type="tel" id="numero_telefono" name="telef_usuario" required placeholder="Número de Teléfono">
                        </div>
                        <div class="form-group">
                            <input type="text" id="direccion_residencia" name="direcc_usuario" required placeholder="Dirección de Residencia">
                        </div>
                    </div>
                    <div class="column">
                        <h3>Datos de Cuenta</h3>
                        <div class="form-group">
                            <input type="text" id="nombre_usuario" name="usuario_sistema" required placeholder="Nombre de Usuario">
                        </div>
                        <div class="form-group">
                            <input type="email" id="correo_electronico" name="correo_usuario" required placeholder="Correo Electrónico">
                        </div>
                        <div class="form-group">
                            <input type="email" id="confirmar_correo" name="correo_usuario2" required placeholder="Confirmar Correo Electrónico">
                        </div>
                        <div class="form-group">
                            <input type="password" id="contrasena" name="password_usuario" required placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="password" id="confirmar_contrasena" name="password_usuario2" required placeholder="Confirmar Contraseña">
                        </div>
                    </div>
                    <div class="login">
                    <input type="submit" name="guardar" class="sumb1" value="Crea cuenta" onclick="return validarFormulario(event);">
                </div>
                </div>
     
            </div>
        </form>
    </main>


    
</body>
</html>
