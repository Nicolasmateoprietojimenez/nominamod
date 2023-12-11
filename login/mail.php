<?php
class correo {

    function enviarCorreo($para, $codigoactivacion) 
    {
        $logoURL = 'https://www.porvenir.com.co/documents/20152/90409389/logo_porvenir_gris+%281%29.jpg.webp/d0b0252b-4b9b-32e6-b8bf-b987ac21c02b?t=1670427417237';

        // Obtén los valores de $para y $codigoactivacion
        
        $para = $para['para'];
        $codigoactivacion = $codigoactivacion['codigoactivacion'];

        $título = 'Correo de Activación de Cuenta'; // Define el título real del correo aquí

        $mensaje = '
        <html>
        <head>
            <style>
                /* Estilos del correo electrónico */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                }

                #container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #ffffff;
                    border-radius: 5px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                }

                #header {
                    text-align: center;
                    padding: 20px 0;
                }

                #logo {
                    max-width: 200px;
                    margin: 0 auto;
                }

                #title {
                    font-weight: bold;
                    font-size: 24px;
                    color: #ff6600; /* Naranja */
                }

                #activation-code {
                    font-weight: bold;
                    font-size: 48px;
                    color: #333; /* Negro */
                    margin: 20px 0;
                }

                /* Otros estilos de correo electrónico aquí */

            </style>
        </head>
        <body>
            <!-- Contenido del correo electrónico -->
            <div id="container">
                <div id="header">
                    <img id="logo" src="' . $logoURL . '" alt="Logo de la empresa">
                    <h1 id="title">' . $título . '</h1>
                </div>
                <p>Su código de activación es:</p>
                <h2 id="activation-code">' . $codigoactivacion . '</h2>
                <h3> Para activar su cuenta ingrese el codigo en el siguiente link </h3>
                <p><a href="http://localhost/fondoporvenir/login/verificacion.php">Activar cuenta</a></p>

            </div>
        </body>
        </html>
        ';

        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: Nominamod.SAS' . "\r\n";

        return mail($para, $título, $mensaje, $cabeceras);
    }
}