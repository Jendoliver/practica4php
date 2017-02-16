<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Stukemon GO!</title>
</head>
<body>
    <?php 
    if(!empty($_POST))
    {
        require "insert_lib.php";
        extract($_POST);
        insertPokemon($name, $type, $skill, $atk, $def, $spd, $hp, $trainer);
    }
    else
    {
    ?>
    <div class="container-fluid">
        <?php include "header.php"; ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Dar de alta Pokémon</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Nombre del Pokémon:</label>
                        <input type="text" class="form-control" name="name" placeholder="Introduce el nombre del Pokémon" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="pokemon">Tipo del Pokémon:</label>
                        <input type="text" class="form-control" name="type" placeholder="Introduce el tipo del Pokémon" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label for="skill">Habilidad del Pokémon:</label>
                        <input type="text" class="form-control" name="skill" placeholder="Introduce la habilidad del Pokémon" maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <label for="atk">Ataque del Pokémon:</label>
                        <input type="number" class="form-control" name="atk" placeholder="Introduce el ataque del Pokémon" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <label for="def">Defensa del Pokémon:</label>
                        <input type="number" class="form-control" name="def" placeholder="Introduce la defensa del Pokémon" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <label for="spd">Velocidad del Pokémon:</label>
                        <input type="number" class="form-control" name="spd" placeholder="Introduce la velocidad del Pokémon" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <label for="hp">Puntos de vida del Pokémon:</label>
                        <input type="number" class="form-control" name="hp" placeholder="Introduce los puntos de vida del Pokémon" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <label for="skill">Entrenador del Pokémon:</label>
                        <select>
                            <?php
                            require "select_lib.php";
                            selectTrainersNoFull();
			    		    ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">¡Crear Pokémon!</button>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>