<?php
/*
*
*   insert_lib.php: Librería de consultas INSERT
*
*/

require "select_lib.php";

function insertTrainer($name, $pokeballs, $potions)
{
    $con = connect("stukemon");
    $insert = "INSERT INTO trainer VALUES('$name', $pokeballs, $potions, 0);";
    if(!trainerExists($name))
    {
        if(mysqli_query($con, $insert))
        {
            disconnect($con);
            success();
        }
        else
        {
            errorQuery($con);
            disconnect($con);
        }
    }
    else
        errorTrainerExists();
}

function insertPokemon($name, $type, $skill, $atk, $def, $spd, $hp, $trainer)
{
    $con = connect("stukemon");
    $insert = "INSERT INTO pokemon VALUES('$name', '$type', '$skill', $atk, $def, $spd, $hp, 0, '$trainer');";
    if(!pokemonExists($name))
    {
        if(trainerExists($trainer))
        {
            if(mysqli_query($con, $insert))
                success();
            else
                errorQuery($con);
        }
    }
    else
        errorPokemonExists();
    disconnect($con);
}