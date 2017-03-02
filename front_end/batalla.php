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
                    $atk1 = $poke1["attack"] + 2*$poke1["level"];
                    $def1 = $poke2["defense"] + 2*$poke2["level"]; // también he hecho que la defensa influya de la misma forma que el ataque, así un pokémon gana defensa por nivel
                    if($atk1 > $def1) // el ataque solo entra si el daño es mayor que la defensa
                        $poke2["life"] -= $atk1 - $def1;
                    $atk2 = $poke2["attack"] + 2*$poke2["level"];
                    $def2 = $poke1["defense"] + 2*$poke1["level"];
                    if($atk2 > $def2)
                        $poke1["life"] -= $atk2 - $def2;
                    ?>
                    <ol>
                        <li><?php echo "¡".$poke1["name"]." ataca primero porque es más veloz!" ?></li>
                        <li><?php echo $poke1["name"]." ataca a ".$poke2["name"]." con una fuerza de ".$atk1."." ?></li>
                        <li><?php echo $poke2["name"]." reduce el daño en ".$def1."." ?></li>
                        <li><?php echo "Daño total: ".($atk1-$def1)?></li>
                        <li><?php echo "¡A ".$poke2["name"]." le quedan ".$poke2["life"]." puntos de vida!" ?></li>
                        <li><?php echo $poke2["name"]." ataca a ".$poke1["name"]." con una fuerza de ".$atk2."." ?></li>
                        <li><?php echo $poke1["name"]." reduce el daño en ".$def2."." ?></li>
                        <li><?php echo "Daño total: ".($atk2-$def2)?></li>
                        <li><?php echo "¡A ".$poke1["name"]." le quedan ".$poke1["life"]." puntos de vida!" ?></li>
                        <li><?php if($poke1["life"] > $poke2["life"]){ echo "¡".$poke1["name"]." ha ganado el combate!"; insertBattle($poke1["name"], $poke2["name"], $poke1["name"]); winReward($poke1["name"], $poke1["trainer"]); } else if($poke1["life"] < $poke2["life"]) { echo "¡".$poke2["name"]." ha ganado el combate!"; insertBattle($poke1["name"], $poke2["name"], $poke2["name"]); winReward($poke2["name"], $poke2["trainer"]); } else { echo "¡Es un empate!"; insertBattle($poke1["name"], $poke2["name"], NULL); } ?></li>
                    </ol>
                    <?php
                }
                else
                {
                    $atk1 = $poke2["attack"] + 2*$poke2["level"];
                    $def1 = $poke1["defense"] + 2*$poke1["level"];
                    if($atk1 > $def1)
                        $poke1["life"] -= $atk1 - $def1;
                    $atk2 = $poke1["attack"] + 2*$poke1["level"];
                    $def2 = $poke2["defense"] + 2*$poke2["level"];
                    if($atk2 > $def2)
                        $poke2["life"] -= $atk2 - $def2;
                    ?>
                    <ol>
                        <li><?php echo "¡".$poke2["name"]." ataca primero porque es más veloz!" ?></li>
                        <li><?php echo $poke2["name"]." ataca a ".$poke1["name"]." con una fuerza de ".$atk1."." ?></li>
                        <li><?php echo $poke1["name"]." reduce el daño en ".$def1."." ?></li>
                        <li><?php echo "Daño total: ".($atk1-$def1)?></li>
                        <li><?php echo "¡A ".$poke1["name"]." le quedan ".$poke1["life"]." puntos de vida!" ?></li>
                        <li><?php echo $poke1["name"]." ataca a ".$poke2["name"]." con una fuerza de ".$atk2."." ?></li>
                        <li><?php echo $poke2["name"]." reduce el daño en ".$def2."." ?></li>
                        <li><?php echo "Daño total: ".($atk2-$def2)?></li>
                        <li><?php echo "¡A ".$poke2["name"]." le quedan ".$poke2["life"]." puntos de vida!" ?></li>
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