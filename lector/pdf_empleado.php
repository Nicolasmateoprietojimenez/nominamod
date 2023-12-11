<?php
session_start();

require_once '../fpf/fpdf.php';
require_once '../class/clase_emple.php'; // Asegúrate de tener la ruta correcta al archivo clase_emple.php

class ComprobanteEmpleado extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, utf8_decode('Comprobante de Empleado'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }

    function DatosEmpleado($datos) {
        $this->SetFont('Helvetica', '', 12);
        $this->Cell(0, 10, utf8_decode('Identificación: ') . $datos['identificacion'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Nombre: ') . $datos['nombre1'] . ' ' . $datos['nombre2'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Apellido: ') . $datos['apellido1'] . ' ' . $datos['apellido2'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Estado Civil: ') . $datos['estado_civil'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Correo: ') . $datos['correo'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Sexo: ') . $datos['sexo'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Tipo Sangre: ') . $datos['tipo_sangre'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Nomenclatura: ') . $datos['nomenclatura'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Calle: ') . $datos['calle'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Zona: ') . $datos['zona'], 0, 1);
        $this->Cell(0, 10, utf8_decode('ID Supervisor: ') . $datos['id_supervisor'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Código Sede: ') . $datos['cod_sede'], 0, 1);
        $this->Cell(0, 10, utf8_decode('ID Área: ') . $datos['id_area'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Número de Cuenta: ') . $datos['nro_cuenta'], 0, 1);
        $this->Cell(0, 10, utf8_decode('ID Tipo Empleado: ') . $datos['id_tipo_empleado'], 0, 1);
        $this->Cell(0, 10, utf8_decode('Documento de Identidad: ') . $datos['doc_identidad'], 0, 1);
    }
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nominamod";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$identificacion =$_SESSION['identidad_usuario'];

$sql = "SELECT * FROM empleado WHERE identificacion = '$identificacion'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $pdf = new ComprobanteEmpleado();
    $pdf->AddPage();

    $pdf->DatosEmpleado($row);

    $pdf->Output();
} else {
    echo "No se encontraron datos para el empleado con identificación $identificacion.";
}

$conn->close();
?>
