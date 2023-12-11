<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Empleado</title>
    <link rel="stylesheet" href="../styles/lector_style.css">
</head>
<?php
require_once '../class/clase_emple.php';
$crud = new emple();

if (isset($_SESSION['identidad_usuario'])) {
    $valor_session = $_SESSION['identidad_usuario'];
    echo "El valor de la session 'identidad_usuario' en este archivo es: $valor_session";



} else {
    echo "La session 'identidad_usuario' no está definida en este archivo.";
}
?>

<table border="1">
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
            <th>Imprimir</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $records = $crud->read_emple($valor_session);
        //var_dump($records);
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
            <form action='pdf_empleado.php' method='post'>
                <input type='hidden' name='identificacion' value='" . $record['identificacion'] . "'>
                <button type='submit' >Imprimir</button>
        </form>        
        </td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>
</body>
</html>