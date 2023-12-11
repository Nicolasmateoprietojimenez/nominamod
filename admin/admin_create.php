<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="../styles/adminv_style.css">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Empleado</title>
</head>
<body>
   <?php
    require_once '../class/clase_emple.php';
    $crud = new emple();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $identificacion = $_POST['identificacion'];
        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $estado_civil = $_POST['estado_civil'];
        $correo = $_POST['correo'];
        $sexo = $_POST['sexo'];
        $tipo_sangre = $_POST['tipo_sangre'];
        $nomenclatura = $_POST['nomenclatura'];
        $calle = $_POST['calle'];
        $zona = $_POST['zona'];
        $id_supervisor = $_POST['id_supervisor'];
        $cod_sede = $_POST['cod_sede'];
        $id_area = $_POST['id_area'];
        $nro_cuenta = NULL;
        $id_tipo_empleado = $_POST['id_tipo_empleado'];
        $doc_identidad = $_POST['doc_identidad'];
        $id_supervisor = ($_POST['id_supervisor'] !== 'no_aplica') ? $_POST['id_supervisor'] : null;


        
        $data = [
            'identificacion' => $identificacion,
            'nombre1' => $nombre1,
            'nombre2' => $nombre2,
            'apellido1' => $apellido1,
            'apellido2' => $apellido2,
            'estado_civil' => $estado_civil,
            'correo' => $correo,
            'sexo' => $sexo,
            'tipo_sangre' => $tipo_sangre,
            'nomenclatura' => $nomenclatura,
            'calle' => $calle,
            'zona' => $zona,
            'id_supervisor' => $id_supervisor,
            'cod_sede' => $cod_sede,
            'id_area' => $id_area,
            'nro_cuenta' => $nro_cuenta,
            'id_tipo_empleado' => $id_tipo_empleado,
            'doc_identidad' => $doc_identidad,
        ];
    
        $result = $crud->create_emple($data);

        if ($result) {
            echo '<script>';
            echo 'alert("Registro exitoso");';
            echo 'window.location.href = "admin.php";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Error en el registro");';
            echo '</script>';
        }
        
        
    }

   ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="identificacion">Identificación:</label>
        <input type="text" name="identificacion" required><br>

        <label for="nombre1">Nombre1:</label>
        <input type="text" name="nombre1" required><br>

        <label for="nombre2">Nombre2:</label>
        <input type="text" name="nombre2"><br>

        <label for="apellido1">Apellido1:</label>
        <input type="text" name="apellido1" required><br>

        <label for="apellido2">Apellido2:</label>
        <input type="text" name="apellido2"><br>

        <label for="estado_civil">Estado Civil:</label>
        <input type="text" name="estado_civil"  required><br>

        <label for="correo">Correo:</label>
        <input type="text" name="correo" required><br>

        <label for="sexo">Sexo:</label>
        <input type="text" name="sexo" required><br>

        <label for="tipo_sangre">Tipo Sangre:</label>
        <input type="text" name="tipo_sangre" required><br>

        <label for="nomenclatura">Nomenclatura:</label>
        <input type="text" name="nomenclatura" required><br>

        <label for="calle">Calle:</label>
        <input type="text" name="calle"required><br>

        <label for="zona">Zona:</label>
        <input type="text" name="zona" required><br>

        <label for="id_supervisor">ID Supervisor:</label>
        <select name="id_supervisor">
        <option value="" disabled selected>Supervisor</option>
        <option value="no_aplica">No aplica</option>
        <?php
        $supervisors = $crud->read_supervisor();
        foreach ($supervisors as $supervisor) {
            echo "<option value='{$supervisor['identificacion']}'>{$supervisor['identificacion']}</option>";
        }
        ?>
    </select><br>


        <label for="cod_sede">Cod Sede:</label>
        <select name="cod_sede" required>
            <option value="" disabled selected>Sede</option>
            <?php
            $sedes = $crud->read_sede();
            foreach ($sedes as $sede) {
                echo "<option value='{$sede['cod_sede']}'>{$sede['nombre_sede']}</option>";
            }
            ?>
        </select><br>

        <label for="id_area">ID Área:</label>
    <select name="id_area" required>
    <option value="" disabled selected>Area</option>
        <?php
        $areas = $crud->read_area();
        foreach ($areas as $area) {
            echo "<option value='{$area['id_area']}'>{$area['nombre_area']}</option>";
        }
        ?>
    </select><br>

    <label for="id_tipo_empleado">ID Tipo Empleado:</label>
    <select name="id_tipo_empleado" required>
    <option value="" disabled selected>Tipo empleado</option>
        <?php
        $tipos = $crud->read_tipo();
        foreach ($tipos as $tipo) {
            echo "<option value='{$tipo['id_tipo_empleado']}'>{$tipo['nombre_tipo_empleado']}</option>";
        }
        ?>
    </select><br>

    
        <label for="doc_identidad">Doc Identidad:</label>
        <input type="text" name="doc_identidad" required><br>

        <input type="submit" value="insertar">
    </form>
    <div>
    <form action="admin.php" method="get">
        <button type="submit">Volver</button>
    </form>
    </div>
</body>
</html>

</body>
</html>