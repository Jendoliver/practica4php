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
        require "../back_end/insert_lib.php";
        extract($_POST);
        insertTrainer($name, $pokeballs, $potions);
    }
    else
    {
    ?>
    <div class="container-fluid">
        <?php include "header.php"; ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Dar de alta entrenador</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Nombre del entrenador:</label>
                        <input type="text" class="form-control" name="name" placeholder="Introduce el nombre del entrenador" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="pokeballs">Número de pokéballs:</label>
                        <input type="number" class="form-control" name="pokeballs" placeholder="Introduce el número de pokéballs del entrenador" maxlength="11" required>
                    </div>
                    <div class="form-group">
                        <label for="potions">Número de pociones:</label>
                        <input type="number" class="form-control" name="potions" placeholder="Introduce el número de pociones del entrenador" maxlength="11" required>
                    </div>
                    <button type="submit" class="btn btn-success">¡Crear entrenador!</button>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html>
    