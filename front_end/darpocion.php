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
    <?php require "../back_end/update_lib.php"; ?>
    <div class="container-fluid">
        <?php include "header.php"; ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Dar poción a un Pokémon</h2>
                <?php 
                if(isset($_POST["trainer"]))
                { ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="trainer">¿A qué Pokémon le quieres dar la poción?</label>
                            <input type="hidden" name="trainername" value="<?php echo $_POST["trainer"] ?>">
                            <select class="form-control" name="poke">
                                <?php selectPokesFromTrainerWithHP($_POST["trainer"]); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit">
                        </div>
                    </form>
                    <?php
                }
                else if(isset($_POST["poke"]))
                {
                    updateInt("pokemon", "life", 50, $_POST["poke"]); // update pokeHP+50
                    updateInt("trainer", "potions", -1, $_POST["trainername"]); // update potions-1
                    success();
                }
                else
                { ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="trainer">¿De quién es el Pokémon?</label>
                            <select class="form-control" name="trainer">
                                <?php selectTrainersWithPoke(1, 6); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success btn-block" type="submit">
                        </div>
                    </form>
                <?php } ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>