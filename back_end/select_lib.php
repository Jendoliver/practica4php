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

function selectTrainersWithPoke($x, $y) // between x and y
{
    $con = connect("stukemon");
    $select = "SELECT trainer.name
                FROM trainer LEFT JOIN pokemon ON trainer.name = pokemon.trainer
                GROUP BY trainer.name
                HAVING COUNT(pokemon.trainer) BETWEEN $x and $y;";
    if($res = mysqli_query($con, $select))
    {
        $options = "";
        if($row = mysqli_fetch_assoc($res))
        {
            do
            {
                extract($row);
                $options .= "<option value='$name'>$name</option>";
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

function selectSecondTrainer($trainer1)
{
    $con = connect("stukemon");
    $select = "SELECT trainer.name
                FROM trainer LEFT JOIN pokemon ON trainer.name = pokemon.trainer
                WHERE trainer.name != '$trainer1'
                GROUP BY trainer.name
                HAVING COUNT(pokemon.trainer) BETWEEN 1 and 6;";
    if($res = mysqli_query($con, $select))
    {
        $options = "";
        if($row = mysqli_fetch_assoc($res))
        {
            do
            {
                extract($row);
                $options .= "<option value='$name'>$name</option>";
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