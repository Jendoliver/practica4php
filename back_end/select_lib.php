<?php
/*
*
*   select_lib.php: Librería de consultas SELECT
*
*/

require "bbdd_lib.php";

function trainerExists($trainer)
{
    $con = connect("stukemon");
    if($res = mysqli_query($con, "SELECT * FROM trainer WHERE name = '$trainer'"))
    {
        disconnect($con);
        if(mysqli_num_rows($res)) // si hay resultados
            return 1;
        else
            return 0;
    }
    else
    {
        errorQuery($con);
        disconnect($con);
    }
}

function pokemonExists($name)
{
    $con = connect("stukemon");
    if($res = mysqli_query($con, "SELECT * FROM pokemon WHERE name = '$name'"))
    {
        disconnect($con);
        if(mysqli_num_rows($res)) // si hay resultados
            return 1;
        else
            return 0;
    }
    else
    {
        errorQuery($con);
        disconnect($con);
    }
}

function selectTrainersNoFull()
{
    $con = connect("stukemon");
    $select = "SELECT trainer.name
                FROM trainer LEFT JOIN pokemon ON trainer.name = pokemon.trainer
                GROUP BY trainer.name
                HAVING COUNT(pokemon.trainer) < 6;";
    if($res = mysqli_query($con, $select))
    {
        $options = "";
        if($row = mysqli_fetch_assoc($res))
        {
            do
            {
                extract($row);
                $options .= "<option name='$name'>$name</option>";
            } while($row = mysqli_fetch_assoc($res));
            echo $options;
        }
        else
        {
            errorNoTrainers();
        }
    }
    else
    {
        errorQuery($con);
    }
    disconnect($con);
}