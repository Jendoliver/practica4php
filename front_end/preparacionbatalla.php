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
    <?php require "../back_end/select_lib.php"; ?>
    <div class="container-fluid">
        <?php include "header.php"; ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>¡BATALLA!</h2>
    <?php 
    if(isset($_POST["trainer1"]) || isset($_POST["trainer2"]))
    {
        if(isset($_POST["trainer2"]))
        {   ?> <!-- HAY QUE HACER ESTO CABRONAZO -->
            <form action="batalla.php" method="POST">
                <div class="form-group">
                    <label for="trainer2">Nombre del segundo entrenador:</label>
                    <input type="hidden" name="trainer1" value="<?php echo $_POST["trainer1"] ?>">
                    <select class="form-control" name="trainer2">
                        <?php selectSecondTrainer($_POST["trainer1"]); ?>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit">
                </div>
            </form>
        <?php }
        else
        { ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="trainer2">Nombre del segundo entrenador:</label>
                    <input type="hidden" name="trainer1" value="<?php echo $_POST["trainer1"] ?>">
                    <select class="form-control" name="trainer2">
                        <?php selectSecondTrainer($_POST["trainer1"]); ?>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-success btn-block" type="submit">
                </div>
            </form>
        <?php }
    }
    else
    {
    ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="trainer1">Nombre del primer entrenador:</label>
                        <select class="form-control" name="trainer1">
                            <?php selectTrainersWithPoke(1, 6); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>