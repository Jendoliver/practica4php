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
    <div class="container-fluid">
        <?php include "header.php"; ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="list-group" style="text-align: center;">
                    <a href="altaentrenador.php" class="list-group-item">Dar de alta entrenador</a>
                    <a href="altapokemon.php" class="list-group-item">Dar de alta un Pokémon</a>
                    <a href="batalla.php" class="list-group-item">¡BATALLA!</a>
                    <a href="darpocion.php" class="list-group-item">Dar poción a un Pokémon</a>
                    <a href="getpociones.php" class="list-group-item">Conseguir pociones</a>
                    <a href="listarpokemon.php" class="list-group-item">Listado de los Pokémon</a>
                    <a href="rankingtrainer.php" class="list-group-item">Ranking de los entrenadores</a>
                    <a href="rankingbattle.php" class="list-group-item">Ranking de las batallas</a>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>