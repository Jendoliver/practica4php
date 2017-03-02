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
                <h2>Conseguir pociones</h2>
                <?php
                if(isset($_POST["numpotis"]))
                {
                    extract($_POST);
                    $price = intval($numpotis)*10;
                    if($price <= selectTrainerPoints($trainer))
                    {
                        updateInt("trainer", "points", -$price, $trainer);
                        updateInt("trainer", "potions", $numpotis, $trainer);
                        success();
                    }
                    else
                        errorNotEnoughPoints($price-selectTrainerPoints($trainer));
                }
                else
                {
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="trainer">¿Para quién quieres conseguir pociones?</label>
                        <select class="form-control" name="trainer" required>
                            <?php selectTrainersWithPoke(0, 6); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numpotis">¿Cuántas pociones quieres?</label>
                        <input type="number" class="form-control" name="numpotis" min="1" required>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success btn-block" type="submit" value="¡Conseguir pociones!">
                    </div>
                </form>
                <?php } ?>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>