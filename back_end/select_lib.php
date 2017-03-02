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

function selectTrainerPoints($name)
{
    $con = connect("stukemon");
    if($res = mysqli_query($con, "SELECT points FROM trainer WHERE name = '$name';"))
    {
        disconnect($con);
        $row = mysqli_fetch_assoc($res);
        return $row["points"];
    }
    else
        errorQuery($con);
    disconnect($con);
    return 0;
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

function selectPokesFromTrainer($trainer)
{
    $con = connect("stukemon");
    if($res = mysqli_query($con, "SELECT name FROM pokemon WHERE trainer = '$trainer' AND life > 0;"))
    {
        $options = "";
        while($row = mysqli_fetch_assoc($res))
        {
            extract($row);
            $options .= "<option value='$name'>$name</option>";
        }
        echo $options;
    }
    else 
    {
        errorQuery();
    }
    disconnect($con);
}

function selectPokesFromTrainerWithHP($trainer)
{
    $con = connect("stukemon");
    if($res = mysqli_query($con, "SELECT name, life FROM pokemon WHERE trainer = '$trainer';"))
    {
        $options = "";
        while($row = mysqli_fetch_assoc($res))
        {
            extract($row);
            $options .= "<option value='$name'>$name (HP: $life)</option>";
        }
        echo $options;
    }
    else 
    {
        errorQuery();
    }
    disconnect($con);
}

function selectPokeStats($name)
{
    $con = connect("stukemon");
    if($res = mysqli_query($con, "SELECT * FROM pokemon WHERE name = '$name'"))
    {
        disconnect($con);
        return mysqli_fetch_assoc($res);
    }
    else
        errorQuery();
    disconnect($con);
}

function rankingPokemon()
{
    $con = connect("stukemon");
    if($res = mysqli_query($con, "SELECT * FROM pokemon ORDER BY level DESC, life DESC;"))
        createTable($res);
    else
        errorQuery($con);
    disconnect($con);
}

function rankingTrainer()
{
    $con = connect("stukemon");
    if($res = mysqli_query($con, "SELECT * FROM trainer ORDER BY points DESC;"))
        createTable($res);
    else
        errorQuery($con);
    disconnect($con);
}

function rankingBattle()
{
    $con = connect("stukemon");
    $query = "SELECT winner, count(*) as Victorias
                FROM battle
                GROUP BY winner
                ORDER BY Victorias DESC;";
    if($res = mysqli_query($con, $query))
        createTable($res);
    else
        errorQuery($con);
    disconnect($con);
}