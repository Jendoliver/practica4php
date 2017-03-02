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
                <h2>Registro de combate:</h2>
                <?php
                $poke1 = selectPokeStats($_POST["poke1"]);
                $poke2 = selectPokeStats($_POST["poke2"]);
                if($poke1["speed"] >= $poke2["speed"]) // lo de la velocidad había que hacerlo
                {
                    $atk1 = $poke1["attack"]+2*$poke1["level"];
                    $poke2["life"] -= $atk1;
                    $atk2 = $poke2["attack"]+2*$poke2["level"];
                    $poke1["life"] -= $atk2;
                    ?>
                    <ol>
                        <li><?php echo "¡".$poke1["name"]." ataca primero porque es más veloz!" ?></li>
                        <li><?php echo $poke1["name"]." ataca a ".$poke2["name"]." con una fuerza de ".$atk1." y le deja a ".$poke2["life"]." puntos de vida." ?></li>
                        <li><?php echo $poke2["name"]." ataca a ".$poke1["name"]." con una fuerza de ".$atk2." y le deja a ".$poke1["life"]." puntos de vida." ?></li>
                        <li><?php if($poke1["life"] > $poke2["life"]){ echo "¡".$poke1["name"]." ha ganado el combate!"; insertBattle($poke1["name"], $poke2["name"], $poke1["name"]); winReward($poke1["name"], $poke1["trainer"]); } else if($poke1["life"] < $poke2["life"]) { echo "¡".$poke2["name"]." ha ganado el combate!"; insertBattle($poke1["name"], $poke2["name"], $poke2["name"]); winReward($poke2["name"], $poke2["trainer"]); } else { echo "¡Es un empate!"; insertBattle($poke1["name"], $poke2["name"], NULL); } ?></li>
                    </ol>
                    <?php
                }
                else
                {
                    $atk1 = $poke2["attack"]+2*$poke2["level"];
                    $poke1["life"] -= $atk1;
                    $atk2 = $poke1["attack"]+2*$poke1["level"];
                    $poke2["life"] -= $atk2;
                    ?>
                    <ol>
                        <li><?php echo "¡".$poke2["name"]." ataca primero porque es más veloz!" ?></li>
                        <li><?php echo $poke2["name"]." ataca a ".$poke1["name"]." con una fuerza de ".$atk1." y le deja a ".$poke1["life"]." puntos de vida." ?></li>
                        <li><?php echo $poke1["name"]." ataca a ".$poke2["name"]." con una fuerza de ".$atk2." y le deja a ".$poke2["life"]." puntos de vida." ?></li>
                        <li><?php if($poke1["life"] > $poke2["life"]){ echo "¡".$poke1["name"]." ha ganado el combate!"; insertBattle($poke1["name"], $poke2["name"], $poke1["name"]); winReward($poke1["name"], $poke1["trainer"]); } else if($poke1["life"] < $poke2["life"]) { echo "¡".$poke2["name"]." ha ganado el combate!"; insertBattle($poke1["name"], $poke2["name"], $poke2["name"]); winReward($poke2["name"], $poke2["trainer"]); } else { echo "¡Es un empate!"; insertBattle($poke1["name"], $poke2["name"], NULL); } ?></li>
                    </ol>
                    <?php
                }
                updateHP($poke1["name"], $poke1["life"]);
                updateHP($poke2["name"], $poke2["life"]);
                if($poke1["life"] < 1) pokeDebilitado($poke1["name"]);
                if($poke2["life"] < 1) pokeDebilitado($poke2["name"]);
                ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>