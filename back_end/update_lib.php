<?php
/*
*
*   update_lib.php: Librería de funciones UPDATE
*
*/

require "insert_lib.php";

function updateHP($name, $newhp)
{
    $con = connect("stukemon");
    if(mysqli_query($con, "UPDATE pokemon SET life = $newhp WHERE name = '$name';"))
    {
        disconnect($con);
        return 1;
    }
    else
    {
        errorQuery($con);
        disconnect($con);
        return 0;
    }
}

function updateInt($table, $attr, $dif, $name)
{
    $con = connect("stukemon");
    $query = "UPDATE $table SET $attr = $attr + $dif WHERE name = '$name'";
    if(mysqli_query($con, $query))
    {
        disconnect($con);
        return 1;
    }
    else
        errorQuery($con);
    disconnect($con);
    return 0;
}

function winReward($poke, $trainer)
{
    updateInt("pokemon", "level", 1, $poke);
    updateInt("trainer", "points", 10, $trainer);
}