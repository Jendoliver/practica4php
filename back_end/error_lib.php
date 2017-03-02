<?php
/*
*
*   error_lib.php: Gestión de errores de la aplicación
*
*/
require "constants.php";

/****** ERRORES GRAVES ******/
function errorQuery($con)
{
    echo "<h1>ERROR EN LA CONSULTA: ".mysqli_error($con)."</h1>";
}

/****** ERRORES COMUNES ******/
function errorTrainerExists()
{
    $message = "El entrenador ya existe";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location = '../front_end/altaentrenador.php';
    </script>";
}

function errorPokemonExists()
{
    $message = "El Pokémon ya existe";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location = '../front_end/altapokemon.php';
    </script>";
}

function errorNotEnoughPoints($diff)
{
    $message = "El entrenador no dispone de puntos suficientes para comprar tantas pociones. Le faltan $diff puntos";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location = '../front_end/getpociones.php';
    </script>";
}

function pokeDebilitado($name)
{
    $message = "¡$name se ha debilitado y no puede luchar más!";
    echo "<script type='text/javascript'>
    alert('$message');
    window.location = '../front_end/index.php';
    </script>";
}

function errorNoTrainers()
{
    echo "<h1>No hay entrenadores disponibles a los que asignarles Pokémon, crea alguno primero</h1>";
}
function errorNoResults()
{
    echo "<h1>No hay resultados</h1>";
}