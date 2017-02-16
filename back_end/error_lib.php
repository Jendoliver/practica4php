<?php
/*
*
*   error_lib.php: Gestión de errores de la aplicación
*
*/

/****** ERRORES GRAVES ******/
function errorQuery($con)
{
    echo "<h1>ERROR EN LA CONSULTA: ".mysqli_error($con)."</h1>";
}

/****** ERRORES COMUNES ******/
function errorNoTrainers()
{
    echo "<h1>No hay entrenadores disponibles a los que asignarles Pokémon, crea alguno primero</h1>";
}
function errorNoResults()
{
    echo "<h1>No hay resultados</h1>";
}