<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <link rel="stylesheet" href="../styles/admin_style.css">
</head>
<?php
require_once '../class/clase_emple.php';
$crud = new emple();



?>

<body>

    <form action="buscar.php" method="post">
        <label for="busqueda">Buscar por identificación:</label>
        <input type="text" name="busqueda" placeholder="Identificación...">
        <button type="submit">Buscar</button>
    </form>

    <table>
    <thead>
        <tr>
            <th>Identificación</th>
            <th>Nombre1</th>
            <th>Nombre2</th>
            <th>Apellido1</th>
            <th>Apellido2</th>
            <th>Estado Civil</th>
            <th>Correo</th>
            <th>Sexo</th>
            <th>Tipo Sangre</th>
            <th>Nomenclatura</th>
            <th>Calle</th>
            <th>Zona</th>
            <th>ID Supervisor</th>
            <th>Cod Sede</th>
            <th>ID Área</th>
            <th>Nro Cuenta</th>
            <th>ID Tipo Empleado</th>
            <th>Doc Identidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $records = $crud->read_emplex();
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>" . $record['identificacion'] . "</td>";
            echo "<td>" . $record['nombre1'] . "</td>";
            echo "<td>" . $record['nombre2'] . "</td>";
            echo "<td>" . $record['apellido1'] . "</td>";
            echo "<td>" . $record['apellido2'] . "</td>";
            echo "<td>" . $record['estado_civil'] . "</td>";
            echo "<td>" . $record['correo'] . "</td>";
            echo "<td>" . $record['sexo'] . "</td>";
            echo "<td>" . $record['tipo_sangre'] . "</td>";
            echo "<td>" . $record['nomenclatura'] . "</td>";
            echo "<td>" . $record['calle'] . "</td>";
            echo "<td>" . $record['zona'] . "</td>";
            echo "<td>" . $record['id_supervisor'] . "</td>";
            echo "<td>" . $record['cod_sede'] . "</td>";
            echo "<td>" . $record['id_area'] . "</td>";
            echo "<td>" . $record['nro_cuenta'] . "</td>";
            echo "<td>" . $record['id_tipo_empleado'] . "</td>";
            echo "<td>" . $record['doc_identidad'] . "</td>";
            echo "<td>
            <form action='ope_update.php' method='post'>
                <input type='hidden' name='identificacion' value='" . $record['identificacion'] . "'>
                <input type='hidden' name='nombre1' value='" . $record['nombre1'] . "'>
                <input type='hidden' name='nombre2' value='" . $record['nombre2'] . "'>
                <input type='hidden' name='apellido1' value='" . $record['apellido1'] . "'>
                <input type='hidden' name='apellido2' value='" . $record['apellido2'] . "'>
                <input type='hidden' name='estado_civil' value='" . $record['estado_civil'] . "'>
                <input type='hidden' name='correo' value='" . $record['correo'] . "'>
                <input type='hidden' name='sexo' value='" . $record['sexo'] . "'>
                <input type='hidden' name='tipo_sangre' value='" . $record['tipo_sangre'] . "'>
                <input type='hidden' name='nomenclatura' value='" . $record['nomenclatura'] . "'>
                <input type='hidden' name='calle' value='" . $record['calle'] . "'>
                <input type='hidden' name='zona' value='" . $record['zona'] . "'>
                <input type='hidden' name='id_supervisor' value='" . $record['id_supervisor'] . "'>
                <input type='hidden' name='cod_sede' value='" . $record['cod_sede'] . "'>
                <input type='hidden' name='id_area' value='" . $record['id_area'] . "'>
                <input type='hidden' name='nro_cuenta' value='" . $record['nro_cuenta'] . "'>
                <input type='hidden' name='id_tipo_empleado' value='" . $record['id_tipo_empleado'] . "'>
                <input type='hidden' name='doc_identidad' value='" . $record['doc_identidad'] . "'>
                <button type='submit' name='actualizar'>Actualizar</button>
            </form>     
        </td>";
        
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

    <div>
    <form action="admin_create.php" method="get">
        <button type="submit">Crear Nuevo Empleado</button>
    </form>
    </div>

</body>
</html>
