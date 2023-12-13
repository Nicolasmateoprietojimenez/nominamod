<?php

function validarContrasena($contrasena) {
    $longitudMinima = 6;
    $longitudMaxima = 20;

    $longitud = strlen($contrasena);
    if ($longitud < $longitudMinima || $longitud > $longitudMaxima) {
        echo "<script>alert('La contraseña debe tener entre $longitudMinima y $longitudMaxima caracteres.');</script>";
        return false;
    }

    $letraMinuscula = preg_match('/[a-z]/', $contrasena);

    $letraMayuscula = preg_match('/[A-Z]/', $contrasena);

    $numero = preg_match('/[0-9]/', $contrasena);

    $caracterEspecial = preg_match('/[^a-zA-Z0-9]/', $contrasena);

    if ($letraMinuscula && $letraMayuscula && $numero && !$caracterEspecial) {
        //echo "<script>alert('La contraseña es válida.');</script>";
        return true;
    } else {
        if (!$letraMinuscula) {
            echo "<script>alert('La contraseña debe contener al menos una letra minúscula.');</script>";
        }
        if (!$letraMayuscula) {
            echo "<script>alert('La contraseña debe contener al menos una letra mayúscula.');</script>";
        }
        if (!$numero) {
            echo "<script>alert('La contraseña debe contener al menos un número.');</script>";
        }
        if ($caracterEspecial) {
            echo "<script>alert('No se admiten caracteres especiales en la contraseña.');</script>";
        }
        return false;
    }
}

?>
