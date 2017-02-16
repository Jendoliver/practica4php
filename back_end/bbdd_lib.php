<?php
/*
*
*   bbdd_lib.php: Funciones básicas de gestión de la bbdd
*
*/

require "error_lib.php";

function connect($db) // Todo un clásico, esta vez en inglés para elevar la caché del programador
{
    $conexion = mysqli_connect("localhost", "root", "", $db) or
        die("No se ha podido conectar a la BBDD");
    return $conexion;
}

function disconnect($con) // Otra que tal
{
    mysqli_close($con);
}

function success() // JS popup para las consultas realizadas con éxito
{
    $message = "Operación realizada con éxito";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location = '../front_end/index.php';
    </script>";
}