<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/adminv_style.css">
</head>
<body>
<?php
    require_once '../class/clase_emple.php';
    $crud = new emple();
    
    if (isset($_POST['actualizar'])) {
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
        $nro_cuenta = $_POST['nro_cuenta'];
        $id_tipo_empleado = $_POST['id_tipo_empleado'];
        $doc_identidad = $_POST['doc_identidad'];
    }
    if (isset($_POST['update'])) {
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
        $id_supervisor = ($_POST['id_supervisor'] !== 'no_aplica') ? $_POST['id_supervisor'] : null;
        $cod_sede = $_POST['cod_sede'];
        $id_area = $_POST['id_area'];
        $nro_cuenta = $_POST['nro_cuenta'];
        $id_tipo_empleado = $_POST['id_tipo_empleado'];
        $doc_identidad = $_POST['doc_identidad'];
    
        $result = $crud->update_emple(
            $identificacion,
            $nombre1,
            $nombre2,
            $apellido1,
            $apellido2,
            $estado_civil,
            $correo,
            $sexo,
            $tipo_sangre,
            $nomenclatura,
            $calle,
            $zona,
            $id_supervisor,
            $cod_sede,
            $id_area,
            $nro_cuenta,
            $id_tipo_empleado,
            $doc_identidad
        );
    
        if ($result) {
            echo '<script>';
            echo 'alert("Actualización exitosa");';
            echo 'window.location.href = "ope.php";';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Error en la actualización");';
            echo '</script>';
        }
    }
    ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="identificacion">Identificación:</label>
        <input type="text" name="identificacion" value="<?php echo $identificacion; ?>" required><br>

        <label for="nombre1">Nombre1:</label>
        <input type="text" name="nombre1" value="<?php echo $nombre1; ?>" required><br>

        <label for="nombre2">Nombre2:</label>
        <input type="text" name="nombre2" value="<?php echo $nombre2; ?>"><br>

        <label for="apellido1">Apellido1:</label>
        <input type="text" name="apellido1" value="<?php echo $apellido1; ?>"required><br>

        <label for="apellido2">Apellido2:</label>
        <input type="text" name="apellido2" value="<?php echo $apellido2; ?>"><br>

        <label for="estado_civil">Estado Civil:</label>
        <input type="text" name="estado_civil" value="<?php echo $estado_civil; ?>"  required><br>

        <label for="correo">Correo:</label>
        <input type="text" name="correo" value="<?php echo $correo; ?>"required><br>

        <label for="sexo">Sexo:</label>
        <input type="text" name="sexo" value="<?php echo $sexo; ?>"required><br>

        <label for="tipo_sangre">Tipo Sangre:</label>
        <input type="text" name="tipo_sangre" value="<?php echo $tipo_sangre; ?>"required><br>

        <label for="nomenclatura">Nomenclatura:</label>
        <input type="text" name="nomenclatura" value="<?php echo $nomenclatura; ?>"required><br>

        <label for="calle">Calle:</label>
        <input type="text" name="calle" value="<?php echo $calle; ?>"required><br>

        <label for="zona">Zona:</label>
        <input type="text" name="zona" value="<?php echo $zona; ?>"required><br>

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
            <option value="" disabled selected>Sede actual</option> 
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
        <input type="text" name="doc_identidad" value="<?php echo $doc_identidad; ?>"required><br>

        <input type="submit" value="Actualizar" name="update">
    </form>
</body>
</html>

