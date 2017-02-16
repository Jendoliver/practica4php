<?php
/*
*
*   insert_lib.php: Librería de consultas INSERT
*
*/

require "select_lib.php";

function insertTrainer($name, $pokeballs, $potions)
{
    $con = conectar("stukemon");
    $insert = "INSERT INTO trainer VALUES('$name', $pokeballs, $potions, 0);";
    if(mysqli_query($con, $insert))
    {
        success();
    }
    else
    {
        errorQuery($con);
    }
    disconnect($con);
}

function insertPokemon($name, $type, $skill, $atk, $def, $spd, $hp, $trainer)
{
    $con = conectar("stukemon");
    $insert = "INSERT INTO pokemon VALUES('$name', '$type', '$skill', $atk, $def, $spd, $hp, 0, '$trainer');";
    if(trainerExists($trainer))
    {
        if(mysqli_query($con, $insert))
        {
            success();
        }
        else
        {
            errorQuery($con);
        }
    }
    disconnect($con);
}