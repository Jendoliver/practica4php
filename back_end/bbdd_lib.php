<?php
/*
*
*   bbdd_lib.php: Funciones básicas de gestión de la bbdd
*
*/

require "error_lib.php";

function connect($database) // Todo un clásico, esta vez en inglés para elevar la caché del programador
{
    $conexion = mysqli_connect("localhost", "root", "", $database) or
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

function createTable($res) // Crea una tabla genérica automáticamente con el resultado de una query
{
    if($row = mysqli_fetch_assoc($res)) //comprobamos que hay algo para evitar warning
    {
        $table = "<table class='table table-hover'>"; // ese bootstrap joder
        $table .= "<thead>";
        foreach($row as $key => $value) // header tabla
        {
            switch($key)
            {
                case "name": $table .= "<th>Nombre</th>"; break;
                case "type": $table .= "<th>Tipo</th>"; break;
                case "ability": $table .= "<th>Habilidad</th>"; break;
                case "attack": $table .= "<th>Ataque</th>"; break;
                case "defense": $table .= "<th>Defensa</th>"; break;
                case "speed": $table .= "<th>Velocidad</th>"; break;
                case "life": $table .= "<th>Vida</th>"; break;
                case "level": $table .= "<th>Nivel</th>"; break;
                case "trainer": $table .= "<th>Entrenador</th>"; break;
                case "pokeballs": $table .= "<th>Pokéballs</th>"; break;
                case "potions": $table .= "<th>Pociones</th>"; break;
                case "points": $table .= "<th>Puntos</th>"; break;
                case "winner": $table .= "<th>Pokémon</th>"; break;
                default: $table .= "<th>$key</th>";
            }
        }
        $table .= "</thead><tbody>"; // cierre del header y apertura del body
    
        do // llenar tabla con el contenido de la query
        {
            $table .= "<tr>"; // principio de fila
            foreach($row as $key => $value) // llenamos una fila
                $table .= "<td>$value</td>";
            $table .= "</tr>";
        } while ($row = mysqli_fetch_assoc($res));
        $table .= "</tbody></table>";
        echo $table;
    }
    else
        errorNoResults();
}